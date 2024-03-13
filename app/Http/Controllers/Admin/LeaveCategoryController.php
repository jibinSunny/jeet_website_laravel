<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LeaveCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeaveCategoryController extends Controller
{
###################################    Show Items   ################################################
    public function showleaveCategory(Request $request){
        $academicyear = LeaveCategory::orderBy('created_at','DESC')->get();
        $data = [
            'leavecategorylist' => $academicyear,
            'active'       => 'leavecategorylist',
        ];
        return view('admin.leavecategory.index',$data);
    }
###################################    Add Items   ################################################
    public function addleaveCategory(Request $request){
        $data = [
            'active'       => 'leavecategorylist',
        ];
        return view('admin.leavecategory.add',$data);
    }
     ###################################    Save And Update Items   ################################################

     public function saveleaveCategory  (Request $request){

        if($request->academicyear_id){
      
            $inputs = $request->only(['name','description']);


            if(LeaveCategory::where('id',$request->academicyear_id)->update($inputs))
            {
                return redirect('admin/leavecategory/index')->withSuccess('Leave Category successfully');
            }
            return redirect('admin/leavecategory/index')->withError('Oops Something went wrong!!');
        }else{

            $user = new LeaveCategory();
            $user->name=$request->name;
            $user->description=$request->description;
            $user->created_user=Auth::user()->id;
            if( $user->save())
            {
                return redirect('admin/leavecategory/index')->withSuccess('Leave Category  created successfully');
            }
            return redirect('admin/leavecategory/add')->withError('Oops Something went wrong!!');

        }
        
    }
    ###################################    Edit Items   ################################################
    public function editleaveCategory ($editAcademicYear_id){
  
        $vendor = LeaveCategory::where('id',$editAcademicYear_id)->first();
        $data = [
            'leavecategory' => $vendor,
            'active'       => 'leavecategorylist',
        ];
        return view('admin.leavecategory.edit',$data);
    }
###################################    Delete Items   ################################################    
public function deleteleaveCategory(Request $request){
    if($request->categoryId){
     
        $newscategory =LeaveCategory::where('id',$request->categoryId)->first();
            $newscategory->delete();
            return response()->json(['message'  => 'Deleted Successfully', 'status'    => '1']);
    }else{
        return response()->json(['status'=>0,'message'=>'Something went wrong. please try again.']);
    }
}
}
