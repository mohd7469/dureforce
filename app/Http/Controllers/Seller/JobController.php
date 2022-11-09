<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Job;
use App\Models\SkillCategory;
use App\Models\Status;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use WpOrg\Requests\Auth;

class JobController extends Controller
{
   
    public function __construct()
    {
        $this->activeTemplate = activeTemplate();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($category = null)
    {
        try{
            $jobs = Job::where('status_id',1)->with(['skill','proposal','country','user','category'])->orderBy('created_at','DESC')->get();
        
            $categories = Category::with('subCategory')->get();
            if($category == null){
                $Categorytitle = Category::where('id',$categories->pluck('id')->first())->first();
                $subcategories=SubCategory::where('category_id',$categories->pluck('id')->first())->get();
            }else{
                $Categorytitle = Category::where('id',$category)->first();
                $subcategories=SubCategory::where('category_id', $category)->get();
            }
    
            return view('templates.basic.user.seller.job.jobs_listing')->with('jobs',$jobs)->with('categories', $categories)->with('subcategories', $subcategories)->with('Categorytitle', $Categorytitle );
       
        } catch (\Exception $exp) {
                   DB::rollback();
                   return view('errors.500');
               }
     }    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexNew($category = null)
    {
        try{
            $user = auth()->user();
            $user_saved_jobs = $user->save_job->where('status_id',Job::$Approved);
            $user_saved_jobs_ids = $user_saved_jobs->pluck('id')->toArray();
    
            $jobs = Job::where('status_id',Job::$Approved)->with(['skill','proposal','country','user','category','project_length'])->orderBy('created_at','DESC')->get();
    
            $categories = Category::with('subCategory')->get();
            if($category == null){
                $Categorytitle = Category::where('id',$categories->pluck('id')->first())->first();
                $subcategories=SubCategory::where('category_id',$categories->pluck('id')->first())->get();
            }else{
                $Categorytitle = Category::where('id',$category)->first();
                $subcategories=SubCategory::where('category_id', $category)->get();
            }
    
            return view('templates.basic.user.seller.job.job_listing_new')->with('jobs',$jobs)->with('categories', $categories)->with('subcategories', $subcategories)->with('Categorytitle', $Categorytitle )->with('user_saved_jobs_ids',$user_saved_jobs_ids)->with('user_saved_jobs',$user_saved_jobs);
       
        } catch (\Exception $exp) {
                   DB::rollback();
                   return view('errors.500');
               }

      }
    public function saveJob($job_id)
    {
        try {
            $user = auth()->user();
            $user->save_job()->attach($job_id);
            return redirect('seller/jobs-listing');

        }
        catch (\Exception $e){
            return view('errors.500');
        }

    }
    public function saveSingleJobView($job_id)
    {
        try {
            $job = Job::find($job_id);
            $user = auth()->user();
            $user->save_job()->attach($job_id);
            return redirect('seller/job-detail/'.$job->uuid);

        }
        catch (\Exception $e){
            return view('errors.500');
        }

    }
    public function removeSavedJob($job_id)
    {
        try {
            $user = auth()->user();
            $user->save_job()->detach($job_id);
            return redirect('seller/jobs-listing');

        }
        catch (\Exception $e){
            return view('errors.500');
        }

    }
    public function removeSavedSingleJobView($job_id)
    {

        try {
            $job = Job::find($job_id);

            $user = auth()->user();
            $user->save_job()->detach($job_id);

            return redirect('seller/job-detail/'.$job->uuid);

        }
        catch (\Exception $e){
            return view('errors.500');
        }

    }
    
    /**
     * jobview
     *
     * @param  mixed $uuid
     * @return void
     */
    public function jobView($uuid){
        try{
            $pageTitle = "View Jobs";
            $job = Job::where('uuid', $uuid)->with(['category','user', 'status', 'rank', 'budgetType', 'status','documents','deliverable'])->first();
            $skillCats = SkillCategory::select('name', 'id')->get();
            $client_jobs = Job::where('user_id',$job['user_id'])->get();
            $client_total_jobs = $client_jobs->count();
            $client_open_jobs = $client_jobs->where('status_id',Status::$Approved)->count();
    
            $user_saved_jobs = auth()->user()->save_job->pluck('id')->toArray();
    
            $development_skils = Job::where('uuid', $uuid)->with(['skill.skill_categories'])->first();
            $data['selected_skills'] = $job->skill ? implode(',', $job->skill->pluck('id')->toArray()) : '';
            return view($this->activeTemplate .'job_view',compact('pageTitle','job','data','client_total_jobs','client_open_jobs','user_saved_jobs'));
       
        } catch (\Exception $exp) {
                   DB::rollback();
                   return view('errors.500');
               }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    
}
