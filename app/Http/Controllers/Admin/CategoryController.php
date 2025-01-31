<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Rules\FileTypeValidate;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Module;
use App\Models\SubCategory;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{

    public function index()
    {
        $pageTitle = "Category list";
        $modules = Module::select('id', 'name')->get();
        $emptyMessage = "No data found";
        $categorys = Category::with('subCategory','module')->latest()->paginate(getPaginate());
        return view('admin.category.index', compact('categorys', 'pageTitle', 'emptyMessage','modules'));
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required|unique:categories|max:50',
            // 'type_id' => 'required',
        ]);
        $category = new Category;
        $category->name = $request->name;
        $category->type_id = 1;
        $category->is_active = $request->is_active ? 1 : 0;
        $category->module_id = $request->module;
        $category->save();
        $notify[] = ['success', 'Category has been created'];
        storeRedisData(Category::$Model_Name_Space,Category::$Redis_key,Category::$Is_Active);
        return back()->withNotify($notify);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50|unique:categories,name,' . $request->id,
            'id' => 'required|exists:categories,id',
            // 'type_id' => 'required',
        ]);
        $category = Category::find($request->id);
        $category->name = $request->name;
        $category->type_id = $request->type_id;
        $category->is_active = $request->is_active ? 1 : 0;
        $category->module_id = $request->module;
        $category->save();
        $notify[] = ['success', 'Category has been updated'];
        storeRedisData(Category::$Model_Name_Space,Category::$Redis_key,Category::$Is_Active);
        return back()->withNotify($notify);
    }


    public function subCategoryIndex()
    {
        $pageTitle = "Sub Category list";
        $emptyMessage = "No data found";
        $categorys = Category::all();
        $subCategorys = SubCategory::with('category')->latest()->paginate(getPaginate());
        
        return view('admin.category.sub_index', compact('subCategorys', 'pageTitle', 'emptyMessage', 'categorys'));
    }

    public function activeBy(Request $request)
    {
        $SubCategory = SubCategory::findOrFail($request->id);
        $SubCategory->is_active = 1;
        $SubCategory->created_at = Carbon::now();
        $SubCategory->save();
        $notify[] = ['success', 'Sub Category has been Activated'];
        return redirect()->back()->withNotify($notify);
    }
    public function inActiveBy(Request $request)
    {
        $SubCategory = SubCategory::findOrFail($request->id);
        $SubCategory->is_active = 0;
        $SubCategory->created_at = Carbon::now();
        $SubCategory->save();
        $notify[] = ['success', 'Sub Category has been inActive'];
        return redirect()->back()->withNotify($notify);
    }


    public function subCategoryStore(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'name' => 'required|unique:sub_categories|max:50',
            // 'image' => ['sometimes', 'image', new FileTypeValidate(['jpeg', 'jpg', 'png'])],
            'category_id' => 'required|exists:categories,id'
        ]);
        $subcategory = new SubCategory;
        $subcategory->name = $request->name;
        $subcategory->is_active = $request->is_active ? 1 : 0;
        $subcategory->category_id = $request->category_id;
        $path = imagePath()['subcategory']['path'];
        $size = imagePath()['subcategory']['size'];
        if ($request->hasFile('image')) {
            $file = $request->image;
            $this->fileValidate($file);
            try {
                $filename = uploadImage($file, $path, $size);
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Image could not be uploaded.'];
                return back()->withNotify($notify);
            }
            $subcategory->image = $filename;
        }
        $subcategory->save();
        $notify[] = ['success', 'Sub category has been created'];
        return back()->withNotify($notify);
    }


    public function subCategoryUpdate(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:sub_categories,id',
            'name' => 'required|max:50|unique:sub_categories,name,' . $request->id,
            // 'image' => ['image', new FileTypeValidate(['jpeg', 'jpg', 'png'])],
            'category_id' => 'required|exists:categories,id'
        ]);
        $subcategory = SubCategory::find($request->id);
        $subcategory->name = $request->name;
        $subcategory->is_active = $request->is_active ? 1 : 0;
        $subcategory->category_id = $request->category_id;
        $path = imagePath()['subcategory']['path'];
        $size = imagePath()['subcategory']['size'];
        if ($request->hasFile('image')) {
            $file = $request->image;
            $this->fileValidate($file);
            try {
                $filename = uploadImage($file, $path, $size);
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Image could not be uploaded.'];
                return back()->withNotify($notify);
            }
            $subcategory->image = $filename;
        }
        $subcategory->save();
        $notify[] = ['success', 'Sub category has been updated'];
        return back()->withNotify($notify);
    }


    private function fileValidate($file)
    {
        $allowedExts = array('jpeg', 'jpg', 'png');
        $ext = strtolower($file->getClientOriginalExtension());
        if (!in_array($ext, $allowedExts)) {
            $notify = 'Only jpeg, jpg, png files are allowed';
            return back()->withNotify($notify);
        }
    }
    public function delete($id)
    {
       try {
            DB::beginTransaction();
            $category = Category::find($id);
            $category->delete();
            $notify[] = ['success', 'Category deleted successfully'];
            storeRedisData(Category::$Model_Name_Space,Category::$Redis_key,Category::$Is_Active);
            DB::commit();
            return back()->withNotify($notify);

        } catch (\Exception $e) {
            DB::rollBack();
            $notify[] = ['success', ' Category delete Failed'];
            return back()->withNotify($notify);

        }
    }
    public function deleteSubCategory($id)
    {
        
       
        try {
            DB::beginTransaction();
            $subCategory = SubCategory::find($id);
            $subCategory->delete();
            $notify[] = ['success', 'Sub Category deleted successfully'];
            
            DB::commit();
            return back()->withNotify($notify);

        } catch (\Exception $e) {
            DB::rollBack();
            $notify[] = ['success', 'Sub Category delete Failed'];
            return back()->withNotify($notify);

        }
    }
    
}
