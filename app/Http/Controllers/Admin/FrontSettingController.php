<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FrontSetting;
use Illuminate\Http\Request;

class FrontSettingController extends Controller
{
    ###################################    Show Items   ################################################
    public function frontendSettings(Request $request)
    {

        $division_list = FrontSetting::first();
  
        $data = [
            'frontsetting' => $division_list,
            'active'       => 'frontsetting_list',
        ];
        return view('admin.setting.frontend_setting.index', $data);
    }
    ###################################    Save And Update Items   ################################################

    public function updatefrontendSettings(Request $request)
    {

        if ($request->academicyear_id) {

            $inputs = $request->only(['description','facebook','google','twitter','youtube','teacher_email_status','teacher_phone_status','login_menu_status','online_admission_status',]);


            if (FrontSetting::where('id', $request->academicyear_id)->update($inputs)) {
                return redirect('admin/setting/frontend_setting/show')->withSuccess('Front Setting Update successfully');
            }
            return redirect('admin/setting/frontend_setting/show')->withError('Oops Something went wrong!!');
        } 
    }
}
