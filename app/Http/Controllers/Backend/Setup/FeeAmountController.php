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
    

    


}
