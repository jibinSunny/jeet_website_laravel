<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StudentGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentGroupController extends Controller
{
    ###################################    Show Items   ################################################
    public function showStudentGroup(Request $request){
        $academicyear = StudentGroup::orderBy('created_at','DESC')->get();
        $data = [
            'studentgroup' => $academicyear,
            'active'       => 'studentgrouplist',
        ];
        return view('admin.setting.administration.student_group.index',$data);
    }
    ###################################    Add Items   ################################################
    public function addStudentGroup (Request $request){
        $data = [
            'active'       => 'studentgrouplist',
        ];
        return view('admin.setting.administration.student_group.add',$data);
    }
    public function saveStudentGroup(Request $request){

            $inputs = $request->only(['name']);
            $inputs['created_user'] =Auth::user()->id;
            $inputs['created_usertype']=Auth::user()->usertype;
            if($request->academicyear_id)
            {
                StudentGroup::where('id',$request->academicyear_id)->update($inputs);
                return redirect('admin/setting/administrator/student-group')->withSuccess('Student Group Update successfully');
            }
            else
            {
                StudentGroup::create($inputs);
                return redirect('admin/setting/administrator/student-group')->withSuccess('Student Create successfully');
            }
            return redirect('admin/setting/administrator/student-group')->withError('Oops Something went wrong!!');
       
        
    }
###################################    Edit Items   ################################################
    public function editStudentGroup ($editAcademicYear_id){
        $vendor = StudentGroup::where('id',$editAcademicYear_id)->first();
        $data = [
            'studentgroup' => $vendor,
            'active'       => 'studentgrouplist',
        ];
        return view('admin.setting.administration.student_group.edit',$data);
    }
###################################    Delete Items   ################################################    
public function deleteStudentGroup(Request $request){
    if($request->categoryId){
     
        $newscategory =StudentGroup::where('id',$request->categoryId)->first();
            $newscategory->delete();
            return response()->json(['message'  => 'Deleted Successfully', 'status'    => '1']);
    }else{
        return response()->json(['status'=>0,'message'=>'Something went wrong. please try again.']);
    }
}
}
