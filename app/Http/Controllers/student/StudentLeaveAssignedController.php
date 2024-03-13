<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use App\Models\LeaveAssign;
use App\Models\Studentleave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentLeaveAssignedController extends Controller
{
  ###################################    Show Leave assigned   ################################################
        public function studentLeaveAssigned(Request $request)
        {
            $assignmentlist = Studentleave::where("student",Auth::user()->id)->with('leavecategorynmae')->orderBy('created_at', 'DESC')->get();
            return view('student.leave_assigend.index')
            ->with(['data' => $assignmentlist])
            ->with(['active' =>'student_leave_assigned']);
        }
}
