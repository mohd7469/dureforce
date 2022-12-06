<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Rules\FileTypeValidate;
use Illuminate\Support\Facades\Auth;
use App\Models\EmailTemplate;


class EmailController extends Controller
{
    public function index()
    {
    	$pageTitle = "Manage All Email";
    	//$emptyMessage = "No data found";
        $email_test = EmailTemplate::latest()->paginate(getPaginate());
       $email_template_types = EmailTemplate:: EmailTemplate;
      
       
        return view('admin.email_section.index', compact('pageTitle','email_test','email_template_types'));
    }
    public function emailCreate()
    {
    	$pageTitle = "Create Email";
        // $categories = Category::select('id', 'name')->get();
        $email_template_types = EmailTemplate:: EmailTemplate;
    	return view('admin.email_section.create', compact('pageTitle','email_template_types'));
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
            
            'image' => ['nullable','image',new FileTypeValidate(['jpg','jpeg','png'])]
        ]);
        $emailSections= EmailTemplate::where('is_active', 1)->where('type', $request->type)->get();
        if ($emailSections) {
            foreach($emailSections as $emailSection){
                $emailSection->is_active = 0;
                $emailSection->save();

            }
         
        }


        $email  = new EmailTemplate();
        // if ($request->hasFile('url')) {
        //     try {
        //         $path = imagePath()['attachments']['path'];
        //         $file = $request->url;
        //         $file_original_name = $file->getClientOriginalName();
        //         $filename = uploadAttachments($file, $path);
        //         $file_extension = getFileExtension($file);
        //         $url = $path . '/' . $filename;
        //     } catch (\Exception $exp) {
        //         $notify[] = ['error', 'Image could not be uploaded.'];
        //         return back()->withNotify($notify);
        //     }
        // }
        $email->type = $request->type;
        $email->title = $request->title;
        $email->description = $request->description;
        $email->footer_title = $request->footer_title;
        $email->footer_title = $request->footer_title;
        $email->footer_description = $request->footer_description;
        // $banner->uploaded_name  = $file_original_name;
        //$email->url = $request->url;
        // $banner->type = $file_extension;
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
        $notify[] = ['success', 'Your Email Detail has been Created.'];
        return redirect()->route('admin.email.index')->withNotify($notify);
    }
    public function editdetails($id){
        $email = EmailTemplate::findOrFail($id);
        $pageTitle = "Manage All Email";
        $emptyMessage = 'No shortcode available';
        return view('admin.email_section.edit', compact('pageTitle', 'email','emptyMessage'));
    }
    public function delete($id)
    {
        $email = EmailTemplate::find($id);
       
        $email->delete();
        $notify[] = ['success', 'Email Detail deleted successfully'];
        return back()->withNotify($notify);
    }
    public function emailupdate(Request $request, $id){
        
        
        $email = EmailTemplate::findOrFail($id);
      
        $email->type = $request->type;
        $email->title = $request->title;
        $email->description = $request->description;
        $email->footer_title = $request->footer_title;
        $email->footer_title = $request->footer_title;
        $email->footer_description = $request->footer_description;
        // $banner->uploaded_name  = $file_original_name;
        //$email->url = $request->url;
        // $banner->type = $file_extension;
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
    

        

        $notify[] = ['success', 'email detail has been updated'];
        return redirect()->route('admin.email.index')->withNotify($notify);
    }

    public function activeBy(Request $request)
    {
        
        $banner = EmailTemplate::findOrFail($request->id);
        $banner->is_active = 1;
        $banner->created_at = Carbon::now();
        $banner->save();
        $notify[] = ['success', 'Email Template has been Activated'];
        return redirect()->back()->withNotify($notify);
    }

    public function inActiveBy(Request $request)
    {
       
        $banner = EmailTemplate::findOrFail($request->id);
        $banner->is_active = 0;
        $banner->created_at = Carbon::now();
        $banner->save();
        $notify[] = ['success', 'Email Template has been inActive'];
        return redirect()->back()->withNotify($notify);
    }
}
