<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobType;
use Illuminate\Support\Facades\Log;
use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class JobTypeController extends Controller
{
    public function index()
    {
        try {
           
    	$pageTitle = "Job Type List";
    	$emptyMessage = "No data found";
        $types = JobType::latest()->paginate(getPaginate());

        return view('admin.jobtypes.index', compact('pageTitle','types'));
    }catch (\Exception $exp) {
        
        Log::error($exp->getMessage());
        $notify[] = ['error', 'An error occured'];
        return back()->withNotify($notify);
    }
    }
    public function Create()
    {
        try {
           
    	$pageTitle = "Create Job Type";
         $modules = Module::all();
       
        return view('admin.jobtypes.create', compact('pageTitle','modules'));
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
            'slug' => 'required',
            
            
        ]);
        try {
            DB::beginTransaction();
        $type  = new JobType();
        
        $type->module_id = $request->module_id;
        $type->title = $request->title;
        $type->slug = $request->slug;
       
        // $dod->module_id = 1;
       
        $type->save();
        DB::commit();
        Log::info(["type" => $type]);
        
        $notify[] = ['success', 'Your Job Type detail has been Created.'];
        return redirect()->route('admin.type.index')->withNotify($notify);
    }catch (\Exception $exp) {
        DB::rollback();
        Log::error($exp->getMessage());
        $notify[] = ['error', 'An error occured'];
            return back()->withNotify($notify);
    }
    }
    public function editdetails($id){
        try {
            
        $type = JobType::findOrFail($id);
        $pageTitle = "Manage All Job Type Details";
        $emptyMessage = 'No shortcode available';
        return view('admin.jobtypes.edit', compact('pageTitle', 'type','emptyMessage'));
    }catch (\Exception $exp) {
        
        Log::error($exp->getMessage());
        $notify[] = ['error', 'An error occured'];
        return back()->withNotify($notify);
    }
    }
    public function update(Request $request, $id){
        $this->validate($request, [
           
            'title' => 'required',
            'slug' => 'required',
            
            
        ]);
        try {
            DB::beginTransaction();
        $type = JobType::findOrFail($id);
      
     
        $type->title = $request->title;
        $type->slug = $request->slug;
        
        $type->save();
        DB::commit();
        Log::info(["type" => $type]);
        $notify[] = ['success', 'Job Type detail has been updated'];
        return redirect()->route('admin.type.index')->withNotify($notify);
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
        $type = JobType::find($id);
       
        $type->delete();
        DB::commit();
        Log::info(["type" => $type]);
        $notify[] = ['success', 'Job Type deleted successfully'];
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
        $type = JobType::findOrFail($request->id);
        $type->is_active = 1;
        $type->created_at = Carbon::now();
        $type->save();
        DB::commit();
        Log::info(["type" => $type]);
        $notify[] = ['success', 'Job Type has been Activated'];
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
        $type = JobType::findOrFail($request->id);
        $type->is_active = 0;
        $type->created_at = Carbon::now();
        $type->save();
        DB::commit();
        Log::info(["type" => $type]);
        $notify[] = ['success', 'Job Type has been inActive'];
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
