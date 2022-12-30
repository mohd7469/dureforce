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
        $pageTitle = "Tags list";
        // $emptyMessage = "No data found";
        $tags = Tag::latest()->paginate(getPaginate());
        
        return view('admin.tags.index', compact('tags', 'pageTitle'));
    }
    public function store(Request $request)
    {
      
        $request->validate([
            'name' => 'required',
            
        ]);
        $tag = new Tag();
        $tag->name = $request->name;
        $tag->is_active = $request->is_active ? 1 : 0;
        $tag->save();
        $notify[] = ['success', 'Tag has been created'];
        return back()->withNotify($notify);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
           
        ]);
        $tag = new Tag;
        $tag->name = $request->name;
        $tag->is_active = $request->is_active ? 1 : 0;
        $tag->save();
        $notify[] = ['success', 'Tags has been created'];
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
    public function delete($id)
    {
       try {
            DB::beginTransaction();
            $tag = Tag::find($id);
            $tag->delete();
            $notify[] = ['success', 'Tag deleted successfully'];
            DB::commit();
            return back()->withNotify($notify);

        } catch (\Exception $e) {
            DB::rollBack();
            $notify[] = ['success', 'Tag delete Failed'];
            return back()->withNotify($notify);

        }
    }
}
