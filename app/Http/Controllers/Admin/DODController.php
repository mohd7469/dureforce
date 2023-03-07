<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DOD;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
class DODController extends Controller
{
    public function index()
    {
        try {
            $pageTitle = "Dod List";
            $emptyMessage = "No data found";
            $dods = DOD::withoutGlobalScopes()->latest()->paginate();
            Log::info($dods);
            return view('admin.dods.index', compact('pageTitle','dods'));
        }catch (\Exception $exp) {
            Log::error($exp->getMessage());
            $notify[] = ['error', 'An error occured'];
            return back()->withNotify($notify);
        }
    }
    public function Create()
    {
        try {
            $pageTitle = "Create Dods Details";
            // $categories = Category::select('id', 'name')->get();
            return view('admin.dods.create', compact('pageTitle'));
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
        ]);
        try {
            DB::beginTransaction();
            $dod  = new DOD();
            $dod->title = $request->title;
            $dod->module_id = 1;
            $dod->save();
            DB::commit();
            Log::info(["dod" => $dod]);
            $notify[] = ['success', 'Your Dods Detail has been Created.'];
            storeRedisData(DOD::$Model_Name_Space,DOD::$Redis_key,DOD::$Is_Active);
            return redirect()->route('admin.dod.index')->withNotify($notify);
        }catch (\Exception $exp) {
            DB::rollback();
            Log::error($exp->getMessage());
            $notify[] = ['error', 'An error occured'];
            return back()->withNotify($notify);
        }
    }
    public function editdetails($id){
        try {
            $dod = DOD::findOrFail($id);
            $pageTitle = "Manage All Dods Details";
            $emptyMessage = 'No shortcode available';
            return view('admin.dods.edit', compact('pageTitle', 'dod','emptyMessage'));
        }catch (\Exception $exp) {
            Log::error($exp->getMessage());
            $notify[] = ['error', 'An error occured'];
            return back()->withNotify($notify);
        }
    }
    public function update(Request $request, $id){
        $this->validate($request, [
            'title' => 'required',
        ]);
        try {
            DB::beginTransaction();
            $dod = DOD::findOrFail($id);
            $dod->title = $request->title;
            $dod->save();
            DB::commit();
            Log::info(["dod" => $dod]);
            $notify[] = ['success', 'Dods detail has been updated'];
            storeRedisData(DOD::$Model_Name_Space,DOD::$Redis_key,DOD::$Is_Active);
            return redirect()->route('admin.dod.index')->withNotify($notify);
        }
        catch (\Exception $exp) {
            DB::rollback();
            Log::error($exp->getMessage());
            $notify[] = ['error', 'An error occured'];
        return back()->withNotify($notify);
        }
    }
    public function delete($id, Request $request)
    {
        try {
            DB::beginTransaction();
            $dod = DOD::where('id',$request->id)->withOutGlobalScopes()->first();
            $dod->delete();
            DB::commit();
            Log::info(["dod" => $dod]);
            $notify[] = ['success', 'DOD Detail deleted successfully'];
            storeRedisData(DOD::$Model_Name_Space,DOD::$Redis_key,DOD::$Is_Active);
            return back()->withNotify($notify);
        }
        catch (\Exception $exp) {
            DB::rollback();
            Log::error($exp->getMessage());
            $notify[] = ['success', 'DOD deleted successfully'];
            return back()->withNotify($notify);
        }
    }
    public function activeBy(Request $request)
    {
        try {
            DB::beginTransaction();
            $dod = DOD::where('id',$request->id)->withOutGlobalScopes()->first();
            $dod->is_active = 1;
            $dod->updated_at = Carbon::now();
            $dod->save();
            DB::commit();
            Log::info(["dod" => $dod]);
            $notify[] = ['success', 'Dods Detail has been Activated'];
            storeRedisData(DOD::$Model_Name_Space,DOD::$Redis_key,DOD::$Is_Active);
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
            $dod = DOD::findOrFail($request->id);
            $dod->is_active = 0;
            $dod->created_at = Carbon::now();
            $dod->save();
            DB::commit();
            Log::info(["dod" => $dod]);
            $notify[] = ['success', 'Dods Detail has been inActive'];
            storeRedisData(DOD::$Model_Name_Space,DOD::$Redis_key,DOD::$Is_Active);
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
