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
            'sub_attribute' => 'required',
            'skill_category' => 'required',
        ]);

        try {
            DB::beginTransaction();
            $Skills = new Skills();
            $Skills->name = $request->name;
            $Skills->skill_type  = $request->sub_attribute;
            $Skills->skill_category_id  = $request->skill_category;
            $Skills->module_id = $request->module;
            $Skills->save();
            DB::commit();
            Log::info(["Skills" => $Skills]);
            $notify[] = ['success', 'Your Skills detail has been Created.'];
            storeRedisData(Skills::$Model_Name_Space,Skills::$Redis_key,Skills::$Is_Active);
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
            $subAttributes = SubAttributes::where('skill_category_id',$Skill->skill_category_id)->select('id', 'title')->get();

            $pageTitle = "Manage All Skills Details";
            $emptyMessage = 'No shortcode available';
            return view('admin.skills.edit', compact('Skill', 'pageTitle', 'modules',  'SkillCategorys','emptyMessage','subAttributes'));
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
            'sub_attribute' => 'required',
            'skill_category' => 'required',
        ]);

        try {
            DB::beginTransaction(); 
            $Skills = Skills::findOrFail($id);
            $Skills->name = $request->name;
            $Skills->skill_type  = $request->sub_attribute;
            $Skills->skill_category_id  = $request->skill_category;
            $Skills->module_id = $request->module;
            $Skills->save();
            DB::commit();
            Log::info(["Skills" => $Skills]);
            $notify[] = ['success', 'Skills detail has been updated'];
            storeRedisData(Skills::$Model_Name_Space,Skills::$Redis_key,Skills::$Is_Active);
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
        storeRedisData(Skills::$Model_Name_Space,Skills::$Redis_key,Skills::$Is_Active);
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
        $sub_attribute = SubAttributes::where('skill_category_id', $request->category)->get();
        if ($sub_attribute->isEmpty()) {
            return response()->json(['error' => "Sub attribute not available under this attribute"]);
        } else {
            return response()->json($sub_attribute);
        }
    }

}
