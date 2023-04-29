<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeeAmountCategory;
use App\Models\FeeCategory;
use App\Models\StudentClass;



class FeeAmountController extends Controller
{
    //fee.amount.view
    public function viewFeeAmount(){
        // $data['allData'] = FeeAmountCategory::all();
        $data['allData'] = FeeAmountCategory::select('fee_category_id')->groupBy('fee_category_id')->get();
        return view('backend.setup.fee_amount.view_fee_amount',$data);
    }//end view
        

    //add.fee.amount
    public function addFeeAmount(){
        $data['fee_categories'] = FeeCategory::all();
        $data['classes'] = StudentClass::all();
        return view('backend.setup.fee_amount.add_fee_amount',$data);
    }//end add fee amount


    //store.fee.amount php8 
    public function storeFeeAmount(Request $request){
        $countClass = count($request->class_id);
        if($countClass !=NULL){
            for($i=0; $i<$countClass; $i++){
                $fee_amount = new FeeAmountCategory();
                $fee_amount->fee_category_id = $request->fee_category_id;
                $fee_amount->class_id = $request->class_id[$i];
                $fee_amount->amount = $request->amount[$i];
                $fee_amount->save();
            }//end for loop
        }//end if
        $notification = array(
            'message' => 'Fee Amount Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('fee.amount.view')->with($notification);
    }//end store fee amount

    //fee.amount.edit
    public function editFeeAmount($fee_category_id){
        $data['editData'] = FeeAmountCategory::where('fee_category_id',$fee_category_id)->orderBy('class_id','asc')->get();
        // dd($data['editData']);
        $data['fee_categories'] = FeeCategory::all();
        $data['classes'] = StudentClass::all();
        return view('backend.setup.fee_amount.edit_fee_amount',$data);
    }//end edit fee amount


    //update.fee.amount
    public function updateFeeAmount(Request $request,$fee_category_id){
        if($request->class_id == NULL){

            $notification = array(
                'message' => 'Sorry! You do not select any class',
                'alert-type' => 'error'
            );
            return redirect()->route('fee.amount.edit',$fee_category_id)->with($notification);
            
        }else{
            FeeAmountCategory::where('fee_category_id',$fee_category_id)->delete();
            $countClass = count($request->class_id);
            for($i=0; $i<$countClass; $i++){
                $fee_amount = new FeeAmountCategory();
                $fee_amount->fee_category_id = $request->fee_category_id;
                $fee_amount->class_id = $request->class_id[$i];
                $fee_amount->amount = $request->amount[$i];
                $fee_amount->save();
            }//end for loop
        }//end else
        $notification = array(
            'message' => 'Fee Amount Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('fee.amount.view')->with($notification);
    }//end update fee amount
    

    //fee.amount.details
    public function detailsFeeAmount($fee_category_id){
        $data['detailsData'] = FeeAmountCategory::where('fee_category_id',$fee_category_id)->orderBy('class_id','asc')->get();
        return view('backend.setup.fee_amount.details_fee_amount',$data);
    }//end details fee amount


    //fee.amount.delete
    public function deleteFeeAmount($fee_category_id){
        $deleteData = FeeAmountCategory::where('fee_category_id',$fee_category_id)->delete();
        $notification = array(
            'message' => 'Fee Amount Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('fee.amount.view')->with($notification);
    }//end delete fee amount
    

    


}
