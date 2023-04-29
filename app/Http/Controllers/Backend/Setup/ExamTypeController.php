<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExamType;

class ExamTypeController extends Controller
{
    //exam.type.view
    public function viewExamType(){
        $data['allData'] = ExamType::all();
        return view('backend.setup.exam_type.view_exam_type',$data);
    }
    //add.exam.type
    public function addExamType(){
        return view('backend.setup.exam_type.add_exam_type');
    }

    //store.exam.type  
    public function storeExamType(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|unique:exam_types,name',
        ]);
        $data = new ExamType();
        $data->name = $request->name;
        $data->save();
        $notification = array(
            'message' => 'Exam Type Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('exam.type.view')->with($notification);
    }

    //edit.exam.type
    public function editExamType($id){
        $editData = ExamType::find($id);
        return view('backend.setup.exam_type.edit_exam_type',compact('editData'));
    }

    //update.exam.type
    public function updateExamType(Request $request,$id){
        $data = ExamType::find($id);
        $validatedData = $request->validate([
            'name' => 'required|unique:exam_types,name,'.$data->id,
        ]);
        $data->name = $request->name;
        $data->save();
        $notification = array(
            'message' => 'Exam Type Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('exam.type.view')->with($notification);
    }

    //delete.exam.type
    public function deleteExamType($id){
        $data = ExamType::find($id);
        $data->delete();
        $notification = array(
            'message' => 'Exam Type Deleted Successfully',
            'alert-type' => 'warning'
        );
        return redirect()->route('exam.type.view')->with($notification);
    }
}
