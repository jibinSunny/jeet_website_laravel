<?php

namespace App\Http\Controllers\parent;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin;

class ParentLoginController extends Controller
{
    // showparentlogin
    public function showParentlogin(Request $request)
    {
        return view('parent/login');
    }
    //parentlogin
    public function Parentlogin(Request $request)
    {

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

        if (auth()->guard('parent')->attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = auth()->guard('parent')->user();
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
