<?php

namespace App\Http\Controllers\backend\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\DiscountStudent;
use App\Models\AssignStudent;
use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\StudentShift;
use App\Models\StudentYear;
use DB;
use PDF;

class StudentRollController extends Controller
{
    //StudentRollView
    public function StudentRollView(){
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        // $data['year_id'] = StudentYear::orderBy('id','desc')->first()->id;
        // $data['class_id'] = StudentClass::orderBy('id','desc')->first()->id;
        // $data['allData'] = AssignStudent::where('year_id',$data['year_id'])->where('class_id',$data['class_id'])->get();
        return view('backend.student.student_roll.roll_generate_view', $data);
    }
}
