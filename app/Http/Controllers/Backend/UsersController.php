<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    //View.users
    public function view(){
        $data['AllData'] = User::all();
        return view('backend.users.view-user',$data);
    }
}
