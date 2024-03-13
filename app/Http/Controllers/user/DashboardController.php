<?php

namespace App\Http\Controllers\user;

use App\Models\ClassModel;
use App\Models\ParentModel;
use App\Models\Student;
use App\Models\Teacher;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function showDashboard(Request $request)
    {
        $count_teacher = Teacher::count();
        $count_student = Student::count();
        $count_class = ClassModel::count();
        $count_parents = ParentModel::count();
        $user = Auth::user();
        $user_type_name=UserType::where('id',$user->usertype)->select('name')->first();
        session(['user_type_name' =>$user_type_name]);
        $data = [
            'count_teacher' => $count_teacher,
            'count_student' => $count_student,
            'count_class' => $count_class,
            'count_parents' => $count_parents,
            'user' => $user,

        ];
        return view('user/dashboard/index', $data);
    }
    //  user Profile;
    public function userProfile (Request $request)
    {
        $admin = Auth::user();
        $data = ['admin' => $admin,];
        return view('user/profile', $data);
    }
    // user update Profile 
    public function userupdateProfile(Request $request)
    {
        $admin = User::find($request->id);
        if ($request->file('profile_image')) {

            $path = public_path('user-files/user/profile/' . $admin->code);
            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true, true);
            }
            $file          = $request->file('profile_image');
            $profile_file_name     = $file->getClientOriginalName();
            $file->move($path, $profile_file_name);
            $admin->profile_image = $profile_file_name;
        }
        $admin->first_name = $request->first_name;
        $admin->last_name = $request->last_name;
        $admin->active = $request->active;
        $admin->email = $request->email;
        if ($admin->update()) {
            return redirect('/user/dashboard')->withSuccess('successfully');
        }
        return redirect('/user/dashboard')->withError('Oops Something went wrong!!');
    }

    // user Profile password;
    public function userPassword(Request $request)
    {
        $admin = Auth::user();
        $data = ['admin' => $admin, 'active' => 'admin'];
        return view('user/change_password', $data);
    }
    // update user Password
    public function updateuserPassword(Request $request)
    {

        $inputs['password'] = Hash::make($request->password);
        if (User::where('id', $request->id)->update($inputs)) {
            return redirect('/user/dashboard')->withSuccess('successfully');
        }
        return redirect('/user/dashboard')->withError('Oops Something went wrong!!');
    }
}
