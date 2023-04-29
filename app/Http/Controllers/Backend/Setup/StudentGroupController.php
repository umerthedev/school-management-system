<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentGroup;

class StudentGroupController extends Controller
{
    //student.group.view
    public function viewGroup(){
        $data['allData'] = StudentGroup::all();
        return view('backend.setup.student_group.view_student_group',$data);
    }

    //add.student.group
    public function addGroup(){
        return view('backend.setup.student_group.add_student_group');
    }


    //store.student.group
    public function storeGroup(Request $request){
        $validated = $request->validate([
            'name' => 'required|unique:student_groups,name',
        ],
        [
            'name.required' => 'Please Input Student Group Name',
            'name.unique'  => 'Group Name Already Exists',

        ]
    );

        $data = new StudentGroup();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Group Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('student.group.view')->with($notification);
    }

    //student.group.edit
    public function editGroup($id){
        $editData = StudentGroup::find($id);
        return view('backend.setup.student_group.edit_student_group',compact('editData'));
    }

    //update.student.group
    public function updateGroup(Request $request,$id){
        $data = StudentGroup::find($id);
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Group Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('student.group.view')->with($notification);
    }

    //student.group.delete
    public function deleteGroup($id){
        $data = StudentGroup::find($id);
        $data->delete();

        $notification = array(
            'message' => 'Student Group Deleted Successfully',
            'alert-type' => 'error'
        );

        return redirect()->route('student.group.view')->with($notification);
    }






    
}
