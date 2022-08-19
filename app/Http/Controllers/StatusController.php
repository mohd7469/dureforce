<?php

namespace App\Http\Controllers;


use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function index()
    {
        $statuses = Status::all();

        return $statuses;
    }

    public function create()
    {
        //it will return a view for creating statuses
//        return view('products.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'module_id' => 'required',
        ]);


        Status::create([
            'name' => $request['name'],
            'slug' => $request['slug'],
            'module_id' => $request['module_id'],
        ]);


    }

    public function show(Status $status)
    {
        return $status;

    }


    public function edit(Status $status)
    {
        return $status;

    }


    public function update(Request $request, Status $status)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'module_id' => 'required',
        ]);

        $status->update([
            'name' => $request['name'],
            'slug' => $request['slug'],
            'module_id' => $request['module_id'],
        ]);

        return true;
    }

    public function destroy(Status $status)
    {
        $status->delete();

        return true;
    }
}
