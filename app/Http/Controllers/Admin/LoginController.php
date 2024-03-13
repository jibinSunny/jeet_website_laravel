<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    protected $guard = 'admin';
    protected $redirectTo = '/login';
    public function __construct(){
        $this->middleware('guest')->except('logout');
    }
    public function showLogin(Request $request){
            $locale = App::getLocale();
            return view('admin/login');
    }
    public function logout(Request $request){
          Auth::logout();
          Session::flush();
          return redirect('admin/login');
    }
    public function adminLogin(Request $request){
        $rules = [
            'email'     => 'required',
            'password'    => 'required'
        ];
        $messages = [
            'email.required'    => 'Email is required',
            'password.required'   => 'Password is required',
        ];
        $validator = Validator::make(request()->all(), $rules, $messages);
        if (!$validator->passes()) {
            return response()->json(['status' => 0, 'errors' => $validator->errors()->first()]);
        }

        if(auth()->guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = auth()->guard('admin')->user();
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
