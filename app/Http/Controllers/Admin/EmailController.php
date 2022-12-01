<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function index()
    {
    	$pageTitle = "Manage All Email";
    	$emptyMessage = "No data found";
    	//$banners = Banner::where('document_type', 'Background')->withAll()->latest()->paginate(getPaginate());
    	return view('admin.Email_section.index', compact('pageTitle', 'emptyMessage'));
    }
    public function emailCreate()
    {
    	$pageTitle = "Create Email";
        // $categories = Category::select('id', 'name')->get();
    	return view('admin.Email_section.create', compact('pageTitle'));
    }
}
