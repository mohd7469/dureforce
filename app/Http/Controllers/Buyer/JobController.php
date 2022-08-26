<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use App\Models\BudgetType;
use App\Models\Category;
use App\Models\Deliverable;
use App\Models\DOD;
use App\Models\JobType;
use App\Models\Module;
use App\Models\ProjectStage;
use App\Models\Rank;
use App\Models\SkillCategory;
use App\Models\SkillSubCategory;
use Illuminate\Http\Request;
use App\Models\Job;
use Carbon\Carbon;
use App\Models\GeneralSetting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Khsing\World\World;

class JobController extends Controller
{
    public function __construct()
    {
        $this->activeTemplate = activeTemplate();
    }

    public function create(Request $request)
    {

        $pageTitle = "Create Job";

        $data = [];

        $data['countries'] = World::Countries();

        $data['job_types'] = JobType::OnlyJob()->select(['id', 'title'])->get();

        $data['categories'] = SkillCategory::select(['id', 'name', 'slug'])->get();

        $data['experience_levels'] = Rank::select(['id', 'level'])->get();

        $data['budget_types'] = BudgetType::OnlyJob()->select(['id', 'title','slug'])->get();

        $data['deliverables'] = Deliverable::OnlyJob()->select(['id', 'name', 'slug'])->get();

        $data['project_stages'] = ProjectStage::OnlyJob()->select(['id', 'title'])->get();

        $data['dods'] = DOD::OnlyJob()->select(['id', 'title'])->get();

        return view($this->activeTemplate . 'user.buyer.job.create', compact('pageTitle', 'data'));


    }

    public function index()
    {
        $user = Auth::user();
        $pageTitle = "Manage Job";
        $emptyMessage = "No data found";
        $jobs = Job::where('user_id', $user->id)->latest()->paginate(getPaginate());
        return view($this->activeTemplate . 'user.buyer.job.index', compact('pageTitle', 'emptyMessage', 'jobs'));
    }

    public function store(Request $request)
    {


        $user = Auth::user();
        $request->validate([
            'title' => 'required|string|max:150',
            'description' => 'required|string|max:1000',
            'job_type_id' => 'required|exists:job_types,id',
            'category_id' => 'required|exists:categories,id',
            'sub_category_id' => 'required|exists:sub_categories,id',
            'rank_id' => 'required|exists:ranks,id',
            'budget_type_id' => 'required|exists:budget_types,id',
            'deliverables' => 'required|array|min:3',
            'deliverables.*' => 'required|string|distinct|exists:deliverables,id',
            'dod' => 'required|array|min:3',
            'dod.*' => 'required|string|distinct|exists:d_o_ds,id',
        ]);

       
       $job = Job::create([
            "user_id"=>$user->id,
            "job_type_id"=>$request->job_type_id,
            "location_id"=>$request->location_id,
            "category_id"=>$request->category_id,
            "sub_category_id"=>$request->sub_category_id,
            "rank_id"=>$request->rank_id,
            "project_stage_id"=>isset( $request->project_stage_id) ?  $request->project_stage_id:null,
            "budget_type_id"=>$request->budget_type_id,
            "title"=>$request->title,
            "description"=>$request->description,
            "fixed_amount"=> isset($request->fixed_amount) ? $request->fixed_amount:null,
            "hourly_start_range"=> isset($request->hourly_start_range) ? $request->hourly_start_range:null,
            "hourly_end_range"=>isset($request->hourly_end_range) ? $request->hourly_end_range:null,
            "delivery_time"=>$request->delivery_time,
            "expected_start_date"=>$request->expected_start_date,

        ]);

       $job->deliverable()->sync($request->deliverables);
       $job->dod()->sync($request->dod);
       $job->skill()->sync($request->skills);


        $job = new Job();
        $job->title = $request->title;
        $job->user_id = $user->id;
        $job->category_id = $request->category;
        $job->sub_category_id = $request->subcategory ? $request->subcategory : null;
        $job->amount = $request->amount;
        $job->delivery_time = $request->delivery;
        $job->skill = $request->skill;
        $job->description = $request->description;
        $job->requirements = $request->requirement;
        $path = imagePath()['job']['path'];
        $size = imagePath()['job']['size'];
//        if ($request->hasFile('image')) {
//            $file = $request->image;
//            $this->fileValidate($file);
//            try {
//                $filename = uploadImage($file, $path, $size);
//            } catch (\Exception $exp) {
//                $notify[] = ['error', 'Image could not be uploaded.'];
//                return back()->withNotify($notify);
//            }
//            $job->image = $filename;
//        }

        $notify[] = ['success', 'Job has been created.'];
        return back()->withNotify($notify);
    }

    public function edit($slug, $id)
    {
        $user = Auth::user();
        $pageTitle = "Job Update";
        $job = Job::where('user_id', $user->id)->where('id', $id)->firstOrFail();
        return view($this->activeTemplate . 'user.buyer.job.edit', compact('pageTitle', 'job'));
    }

    public function update(Request $request, $id)
    {
        $general = GeneralSetting::first();
        $user = Auth::user();
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
            'title' => 'required|string|max:255',
            'category' => 'required|exists:categories,id',
            'subcategory' => 'nullable|exists:sub_categories,id',
            'amount' => 'required|numeric|gt:0',
            'delivery' => 'required|integer|min:1',
            'skill' => 'required|array|min:3|max:15',
            'description' => 'required',
            'requirement' => 'required',
        ]);
        $job = Job::where('id', $id)->where('user_id', $user->id)->firstOrFail();
        $job->title = $request->title;
        $job->user_id = $user->id;
        $job->category_id = $request->category;
        $job->sub_category_id = $request->subcategory ? $request->subcategory : null;
        $job->amount = $request->amount;
        $job->delivery_time = $request->delivery;
        $job->skill = $request->skill;
        $job->description = $request->description;
        $job->requirements = $request->requirement;
        $path = imagePath()['job']['path'];
        $size = imagePath()['job']['size'];
        if ($request->hasFile('image')) {
            $file = $request->image;
            $this->fileValidate($file);
            try {
                $filename = uploadImage($file, $path, $size, $job->image);
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Image could not be uploaded.'];
                return back()->withNotify($notify);
            }
            $job->image = $filename;
        }
        if ($general->approval_post == 1) {
            $job->status = 1;
        } else {
            $job->status = 0;
            $job->created_at = Carbon::now();
        }
        $job->updated_at = Carbon::now();
        $job->save();
        $notify[] = ['success', 'Job has been updated.'];
        return back()->withNotify($notify);
    }


    private function fileValidate($file)
    {
        $allowedExts = array('jpeg', 'jpg', 'png');
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

    public function getSkills(Request $request)
    {
        try {
            $category = Category::where('id', $request->category_id)->with(['skill' => function ($q) use($request){
                $q->when(isset($request->sub_category_id), function ($q) use ($request) {
                    $q->where('sub_category_id', $request->sub_category_id);
                });


            }])->get();

            $skill_categories = $category[0]->skill;
            $skill_categories = collect($skill_categories)->groupBy('skill_categories.name');

            $skills_with_categories = $skill_categories->map(function ($item, $key) {

                $grouped_skills = ($item->groupby('skill_type'));

                $result = $grouped_skills->map(function ($item, $key) {
                    return $item->toArray();
                });

                return $result->toArray();

            });
            return response()->json($skills_with_categories);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }
    }
}
