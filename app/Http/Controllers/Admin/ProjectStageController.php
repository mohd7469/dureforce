<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProjectStage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Module;
use Carbon\Carbon;
class ProjectStageController extends Controller
{
    public function index()
    {
        try {
            
    	$pageTitle = "Project Stage List";
    	$emptyMessage = "No data found";
        $projects = ProjectStage::latest()->paginate(getPaginate());

        return view('admin.projects.index', compact('pageTitle','projects'));
    }catch (\Exception $exp) {
        
        Log::error($exp->getMessage());
        $notify[] = ['error', 'An error occured'];
         return back()->withNotify($notify);
    }
    
    }
    public function Create()
    {
        try {
            
    	$pageTitle = "Create Project stage";
         $modules = Module::all();
       
        return view('admin.projects.create', compact('pageTitle','modules'));
      }catch (\Exception $exp) {
       
        Log::error($exp->getMessage());
        $notify[] = ['error', 'An error occured'];
            return back()->withNotify($notify);
    }
    }
    public function store(Request $request)
    {
    
        $this->validate($request, [
           
            'title' => 'required',
            
            
            
        ]);
        try {
            DB::beginTransaction();
       
        $project  = new ProjectStage();
        
        $project->module_id = $request->module_id;
        $project->title = $request->title;
        
       
        // $dod->module_id = 1;
       
        $project->save();
        DB::commit();
        Log::info(["project" => $project]);
        
        $notify[] = ['success', 'Your Project detail detail has been Created.'];
        return redirect()->route('admin.project.index')->withNotify($notify);
    }catch (\Exception $exp) {
        DB::rollback();
        Log::error($exp->getMessage());
        $notify[] = ['error', 'An error occured'];
        return back()->withNotify($notify);
    }
    }
    public function editdetails($id){
        try {
            
        $project = ProjectStage::findOrFail($id);
        $pageTitle = "Manage All Project Detail";
        $emptyMessage = 'No shortcode available';
        return view('admin.projects.edit', compact('pageTitle', 'project','emptyMessage'));
    }catch (\Exception $exp) {
       
        Log::error($exp->getMessage());
        $notify[] = ['error', 'An error occured'];
        return back()->withNotify($notify);
    }
    }
    public function update(Request $request, $id){
        $this->validate($request, [
           
            'title' => 'required',
         ]);
         try {
            DB::beginTransaction();
        
        $project = ProjectStage::findOrFail($id);
      
     
        $project->title = $request->title;
        $project->save();
        DB::commit();
        Log::info(["project" => $project]);

        $notify[] = ['success', 'Project Details has been updated'];
        return redirect()->route('admin.project.index')->withNotify($notify);
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
        $project = ProjectStage::find($id);
       
        $project->delete();
        DB::commit();
        Log::info(["project" => $project]);
        $notify[] = ['success', 'Project stage deleted successfully'];
        return back()->withNotify($notify);
    }
    catch (\Exception $exp) {
        DB::rollback();
        Log::error($exp->getMessage());
        $notify[] = ['error', 'An error occured'];
        return back()->withNotify($notify);
    }
    }
   
    
    public function activeBy(Request $request)
    {
        try {
            DB::beginTransaction();
        
        $project = ProjectStage::findOrFail($request->id);
        $project->is_active = 1;
        $project->created_at = Carbon::now();
        $project->save();
        DB::commit();
        Log::info(["project" => $project]);
        $notify[] = ['success', 'Project stage has been Activated'];
        return redirect()->back()->withNotify($notify);
    }
    catch (\Exception $exp) {
        DB::rollback();
        Log::error($exp->getMessage());
        $notify[] = ['error', 'An error occured'];
        return back()->withNotify($notify);
    }
    }
    public function inActiveBy(Request $request)
    {
        try {
            DB::beginTransaction();
        $project = ProjectStage::findOrFail($request->id);
        $project->is_active = 0;
        $project->created_at = Carbon::now();
        $project->save();
        DB::commit();
        Log::info(["project" => $project]);
        $notify[] = ['success', 'Project stage has been inActive'];
        return redirect()->back()->withNotify($notify);
    }
    catch (\Exception $exp) {
        DB::rollback();
        Log::error($exp->getMessage());
        $notify[] = ['error', 'An error occured'];
        return back()->withNotify($notify);
    }
    }
}
