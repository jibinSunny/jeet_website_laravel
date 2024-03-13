<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClassModel;
use App\Models\Country;
use App\Models\Department;
use App\Models\State;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use App\Mail\StudentInviteMail;
use App\Models\Division;
use Validator;

class TeacherController extends Controller
{
    public function showTeacher(Request $request){
        $teachers = Teacher::all();
        $data = array('teachers' => $teachers);
        return view('admin/teacher/index',$data);
    }
    public function newTeacher(Request $request){
        $countries = Country::all();
        $departments = Department::all();
        $subjects = Subject::all();
        $classes = ClassModel::all();
        $data = array('countries' => $countries,
                    'departments' => $departments,
                    'subjects' => $subjects,
                    'classes' => $classes );
        return view('admin/teacher/add',$data);
    }
    public function editTeacher(Request $request){
        if($request->code){
            $teacher = Teacher::where('code', $request->code)->first();
            $countries = Country::all();
            $departments = Department::all();
            $subjects = Subject::where('class',$teacher->classes)->get();
            $classes = ClassModel::all();
            $division = Division::where('class',$teacher->classes)->get();
            $states = State::where('country',$teacher->country)->get();
            $data = array('countries' => $countries,
                        'departments' => $departments,
                        'subjects' => $subjects,
                        'division' => $division,
                        'classes' => $classes,
                        'states' => $states,
                        'teacher' => $teacher );
            return view('admin/teacher/edit',$data);
        }else{
            abort(404);
        }
    }
    public function saveTeacher(Request $request){
        $id = 1;
        if($request->code)
        {

            $rules = [
                'fname'     => 'required',
                'lname'     => 'required',
                'bg'        => 'required',
                'gender'    => 'required',
                'dob'       => 'required',
                'address'   => 'required',
                'email'     => 'required',
                'std_code'  => 'required',
                'phone'     => 'required',
                'country'   => 'required',
                'state'     => 'required',
                'house'     => 'required',
                'post'      => 'required',
                'place'     => 'required',
                'district'  => 'required',
                'nationality' => 'required',
                'place'     => 'required',
                'education' => 'required',
                'doj'       => 'required'
            ];
            $messages = [
                'email.required'    => 'E-mail is invalid'
            ];
            $validator = Validator::make(request()->all(), $rules, $messages);
        }
        else
        {
            $rules = [
                'fname'     => 'required',
                'lname'     => 'required',
                'bg'     => 'required',
                'profile_file'     => 'required',
                'gender'    => 'required',
                'dob'       => 'required',
                'address'   => 'required',
                'email'     => 'required|email|unique:teachers,email,'.$id.',id,deleted_at,NULL',
                'std_code'  => 'required',
                'phone'     => 'required|numeric',
                'country'   => 'required',
                'state'     => 'required',
                'house'     => 'required',
                'post'      => 'required',
                'place'     => 'required',
                'district'  => 'required',
                'nationality' => 'required',
                'place'     => 'required',
                'education' => 'required',
                'doj'       => 'required'
            ];
            $messages = [
                'email.required'    => 'E-mail is invalid'
            ];
            $validator = Validator::make(request()->all(), $rules, $messages);

        }
      

        if (!$validator->passes()) {
            return response()->json(['status' => 0, 'errors' => $validator->errors()->all()]);
        }else{
            if($request->code){
                $teacher = Teacher::where('code',$request->code)->first();
            }else{
                $teacher = new Teacher();
                $code = mt_rand(1000000000, 9999999999);
            }
            if(!$request->code)
            {
            $teacher->code = $code;
            $teacher->active = 1;
            }
            $teacher->first_name = $request->fname;
            $teacher->last_name = $request->lname;
            $teacher->email = $request->email;
            $teacher->phone = $request->std_code."-".$request->phone;
            $teacher->phone2 = $request->std_code2."-".$request->phone2;
            $teacher->gender = $request->gender;
            $teacher->dob = $request->dob;
            $teacher->blood = $request->bg;
            $teacher->address = $request->address;
            $teacher->country = $request->country;
            $teacher->state = $request->state;
            $teacher->district = $request->district;
            $teacher->house = $request->house;
            $teacher->place = $request->place;
            $teacher->post = $request->post;
            $teacher->taluk = $request->taluk;
            $teacher->village = $request->village;
            $teacher->nationality = $request->nationality;
            $teacher->id_card = $request->id_type;
            $teacher->id_number = $request->id_number;
            $id_file_name = '';
            if($request->file('id_file')){
                $path = public_path('user-files/teacher/id_card/'. $code);
                if(!File::isDirectory($path)){
                    File::makeDirectory($path, 0777, true, true);
                }
                $file          = $request->file('id_file');
                $id_file_name  = $file->getClientOriginalName();
                $file->move($path, $id_file_name);
            }
            $teacher->id_file = $id_file_name;
            $teacher->nationality = $request->nationality;
            $teacher->username = $request->email;
            $teacher->visa_number = $request->visa_number;
            $teacher->visa_issued = $request->visa_issued;
            $teacher->visa_expiry = $request->visa_expiry;
            if($request->file('visa_file')){
                $path = public_path('user-files/teacher/visa/'. $code);
                if(!File::isDirectory($path)){
                    File::makeDirectory($path, 0777, true, true);
                }
                $file          = $request->file('visa_file');
                $visa_file_name     = $file->getClientOriginalName();
                $file->move($path, $visa_file_name);
                $teacher->visa_file     = $visa_file_name;
            }
            $teacher->passport_number = $request->passport_number;
            if($request->file('passport_file')){
                $path = public_path('user-files/teacher/passport/'. $code);
                if(!File::isDirectory($path)){
                    File::makeDirectory($path, 0777, true, true);
                }
                $file          = $request->file('passport_file');
                $passport_file_name     = $file->getClientOriginalName();
                $file->move($path, $passport_file_name);
                $teacher->passport_file = $passport_file_name;
            }
            $teacher->education = $request->education;
            $teacher->doj = $request->doj;
            $teacher->department = $request->department;
            $teacher->classes = $request->classes;
            $teacher->subjects = $request->subject;
            $teacher->division = $request->division;
            $teacher->department = $request->department;
            if($request->file('certificate_file')){
                $path = public_path('user-files/teacher/certificate/'. $code);
                if(!File::isDirectory($path)){
                    File::makeDirectory($path, 0777, true, true);
                }
                $file          = $request->file('certificate_file');
                $certificate_file_name     = $file->getClientOriginalName();
                $file->move($path, $certificate_file_name);
                $teacher->passport_file = $certificate_file_name;
            }
            if($request->file('profile_file')){
                $path = public_path('user-files/teacher/profile/'. $code);
                if(!File::isDirectory($path)){
                    File::makeDirectory($path, 0777, true, true);
                }
                $file          = $request->file('profile_file');
                $profile_file_name     = $file->getClientOriginalName();
                $file->move($path, $profile_file_name);
                $teacher->profile_image	 =$code . '/' .$profile_file_name;
            }
            $teacher->usertype = 2;
            $teacher->created_user = Auth::user()->id;
            $teacher->created_usertype = Auth::user()->usertype;
            try{
                $teacher->save();
                return response()->json(['status'=>true,'Message'=>"Successfully added"]);
            }catch(Exception $e){
                print_R($e->getMessage());
                return response()->json(['status'=>false,'errors'=>"Something went wrong"]);
            }
        }
    }
    public function activeTeacher(Request $request) {
        $id     = $request->id;
        $status = $request->status;
        // return response()->json(['stutus'=>'Success']);
        if($id != '' && $status != '') {
            if((int)$id) {
                $teacher = Teacher::where('id',$id)->first();
                    if($status == 'chacked') {
                        $teacher->active =  1;
                        $teacher->save();
                        echo 'Success';
                    } elseif($status == 'unchacked') {
                        $teacher->active =  0;
                        $teacher->save();
                        echo 'Success';
                    } else {
                        echo "Error";
                    }
            } else {
                echo "Error";
            }
        } else {
            echo "Error";
        }
    }
    public function viewTeacher (Request $request,$code){
        $data['teacher'] = Teacher::where('code',$request->code)->first();
        return view('admin/teacher/view',$data);
    }
    public function inviteTeacher(Request $request){
        $code     = $request->code;
        $status = $request->status;
        if($code != '') {
            if((int)$code) {
                $teacher = Teacher::where('code',$code)->first();
                    if($teacher) {
                        try{
                            $token = rand(1001, 9999) . time() . rand(1001, 9999);
                            $teacher->token           = $token;
                            $teacher->save();
                            $resetLink = url("teacher/resetlink/"  . $teacher->email . "/" . $token . "/");
                            $data = array('resetLink' => $resetLink, 'name' => $teacher->first_name, 'email' => $teacher->email);
                            Mail::to($teacher->email)->send(new StudentInviteMail($data));
                            echo 'Success';
                        } catch (\Exception $e) {
                            print_R($e->getMessage());
                            echo "Error";
                        }
                    }else {
                        echo "Error";
                    }
            } else {
                echo "Error";
            }
        } else {
            echo "Error";
        }
    }

}
