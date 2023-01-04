<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LanguageLevel;
use App\Models\Module;
use Illuminate\Http\Request;
use App\Models\ProjectLength;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
class LanguageLevelsController extends Controller
{
    public function index()
    {
        try {
            DB::beginTransaction();
    	$pageTitle = "Language Levels List";
    	$emptyMessage = "No data found";
        $languageLavels = LanguageLevel::with('modules')->latest()->paginate(getPaginate());    
        return view('admin.language_levels.index', compact('pageTitle','languageLavels'));
    }catch (\Exception $exp) {
        DB::rollback();
        Log::error($exp->getMessage());
        return response()->json(["error" => $exp]);
    }
    }
    public function Create()
    {
        try {
            DB::beginTransaction();
    	$pageTitle = "Create Language Level";
        $modules = Module::select('id', 'name')->get();
        return view('admin.language_levels.create', compact('pageTitle','modules'));
    }catch (\Exception $exp) {
        DB::rollback();
        Log::error($exp->getMessage());
        return response()->json(["error" => $exp]);
    }
    }
    public function store(Request $request)
    {
    
        $this->validate($request, [
           
            'title' => 'required',
            'slug' => 'required',
            'module' => 'required',
        ]);
        try {
            DB::beginTransaction();
       
        $languageLavel  = new LanguageLevel();
        
       
        $languageLavel->name = $request->title;
        $languageLavel->slug = $request->slug;
        $languageLavel->module_id = $request->module;
       
        // $dod->module_id = 1;
       
        $languageLavel->save();
        DB::commit();
        Log::info(["languageLavel" => $languageLavel]);
        
        $notify[] = ['success', 'Your Degree Language Lavel has been Created.'];
        return redirect()->route('admin.language.level.index')->withNotify($notify);
    }catch (\Exception $exp) {
        DB::rollback();
        Log::error($exp->getMessage());
        return response()->json(["error" => $exp]);
    }
    }
    public function editdetails($id){
        try {
            DB::beginTransaction();
        $languageLavel = LanguageLevel::findOrFail($id);
        $modules = Module::select('id', 'name')->get();
        $pageTitle = "Manage All Language Levels Details";
        $emptyMessage = 'No shortcode available';
        return view('admin.language_levels.edit', compact('pageTitle', 'languageLavel','emptyMessage','modules'));
    }catch (\Exception $exp) {
        DB::rollback();
        Log::error($exp->getMessage());
        return response()->json(["error" => $exp]);
    }
    }
    public function update(Request $request, $id){
        $this->validate($request, [
           
            'title' => 'required',
            'slug' => 'required',
            'module' => 'required',
        ]);
        try {
            DB::beginTransaction();
        $languageLavel = LanguageLevel::findOrFail($id);
    
        $languageLavel->name = $request->title;
        $languageLavel->slug = $request->slug;
        $languageLavel->module_id = $request->module;
        
        $languageLavel->save();
        DB::commit();
        Log::info(["languageLavel" => $languageLavel]);
        $notify[] = ['success', 'Language Level detail has been updated'];
        return redirect()->route('admin.language.level.index')->withNotify($notify);
    }
    catch (\Exception $exp) {
        DB::rollback();
        Log::error($exp->getMessage());
        return response()->json(["error" => $exp]);
    }
    }

    public function destroy($id)
    {
        $this->deleteEntity(Banner::class,'job', $id);
        $notify[] = ['success', 'Job has been deleted'];
        return back()->withNotify($notify);
    }
    
    public function delete($id)
    {
        try {
            DB::beginTransaction();
        $languageLavel = LanguageLevel::find($id);
       
        $languageLavel->delete();
        DB::commit();
        Log::info(["languageLavel" => $languageLavel]);
        $notify[] = ['success', 'Language Level deleted successfully'];
        return back()->withNotify($notify);
    }
    catch (\Exception $exp) {
        DB::rollback();
        Log::error($exp->getMessage());
        return response()->json(["error" => $exp]);
    }
    }
    public function activeBy(Request $request)
    {
        try {
            DB::beginTransaction();
        $languageLavel = LanguageLevel::findOrFail($request->id);
        $languageLavel->is_active = 1;
        $languageLavel->created_at = Carbon::now();
        $languageLavel->save();
        DB::commit();
        Log::info(["languageLavel" => $languageLavel]);
        $notify[] = ['success', 'Language Level has been Activated'];
        return redirect()->back()->withNotify($notify);
    }
    catch (\Exception $exp) {
        DB::rollback();
        Log::error($exp->getMessage());
        return response()->json(["error" => $exp]);
    }
    }
    public function inActiveBy(Request $request)
    {
        try {
            DB::beginTransaction();
        $languageLavel = LanguageLevel::findOrFail($request->id);
        $languageLavel->is_active = 0;
        $languageLavel->created_at = Carbon::now();
        $languageLavel->save();
        DB::commit();
        Log::info(["languageLavel" => $languageLavel]);
        $notify[] = ['success', 'Language Level has been inActive'];
        return redirect()->back()->withNotify($notify);
    }
    catch (\Exception $exp) {
        DB::rollback();
        Log::error($exp->getMessage());
        return response()->json(["error" => $exp]);
    }
    }
}
