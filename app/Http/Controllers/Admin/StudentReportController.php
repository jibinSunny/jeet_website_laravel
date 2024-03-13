<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Art;
use App\Models\Arts_student;
use App\Models\ClassModel;
use App\Models\Division;
use App\Models\Extracurricular;
use App\Models\Music;
use App\Models\Music_student;
use App\Models\Setting;
use App\Models\Sport;
use App\Models\Sports_student;
use App\Models\Student;
use App\Models\Student_extra_curricular;
use Illuminate\Http\Request;

class StudentReportController extends Controller
{
        ################################### class Report index   ################################################
        public function studentReport(Request $request)
        {
            $classes = ClassModel::orderBy('created_at', 'DESC')->get();
            $allmusic = Music::orderBy('created_at', 'DESC')->get();
            $allsports = Sport::orderBy('created_at', 'DESC')->get();
            $allart = Art::orderBy('created_at', 'DESC')->get();
            $allextra = Extracurricular::orderBy('created_at', 'DESC')->get();
            $items = new Student();
            if (isset($request->class)) {
                $items=$items->where('class',$request->class);
            }
            if (isset($request->division)) {
                $items=$items->where('division',$request->division);
            }
            if (isset($request->report_for)) {
                if($request->report_for =="Blood Group")
                {
                    $items=$items->where('blood',$request->blood);
                }
                if($request->report_for =="Goverment Subsidies")
                {
                    $items=$items->where('gov_sub',$request->subsidies);
                }
                if($request->report_for =="Arts")
                {
                   $art= Arts_student::where('arts_id',$request->art)->pluck('students_id')->toArray();

                    $items=$items->whereIn('id',$art);
                }
                if($request->report_for =="Sports")
                {
                   $sport= Sports_student::where('sport_id',$request->sport)->pluck('students_id')->toArray();

                    $items=$items->whereIn('id',$sport);
                }
                if($request->report_for =="Extra Curricular Activity")
                {
                   $extra= Student_extra_curricular::where('extra_curricular_id',$request->extra)->pluck('students_id')->toArray();

                    $items=$items->whereIn('id',$extra);
                }
                if($request->report_for =="Music")
                {
                   $music= Music_student::where('music_id',$request->music)->pluck('students_id')->toArray();

                    $items=$items->whereIn('id',$music);
                }

           }
            $all_division = Division::where('class',$request->class)->get();
            return view('admin.report.general_report.student.index', ['all_report_student' => $items->with('parentname')->orderBy('created_at', 'DESC')->get(),
            'classes' => $classes,
            'allart' => $allart,
            'allsports' => $allsports,
            'allmusic' => $allmusic,
            'allextra' => $allextra,
            'active' => 'student_report_list',
            'class_id' => $request->class,
            'division_id' => $request->division,
            'report_for' => $request->report_for,
            'subsidies' => $request->subsidies,
            'blood' => $request->blood,
            'art' => $request->art,
            'sport' => $request->sport,
            'extra' => $request->extra,
            'music' => $request->music,
            'all_division' => $all_division,]);
        }

        ################################### class Report show   ################################################
        public function studentReportView(Request $request)
        {

                $data['teacher'] = Student::where('code',$request->code)->first();
                $data['active'] ="student_report_list";
                return view('admin.report.general_report.student.view',$data);

        }
}
