<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Job\CreateJobRequest;
use App\Models\BudgetType;
use App\Models\Category;
use App\Models\Country;
use App\Models\Deliverable;
use App\Models\DeliveryMode;
use App\Models\DOD;
use App\Models\InviteFreelancer;
use App\Models\JobType;
use App\Models\Module;
use App\Models\ProjectStage;
use App\Models\Rank;
use App\Models\SkillCategory;
use App\Models\Skills;
use App\Models\SkillSubCategory;
use App\Models\TaskDocument;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\User;
use App\Models\Proposal;
use Carbon\Carbon;
use App\Models\GeneralSetting;
use App\Models\ProjectLength;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Khsing\World\World;
use PhpParser\Node\Stmt\TryCatch;

class JobController extends Controller
{
    public $activeTemplate;
    public function __construct()
    {
        $this->activeTemplate = activeTemplate();
    }

    public function getJobData()
    {
        $data = [];

        


        $is_active=1;
        $data['countries'] = getRedisData(Country::$Model_Name_Space,Country::$Redis_key);
        $data['countries'] =  collect($data['countries'])->sortby('name');
        $data['job_types'] = getRedisData(JobType::$Model_Name_Space,JobType::$Redis_key,$is_active);
        $data['categories'] = getRedisData(Category::$Model_Name_Space,Category::$Redis_key,$is_active);
        $data['experience_levels'] = getRedisData(Rank::$Model_Name_Space,Rank::$Redis_key);
        $data['budget_types'] = getRedisData(BudgetType::$Model_Name_Space,BudgetType::$Redis_key,$is_active);
        $data['deliverables'] = getRedisData(Deliverable::$Model_Name_Space,Deliverable::$Redis_key,$is_active);
        $data['project_length'] = getRedisData(ProjectLength::$Model_Name_Space,ProjectLength::$Redis_key,$is_active);
        $data['project_stages'] = getRedisData(ProjectStage::$Model_Name_Space,ProjectStage::$Redis_key,$is_active);
        $data['dods'] = getRedisData(DOD::$Model_Name_Space,DOD::$Redis_key,$is_active);

        //  $data['dods'] = DOD::OnlyJob()->select(['id', 'title'])->get();


        return $data;
    }

    public function create(Request $request)
    {

        try {
            $pageTitle = "Create Job";
            $data = $this->getJobData();
            return view($this->activeTemplate . 'user.buyer.job.create', compact('pageTitle', 'data'));

        } catch (\Exception $e) {
            errorLogMessage($e);

        }


    }

    public function index()
    {
        try {
            $user = Auth::user();
            $pageTitle = "Manage Job";
            $emptyMessage = "No data found";
            $jobs = Job::where('user_id', $user->id)->with('dod', 'status', 'proposal')->latest()->paginate(getPaginate());
            return view($this->activeTemplate . 'user.buyer.job.index', compact('pageTitle', 'emptyMessage', 'jobs'));
        } catch (\Exception $e) {
            errorLogMessage($e);
        }

    }

    public function jobDataValidate(Request $request)
    {

    }

    public function store(CreateJobRequest $request)
    {

        $request_data = $request->all();
        $user = Auth::user();
        DB::beginTransaction();
        try {
            $job = Job::create([
                "user_id" => $user->id,
                "job_type_id" => $request_data['job_type_id'],
                "country_id" => $request_data['country_id'],
                "category_id" => $request_data['category_id'],
                "sub_category_id" => isset($request_data['sub_category_id']) ? $request_data['sub_category_id'] : null,
                "rank_id" => $request_data['rank_id'],
                "project_stage_id" => isset($request_data['project_stage_id']) ? $request_data['project_stage_id'] : null,
                "budget_type_id" => isset($request_data['budget_type_id']) ? $request_data['budget_type_id'] : null,
                "title" => $request_data['title'],
                "description" => $request_data['description'],
                "fixed_amount" => isset($request_data['fixed_amount']) ? $request_data['fixed_amount'] : null,
                "hourly_start_range" => isset($request_data['hourly_start_range']) ? $request_data['hourly_start_range'] : null,
                "hourly_end_range" => isset($request_data['hourly_end_range']) ? $request_data['hourly_end_range'] : null,
                "project_length_id" => $request_data['project_length_id'],
                "expected_start_date" => $request_data['expected_start_date'],
                "status_id" => Job::$Pending
            ]);


            $deliverables = Deliverable::whereIn('id', $request_data['deliverables'])->get();
            $job->deliverable()->sync($deliverables);

            $dods = DOD::whereIn('id', $request_data['dod'])->get();
            $job->dod()->sync($dods);

            $skills = Skills::whereIn('id', $request_data['skills'])->get();
            $job->skill()->saveMany($skills);

            $path = imagePath()['attachments']['path'];

            if (isset($request_data['file'])) {
                $job->documents()->createMany(json_decode($request_data['file'],true));
            }
            DB::commit();
            session()->put('notify', ["Job Created Successfully"]);
            return response()->json(["redirect" => route('buyer.job.index'), "message" => "Successfully Saved"]);

        } catch (\Exception $exp) {
            DB::rollback();
            // Log::error($exp->getMessage());
            errorLogMessage($exp);
            return response()->json(["error" => $exp->getMessage()]);
        }


    }


    public function edit($uuid)
    {
        try {
            $job = Job::withAll()->where('uuid', $uuid)->first();
            $sub_category = SubCategory::where('category_id', $job->category->id)->where('is_active',1)->select(['id', 'name'])->get();
            $data = $this->getJobData();
            $data['selected_skills'] = $job->skill ? implode(',', $job->skill->pluck('id')->toArray()) : '';
            $data['sub_categories'] = $sub_category;
            $data['documents'] = json_encode($job->documents->toArray());
            $pageTitle = "Job Update";

            return view($this->activeTemplate . 'user.buyer.job.edit', compact('pageTitle', 'job', 'data'));
        } catch (\Exception $exp) {
            // Log::error($exp->getMessage());
            errorLogMessage($exp);
        }
    }

    public function update(CreateJobRequest $request, $uuid)
    {

        $request_data = $request->all();
        $user = Auth::user();

        try {
            DB::beginTransaction();
            $job = Job::where("uuid", $uuid)->first();

            $job->update([
                "user_id" => $user->id,
                "job_type_id" => $request_data['job_type_id'],
                "country_id" => $request_data['country_id'],
                "category_id" => $request_data['category_id'],
                "sub_category_id" => isset($request_data['sub_category_id']) ? $request_data['sub_category_id'] : null,
                "rank_id" => $request_data['rank_id'],
                "project_stage_id" => isset($request_data['project_stage_id']) ? $request_data['project_stage_id'] : null,
                "budget_type_id" => isset($request_data['budget_type_id']) ? $request_data['budget_type_id'] : null,
                "title" => $request_data['title'],
                "description" => $request_data['description'],
                "fixed_amount" => isset($request_data['fixed_amount']) ? $request_data['fixed_amount'] : null,
                "hourly_start_range" => isset($request_data['hourly_start_range']) ? $request_data['hourly_start_range'] : null,
                "hourly_end_range" => isset($request_data['hourly_end_range']) ? $request_data['hourly_end_range'] : null,
                "project_length_id" => $request_data['project_length_id'],
                "expected_start_date" => $request_data['expected_start_date'],
                'status_id' => 1
            ]);


            $deliverables = Deliverable::whereIn('id', $request_data['deliverables'])->get();
            $job->deliverable()->sync($deliverables);

            $dods = DOD::whereIn('id', $request_data['dod'])->get();
            $job->dod()->sync($dods);


            $skills = Skills::whereIn('id', $request_data['skills'])->get();
            $job->skill()->sync($skills);

            $path = imagePath()['attachments']['path'];

            foreach ($job->documents as $document) {
                $path = Job::$attachment_path . '/' . $document->name;

                removeFile($path);
            }

            $job->documents()->delete();
            if (isset($request_data['file'])) {
                $job->documents()->createMany(json_decode($request_data['file'],true));
            }
            DB::commit();
            return response()->json(["redirect" => route('buyer.job.index'), "message" => "Job Successfully Updated"]);

        } catch (\Exception $exp) {
            DB::rollback();
            // Log::error($exp->getMessage());
            errorLogMessage($exp);
            return response()->json(["error" => $exp]);
        }


    }


    private function fileValidate($file)
    {
        $allowedExts = array('jpeg', 'jpg', 'png', 'pdf');
        $ext = strtolower($file->getClientOriginalExtension());
        if (!in_array($ext, $allowedExts)) {
            $notify = 'Only jpeg, jpg, png files are allowed';
            return back()->withNotify($notify);
        }
    }


    public function cancelBy(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:jobs,id'
        ]);
        $user = Auth::user();
        $job = Job::where('user_id', $user->id)->where('id', $request->id)->firstOrFail();
        $job->status = 2;
        $job->created_at = Carbon::now();
        $job->save();
        $notify[] = ['success', 'Job has been closed.'];
        return back()->withNotify($notify);
    }


    public function filterDod(Request $request)
    {
        try {
            $query = DOD::OnlyJob()->select('id', 'title');
            $query->when(!empty($request->title), function ($query) use ($request) {
                return $query->where('title', 'LIKE', '%' . $request->title . '%');
            });
            return $query->get();
        } catch (\Exception $e) {
            DB::rollBack();
            errorLogMessage($e);
            return $e->getMessage();
        }
    }

    public function filterDeliverable(Request $request)
    {
        try {
            $query = Deliverable::OnlyJob()->select('id', 'name', 'slug');
            $query->when(!empty($request->name), function ($query) use ($request) {
                return $query->where('name', 'LIKE', '%' . $request->name . '%');
            });
            return $query->get();
        } catch (\Exception $e) {
            DB::rollBack();
            errorLogMessage($e);
            return $e->getMessage();
        }
    }


    public function singleJob($uuid)
    {


        $job = Job::where('uuid', $uuid)->withAll()->first();


        $skillCats = SkillCategory::select('name', 'id')->get();

        foreach ($skillCats as $skillCat) {

            $skills = Skills::where('skill_category_id', $skillCat->id)->groupBy('skill_category_id')->get();

        }
        $development_skils = Job::where('uuid', $uuid)->with(['skill.skill_categories'])->first();
        $data['selected_skills'] = $job->skill ? implode(',', $job->skill->pluck('id')->toArray()) : '';
        $pageTitle = "All Jobs";
        return view('templates.basic.jobs.single-job', compact('pageTitle', 'job', 'data'));

    }

    public function downnloadAttach(Request $request)
    {


        $file = TaskDocument::find($request->id);
        $filename = $file->name;
        $tempImage = tempnam(sys_get_temp_dir(), $filename);
        copy($file->url, $tempImage);


        return response()->download($tempImage, $filename);


        // return redirect()->back();


    }

    public function destroy($uuid)
    {
        try {
            DB::beginTransaction();
            $job = Job::where("uuid", $uuid)->first();

            foreach ($job->documents as $document) {
                $path = Job::$attachment_path . '/' . $document->name;
                removeFile($path);
            }

            $job->documents()->delete();

            $job->proposal()->update(['status_id' => Proposal::STATUSES['ARCHIVED']]);

            DB::table('job_deliverables')->where('job_id', $job->id)
                ->update(['deleted_at' => DB::raw('NOW()')]);
            DB::table('job_dods')->where('job_id', $job->id)
                ->update(['deleted_at' => DB::raw('NOW()')]);

            $job->delete();
            DB::commit();
            return response()->json(["message" => "Successfully Deleted"]);

        } catch (\Exception $e) {
            DB::rollBack();
            errorLogMessage($e);
            return response()->json(["error" => "Failed to delete job"]);

        }

    }

    public function product()
    {

        $proposals = Proposal::WithAll()->get();
        $pageTitle = "Product";

        return view('templates.basic.jobs.all-proposal', compact('pageTitle', 'proposals'));

    }

    public function inviteFreelancer($job_uuid)
    {
        $job = Job::where('uuid', $job_uuid)->with('invited_freelancer')->first();
        $job_proposal=$job->proposal;
        $proposal_submitted_user_ids=$job_proposal->pluck('user_id')->toArray();
        $user_ids = $job->invited_freelancer->pluck('user_id')->toArray();
        $user_ids = array_merge($user_ids,$proposal_submitted_user_ids);

        $freelancers = User::role('Freelancer')->whereNotIn('id', $user_ids)->with('skills', 'education', 'country', 'user_basic', 'experiences', 'skills', 'education')->get();
        $invited_freelancers = InviteFreelancer::where('job_id', $job->id)->with('user')->get();
        $pageTitle = "inviteProposal";
        return view('templates.basic.jobs.invite-freelancer', compact('pageTitle', 'job', 'freelancers', 'invited_freelancers'));

    }
}
