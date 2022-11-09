<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Logo;
use Illuminate\Http\Request;

class LogoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        try{
            $pageTitle = "Logos ";
            $emptyMessage = "No data found";
            $attributes = Logo::latest()->paginate(getPaginate());
            return view('admin.logos.index', compact('attributes', 'pageTitle', 'emptyMessage'));
        } catch (\Exception $exp) {
                   DB::rollback();
                   return view('errors.500');
               }
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $path = imagePath()['service']['path'];
        $size = imagePath()['service']['size'];
        $filename = '';

        if ($request->hasFile('image')) {
            $file = $request->image;
            try {
                $filename = uploadImage($file, $path, $size);
            } catch (\Exception $exp) {
              return false;
            }
        }

        $logo = new Logo();
       
        $logo->image = $filename;
        $logo->status = $request->status === "on" ? true : false;
        $logo->fill($request->only(['name']))->save();
        $notify[] = ['success', 'Logo has been created. '];
        return redirect()->back()->withNotify($notify);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $path = imagePath()['service']['path'];
        $size = imagePath()['service']['size'];
        $filename = '';

        if ($request->hasFile('image')) {
            $file = $request->image;
            try {
                $filename = uploadImage($file, $path, $size);
            } catch (\Exception $exp) {
              return false;
            }
        }
        $logo = Logo::findOrFail($request->get('id'));
        $logo->image = $filename ?: $logo->image;
        $logo->status = $request->status === "on" ? true : false;
        $logo->fill($request->only(['name']))->update();
        $notify[] = ['success', 'Logo has been updated.'];
        return redirect()->back()->withNotify($notify);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
