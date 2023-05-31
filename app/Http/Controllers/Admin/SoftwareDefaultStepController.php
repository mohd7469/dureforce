<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Software\SoftwareDefaultStep;
use App\Models\SoftwareDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use App\Models\EmailTemplate;


class SoftwareDefaultStepController extends Controller
{
    public function index()
    {
        try { 
            $pageTitle = "Software Default Steps";
            //$emptyMessage = "No data found";
            $softwares = SoftwareDefaultStep::latest()->paginate(getPaginate());
            Log::info(["softwares" => $softwares]);
            return view('admin.software_section.index', compact('pageTitle','softwares'));
        }catch (\Exception $exp) {                
            Log::error($exp->getMessage());
            $notify[] = ['error', 'An error occured'];
            return back()->withNotify($notify);
        }
    }
    public function softCreate()
    {
        try {
            $pageTitle = "Create Software Details";
            // $categories = Category::select('id', 'name')->get();
            return view('admin.software_section.create', compact('pageTitle'));
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
            'description' => 'required',
            
        ]);
        try {
            DB::beginTransaction();
            $soft  = new SoftwareDefaultStep();
            $soft->title = $request->title;
            $soft->description = $request->description;
            $soft->save();
            DB::commit();
            Log::info(["soft" => $soft]);
            $notify[] = ['success', 'Your Soft Detail has been Created.'];
            return redirect()->route('admin.soft.index')->withNotify($notify);
        }catch (\Exception $exp) {
            DB::rollback();
            Log::error($exp->getMessage());
            $notify[] = ['error', 'An error occured'];
            return back()->withNotify($notify);
        }
    }
    public function editdetails($id){
        try {
            $soft = SoftwareDefaultStep::findOrFail($id);
            $pageTitle = "Manage All Software Details";
            $emptyMessage = 'No shortcode available';
            return view('admin.software_section.edit', compact('pageTitle', 'soft','emptyMessage'));
        }catch (\Exception $exp) {
                
            Log::error($exp->getMessage());
            $notify[] = ['error', 'An error occured'];
            return back()->withNotify($notify);
        }
    }
    public function softupdate(Request $request, $id){
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
        ]);
        try {
            DB::beginTransaction();
            $soft = SoftwareDefaultStep::findOrFail($id);
            $soft->title = $request->title;
            $soft->description = $request->description;
            $soft->save();
            DB::commit();
            Log::info(["soft" => $soft]);
            $notify[] = ['success', 'software detail has been updated'];
            return redirect()->route('admin.soft.index')->withNotify($notify);
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
            $soft = SoftwareDefaultStep::find($id);
            $soft->delete();
            DB::commit();
            Log::info(["soft" => $soft]);
            $notify[] = ['success', 'Software Detail deleted successfully'];
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
            $soft = SoftwareDefaultStep::findOrFail($request->id);
            $soft->is_active = 1;
            $soft->created_at = Carbon::now();
            $soft->save();
            DB::commit();
            Log::info(["soft" => $soft]);
            $notify[] = ['success', 'Software Detail has been Activated'];
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
            $soft = SoftwareDefaultStep::findOrFail($request->id);
            $soft->is_active = 0;
            $soft->created_at = Carbon::now();
            $soft->save();
            DB::commit();
            Log::info(["soft" => $soft]);
            $notify[] = ['success', 'Software Detail has been inActive'];
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
