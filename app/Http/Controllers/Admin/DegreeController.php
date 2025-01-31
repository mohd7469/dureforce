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
            $pageTitle = "Degree List";
            $emptyMessage = "No data found";
            $degrees = Degree::latest()->paginate(getPaginate());
            return view('admin.degrees.index', compact('pageTitle','degrees'));
        }catch (\Exception $exp) {
            Log::error($exp->getMessage());
            $notify[] = ['error', 'An error occured'];
            return back()->withNotify($notify);
        }
    }
    public function Create()
    {
        try {
            $pageTitle = "Create Degree";
            return view('admin.degrees.create', compact('pageTitle'));
        }catch (\Exception $exp) {
            Log::error($exp->getMessage());
            $notify[] = ['error', 'An error occured'];
            return back()->withNotify($notify);
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
            storeRedisData(Degree::$Model_Name_Space,Degree::$Redis_key,Degree::$Is_Active);
            return redirect()->route('admin.degree.index')->withNotify($notify);
        }catch (\Exception $exp) {
            DB::rollback();
            Log::error($exp->getMessage());
            $notify[] = ['error', 'An error occured'];
            return back()->withNotify($notify);
        }
    }
    public function editdetails($id){
        try {  
            $degree = Degree::findOrFail($id);
            $pageTitle = "Manage All Degree Details";
            $emptyMessage = 'No shortcode available';
            return view('admin.degrees.edit', compact('pageTitle', 'degree','emptyMessage'));
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
            $degree = Degree::findOrFail($id);
            $degree->title = $request->title;
            $degree->slug = $request->slug;
            $degree->save();
            DB::commit();
            Log::info(["degree" => $degree]);
            $notify[] = ['success', 'Degree detail has been updated'];
            storeRedisData(Degree::$Model_Name_Space,Degree::$Redis_key,Degree::$Is_Active);
            return redirect()->route('admin.degree.index')->withNotify($notify);
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
            $degree = Degree::find($id);
            $degree->delete();
            DB::commit();
            Log::info(["degree" => $degree]);
            $notify[] = ['success', 'Degree deleted successfully'];
            storeRedisData(Degree::$Model_Name_Space,Degree::$Redis_key,Degree::$Is_Active);
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
            $degree = Degree::findOrFail($request->id);
            $degree->is_active = 1;
            $degree->created_at = Carbon::now();
            $degree->save();
            DB::commit();
            Log::info(["degree" => $degree]);
            $notify[] = ['success', 'Degree has been Activated'];
            storeRedisData(Degree::$Model_Name_Space,Degree::$Redis_key,Degree::$Is_Active);
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
            $degree = Degree::findOrFail($request->id);
            $degree->is_active = 0;
            $degree->created_at = Carbon::now();
            $degree->save();
            DB::commit();
            Log::info(["degree" => $degree]);
            $notify[] = ['success', 'Degree has been inActive'];
            storeRedisData(Degree::$Model_Name_Space,Degree::$Redis_key,Degree::$Is_Active);
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
