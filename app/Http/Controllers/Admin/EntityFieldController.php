<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\EntityField;
use Illuminate\Http\Request;

class EntityFieldController extends Controller
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
            $pageTitle = "Entity Attributes list";
            $emptyMessage = "No data found";
            $attributes = EntityField::latest()->paginate(getPaginate());
            return view('admin.fields.index', compact('attributes', 'pageTitle', 'emptyMessage'));
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
        try{
             //
        $request->validate([
            'name'  => 'required|unique:entity_attributes',
            'type'  => 'required',
        ],[
            'type.required' => 'Type is required'
        ]);


        $attribute = new EntityField();
        $attribute->status = $request->status === 'on' ? Attribute::ACTIVE : Attribute::IN_ACTIVE;
        $attribute->fill($request->except('status'))->save();
        $notify[] = ['success', 'Service Attribute has been created'];
        return redirect()->back()->withNotify($notify);
        } catch (\Exception $exp) {
                   DB::rollback();
                   return view('errors.500');
               }
       
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
        try{
            $request->validate([
                // 'name'  => 'required|max:50|unique:entity_fields,name,' . $request->name,
                'type'    => 'required',
            ],[
                'type.required' => 'Type is required'
            ]);
    
            $attribute = EntityField::findOrFail($request->get('id'));
            $attribute->status = $request->status === 'on' ? Attribute::ACTIVE : Attribute::IN_ACTIVE;
            $attribute->fill($request->except('status'))->update();
            $notify[] = ['success', 'Service Attribute has been updated'];
            return redirect()->back()->withNotify($notify);
        } catch (\Exception $exp) {
                   DB::rollback();
                   return view('errors.500');
               }
        
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
