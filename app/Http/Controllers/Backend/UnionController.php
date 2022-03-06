<?php

namespace App\Http\Controllers\Backend;

use App\Models\Upazila;
use App\Models\Division;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Union;

class UnionController extends Controller
{
    //  view
    public function view(){
        $data['allData'] = Union::orderBy('division_id', 'asc')->orderBy('district_id', 'asc')->orderBy('upazila_id', 'asc')->orderBy('name_en', 'asc')->get();
        return view('backend.union.view', $data);
    }

    //  create
    public function create(){
        $data['divisions'] = Division::where('status', '0')->orderBy('name_en', 'asc')->get();
        return view('backend.union.create', $data);
    }

    //  store
    public function store(Request $request){
        $request->validate([
            'name_en' => 'required|unique:unions,name_en',
            'name_bn' => 'required|unique:unions,name_bn',
        ]);
        $data = new Union();
        $data->division_id = $request->division_id;
        $data->district_id = $request->district_id;
        $data->upazila_id = $request->upazila_id;
        $data->name_en = $request->name_en;
        $data->name_bn = $request->name_bn;
        $data->save();
        return redirect()->route('union.view')->with('success', 'Data inserted successfylly!');
    }

    //  edit
    public function edit($id){
        $data['editData'] = Union::findOrFail($id);
        $data['divisions'] = Division::where('status', '0')->orderBy('name_en', 'asc')->get();
        return view('backend.union.create', $data);
    }

    //  update
    public function update(Request $request, $id){
        $request->validate([
            'name_en' => 'required|unique:unions,name_en,'.$id,
            'name_bn' => 'required|unique:unions,name_bn,'.$id,
        ]);
        $data = Union::findOrFail($id);
        $data->division_id = $request->division_id;
        $data->district_id = $request->district_id;
        $data->upazila_id = $request->upazila_id;
        $data->name_en = $request->name_en;
        $data->name_bn = $request->name_bn;
        $data->save();
        return redirect()->route('union.view')->with('success', 'Data updated successfully!');
    }

    //  inactive
    public function inactive($id){
        $data = Union::findOrFail($id);
        $data->status = 1;
        $data->save();
        return redirect()->route('union.view')->with('success', 'Data unpublished successfully!');
    }

    //  active
    public function active($id){
        $data = Union::findOrFail($id);
        $data->status = 0;
        $data->save();
        return redirect()->route('union.view')->with('success', 'Data published successfully!');
    }

    //  delete
    public function delete($id){
        $union = Union::findOrFail($id);
        $union->delete();
        return redirect()->back()->with('success', 'Data Deleted Successfully!');
    }
}