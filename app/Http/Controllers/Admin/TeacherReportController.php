<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ClassModel;
use App\Models\Division;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherReportController extends Controller
{
      ################################### teacher Report index   ################################################
      public function teacherReport(Request $request)
      {
       
        // dd($request->all());
              $classes = ClassModel::orderBy('created_at', 'DESC')->get();
              $items = new Teacher;
              if (isset($request->division)) {
                  $teacher = Division::where('id',$request->division)->first();
                  $items=$items->where('id',$teacher->teacher);
              }
              $all_division = Division::where('class',$request->class)->get();
              return view('admin.report.general_report.teacher.index', ['all_report_teachers' => $items->orderBy('created_at', 'DESC')->get(),
              'classes' => $classes, 
              'active' => 'teacher_report_list', 
              'class_id' => $request->class,
              'division_id' => $request->division, 
              'all_division' => $all_division,]);
      }

      ################################### teacher Report view   ################################################
      public function viewTeacherReport(Request $request)
      {

        $data['teacher'] = Teacher::where('code',$request->code)->first();
        $data['active'] ="teacher_report_list";
        return view('admin.report.general_report.teacher.view',$data);
      }
}
