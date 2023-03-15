<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Service;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;

class ServiceController extends BaseController
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $services = Service::where($this->applyFilters($request))
        ->with(['user', 'user.basicProfile','category', 'subCategory' ])
            ->inRandomOrder();
        $draftServices = Service::where($this->applyFilters($request))
        ->with(['user', 'user.basicProfile','category', 'subCategory' ])
            ->inRandomOrder();
        if (getLastLoginRoleId() == Role::$Freelancer){
            $services = $services->where('user_id', auth()->user()->id);
            $draftServices = $draftServices->where('user_id', auth()->user()->id)->where('status_id',Service::STATUSES['DRAFT']);
        }
        else{
            $services = $services->where('status_id', Service::STATUSES['APPROVED']);
            $draftServices = $draftServices->where('status_id', Service::STATUSES['DRAFT']);
        }
        $services = $services->paginate(getPaginate())->withQueryString();
        $totalServices = $services->count();
        $draftServices = $draftServices->paginate(getPaginate())->withQueryString();
        $totalDraftServices = $draftServices->count();
        $pageTitle = "Service";
        $emptyMessage = "No data found";

        return view($this->activeTemplate . 'services.service-list', compact('pageTitle', 'services', 'emptyMessage','draftServices','totalServices','totalDraftServices'));
        // return view($this->activeTemplate . 'services.listing', compact('pageTitle', 'services', 'emptyMessage','draftServices'));
    }
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function featured(Request $request)
    {
        $services = Service::Active()->Featured()->whereIn('status_id',[Service::STATUSES['APPROVED'],Service::STATUSES['FEATURED']])->with(['user', 'user.basicProfile', 'tags' ])->paginate(getPaginate());
        $pageTitle = "Service";
        $emptyMessage = "No data found";
        return view($this->activeTemplate . 'services.listing', compact('pageTitle', 'services', 'emptyMessage'));
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
