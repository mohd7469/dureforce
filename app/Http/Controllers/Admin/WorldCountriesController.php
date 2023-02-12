<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Continent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
class WorldCountriesController extends Controller
{
    public function index()
    {
        try {
            
    	$pageTitle = "World Countries";
    	$emptyMessage = "No data found";
        $worldCountries = Country::with('continent')->latest()->paginate(getPaginate());  
        return view('admin.world_countries.index', compact('pageTitle','worldCountries'));
    }catch (\Exception $exp) {

        Log::error($exp->getMessage());
        $notify[] = ['error', 'An error occured'];
        return back()->withNotify($notify);
    }
    }
    public function Create()
    {
        try {
    	$pageTitle = "World Countries";
        $continents = Continent::select('id', 'name')->get();
        return view('admin.world_countries.create', compact('pageTitle','continents'));
    }catch (\Exception $exp) {
       
        Log::error($exp->getMessage());
        $notify[] = ['error', 'An error occured'];
        return back()->withNotify($notify);
    }
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'continent'=> 'required',
            'name'=> 'required',
            'full_name'=> 'required',
            'capital'=> 'required',
            'code'=> 'required|max:4',
            'code_alpha3' => 'max:6',
            'code_numeric'=> 'required|max:6',
            'currency_code'=> 'required|max:3',
            'currency_name'=> 'required|max:128',
            'tld' => 'max:8',
            'callingcode'=> 'required|max:8',

        ]);
        try {
        DB::beginTransaction();
        $worldCountries  = new Country();
        $worldCountries->continent_id = $request->continent;
        $worldCountries->name = $request->name;
        $worldCountries->full_name = $request->full_name;
        $worldCountries->capital = $request->capital;
        $worldCountries->code = $request->code;
        $worldCountries->code_alpha3 = $request->code_alpha3;
        $worldCountries->code_numeric = $request->code_numeric;
        $worldCountries->emoji = $request->emoji;
        $worldCountries->currency_code = $request->currency_code;
        $worldCountries->currency_name = $request->currency_name;
        $worldCountries->tld = $request->tld;
        $worldCountries->callingcode = $request->callingcode;

        $worldCountries->save();
        DB::commit();
        Log::info(["worldCountries" => $worldCountries]);
        
        $notify[] = ['success', 'Your world country detail has been Created.'];
        storeRedisData(Country::$Model_Name_Space,Country::$Redis_key,Country::$Is_Active);
        return redirect()->route('admin.world.country.index')->withNotify($notify);
    }catch (\Exception $exp) {
        DB::rollback();
        Log::error($exp->getMessage());
        $notify[] = ['error', 'An error occured'];
        return back()->withNotify($notify);
    }
    }
    public function editdetails($id){
        try {
            
        $worldCountry = Country::findOrFail($id);
        $continents = Continent::select('id', 'name')->get();
        $pageTitle = "Manage All World countries Details";
        $emptyMessage = 'No shortcode available';
        return view('admin.world_countries.edit', compact('pageTitle', 'worldCountry','emptyMessage','continents'));
    }catch (\Exception $exp) {
        
        Log::error($exp->getMessage());
        $notify[] = ['error', 'An error occured'];
        return back()->withNotify($notify);
    }
    }
    public function update(Request $request, $id){

        $this->validate($request, [
           
            'continent'=> 'required',
            'name'=> 'required',
            'full_name'=> 'required',
            'capital'=> 'required',
            'code'=> 'required|max:4',

            'code_alpha3' => 'max:6',
            'code_numeric'=> 'required|max:6',
            'currency_code'=> 'required|max:3',
            'currency_name'=> 'required|max:128',
            'tld' => 'max:8',
            'callingcode'=> 'required|max:8',
            
        ]);
        try {
            DB::beginTransaction();
        $worldCountries = Country::findOrFail($id);

        $worldCountries->continent_id = $request->continent;
        $worldCountries->name = $request->name;
        $worldCountries->full_name = $request->full_name;
        $worldCountries->capital = $request->capital;
        $worldCountries->code = $request->code;
        $worldCountries->code_alpha3 = $request->code_alpha3;
        $worldCountries->code_numeric = $request->code_numeric;
        $worldCountries->emoji = $request->emoji;
        $worldCountries->currency_code = $request->currency_code;
        $worldCountries->currency_name = $request->currency_name;
        $worldCountries->tld = $request->tld;
        $worldCountries->callingcode = $request->callingcode;
        
        $worldCountries->save();
        DB::commit();
        Log::info(["worldCountries" => $worldCountries]);
        $notify[] = ['success', 'World country detail has been updated'];
        storeRedisData(Country::$Model_Name_Space,Country::$Redis_key,Country::$Is_Active);
        return redirect()->route('admin.world.country.index')->withNotify($notify);
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
        $worldCountry = Country::find($id);
       
        $worldCountry->delete();
        DB::commit();
        Log::info(["worldCountry" => $worldCountry]);
        $notify[] = ['success', 'World Country deleted successfully'];
        storeRedisData(Country::$Model_Name_Space,Country::$Redis_key,Country::$Is_Active);
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
