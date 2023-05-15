<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\DiscountStudent;
use App\Models\AssignStudent;


class StudentRegController extends Controller
{
    //student.registration.view
    public function StudentRegView (){
        $data['allData'] = AssignStudent::all();
        return view('backend.student.student_reg.view-student',$data);
    }


    //add.student.reg
    public function StudentRegAdd(){
        return view('backend.student.student_reg.add-student');
    }
}
