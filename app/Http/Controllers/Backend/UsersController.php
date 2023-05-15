<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    //View.users
    public function view(){
        $data['AllData'] = User::where('usertype','Admin')->get();
        return view('backend.users.view-user',$data);
    }
    //user.add
    public function add(){
        return view('backend.users.add-user');
    }


    //store.user
    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|unique:users|max:255',
            'email' => 'required|unique:users|max:255',
            
        ]);
        $data = new User();
        $code = rand(0000,9999);
        $data->usertype = 'Admin';
        $data->role = $request->role;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($code);
        $data->code = $code;
        $data->save();
        $notification = array(
            'message' => 'User Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('view.user')->with($notification);
    }

    //user.edit
    public function edit($id){
        $editData = User::find($id);
        return view('backend.users.edit-user',compact('editData'));
    }

    //user.update
    public function update(Request $request,$id){
        $data = User::find($id);        
        $data->name = $request->name;
        $data->email = $request->email;
        $data->role = $request->role;        
        $data->save();
        $notification = array(
            'message' => 'User Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('view.user')->with($notification);
    }

    //user.delete
    public function delete($id){
        $user = User::find($id);
        $user->delete();
        $notification = array(
            'message' => 'User Deleted Successfully',
            'alert-type' => 'error'
        );
        return redirect()->route('view.user')->with($notification);
    }
    

}
