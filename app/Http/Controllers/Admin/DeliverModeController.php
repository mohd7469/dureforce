<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DeliveryMode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DeliverModeController extends Controller
{
    public function index()
    {
        try {
    	$pageTitle = "delivery Mode List";
    	$emptyMessage = "No data found";
        $delivers = DeliveryMode::latest()->paginate(getPaginate());

        return view('admin.delivermode.index', compact('pageTitle','delivers'));
    }catch (\Exception $exp) {
            
        Log::error($exp->getMessage());
        $notify[] = ['error', 'An error occured'];
        return back()->withNotify($notify);
    }
    }
    public function Create()
    {
        try {
    	$pageTitle = "Create Deliver Mode Details";
        // $categories = Category::select('id', 'name')->get();
       
        return view('admin.delivermode.create', compact('pageTitle'));
    }catch (\Exception $exp) {
            
        Log::error($exp->getMessage());
        $notify[] = ['error', 'An error occured'];
        return back()->withNotify($notify);
    }
    }
    public function store(Request $request)
    {
     //dd($request->all());
        $this->validate($request, [
           
            'title' => 'required',
            'slug' => 'required',
            
            
        ]);
        try {
            DB::beginTransaction();
        $deliver  = new DeliveryMode();
      
        $deliver->title = $request->title;
        $deliver->slug = $request->slug;
        $deliver->module_id = 1;
        $deliver->module_type = 'App\Models\Job';

       
        $deliver->save();
        DB::commit();
        Log::info(["deliver" => $deliver]);
        
        $notify[] = ['success', 'Your Deliver Mode Detail has been Created.'];
        return redirect()->route('admin.deliver.index')->withNotify($notify);
    }catch (\Exception $exp) {
        DB::rollback();
        Log::error($exp->getMessage());
        $notify[] = ['error', 'An error occured'];
        return back()->withNotify($notify);
    }
    }
    public function editdetails($id){
        try {
        $deliver = DeliveryMode::findOrFail($id);
        $pageTitle = "Manage All Deliver Mode Details";
        $emptyMessage = 'No shortcode available';
        return view('admin.delivermode.edit', compact('pageTitle', 'deliver','emptyMessage'));
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
        
        $deliver = DeliveryMode::findOrFail($id);
      
     
        $deliver->title = $request->title;
        $deliver->slug = $request->slug;
        
        $deliver->save();
        DB::commit();
        Log::info(["deliver" => $deliver]);
        $notify[] = ['success', 'Deliver Mode detail has been updated'];
        return redirect()->route('admin.deliver.index')->withNotify($notify);
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
        $deliver = DeliveryMode::find($id);
       
        $deliver->delete();
        DB::commit();
        Log::info(["deliver" => $deliver]);
        $notify[] = ['success', 'Deliver Mode Detail deleted successfully'];
        return back()->withNotify($notify);
    }
    catch (\Exception $exp) {
        DB::rollback();
        Log::error($exp->getMessage());
        $notify[] = ['success', 'Tag deleted successfully'];
        return back()->withNotify($notify);
    }
    }
    public function activeBy(Request $request)
    {
        
        try {
            DB::beginTransaction();
        $dod = DeliveryMode::findOrFail($request->id);
        $dod->is_active = 1;
        $dod->created_at = Carbon::now();
        $dod->save();
        DB::commit();
        Log::info(["dod" => $dod]);
        $notify[] = ['success', 'Deliver Mode Detail has been Activated'];
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
       
        $dod = DeliveryMode::findOrFail($request->id);
        $dod->is_active = 0;
        $dod->created_at = Carbon::now();
        $dod->save();
        DB::commit();
        Log::info(["dod" => $dod]);
        $notify[] = ['success', 'Deliver Mode Detail has been inActive'];
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
