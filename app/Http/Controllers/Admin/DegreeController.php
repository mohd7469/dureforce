<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Degree;
use Illuminate\Http\Request;

class DegreeController extends Controller
{
    public function index()
    {
        
    	$pageTitle = "Degree List";
    	$emptyMessage = "No data found";
        $degrees = Degree::latest()->paginate(getPaginate());

        return view('admin.degrees.index', compact('pageTitle','degrees'));
    }
    public function Create()
    {
    	$pageTitle = "Create Degree";
         
       
    	return view('admin.degrees.create', compact('pageTitle'));
    }
    public function store(Request $request)
    {
    
        $this->validate($request, [
           
            'title' => 'required',
            'slug' => 'required',
            
            
        ]);
       
        $degree  = new Degree();
        
       
        $degree->title = $request->title;
        $degree->slug = $request->slug;
       
        // $dod->module_id = 1;
       
        $degree->save();

        
        $notify[] = ['success', 'Your Degree detail has been Created.'];
        return redirect()->route('admin.degree.index')->withNotify($notify);
    }
    public function editdetails($id){
        $degree = Degree::findOrFail($id);
        $pageTitle = "Manage All Degree Details";
        $emptyMessage = 'No shortcode available';
        return view('admin.degrees.edit', compact('pageTitle', 'degree','emptyMessage'));
    }
    public function update(Request $request, $id){
        $this->validate($request, [
           
            'title' => 'required',
            'slug' => 'required',
            
            
        ]);
        
        $degree = Degree::findOrFail($id);
      
     
        $degree->title = $request->title;
        $degree->slug = $request->slug;
        
        $degree->save();

        $notify[] = ['success', 'Degree detail has been updated'];
        return redirect()->route('admin.degree.index')->withNotify($notify);
    }
    public function delete($id)
    {
        $degree = Degree::find($id);
       
        $degree->delete();
        $notify[] = ['success', 'Degree deleted successfully'];
        return back()->withNotify($notify);
    }
    public function activeBy(Request $request)
    {
        
        $degree = Degree::findOrFail($request->id);
        $degree->is_active = 1;
        $degree->created_at = Carbon::now();
        $degree->save();
        $notify[] = ['success', 'Degree has been Activated'];
        return redirect()->back()->withNotify($notify);
    }
    public function inActiveBy(Request $request)
    {
       
        $degree = Degree::findOrFail($request->id);
        $degree->is_active = 0;
        $degree->created_at = Carbon::now();
        $degree->save();
        $notify[] = ['success', 'Degree has been inActive'];
        return redirect()->back()->withNotify($notify);
    }
}
