<?php

namespace App\Http\Controllers\Backend;

use App\Models\District;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Division;

class DistrictController extends Controller
{
    //  view
    public function view(){
        // $data['allData'] = district::orderBy('id', 'desc')->get();
        $data['allData'] = District::orderBy('division_id', 'asc')->orderBy('name_en', 'asc')->get();
        return view('backend.district.view', $data);
    }

    //  create
    public function create(){
        $data['divisions'] = Division::where('status', '0')->orderBy('name_en', 'asc')->get();
        return view('backend.district.create', $data);
    }

    //  store
    public function store(Request $request){
        $request->validate([
            'name_en' => 'required|unique:districts,name_en',
            'name_bn' => 'required|unique:districts,name_bn',
        ]);
        $data = new District();
        $data->division_id = $request->division_id;
        $data->name_en = $request->name_en;
        $data->name_bn = $request->name_bn;
        $data->save();
        return redirect()->route('district.view')->with('success', 'Data inserted successfylly!');
    }

    //  edit
    public function edit($id){
        $data['editData'] = District::findOrFail($id);
        $data['divisions'] = Division::where('status', '0')->orderBy('name_en', 'asc')->get();
        return view('backend.district.create', $data);
    }

    //  update
    public function update(Request $request, $id){
        $request->validate([
            'name_en' => 'required|unique:districts,name_en,'.$id,
            'name_bn' => 'required|unique:districts,name_bn,'.$id,
        ]);
        $data = District::findOrFail($id);
        $data->division_id = $request->division_id;
        $data->name_en = $request->name_en;
        $data->name_bn = $request->name_bn;
        $data->save();
        return redirect()->route('district.view')->with('success', 'Data updated successfully!');
    }

    //  inactive
    public function inactive($id){
        $data = District::findOrFail($id);
        $data->status = 1;
        $data->save();
        return redirect()->route('district.view')->with('success', 'Data unpublished successfully!');
    }

    //  active
    public function active($id){
        $data = District::findOrFail($id);
        $data->status = 0;
        $data->save();
        return redirect()->route('district.view')->with('success', 'Data published successfully!');
    }

    //  delete
    public function delete($id){
        $district = District::findOrFail($id);
        $district->delete();
        return redirect()->back()->with('success', 'Data Deleted Successfully!');
    }
}