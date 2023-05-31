<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Rules\FileTypeValidate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\EmailTemplate;


class EmailController extends Controller
{
    public function index()
    {
        try {
            $pageTitle = "Manage All Email";
            //$emptyMessage = "No data found";
            $email_test = EmailTemplate::latest()->paginate(getPaginate());
            Log::info($email_test);
            $email_template_types = EmailTemplate:: EmailTemplate;
            return view('admin.email_section.index', compact('pageTitle','email_test','email_template_types'));
        }catch (\Exception $exp) {
            Log::error($exp->getMessage());
            $notify[] = ['error', 'An error occured'];
            return back()->withNotify($notify);
        }
    }
    public function emailCreate()
    {
        try {
            $pageTitle = "Create Email";
            // $categories = Category::select('id', 'name')->get();
            $email_template_types = EmailTemplate:: EmailTemplate;
            Log::info($email_template_types);
            return view('admin.email_section.create', compact('pageTitle','email_template_types'));
        }catch (\Exception $exp) {
            Log::error($exp->getMessage());
            $notify[] = ['error', 'An error occured'];
            return back()->withNotify($notify);
        }
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $this->validate($request, [
            'type' => 'required',
            'title' => 'required',
            'description' => 'required',
            'footer_title' => 'required',
            'footer_description' => 'required',
             //'image' => 'required'
             'image' => ['nullable','required','image',new FileTypeValidate(['jpg','jpeg','png'])]
        ]);
        $emailSections= EmailTemplate::where('is_active', 1)->where('type', $request->type)->get();
        if ($emailSections) {
            foreach($emailSections as $emailSection){
                $emailSection->is_active = 0;
                $emailSection->save();

            }
        
        }        
        try {
            DB::beginTransaction();
            $email  = new EmailTemplate();
            $email->type = $request->type;
            $email->title = $request->title;
            $email->description = $request->description;
            $email->footer_title = $request->footer_title;
            $email->footer_title = $request->footer_title;
            $email->footer_description = $request->footer_description;
            $email->save();

            if ($request->hasFile('url')) {
                
                try {
                        foreach ($request->file('url') as $file) {
                            
                            $path = imagePath()['attachments']['path'];
                            
                    
                            $filename = uploadAttachments($file, $path);
                            $file_extension = getFileExtension($file);
                            $url = $path . '/' . $filename;
                            $uploaded_name = $file->getClientOriginalName();
        
                            $email->attachments()->create([
                            
        
                                'name' => $filename,
                                'uploaded_name' => $uploaded_name,
                                'url'           => $url,
                                'type' =>$file_extension,
                                'is_published' =>1
        
                            ]);
                            
        
                        }
                        
                    }
                
                catch (\Exception $exp) {
                    $notify[] = ['error', 'Document could not be uploaded.'];
                    return back()->withNotify($notify);
                }
                
                                
            }
            DB::commit();
            Log::info(["email" => $email]);
            $notify[] = ['success', 'Your Email Detail has been Created.'];
            return redirect()->route('admin.email.index')->withNotify($notify);
        }catch (\Exception $exp) {
            DB::rollback();
            Log::error($exp->getMessage());
            $notify[] = ['error', 'An error occured'];
            return back()->withNotify($notify);
        }
    }
    public function editdetails($id){
        try {
            $email = EmailTemplate::findOrFail($id);
            Log::info(["email" => $email]);
            $pageTitle = "Manage All Email";
            $emptyMessage = 'No shortcode available';
            return view('admin.email_section.edit', compact('pageTitle', 'email','emptyMessage'));
        }catch (\Exception $exp) {
            Log::error($exp->getMessage());
            $notify[] = ['error', 'An error occured'];
            return back()->withNotify($notify);
        }
    }
    public function delete($id)
    {
        try {
            DB::beginTransaction();
            $email = EmailTemplate::find($id);
            $email->delete();
            DB::commit();
            Log::info(["email" => $email]);
            $notify[] = ['success', 'Email Detail deleted successfully'];
            return back()->withNotify($notify);
        }
        catch (\Exception $exp) {
            DB::rollback();
            Log::error($exp->getMessage());
            $notify[] = ['success', 'DOD deleted successfully'];
            return back()->withNotify($notify);
        }
    }
    public function emailupdate(Request $request, $id){
        try {
            DB::beginTransaction();
            $email = EmailTemplate::findOrFail($id);
            $email->type = $request->type;
            $email->title = $request->title;
            $email->description = $request->description;
            $email->footer_title = $request->footer_title;
            $email->footer_title = $request->footer_title;
            $email->footer_description = $request->footer_description;
            $email->save();
            if ($request->hasFile('url')) {
                try {
                        foreach ($request->file('url') as $file) {
                            
                            $path = imagePath()['attachments']['path'];
                            
                    
                            $filename = uploadAttachments($file, $path);
                            $file_extension = getFileExtension($file);
                            $url = $path . '/' . $filename;
                            $uploaded_name = $file->getClientOriginalName();
                            $email->attachments()->update(['url' => $url]);
        
                            $email->attachments()->update([
                            
        
                                'name' => $filename,
                                'uploaded_name' => $uploaded_name,
                                'url'           => $url,
                                'type' =>$file_extension,
                                'is_published' =>1
        
                            ]);
                            
        
                        }
                        
                    }
                
                catch (\Exception $exp) {
                    $notify[] = ['error', 'Document could not be uploaded.'];
                    return back()->withNotify($notify);
                }
                
                                
            }
            DB::commit();
            Log::info(["email" => $email]);
            $notify[] = ['success', 'email detail has been updated'];
            return redirect()->route('admin.email.index')->withNotify($notify);
        }
        catch (\Exception $exp) {
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
            $banner = EmailTemplate::findOrFail($request->id);
            $emailSections= EmailTemplate::where('is_active', 1)->where('type', $banner->type)->get();
            if ($emailSections) {
                foreach($emailSections as $emailSection){
                    $emailSection->is_active = 0;
                    $emailSection->save();

                }
            
            }
            if($banner->type == 'invitation' && $banner->id == $request->id){
                $banner->is_active = 1;
                $banner->created_at = Carbon::now();
                $banner->save();
                
            }

            if($banner->type == 'offer' && $banner->id == $request->id){
                $banner->is_active = 1;
                $banner->created_at = Carbon::now();
                $banner->save();
            }
            $notify[] = ['success', 'Email Template has been Activated'];
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
            $banner = EmailTemplate::findOrFail($request->id);
            $banner->is_active = 0;
            $banner->created_at = Carbon::now();
            $banner->save();
            DB::commit();
            Log::info(["banner" => $banner]);
            $notify[] = ['success', 'Email Template has been inActive'];
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
