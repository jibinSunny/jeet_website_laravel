<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ClassModel;
use App\Models\Student;
use App\Models\StudentAttendance;
use App\Models\Teacher;
use App\Models\TeacherAttendance;
use App\Models\TeacherClass;
use App\Models\User;
use App\Models\UserAttendance;
use App\Models\UserType;
use Illuminate\Http\Request;

class AttandanceReportController extends Controller
{
    ###################################    Show Items   ################################################
    public function attandanceReport  (Request $request)
    {

            $classes = ClassModel::orderBy('created_at', 'DESC')->get();
            $usertype = UserType::orderBy('created_at', 'DESC')->get();
            return view('admin.report.general_report.attandance.index',
            [
            'classes' => $classes, 
            'usertype' =>$usertype,
            'active' => 'attandace_report_list']);
    }
    ###################################    user List   ################################################
    public function attandanceReportuserList (Request $request)
    { 

        if($request->user_type=="2")
        {
        $all_user=Teacher::orderBy('created_at', 'DESC')->get();
        return response()->json($all_user);
        }
        if($request->user_type=="3")
        {
            $all_user=Student::orderBy('created_at', 'DESC')->get();
            return response()->json($all_user);
        }
       else
        {
            $all_user=User::where('usertype',$request->user_type)->orderBy('created_at', 'DESC')->get();
            return response()->json($all_user);
        }
       
    } 

    ###################################    Show Items   ################################################
    public function attandanceReportView (Request $request)
    { 
        $day = date('d', strtotime($request->date));
        $var = ltrim($day, '0');
        $dayfeild  = 'a' . $var;
        $month = date('m', strtotime($request->date));
        // return   $month;
        if($request->user_type=="2")
        {
         
            $user=TeacherAttendance::where($dayfeild,$request->a_type)->where('month',$month)->pluck('teacher')->toArray();
            $user =  array_unique($user);
            $data= Teacher::whereIn('id', $user)->with('usertypename')->get();
            return response()->json($data);
           
        }
        elseif($request->user_type=="3")
        { 
           
            $user=StudentAttendance::where($dayfeild,$request->a_type)->where('month',$month)->where('class',$request->select_class)->where('division',$request->division)->pluck('student')->toArray();
            $user =  array_unique($user);
            $data= Student::whereIn('id',$user)->with('usertypename')->get();
            return response()->json($data);
        }
        else
        {
            $user=UserAttendance::where($dayfeild,$request->a_type)->where('month',$month)->where('usertype',$request->user_type)->pluck('user')->toArray();
            $user =  array_unique($user);
            $data= User::whereIn('id', $user)->with('usertypename')->get();
            return response()->json($data);
        }     
     

    }
}
