<?php

namespace App\Http\Controllers\Backend\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Hash;


class ProfileController extends Controller
{
    //your.profile
    public function profile()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('backend.profileEdit.view_profile',compact('user'));
    }

    //edit.profile
    public function edit()
    {
        $id = Auth::user()->id;
        $editData = User::find($id);
        return view('backend.profileEdit.edit_profile',compact('editData'));
    }

    //update.profile
    public function update(Request $request)
    {
        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->mobile = $request->mobile ;
        $data->address = $request->address;
        $data->gender = $request->gender;

        if($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('upload/user_images'.$data->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images'),$filename);
            $data['image'] = $filename;
        }
        $data->save();

        $notification = array(
            'message' => 'User Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('your.profile')->with($notification);
    }

    //password.view

    public function passwordView()
    {
        return view('backend.profileEdit.edit_password');
    }

    //password.update

    public function passwordUpdate(Request $request)
    {
    
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hashedPassword = Auth::user()->password;
        if(Hash::check($request->oldpassword,$hashedPassword)){
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            $notification = array(
                'message' => 'Password Changed Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('login')->with($notification);
        }else{
            $notification = array(
                'message' => 'Old Password Does not Match',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
           
            

        
    }
}
