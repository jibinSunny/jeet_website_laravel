<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeacherleaveApply;
use App\Models\UserleaveApply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeaveApplicationController extends Controller
{
    ###################################    Show Items   ################################################
    public function leaveApplication(Request $request)
    {

        $tacher_list = TeacherleaveApply::with('Teachername', 'leave_categoryname', 'usertypename')->orderBy('created_at', 'DESC')->get();
        // return $tacher_list;
        $user_list = UserleaveApply::with('username', 'leave_categoryname', 'usertypename')->orderBy('created_at', 'DESC')->get();
        $data = [
            'tacher_list' => $tacher_list,
            'user_list' => $user_list,
            'active'       => 'leaveapplicaton_list',
        ];
        return view('admin.leaveapplication.index', $data);
    }
    ###################################    approveleaveApplicationteacher  ################################################

    public function approveleaveApplicationteacher(Request $request)
    {

             $inputs['status'] = "1";
             $inputs['action_reason'] = $request->reson;
             $inputs['approver_user'] = Auth::user()->id;
             $inputs['approver_usertype'] = Auth::user()->usertype;
            if (TeacherleaveApply::where('id', $request->teacher_id)->update($inputs)) {
                return redirect('admin/leaveapplication/index')->withSuccess('Hostel Update successfully');
            }
            return redirect('admin/leaveapplication/index')->withError('Oops Something went wrong!!');

    }
   ###################################    rejectleaveApplicationteacher  ################################################
   public function rejectleaveApplicationteacher(Request $request)
   {
            $inputs['status'] = "2";
            $inputs['action_reason'] = $request->reson;
            $inputs['approver_user'] = Auth::user()->id;
            $inputs['approver_usertype'] = Auth::user()->usertype;
           if (TeacherleaveApply::where('id', $request->teacher_id)->update($inputs)) {
               return redirect('admin/leaveapplication/index')->withSuccess('Hostel Update successfully');
           }
           return redirect('admin/leaveapplication/index')->withError('Oops Something went wrong!!');

   }

       ###################################    approveleaveApplicationteacher  ################################################

       public function approveleaveApplicationuser($editAcademicYear_id)
       {


                $inputs['status'] = "1";
                $inputs['approver_user'] = Auth::user()->id;
                $inputs['approver_usertype'] = Auth::user()->usertype;
               if (UserleaveApply::where('id', $editAcademicYear_id)->update($inputs)) {
                   return redirect('admin/leaveapplication/index')->withSuccess('Hostel Update successfully');
               }
               return redirect('admin/leaveapplication/index')->withError('Oops Something went wrong!!');

       }
      ###################################    rejectleaveApplicationteacher  ################################################
      public function rejectleaveApplicationuser($editAcademicYear_id)
      {


               $inputs['status'] = "2";
               $inputs['approver_user'] = Auth::user()->id;
               $inputs['approver_usertype'] = Auth::user()->usertype;
              if (UserleaveApply::where('id', $editAcademicYear_id)->update($inputs)) {
                  return redirect('admin/leaveapplication/index')->withSuccess('Hostel Update successfully');
              }
              return redirect('admin/leaveapplication/index')->withError('Oops Something went wrong!!');

      }
}
