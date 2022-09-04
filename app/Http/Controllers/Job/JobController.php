<?php

namespace App\Http\Controllers\Job;
use App\Http\Controllers\BaseController;
use App\Models\Job;

use Illuminate\Support\Facades\Response as FacadeResponse;


use Illuminate\Http\Request;
use function getPaginate;
use function view;

class JobController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $pageTitle = "All Jobs";
        $emptyMessage = "No data found";
        $jobs = Job::where('status', 1)->whereHas('category', function ($q) {
            $q->where('status', 1);
        })->where($this->applyFilters($request))->with('user', 'user.rank', 'jobBiding')->paginate(getPaginate())->withQueryString();
        // return view($this->activeTemplate . 'jobs.listing', compact('pageTitle', 'jobs', 'emptyMessage'));
        return view($this->activeTemplate . 'jobs.listing', compact('pageTitle', 'jobs', 'emptyMessage'));
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

    
    public function jobview(){
      
        $pageTitle = "View Jobs";
         return view($this->activeTemplate .'job_view',compact('pageTitle'));
     }

}
