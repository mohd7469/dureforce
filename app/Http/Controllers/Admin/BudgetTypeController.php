<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BudgetType;
use Illuminate\Http\Request;
use App\Models\Module;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
class BudgetTypeController extends Controller
{
    public function index()
    {
        try {
            
    	$pageTitle = "Budget Type List";
    	$emptyMessage = "No data found";
        $budgetTypes = BudgetType::with('module')->latest()->paginate(getPaginate());

        return view('admin.budget_types.index', compact('pageTitle','budgetTypes'));
    }catch (\Exception $exp) {
        
        Log::error($exp->getMessage());
        $notify[] = ['error', 'An error occured'];
        return back()->withNotify($notify);
    }
    }
    public function Create()
    {
        try {
            
    	$pageTitle = "Create Budget Type";
        $modules = Module::select('id', 'name')->get();
        return view('admin.budget_types.create', compact('pageTitle','modules'));
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
            'module' => 'required',
            
        ]);
        try {
            DB::beginTransaction();
       
        $budgetType  = new BudgetType();
        
       
        $budgetType->title = $request->title;
        $budgetType->slug = $request->slug;
        $budgetType->module_id = $request->module;
       
        $budgetType->save();
        DB::commit();
        Log::info(["budgetType" => $budgetType]);
        
        $notify[] = ['success', 'Your Budget Type detail has been Created.'];
        return redirect()->route('admin.budget.type.index')->withNotify($notify);
    }catch (\Exception $exp) {
        DB::rollback();
        Log::error($exp->getMessage());
        $notify[] = ['error', 'An error occured'];
        return back()->withNotify($notify);
    }
    }
    public function editdetails($id){
        try {
            
        $budgetType = BudgetType::findOrFail($id);
        $modules = Module::select('id', 'name')->get();
        $pageTitle = "Manage All Budget Type Details";
        $emptyMessage = 'No shortcode available';
        return view('admin.budget_types.edit', compact('pageTitle', 'budgetType','emptyMessage','modules'));
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
            'module' => 'required',
            
        ]);
        try {
            DB::beginTransaction();
        $budgetType = BudgetType::findOrFail($id);
      
     
        $budgetType->title = $request->title;
        $budgetType->slug = $request->slug;
        $budgetType->module_id = $request->module;

        $budgetType->save();
        DB::commit();
        Log::info(["budgetType" => $budgetType]);
        $notify[] = ['success', 'Budget Type detail has been updated'];
        return redirect()->route('admin.budget.type.index')->withNotify($notify);
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
        $budgetType = BudgetType::find($id);
       
        $budgetType->delete();
        DB::commit();
        Log::info(["budgetType" => $budgetType]);
        $notify[] = ['success', 'Budget Type deleted successfully'];
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
        $budgetType = BudgetType::findOrFail($request->id);
        $budgetType->is_active = 1;
        $budgetType->created_at = Carbon::now();
        $budgetType->save();
        DB::commit();
        Log::info(["budgetType" => $budgetType]);
        $notify[] = ['success', 'Budget Type has been Activated'];
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
        $budgetType = BudgetType::findOrFail($request->id);
        $budgetType->is_active = 0;
        $budgetType->created_at = Carbon::now();
        $budgetType->save();
        DB::commit();
        Log::info(["budgetType" => $budgetType]);
        $notify[] = ['success', 'Budget Type has been inActive'];
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
