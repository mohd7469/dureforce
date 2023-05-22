<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SkillCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SkillCategoryController extends Controller
{
    public function index()
    {
        try {
            $pageTitle = "Attribute List";
            $emptyMessage = "No data found";
            $skill_categories = SkillCategory::latest()->paginate(getPaginate());
            return view('admin.skill_category.index', compact('pageTitle','skill_categories'));
        }catch (\Exception $exp) {
           
            Log::error($exp->getMessage());
            $notify[] = ['error', 'An error occured'];
            return back()->withNotify($notify);
        }
    }

    public function create()
    {
        try {
            
            $pageTitle = "Create Attribute";
            return view('admin.skill_category.create', compact('pageTitle'));
        }catch (\Exception $exp) {
            
            Log::error($exp->getMessage());
            $notify[] = ['error', 'An error occured'];
            return back()->withNotify($notify);
        }
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        try {
            DB::beginTransaction();
            $skill_categories = new SkillCategory();
            $skill_categories->name = $request->name;
            $skill_categories->slug = $request->slug;
            $skill_categories->save();
            DB::commit();
            Log::info(["skillCategory" => $skill_categories]);
            $notify[] = ['success', 'Your Attribute detail has been Created.'];
            return redirect()->route('admin.skill.category.index')->withNotify($notify);
        }catch (\Exception $exp) {
            DB::rollback();
            Log::error($exp->getMessage());
            $notify[] = ['error', 'An error occured'];
            return back()->withNotify($notify);
        }

    }

    public function show(SkillCategory $skill_categories)
    {
        return $skill_categories;

    }


    public function editdetails($id)
    {
        try {
            
            $skill_category = SkillCategory::findOrFail($id);
            $pageTitle = "Manage All Attribute Details";
            $emptyMessage = 'No shortcode available';
            return view('admin.skill_category.edit', compact('pageTitle', 'skill_category','emptyMessage'));
        }catch (\Exception $exp) {
           
            Log::error($exp->getMessage());
            $notify[] = ['error', 'An error occured'];
            return back()->withNotify($notify);
        }

    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        try {
            DB::beginTransaction(); 
            $skill_categories = SkillCategory::findOrFail($id);
            $skill_categories->name = $request->name;
            $skill_categories->slug = $request->slug;
            $skill_categories->save();
            DB::commit();
            Log::info(["skillCategory" => $skill_categories]);
            $notify[] = ['success', 'Attribute detail has been updated'];
            return redirect()->route('admin.skill.category.index')->withNotify($notify);
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
        $skillCategory = SkillCategory::find($id);
       
        $skillCategory->delete();
        DB::commit();
        Log::info(["skillCategory" => $skillCategory]);
        $notify[] = ['success', 'Attribute deleted successfully'];
        return back()->withNotify($notify);
        }
        catch (\Exception $exp) {
            DB::rollback();
            Log::error($exp->getMessage());
            $notify[] = ['error', 'An error occured'];
            return back()->withNotify($notify);
        }
    }

    public function destroy(SkillCategory $skill_categories)
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
