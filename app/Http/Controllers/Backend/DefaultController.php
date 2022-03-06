<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Union;
use App\Models\Upazila;
use App\Models\WardNo;
use Illuminate\Http\Request;

class DefaultController extends Controller
{
    public function getDistrict(Request $request){
        $districts = District::where('division_id', $request->division_id)->where('status', '0')->orderBy('name_en', 'asc')->get();
        // dd($districts);
        return response()->json($districts);
    }
    public function getUpazila(Request $request){
        $upazilas = Upazila::where('district_id', $request->district_id)->where('status', '0')->orderBy('name_en', 'asc')->get();
        // dd($districts);
        return response()->json($upazilas);
    }
    public function getUnion(Request $request){
        // dd('ok');
        $unions = Union::where('upazila_id', $request->upazila_id)->where('status', '0')->orderBy('name_en', 'asc')->get();
        // dd($unions);
        return response()->json($unions);
    }

    //  get Ward No
    public function getWardNo(Request $request){
        $wardno = WardNo::where('union_id', $request->union_id)->where('status', '0')->orderBy('name_en', 'asc')->get();
        return response()->json($wardno);
    }
}