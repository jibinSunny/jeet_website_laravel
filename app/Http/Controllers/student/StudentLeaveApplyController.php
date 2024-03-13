<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use App\Models\AcademicYear;
use App\Models\Setting;
use App\Models\Student;
use App\Models\Studentleave;
use App\Models\StudentleaveApply;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentLeaveApplyController extends Controller
{
    ###################################    Show Items   ################################################
    public function studentleaveApply (Request $request)
    {

        $class_list = StudentleaveApply::with('studentname', 'leave_categoryname')->orderBy('created_at', 'DESC')->get();
        $data = [
            'leaveapply_list' => $class_list,
            'active'       => 'student_leaveapply_list',
        ];
        return view('student.leaveapply.index', $data);
    }
    ###################################    Add Items   ################################################
    public function studentaddleaveApply(Request $request)
    {
        $category =  Studentleave::where("student",Auth::user()->id)->with('leavecategorynmae')->get();
        $data = [
            'category'       => $category,
            'active'       => 'student_leaveapply_list',
        ];
        return view('student.leaveapply.add', $data);
    }
   ###################################    Save And Update Items   ################################################

    public function studentsaveleaveApply(Request $request)
    {

        //  dd($request->all());
        $date = explode('-', $request->leave_schedule);
        $date1 = explode(' ', $date[0]);
        $date2 = explode(' ', $date[1]);
        $date3 = Carbon::createFromFormat('d/m/Y', $date1[0])->format('Y-m-d');
        $date4 = Carbon::createFromFormat('d/m/Y', $date2[1])->format('Y-m-d');
        $date5 = Carbon::parse($date3);
        $date6 = Carbon::parse($date4);
        $diff = $date5->diffInDays($date6);
        $setting = Setting::first();
        $academic_year=AcademicYear::where('name',$setting->academic_year)->pluck('id');
        $leave_category_day=Studentleave::where("student",Auth::user()->id)->where('leave_category',$request->leave_category)->select('no_of_day')->first();
         if($leave_category_day->no_of_day < $diff)
         {
            return redirect('student/leave/apply')->withErrors(['name' => 'Your No Of Leave Day is More Than Assign leave']);
         }
        $inputs['student'] = Auth::user()->id;
        $inputs['leave_category'] = $request->leave_category;
        $inputs['reason'] = $request->reason;
        $inputs['apply_date'] = Carbon::now();
        $inputs['from_date'] = $date3;
        $inputs['to_date'] = $date4;
        $inputs['to_time'] = $date2[2];
        $inputs['from_time'] = $date1[1];
        $inputs['od_status'] = ($request->od_status) ?? 0;
        $inputs['leave_days'] = $diff;
        $inputs['applicationto_usertype'] = "2";
        $inputs['status'] = "0";
        $inputs['academic_year'] = $academic_year[0];
        if ($request->file('attachment')) {
            $path = public_path('user-files/student/attachment/apply_leave/');
            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true, true);
            }
            $file          = $request->file('attachment');
            $profile_file_name     = $file->getClientOriginalName();
            $file->move($path, $profile_file_name);
            $inputs['attachment'] = $profile_file_name;
        }

        if ($request->academicyear_id) {
            StudentleaveApply::where('id', $request->academicyear_id)->update($inputs);
            return redirect('student/leave/apply')->withSuccess(' successfully');
        } else {
            StudentleaveApply::create($inputs);
            return redirect('student/leave/apply')->withSuccess('successfully');
        }
        return redirect('student/leave/apply')->withError('Oops Something went wrong!!');
    }
     ###################################    Edit Items   ################################################
     public function studenteditleaveApply($editAcademicYear_id)
     {
 
         $vendor = StudentleaveApply::where('id', $editAcademicYear_id)->first();
         $category =  Studentleave::where("student",Auth::user()->id)->with('leavecategorynmae')->get();
         $data = [
             'category'       => $category,
             'leaveapply_list' => $vendor,
             'active'       => 'student_leaveapply_list',
         ];
         return view('student.leaveapply.edit', $data);
     }
 
     ###################################    Delete Items   ################################################
     public function studentdeleteleaveApply(Request $request)
     {
         if ($request->categoryId) {
 
             $newscategory = StudentleaveApply::where('id', $request->categoryId)->first();
             $newscategory->delete();
             return response()->json(['message'  => 'Deleted Successfully', 'status'    => '1']);
         } else {
             return response()->json(['status' => 0, 'message' => 'Something went wrong. please try again.']);
         }
     }   
 
}
