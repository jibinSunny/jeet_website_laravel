<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Caste;
use App\Models\Country;
use App\Models\Division;
use App\Models\Setting;
use App\Models\State;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    public function showSetting(Request $request){
        $setting = Setting::first();
        $countries = Country::all();
        if($_POST){
            $setting->site_name = $request->site_name;
            $setting->phone = $request->phone;
            $setting->email = $request->email;
            $setting->address = $request->address;
            $setting->footer = $request->footer;
            $setting->currency_code = $request->currency_code;
            $setting->currency_symbol = $request->currency_symbol;
            $setting->academic_year = $request->academic_year;
            $setting->google_analytics = $request->google_analytics;
            $setting->time_zone = $request->time_zone;
            $setting->graduate_class = $request->graduate_class;
            $setting->default_country = $request->country;
            $logo= '';
            if($request->file('logo')){
                $file               = $request->file('logo');
                $logo               = $file->getClientOriginalName();
                $file->move(public_path('/system-files/settings/logo/'), $logo);
            }
            $setting->logo = $logo;
            $setting->save();
        }
        $data = array('collection' => $setting, 'countries' => $countries );
        return view('admin/setting/showSetting',$data);
    }
    public function selectState(Request $request){
        $country = $request->country;
        $states = State::where('country',$country)->get();
        if($states){
            return response()->json(['status'=>true,'states'=>$states]);
        }else{
            return response()->json(['status'=>false]);
        }
    }
    public function selectDivision(Request $request){
        $class = $request->classes;
        $divisions = Division::where('class',$class)->get();
        if($divisions){
            return response()->json(['status'=>true,'divisions'=>$divisions]);
        }else{
            return response()->json(['status'=>false]);
        }
    }
    public function selectCaste(Request $request){
        $religion = $request->religion;
        $castes = Caste::where('religion',$religion)->get();
        if($castes){
            return response()->json(['status'=>true,'castes'=>$castes]);
        }else{
            return response()->json(['status'=>false]);
        }
    }
    public function selectSubjects(Request $request){
        $class = $request->classes;
        $subjects = Subject::where('class',$class)->get();
        if($subjects){
            return response()->json(['status'=>true,'subjects'=>$subjects]);
        }else{
            return response()->json(['status'=>false]);
        }
    }
    public function selectStudents(Request $request){
        $class = $request->class_name;
        $division = $request->division;
        $students = Student::where('class',$class)->where('division',$division)->get();
        if($students){
            return response()->json(['status'=>true,'students'=>$students]);
        }else{
            return response()->json(['status'=>false]);
        }
    }
    public function selectUsers(Request $request){
        $usertype = $request->usertype;
        if($usertype == 2){
            $users = Teacher::get();
        }else{
            $users = User::get();
        }
        if($users){
            return response()->json(['status'=>true,'users'=>$users]);
        }else{
            return response()->json(['status'=>false]);
        }
    }
}
