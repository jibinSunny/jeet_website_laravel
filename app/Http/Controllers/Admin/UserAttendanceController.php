<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AcademicYear;
use App\Models\Setting;
use App\Models\User;
use App\Models\UserAttendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAttendanceController extends Controller
{
    ###################################    Show Items   ################################################
    public function showuserAttendance (Request $request)
    {

        $user_list = User::with('usertypename')->orderBy('created_at', 'DESC')->get();
        $data = [
            'user_list' => $user_list,
            'active'       => 'auser_list',
        ];
        return view('admin.uattendance.index', $data);
    }

    ###################################    Add Items   ################################################
    public function adduserAttendance(Request $request)
    {

        $data = [
            'active'       => 'auser_list',
            'data1' => "",

        ];
        return view('admin.uattendance.add', $data);
    }

    public function userAttendance(Request $request)
    {
        // dd($request->all());
        $date = $request->date;
        $data1 = User::with('usertypename')->with([
            'attendance' => function ($query) use ($date) {
                $year = date('Y', strtotime($date));
                $month = date('m', strtotime($date));
                $day = date('d', strtotime($date));
                $var = ltrim($day, '0');
                $dayfeild  = 'a' . $var;
                // die( $month);
                $query->where('year', $year)->where('month', $month)->where($dayfeild, '!=', null);
            },
        ])
            ->get();

        //   return $data1;
        $day = date('d', strtotime($date));
        $var = ltrim($day, '0');
        $dayfeild  = 'a' . $var;
        $data = [
            'data1' => $data1,
            'dayfeild' =>   $dayfeild,
            'date' =>   $date,
            'active'       => 'auser_list',
        ];
        // return $data1;
        return view('admin.uattendance.add', $data);
    }
    public function saveuserAttendance(Request $request)
    {

        //  dd($request->all());
        $day = date('d', strtotime($request->date));
        $var = ltrim($day, '0');
        $dayfeild  = 'a' . $var;

        $user = $request->user;
        $attendance = $request->attendance;
        $setting = Setting::first();
        $academic_year=AcademicYear::where('name',$setting->academic_year)->pluck('id');

        for ($j = 0; $j < count($user); $j++) {
            $exists = UserAttendance::Where('user', $user[$j])->Where('year', date('Y', strtotime($request->date)))->Where('month', date('m', strtotime($request->date)))->first();
            $department= User::where('id',$user[$j])->first();
            if ($exists) {

                $exists->user = $user[$j];
                $exists->academic_year = $academic_year[0];
                $exists->usertype = $department->usertype;
                $exists->created_user = Auth::user()->id;
                $exists->created_usertype =  Auth::user()->usertype;
                $exists->year = date('Y', strtotime($request->date));
                $exists->month = date('m', strtotime($request->date));
                $exists->$dayfeild = $attendance[$j];
                $exists->update();
            } else {
                $studentattendance = new UserAttendance();
                $studentattendance->user = $user[$j];
                $studentattendance->academic_year =$academic_year[0];
                $studentattendance->usertype = $department->usertype;
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
        $data1 = User::with('usertypename')->with([
            'attendance' => function ($query) use ($date) {
                $year = date('Y', strtotime($date));
                $month = date('m', strtotime($date));
                $day = date('d', strtotime($date));
                $var = ltrim($day, '0');
                $dayfeild  = 'a' . $var;
                // die( $month);
                $query->where('year', $year)->where('month', $month)->where($dayfeild, '!=', null);
            },
        ])
            ->get();

        //   return $data1;
        $day = date('d', strtotime($date));
        $var = ltrim($day, '0');
        $dayfeild  = 'a' . $var;
        $data = [
            'data1' => $data1,
            'dayfeild' =>   $dayfeild,
            'date' =>   $date,
            'active'       => 'auser_list',
        ];
        // return $data1;
        return view('admin.uattendance.add', $data);
        // return redirect('admin/uattendance/add')->withSuccess(' created successfully');
    }
}
