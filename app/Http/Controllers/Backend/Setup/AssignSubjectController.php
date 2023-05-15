<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentClass;
use App\Models\SchoolSubject;
use App\Models\AssignSubject;

class AssignSubjectController extends Controller
{
    //assign.subject.view
    public function viewAssignSubject()
    {
        //  $data['allData'] = AssignSubject::all();
        $data['allData'] = AssignSubject::select('class_id')->groupBy('class_id')->get();
        return view('backend.setup.assign_subject.view-assign-subject', $data);
    }

    //add.assign.subject
    public function addAssignSubject()
    {
        $data['classes'] = StudentClass::all();
        $data['subjects'] = SchoolSubject::all();
        return view('backend.setup.assign_subject.add-assign-subject', $data);
    }

    //store.assign.subject
    public function storeAssignSubject(Request $request)
    {
        $countClass = count($request->subject_id);
        if($countClass != NULL){
            for ($i=0; $i < $countClass; $i++) { 
                $assign_subject = new AssignSubject();
                $assign_subject->class_id = $request->class_id;
                $assign_subject->subject_id = $request->subject_id[$i];
                $assign_subject->full_mark = $request->full_mark[$i];
                $assign_subject->pass_mark = $request->pass_mark[$i];
                $assign_subject->subjective_mark = $request->subjective_mark[$i];
                $assign_subject->save();
            }//end for loop
            $Notification = array (
                'message' => 'Data inserted successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('assign.subject.view')->with($Notification);
        }else{
            $Notification = array (
                'message' => 'Data not inserted',
                'alert-type' => 'errors'
            );
            return redirect()->route('assign.subject.view')->with($Notification);

        }
        
    }//end store assign subject

    //edit.assign.subject
    public function editAssignSubject($class_id)
    {
        $data['editData'] = AssignSubject::where('class_id', $class_id)->orderBy('subject_id', 'asc')->get();
        $data['classes'] = StudentClass::all();
        $data['subjects'] = SchoolSubject::all();
        return view('backend.setup.assign_subject.edit-assign-subject', $data);
    }//end


    //update.assign.subject
    public function updateAssignSubject(Request $request,$class_id){

        if($request->subject_id == NULL){
            $notification = array(
                'message' => 'Sorry! You do not select any Subject',
                'alert-type' => 'error'
            );
            return redirect()->route('assign.subject.edit',$class_id)->with($notification);
        }else{

            AssignSubject::where('class_id',$class_id)->delete();
            $countClass = count($request->subject_id);
            for ($i=0; $i < $countClass; $i++) { 
                $assign_subject = new AssignSubject();
                $assign_subject->class_id = $request->class_id;
                $assign_subject->subject_id = $request->subject_id[$i];
                $assign_subject->full_mark = $request->full_mark[$i];
                $assign_subject->pass_mark = $request->pass_mark[$i];
                $assign_subject->subjective_mark = $request->subjective_mark[$i];
                $assign_subject->save();
            }//end for loop           

        }//end if else
        $Notification = array (
            'message' => 'Data inserted successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('assign.subject.view')->with($Notification);

    }//end


    //assign.subject.details
    public function detailsAssignSubject($class_id)
    {
        $data['detailsData'] = AssignSubject::where('class_id', $class_id)->orderBy('subject_id', 'asc')->get();
        return view('backend.setup.assign_subject.details-assign-subject', $data);
    }//end

    //assign.subject.delete
    public function deleteAssignSubject($class_id){
        $deleteData = AssignSubject::where('class_id',$class_id)->delete();
        $notification = array(
            'message' => 'Class Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('assign.subject.view')->with($notification);
    }//end assign.subject.delete

    
}
