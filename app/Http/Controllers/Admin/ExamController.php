<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\ExamCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExamController extends Controller
{
    ###################################    Show Items   ################################################
    public function showExam(Request $request){
        $academicyear = Exam::orderBy('created_at','DESC')->get();
        $data = [
            'examlist' => $academicyear,
            'active'       => 'examlist',
        ];
        return view('admin.exam.index',$data);
    }
###################################    Add Items   ################################################
    public function addExam(Request $request){
        $examCategory = ExamCategory::orderBy('created_at','DESC')->get();
        $data = [
            'examcategory' => $examCategory,
            'active'       => 'examlist',
        ];
        return view('admin.exam.add',$data);
    }
###################################    Save And Update Items   ################################################

    public function saveExam(Request $request){

        $inputs = $request->only(['name','description']);
        $inputs['date_time'] = date('Y-m-d H:i:s', strtotime($request->date_time));
        $inputs['created_user'] = Auth::user()->id;
        $inputs['created_usertype'] =Auth::user()->usertype;

        if ($request->academicyear_id) {
            Exam::where('id', $request->academicyear_id)->update($inputs);
                return redirect('admin/exam/index')->withSuccess('Exam Update successfully');
          
        }
        else{
            Exam::create($inputs);
            return redirect('admin/exam/index')->withSuccess('Exam created successfully');

        }
        return redirect('admin/exam/index')->withError('Oops Something went wrong!!');

    }
###################################    Edit Items   ################################################
    public function editExam($editAcademicYear_id){
        // return $editAcademicYear_id;
        $vendor = Exam::where('id',$editAcademicYear_id)->first();
        $data = [
            'active'       => 'examlist',
            'examlist' => $vendor,
        ];
        return view('admin.exam.edit',$data);
    }
###################################    Delete Items   ################################################
public function deleteExam(Request $request){
    if($request->categoryId){

        $newscategory =Exam::where('id',$request->categoryId)->first();
            $newscategory->delete();
            return response()->json(['message'  => 'Deleted Successfully', 'status'    => '1']);
    }else{
        return response()->json(['status'=>0,'message'=>'Something went wrong. please try again.']);
    }
}

}
