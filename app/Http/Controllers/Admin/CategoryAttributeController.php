<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Module;
use App\Models\Skills;
use App\Models\CategoryAttribute;
use App\Models\SkillCategory;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class CategoryAttributeController extends Controller
{
    public function index()
    {
        try {
            $pageTitle = "Category Attribute List";
            $emptyMessage = "No data found";
            $categoryAttributes = CategoryAttribute::WithAll()->latest()->paginate(getPaginate());
            return view('admin.skill_attributes.index', compact('pageTitle','categoryAttributes'));
        }catch (\Exception $exp) {

            Log::error($exp->getMessage());
            $notify[] = ['error', 'An error occured'];
            return back()->withNotify($notify);
        }
    }

    public function create()
    {
        try {
            
            $pageTitle = "Create Category Attribute";
            $skills = Skills::select('id', 'name')->get();
            $categories = Category::select('id', 'name')->get();
            return view('admin.skill_attributes.create', compact('pageTitle','skills','categories'));
        }catch (\Exception $exp) {
            
            Log::error($exp->getMessage());
            $notify[] = ['error', 'An error occured'];
            return back()->withNotify($notify);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'sub_category' => 'required',
            'skill' => 'required',
        ]);

        try {
            DB::beginTransaction();
            $categoryAttributes = new CategoryAttribute();
            $categoryAttributes->category_id = $request->category;
            $categoryAttributes->sub_category_id  = $request->sub_category;
            $categoryAttributes->skills_id  = $request->skill;
            $categoryAttributes->save();
            DB::commit();
            Log::info(["categoryAttributes" => $categoryAttributes]);
            $notify[] = ['success', 'Your Category Attribute detail has been Created.'];
            storeRedisData(CategoryAttribute::$Model_Name_Space,CategoryAttribute::$Redis_key,CategoryAttribute::$Is_Active);
            return redirect()->route('admin.category.attribute.index')->withNotify($notify);
        }catch (\Exception $exp) {
            DB::rollback();
            Log::error($exp->getMessage());
            $notify[] = ['error', 'An error occured'];
            return back()->withNotify($notify);
        }

    }

    public function show(CategoryAttribute $categoryAttributes)
    {
        return $categoryAttributes;

    }


    public function editdetails($id)
    {
        try {
            
            $categoryAttribute = CategoryAttribute::findOrFail($id);
            $skills = Skills::select('id', 'name')->get();
            $categories = Category::select('id', 'name')->get();
            $subCategories = SubCategory::where('category_id',$categoryAttribute->category_id)->select('id', 'name')->get();

            $pageTitle = "Manage All Category Attributes Details";
            $emptyMessage = 'No shortcode available';
            return view('admin.skill_attributes.edit', compact('categoryAttribute', 'pageTitle', 'skills',  'categories','emptyMessage','subCategories'));
        }catch (\Exception $exp) {
           
            Log::error($exp->getMessage());
            $notify[] = ['error', 'An error occured'];
            return back()->withNotify($notify);
        }

    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'category' => 'required',
            'sub_category' => 'required',
            'skill' => 'required',
        ]);

        try {
            DB::beginTransaction(); 
            $categoryAttributes = CategoryAttribute::findOrFail($id);
            $categoryAttributes->category_id = $request->category;
            $categoryAttributes->sub_category_id  = $request->sub_category;
            $categoryAttributes->skills_id  = $request->skill;
            $categoryAttributes->save();
            DB::commit();
            Log::info(["categoryAttributes" => $categoryAttributes]);
            $notify[] = ['success', 'Category Attribute detail has been updated'];
            storeRedisData(CategoryAttribute::$Model_Name_Space,CategoryAttribute::$Redis_key,CategoryAttribute::$Is_Active);
            return redirect()->route('admin.category.attribute.index')->withNotify($notify);
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
        $categoryAttributes = CategoryAttribute::find($id);
       
        $categoryAttributes->delete();
        DB::commit();
        Log::info(["categoryAttributes" => $categoryAttributes]);
        $notify[] = ['success', 'Category Attribute deleted successfully'];
        storeRedisData(CategoryAttribute::$Model_Name_Space,CategoryAttribute::$Redis_key,CategoryAttribute::$Is_Active);
        return back()->withNotify($notify);
        }
        catch (\Exception $exp) {
            DB::rollback();
            Log::error($exp->getMessage());
            $notify[] = ['error', 'An error occured'];
            return back()->withNotify($notify);
        }
    }

    public function attribute(Request $request)
    {
        $subCategory = SubCategory::where('category_id', $request->category)->get();
        if ($subCategory->isEmpty()) {
            return response()->json(['error' => "Sub Category not available under this attribute"]);
        } else {
            return response()->json($subCategory);
        }
    }

}
