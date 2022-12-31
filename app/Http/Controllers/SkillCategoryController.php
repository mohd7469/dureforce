<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SkillCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SkillCategoryController extends Controller
{
    public function index()
    {
        $skill_categories = SkillCategory::all();

        return $skill_categories;
    }

    public function create()
    {
        //it will return a view for creating skill_categories
//        return view('products.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
        ]);


        SkillCategory::create([
            'name' => $request['name'],
            'slug' => $request['slug'],
        ]);


    }

    public function show(SkillCategory $skill_categories)
    {
        return $skill_categories;

    }


    public function edit(SkillCategory $skill_categories)
    {
        return $skill_categories;

    }


    public function update(Request $request, SkillCategory $skill_categories)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
        ]);

        $skill_categories->update([
            'name' => $request['name'],
            'slug' => $request['slug'],
        ]);

        return true;
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

            Log::error($e->getMessage());
            return response()->json(['error' =>$e->getMessage()]);

        }
    }
}
