<?php

namespace App\Http\Controllers;

use App\Models\SkillCategory;
use Illuminate\Http\Request;

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
}
