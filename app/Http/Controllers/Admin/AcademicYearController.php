<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AcademicYear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AcademicYearController extends Controller
{

###################################    Show Items   ################################################
    public function showAcademicYear(Request $request){
        $academicyear = AcademicYear::orderBy('created_at','DESC')->get();
        $data = [
            'academicyear' => $academicyear,
            'active'       => 'academicyearlist',
        ];
        return view('admin.setting.administration.academic_year.index',$data);
    }
###################################    Add Items   ################################################
    public function addAcademicYear(Request $request){
        $data = [
            'active'       => 'academicyearlist',
        ];
        return view('admin.setting.administration.academic_year.add',$data);
    }
###################################    Save And Update Items   ################################################

    public function saveAcademicYear(Request $request){


            $inputs = $request->only(['name','title']);
            $inputs['start_date']=date('Y-m-d H:i:s' , strtotime($request->start_date));
            $inputs['end_date']=date('Y-m-d H:i:s' , strtotime($request->end_date));
            $inputs['created_user'] =Auth::user()->id;
            $inputs['created_usertype']=Auth::user()->usertype;;

            if($request->academicyear_id)
            {
                AcademicYear::where('id',$request->academicyear_id)->update($inputs);
                return redirect('admin/setting/administrator/academic-year')->withSuccess('Academic Year Update successfully');
            }
            else{
                AcademicYear::create($inputs);
                return redirect('admin/setting/administrator/academic-year')->withSuccess('Academic Create successfully');
            }
            return redirect('admin/setting/administrator/academic-year')->withError('Oops Something went wrong!!');
   

    }
###################################    Edit Items   ################################################
    public function editAcademicYear($editAcademicYear_id){
        // return $editAcademicYear_id;
        $vendor = AcademicYear::where('id',$editAcademicYear_id)->first();
        $data = [
            'active'       => 'academicyearlist',
            'academicyear' => $vendor,
        ];
        return view('admin.setting.administration.academic_year.edit',$data);
    }
###################################    Delete Items   ################################################
public function deleteAcademicYear(Request $request){
    if($request->categoryId){

        $newscategory =AcademicYear::where('id',$request->categoryId)->first();
            $newscategory->delete();
            return response()->json(['message'  => 'Deleted Successfully', 'status'    => '1']);
    }else{
        return response()->json(['status'=>0,'message'=>'Something went wrong. please try again.']);
    }
}

}
