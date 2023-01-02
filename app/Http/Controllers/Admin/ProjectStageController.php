<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProjectStage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Module;
use Carbon\Carbon;
class ProjectStageController extends Controller
{
    public function index()
    {
        
    	$pageTitle = "Project Stage List";
    	$emptyMessage = "No data found";
        $projects = ProjectStage::latest()->paginate(getPaginate());

        return view('admin.projects.index', compact('pageTitle','projects'));
    }
    public function Create()
    {
    	$pageTitle = "Create Project stage";
         $modules = Module::all();
       
    	return view('admin.projects.create', compact('pageTitle','modules'));
    }
    public function store(Request $request)
    {
    
        $this->validate($request, [
           
            'title' => 'required',
            
            
            
        ]);
       
        $project  = new ProjectStage();
        
        $project->module_id = $request->module_id;
        $project->title = $request->title;
        
       
        // $dod->module_id = 1;
       
        $project->save();

        
        $notify[] = ['success', 'Your Project detail detail has been Created.'];
        return redirect()->route('admin.project.index')->withNotify($notify);
    }
    public function editdetails($id){
        $project = ProjectStage::findOrFail($id);
        $pageTitle = "Manage All Project Detail";
        $emptyMessage = 'No shortcode available';
        return view('admin.projects.edit', compact('pageTitle', 'project','emptyMessage'));
    }
    public function update(Request $request, $id){
        $this->validate($request, [
           
            'title' => 'required',
         ]);
        
        $project = ProjectStage::findOrFail($id);
      
     
        $project->title = $request->title;
        $project->save();

        $notify[] = ['success', 'Project Details has been updated'];
        return redirect()->route('admin.project.index')->withNotify($notify);
    }
    public function delete($id)
    {
        $project = ProjectStage::find($id);
       
        $project->delete();
        $notify[] = ['success', 'Project stage deleted successfully'];
        return back()->withNotify($notify);
    }
    public function activeBy(Request $request)
    {
        
        $project = ProjectStage::findOrFail($request->id);
        $project->is_active = 1;
        $project->created_at = Carbon::now();
        $project->save();
        $notify[] = ['success', 'Project stage has been Activated'];
        return redirect()->back()->withNotify($notify);
    }
    public function inActiveBy(Request $request)
    {
       
        $project = ProjectStage::findOrFail($request->id);
        $project->is_active = 0;
        $project->created_at = Carbon::now();
        $project->save();
        $notify[] = ['success', 'Project stage has been inActive'];
        return redirect()->back()->withNotify($notify);
    }
}
