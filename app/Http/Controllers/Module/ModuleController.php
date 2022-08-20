<?php

namespace App\Http\Controllers\Module;

use App\Http\Controllers\Controller;

use App\Models\Module;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\AssignOp\Mod;

class ModuleController extends Controller
{
    public function index()
    {
        $modules = Module::all();

        return $modules;
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


        Module::create([
            'name' => $request['name'],
            'description' => $request['description'],
        ]);


    }

    public function show(Module $module)
    {
        return $module;

    }


    public function edit(Module $module)
    {
        return $module;

    }


    public function update(Request $request, Module $module)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $module->update([
            'name' => $request['name'],
            'description' => $request['description'],
        ]);

        return true;
    }

    public function destroy(Module $module)
    {
        $module->delete();

        return true;
    }
}
