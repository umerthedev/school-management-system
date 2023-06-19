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


    //StudentRegGetStudents
    public function StudentRegGetStudents(Request $request){
        // dd('Ok Done');

        $allData = AssignStudent::with(['student'])->where('year_id',$request->year_id)->where('class_id',$request->class_id)->get();
        // dd($allData->toArray());
        return response()->json($allData);
    }

    //StudentRollStore
    public function StudentRollStore(Request $request){
        // dd('Ok Done');
        
        $year_id = $request->year_id;
        $class_id = $request->class_id;
        if($request->student_id != null){
            for($i=0; $i<count($request->student_id); $i++){
                AssignStudent::where('year_id',$year_id)->where('class_id',$class_id)->where('student_id',$request->student_id[$i])->update(['roll'=>$request->roll[$i]]);
            }
        }else{
            $notification = array(
                'message' => 'Sorry there are no student record found',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
        $notification = array(
            'message' => 'Well Done! Successfully Roll Generated',
            'alert-type' => 'success'
        );
        return redirect()->route('roll.generate.view')->with($notification);
    }

}
