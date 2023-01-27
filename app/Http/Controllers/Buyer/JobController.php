<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use App\Models\BudgetType;
use App\Models\Category;
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

        $data['countries'] = World::Countries();

        $data['job_types'] = JobType::where('is_active',1)->OnlyJob()->select(['id', 'title'])->get();

        $data['categories'] = Category::where('is_active',1)->select(['id', 'name'])->get();

        $data['experience_levels'] = Rank::select(['id', 'level'])->orderBy('id', 'ASC')->get();

        $data['budget_types'] = BudgetType::where('is_active',1)->OnlyJob()->select(['id', 'title', 'slug'])->get();

        $data['deliverables'] = Deliverable::where('is_active',1)->OnlyJob()->select(['id', 'name', 'slug'])->get();

        $data['project_length'] = ProjectLength::where('is_active',1)->OnlyJob()->select(['id', 'name'])->get();


        $data['project_stages'] = ProjectStage::where('is_active',1)->OnlyJob()->select(['id', 'title'])->get();

        $data['dods'] = DOD::OnlyJob()->select(['id', 'title'])->get();


        return $data;
    }

    public function create(Request $request)
    {

        try {
            $pageTitle = "Create Job";
            $data = $this->getJobData();
            Log::info(["Job create data" => $data]);
            return view($this->activeTemplate . 'user.buyer.job.create', compact('pageTitle', 'data'));

        } catch (\Exception $e) {
            Log::error($e->getMessage());

        }


    }

    public function index()
    {
        try {
            $user = Auth::user();
            $pageTitle = "Manage Job";
            $emptyMessage = "No data found";
            $jobs = Job::where('user_id', $user->id)->with('dod', 'status', 'proposal')->latest()->paginate(getPaginate());
            Log::info(["All Jobs" => $jobs]);
            return view($this->activeTemplate . 'user.buyer.job.index', compact('pageTitle', 'emptyMessage', 'jobs'));
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }

    }

    public function jobDataValidate(Request $request)
    {

        try {
            $request_data = [];
            parse_str($request->data, $request_data);

            $user = Auth::user();
            $custom_messages = [

                'hourly_start_range.required_if' => 'Hourly Rate start field is required when budget type is hourly',
                'country_id.required' => 'Job location is required',
                'hourly_end_range.required_if' => 'Hourly Rate end field is required when budget type is hourly',
                'fixed_amount.required_if' => 'Fixed amount field is required when budget type is fixed',
                'hourly_start_range.gt' => 'Hourly Rate start field should be greater than zero',
                'hourly_end_range.gte' => 'Hourly Rate end field value should be greater or equal to weekly start range',


            ];
            $rules = [
                'title' => 'required|string|max:150',
                'description' => 'required|string|max:1000',
                'country_id' => 'required',
                'job_type_id' => 'required|exists:job_types,id',
                'category_id' => 'required|exists:categories,id',
                'sub_category_id' => 'exists:sub_categories,id',
                'project_stage_id' => 'exists:project_stages,id',
                'expected_start_date' => 'required||after_or_equal:' . Carbon::now()->format('d-m-Y'),
                'project_length_id' => 'exists:project_lengths,id',
                'rank_id' => 'required|exists:ranks,id',
                'budget_type_id' => 'required|exists:budget_types,id',
                'deliverables' => 'required|array',
                'deliverables.*' => 'required|string|distinct|exists:deliverables,id',
                'dod' => 'required|array',
                'skills' => 'required|array',
                'dod.*' => 'required|string|distinct|exists:d_o_d_s,id',
            ];

            if ($request_data['budget_type_id'] == BudgetType::$hourly) {
                $rules['hourly_start_range'] = 'gt:0|required:budget_type_id,' . BudgetType::$hourly;
                $rules['hourly_end_range'] = 'gte:hourly_start_range|required:budget_type_id,' . BudgetType::$hourly;
            } elseif ($request_data['budget_type_id'] == BudgetType::$fixed) {
                $rules['fixed_amount'] = 'required:budget_type_id,' . BudgetType::$fixed . '|gt:0';
            } else {

            }
            $validator = Validator::make($request_data, $rules, $custom_messages);
            if ($validator->fails()) {

                return response()->json(["error" => $validator->errors()]);

            } else
                Log::info(["Job Validate" => "Job Data Is Valid"]);

            return response()->json(["validated" => "Job Data Is Valid"]);

        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }


    }

    public function store(Request $request)
    {

        $request_data = [];
        parse_str($request->data, $request_data);
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

            if ($request->hasFile('file')) {

                foreach ($request->file as $file) {

                    $this->fileValidate($file);

                    $filename = uploadAttachments($file, $path);

                    $file_extension = getFileExtension($file);
                    $url = $path . '/' . $filename;
                    $document = new TaskDocument;
                    $document->name = $filename;
                    $document->uploaded_name = $file->getClientOriginalName();
                    $document->url = $url;
                    $document->type = $file_extension;
                    $document->is_published = "Active";
                    $job->documents()->save($document);


                }
            }
            DB::commit();
            session()->put('notify', ["Job Created Successfully"]);
            Log::info(["Job" => $job]);
            return response()->json(["redirect" => route('buyer.job.index'), "message" => "Successfully Saved"]);

        } catch (\Exception $exp) {
            DB::rollback();
            Log::error($exp->getMessage());
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

            Log::info(["Job" => $job]);
            return view($this->activeTemplate . 'user.buyer.job.edit', compact('pageTitle', 'job', 'data'));
        } catch (\Exception $exp) {
            Log::error($exp->getMessage());
        }
    }

    public function update(Request $request, $uuid)
    {

        $request_data = [];
        parse_str($request->data, $request_data);
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

            if ($request->hasFile('file')) {

                foreach ($request->file as $file) {

                    $this->fileValidate($file);
                    $filename = uploadAttachments($file, $path);

                    $file_extension = getFileExtension($file);
                    $url = $path . '/' . $filename;
                    $document = new TaskDocument;
                    $document->name = $filename;
                    $document->uploaded_name = $file->getClientOriginalName();
                    $document->url = $url;
                    $document->type = $file_extension;
                    $document->is_published = "Active";
                    $job->documents()->save($document);


                }
            }

            DB::commit();
            Log::info(["Job" => $job]);
            return response()->json(["redirect" => route('buyer.job.index'), "message" => "Job Successfully Updated"]);

        } catch (\Exception $exp) {
            DB::rollback();
            Log::error($exp->getMessage());
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

        $user_ids = $job->invited_freelancer->pluck('user_id');

        $freelancers = User::role('Freelancer')->whereNotIn('id', $user_ids)->with('skills', 'education', 'country', 'user_basic', 'experiences', 'skills', 'education')->get();
        $invited_freelancers = InviteFreelancer::where('job_id', $job->id)->with('user')->get();
        $pageTitle = "inviteProposal";
        return view('templates.basic.jobs.invite-freelancer', compact('pageTitle', 'job', 'freelancers', 'invited_freelancers'));

    }
}
