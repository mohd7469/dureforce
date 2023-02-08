<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Module;
use App\Models\Skills;
use App\Models\SkillCategory;
use App\Models\SubAttributes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class SkillController extends Controller
{
    public function index()
    {
        try {
            $pageTitle = "Skills List";
            $emptyMessage = "No data found";
            $Skills = Skills::latest()->paginate(getPaginate());
            return view('admin.skills.index', compact('pageTitle','Skills'));
        }catch (\Exception $exp) {
           
            Log::error($exp->getMessage());
            $notify[] = ['error', 'An error occured'];
            return back()->withNotify($notify);
        }
    }

    public function create()
    {
        try {
            
            $pageTitle = "Create Skills";
            $modules = Module::select('id', 'name')->get();
            $SkillCategorys = SkillCategory::select('id', 'name')->get();
            return view('admin.skills.create', compact('pageTitle','modules','SkillCategorys'));
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
            'skill_type' => 'required',
            'skill_category' => 'required',
        ]);

        try {
            DB::beginTransaction();
            $Skills = new Skills();
            $Skills->name = $request->name;
            $Skills->skill_type  = $request->skill_type;
            $Skills->skill_category_id  = $request->skill_category;
            $Skills->module_id = $request->module;
            $Skills->save();
            DB::commit();
            Log::info(["Skills" => $Skills]);
            $notify[] = ['success', 'Your Skills detail has been Created.'];
            return redirect()->route('admin.skill.index')->withNotify($notify);
        }catch (\Exception $exp) {
            DB::rollback();
            Log::error($exp->getMessage());
            $notify[] = ['error', 'An error occured'];
            return back()->withNotify($notify);
        }

    }

    public function show(Skills $Skills)
    {
        return $Skills;

    }


    public function editdetails($id)
    {
        try {
            
            $Skill = Skills::findOrFail($id);
            $modules = Module::select('id', 'name')->get();
            $SkillCategorys = SkillCategory::select('id', 'name')->get();
            $pageTitle = "Manage All Skills Details";
            $emptyMessage = 'No shortcode available';
            return view('admin.skills.edit', compact('Skill', 'pageTitle', 'modules',  'SkillCategorys','emptyMessage'));
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
            'skill_type' => 'required',
            'skill_category' => 'required',
        ]);

        try {
            DB::beginTransaction(); 
            $Skills = Skills::findOrFail($id);
            $Skills->name = $request->name;
            $Skills->skill_type  = $request->skill_type;
            $Skills->skill_category_id  = $request->skill_category;
            $Skills->module_id = $request->module;
            $Skills->save();
            DB::commit();
            Log::info(["Skills" => $Skills]);
            $notify[] = ['success', 'Skills detail has been updated'];
            return redirect()->route('admin.skill.index')->withNotify($notify);
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
        $Skills = Skills::find($id);
       
        $Skills->delete();
        DB::commit();
        Log::info(["Skills" => $Skills]);
        $notify[] = ['success', 'Skills deleted successfully'];
        return back()->withNotify($notify);
        }
        catch (\Exception $exp) {
            DB::rollback();
            Log::error($exp->getMessage());
            $notify[] = ['error', 'An error occured'];
            return back()->withNotify($notify);
        }
    }

}
