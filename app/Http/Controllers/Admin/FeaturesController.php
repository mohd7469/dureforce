<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Features;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class FeaturesController extends Controller
{
    public function index()
    {
        
    	$pageTitle = "Feature List";
    	$emptyMessage = "No data found";
        $features = Features::latest()->paginate(getPaginate());

        return view('admin.features.index', compact('pageTitle','features'));
    }
    public function Create()
    {
    	$pageTitle = "Create Feature";
         
       
    	return view('admin.features.create', compact('pageTitle'));
    }
    public function store(Request $request)
    {
    
        $this->validate($request, [
           
            'name' => 'required',
            'slug' => 'required',
            
            
        ]);
       
        $feature  = new Features();
        
       
        $feature->name = $request->name;
        $feature->slug = $request->slug;
       
        // $dod->module_id = 1;
       
        $feature->save();

        
        $notify[] = ['success', 'Your Features detail has been Created.'];
        return redirect()->route('admin.feature.index')->withNotify($notify);
    }
    public function editdetails($id){
        $feature = Features::findOrFail($id);
        $pageTitle = "Manage All Feature Details";
        $emptyMessage = 'No shortcode available';
        return view('admin.features.edit', compact('pageTitle', 'feature','emptyMessage'));
    }
    public function update(Request $request, $id){
        $this->validate($request, [
           
            'name' => 'required',
            'slug' => 'required',
            
            
        ]);
        
        $feature = Features::findOrFail($id);
      
     
        $feature->name = $request->name;
        $feature->slug = $request->slug;
        
        $feature->save();

        $notify[] = ['success', 'Feature detail has been updated'];
        return redirect()->route('admin.feature.index')->withNotify($notify);
    }
    public function delete($id)
    {
        $feature = Features::find($id);
       
        $feature->delete();
        $notify[] = ['success', 'Job Type deleted successfully'];
        return back()->withNotify($notify);
    }
    public function activeBy(Request $request)
    {
        
        $feature = Features::findOrFail($request->id);
        $feature->is_active = 1;
        $feature->created_at = Carbon::now();
        $feature->save();
        $notify[] = ['success', 'Feature has been Activated'];
        return redirect()->back()->withNotify($notify);
    }
    public function inActiveBy(Request $request)
    {
       
        $feature = Features::findOrFail($request->id);
        $feature->is_active = 0;
        $feature->created_at = Carbon::now();
        $feature->save();
        $notify[] = ['success', 'Feature has been inActive'];
        return redirect()->back()->withNotify($notify);
    }
}
