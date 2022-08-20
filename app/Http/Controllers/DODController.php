<?php

namespace App\Http\Controllers;

use App\Models\DOD;
use Illuminate\Http\Request;

class DODController extends Controller
{
    public function index()
    {
        $dods = DOD::all();

        return $dods;
    }

    public function create()
    {
        //it will return a view for creating modules
//        return view('products.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);


        DOD::create([
            'name' => $request['name'],
            'description' => $request['description'],
        ]);


    }

    public function show(DOD $dod)
    {
        return $dod;

    }


    public function edit(DOD $dod)
    {
        return $dod;

    }


    public function update(Request $request, DOD $dod)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $dod->update([
            'name' => $request['name'],
            'description' => $request['description'],
        ]);

        return true;
    }

    public function destroy(DOD $dod)
    {
        $dod->delete();

        return true;
    }


    public function filterDod(Request $request){

        $dods = DOD::query();
        $dods->when(empty($request->title), function ($query) use ($request) {
            $query->get();
        });
        $dods->when(!empty($request->title), function ($query) use ($request) {
            $query->get();
        });

    }
}
