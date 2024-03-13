<?php

namespace App\Http\Controllers\user;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserLoginController extends Controller
{
    // showStudentlogin
  public function showUserlogin (Request $request)
  {

    return view('user/login');
  }
  // Studentlogin
  public function Userlogin (Request $request)
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

    if (auth()->guard('user')->attempt(['email' => $request->email, 'password' => $request->password])) {
      $user = auth()->guard('user')->user();
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
