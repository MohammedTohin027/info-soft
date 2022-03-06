<?php

namespace App\Http\Controllers\Backend;

use App\Models\Upazila;
use App\Models\Division;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\District;

class UpazilaController extends Controller
{
    //  view
    public function view(){
        // $data['allData'] = upazila::orderBy('id', 'desc')->get();
        $data['allData'] = Upazila::orderBy('division_id', 'asc')->orderBy('district_id', 'asc')->orderBy('name_en', 'asc')->get();
        return view('backend.upazila.view', $data);
    }

    //  create
    public function create(){
        $data['divisions'] = Division::where('status', '0')->orderBy('name_en', 'asc')->get();
        return view('backend.upazila.create', $data);
    }

    //  store
    public function store(Request $request){
        $request->validate([
            'name_en' => 'required|unique:upazilas,name_en',
            'name_bn' => 'required|unique:upazilas,name_bn',
        ]);
        $data = new Upazila();
        $data->division_id = $request->division_id;
        $data->district_id = $request->district_id;
        $data->name_en = $request->name_en;
        $data->name_bn = $request->name_bn;
        $data->save();
        return redirect()->route('upazila.view')->with('success', 'Data inserted successfylly!');
    }

    //  edit
    public function edit($id){
        $data['editData'] = Upazila::findOrFail($id);
        $data['divisions'] = Division::where('status', '0')->orderBy('name_en', 'asc')->get();
        return view('backend.upazila.create', $data);
    }

    //  update
    public function update(Request $request, $id){
        $request->validate([
            'name_en' => 'required|unique:upazilas,name_en,'.$id,
            'name_bn' => 'required|unique:upazilas,name_bn,'.$id,
        ]);
        $data = Upazila::findOrFail($id);
        $data->division_id = $request->division_id;
        $data->district_id = $request->district_id;
        $data->name_en = $request->name_en;
        $data->name_bn = $request->name_bn;
        $data->save();
        return redirect()->route('upazila.view')->with('success', 'Data updated successfully!');
    }

    //  inactive
    public function inactive($id){
        $data = Upazila::findOrFail($id);
        $data->status = 1;
        $data->save();
        return redirect()->route('upazila.view')->with('success', 'Data unpublished successfully!');
    }

    //  active
    public function active($id){
        $data = Upazila::findOrFail($id);
        $data->status = 0;
        $data->save();
        return redirect()->route('upazila.view')->with('success', 'Data published successfully!');
    }

    //  delete
    public function delete($id){
        $upazila = Upazila::findOrFail($id);
        $upazila->delete();
        return redirect()->back()->with('success', 'Data Deleted Successfully!');
    }
}