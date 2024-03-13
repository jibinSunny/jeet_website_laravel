<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HourlyTemplate;
use App\Models\Salary;
use App\Models\SalaryTemplate;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\TeacherAttendance;
use App\Models\User;
use App\Models\UserAttendance;
use App\Models\UserType;
use Exception;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    public function showSalary(Request $request){
        $usertype = $request->usertype;
        $salaries = Salary::where('usertype',$usertype)->orderBy('created_at','DESC')->get();
        $usertypes = UserType::orderBy('created_at','DESC')->get();
        $data = array('usertypes' => $usertypes,
                    'salaries' => $salaries,
                    'usertype' => $usertype);
        return view('admin/salary/index',$data);
    }
    public function processSalary(Request $request){
        $salary_code = $request->salary_code;
        $overtime_hour = $request->overtime_hour;
        $salary = Salary::where('code',$salary_code)->first();
        $data = array();
        $month = $request->month;
        $year = $request->year;
        $ignore = array(0, 6);
        $working_days = 0;
        $counter = mktime(0, 0, 0, $month, 1, $year);
        while (date("n", $counter) == $month) {
            if (in_array(date("w", $counter), $ignore) == false) {
                $working_days++;
            }
            $counter = strtotime("+1 day", $counter);
        }
        $present = 0;
        if($salary->user){
            $data['user'] = User::where('id',$salary->user)->first();
            $attendence= UserAttendance::where('month',$month)->where('year',$year)
                                            ->where('user',$data['user']->id)->first();
        }else{
            $data['user'] = Teacher::where('id',$salary->teacher)->first();
            $attendence= TeacherAttendance::where('month',$month)->where('year',$year)
                                            ->where('teacher',$data['user']->id)->first();
        }
        for($i=0;$i<=31;$i++){
            $field = 'a'.$i;
            if($attendence->$field == 'P'){
                $present++;
            }else if($attendence->$field == 'L'){
                $present += 0.5;
            }
        }
        $absent = $working_days-$present;
        $dailyRate = $salary->salary_templates->net_salary/$working_days;
        $lop = round($dailyRate*$absent);
        $overtime_allowance = $overtime_hour*$salary->salary_templates->overtime_rate;

        $salary->processed = 1;
        $salary->working_days = $working_days;
        $salary->absent = $absent;
        $salary->present = $present;
        $salary->overtime_hours = $overtime_hour;
        $salary->overtime_allowance = $overtime_allowance;
        $salary->lop_deduction = $lop;
        $salary->month = $month;
        $salary->year = $year;
        $salary->lop_deduction = round($lop);
        $salary->gross = $salary->salary_templates->gross_salary+$overtime_allowance;
        $salary->total_deductions = $salary->salary_templates->total_deduction+$lop;
        $salary->net_earnings = $salary->salary_templates->net_salary-$lop+$overtime_allowance;
        try{
            $salary->save();
            return redirect('admin/salary')->withSuccess('Success');
        }catch(Exception $e){
            return redirect('admin/salary')->withError('Success');
        }
    }
    public function viewSalary(Request $request){
        $salary_code = $request->salary_code;
        $overtime_hour = $request->overtime_hour;
        $salary = Salary::where('code',$salary_code)->first();
        $data = array();
        $month = date('m');
        $year = date('Y');
        $ignore = array(0, 6);
        $working_days = 0;
        $counter = mktime(0, 0, 0, $month, 1, $year);
        while (date("n", $counter) == $month) {
            if (in_array(date("w", $counter), $ignore) == false) {
                $working_days++;
            }
            $counter = strtotime("+1 day", $counter);
        }
        $present = 0;
        if($salary->user){
            $data['user'] = User::where('id',$salary->user)->first();
            $attendence= UserAttendance::where('month',$month)->where('year',$year)
                                            ->where('user',$data['user']->id)->first();
        }else{
            $data['user'] = Teacher::where('id',$salary->teacher)->first();
            $attendence= TeacherAttendance::where('month',$month)->where('year',$year)
                                            ->where('teacher',$data['user']->id)->first();
        }
        for($i=0;$i<=31;$i++){
            $field = 'a'.$i;
            if($attendence->$field == 'P'){
                $present++;
            }else if($attendence->$field == 'L'){
                $present += 0.5;
            }
        }
        $data['present'] = $present;
        $absent = $working_days-$present;
        $dailyRate = $salary->salary_templates->net_salary/$working_days;
        $data['working_days'] = $working_days;
        $data['salary'] = $salary;
        $data['date'] = date("M Y");
        $data['present'] = $present;
        $data['absent'] = $absent;
        $data['lop'] = round($dailyRate*$absent);
        $data['overtime_hour'] = $overtime_hour;
        return view('admin/salary/viewSalary',$data);
    }

}
