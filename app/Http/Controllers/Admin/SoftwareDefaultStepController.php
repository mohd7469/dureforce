<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Software\SoftwareDefaultStep;
use App\Models\SoftwareDetail;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\EmailTemplate;


class SoftwareDefaultStepController extends Controller
{
    public function index()
    {
        
    	$pageTitle = "Software Default Steps";
    	//$emptyMessage = "No data found";
        $softwares = SoftwareDefaultStep::latest()->paginate(getPaginate());
       
       
      
       
        return view('admin.software_section.index', compact('pageTitle','softwares'));
    }
    public function softCreate()
    {
    	$pageTitle = "Create Software Details";
        // $categories = Category::select('id', 'name')->get();
       
    	return view('admin.software_section.create', compact('pageTitle'));
    }
    public function store(Request $request)
    {
        //dd($request->all());
        $this->validate($request, [
           
            'title' => 'required',
            'description' => 'required',
            
        ]);
       


        $soft  = new SoftwareDefaultStep();
      
        $soft->title = $request->title;
        $soft->description = $request->description;
       
        $soft->save();

        
        $notify[] = ['success', 'Your Soft Detail has been Created.'];
        return redirect()->route('admin.soft.index')->withNotify($notify);
    }
    public function editdetails($id){
        $soft = SoftwareDefaultStep::findOrFail($id);
        $pageTitle = "Manage All Software Details";
        $emptyMessage = 'No shortcode available';
        return view('admin.software_section.edit', compact('pageTitle', 'soft','emptyMessage'));
    }
    public function softupdate(Request $request, $id){
        $this->validate($request, [
           
            'title' => 'required',
            'description' => 'required',
            
        ]);
        
        $soft = SoftwareDefaultStep::findOrFail($id);
      
     
        $soft->title = $request->title;
        $soft->description = $request->description;
        $soft->save();

    

        

        $notify[] = ['success', 'software detail has been updated'];
        return redirect()->route('admin.soft.index')->withNotify($notify);
    }
    public function delete($id)
    {
        $soft = SoftwareDefaultStep::find($id);
       
        $soft->delete();
        $notify[] = ['success', 'Software Detail deleted successfully'];
        return back()->withNotify($notify);
    }
    public function activeBy(Request $request)
    {
        
        $soft = SoftwareDefaultStep::findOrFail($request->id);
        $soft->is_active = 1;
        $soft->created_at = Carbon::now();
        $soft->save();
        $notify[] = ['success', 'Software Detail has been Activated'];
        return redirect()->back()->withNotify($notify);
    }
    public function inActiveBy(Request $request)
    {
       
        $soft = SoftwareDefaultStep::findOrFail($request->id);
        $soft->is_active = 0;
        $soft->created_at = Carbon::now();
        $soft->save();
        $notify[] = ['success', 'Software Detail has been inActive'];
        return redirect()->back()->withNotify($notify);
    }
}
