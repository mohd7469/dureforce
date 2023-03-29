<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Service;
use App\Models\Software\Software;
use Illuminate\Http\Request;

class SoftwareController extends BaseController
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
    public function index(Request $request)
    {
        $softwares = Software::with('category', 'subCategory')->PublicFeatured();
        $draftSoftwares = Software::with('category', 'subCategory')->PublicFeatured();
        if (getLastLoginRoleId() == Role::$Freelancer){
            $softwares = $softwares->where('user_id', auth()->user()->id)->orderBy('created_at','desc');
            $draftSoftwares = $draftSoftwares->where('user_id', auth()->user()->id)->Status(Software::STATUSES['DRAFT'])->orderBy('created_at','desc');
        }
        else{
            $softwares = $softwares->Active()->Status(Software::STATUSES['APPROVED']);
            $draftSoftwares = $draftSoftwares->Active()->Status(Software::STATUSES['DRAFT']);
        }
        $softwares = $softwares->where($this->applyFilters($request))->with('tags', 'user')->paginate(10)->withQueryString();
        $totalSoftwares = $softwares->count();
        $draftSoftwares = $draftSoftwares->where($this->applyFilters($request))->with('tags', 'user')->paginate(10)->withQueryString();
        $totalDraftSoftwares = $draftSoftwares->count();


        $pageTitle = "Software";
        $emptyMessage = "No data found";
        $request->merge(['is_software_filter' => true]);


        if (getLastLoginRoleId() == Role::$Freelancer){
            return view($this->activeTemplate . 'software.software-list', compact('pageTitle', 'softwares', 'emptyMessage','totalSoftwares','draftSoftwares','totalDraftSoftwares'));

        }
        else{
             return view($this->activeTemplate . 'software.listing', compact('pageTitle', 'softwares', 'emptyMessage','totalSoftwares','draftSoftwares','totalDraftSoftwares'));

        }
    }    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function featured(Request $request)
    {
        $softwares = Software::Active()->Featured()->whereIn('status_id',[Software::STATUSES['APPROVED'],Software::STATUSES['FEATURED']])->with(['user', 'user.basicProfile', 'tags'])->paginate(getPaginate());;

        $pageTitle = "Software";
        $emptyMessage = "No data found";
        $request->merge(['is_software_filter' => true]);

        return view($this->activeTemplate . 'software.listing', compact('pageTitle', 'softwares', 'emptyMessage'));
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
}
