<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeeCategory;

class FeeCategoryController extends Controller
{
    //fee.category.view
    public function viewFeeCategory(){

        $data['allData'] = FeeCategory::all();
        return view('backend.setup.fee_category.view_fee_category',$data);

    }

    //add.fee.category
    public function addFeeCategory(){

        return view('backend.setup.fee_category.add_fee_category');

    }

    //store.fee.category
    public function storeFeeCategory(Request $request){

        $validatedData = $request->validate([
            'name' => 'required|unique:fee_categories,name',
        ]
        ,[
            'name.required' => 'Please Input Fee Category Name',
            'name.unique'  => 'Fee Category Name Already Exists',

        ]);

        $data = new FeeCategory();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Fee Category Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('fee.category.view')->with($notification);

    }

    //fee.category.edit
    public function editFeeCategory($id){

        $editData = FeeCategory::find($id);
        return view('backend.setup.fee_category.edit_fee_category',compact('editData'));

    }

    //update.fee.category
    public function updateFeeCategory(Request $request,$id){

        $data = FeeCategory::find($id);
        $validatedData = $request->validate([
            'name' => 'required|unique:fee_categories,name,'.$data->id,
        ]
        ,[
            'name.required' => 'Please Input Fee Category Name',
            'name.unique'  => 'Fee Category Name Already Exists',

        ]);

        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Fee Category Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('fee.category.view')->with($notification);

    }

    //fee.category.delete
    public function deleteFeeCategory($id){

        $data = FeeCategory::find($id);
        $data->delete();

        $notification = array(
            'message' => 'Fee Category Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('fee.category.view')->with($notification);

    }


}
