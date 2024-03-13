<?php

namespace App\Http\Controllers\teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;  
use Illuminate\Support\Facades\Validator;
use App\Models\Admin;

class TeacherLoginController extends Controller
{
  // showStudentlogin
  public function showTeacherlogin(Request $request)
  {

    return view('teacher/login');
  }
  // Studentlogin
  public function Teacherlogin(Request $request)
  {

    $rules = [
      'email'     => 'required',
      'password'    => 'required'
    ];
    $messages = [
      'email.required'    => 'Email is required',
      'password.required'   => 'Password is required',
    ];
    $validator = Validator::make(request()->all(), $rules, $messages);
    if ($validator->fails()) {
      return response()->json(['status' => 0, 'errors' => $validator->errors()->first()]);
    }

    if (auth()->guard('teacher')->attempt(['email' => $request->email, 'password' => $request->password])) {
      $user = auth()->guard('teacher')->user();
      if ($user->active == 1) {
        return response()->json(['status' => true, 'user' => $user]);
      } else {
        Auth::logout();
        return response()->json(['status' => false, 'errors' => ['Your account is blocked by admin ']]);
      }
    } else {
      return response()->json(['status' => 0, 'errors' => ['Invalid Email / Password']]);
    }
  }
}
