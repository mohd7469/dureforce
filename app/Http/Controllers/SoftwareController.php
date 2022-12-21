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
        $softwares = Software::PublicFeatured();

        if (getLastLoginRoleId() == Role::$Freelancer){
            $softwares = $softwares->where('user_id', auth()->user()->id);
        }
        else{
            $softwares = $softwares->Active()->Status(Software::STATUSES['APPROVED']);
        }
        $softwares = $softwares->where($this->applyFilters($request))->with('tags', 'user')->inRandomOrder()->paginate(getPaginate())->withQueryString();

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
