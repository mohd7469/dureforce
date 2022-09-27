<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Job;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class JobController extends Controller
{
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
            $subcategories=SubCategory::where('category_id',$categories->pluck('id')->first())->get();
        }else{
            $subcategories=SubCategory::where('category_id', $category)->get();
        }
        
        
        

        return view('templates.basic.user.seller.job.jobs_listing')->with('jobs',$jobs)->with('categories', $categories)->with('subcategories', $subcategories);
    }
    // public function subcategory($category){
    //     $subcategories=SubCategory::where('category_id', $category)->get();
    //     return view('templates.basic.user.seller.job.jobs_listing')->with('subcategories',$subcategories);

    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
