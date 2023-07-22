<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Permission;
use App\Models\Admin;
use App\Models\AdminPermission;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class StaffController extends Controller
{
    
    public function index()
    {
    	$pageTitle = "All Staff";
    	$emptyMessage = "No data found";
    	$staffs = Admin::paginate(getPaginate());
    	return view('admin.staff.index', compact('pageTitle', 'emptyMessage', 'staffs'));
    }


    public function create()
    {
    	$pageTitle = "Staff Create";
    	$permissions = Permission::all();
    	return view('admin.staff.create', compact('pageTitle', 'permissions'));
    }


    public function store(Request $request)
    {
    	$request->validate([
            'name' => 'required|string|max:40',
            'username' => 'required|string|max:40|unique:admins',
            'email' => 'required|string|max:40|unique:admins',
            'permission' => 'required|array',
            'password' => 'required|string|min:6|confirmed'
        ]);
        $staff = new Admin();
        $staff->name = $request->name;
        $staff->username = $request->username;
        $staff->email = $request->email;
        $staff->show_password = encrypt($request->password);
        $staff->password = Hash::make($request->password);
        $staff->save();
        $staff->admin_permissions()->sync($request->permission);
//        notify($staff, 'STAFF_CREATE', [
//            'password' => $request->password,
//            'email' => $request->email,
//            'username' => $request->username
//        ]);
        $notify[] = ['success', 'Staff has been created.'];
        $url = '/admin/staff/index';
        return Redirect::to($url)->withNotify($notify);
    }

    public function edit($id)
    {

    	$pageTitle = "Staff Update";
    	$permissions = Permission::all();
    	$staff = Admin::findOrFail($id);
    	$staff_permission = AdminPermission::where('admin_id',$id)->get();
    	return view('admin.staff.edit', compact('pageTitle', 'staff', 'permissions','staff_permission'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'username' => 'required|string|max:40|unique:admins,username,'.$id,
            'email' => 'required|string|max:90|unique:admins,email,'.$id,
            'permission' => 'required|array',
            'password' => 'nullable|min:6|confirmed'
        ]);
        AdminPermission::where('admin_id',$id)->delete();
        $staff = Admin::where('id', $id)->first();
        // if(!$staff)
        // {
        //     $notify[] = ['error', "Super Admin can't be update"];
        //     return back()->withNotify($notify);
        // }
        $staff->name = $request->name;
        $staff->username = $request->username;
        $staff->email = $request->email;
        $staff->show_password = $request->password ?  encrypt($request->password) : $staff->show_password;
        $staff->password = $request->password ? Hash::make($request->password) : $staff->password;
        $staff->save();
        // dd($request->all());

        $staff->admin_permissions()->sync($request->permission);
        $notify[] = ['success', 'Staff has been updated.'];
        return back()->withNotify($notify);
    }


    public function delete(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:admins,id'
        ]);
        $staffDelete = Admin::where('status', 0)->where('id', $request->id)->first();
        if(!$staffDelete)
        {
            $notify[] = ['error', "Super Admin can't be delete"];
            return back()->withNotify($notify);
        }
        $staffDelete->delete();
        $notify[] = ['success', 'The staff has been deleted'];
        return back()->withNotify($notify);

    }

    public function activeBy(Request $request)
    {
        try {
            DB::beginTransaction();
            $staff = Admin::where('id',$request->id)->first();
            $staff->status = 1;
            $staff->save();
            DB::commit();
            Log::info(["staff" => $staff]);
            $notify[] = ['success', 'Staff status has been Activated'];
            return redirect()->back()->withNotify($notify);
        }
        catch (\Exception $exp) {
            DB::rollback();
            Log::error($exp->getMessage());
            $notify[] = ['error', 'An error occured'];
                return back()->withNotify($notify);
        }
    }
    public function inActiveBy(Request $request)
    {
        try {
            DB::beginTransaction();
            $staff = Admin::findOrFail($request->id);
            $staff->status = 0;
            $staff->save();
            DB::commit();
            Log::info(["staff" => $staff]);
            $notify[] = ['success', 'Staff status has been inActive'];
            return redirect()->back()->withNotify($notify);
        }
        catch (\Exception $exp) {
            DB::rollback();
            Log::error($exp->getMessage());
            $notify[] = ['error', 'An error occured'];
            return back()->withNotify($notify);
        }
    }
}
