<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class TagController extends Controller

{
    public function index()
    {
        try {
            
    	$pageTitle = "Tag List";
    	$emptyMessage = "No data found";
        $tags = Tag::latest()->paginate(getPaginate());
        
        Log::info($tags);
        return view('admin.tags.index', compact('pageTitle','tags'));
        }catch (\Exception $exp) {
            
            Log::error($exp->getMessage());
            $notify[] = ['error', 'An error occured'];
            return back()->withNotify($notify);
        }
    }
    public function Create()
    {
        try {
           
    	$pageTitle = "Create Tags";
        
       
        return view('admin.tags.create', compact('pageTitle'));
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
       
        $tag  = new Tag();
        
        $tag->name = $request->name;
        $tag->slug = $request->slug;
        
       
        // $dod->module_id = 1;
       
        $tag->save();

        DB::commit();
        Log::info(["tag" => $tag]);
        $notify[] = ['success', 'Your Tag detail has been Created.'];
        return redirect()->route('admin.tag.index')->withNotify($notify);
    }catch (\Exception $exp) {
        DB::rollback();
        Log::error($exp->getMessage());
        $notify[] = ['error', 'An error occured'];
        return back()->withNotify($notify);
    }
    }
    public function editdetails($id){
        try {
            
        $tag = Tag::findOrFail($id);
        $pageTitle = "Manage All Tag Details";
        $emptyMessage = 'No shortcode available';
        return view('admin.tags.edit', compact('pageTitle', 'tag','emptyMessage'));
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
        
        $tag = Tag::findOrFail($id);
      
     
        $tag->name = $request->name;
        $tag->slug = $request->slug;
        $tag->save();
        DB::commit();
        Log::info(["tag" => $tag]);
        $notify[] = ['success', 'Job Tag has been updated'];
        return redirect()->route('admin.tag.index')->withNotify($notify);
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
        $tag = Tag::find($id);
       
        $tag->delete();
        DB::commit();
        Log::info(["tag" => $tag]);
        $notify[] = ['success', 'Tag deleted successfully'];
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
        
        $tag = Tag::findOrFail($request->id);
        $tag->is_active = 1;
        $tag->created_at = Carbon::now();
        $tag->save();
        DB::commit();
        Log::info(["tag" => $tag]);
        $notify[] = ['success', 'Tag has been Activated'];
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
        $tag = Tag::findOrFail($request->id);
        $tag->is_active = 0;
        $tag->created_at = Carbon::now();
        $tag->save();
        DB::commit();
        Log::info(["tag" => $tag]);
        $notify[] = ['success', 'Tag has been inActive'];
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
