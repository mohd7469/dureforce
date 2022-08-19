<?php

namespace App\Http\Controllers;

use App\Models\Deliverable;
use Illuminate\Http\Request;

class DeliverableController extends Controller
{
    public function index()
    {
        $deliverable = Deliverable::all();

        return $deliverable;
    }

    public function create()
    {
        //it will return a view for creating deliverable
//        return view('products.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'module_id' => 'required',
        ]);


        Deliverable::create([
            'name' => $request['name'],
            'slug' => $request['slug'],
            'module_id' => $request['module_id'],
        ]);


    }

    public function show(Deliverable $deliverable)
    {
        return $deliverable;

    }


    public function edit(Deliverable $deliverable)
    {
        return $deliverable;

    }


    public function update(Request $request, Deliverable $deliverable)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
        ]);

        $deliverable->update([
            'name' => $request['name'],
            'slug' => $request['slug'],
        ]);

        return true;
    }

    public function destroy(Deliverable $deliverable)
    {
        $deliverable->delete();

        return true;
    }
}
