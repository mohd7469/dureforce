<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SystemCredential;
use App\Models\SystemMailConfiguration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SystemCredentialController extends Controller
{
    //


    public function index()
    {
        $pageTitle = "System credential list";
        // $emptyMessage = "No data found";
        $emailcreds = SystemMailConfiguration::latest()->paginate(getPaginate());
        
        return view('admin.email_credentials.index', compact('emailcreds', 'pageTitle'));
    }
    public function store(Request $request)
    {
      
        $request->validate([
            'mail_driver' => 'required',
            'mail_host' => 'required',
            'mail_port' => 'required',
            'mail_username' => 'required',
            'mail_password' => 'required',
            'mail_encryption' => 'required',
            'mail_from_address' => 'required',
            'mail_from_name' => 'required',
        ]);
        $credential = new SystemMailConfiguration;
        $credential->mail_driver = $request->mail_driver;
        $credential->mail_host = $request->mail_host;
        $credential->mail_port = $request->mail_port;
        $credential->mail_username = $request->mail_username;
        $credential->mail_password = $request->mail_password;
        $credential->mail_encryption = $request->mail_encryption;
        $credential->mail_from_address = $request->mail_from_address;
        $credential->mail_from_name = $request->mail_from_name;
        
        $credential->is_active = $request->is_active ? 1 : 0;
        $credential->save();
        $notify[] = ['success', 'Email Credential has been created'];
        return back()->withNotify($notify);
    }

    public function update(Request $request)
    {
        $request->validate([
            'mail_driver' => 'required',
            'mail_host' => 'required',
            'mail_port' => 'required',
            'mail_username' => 'required',
            'mail_password' => 'required',
            'mail_encryption' => 'required',
            'mail_from_address' => 'required',
            'mail_from_name' => 'required',
        ]);
        $credential = SystemMailConfiguration::find($request->id);
        $credential->mail_driver = $request->mail_driver;
        $credential->mail_host = $request->mail_host;
        $credential->mail_port = $request->mail_port;
        $credential->mail_username = $request->mail_username;
        $credential->mail_password = $request->mail_password;
        $credential->mail_encryption = $request->mail_encryption;
        $credential->mail_from_address = $request->mail_from_address;
        $credential->mail_from_name = $request->mail_from_name;
        
        $credential->is_active = $request->is_active ? 1 : 0;
        $credential->save();
        $notify[] = ['success', 'Email Credential has been created'];
        return back()->withNotify($notify);
    }
    


    public function activeBy(Request $request)
    {
        
        $credential = SystemMailConfiguration::findOrFail($request->id);
        $credential->is_active = 1;
        $credential->created_at = Carbon::now();
        $credential->save();
        $notify[] = ['success', 'Email Credential has been Activated'];
        return redirect()->back()->withNotify($notify);
    }
    public function inActiveBy(Request $request)
    {
       
        $credential = SystemMailConfiguration::findOrFail($request->id);
        $credential->is_active = 0;
        $credential->created_at = Carbon::now();
        $credential->save();
        $notify[] = ['success', 'Email Credential has been inActive'];
        return redirect()->back()->withNotify($notify);
    }
    public function delete($id)
    {
       try {
            DB::beginTransaction();
            $credential = SystemMailConfiguration::find($id);
            $credential->delete();
            $notify[] = ['success', 'Email Credentials deleted successfully'];
            DB::commit();
            return back()->withNotify($notify);

        } catch (\Exception $e) {
            DB::rollBack();
            $notify[] = ['success', ' mail Credentials delete Failed'];
            return back()->withNotify($notify);

        }
    }
}
