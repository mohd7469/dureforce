<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Module;
use App\Models\SubCategory;
use App\Models\ProjectLength;
use Carbon\Carbon;
use App\Rules\FileTypeValidate;
use Illuminate\Support\Facades\Auth;
use App\Traits\DeleteEntity;

class ProjectLengthController extends Controller
{
    use DeleteEntity;

    public function index()
    {
    	$pageTitle = "Manage All Project length";
    	$emptyMessage = "No data found";
    	$project_lengths = ProjectLength::with('module')->latest()->paginate(getPaginate());
    	return view('admin.project_length.index', compact('pageTitle', 'emptyMessage', 'project_lengths'));
    }

    public function bannerCreate()
    {
    	$pageTitle = "Create Project length";
        $modules = Module::select('id', 'name')->get();
    	return view('admin.project_length.create', compact('pageTitle','modules'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'project_name' => 'required',
            'project_descr' => 'required',
            'start_range' => 'required|gt:0',
            'end_range' => 'required|gt:0',
            'project_type' => 'required',
            'module' => 'required',

        ]);
        $projectLength  = new ProjectLength;
        $projectLength->name = $request->project_name;
        $projectLength->description = $request->project_descr;
        $projectLength->start_range = $request->start_range;
        $projectLength->end_range = $request->end_range;
        $projectLength->type = $request->project_type;
        $projectLength->module_id = $request->module;
        $projectLength->save();
        $notify[] = ['success', 'Your Project length has been Created.'];
        return redirect()->route('admin.projectLength.index')->withNotify($notify);
    }

    public function details($id)
    {
    	$pageTitle = "Project length Details";
        $banner = ProjectLength::where('id',$id)->withAll()->first();
    	return view('admin.project_length.details', compact('pageTitle', 'banner'));
    }

    public function inActive()
    {
    	$pageTitle = "InActive Project length";
    	$emptyMessage = "No data found";
    	$project_lengths = ProjectLength::where('is_active', 0)->latest()->paginate(getPaginate());
    	return view('admin.project_length.index', compact('pageTitle', 'emptyMessage', 'project_lengths'));
    }

    public function active()
    {
    	$pageTitle = "Active Project length";
    	$emptyMessage = "No data found";
    	$project_lengths = ProjectLength::where('is_active', 1)->latest()->paginate(getPaginate());
    	return view('admin.project_length.index', compact('pageTitle', 'emptyMessage', 'project_lengths'));
    }

    public function activeBy(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:project_lengths,id'
        ]);
        $banner = ProjectLength::findOrFail($request->id);
        $banner->is_active = 1;
        $banner->created_at = Carbon::now();
        $banner->save();
        $notify[] = ['success', 'Project length has been Activated'];
        return redirect()->back()->withNotify($notify);
    }

    public function inActiveBy(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:project_lengths,id'
        ]);
        $banner = ProjectLength::findOrFail($request->id);
        $banner->is_active = 0;
        $banner->created_at = Carbon::now();
        $banner->save();
        $notify[] = ['success', 'Project length has been inActive'];
        return redirect()->back()->withNotify($notify);
    }
    public function destroy($id)
    {
        $this->deleteEntity(ProjectLength::class,'job', $id);
        $notify[] = ['success', 'Project length has been deleted'];
        return back()->withNotify($notify);
    }
}
