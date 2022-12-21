<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DOD;
use Illuminate\Http\Request;
use Carbon\Carbon;
class DODController extends Controller
{
    public function index()
    {
        
    	$pageTitle = "DODS List";
    	$emptyMessage = "No data found";
        $dods = DOD::latest()->paginate(getPaginate());

        return view('admin.dods.index', compact('pageTitle','dods'));
    }
    public function Create()
    {
    	$pageTitle = "Create Dods Details";
        // $categories = Category::select('id', 'name')->get();
       
    	return view('admin.dods.create', compact('pageTitle'));
    }
    public function store(Request $request)
    {
     //dd($request->all());
        $this->validate($request, [
           
            'title' => 'required',
            
            
        ]);
       
        $dod  = new DOD();
      
        $dod->title = $request->title;
       
        $dod->module_id = 1;
       
        $dod->save();

        
        $notify[] = ['success', 'Your Dods Detail has been Created.'];
        return redirect()->route('admin.dod.index')->withNotify($notify);
    }
    public function editdetails($id){
        $dod = DOD::findOrFail($id);
        $pageTitle = "Manage All Dods Details";
        $emptyMessage = 'No shortcode available';
        return view('admin.dods.edit', compact('pageTitle', 'dod','emptyMessage'));
    }
    public function update(Request $request, $id){
        $this->validate($request, [
           
            'title' => 'required',
            
            
        ]);
        
        $dod = DOD::findOrFail($id);
      
     
        $dod->title = $request->title;
        
        $dod->save();

        $notify[] = ['success', 'Dods detail has been updated'];
        return redirect()->route('admin.dod.index')->withNotify($notify);
    }
    public function delete($id)
    {
        $dod = DOD::find($id);
       
        $dod->delete();
        $notify[] = ['success', 'Dod Detail deleted successfully'];
        return back()->withNotify($notify);
    }
    public function activeBy(Request $request)
    {
        
        $dod = DOD::findOrFail($request->id);
        $dod->is_active = 1;
        $dod->created_at = Carbon::now();
        $dod->save();
        $notify[] = ['success', 'Dods Detail has been Activated'];
        return redirect()->back()->withNotify($notify);
    }
    public function inActiveBy(Request $request)
    {
       
        $dod = DOD::findOrFail($request->id);
        $dod->is_active = 0;
        $dod->created_at = Carbon::now();
        $dod->save();
        $notify[] = ['success', 'Dods Detail has been inActive'];
        return redirect()->back()->withNotify($notify);
    }
}
