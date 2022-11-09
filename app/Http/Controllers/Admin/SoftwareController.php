<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Software;
use App\Models\Category;
use App\Traits\DeleteEntity;
use Carbon\Carbon;

class SoftwareController extends Controller
{
    use DeleteEntity;

	public function details($id)
    {
        try{
            $pageTitle = "Software details";
    	$software = Software::findOrFail($id);
    	return view('admin.software.details', compact('pageTitle', 'software'));
        } catch (\Exception $exp) {
                   DB::rollback();
                   return view('errors.500');
               }
    	
    }

    public function index()
    {
        try{
            $pageTitle = "Manage All Software";
            $emptyMessage = "No data found";
            $softwares = Software::with('category', 'user', 'subCategory')->latest()->paginate(getPaginate());
            return view('admin.software.index', compact('pageTitle', 'emptyMessage', 'softwares'));
        } catch (\Exception $exp) {
                   DB::rollback();
                   return view('errors.500');
               }
  
    }
    public function pending()
    {
        try{
            $pageTitle = "Software pending list";
    	$emptyMessage = "No data found";
    	$softwares = Software::where('status', 0)->with('category', 'user', 'subCategory')->latest()->paginate(getPaginate());
    	return view('admin.software.index', compact('pageTitle', 'emptyMessage', 'softwares'));
        } catch (\Exception $exp) {
                   DB::rollback();
                   return view('errors.500');
               }
    	
    }
    public function approved()
    {
        try{
            $pageTitle = "Software approved list";
    	$emptyMessage = "No data found";
    	$softwares = Software::where('status', 1)->with('category', 'user', 'subCategory')->latest()->paginate(getPaginate());
    	return view('admin.software.index', compact('pageTitle', 'emptyMessage', 'softwares')); 
        } catch (\Exception $exp) {
                   DB::rollback();
                   return view('errors.500');
               }
    	
    }

    public function cancel()
    {
    	$pageTitle = "Software approved list";
    	$emptyMessage = "No data found";
    	$softwares = Software::where('status', 2)->with('category', 'user', 'subCategory')->latest()->paginate(getPaginate());
    	return view('admin.software.index', compact('pageTitle', 'emptyMessage', 'softwares'));
    }

    public function softwareCategory(Request $request)
    {
        try{
            $category = Category::findOrFail($request->category);
            $categoryId = $category->id;
            $pageTitle = "Software search by category - " . $category->name;
            $emptyMessage = "No data found";
            $softwares = Software::where('category_id', $category->id)->with('category', 'user', 'subCategory')->latest()->paginate(getPaginate());
            return view('admin.software.index', compact('pageTitle', 'emptyMessage', 'softwares', 'categoryId'));
        } catch (\Exception $exp) {
                   DB::rollback();
                   return view('errors.500');
               }
    
    }

    public function approvedBy(Request $request)
    {
        try{
            $request->validate([
                'id' => 'required|exists:software,id'
            ]);
            $software = Software::findOrFail($request->id);
            $software->status = 1;
            $software->created_at = Carbon::now();
            $software->save();
            $notify[] = ['success', 'Software has been approved'];
            return back()->withNotify($notify);
        } catch (\Exception $exp) {
                   DB::rollback();
                   return view('errors.500');
               }
        
    }

    public function cancelBy(Request $request)
    {
        try{
            $request->validate([
                'id' => 'required|exists:software,id'
            ]);
            $software = Software::findOrFail($request->id);
            $software->status = 2;
            $software->created_at = Carbon::now();
            $software->save();
            $notify[] = ['success', 'Software has been canceled'];
            return back()->withNotify($notify);
        } catch (\Exception $exp) {
                   DB::rollback();
                   return view('errors.500');
               }
      
    }


    public function search(Request $request, $scope)
    {
        try{
            $search = $request->search;
        $softwares = Software::where(function ($softwares) use ($search) {
            $softwares->where('amount', $search)
                ->orWhereHas('user', function ($user) use ($search) {
                    $user->where('username', 'like', "%$search%");
                });
            });
        $pageTitle = '';
        switch ($scope) {
            case 'approved':
                $pageTitle .= 'Approved ';
                $softwares = $softwares->where('status', 1);
                break;
            case 'pending':
                $pageTitle .= 'Pending ';
                $softwares = $softwares->where('status', 0);
                break;
            case 'cancel':
                $pageTitle .= 'Cancel ';
                $softwares = $softwares->where('status', 2);
                break;
        }
        $softwares = $softwares->latest()->paginate(getPaginate());
        $pageTitle .= 'Software search by - ' . $search;
        $emptyMessage = 'No data found';
        return view('admin.software.index', compact('pageTitle', 'search', 'scope', 'emptyMessage', 'softwares'));
        } catch (\Exception $exp) {
                   DB::rollback();
                   return view('errors.500');
               }
        
    }


    public function softwareFile($softwareId)
    {
        try{
            $software = Software::where('id',decrypt($softwareId))->firstOrFail();
            $file = $software->upload_software;
            $path = imagePath()['uploadSoftware']['path'];
            $full_path = $path.'/'. $file;
            $ext = pathinfo($file, PATHINFO_EXTENSION);
            $mimetype = mime_content_type($full_path);
            header('Content-Disposition: softwareFile; filename="' . $file . '.' . $ext . '";');
            header("Content-Type: " . $mimetype);
            return readfile($full_path);
        } catch (\Exception $exp) {
                   DB::rollback();
                   return view('errors.500');
               }
       
    }

    public function softwareDocument($softwareId)
    {
        try{
            $software = Software::where('id',decrypt($softwareId))->firstOrFail();
        $file = $software->document_file;
        $path = imagePath()['document']['path'];
        $full_path = $path.'/'. $file;
        $ext = pathinfo($file, PATHINFO_EXTENSION);
        $mimetype = mime_content_type($full_path);
        header('Content-Disposition: softwareFile; filename="' . $file . '.' . $ext . '";');
        header("Content-Type: " . $mimetype);
        return readfile($full_path);
        } catch (\Exception $exp) {
                   DB::rollback();
                   return view('errors.500');
               }
        
    }


    public function featuredInclude(Request $request)
    {
        try{
            $request->validate([
                'id' => 'required|exists:services,id'
            ]);
            $service = Software::findOrFail($request->id);
            $service->featured = 1;
            $service->save();
            $notify[] = ['success', 'Included this Software featured list'];
            return back()->withNotify($notify);
        } catch (\Exception $exp) {
                   DB::rollback();
                   return view('errors.500');
               }
    	
    }

    public function featuredNotInclude(Request $request)
    {
        try{
            $request->validate([
                'id' => 'required|exists:services,id'
            ]);
            $service = Software::findOrFail($request->id);
            $service->featured = 0;
            $service->save();
            $notify[] = ['success', 'Removed this Software featured list'];
            return back()->withNotify($notify);
        } catch (\Exception $exp) {
                   DB::rollback();
                   return view('errors.500');
               }
      
    }


    public function destroy($id)
    {
        try{
            $this->deleteEntity(Software::class, 'software', $id);
        $notify[] = ['success', 'Software has been Deleted Successfully.'];
        return back()->withNotify($notify);
        } catch (\Exception $exp) {
                   DB::rollback();
                   return view('errors.500');
               }
        
    }
}
