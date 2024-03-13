<?php

namespace App\Http\Controllers\student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;  
use Illuminate\Support\Facades\Validator;
use App\Models\Admin;
use Illuminate\Support\Facades\Session;
class StudentLoginController extends Controller
{
    use AuthenticatesUsers;
    // showStudentlogin
    public function showStudentlogin(Request $request){
        return view('student/login');
    }
    // showStudentlogout
      public function showStudentlogout(Request $request){
        Auth::logout();
        Session::flush();
        return redirect('student/login');
    }
  // Studentlogin
  public function Studentlogin(Request $request){

    // return $request->all();
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

        if(auth()->guard('student')->attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = auth()->guard('student')->user();
            if($user->active == 1){
                return response()->json(['status'=>true,'user'=>$user]);
            }else{
                Auth::logout();
                return response()->json(['status'=>false,'errors'=>['Your account is blocked by admin ']]);
            }
        } else {
            return response()->json(['status' => 0, 'errors' => ['Invalid Email / Password']]);
        }
    }
}
