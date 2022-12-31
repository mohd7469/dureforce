<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Deliverable;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DeliverableController extends Controller
{
    public function index()
    {
        
    	$pageTitle = "Deliverable List";
    	$emptyMessage = "No data found";
        $deliverables = Deliverable::latest()->paginate(getPaginate());
        return view('admin.deliverables.index', compact('pageTitle','deliverables'));
    }
    public function Create()
    {
    	$pageTitle = "Create Deliverable Details";
        // $categories = Category::select('id', 'name')->get();
       
    	return view('admin.deliverables.create', compact('pageTitle'));
    }
    public function store(Request $request)
    {
     //dd($request->all());
        $this->validate($request, [
           
            'name' => 'required',
            'slug' => 'required',
            
        ]);
       
        $deliverable  = new Deliverable();
      
        $deliverable->name = $request->name;
        $deliverable->slug = $request->slug;
        $deliverable->module_id = 1;
       
        $deliverable->save();

        
        $notify[] = ['success', 'Your Deliverable Detail has been Created.'];
        return redirect()->route('admin.deliverable.index')->withNotify($notify);
    }
    public function editdetails($id){
        $deliverable = Deliverable::findOrFail($id);
        $pageTitle = "Manage All Deliverable Details";
        $emptyMessage = 'No shortcode available';
        return view('admin.deliverables.edit', compact('pageTitle', 'deliverable','emptyMessage'));
    }
    public function update(Request $request, $id){
        $this->validate($request, [
           
            'name' => 'required',
            'slug' => 'required',
            
        ]);
        
        $deliverable = Deliverable::findOrFail($id);
      
     
        $deliverable->name = $request->name;
        $deliverable->slug = $request->slug;
        $deliverable->save();

        $notify[] = ['success', 'Deliverable detail has been updated'];
        return redirect()->route('admin.deliverable.index')->withNotify($notify);
    }
    public function delete($id)
    {
        $deliverable = Deliverable::find($id);
       
        $deliverable->delete();
        $notify[] = ['success', 'Deliverable Detail deleted successfully'];
        return back()->withNotify($notify);
    }
    public function activeBy(Request $request)
    {
        
        $deliverable = Deliverable::findOrFail($request->id);
        $deliverable->is_active = 1;
        $deliverable->created_at = Carbon::now();
        $deliverable->save();
        $notify[] = ['success', 'Deliverable Detail has been Activated'];
        return redirect()->back()->withNotify($notify);
    }
    public function inActiveBy(Request $request)
    {
       
        $deliverable = Deliverable::findOrFail($request->id);
        $deliverable->is_active = 0;
        $deliverable->created_at = Carbon::now();
        $deliverable->save();
        $notify[] = ['success', 'Deliverable Detail has been inActive'];
        return redirect()->back()->withNotify($notify);
    }
}
