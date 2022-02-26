<?php

namespace App\Http\Controllers\Backend;

use App\Models\Division;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Village;

class VillageController extends Controller
{
    //  view
    public function view(){
        $data['allData'] = Village::orderBy('division_id', 'asc')->orderBy('district_id', 'asc')->orderBy('upazila_id', 'asc')->orderBy('union_id', 'asc')->orderBy('ward_no_id', 'asc')->orderBy('name_en', 'asc')->get();
        return view('backend.village.view', $data);
    }

    //  create
    public function create(){
        $data['divisions'] = Division::where('status', '0')->orderBy('name_en', 'asc')->get();
        return view('backend.village.create', $data);
    }

    //  store
    public function store(Request $request){
        $data = new Village();
        $data->division_id = $request->division_id;
        $data->district_id = $request->district_id;
        $data->upazila_id = $request->upazila_id;
        $data->union_id= $request->union_id;
        $data->ward_no_id= $request->ward_no_id;
        $data->name_en = $request->name_en;
        $data->name_bn = $request->name_bn;
        $data->save();
        return redirect()->route('village.view')->with('success', 'Data inserted successfylly!');
    }

    //  edit
    public function edit($id){
        $data['editData'] = Village::findOrFail($id);
        $data['divisions'] = Division::where('status', '0')->orderBy('name_en', 'asc')->get();
        return view('backend.village.create', $data);
    }

    //  update
    public function update(Request $request, $id){
        $data = Village::findOrFail($id);
        $data->division_id = $request->division_id;
        $data->district_id = $request->district_id;
        $data->upazila_id = $request->upazila_id;
        $data->union_id= $request->union_id;
        $data->ward_no_id= $request->ward_no_id;
        $data->name_en = $request->name_en;
        $data->name_bn = $request->name_bn;
        $data->save();
        return redirect()->route('village.view')->with('success', 'Data updated successfully!');
    }

    //  inactive
    public function inactive($id){
        $data = Village::findOrFail($id);
        $data->status = 1;
        $data->save();
        return redirect()->route('village.view')->with('success', 'Data unpublished successfully!');
    }

    //  active
    public function active($id){
        $data = Village::findOrFail($id);
        $data->status = 0;
        $data->save();
        return redirect()->route('village.view')->with('success', 'Data published successfully!');
    }

    //  delete
    public function delete($id){
        $data = Village::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('success', 'Data Deleted Successfully!');
    }
}