<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentShift;

class StudentShiftController extends Controller
{
    //student.shift.view
    public function viewShift(){

        $data['allData'] = StudentShift::all();
        return view('backend.setup.student_shift.view_student_shift',$data);

    }

    //add.student.shift
    public function addShift(){

        return view('backend.setup.student_shift.add_student_shift');

    }

    //store.student.shift
    public function storeShift(Request $request){

        $validatedData = $request->validate([
            'name' => 'required|unique:student_shifts,name',
        ]
        ,[
            'name.required' => 'Please Input Student Shift Name',
            'name.unique'  => 'Shift Name Already Exists',

        ]);

        $data = new StudentShift();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Shift Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('student.shift.view')->with($notification);

    }

    //student.shift.edit
    public function editShift($id){

        $editData = StudentShift::find($id);
        return view('backend.setup.student_shift.edit_student_shift',compact('editData'));

    }

    //update.student.shift
    public function updateShift(Request $request,$id){

        $data = StudentShift::find($id);
        $validatedData = $request->validate([
            'name' => 'required|unique:student_shifts,name,'.$data->id,
        ]
        ,[
            'name.required' => 'Please Input Student Shift Name',
            'name.unique'  => 'Shift Name Already Exists',

        ]);
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Shift Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('student.shift.view')->with($notification);

    }
    //student.shift.delete
    public function deleteShift($id){

        $user = StudentShift::find($id);
        $user->delete();

        $notification = array(
            'message' => 'Student Shift Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('student.shift.view')->with($notification);

    }
}
