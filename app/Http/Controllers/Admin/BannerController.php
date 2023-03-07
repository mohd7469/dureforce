<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Category;
use App\Models\SubCategory;
use Carbon\Carbon;
use App\Rules\FileTypeValidate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Traits\DeleteEntity;

class BannerController extends Controller
{
    use DeleteEntity;

    public function index()
    {
        try {
            $pageTitle = "Manage All Banner";
            $emptyMessage = "No data found";
            $banners = Banner::where('document_type', 'Background')->withAll()->latest()->paginate(getPaginate());
            Log::info($banners);
            return view('admin.banner.index', compact('pageTitle', 'emptyMessage', 'banners'));
        }catch (\Exception $exp) {
            Log::error($exp->getMessage());
            $notify[] = ['error', 'An error occured'];
            return back()->withNotify($notify);
        }
    }

    public function bannerCreate()
    {
        try {
            $pageTitle = "Create Banner";
            $categories = Category::where('is_active',1)->select('id', 'name')->get();
            Log::info($categories);
            return view('admin.banner.create', compact('pageTitle','categories'));
        }catch (\Exception $exp) {
            Log::error($exp->getMessage());
            $notify[] = ['error', 'An error occured'];
            return back()->withNotify($notify);
        }
    }
    public function bannerEdit($id)
    {
        try {
            $pageTitle = "Edit Banner";
            $banner = Banner::findOrFail($id);
            $categories = Category::where('is_active',1)->select('id', 'name')->get();
            $subCategories = SubCategory::where('category_id',$banner->category_id)->where('is_active',1)->select('id', 'name')->get();
            Log::info($categories);
            return view('admin.banner.edit', compact('pageTitle','categories','banner','subCategories'));
        }catch (\Exception $exp) {
            Log::error($exp->getMessage());
            $notify[] = ['error', 'An error occured'];
            return back()->withNotify($notify);
        }
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'category' => 'required',
            'sub_category' => 'required',
            'subject' => 'required',
            'image' => ['nullable','image',new FileTypeValidate(['jpg','jpeg','png','PNG','JPG','JPEG'])]
        ]);
        try {
            DB::beginTransaction();
            $banner  = Banner::findOrFail($id);
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
                $banner->name = $filename;
                $banner->uploaded_name  = $file_original_name;
                $banner->url = $url;
                $banner->type = $file_extension;
            }
            $banner->category_id = $request->category;
            $banner->sub_category_id = $request->sub_category;
            $banner->document_type = 'Background';
            $banner->subject = $request->subject;
            $banner->save();
            DB::commit();
            Log::info(["banner" => $banner]);
            $notify[] = ['success', 'Your Banner has been Created.'];
            return redirect()->route('admin.banner.index')->withNotify($notify);
        }catch (\Exception $exp) {
            DB::rollback();
            Log::error($exp->getMessage());
            $notify[] = ['error', 'An error occured'];
            return back()->withNotify($notify);
        }    
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'category' => 'required',
            'sub_category' => 'required',
            'subject' => 'required',
            'image' => ['nullable','image',new FileTypeValidate(['jpg','jpeg','png','PNG','JPG','JPEG'])]
        ]);
        try {
            DB::beginTransaction();
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
            $banner->document_type = 'Background';
            $banner->subject = $request->subject;
            $banner->name = $filename;
            $banner->uploaded_name  = $file_original_name;
            $banner->url = $url;
            $banner->type = $file_extension;
            $banner->save();
            DB::commit();
            Log::info(["banner" => $banner]);
            $notify[] = ['success', 'Your Banner has been Created.'];
            return redirect()->route('admin.banner.index')->withNotify($notify);
        }
        catch (\Exception $exp) {
            DB::rollback();
            Log::error($exp->getMessage());
            $notify[] = ['error', 'An error occured'];
           return back()->withNotify($notify);
        }
    }

    public function details($id)
    {
        try {
            $pageTitle = "Banner Details";
            $banner = Banner::where('id',$id)->withAll()->first();
            Log::info(["banner" => $banner]);
            return view('admin.banner.details', compact('pageTitle', 'banner'));
        }catch (\Exception $exp) {
            Log::error($exp->getMessage());
            $notify[] = ['error', 'An error occured'];
            return back()->withNotify($notify);
        }
    }

    public function category(Request $request)
    {
        try {
            $sub_category = SubCategory::where('category_id', $request->category)->get();
            Log::info(["sub_category" => $sub_category]);
            if ($sub_category->isEmpty()) {
                return response()->json(['error' => "Sub category not available under this category"]);
            } else {
                return response()->json($sub_category);
            }
        }catch (\Exception $exp) {
            Log::error($exp->getMessage());
            $notify[] = ['error', 'An error occured'];
            return back()->withNotify($notify);
        }
    }

    public function inActive()
    {
        try {
            $pageTitle = "InActive Banner";
            $emptyMessage = "No data found";
            $banners = Banner::where('document_type', 'Background')->where('is_active', 0)->latest()->paginate(getPaginate());
            Log::info(["banners" => $banners]);
            return view('admin.banner.inactive', compact('pageTitle', 'emptyMessage', 'banners'));
        }catch (\Exception $exp) {
            Log::error($exp->getMessage());
            $notify[] = ['error', 'An error occured'];
            return back()->withNotify($notify);
        }
    }

    public function active()
    {
        try {
            $pageTitle = "Active Banner";
            $emptyMessage = "No data found";
            $banners = Banner::where('document_type', 'Background')->where('is_active', 1)->latest()->paginate(getPaginate());
            Log::info(["banners" => $banners]);
            return view('admin.banner.active', compact('pageTitle', 'emptyMessage', 'banners'));
        }catch (\Exception $exp) {
            Log::error($exp->getMessage());
            $notify[] = ['error', 'An error occured'];
            return back()->withNotify($notify);
        }
    }

    public function activeBy(Request $request)
    {
        try {
            DB::beginTransaction();
            $request->validate([
                'id' => 'required|exists:banner_backgrounds,id'
            ]);
            $banner = Banner::findOrFail($request->id);
            $banner->is_active = 1;
            $banner->created_at = Carbon::now();
            $banner->save();
            DB::commit();
            Log::info(["banner" => $banner]);
            $notify[] = ['success', 'Banner has been Activated'];
            return redirect()->back()->withNotify($notify);
        }catch (\Exception $exp) {
            DB::rollback();
            Log::error($exp->getMessage());
            $notify[] = ['error', 'An error occured'];
            return back()->withNotify($notify);
        }
    }

    public function inActiveBy(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:banner_backgrounds,id'
        ]);
        try {
            DB::beginTransaction();
            $banner = Banner::findOrFail($request->id);
            $banner->is_active = 0;
            $banner->created_at = Carbon::now();
            $banner->save();
            DB::commit();
            Log::info(["banner" => $banner]);
            $notify[] = ['success', 'Banner has been inActive'];
            return redirect()->back()->withNotify($notify);
        }catch (\Exception $exp) {
            DB::rollback();
            Log::error($exp->getMessage());
            $notify[] = ['error', 'An error occured'];
            return back()->withNotify($notify);
        }
    }
    
    
}
