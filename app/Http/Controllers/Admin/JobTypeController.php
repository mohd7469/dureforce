<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobType;
use Illuminate\Http\Request;

class JobTypeController extends Controller
{
    public function index()
    {
        $pageTitle = "Job Type list";
        // $emptyMessage = "No data found";
        $types = JobType::latest()->paginate(getPaginate());
        
        return view('admin.jobtypes.index', compact('types', 'pageTitle'));
    }
    public function store(Request $request)
    {
      
        $request->validate([
            'title' => 'required',
            
        ]);
        $type = new JobType;
        $type->title = $request->title;
        
        
        $type->is_active = $request->is_active ? 1 : 0;
        $type->save();
        $notify[] = ['success', 'Job Types  has been created'];
        return back()->withNotify($notify);
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required',
            
        ]);
        $type = new JobType;
        $type->title = $request->title;
        
        
        $type->is_active = $request->is_active ? 1 : 0;
        $type->save();
        $notify[] = ['success', 'Job Type has been created'];
        return back()->withNotify($notify);
    }


    public function activeBy(Request $request)
    {
        
        $type = JobType::findOrFail($request->id);
        $type->is_active = 1;
        $type->created_at = Carbon::now();
        $type->save();
        $notify[] = ['success', 'Job Type has been Activated'];
        return redirect()->back()->withNotify($notify);
    }
    public function inActiveBy(Request $request)
    {
       
        $type = JobType::findOrFail($request->id);
        $type->is_active = 0;
        $type->created_at = Carbon::now();
        $type->save();
        $notify[] = ['success', 'Job Type has been inActive'];
        return redirect()->back()->withNotify($notify);
    }
    public function delete($id)
    {
       try {
            DB::beginTransaction();
            $project = JobType::find($id);
            $project->delete();
            $notify[] = ['success', 'Job Type deleted successfully'];
            DB::commit();
            return back()->withNotify($notify);

        } catch (\Exception $e) {
            DB::rollBack();
            $notify[] = ['success', ' Job Type delete Failed'];
            return back()->withNotify($notify);

        }
    }
}
