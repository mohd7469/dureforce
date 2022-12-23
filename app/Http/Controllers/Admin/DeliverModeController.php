<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DeliveryMode;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DeliverModeController extends Controller
{
    public function index()
    {
        
    	$pageTitle = "Deliver Mode List";
    	$emptyMessage = "No data found";
        $delivers = DeliveryMode::latest()->paginate(getPaginate());

        return view('admin.delivermode.index', compact('pageTitle','delivers'));
    }
    public function Create()
    {
    	$pageTitle = "Create Deliver Mode Details";
        // $categories = Category::select('id', 'name')->get();
       
    	return view('admin.delivermode.create', compact('pageTitle'));
    }
    public function store(Request $request)
    {
     //dd($request->all());
        $this->validate($request, [
           
            'title' => 'required',
            'slug' => 'required',
            
            
        ]);
       
        $deliver  = new DeliveryMode();
      
        $deliver->title = $request->title;
        $deliver->slug = $request->slug;
        $deliver->module_id = 1;
        $deliver->module_type = 'App\Models\Job';

       
        $deliver->save();

        
        $notify[] = ['success', 'Your Deliver Mode Detail has been Created.'];
        return redirect()->route('admin.deliver.index')->withNotify($notify);
    }
    public function editdetails($id){
        $deliver = DeliveryMode::findOrFail($id);
        $pageTitle = "Manage All Deliver Mode Details";
        $emptyMessage = 'No shortcode available';
        return view('admin.delivermode.edit', compact('pageTitle', 'deliver','emptyMessage'));
    }
    public function update(Request $request, $id){
        $this->validate($request, [
           
            'title' => 'required',
            'slug' => 'required',
            
            
        ]);
        
        $deliver = DeliveryMode::findOrFail($id);
      
     
        $deliver->title = $request->title;
        $deliver->slug = $request->slug;
        
        $deliver->save();

        $notify[] = ['success', 'Deliver Mode detail has been updated'];
        return redirect()->route('admin.deliver.index')->withNotify($notify);
    }
    public function delete($id)
    {
        $deliver = DeliveryMode::find($id);
       
        $deliver->delete();
        $notify[] = ['success', 'Deliver Mode Detail deleted successfully'];
        return back()->withNotify($notify);
    }
    public function activeBy(Request $request)
    {
        
        $dod = DeliveryMode::findOrFail($request->id);
        $dod->is_active = 1;
        $dod->created_at = Carbon::now();
        $dod->save();
        $notify[] = ['success', 'Deliver Mode Detail has been Activated'];
        return redirect()->back()->withNotify($notify);
    }
    public function inActiveBy(Request $request)
    {
       
        $dod = DeliveryMode::findOrFail($request->id);
        $dod->is_active = 0;
        $dod->created_at = Carbon::now();
        $dod->save();
        $notify[] = ['success', 'Deliver Mode Detail has been inActive'];
        return redirect()->back()->withNotify($notify);
    }
}
