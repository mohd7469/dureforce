<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Degree;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
class DegreeController extends Controller
{
    public function index()
    {
        try {
            DB::beginTransaction();
    	$pageTitle = "Degree List";
    	$emptyMessage = "No data found";
        $degrees = Degree::latest()->paginate(getPaginate());

        return view('admin.degrees.index', compact('pageTitle','degrees'));
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
    	$pageTitle = "Create Degree";
         
       
        return view('admin.degrees.create', compact('pageTitle'));
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
            
            
        ]);
        try {
            DB::beginTransaction();
       
        $degree  = new Degree();
        
       
        $degree->title = $request->title;
        $degree->slug = $request->slug;
       
        // $dod->module_id = 1;
       
        $degree->save();
        DB::commit();
        Log::info(["degree" => $degree]);
        
        $notify[] = ['success', 'Your Degree detail has been Created.'];
        return redirect()->route('admin.degree.index')->withNotify($notify);
    }catch (\Exception $exp) {
        DB::rollback();
        Log::error($exp->getMessage());
        return response()->json(["error" => $exp]);
    }
    }
    public function editdetails($id){
        try {
            DB::beginTransaction();
        $degree = Degree::findOrFail($id);
        $pageTitle = "Manage All Degree Details";
        $emptyMessage = 'No shortcode available';
        return view('admin.degrees.edit', compact('pageTitle', 'degree','emptyMessage'));
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
            
            
        ]);
        try {
            DB::beginTransaction();
        $degree = Degree::findOrFail($id);
      
     
        $degree->title = $request->title;
        $degree->slug = $request->slug;
        
        $degree->save();
        DB::commit();
        Log::info(["degree" => $degree]);
        $notify[] = ['success', 'Degree detail has been updated'];
        return redirect()->route('admin.degree.index')->withNotify($notify);
    }
    catch (\Exception $exp) {
        DB::rollback();
        Log::error($exp->getMessage());
        return response()->json(["error" => $exp]);
    }
    }
    public function delete($id)
    {
        try {
            DB::beginTransaction();
        $degree = Degree::find($id);
       
        $degree->delete();
        DB::commit();
        Log::info(["degree" => $degree]);
        $notify[] = ['success', 'Degree deleted successfully'];
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
        $degree = Degree::findOrFail($request->id);
        $degree->is_active = 1;
        $degree->created_at = Carbon::now();
        $degree->save();
        DB::commit();
        Log::info(["degree" => $degree]);
        $notify[] = ['success', 'Degree has been Activated'];
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
        $degree = Degree::findOrFail($request->id);
        $degree->is_active = 0;
        $degree->created_at = Carbon::now();
        $degree->save();
        DB::commit();
        Log::info(["degree" => $degree]);
        $notify[] = ['success', 'Degree has been inActive'];
        return redirect()->back()->withNotify($notify);
    }
    catch (\Exception $exp) {
        DB::rollback();
        Log::error($exp->getMessage());
        return response()->json(["error" => $exp]);
    }
    }
}
