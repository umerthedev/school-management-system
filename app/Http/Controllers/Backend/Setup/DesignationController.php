<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Designation;


class DesignationController extends Controller
{
    //designation.view
    public function ViewDesignation()
    {
        $data['allData'] = Designation::all();
        return view('backend.setup.designation.view_designation', $data);
    }//end view


    //add.designation
    public function AddDesignation()
    {
        return view('backend.setup.designation.add_designation');
    }//end add


    //store.designation
    public function StoreDesignation(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:designations,name',
        ]);

        $data = new Designation();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Designation Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('designation.view')->with($notification);
    }//end store

    //designation.edit
    public function EditDesignation($id)
    {
        $editData = Designation::find($id);
        return view('backend.setup.designation.edit_designation', compact('editData'));
    }//end edit

    //designation.update
    public function UpdateDesignation(Request $request, $id)
    {
        $data = Designation::find($id);
        $validatedData = $request->validate([
            'name' => 'required|unique:designations,name,' . $data->id,
        ]);

        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Designation Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('designation.view')->with($notification);
    }//end update

    //designation.delete
    public function DeleteDesignation($id)
    {
        $designation = Designation::find($id);
        $designation->delete();

        $notification = array(
            'message' => 'Designation Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('designation.view')->with($notification);
    }//end delete
}
