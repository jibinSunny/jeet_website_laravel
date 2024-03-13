<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use App\Models\Teacherleave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacheLeaveController extends Controller
{
      ###################################    Show Leave assigned   ################################################
      public function teacherLeaveassigned(Request $request)
      {
          $assignmentlist = Teacherleave::where("teacher",Auth::user()->id)->with('leavecategoryname')->orderBy('created_at', 'DESC')->get();
          return view('teacher.leave.leave_assigned')
          ->with(['data' => $assignmentlist])
          ->with(['active' =>'timetable_assigned_list']);
      }
}
