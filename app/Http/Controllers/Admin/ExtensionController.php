<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Extension;
use Illuminate\Http\Request;

class ExtensionController extends Controller
{
    public function index()
    {
        try{
            $pageTitle = 'Extensions';
            $extensions = Extension::orderBy('status','desc')->get();
            return view('admin.extension.index', compact('pageTitle', 'extensions'));
        } catch (\Exception $exp) {
               DB::rollback();
                return view('errors.500');
               }
  
    }

    public function update(Request $request, $id)
    {
        try{
            $extension = Extension::findOrFail($id);

            foreach ($extension->shortcode as $key => $val) {
                $validation_rule = [$key => 'required'];
            }
            $request->validate($validation_rule);
    
            $shortcode = json_decode(json_encode($extension->shortcode), true);
            foreach ($shortcode as $key => $code) {
                $shortcode[$key]['value'] = $request->$key;
            }
    
            $extension->shortcode = $shortcode;
            $extension->save();
            $notify[] = ['success', $extension->name . ' has been updated'];
            return redirect()->route('admin.extensions.index')->withNotify($notify);
        } catch (\Exception $exp) {
               DB::rollback();
                return view('errors.500');
               }
       
    }

    public function activate(Request $request)
    {
        try{
            $request->validate(['id' => 'required|integer']);
            $extension = Extension::findOrFail($request->id);
            $extension->status = 1;
            $extension->save();
            $notify[] = ['success', $extension->name . ' has been activated'];
            return redirect()->route('admin.extensions.index')->withNotify($notify);
        } catch (\Exception $exp) {
               DB::rollback();
                return view('errors.500');
               }
       
    }

    public function deactivate(Request $request)
    {
        try{
            $request->validate(['id' => 'required|integer']);
        $extension = Extension::findOrFail($request->id);
        $extension->status = 0;
        $extension->save();
        $notify[] = ['success', $extension->name . ' has been disabled'];
        return redirect()->route('admin.extensions.index')->withNotify($notify);
        } catch (\Exception $exp) {
               DB::rollback();
                return view('errors.500');
               }
        
    }
}
