<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SystemCredential;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PusherSystemCredentialController extends Controller
{
    public function index()
    {
        try {
            $pageTitle = "System Pusher credential list";
            // $emptyMessage = "No data found";
            $syscreds = SystemCredential::where('type','pusher')->latest()->paginate(getPaginate());
            return view('admin.pusher_system_credentials.index', compact('syscreds', 'pageTitle'));
        }catch (\Exception $exp) {
            DB::rollback();
            Log::error($exp->getMessage());
            $notify[] = ['error', 'An error occured'];
                return back()->withNotify($notify);
        }
    }
    public function store(Request $request)
    { 
        $request->validate([
            'name' => 'required',
            'host' => 'required',
            'port' => 'required',
            'password' => 'required',
        ]);
        try {
            DB::beginTransaction();
            $credential = new SystemCredential;
            $credential->name = $request->name;
            $credential->host = $request->host;
            $credential->port = $request->port;
            $credential->password = $request->password;
            $credential->database = $request->database;
            $credential->prefix = $request->prefix;
            $credential->client = $request->client;
            $credential->type = 'pusher';
            $credential->is_active = $request->is_active ? 1 : 0;
            $credential->save();
            DB::commit();
            Log::info(["credential" => $credential]);
            $notify[] = ['success', 'Pusher Credential has been created'];
            return back()->withNotify($notify);
        }catch (\Exception $exp) {
            DB::rollback();
            Log::error($exp->getMessage());
            $notify[] = ['error', 'An error occured'];
            return back()->withNotify($notify);
        }
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'host' => 'required',
            'port' => 'required',
            'password' => 'required',
        ]);
        try {
            DB::beginTransaction();
            $credential = SystemCredential::find($request->id);
            $credential->name = $request->name;
            $credential->host = $request->host;
            $credential->port = $request->port;
            $credential->password = $request->password;
            $credential->database = $request->database;
            $credential->prefix = $request->prefix;
            $credential->client = $request->client;
            $credential->type = 'pusher';
            $credential->is_active = $request->is_active ? 1 : 0;
            $credential->save();
            DB::commit();
            Log::info(["credential" => $credential]);
            $notify[] = ['success', 'Pusher Credential has been created'];
            return back()->withNotify($notify);
        }catch (\Exception $exp) {
            DB::rollback();
            Log::error($exp->getMessage());
            $notify[] = ['error', 'An error occured'];
            return back()->withNotify($notify);
        }
    }

    public function activeBy(Request $request)
    {
        try {
            DB::beginTransaction();
            $credential = SystemCredential::findOrFail($request->id);
            $credential->is_active = 1;
            $credential->created_at = Carbon::now();
            $credential->save();
            DB::commit();
            Log::info(["credential" => $credential]);
            $notify[] = ['success', 'Pusher Credential has been Activated'];
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
            $credential = SystemCredential::findOrFail($request->id);
            $credential->is_active = 0;
            $credential->created_at = Carbon::now();
            $credential->save();
            DB::commit();
            Log::info(["credential" => $credential]);
            $notify[] = ['success', 'Pusher Credential has been inActive'];
            return redirect()->back()->withNotify($notify);
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
            $credential = SystemCredential::find($id);
            $credential->delete();
            $notify[] = ['success', 'Pusher Credentials deleted successfully'];
            DB::commit();
            return back()->withNotify($notify);

        } catch (\Exception $e) {
            DB::rollBack();
            $notify[] = ['success', ' Pusher Credentials delete Failed'];
            return back()->withNotify($notify);

        }
    }
}
