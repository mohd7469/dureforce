<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Features;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class FeaturesController extends Controller
{
    public function index()
    {
        try {
            $pageTitle = "Feature List";
            $emptyMessage = "No data found";
            $features = Features::latest()->paginate(getPaginate());
            return view('admin.features.index', compact('pageTitle','features'));
        }catch (\Exception $exp) {
            Log::error($exp->getMessage());
            $notify[] = ['error', 'An error occured'];
            return back()->withNotify($notify);
        }
    }
    public function Create()
    {
        try {
            $pageTitle = "Create Feature";
            return view('admin.features.create', compact('pageTitle'));
        }catch (\Exception $exp) {
            Log::error($exp->getMessage());
            $notify[] = ['error', 'An error occured'];
            return back()->withNotify($notify);
        }
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'slug' => 'required', 
        ]);
        try {
            DB::beginTransaction();
            $feature  = new Features();
            $feature->name = $request->name;
            $feature->slug = $request->slug;
            $feature->is_active = true;
            // $dod->module_id = 1;
            $feature->save();
            DB::commit();
            
            
            $notify[] = ['success', 'Your Features detail has been Created.'];
            return redirect()->route('admin.feature.index')->withNotify($notify);
        }catch (\Exception $exp) {
            DB::rollback();
            Log::error($exp->getMessage());
            $notify[] = ['error', 'An error occured'];
            return back()->withNotify($notify);
        }
    }
    public function editdetails($id){
        try {    
            $feature = Features::findOrFail($id);
            $pageTitle = "Manage All Feature Details";
            $emptyMessage = 'No shortcode available';
            return view('admin.features.edit', compact('pageTitle', 'feature','emptyMessage'));
        }catch (\Exception $exp) {
            Log::error($exp->getMessage());
            $notify[] = ['error', 'An error occured'];
            return back()->withNotify($notify);
        }
    }
    public function update(Request $request, $id){
        $this->validate($request, [
            'name' => 'required',
            'slug' => 'required',    
        ]);
        try {
            DB::beginTransaction();
            $feature = Features::findOrFail($id);
            $feature->name = $request->name;
            $feature->slug = $request->slug;
            
            $feature->save();
            DB::commit();
            
            $notify[] = ['success', 'Feature detail has been updated'];
            return redirect()->route('admin.feature.index')->withNotify($notify);
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
            $feature = Features::find($id);
            $feature->delete();
            DB::commit();
            
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
            $feature = Features::findOrFail($request->id);
            $feature->is_active = 1;
            $feature->created_at = Carbon::now();
            $feature->save();
            DB::commit();
            
            $notify[] = ['success', 'Feature has been Activated'];
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
            $feature = Features::findOrFail($request->id);
            $feature->is_active = 0;
            $feature->created_at = Carbon::now();
            $feature->save();
            DB::commit();
            
            $notify[] = ['success', 'Feature has been inActive'];
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
