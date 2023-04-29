<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentYear;

class StudentYearController extends Controller
{
    //student.year.view
    public function viewYear(){

        $data['allData'] = StudentYear::all();
        return view('backend.setup.student_year.view_student_year',$data);
    }

    //add.student.year
    public function addYear(){

        return view('backend.setup.student_year.add_student_year');
    }

    //store.student.year

    public function storeYear(Request $request){

        $validated = $request->validate([
            'name' => 'required|unique:student_years,name',
        ],
        [
            'name.required' => 'Please Input Student Year',
            'name.unique'  => 'Year Already Exists',

        ]);

        $data = new StudentYear();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Year Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('student.year.view')->with($notification);
    }

    //student.year.edit
    public function editYear($id){

        $editData = StudentYear::find($id);
        return view('backend.setup.student_year.edit_student_year',compact('editData'));
    }

    //update.student.year
    public function updateYear(Request $request,$id)
    {

        $data = StudentYear::find($id);
        $validated = $request->validate([
            'name' => 'required',
        ],
        [
            'name.required' => 'Please Input Student Year',
        ]);

        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Year Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('student.year.view')->with($notification);
    }


    //delete.student.year
    public function deleteYear($id){

        $year = StudentYear::find($id);
        $year->delete();

        $notification = array(
            'message' => 'Student Year Deleted Successfully',
            'alert-type' => 'error'
        );

        return redirect()->route('student.year.view')->with($notification);
    }
 
    
    
}