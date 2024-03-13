<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AcademicYear;
use App\Models\LeaveAssign;
use App\Models\LeaveCategory;
use App\Models\Setting;
use App\Models\Student;
use App\Models\Studentleave;
use App\Models\Teacher;
use App\Models\Teacherleave;
use App\Models\User;
use App\Models\Userleave;
use App\Models\UserType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeaveAssignController extends Controller
{
    ###################################    Show Items   ################################################
    public function leaveAssign(Request $request)
    {

        $class_list = LeaveAssign::with('usertypename', 'leavecategoryname')->orderBy('created_at', 'DESC')->get();
        $data = [
            'leavesssign_list' => $class_list,
            'active'       => 'leavesssign_list',
        ];
        return view('admin.leaveassign.index', $data);
    }
    ###################################    Add Items   ################################################
    public function addleaveAssign(Request $request)
    {
        $usertype = UserType::get();
        $leavecategory = LeaveCategory::get();
        $data = [
            'usertype'       => $usertype,
            'leavecategory'       => $leavecategory,
            'active'       => 'leavesssign_list',
        ];
        return view('admin.leaveassign.add', $data);
    }
    ###################################    Save And Update Items   ################################################

    public function saveleaveAssign(Request $request)
    {  
       

        $data=LeaveAssign::where('usertype',$request->usertype)->where('leave_category',$request->leave_category)->get();
        $setting = Setting::first();
        $academic_year=AcademicYear::where('name',$setting->academic_year)->pluck('id');
        $inputs = $request->only(['usertype', 'leave_category', 'leave_days', 'applicable']);
        $inputs['academic_year'] = $academic_year[0];
        $inputs['created_user'] = Auth::user()->id;
        $inputs['created_usertype'] = Auth::user()->usertype;

        if ($request->academicyear_id) {

            LeaveAssign::where('id', $request->academicyear_id)->update($inputs);
            $teacherleave = Teacherleave::where('leaveassign', $request->academicyear_id)->get();
            foreach ($teacherleave as $key => $option) {
                $option->delete();
            }
            $Studentleave = Studentleave::where('leaveassign',$request->academicyear_id)->get();
            foreach ($Studentleave as $key => $option) {
                $option->delete();
            }
            $Userleave = Userleave::where('leaveassign',$request->academicyear_id)->get();
            foreach ($Userleave as $key => $option) {
                $option->delete();
            }
            if ($request->usertype == "2") {

                $teacher = Teacher::get();
                for ($j = 0; $j < count($teacher); $j++) {
                    $teacherleave = new Teacherleave();
                    $teacherleave->teacher = $teacher[$j]->id;
                    $teacherleave->leaveassign = $request->academicyear_id;
                    $teacherleave->academic_year = $academic_year[0];
                    $teacherleave->leave_category = $request->leave_category;
                    $teacherleave->no_of_day = $request->leave_days;
                    $teacherleave->applicable = $request->applicable;
                    $teacherleave->remaining = $request->leave_days;
                    $teacherleave->created_user = Auth::user()->id;
                    $teacherleave->created_usertype =  Auth::user()->usertype;
                    $teacherleave->save();
                }
            } elseif ($request->usertype == "3") {
                    $student = Student::get();
                for ($j = 0; $j < count($student); $j++) {
                    $studentleave = new Studentleave();
                    $studentleave->student = $student[$j]->id;
                    $studentleave->leaveassign = $request->academicyear_id;
                    $studentleave->academic_year = $academic_year[0];
                    $studentleave->leave_category = $request->leave_category;
                    $studentleave->no_of_day = $request->leave_days;
                    $studentleave->applicable = $request->applicable;
                    $studentleave->remaining = $request->leave_days;
                    $studentleave->created_user = Auth::user()->id;
                    $studentleave->created_usertype =  Auth::user()->usertype;
                    $studentleave->save();
                }
            } else {
                $user = User::get();
                for ($j = 0; $j < count($user); $j++) {
                    $userleave = new Userleave();
                    $userleave->user = $user[$j]->id;
                    $userleave->leaveassign = $request->academicyear_id;
                    $userleave->academic_year = $academic_year[0];
                    $userleave->leave_category = $request->leave_category;
                    $userleave->no_of_day = $request->leave_days;
                    $userleave->applicable = $request->applicable;
                    $userleave->remaining = $request->leave_days;
                    $userleave->created_user = Auth::user()->id;
                    $userleave->created_usertype =  Auth::user()->usertype;
                    $userleave->save();
                }
            }

            return redirect('admin/leaveassign/index')->withSuccess('Exam Update successfully');
        } else {
            
            $data=LeaveAssign::where('usertype',$request->usertype)->where('leave_category',$request->leave_category)->get();
            if(count($data) != 0)
            {
                return redirect('admin/leaveassign/index')->withErrors(['name' => 'Leave Category Already Assingn User Type']);
            }
            else
            {
            $leaveassign=LeaveAssign::create($inputs);
            if ($request->usertype == "2") {
                $teacher = Teacher::get();
                for ($j = 0; $j < count($teacher); $j++) {
                    $teacherleave = new Teacherleave();
                    $teacherleave->teacher = $teacher[$j]->id;
                    $teacherleave->leaveassign = $leaveassign->id;
                    $teacherleave->academic_year = $academic_year[0];
                    $teacherleave->leave_category = $request->leave_category;
                    $teacherleave->no_of_day = $request->leave_days;
                    $teacherleave->applicable = $request->applicable;
                    $teacherleave->remaining = $request->leave_days;
                    $teacherleave->created_user = Auth::user()->id;
                    $teacherleave->created_usertype =  Auth::user()->usertype;
                    $teacherleave->save();
                }
            } elseif ($request->usertype == "3") {
                $student = Student::get();
                for ($j = 0; $j < count($student); $j++) {
                    $studentleave = new Studentleave();
                    $studentleave->student = $student[$j]->id;
                    $studentleave->leaveassign = $leaveassign->id;
                    $studentleave->academic_year = $academic_year[0];
                    $studentleave->leave_category = $request->leave_category;
                    $studentleave->no_of_day = $request->leave_days;
                    $studentleave->applicable = $request->applicable;
                    $studentleave->remaining = $request->leave_days;
                    $studentleave->created_user = Auth::user()->id;
                    $studentleave->created_usertype =  Auth::user()->usertype;
                    $studentleave->save();
                }
            } else {
                $user = User::get();
                // dd($request->all());
                for ($j = 0; $j < count($user); $j++) {
                    $userleave = new Userleave();
                    $userleave->user = $user[$j]->id;
                    $userleave->leaveassign = $leaveassign->id;
                    $userleave->academic_year = $academic_year[0];
                    $userleave->leave_category = $request->leave_category;
                    $userleave->no_of_day = $request->leave_days;
                    $userleave->applicable = $request->applicable;
                    $userleave->remaining = $request->leave_days;
                    $userleave->created_user = Auth::user()->id;
                    $userleave->created_usertype =  Auth::user()->usertype;
                    $userleave->save();
                }
            }
            return redirect('admin/leaveassign/index')->withSuccess('Leave Category  created successfully');
         }
         return redirect('admin/leaveassign/index')->withSuccess('Leave Category  created successfully');
        }
        return redirect('admin/leaveassign/index')->withError('Oops Something went wrong!!');
    }
    ###################################    Edit Items   ################################################
    public function editleaveAssign($editAcademicYear_id)
    {

        $vendor = LeaveAssign::where('id', $editAcademicYear_id)->first();
        $usertype = UserType::get();
        $leavecategory = LeaveCategory::get();
        $data = [
            'usertype'       => $usertype,
            'leavecategory'       => $leavecategory,
            'leavesssign'       => $vendor,
            'active'       => 'leavesssign_list',
        ];
        return view('admin.leaveassign.edit', $data);
    }
    ###################################    Delete Items   ################################################
      public function deleteleaveAssign(Request $request){
        if($request->categoryId){

        $newscategory =LeaveAssign::where('id',$request->categoryId)->first();
            $newscategory->delete();
            $teacherleave = Teacherleave::where('leaveassign', $request->categoryId)->get();
            foreach ($teacherleave as $key => $option) {
                $option->delete();
            }
            $Studentleave = Studentleave::where('leaveassign',$request->categoryId)->get();
            foreach ($Studentleave as $key => $option) {
                $option->delete();
            }
            $Userleave = Userleave::where('leaveassign',$request->categoryId)->get();
            foreach ($Userleave as $key => $option) {
                $option->delete();
            }

            return response()->json(['message'  => 'Deleted Successfully', 'status'    => '1']);
     }else{
        return response()->json(['status'=>0,'message'=>'Something went wrong. please try again.']);
    }
}
}
