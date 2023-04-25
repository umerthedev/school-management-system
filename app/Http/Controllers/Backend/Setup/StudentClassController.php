<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentClass;

class StudentClassController extends Controller
{
    //student.class.view
    public function viewStudent(){

        $data['allData'] = StudentClass::all();
        return view('backend.setup.student_class.view_student_class',$data);
    }

    //addStudent
    public function addStudent(){

        return view('backend.setup.student_class.add_student_class');
    }

    //storeStudent
    public function storeStudent(Request $request){

        $validated = $request->validate([
            'name' => 'required|unique:student_classes,name',
        ],
        [
            'name.required' => 'Please Input Student Class Name',
        ]);

        $data = new StudentClass();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Class Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('student.class.view')->with($notification);
    }

    //student.class.edit
    public function editStudent($id){

        $editData = StudentClass::find($id);
        return view('backend.setup.student_class.edit_student_class',compact('editData'));
    }
    //update.student.class
    public function updateStudent(Request $request,$id){

        $data = StudentClass::find($id);
        $validated = $request->validate([
            'name' => 'required|unique:student_classes,name,'.$data->id,
        ],
        [
            'name.required' => 'Please Input Student Class Name',
        ]);

        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Class Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('student.class.view')->with($notification);
    }
    //deleteStudent
    public function deleteStudent($id){

        $student = StudentClass::find($id);
        $student->delete();

        $notification = array(
            'message' => 'Student Class Deleted Successfully',
            'alert-type' => 'error'
        );

        return redirect()->route('student.class.view')->with($notification);
    }
}
