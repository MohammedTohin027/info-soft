<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //  view
    public function view(){
        // $data['allData'] = User::orderBy('id', 'desc')->get();
        $data['allData'] = User::all();
        return view('backend.user.view', $data);
    }

    //  create
    public function create(){
        return view('backend.user.create');
    }

    //  store
    public function store(Request $request){
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);
        $data = new User();
        $data->usertype = $request->usertype;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        $data->save();
        return redirect()->route('user.view')->with('success', 'Data inserted successfylly!');
    }

    //  edit
    public function edit($id){
        $editData = User::findOrFail($id);
        return view('backend.user.edit', compact('editData'));
    }

    //  update
    public function update(Request $request, $id){
        $data = User::findOrFail($id);
        $request->validate([
            'email' => 'required|unique:users,email,'.$id,
        ]);
        $data->update($request->all());
        return redirect()->route('user.view')->with('success', 'Data updated successfully!');
    }

    //  delete
    public function delete($id){
        $user = User::findOrFail($id);
        if (file_exists('public/upload/profile_images/'.$user->image) AND ! empty($user->image)) {
           unlink('public/upload/profile_images/'. $user->image);
        }
        $user->delete();
        return redirect()->back()->with('success', 'Data Deleted Successfully!');
    }
}
