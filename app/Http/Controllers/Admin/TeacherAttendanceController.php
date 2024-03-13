<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AcademicYear;
use App\Models\Setting;
use App\Models\Teacher;
use App\Models\TeacherAttendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherAttendanceController extends Controller
{
    ###################################    Show Items   ################################################
    public function showteacherAttendance(Request $request)
    {

        $teacher_list = Teacher::orderBy('created_at', 'DESC')->get();
        //    return $subject_list;
        $data = [
            'teacher_list' => $teacher_list,
            'active'       => 'teacher_list',
        ];
        return view('admin.tattendance.index', $data);
    }

        ###################################    Add Items   ################################################
        public function addteacherAttendance (Request $request)
        {

            $data = [
                'active'       => 'teacher_list',
                'data1' => "",

            ];
            return view('admin.tattendance.add', $data);
        }

        public function teacherAttendance (Request $request)
        {
            // dd($request->all());
            $date = $request->date;
            $data1 = Teacher::with([
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
                'dayfeild' =>   $dayfeild,
                'date' =>   $date,
                'active'       => 'teacher_list',
            ];
            // return $data1;
            return view('admin.tattendance.add', $data);
        }
        public function savetattendance(Request $request)
        { 
    
            $day = date('d', strtotime($request->date));
            $var = ltrim($day, '0');
            $dayfeild  = 'a' . $var;
    
            $teacher = $request->teacher;
            $attendance = $request->attendance;
            $setting = Setting::first();
            $academic_year=AcademicYear::where('name',$setting->academic_year)->pluck('id');
    
            for ($j = 0; $j < count($teacher); $j++) {
                $exists = TeacherAttendance::Where('teacher', $teacher[$j])->Where('year', date('Y', strtotime($request->date)))->Where('month', date('m', strtotime($request->date)))->first();
                if ($exists) {
    
                    $exists->teacher = $teacher[$j];
                    $exists->academic_year = $academic_year[0];
                    $exists->created_user = Auth::user()->id;
                    $exists->created_usertype =  Auth::user()->usertype;
                    $exists->year = date('Y', strtotime($request->date));
                    $exists->month = date('m', strtotime($request->date));
                    $exists->$dayfeild = $attendance[$j];
                    $exists->update();
                } else {
                    $studentattendance = new TeacherAttendance();
                    $studentattendance->teacher = $teacher[$j];
                    $studentattendance->academic_year = $academic_year[0];
                    $studentattendance->created_user = Auth::user()->id;
                    $studentattendance->created_usertype =  Auth::user()->usertype;
                    $studentattendance->year = date('Y', strtotime($request->date));
                    $studentattendance->month = date('m', strtotime($request->date));
                    $studentattendance->$dayfeild = $attendance[$j];
                    // $studentattendance->date = $request->date;
                    $studentattendance->save();
                }
            }

            $date = $request->date;
            $data1 = Teacher::with([
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
                'dayfeild' =>   $dayfeild,
                'date' =>   $date,
                'active'       => 'teacher_list',
            ];
            // return $data1;
            return view('admin.tattendance.add', $data);
            // return redirect('admin/tattendance/add')->withSuccess(' created successfully');
        }
}
