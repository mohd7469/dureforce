<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SupportAttachment;
use App\Models\SupportMessage;
use App\Models\Blog;
use App\Models\Status;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Rules\FileTypeValidate;
use App\Traits\DeleteEntity;
use Auth;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    public function index()
    {
    	$pageTitle = "Manage All Blog";
    	$emptyMessage = "No data found";
    	$blogs = Blog::latest()->paginate(getPaginate());
    	return view('admin.blog.index', compact('pageTitle', 'emptyMessage', 'blogs'));
    }
    public function create()
    {
    	$pageTitle = "Blog Banner";
    	return view('admin.blog.create', compact('pageTitle'));
    }
    public function edit($id)
    {
    	$pageTitle = "Edit Banner";
        $blog = Blog::findOrFail($id);
    	return view('admin.blog.edit', compact('pageTitle','blog'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'image' => ['nullable','image',new FileTypeValidate(['jpg','jpeg','png','PNG','JPG','JPEG'])]
        ]);
        $banner  = Blog::findOrFail($id);
        if ($request->hasFile('image')) {
            try {
                foreach ($request->file('image') as $file) {
                    $path = imagePath()['attachments']['path'];
                    $filename = uploadAttachments($file, $path);
                    $file_extension = getFileExtension($file);
                    $url = $path . '/' . $filename;
                    $uploaded_name = $file->getClientOriginalName();
                    $banner->attachments()->create([
                        'name' => $filename,
                        'uploaded_name' => $uploaded_name,
                        'url'           => $url,
                        'type' =>$file_extension,
                        'is_published' =>1
                    ]);
                 }
            }
            catch (\Exception $exp) {
                $notify[] = ['error', 'Document could not be uploaded.'];
                return back()->withNotify($notify);
            }
        }
        $banner->title = $request->title;
        $banner->description = $request->description;
        $banner->save();
        $notify[] = ['success', 'Your Blog has been Created.'];
        return redirect()->route('admin.blog.index')->withNotify($notify);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'image' => ['nullable','image',new FileTypeValidate(['jpg','jpeg','png','PNG','JPG','JPEG'])]
        ]);
        $blog  = new Blog();
        if ($request->hasFile('image')) {
            try {
                foreach ($request->file('image') as $file) {
                    $path = imagePath()['attachments']['path'];
                    $filename = uploadAttachments($file, $path);
                    $file_extension = getFileExtension($file);
                    $url = $path . '/' . $filename;
                    $uploaded_name = $file->getClientOriginalName();
                    
                    $blog->attachments()->create([
                        'name' => $filename,
                        'uploaded_name' => $uploaded_name,
                        'url'           => $url,
                        'type' =>$file_extension,
                        'is_published' =>1
                    ]);
                 }
            }
            catch (\Exception $exp) {
                $notify[] = ['error', 'Document could not be uploaded.'];
                return back()->withNotify($notify);
            }
        }
        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->save();
        $notify[] = ['success', 'Your Blog has been Created.'];
        return redirect()->route('admin.blog.index')->withNotify($notify);
    }
    public function details($id)
    {
    	$pageTitle = "Blog Details";
        $blog = Blog::where('id',$id)->first();
    	return view('admin.blog.details', compact('pageTitle', 'blog'));
    }
    public function activeBy(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:blogs,id'
        ]);
        $blog = Blog::findOrFail($request->id);
        $blog->is_active = 1;
        $blog->created_at = Carbon::now();
        $blog->save();
        $notify[] = ['success', 'Blog has been Activated'];
        return redirect()->back()->withNotify($notify);
    }
    public function inActiveBy(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:blogs,id'
        ]);
        $banner = Blog::findOrFail($request->id);
        $banner->is_active = 0;
        $banner->created_at = Carbon::now();
        $banner->save();
        $notify[] = ['success', 'Blog has been inActive'];
        return redirect()->back()->withNotify($notify);
    }

}
