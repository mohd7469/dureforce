<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Skills;
use App\Models\SkillCategory;
use App\Models\Category;
use Carbon\Carbon;
use App\Models\JobBiding;
use App\Traits\DeleteEntity;

class JobController extends Controller
{
    use DeleteEntity;

    public function index()
    {
        try{
            $pageTitle = "Manage All Job";
    	$emptyMessage = "No data found";
    	$jobs = Job::latest()->withAll('user', 'category', 'subCategory','project_lengths')->paginate(getPaginate());
    	return view('admin.job.index', compact('pageTitle', 'emptyMessage', 'jobs'));
        } catch (\Exception $exp) {
                   DB::rollback();
                   return view('errors.500');
               }
    	
    }

    public function details($uuid)
    {
        try{
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
        } catch (\Exception $exp) {
                   DB::rollback();
                   return view('errors.500');
               }
    	
    }

    public function pending()
    {
        try{
            $pageTitle = "Pending Job";
            $emptyMessage = "No data found";
            $jobs = Job::where('status_id', 1)->latest()->with('user', 'category', 'subCategory')->paginate(getPaginate());
            return view('admin.job.index', compact('pageTitle', 'emptyMessage', 'jobs'));
        } catch (\Exception $exp) {
                   DB::rollback();
                   return view('errors.500');
               }
    
    }

    public function approved()
    {
        try{
            $pageTitle = "Approved Job";
    	$emptyMessage = "No data found";
    	$jobs = Job::where('status_id', 2)->latest()->with('user', 'category', 'subCategory')->paginate(getPaginate());
    	return view('admin.job.index', compact('pageTitle', 'emptyMessage', 'jobs'));
        } catch (\Exception $exp) {
                   DB::rollback();
                   return view('errors.500');
               }
    	
    }

    public function closed()
    {
        try{
            $pageTitle = "Closed Job";
        $emptyMessage = "No data found";
        $jobs = Job::where('status_id', 3)->latest()->with('user', 'category', 'subCategory')->paginate(getPaginate());
        return view('admin.job.index', compact('pageTitle', 'emptyMessage', 'jobs'));
        } catch (\Exception $exp) {
           DB::rollback();
          return view('errors.500');
               }
        
    }

    public function cancel()
    {
        try{
            $pageTitle = "Cancel Job";
    	$emptyMessage = "No data found";
    	$jobs = Job::where('status_id', 10)->latest()->with('user', 'category', 'subCategory')->paginate(getPaginate());
    	return view('admin.job.index', compact('pageTitle', 'emptyMessage', 'jobs'));
        } catch (\Exception $exp) {
             DB::rollback();
            return view('errors.500');
               }
    	
    }


    public function approvedBy(Request $request)
    {
        try{
            $request->validate([
                'id' => 'required|exists:jobs,id'
            ]);
            $job = Job::findOrFail($request->id);
            $job->status_id = 2;
            $job->created_at = Carbon::now();
            $job->save();
            $notify[] = ['success', 'Job has been approved'];
            return redirect()->back()->withNotify($notify);
        } catch (\Exception $exp) {
               DB::rollback();
                return view('errors.500');
               }
      
    }

    public function cancelBy(Request $request)
    {
        try{
            $request->validate([
                'id' => 'required|exists:jobs,id'
            ]);
            $job = Job::findOrFail($request->id);
            $job->status_id = 10;
            $job->created_at = Carbon::now();
            $job->save();
            $notify[] = ['success', 'Job has been canceled'];
            return redirect()->back()->withNotify($notify);
        } catch (\Exception $exp) {
               DB::rollback();
                return view('errors.500');
               }
        
    }


    public function closedBy(Request $request)
    {
        try{
            $request->validate([
                'id' => 'required|exists:jobs,id'
            ]);
            $job = Job::findOrFail($request->id);
            $job->status_id = 3;
            $job->created_at = Carbon::now();
            $job->save();
            $notify[] = ['success', 'Job has been closed'];
            return redirect()->back()->withNotify($notify);
        } catch (\Exception $exp) {
               DB::rollback();
                return view('errors.500');
               }
       
    }

    public function detailApprovedBy(Request $request)
    {
        try{
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
        } catch (\Exception $exp) {
               DB::rollback();
                return view('errors.500');
               }
       
    }

    public function detailCancelBy(Request $request)
    {
        try{
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
        } catch (\Exception $exp) {
               DB::rollback();
                return view('errors.500');
               }
        
    }


    public function detailClosedBy(Request $request)
    {
        try{
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
        } catch (\Exception $exp) {
               DB::rollback();
                return view('errors.500');
               }
        
    }


    public function jobCategory(Request $request)
    {
        try{
            $category = Category::findOrFail($request->category);
            $searchCategory = $category->id;
            $pageTitle = "Job search by category - " . $category->name;
            $emptyMessage = "No data found";
            $jobs = Job::where('category_id', $category->id)->with('category', 'user', 'subCategory')->latest()->paginate(getPaginate());
            return view('admin.job.index', compact('pageTitle', 'emptyMessage', 'jobs', 'searchCategory'));
        } catch (\Exception $exp) {
               DB::rollback();
                return view('errors.500');
               }
       
    }


    public function jobBiding($id)
    {
        try{
            $pageTitle = "Job Biding List";
            $emptyMessage = "No data found";
            $jobBidings = JobBiding::where('job_id', $id)->with('user')->latest()->paginate(getPaginate());
            return view('admin.job.job_biding', compact('pageTitle', 'emptyMessage', 'jobBidings'));
        } catch (\Exception $exp) {
               DB::rollback();
                return view('errors.500');
               }
       
    }


    public function jobBidingDetails($id)
    {
        try{
            $pageTitle = "Job Biding Details";
        $jobBidingDetails = JobBiding::where('id', $id)->firstOrFail();
        return view('admin.job.job_biding_details', compact('pageTitle', 'jobBidingDetails'));
        } catch (\Exception $exp) {
               DB::rollback();
                return view('errors.500');
               }
        
    }


    public function search(Request $request, $scope)
    {
        try{
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
        } catch (\Exception $exp) {
               DB::rollback();
                return view('errors.500');
               }
        
    }

    public function destroy($id)
    {
        try{
            $this->deleteEntity(Job::class,'job', $id);
            $notify[] = ['success', 'Job has been deleted'];
            return back()->withNotify($notify);
        } catch (\Exception $exp) {
               DB::rollback();
                return view('errors.500');
               }
      
    }

}
