<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AcademicYear;
use App\Models\ClassModel;
use App\Models\Department;
use App\Models\Division;
use App\Models\Setting;
use App\Models\Student;
use App\Models\StudentAttendance;
use App\Providers\AppServiceProvider;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class StudentAttendanceController extends Controller
{
    ###################################    Show Items   ################################################
    public function showStudentAttendance(Request $request)
    {

        $subject_list = Student::with('classname')->orderBy('created_at', 'DESC')->get();
        $classes=ClassModel::get();
        $data = [
            'student_attendance_list' => $subject_list,
            'classes' => $classes,
            'active'       => 'student_attendance_list',
        ];
        return view('admin.sattendance.index', $data);
    }
      ###################################   classFliter   ################################################
    public function sAttendanceclassFliter(Request $request)
    {

        $sattandance = Student::where('class',$request->get('categoryId'))->with('classname')->orderBy('created_at', 'DESC')->get();
        $division=Division::where('class',$request->get('categoryId'))->get();
        $data = [
            'division'=>$division,
            'sattandance' => $sattandance,
        ];
        return response()->json($data);
    }
    ###################################    Add Items   ################################################
    public function addStudentAttendance(Request $request)
    {

        $classes = ClassModel::orderBy('created_at', 'DESC')->get();
        $department = Department::orderBy('created_at', 'DESC')->get();
        $division = Division::orderBy('created_at', 'DESC')->get();
        // $studentAttendance = StudentAttendance::with('classname', 'academicyearname', 'divisionname', 'studentname', 'departmentname')->orderBy('created_at', 'DESC')->get();
        $data = [
            'active'       => 'student_attendance_list',
            'classes'       => $classes,
            'department' => $department,
            'division' => $division,
            // 'studentAttendance' => $studentAttendance,
            'data1' => "",
            'clasename' => "",
        ];
        return view('admin.sattendance.add', $data);
    }
    ###################################    Save And Update Items   ################################################

    public function saveStudentAttendance(Request $request)
    {
        // $day= AppServiceProvider::boot();
        // dd($request->all());
        $day = date('d', strtotime($request->date));
        $var = ltrim($day, '0');
        $dayfeild  = 'a' . $var;

        $student = $request->student;
        $attendance = $request->attendance;
        $setting = Setting::first();
        $academic_year=AcademicYear::where('name',$setting->academic_year)->pluck('id');
        // return $academic_year[0];

        for ($j = 0; $j < count($student); $j++) {
            $exists = StudentAttendance::Where('student', $student[$j])->Where('year', date('Y', strtotime($request->date)))->Where('month', date('m', strtotime($request->date)))->first();
            $department= Student::where('id',$student[$j])->first();
            if ($exists) {

                $exists->student = $student[$j];
                $exists->academic_year = $academic_year[0];
                $exists->class = $request->get('class');
                $exists->department = $department->department;
                $exists->division = $request->get('division');
                $exists->created_user = Auth::user()->id;
                $exists->created_usertype =  Auth::user()->usertype;
                $exists->year = date('Y', strtotime($request->date));
                $exists->month = date('m', strtotime($request->date));
                $exists->$dayfeild = $attendance[$j];
                // $exists->date = $request->date;
                $exists->update();
            } else {
                $studentattendance = new StudentAttendance();
                $studentattendance->student = $student[$j];
                $studentattendance->academic_year =  $academic_year[0];
                $studentattendance->class = $request->get('class');
                $studentattendance->department = $department->department;
                $studentattendance->division = $request->get('division');
                $studentattendance->created_user = Auth::user()->id;
                $studentattendance->created_usertype =  Auth::user()->usertype;
                $studentattendance->year = date('Y', strtotime($request->date));
                $studentattendance->month = date('m', strtotime($request->date));
                $studentattendance->$dayfeild = $attendance[$j];
                // $studentattendance->date = $request->date;
                $studentattendance->save();
            }
        }
        $classes = ClassModel::orderBy('created_at', 'DESC')->get();
        $division = Division::orderBy('created_at', 'DESC')->get();
        $clasename = ClassModel::where('id', $request->class)->pluck("name");
        $divisionname = Division::where('id', $request->division)->pluck("name");
        $claseid = ClassModel::where('id', $request->class)->pluck("id");
        $divisionid = Division::where('id', $request->division)->pluck("id");
        $date = $request->date;
        $data1 = Student::orWhere('class', $request->class)
            ->orWhere('division', $request->division)
            ->with([
                'attendance' => function ($query) use ($date) {
                    $year = date('Y', strtotime($date));
                    $month = date('m', strtotime($date));
                    $day = date('d', strtotime($date));
                    $var = ltrim($day, '0');
                    $dayfeild  = 'a' . $var;
                    // die( $month);
                    $query->where('year', $year)->where('month',$month)->where($dayfeild,'!=',null);
                },
            ])
            ->get();

        //    return $data1;
        $day = date('d', strtotime($date));
        $var = ltrim($day, '0');
        $dayfeild  = 'a' . $var;
        $data = [
            'data1' => $data1,
            'claseid' => $claseid,
            'divisionid' => $divisionid,
            'dayfeild' =>   $dayfeild,
            'clasename' => $clasename,
            'divisionname' => $divisionname,
            'date' => $request->date,
            'classes'       => $classes,
            'division' => $division,
            'active'       => 'student_attendance_list',
        ];
        //  return $data1;
        return view('admin.sattendance.add', $data);

        // return redirect('admin/sattendance/add')->withSuccess(' created successfully');
    }
    ###################################    studentAttendance Items   ################################################
    public function studentAttendance(Request $request)
    {
        // dd($request->all());
        $classes = ClassModel::orderBy('created_at', 'DESC')->get();
        $division = Division::orderBy('created_at', 'DESC')->get();
        $clasename = ClassModel::where('id', $request->class)->pluck("name");
        $divisionname = Division::where('id', $request->division)->pluck("name");
        $claseid = ClassModel::where('id', $request->class)->pluck("id");
        $divisionid = Division::where('id', $request->division)->pluck("id");
        $date = $request->date;
        $data1 = Student::orWhere('class', $request->class)
            ->orWhere('division', $request->division)
            ->with([
                'attendance' => function ($query) use ($date) {
                    $year = date('Y', strtotime($date));
                    $month = date('m', strtotime($date));
                    $day = date('d', strtotime($date));
                    $var = ltrim($day, '0');
                    $dayfeild  = 'a' . $var;
                    // die( $month);
                    $query->where('year', $year)->where('month',$month)->where($dayfeild,'!=',null);
                },
            ])
            ->get();

        //    return $data1;
        $day = date('d', strtotime($date));
        $var = ltrim($day, '0');
        $dayfeild  = 'a' . $var;
        $data = [
            'data1' => $data1,
            'claseid' => $claseid,
            'divisionid' => $divisionid,
            'dayfeild' =>   $dayfeild,
            'clasename' => $clasename,
            'divisionname' => $divisionname,
            'date' => $request->date,
            'classes'       => $classes,
            'division' => $division,
            'active'       => 'student_attendance_list',
        ];
        //  return $data1;
        return view('admin.sattendance.add', $data);
    }
}
