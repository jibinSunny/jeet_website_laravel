<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FeeType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeeTypeController extends Controller
{
     ###################################    Show Items   ################################################
     public function showFeeType  (Request $request)
     {

         $division_list = FeeType::orderBy('created_at', 'DESC')->get();
         $data = [
             'feetypelist' => $division_list,
             'active'       => 'feetypelist',
         ];
         return view('admin.setting.administration.feetypes.index', $data);
     }
     ###################################    Add Items   ################################################
     public function addFeeType(Request $request)
     {
         $data = [
             'active'       => 'feetypelist',
         ];
         return view('admin.setting.administration.feetypes.add',$data);
     }
 ###################################    Save And Update Items   ################################################

    public function saveFeeType (Request $request){


            $inputs = $request->only(['name','fee_id','note','duration']);
            $inputs['created_user'] =Auth::user()->id;
            $inputs['created_usertype']=Auth::user()->usertype;

            if($request->academicyear_id)
            {
                FeeType::where('id',$request->academicyear_id)->update($inputs);
                return redirect('admin/setting/administrator/feeType/index')->withSuccess('Fee Type Update successfully');
            }
            else{
                FeeType::create($inputs);
                return redirect('admin/setting/administrator/feeType/index')->withSuccess('Fee Type Create successfully');
            }
            return redirect('admin/setting/administrator/feeType/index')->withError('Oops Something went wrong!!');


    }
    ###################################    Edit Items   ################################################
    public function editFeeType ($editAcademicYear_id){

        $vendor = FeeType::where('id',$editAcademicYear_id)->first();
        $data = [
            'feetypelist' => $vendor,
            'active'       => 'feetypelist',
        ];
        return view('admin.setting.administration.feetypes.edit', $data);
    }
 ###################################    Delete Items   ################################################
public function deleteFeeType(Request $request){
    if($request->categoryId){

        $newscategory =FeeType::where('id',$request->categoryId)->first();
            $newscategory->delete();
            return response()->json(['message'  => 'Deleted Successfully', 'status'    => '1']);
    }else{
        return response()->json(['status'=>0,'message'=>'Something went wrong. please try again.']);
    }
}
}
