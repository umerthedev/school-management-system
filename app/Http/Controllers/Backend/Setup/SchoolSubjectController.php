<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SchoolSubject;

class SchoolSubjectController extends Controller
{
    //school.subject.view
    public function viewSubject(){
        $data['allData'] = SchoolSubject::all();
        return view('backend.setup.school_subject.view_school_subject',$data);
    }//end view

    //add.school.subject
    public function addSubject(){
        return view('backend.setup.school_subject.add_school_subject');
    }//end add

    //store.school.subject
    public function storeSubject(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|unique:school_subjects,name',
        ]);

        $data = new SchoolSubject();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'School Subject Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('school.subject.view')->with($notification);
    }//end store

    //school.subject.edit
    public function editSubject($id){
        $editData = SchoolSubject::find($id);
        return view('backend.setup.school_subject.edit_school_subject',compact('editData'));
    }//end edit

    //update.school.subject
    public function updateSubject(Request $request,$id){
        $data = SchoolSubject::find($id);
        $validatedData = $request->validate([
            'name' => 'required|unique:school_subjects,name,'.$data->id,
        ]);

        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'School Subject Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('school.subject.view')->with($notification);
    }//end update

    //school.subject.delete
    public function deleteSubject($id){
        $data = SchoolSubject::find($id);
        $data->delete();

        $notification = array(
            'message' => 'School Subject Deleted Successfully',
            'alert-type' => 'warning'
        );

        return redirect()->route('school.subject.view')->with($notification);
    }//end delete
}
