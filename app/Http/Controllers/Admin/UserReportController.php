<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Admin\UserTypeController;
use App\Http\Controllers\Controller;
use App\Models\ClassModel;
use App\Models\Division;
use App\Models\User;
use App\Models\UserType;
use Illuminate\Http\Request;

class UserReportController extends Controller
{
          ################################### user Report index   ################################################
          public function userReport(Request $request)
          {
           
                  $usertype = UserType::orderBy('created_at', 'DESC')->get();
                  $items = new User();
                  if (isset($request->user_type)) {
                      $items=$items->where('usertype',$request->user_type);
                  }
                  return view('admin.report.general_report.user.index', ['all_report_users' => $items->with('usertypename')->orderBy('created_at', 'DESC')->get(),
                  'usertype' => $usertype, 
                  'active' => 'user_report_list', 
                  'usertype_id' => $request->user_type]);
          }
    
          ################################### user Report view   ################################################
          public function viewuserReport(Request $request)
          {
    
            $data['teacher'] = User::with('usertypename')->where('code',$request->code)->first();
            $data['active'] ="user_report_list";
            return view('admin.report.general_report.user.view',$data);
          }
}
