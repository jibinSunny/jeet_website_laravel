<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HourlyTemplate;
use App\Models\UserType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HourlyTemplateController extends Controller
{
    public function showHourlyTemplate(Request $request){
        $usertypes = UserType::orderBy('created_at','DESC')->get();
        $hourly_templates = HourlyTemplate::orderBy('created_at','DESC')->get();
        $data = array('usertypes' => $usertypes,
                    'hourly_templates' => $hourly_templates);
        return view('admin/hourly_template/index',$data);
    }
    public function addHourlyTemplate(Request $request){
        $usertypes = UserType::orderBy('created_at','DESC')->get();
        $data = array('usertypes' => $usertypes);
        return view('admin/hourly_template/add', $data);
    }
    public function saveHourlyTemplate(Request $request){
        if($request->code){
            $salary = HourlyTemplate::where('code',$request->code)->first();
        }else{
            $salary = new HourlyTemplate();
            $code = mt_rand(1000000000, 9999999999);
            $salary->code = $code;
            if($request->usertype == 2){
                $salary->teacher = $request->user;
            }else{
                $salary->user = $request->user;
            }
            $salary->usertype = $request->usertype;
            $salary->grade = $request->hourly_grades;
            $salary->amount = $request->hourly_rate;
            $salary->created_user = Auth::user()->id;
            $salary->created_usertype = Auth::user()->usertype;
            try{
                $salary->save();
                return redirect('admin/salary/template/hourly')->withSuccess('Success');
            }catch(Exception $e){
                // print_R($e->getMessage());
                return redirect('admin/salary/template/hourly')->withError('Oops Something went wrong!!');
            }
        }
    }
    public function editHourlyTemplate(Request $request){
        $usertypes = UserType::orderBy('created_at','DESC')->get();
        $data = array('usertypes' => $usertypes);
        return view('admin/hourly_template/add', $data);
    }
}
