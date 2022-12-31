<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProjectStage;
use Illuminate\Http\Request;

class ProjectStageController extends Controller
{
    public function index()
    {
        $pageTitle = "Project Stage list";
        // $emptyMessage = "No data found";
        $projects = ProjectStage::latest()->paginate(getPaginate());
        
        return view('admin.projects.index', compact('projects', 'pageTitle'));
    }
    public function store(Request $request)
    {
      
        $request->validate([
            'title' => 'required',
            
        ]);
        $project = new ProjectStage;
        $project->title = $request->title;
        
        
        $project->is_active = $request->is_active ? 1 : 0;
        $project->save();
        $notify[] = ['success', 'Project Stage  has been created'];
        return back()->withNotify($notify);
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required',
            
        ]);
        $project = new ProjectStage;
        $project->title = $request->title;
        
        
        $project->is_active = $request->is_active ? 1 : 0;
        $project->save();
        $notify[] = ['success', 'Project Stage has been created'];
        return back()->withNotify($notify);
    }


    public function activeBy(Request $request)
    {
        
        $project = ProjectStage::findOrFail($request->id);
        $project->is_active = 1;
        $project->created_at = Carbon::now();
        $project->save();
        $notify[] = ['success', 'Project Stage has been Activated'];
        return redirect()->back()->withNotify($notify);
    }
    public function inActiveBy(Request $request)
    {
       
        $project = ProjectStage::findOrFail($request->id);
        $project->is_active = 0;
        $project->created_at = Carbon::now();
        $project->save();
        $notify[] = ['success', 'Project Stage has been inActive'];
        return redirect()->back()->withNotify($notify);
    }
    public function delete($id)
    {
       try {
            DB::beginTransaction();
            $project = ProjectStage::find($id);
            $project->delete();
            $notify[] = ['success', 'Project Stage deleted successfully'];
            DB::commit();
            return back()->withNotify($notify);

        } catch (\Exception $e) {
            DB::rollBack();
            $notify[] = ['success', ' Project Stage delete Failed'];
            return back()->withNotify($notify);

        }
    }
}
