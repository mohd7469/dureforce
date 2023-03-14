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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Traits\DeleteEntity;

class ProjectLengthController extends Controller
{
    use DeleteEntity;

    public function index()
    {
        try {
            $pageTitle = "Manage All Project length";
            $emptyMessage = "No data found";
            $project_lengths = ProjectLength::with('module')->latest()->paginate(getPaginate());
            Log::info(["project_lengths" => $project_lengths]);
            return view('admin.project_length.index', compact('pageTitle', 'emptyMessage', 'project_lengths'));
        }catch (\Exception $exp) {
            Log::error($exp->getMessage());
            $notify[] = ['error', 'An error occured'];
            return back()->withNotify($notify);
        }
    }

    public function bannerCreate()
    {
        try {
            $pageTitle = "Create Project length";
            $modules = Module::select('id', 'name')->get();
            Log::info(["modules" => $modules]);
            return view('admin.project_length.create', compact('pageTitle','modules'));
        }catch (\Exception $exp) {
            Log::error($exp->getMessage());
            $notify[] = ['error', 'An error occured'];
            return back()->withNotify($notify);
        }
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
        try {
            DB::beginTransaction();
            $projectLength  = new ProjectLength;
            $projectLength->name = $request->project_name;
            $projectLength->description = $request->project_descr;
            $projectLength->start_range = $request->start_range;
            $projectLength->end_range = $request->end_range;
            $projectLength->type = $request->project_type;
            $projectLength->module_id = $request->module;
            $projectLength->save();
            DB::commit();
            Log::info(["projectLength" => $projectLength]);
            $notify[] = ['success', 'Your Project length has been Created.'];
            storeRedisData(ProjectLength::$Model_Name_Space,ProjectLength::$Redis_key,ProjectLength::$Is_Active);
            return redirect()->route('admin.projectLength.index')->withNotify($notify);
        }catch (\Exception $exp) {
            DB::rollback();
            Log::error($exp->getMessage());
            $notify[] = ['error', 'An error occured'];
            return back()->withNotify($notify);
        }
    }

    public function details($id)
    {
        try {
            $pageTitle = "Project length Details";
            $banner = ProjectLength::where('id',$id)->withAll()->first();
            Log::info(["ProjectLength" => $banner]);
            return view('admin.project_length.details', compact('pageTitle', 'banner'));
        }catch (\Exception $exp) {
            Log::error($exp->getMessage());
            $notify[] = ['error', 'An error occured'];
            return back()->withNotify($notify);
        }
    }

    public function inActive()
    {
        try {
            $pageTitle = "InActive Project length";
            $emptyMessage = "No data found";
            $project_lengths = ProjectLength::where('is_active', 0)->latest()->paginate(getPaginate());
            Log::info(["ProjectLength" => $project_lengths]);
            return view('admin.project_length.index', compact('pageTitle', 'emptyMessage', 'project_lengths'));
        }catch (\Exception $exp) {
            Log::error($exp->getMessage());
            $notify[] = ['error', 'An error occured'];
            return back()->withNotify($notify);
        }
    }

    public function active()
    {
        try {
            $pageTitle = "Active Project length";
            $emptyMessage = "No data found";
            $project_lengths = ProjectLength::where('is_active', 1)->latest()->paginate(getPaginate());
            Log::info(["ProjectLength" => $project_lengths]);
            return view('admin.project_length.index', compact('pageTitle', 'emptyMessage', 'project_lengths'));
        }catch (\Exception $exp) {
            Log::error($exp->getMessage());
            $notify[] = ['error', 'An error occured'];
            return back()->withNotify($notify);
        }
    }

    public function activeBy(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:project_lengths,id'
        ]);
        try {
            DB::beginTransaction();
            $banner = ProjectLength::findOrFail($request->id);
            $banner->is_active = 1;
            $banner->created_at = Carbon::now();
            $banner->save();
            DB::commit();
            Log::info(["ProjectLength" => $banner]);
            $notify[] = ['success', 'Project length has been Activated'];
            storeRedisData(ProjectLength::$Model_Name_Space,ProjectLength::$Redis_key,ProjectLength::$Is_Active);
            return redirect()->back()->withNotify($notify);
        }catch (\Exception $exp) {
            DB::rollback();
            Log::error($exp->getMessage());
            $notify[] = ['error', 'An error occured'];
            return back()->withNotify($notify);
        }
    }

    public function inActiveBy(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:project_lengths,id'
        ]);
        try {
            DB::beginTransaction();
            $banner = ProjectLength::findOrFail($request->id);
            $banner->is_active = 0;
            $banner->created_at = Carbon::now();
            $banner->save();
            DB::commit();
            Log::info(["ProjectLength" => $banner]);
            $notify[] = ['success', 'Project length has been inActive'];
            storeRedisData(ProjectLength::$Model_Name_Space,ProjectLength::$Redis_key,ProjectLength::$Is_Active);
            return redirect()->back()->withNotify($notify);
        }catch (\Exception $exp) {
            DB::rollback();
            Log::error($exp->getMessage());
            $notify[] = ['error', 'An error occured'];
            return back()->withNotify($notify);
        }
    }
    public function destroy($id)
    {
        try {
            $this->deleteEntity(ProjectLength::class,'job', $id);
            $notify[] = ['success', 'Project length has been deleted'];
            storeRedisData(ProjectLength::$Model_Name_Space,ProjectLength::$Redis_key,ProjectLength::$Is_Active);
            return back()->withNotify($notify);
        }catch (\Exception $exp) {
            Log::error($exp->getMessage());
            $notify[] = ['error', 'An error occured'];
            return back()->withNotify($notify);
        }
    }
}
