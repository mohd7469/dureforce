<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Deliverable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use Carbon\Carbon;

class DeliverableController extends Controller
{
    public function index()
    {
        try {
            $pageTitle = "Deliverable List";
            $emptyMessage = "No data found";
            $deliverables = Deliverable::withoutGlobalScopes()->latest()->paginate(getPaginate());
            Log::info(["deliverables" => $deliverables]);
            return view('admin.deliverables.index', compact('pageTitle','deliverables'));
        }catch (\Exception $exp) {
            Log::error($exp->getMessage());
            $notify[] = ['error', 'An error occured'];
            return back()->withNotify($notify);
        }
    }
    public function Create()
    {
        try {
            $pageTitle = "Create Deliverable Details";
            // $categories = Category::select('id', 'name')->get();
            return view('admin.deliverables.create', compact('pageTitle'));
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
            $deliverable  = new Deliverable();
            $deliverable->name = $request->name;
            $deliverable->slug = $request->slug;
            $deliverable->module_id = 1;
            $deliverable->save();
            DB::commit();
            Log::info(["deliverable" => $deliverable]);
            $notify[] = ['success', 'Your Deliverable Detail has been Created.'];
            storeRedisData(Deliverable::$Model_Name_Space,Deliverable::$Redis_key,Deliverable::$Is_Active);
            return redirect()->route('admin.deliverable.index')->withNotify($notify);
        }catch (\Exception $exp) {
            DB::rollback();
            Log::error($exp->getMessage());
            $notify[] = ['error', 'An error occured'];
            return back()->withNotify($notify);
        }
    }
    public function editdetails($id){
        try {
            $deliverable = Deliverable::findOrFail($id);
            $pageTitle = "Manage All Deliverable Details";
            $emptyMessage = 'No shortcode available';
            return view('admin.deliverables.edit', compact('pageTitle', 'deliverable','emptyMessage'));
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
            $deliverable = Deliverable::findOrFail($id);
            $deliverable->name = $request->name;
            $deliverable->slug = $request->slug;
            $deliverable->save();
            DB::commit();
            Log::info(["deliverable" => $deliverable]);
            $notify[] = ['success', 'Deliverable detail has been updated'];
            storeRedisData(Deliverable::$Model_Name_Space,Deliverable::$Redis_key,Deliverable::$Is_Active);
            return redirect()->route('admin.deliverable.index')->withNotify($notify);
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
            $deliverable = Deliverable::findOrFail($id);
            $deliverable->delete();
            DB::commit();
            Log::info(["deliverable" => $deliverable]);
            $notify[] = ['success', 'Deliverable Detail deleted successfully'];
            storeRedisData(Deliverable::$Model_Name_Space,Deliverable::$Redis_key,Deliverable::$Is_Active);
            return back()->withNotify($notify);
        }
        catch (\Exception $exp) {
            DB::rollback();
            Log::error($exp->getMessage());
            $notify[] = ['success', 'Deliverable deleted successfully'];
            return back()->withNotify($notify);
        }
    }
    public function activeBy(Request $request)
    {
        try {
            DB::beginTransaction();
            $deliverable = Deliverable::where('id',$request->id)->withOutGlobalScopes()->first();
            // $deliverable = Deliverable::findOrFail($request->id);
            $deliverable->is_active = 1;
            $deliverable->created_at = Carbon::now();
            $deliverable->save();
            DB::commit();
            Log::info(["deliverable" => $deliverable]);
            $notify[] = ['success', 'Deliverable Detail has been Activated'];
            storeRedisData(Deliverable::$Model_Name_Space,Deliverable::$Redis_key,Deliverable::$Is_Active);
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
            $deliverable = Deliverable::where('id',$request->id)->withOutGlobalScopes()->first();
            $deliverable->is_active = 0;
            $deliverable->created_at = Carbon::now();
            $deliverable->save();
            DB::commit();
            Log::info(["deliverable" => $deliverable]);
            $notify[] = ['success', 'Deliverable Detail has been inActive'];
            storeRedisData(Deliverable::$Model_Name_Space,Deliverable::$Redis_key,Deliverable::$Is_Active);
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
