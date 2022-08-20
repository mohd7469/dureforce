<?php

namespace App\Http\Controllers;

use App\Models\SkillCategory;
use App\Models\SkillSubCategory;
use Illuminate\Http\Request;

class SkillSubCategoryController extends Controller
{
    public function index()
    {
        $skill_sub_categories = SkillCategory::all();

        return $skill_sub_categories;
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

    public function show(SkillSubCategory $skill_sub_categories)
    {
        return $skill_sub_categories;

    }


    public function edit(SkillSubCategory $skill_sub_categories)
    {
        return $skill_sub_categories;

    }


    public function update(Request $request, SkillSubCategory $skill_sub_categories)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
        ]);

        $skill_sub_categories->update([
            'name' => $request['name'],
            'slug' => $request['slug'],
        ]);

        return true;
    }

    public function destroy(SkillSubCategory $skill_sub_categories)
    {
        $skill_sub_categories->delete();

        return true;
    }
}
