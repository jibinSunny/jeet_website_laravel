<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GradeController extends Controller
{
        ###################################    index Items   ################################################
        public function Grade (Request $request){
            $academicyear = Grade::orderBy('created_at','DESC')->get();
            $data = [
                'gradelist' => $academicyear,
                'active'       => 'gradelist',
            ];
            return view('admin.grade.index',$data);
        }
        ###################################    Add Items   ################################################
        public function addGrade(Request $request){
            $data = [
                'active'       => 'gradelist',
            ];
            return view('admin.grade.add',$data);
        }
            ###################################    Save And Update Items   ################################################

    public function savegrade  (Request $request){
        // dd($request->all());
        $inputs = $request->only(['grade','point','gradefrom','gradeupto','note']);
        $inputs['created_user'] = Auth::user()->id;
        $inputs['created_usertype'] =Auth::user()->usertype;

        if ($request->academicyear_id) {
            Grade::where('id', $request->academicyear_id)->update($inputs);
                return redirect('admin/grade')->withSuccess('Exam Update successfully');
          
        }
        else{
            $request->validate([
                'grade'  =>  'unique:grade,grade',
                'point'  =>  'unique:grade,point',
                'gradefrom'  =>'unique:grade',
                'gradeupto'  =>  'unique:grade,gradeupto',
            ]);
            Grade::create($inputs);
            return redirect('admin/grade')->withSuccess('Exam created successfully');

        }
        return redirect('admin/grade')->withError('Oops Something went wrong!!');

    }

        ###################################    Edit Items   ################################################
        public function editGrade  ($editAcademicYear_id){
            $vendor = Grade::where('id',$editAcademicYear_id)->first();
            $data = [
                'active'       => 'gradelist',
                'gradelist' => $vendor,
            ];
            return view('admin.grade.edit',$data);
        }
    ###################################    Delete Items   ################################################
    public function deletegrade(Request $request){
        if ($request->categoryId) {
            $newscategory =Grade::where('id', $request->categoryId)->first();
            $newscategory->delete();
            return response()->json(['message'  => 'Deleted Successfully', 'status'    => '1']);
        } else {
            return response()->json(['status'=>0,'message'=>'Something went wrong. please try again.']);
        }
    }
}
