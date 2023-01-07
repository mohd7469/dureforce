<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WorldLanguage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
class WorldLanguageController extends Controller
{
    public function index()
    {
        try {
            
    	$pageTitle = "World Language List";
    	$emptyMessage = "No data found";
        $worldLanguages = WorldLanguage::latest()->paginate(getPaginate());

        return view('admin.world_languages.index', compact('pageTitle','worldLanguages'));
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
         
       
        return view('admin.world_languages.create', compact('pageTitle'));
    }catch (\Exception $exp) {
       
        Log::error($exp->getMessage());
        $notify[] = ['error', 'An error occured'];
        return back()->withNotify($notify);
    }
    }
    public function store(Request $request)
    {
        $this->validate($request, [
           
            'iso_language_name' => 'required',
            'native_name' => 'required',
    
        ]);
        try {
            DB::beginTransaction();
       
        $worldLanguage  = new WorldLanguage();
    
        $worldLanguage->iso_language_name = $request->iso_language_name;
        $worldLanguage->native_name = $request->native_name;
        $worldLanguage->iso2 = $request->iso2;
        $worldLanguage->iso3 = $request->iso3;
       
        $worldLanguage->save();
        DB::commit();
        Log::info(["worldLanguage" => $worldLanguage]);
        
        $notify[] = ['success', 'Your world language detail has been Created.'];
        return redirect()->route('admin.world.language.index')->withNotify($notify);
    }catch (\Exception $exp) {
        DB::rollback();
        Log::error($exp->getMessage());
        $notify[] = ['error', 'An error occured'];
        return back()->withNotify($notify);
    }
    }
    public function editdetails($id){
        try {
            
        $worldLanguage = WorldLanguage::findOrFail($id);
        $pageTitle = "Manage All World Language Details";
        $emptyMessage = 'No shortcode available';
        return view('admin.world_languages.edit', compact('pageTitle', 'worldLanguage','emptyMessage'));
    }catch (\Exception $exp) {
        
        Log::error($exp->getMessage());
        $notify[] = ['error', 'An error occured'];
        return back()->withNotify($notify);
    }
    }
    public function update(Request $request, $id){
        $this->validate($request, [
           
            'iso_language_name' => 'required',
            'native_name' => 'required',
            
        ]);
        try {
            DB::beginTransaction();
        $worldLanguage = WorldLanguage::findOrFail($id);
      
     
        $worldLanguage->iso_language_name = $request->iso_language_name;
        $worldLanguage->native_name = $request->native_name;
        $worldLanguage->iso2 = $request->iso2;
        $worldLanguage->iso3 = $request->iso3;
        
        $worldLanguage->save();
        DB::commit();
        Log::info(["worldLanguage" => $worldLanguage]);
        $notify[] = ['success', 'World Language detail has been updated'];
        return redirect()->route('admin.world.language.index')->withNotify($notify);
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
        $worldLanguage = WorldLanguage::find($id);
       
        $worldLanguage->delete();
        DB::commit();
        Log::info(["worldLanguage" => $worldLanguage]);
        $notify[] = ['success', 'World Language deleted successfully'];
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
