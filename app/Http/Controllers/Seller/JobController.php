<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Job;
use App\Models\SkillCategory;
use App\Models\SubCategory;
use Illuminate\Http\Request;

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
    }
    
    /**
     * jobview
     *
     * @param  mixed $uuid
     * @return void
     */
    public function jobView($uuid){
        $pageTitle = "View Jobs";
        $job = Job::where('uuid', $uuid)->with(['category','user', 'status', 'rank', 'budgetType', 'status','documents','deliverable'])->first();
        $skillCats = SkillCategory::select('name', 'id')->get();

        $development_skils = Job::where('uuid', $uuid)->with(['skill.skill_categories'])->first();
        $data['selected_skills'] = $job->skill ? implode(',', $job->skill->pluck('id')->toArray()) : '';
        return view($this->activeTemplate .'job_view',compact('pageTitle','job','data'));
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
