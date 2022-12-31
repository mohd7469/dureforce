<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Proposal;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Skills;
use App\Models\SkillCategory;
use App\Models\Category;
use Carbon\Carbon;
use App\Models\JobBiding;
use App\Traits\DeleteEntity;
use Illuminate\Support\Facades\DB;

class JobController extends Controller
{
    use DeleteEntity;

    public function index()
    {
    	$pageTitle = "Manage All Job";
    	$emptyMessage = "No data found";
    	$jobs = Job::latest()->withAll('user', 'category', 'subCategory','project_lengths')->paginate(getPaginate());
    	return view('admin.job.index', compact('pageTitle', 'emptyMessage', 'jobs'));
    }

    public function details($uuid)
    {
    	$pageTitle = "Job Details";

        $job = Job::where('uuid',$uuid)->withAll()->first();
        if(isset($job)){
            $skillCats = SkillCategory::select('name', 'id')->get();
            foreach ($skillCats as $skillCat) {
                $skills = Skills::where('skill_category_id', $skillCat->id)->groupBy('skill_category_id')->get();
            }
            $development_skils = Job::where('uuid', $uuid)->with(['skill.skill_categories'])->first();
            $data['selected_skills'] = $job->skill ? implode(',', $job->skill->pluck('id')->toArray()) : '';
    
        }else{
            $data['selected_skills'] = '';
        }

    	return view('admin.job.details', compact('pageTitle', 'job', 'data'));
    }

    public function pending()
    {
    	$pageTitle = "Pending Job";
    	$emptyMessage = "No data found";
    	$jobs = Job::where('status_id', 1)->latest()->with('user', 'category', 'subCategory')->paginate(getPaginate());
    	return view('admin.job.index', compact('pageTitle', 'emptyMessage', 'jobs'));
    }

    public function approved()
    {
    	$pageTitle = "Approved Job";
    	$emptyMessage = "No data found";
    	$jobs = Job::where('status_id', 2)->latest()->with('user', 'category', 'subCategory')->paginate(getPaginate());
    	return view('admin.job.index', compact('pageTitle', 'emptyMessage', 'jobs'));
    }

    public function closed()
    {
        $pageTitle = "Closed Job";
        $emptyMessage = "No data found";
        $jobs = Job::where('status_id', 3)->latest()->with('user', 'category', 'subCategory')->paginate(getPaginate());
        return view('admin.job.index', compact('pageTitle', 'emptyMessage', 'jobs'));
    }

    public function cancel()
    {
    	$pageTitle = "Cancel Job";
    	$emptyMessage = "No data found";
    	$jobs = Job::where('status_id', 10)->latest()->with('user', 'category', 'subCategory')->paginate(getPaginate());
    	return view('admin.job.index', compact('pageTitle', 'emptyMessage', 'jobs'));
    }


    public function approvedBy(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:jobs,id'
        ]);
        $job = Job::findOrFail($request->id);
        $job->status_id = 2;
        $job->created_at = Carbon::now();
        $job->save();
        $notify[] = ['success', 'Job has been approved'];
        return redirect()->back()->withNotify($notify);
    }

    public function cancelBy(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:jobs,id'
        ]);
        $job = Job::findOrFail($request->id);
        $job->status_id = 10;
        $job->created_at = Carbon::now();
        $job->save();
        $notify[] = ['success', 'Job has been canceled'];
        return redirect()->back()->withNotify($notify);
    }


    public function closedBy(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:jobs,id'
        ]);
        $job = Job::findOrFail($request->id);
        $job->status_id = 3;
        $job->created_at = Carbon::now();
        $job->save();
        $notify[] = ['success', 'Job has been closed'];
        return redirect()->back()->withNotify($notify);
    }

    public function detailApprovedBy(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:jobs,id'
        ]);
        $job = Job::findOrFail($request->id);
        $job->status_id = 2;
        $job->created_at = Carbon::now();
        $job->save();
        $notify[] = ['success', 'Job has been approved'];
        // return redirect()->back()->withNotify($notify);
    	return redirect('admin/job/details/'.$job->uuid)->withNotify($notify);
    }

    public function detailCancelBy(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:jobs,id'
        ]);
        $job = Job::findOrFail($request->id);
        $job->status_id = 10;
        $job->created_at = Carbon::now();
        $job->save();
        $notify[] = ['success', 'Job has been canceled'];
        // return redirect()->back()->withNotify($notify);
        return redirect('admin/job/details/'.$job->uuid)->withNotify($notify);
    }


    public function detailClosedBy(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:jobs,id'
        ]);
        $job = Job::findOrFail($request->id);
        $job->status_id = 3;
        $job->created_at = Carbon::now();
        $job->save();
        $notify[] = ['success', 'Job has been closed'];
        // return redirect()->back()->withNotify($notify);
        return redirect('admin/job/details/'.$job->uuid)->withNotify($notify);
    }


    public function jobCategory(Request $request)
    {
        $category = Category::findOrFail($request->category);
        $searchCategory = $category->id;
        $pageTitle = "Job search by category - " . $category->name;
        $emptyMessage = "No data found";
        $jobs = Job::where('category_id', $category->id)->with('category', 'user', 'subCategory')->latest()->paginate(getPaginate());
        return view('admin.job.index', compact('pageTitle', 'emptyMessage', 'jobs', 'searchCategory'));
    }


    public function jobBiding($id)
    {
        $pageTitle = "Job Biding List";
        $emptyMessage = "No data found";
        $jobBidings = JobBiding::where('job_id', $id)->with('user')->latest()->paginate(getPaginate());
        return view('admin.job.job_biding', compact('pageTitle', 'emptyMessage', 'jobBidings'));
    }


    public function jobBidingDetails($id)
    {
        $pageTitle = "Job Biding Details";
        $jobBidingDetails = JobBiding::where('id', $id)->firstOrFail();
        return view('admin.job.job_biding_details', compact('pageTitle', 'jobBidingDetails'));
    }


    public function search(Request $request, $scope)
    {
        $search = $request->search;
        $jobs = Job::where(function ($jobs) use ($search) {
            $jobs->where('amount', $search)
                ->orWhereHas('user', function ($user) use ($search) {
                    $user->where('username', 'like', "%$search%");
                });
            });
        $pageTitle = '';
        switch ($scope) {
            case 'approved':
                $pageTitle .= 'Approved ';
                $jobs = $jobs->where('status', 1);
                break;
            case 'pending':
                $pageTitle .= 'Pending ';
                $jobs = $jobs->where('status', 0);
                break;
            case 'closed':
                $pageTitle .= 'Cancel ';
                $jobs = $jobs->where('status', 2);
                break;
            case 'cancel':
                $pageTitle .= 'Cancel ';
                $jobs = $jobs->where('status', 3);
                break;
        }
        $jobs = $jobs->latest()->paginate(getPaginate());
        $pageTitle .= 'Job search by - ' . $search;
        $emptyMessage = 'No data found';
        return view('admin.job.index', compact('pageTitle', 'search', 'scope', 'emptyMessage', 'jobs'));
    }

    public function destroy($id)
    {

        try {
            DB::beginTransaction();
            $job = Job::where("id", $id)->first();

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
            $notify[] = ['success', 'Job has been deleted'];
            return back()->withNotify($notify);

        } catch (\Exception $e) {
            DB::rollBack();
            $notify[] = ['success', 'Job delete failed'];
            return back()->withNotify($notify);

        }

    }
}
