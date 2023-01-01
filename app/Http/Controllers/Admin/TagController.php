<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class TagController extends Controller
{
    public function index()
    {
        
    	$pageTitle = "Tag List";
    	$emptyMessage = "No data found";
        $tags = Tag::latest()->paginate(getPaginate());

        return view('admin.tags.index', compact('pageTitle','tags'));
    }
    public function Create()
    {
    	$pageTitle = "Create Tags";
        
       
    	return view('admin.tags.create', compact('pageTitle'));
    }
    public function store(Request $request)
    {
    
        $this->validate($request, [
           
            'name' => 'required',
            'slug' => 'required',
            ]);
       
        $tag  = new Tag();
        
        $tag->name = $request->name;
        $tag->slug = $request->slug;
        
       
        // $dod->module_id = 1;
       
        $tag->save();

        
        $notify[] = ['success', 'Your Tag detail has been Created.'];
        return redirect()->route('admin.tag.index')->withNotify($notify);
    }
    public function editdetails($id){
        $tag = Tag::findOrFail($id);
        $pageTitle = "Manage All Tag Details";
        $emptyMessage = 'No shortcode available';
        return view('admin.tags.edit', compact('pageTitle', 'tag','emptyMessage'));
    }
    public function update(Request $request, $id){
        $this->validate($request, [
           
            'name' => 'required',
            'slug' => 'required',
            ]);
        
        $tag = Tag::findOrFail($id);
      
     
        $tag->name = $request->name;
        $tag->slug = $request->slug;
        $tag->save();

        $notify[] = ['success', 'Job Tag has been updated'];
        return redirect()->route('admin.tag.index')->withNotify($notify);
    }
    public function delete($id)
    {
        $tag = Tag::find($id);
       
        $tag->delete();
        $notify[] = ['success', 'Tag deleted successfully'];
        return back()->withNotify($notify);
    }
    public function activeBy(Request $request)
    {
        
        $tag = Tag::findOrFail($request->id);
        $tag->is_active = 1;
        $tag->created_at = Carbon::now();
        $tag->save();
        $notify[] = ['success', 'Tag has been Activated'];
        return redirect()->back()->withNotify($notify);
    }
    public function inActiveBy(Request $request)
    {
       
        $tag = Tag::findOrFail($request->id);
        $tag->is_active = 0;
        $tag->created_at = Carbon::now();
        $tag->save();
        $notify[] = ['success', 'Tag has been inActive'];
        return redirect()->back()->withNotify($notify);
    }
}
