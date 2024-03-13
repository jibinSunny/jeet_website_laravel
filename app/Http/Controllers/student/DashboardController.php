<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use App\Models\ClassModel;
use App\Models\ParentModel;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function showDashboard(Request $request){
          $count_teacher=Teacher::count();
          $count_student=Student::count();
          $count_class=ClassModel::count();
          $count_parents=ParentModel::count();
          $user= Auth::user();
          $data = [   
            'count_teacher' => $count_teacher,
            'count_student' => $count_student,
            'count_class' => $count_class,
            'count_parents' => $count_parents,
            'user' => $user,
          
        ];
        return view('student/dashboard/index',$data);
    }
     //  student Profile;
     public function studentProfile(Request $request)
     {
         $admin = Auth::user();
         $data = ['admin' => $admin, 'active' => 'admin'];
         return view('student/profile', $data);
     }
     // student update Profile 
     public function studentupdateProfile(Request $request)
     {
         $admin = Student::find($request->id);
         if($request->file('profile_image')){
         
            $path = public_path('user-files/student/profile/'. $admin->code);
            if(!File::isDirectory($path)){
                File::makeDirectory($path, 0777, true, true);
            }
            $file          = $request->file('profile_image');
            $profile_file_name     = $file->getClientOriginalName();
            $file->move($path, $profile_file_name);
            $admin->profile_image = $profile_file_name;
        }
        $admin->first_name=$request->first_name;
        $admin->middle_name=$request->middle_name;
        $admin->last_name=$request->last_name;
        $admin->active=$request->active;
        $admin->email=$request->email;
         if ( $admin->update()) {
             return redirect('/student/dashboard')->withSuccess('successfully');
         }
         return redirect('/student/dashboard')->withError('Oops Something went wrong!!');
     }
 
   // student Profile password;
     public function studentPassword(Request $request)
     {
         $admin = Auth::user();
         $data = ['admin' => $admin, 'active' => 'admin'];
         return view('student/change_password', $data);
     }
   // update student Password
     public function updatestudentPassword(Request $request){
     
                 $inputs['password'] = Hash::make($request->password);
                 if(Student::where('id',$request->id)->update($inputs))
                 {
                     return redirect('/student/dashboard')->withSuccess('successfully');
                 }
                 return redirect('/student/dashboard')->withError('Oops Something went wrong!!');
     }   
}
