<?php

namespace App\Http\Controllers\Backend;

use App\Models\WardNo;
use App\Models\Division;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WardNoController extends Controller
{
     //  view
     public function view(){
        $data['allData'] = WardNo::orderBy('division_id', 'asc')->orderBy('district_id', 'asc')->orderBy('upazila_id', 'asc')->orderBy('union_id', 'asc')->orderBy('name_en', 'asc')->get();
        return view('backend.ward-no.view', $data);
    }

    //  create
    public function create(){
        $data['divisions'] = Division::where('status', '0')->orderBy('name_en', 'asc')->get();
        return view('backend.ward-no.create', $data);
    }

    //  store
    public function store(Request $request){
        $data = new WardNo();
        $data->division_id = $request->division_id;
        $data->district_id = $request->district_id;
        $data->upazila_id = $request->upazila_id;
        $data->union_id= $request->union_id;
        $data->name_en = $request->name_en;
        $data->name_bn = $request->name_bn;
        $data->save();
        return redirect()->route('ward-no.view')->with('success', 'Data inserted successfylly!');
    }

    //  edit
    public function edit($id){
        $data['editData'] = WardNo::findOrFail($id);
        $data['divisions'] = Division::where('status', '0')->orderBy('name_en', 'asc')->get();
        return view('backend.ward-no.create', $data);
    }

    //  update
    public function update(Request $request, $id){
        $data = WardNo::findOrFail($id);
        $data->division_id = $request->division_id;
        $data->district_id = $request->district_id;
        $data->upazila_id = $request->upazila_id;
        $data->union_id= $request->union_id;
        $data->name_en = $request->name_en;
        $data->name_bn = $request->name_bn;
        $data->save();
        return redirect()->route('ward-no.view')->with('success', 'Data updated successfully!');
    }

    //  inactive
    public function inactive($id){
        $data = WardNo::findOrFail($id);
        $data->status = 1;
        $data->save();
        return redirect()->route('ward-no.view')->with('success', 'Data unpublished successfully!');
    }

    //  active
    public function active($id){
        $data = WardNo::findOrFail($id);
        $data->status = 0;
        $data->save();
        return redirect()->route('ward-no.view')->with('success', 'Data published successfully!');
    }

    //  delete
    public function delete($id){
        $data = WardNo::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('success', 'Data Deleted Successfully!');
    }
}