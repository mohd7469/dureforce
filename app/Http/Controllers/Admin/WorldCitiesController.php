<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WorldCities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
class WorldCitiesController extends Controller
{
    public function index()
    {
        try {
            $pageTitle = "World Cities List";
            $emptyMessage = "No data found";
            $worldCities = WorldCities::latest()->paginate(getPaginate());
            return view('admin.world_cities.index', compact('pageTitle','worldCities'));
        }catch (\Exception $exp) {
            Log::error($exp->getMessage());
            $notify[] = ['error', 'An error occured'];
            return back()->withNotify($notify);
        }
    }
    public function Create()
    {
        try {
            $pageTitle = "World Language Degree";
            return view('admin.world_cities.create', compact('pageTitle'));
        }catch (\Exception $exp) {
            Log::error($exp->getMessage());
            $notify[] = ['error', 'An error occured'];
            return back()->withNotify($notify);
        }
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'country_id'=> 'required',
            'division_id'=> 'required',
            'name'=> 'required',
            'code'=> 'required',

        ]);
        try {
        DB::beginTransaction();
            $worldCities  = new WorldCities();
            $worldCities->country_id = $request->country_id;
            $worldCities->division_id = $request->division_id;
            $worldCities->name = $request->name;
            $worldCities->code = $request->code;
            $worldCities->full_name = $request->full_name;
            $worldCities->iana_timezone = $request->iana_timezone;

            $worldCities->save();
            DB::commit();
            Log::info(["worldCities" => $worldCities]);
            
            $notify[] = ['success', 'Your world city detail has been Created.'];
            return redirect()->route('admin.world.cities.index')->withNotify($notify);
        }catch (\Exception $exp) {
            DB::rollback();
            Log::error($exp->getMessage());
            $notify[] = ['error', 'An error occured'];
            return back()->withNotify($notify);
        }
    }
    public function editdetails($id){
        try {  
            $worldCities = WorldCities::findOrFail($id);
            $pageTitle = "Manage All World cities Details";
            $emptyMessage = 'No shortcode available';
            return view('admin.world_cities.edit', compact('pageTitle', 'worldCities','emptyMessage'));
        }catch (\Exception $exp) {
            
            Log::error($exp->getMessage());
            $notify[] = ['error', 'An error occured'];
            return back()->withNotify($notify);
        }
    }
    public function update(Request $request, $id){
        $this->validate($request, [
            'country_id'=> 'required',
            'division_id'=> 'required',
            'name'=> 'required',
            'code'=> 'required',
        ]);
        try {
            DB::beginTransaction();
            $worldCities = WorldCities::findOrFail($id);

            $worldCities->country_id = $request->country_id;
            $worldCities->division_id = $request->division_id;
            $worldCities->name = $request->name;
            $worldCities->code = $request->code;
            $worldCities->full_name = $request->full_name;
            $worldCities->iana_timezone = $request->iana_timezone;
            
            $worldCities->save();
            DB::commit();
            Log::info(["worldCities" => $worldCities]);
            $notify[] = ['success', 'World city detail has been updated'];
            return redirect()->route('admin.world.cities.index')->withNotify($notify);
        }
        catch (\Exception $exp) {
            DB::rollback();
            Log::error($exp->getMessage());
            $notify[] = ['error', 'An error occured'];
            return back()->withNotify($notify);
        }
    }
    public function delete($id)
    {
        try {
            DB::beginTransaction();
            $worldCities = WorldCities::find($id);
            $worldCities->delete();
            DB::commit();
            Log::info(["worldCities" => $worldCities]);
            $notify[] = ['success', 'World City deleted successfully'];
            return back()->withNotify($notify);
        }
        catch (\Exception $exp) {
            DB::rollback();
            Log::error($exp->getMessage());
            $notify[] = ['error', 'An error occured'];
            return back()->withNotify($notify);
        }
    }
}
