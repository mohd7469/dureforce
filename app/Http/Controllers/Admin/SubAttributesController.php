<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Module;
use App\Models\SkillCategory;
use App\Models\SubAttributes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class SubAttributesController extends Controller
{
    public function index()
    {
        try {
            $pageTitle = "Sub Attribute List";
            $emptyMessage = "No data found";
            $subAttributes = SubAttributes::with('skillCategory')->latest()->paginate(getPaginate());
            return view('admin.sub_attribute.index', compact('pageTitle','subAttributes'));
        }catch (\Exception $exp) {
           
            Log::error($exp->getMessage());
            $notify[] = ['error', 'An error occured'];
            return back()->withNotify($notify);
        }
    }

    public function create()
    {
        try {
            
            $pageTitle = "Create Sub Attribute";
            $modules = Module::select('id', 'name')->get();
            $SkillCategorys = SkillCategory::select('id', 'name')->get();
            return view('admin.sub_attribute.create', compact('pageTitle','modules','SkillCategorys'));
        }catch (\Exception $exp) {
            
            Log::error($exp->getMessage());
            $notify[] = ['error', 'An error occured'];
            return back()->withNotify($notify);
        }
    }


    public function store(Request $request)
    {
        $request->validate([
            'skill_category' => 'required',
            'title' => 'required',
            'module' => 'required',
        ]);

        try {
            DB::beginTransaction();
            $subAttributes = new SubAttributes();
            $subAttributes->skill_category_id  = $request->skill_category;
            $subAttributes->title = $request->title;
            $subAttributes->module_id = $request->module;
            $subAttributes->is_active = 1;
            $subAttributes->save();
            DB::commit();
            Log::info(["SubAttributes" => $subAttributes]);
            $notify[] = ['success', 'Your Sub Attribute detail has been Created.'];
            return redirect()->route('admin.sub.attribute.index')->withNotify($notify);
        }catch (\Exception $exp) {
            DB::rollback();
            Log::error($exp->getMessage());
            $notify[] = ['error', 'An error occured'];
            return back()->withNotify($notify);
        }

    }

    public function show(SubAttributes $subAttributes)
    {
        return $subAttributes;

    }


    public function editdetails($id)
    {
        try {
            
            $subAttribute = SubAttributes::findOrFail($id);
            $modules = Module::select('id', 'name')->get();
            $SkillCategorys = SkillCategory::select('id', 'name')->get();
            $pageTitle = "Manage All Sub Attribute Details";
            $emptyMessage = 'No shortcode available';
            return view('admin.sub_attribute.edit', compact('subAttribute', 'pageTitle', 'modules',  'SkillCategorys','emptyMessage'));
        }catch (\Exception $exp) {
           
            Log::error($exp->getMessage());
            $notify[] = ['error', 'An error occured'];
            return back()->withNotify($notify);
        }

    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'skill_category' => 'required',
            'title' => 'required',
            'module' => 'required',
        ]);

        try {
            DB::beginTransaction(); 
            $subAttributes = SubAttributes::findOrFail($id);
            $subAttributes->skill_category_id  = $request->skill_category;
            $subAttributes->title = $request->title;
            $subAttributes->module_id = $request->module;
            $subAttributes->is_active = 1;
            $subAttributes->save();
            DB::commit();
            Log::info(["SubAttributes" => $subAttributes]);
            $notify[] = ['success', 'Sub Attribute detail has been updated'];
            return redirect()->route('admin.sub.attribute.index')->withNotify($notify);
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
        $subAttributes = SubAttributes::find($id);
       
        $subAttributes->delete();
        DB::commit();
        Log::info(["subAttributes" => $subAttributes]);
        $notify[] = ['success', 'Sub Attribute deleted successfully'];
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
        $SubAttribute = SubAttributes::findOrFail($request->id);
        $SubAttribute->is_active = 1;
        $SubAttribute->created_at = Carbon::now();
        $SubAttribute->save();
        $notify[] = ['success', 'Sub Attribute has been Activated'];
        return redirect()->back()->withNotify($notify);
    }
    public function inActiveBy(Request $request)
    {
        $SubAttribute = SubAttributes::findOrFail($request->id);
        $SubAttribute->is_active = 0;
        $SubAttribute->created_at = Carbon::now();
        $SubAttribute->save();
        $notify[] = ['success', 'Sub Attribute has been inActive'];
        return redirect()->back()->withNotify($notify);
    }

    public function destroy(SubAttributes $skill_categories)
    {
        $skill_categories->delete();

        return true;
    }

    public function getSkills(Request $request)
    {
        try {
            $category = Category::where('id', $request->category_id)->with(['skill' => function ($q) use ($request) {
                $q->when(isset($request->sub_category_id), function ($q) use ($request) {
                    $q->where('sub_category_id', $request->sub_category_id);
                });

            }])->get();

            $skill_categories = $category[0]->skill;
            $skill_categories = collect($skill_categories)->groupBy('skill_categories.name');
            $skills_with_categories = $skill_categories->map(function ($item, $key) {
                $grouped_skills = ($item->groupby('skill_type'));
                $result = $grouped_skills->map(function ($item, $key) {
                    return $item->toArray();
                });
                return $result->toArray();
            });

            return response()->json($skills_with_categories);

        } catch (\Exception $e) {

            errorLogMessage($e);
            return response()->json(['error' =>$e->getMessage()]);

        }
    }
}
