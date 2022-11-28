<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Category;
use Carbon\Carbon;
use App\Rules\FileTypeValidate;
use Illuminate\Support\Facades\Auth;
use App\Traits\DeleteEntity;

class TechnologyLogoController extends Controller
{
    use DeleteEntity;

    public function index()
    {
    	$pageTitle = "Manage All Technology Logo";
    	$emptyMessage = "No data found";
    	$banners = Banner::where('document_type', 'Technology Logo')->withAll()->latest()->paginate(getPaginate());
    	return view('admin.technology_logo.index', compact('pageTitle', 'emptyMessage', 'banners'));
    }

    public function bannerCreate()
    {
    	$pageTitle = "Create Technology Logo";
        $categories = Category::select('id', 'name')->get();
    	return view('admin.technology_logo.create', compact('pageTitle','categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'category' => 'required',
            'sub_category' => 'required',
            'subject' => 'required',
            'image' => ['nullable','image',new FileTypeValidate(['jpg','jpeg','png'])]
        ]);
        $user = Auth::guard('admin')->user();
        $banner  = new Banner;
        if ($request->hasFile('image')) {
            try {
                $path = imagePath()['attachments']['path'];
                $file = $request->image;
                $file_original_name = $file->getClientOriginalName();
                $filename = uploadAttachments($file, $path);
                $file_extension = getFileExtension($file);
                $url = $path . '/' . $filename;
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Image could not be uploaded.'];
                return back()->withNotify($notify);
            }
        }
        $banner->category_id = $request->category;
        $banner->sub_category_id = $request->sub_category;
        $banner->document_type = 'Technology Logo';
        $banner->subject = $request->subject;
        $banner->name = $filename;
        $banner->uploaded_name  = $file_original_name;
        $banner->url = $url;
        $banner->type = $file_extension;
        $banner->save();
        $notify[] = ['success', 'Your Technology Logo has been Created.'];
        return redirect()->route('admin.techlogo.index')->withNotify($notify);
    }

    public function details($id)
    {
    	$pageTitle = "Technology Logo Details";
        $banner = Banner::where('id',$id)->withAll()->first();
    	return view('admin.technology_logo.details', compact('pageTitle', 'banner'));
    }

    public function inActive()
    {
    	$pageTitle = "InActive Technology Logo";
    	$emptyMessage = "No data found";
    	$banners = Banner::where('document_type', 'Technology Logo')->where('is_active', 0)->latest()->paginate(getPaginate());
    	return view('admin.technology_logo.index', compact('pageTitle', 'emptyMessage', 'banners'));
    }

    public function active()
    {
    	$pageTitle = "Active Technology Logo";
    	$emptyMessage = "No data found";
    	$banners = Banner::where('document_type', 'Technology Logo')->where('is_active', 1)->latest()->paginate(getPaginate());
    	return view('admin.technology_logo.index', compact('pageTitle', 'emptyMessage', 'banners'));
    }

    public function activeBy(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:banner_backgrounds,id'
        ]);
        $banner = Banner::findOrFail($request->id);
        $banner->is_active = 1;
        $banner->created_at = Carbon::now();
        $banner->save();
        $notify[] = ['success', 'Technology Logo has been Activated'];
        return redirect()->back()->withNotify($notify);
    }

    public function inActiveBy(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:banner_backgrounds,id'
        ]);
        $banner = Banner::findOrFail($request->id);
        $banner->is_active = 0;
        $banner->created_at = Carbon::now();
        $banner->save();
        $notify[] = ['success', 'Technology Logo has been inActive'];
        return redirect()->back()->withNotify($notify);
    }
}
