<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SystemCredential;
use App\Models\SystemMailConfiguration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RedisSystemCredentialController extends Controller
{
    //
    public function index()
    {
        $pageTitle = "System Redis credential list";
        // $emptyMessage = "No data found";
        $syscreds = SystemCredential::where('type','redis')->latest()->paginate(getPaginate());
        
        return view('admin.redis_system_credentials.index', compact('syscreds', 'pageTitle'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'scheme' => 'required',
            'host' => 'required',
            'port' => 'required',
            'password' => 'required',
        ]);
        $credentialSections= SystemCredential::where('is_active', 1)->get();
        if ($credentialSections) {
            foreach($credentialSections as $credentialSection){
                $credentialSection->is_active = 0;
                $credentialSection->save();

            }
         
        }
        $credential = new SystemCredential;
//        $credential->name = $request->name;
        $credential->host = $request->host;
        $credential->port = $request->port;
        $credential->password = $request->password;
//        $credential->database = $request->database;
        $credential->prefix = $request->scheme;
//        $credential->client = $request->client;
        $credential->type = SystemCredential::Type_Redis;
        
        $credential->is_active = $request->is_active ? 1 : 0;
        $credential->save();
        $notify[] = ['success', 'Redis Credential has been created'];
        return back()->withNotify($notify);
    }

    public function update(Request $request)
    {
        $request->validate([
            'scheme' => 'required',
            'host' => 'required',
            'port' => 'required',
            'password' => 'required',
        ]);
        $credential = SystemCredential::find($request->id);

        //        $credential->name = $request->name;
        $credential->host = $request->host;
        $credential->port = $request->port;
        $credential->password = $request->password;
//        $credential->database = $request->database;
        $credential->prefix = $request->scheme;
//        $credential->client = $request->client;
        $credential->type = SystemCredential::Type_Redis;
        
        $credential->is_active = $request->is_active ? 1 : 0;
        
        $credential->host = $request->host;
        $credential->port = $request->port;
        $credential->password = $request->password;
        
        $credential->is_active = $request->is_active ? 1 : 0;
        $credential->save();
        $notify[] = ['success', 'Redis Credential has been created'];
        return back()->withNotify($notify);
    }
    


    public function activeBy(Request $request)
    {
        $credential = SystemCredential::findOrFail($request->id);
        $credentialSections= SystemCredential::where('is_active', 1)->get();
        if ($credentialSections) {
            foreach($credentialSections as $credentialSection){
                $credentialSection->is_active = 0;
                $credentialSection->save();

            }
         
        }
        $credential->is_active = 1;
        $credential->created_at = Carbon::now();
        $credential->save();
        $notify[] = ['success', 'Redis Credential has been Activated'];
        return redirect()->back()->withNotify($notify);
    }
    public function inActiveBy(Request $request)
    {
        $credential = SystemCredential::findOrFail($request->id);
        $credential->is_active = 0;
        $credential->created_at = Carbon::now();
        $credential->save();
        $notify[] = ['success', 'Redis Credential has been inActive'];
        return redirect()->back()->withNotify($notify);
    }
    public function delete($id)
    {
       try {
            DB::beginTransaction();
            $credential = SystemCredential::find($id);
            $credential->delete();
            $notify[] = ['success', 'Redis Credentials deleted successfully'];
            DB::commit();
            return back()->withNotify($notify);

        } catch (\Exception $e) {
            DB::rollBack();
            $notify[] = ['success', ' Redis Credentials delete Failed'];
            return back()->withNotify($notify);

        }
    }
}
