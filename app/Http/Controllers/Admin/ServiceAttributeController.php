<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class ServiceAttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pageTitle = "Attributes ";
        $emptyMessage = "No data found";
        $attributes = Attribute::with('entityField')->latest()->paginate(getPaginate());
        return view('admin.attributes.index', compact('attributes', 'pageTitle', 'emptyMessage'));
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
        $request->validate([
            'name'  => [
                'required', 
                Rule::unique('entity_attributes')
                    ->where(function($query) use($request){
                        return $query->where('name', $request->get('name'))
                                    ->where('entity_field_id', $request->get('entity_field_id'));
                    }),
            ],
            'type'  => 'required',
            'entity_field_id' => 'required', 
        ],[
            'type.required' => 'Type is required',
            'entity_field_id.required' => 'Title is required'
        ]);


        $attribute = new Attribute();
        $attribute->status = $request->status === 'on' ? Attribute::ACTIVE : Attribute::IN_ACTIVE;
        $attribute->fill($request->except('status'))->save();
        $notify[] = ['success', 'Service Attribute has been created'];
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
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $request->validate([
            'name'  => 'required|max:50|unique:entity_attributes,id,' . $request->id,
            'id'    => 'required|exists:entity_attributes,id',
            'type'  => 'required',
            'entity_field_id' => 'required'
        ],[
            'type.required' => 'Type is required',
            'entity_field_id.required' => 'Title is required'
        ]);

        $attribute = Attribute::findOrFail($request->get('id'));
        $attribute->status = $request->status === 'on' ? Attribute::ACTIVE : Attribute::IN_ACTIVE;
        $attribute->fill($request->except('status'))->update();
        $notify[] = ['success', 'Service Attribute has been updated'];
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
