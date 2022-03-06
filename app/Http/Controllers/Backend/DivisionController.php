<?php

namespace App\Http\Controllers\Backend;

use App\Models\Division;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class DivisionController extends Controller
{
    //  view
    public function view(){
        // $data['allData'] = division::orderBy('id', 'desc')->get();
        $data['allData'] = Division::orderBy('name_en', 'asc')->get();
        return view('backend.division.view', $data);
    }

    //  create
    public function create(){
        return view('backend.division.create');
    }

    //  store
    public function store(Request $request){
        $request->validate([
            'name_en' => 'required|unique:divisions,name_en',
            'name_bn' => 'required|unique:divisions,name_bn',
        ]);
        $data = new Division();
        $data->name_en = $request->name_en;
        $data->name_bn = $request->name_bn;
        $data->save();
        return redirect()->route('division.view')->with('success', 'Data inserted successfylly!');
    }

    //  edit
    public function edit($id){
        $editData = Division::findOrFail($id);
        return view('backend.division.create', compact('editData'));
    }

    //  update
    public function update(Request $request, $id){
        $request->validate([
            'name_en' => 'required|unique:divisions,name_en,'.$id,
            'name_bn' => 'required|unique:divisions,name_bn,'.$id,
        ]);
        $data = Division::findOrFail($id);
        $data->name_en = $request->name_en;
        $data->name_bn = $request->name_bn;
        $data->save();
        return redirect()->route('division.view')->with('success', 'Data updated successfully!');
    }

    //  inactive
    public function inactive($id){
        $data = Division::findOrFail($id);
        $data->status = 1;
        $data->save();
        return redirect()->route('division.view')->with('success', 'Data unpublished successfully!');
    }

    //  active
    public function active($id){
        $data = Division::findOrFail($id);
        $data->status = 0;
        $data->save();
        return redirect()->route('division.view')->with('success', 'Data published successfully!');
    }

    //  delete
    public function delete($id){
        $division = Division::findOrFail($id);
        $division->delete();
        return redirect()->back()->with('success', 'Data Deleted Successfully!');
    }
}