<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\StudentInviteMail;
use App\Models\ClassModel;
use App\Models\Country;
use App\Models\Department;
use App\Models\Designation;
use App\Models\Privilege;
use App\Models\State;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\User;
use App\Models\UserPrivilege;
use App\Models\UserType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Validator;

class UserController extends Controller
{
    public function showUser(Request $request){
        $user = User::orderBy('created_at', 'DESC')->with('usertypename')->get();
        foreach ($user as  $user1) {
            $user1->privilege=UserPrivilege::where('user',$user1->id)->with('privilegename')->get();
        } 
        // return count($user[0]->privilege);
        $data = array('user' => $user);
        
        return view('admin/user/index',$data);
    }
    public function addUser(Request $request){
        $countries = Country::all();
        $privilege = Privilege::get();
        $designation = UserType::all();
        $data = array('countries' => $countries,
                    'designation' => $designation,
                    'privilege' => $privilege,);
        return view('admin/user/add',$data);
    }
    public function saveUser(Request $request){

        if ($request->academicyear_id) {
            $user = User::where('id', $request->academicyear_id)->first();
            // $code = mt_rand(1000000000, 9999999999);
            // $user->code = $user->code;
            $user->first_name = $request->fname;
            $user->last_name = $request->lname;
            $user->email = $request->email;
            $user->phone = $request->std_code."-".$request->phone;
            $user->phone2 = $request->std_code2."-".$request->phone2;
            $user->gender = $request->gender;
            $user->dob = $request->dob;
            $user->blood = $request->bg;
            $user->address = $request->address;
            $user->country = $request->country;
            $user->state = $request->state;
            $user->district = $request->district;
            $user->house = $request->house;
            $user->place = $request->place;
            $user->post = $request->post;
            $user->taluk = $request->taluk;
            $user->village = $request->village;
            $user->nationality = $request->nationality;
            $user->id_card = $request->id_type;
            $user->id_number = $request->id_number;
            $user->privilege = json_encode($request->privilege);
            $id_file_name = '';
            if($request->file('id_file')){
                $path = public_path('user-files/user/id_card/'. $user->code);
                if(!File::isDirectory($path)){
                    File::makeDirectory($path, 0777, true, true);
                }
                $file          = $request->file('id_file');
                $id_file_name  = $file->getClientOriginalName();
                $file->move($path, $id_file_name);
            }
            $user->id_file = $id_file_name;
            $user->nationality = $request->nationality;
            $user->username = $request->email;
            $user->visa_number = $request->visa_number;
            $user->visa_issued = $request->visa_issued;
            $user->visa_expiry = $request->visa_expiry;
            if($request->file('visa_file')){
                $path = public_path('user-files/user/visa/'. $user->code);
                if(!File::isDirectory($path)){
                    File::makeDirectory($path, 0777, true, true);
                }
                $file          = $request->file('visa_file');
                $visa_file_name     = $file->getClientOriginalName();
                $file->move($path, $visa_file_name);
                $user->visa_file     = $visa_file_name;
            }
            $user->passport_number = $request->passport_number;
            if($request->file('passport_file')){
                $path = public_path('user-files/user/passport/'. $user->code);
                if(!File::isDirectory($path)){
                    File::makeDirectory($path, 0777, true, true);
                }
                $file          = $request->file('passport_file');
                $passport_file_name     = $file->getClientOriginalName();
                $file->move($path, $passport_file_name);
                $user->passport_file = $passport_file_name;
            }
            $user->education = $request->education;
            $user->usertype =  $request->user_type;
            if($request->file('certificate_file')){
                $path = public_path('user-files/user/certificate/'. $user->code);
                if(!File::isDirectory($path)){
                    File::makeDirectory($path, 0777, true, true);
                }
                $file          = $request->file('certificate_file');
                $certificate_file_name     = $file->getClientOriginalName();
                $file->move($path, $certificate_file_name);
                $user->certificate = $certificate_file_name;
            }
            if($request->file('profile_file')){
                $path = public_path('user-files/user/profile/'.$user->code);
                if(!File::isDirectory($path)){
                    File::makeDirectory($path, 0777, true, true);
                }
                $file          = $request->file('profile_file');
                $profile_file_name     = $file->getClientOriginalName();
                $file->move($path, $profile_file_name);
                $user->profile_image	 =$user->codes . '/' .$profile_file_name;
            }
            $user->created_user = Auth::user()->id;
            $user->created_usertype = Auth::user()->usertype;
            $user->active = 1;
            if ($user->update()) {
                $Userleave = UserPrivilege::where('user',$request->academicyear_id)->get();
                foreach ($Userleave as  $option) {
                    $option->delete();
                } 
                foreach ($request->privilege as $id) {
                    $existence_count = UserPrivilege::where('privilege',$request->id)->where('user',$request->academicyear_id)->count();
                    if($existence_count > 0){
                        continue;
                    }else{
                        $zonetomanager = UserPrivilege::insert([
                            'user'       => $request->academicyear_id,
                            'privilege'               => $id,
                            'created_user'       => Auth::user()->id,
                            'created_usertype'   =>  Auth::user()->usertype,
                        ]);   
                    }
                }
                return redirect('admin/user/index')->withSuccess('Syllabus Update successfully');
            }
            return redirect('admin/user/index')->withError('Oops Something went wrong!!');
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
                    'email'     => 'required|email|unique:users,email,NULL,id,deleted_at,NULL',
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
                    'privilege' => 'required'
                ];
                $messages = [
                    'email.required'    => 'E-mail is invalid'
                ];
                $validator = Validator::make(request()->all(), $rules, $messages);
                if (!$validator->passes()) {
                    return response()->json(['status' => 0, 'errors' => $validator->errors()->first()]);
                }else{
                $user = new User();
                $code = mt_rand(1000000000, 9999999999);
                $user->code = $code;
                $user->first_name = $request->fname;
                $user->last_name = $request->lname;
                $user->email = $request->email;
                $user->phone = $request->std_code."-".$request->phone;
                $user->phone2 = $request->std_code2."-".$request->phone2;
                $user->gender = $request->gender;
                $user->dob = $request->dob;
                $user->blood = $request->bg;
                $user->address = $request->address;
                $user->country = $request->country;
                $user->state = $request->state;
                $user->district = $request->district;
                $user->house = $request->house;
                $user->place = $request->place;
                $user->post = $request->post;
                $user->taluk = $request->taluk;
                $user->village = $request->village;
                $user->nationality = $request->nationality;
                $user->id_card = $request->id_type;
                $user->id_number = $request->id_number;
                $user->privilege = json_encode($request->privilege);
                $id_file_name = '';
                if ($request->file('id_file')) {
                    $path = public_path('user-files/user/id_card/'. $code);
                    if (!File::isDirectory($path)) {
                        File::makeDirectory($path, 0777, true, true);
                    }
                    $file          = $request->file('id_file');
                    $id_file_name  = $file->getClientOriginalName();
                    $file->move($path, $id_file_name);
                }
                $user->id_file = $id_file_name;
                $user->nationality = $request->nationality;
                $user->username = $request->email;
                $user->visa_number = $request->visa_number;
                $user->visa_issued = $request->visa_issued;
                $user->visa_expiry = $request->visa_expiry;
                if ($request->file('visa_file')) {
                    $path = public_path('user-files/user/visa/'. $code);
                    if (!File::isDirectory($path)) {
                        File::makeDirectory($path, 0777, true, true);
                    }
                    $file          = $request->file('visa_file');
                    $visa_file_name     = $file->getClientOriginalName();
                    $file->move($path, $visa_file_name);
                    $user->visa_file     = $visa_file_name;
                }
                $user->passport_number = $request->passport_number;
                if ($request->file('passport_file')) {
                    $path = public_path('user-files/user/passport/'. $code);
                    if (!File::isDirectory($path)) {
                        File::makeDirectory($path, 0777, true, true);
                    }
                    $file          = $request->file('passport_file');
                    $passport_file_name     = $file->getClientOriginalName();
                    $file->move($path, $passport_file_name);
                    $user->passport_file = $passport_file_name;
                }
                $user->education = $request->education;
                $user->usertype = $request->user_type;
                if ($request->file('certificate_file')) {
                    $path = public_path('user-files/user/certificate/'. $code);
                    if (!File::isDirectory($path)) {
                        File::makeDirectory($path, 0777, true, true);
                    }
                    $file          = $request->file('certificate_file');
                    $certificate_file_name     = $file->getClientOriginalName();
                    $file->move($path, $certificate_file_name);
                    $user->certificate = $certificate_file_name;
                }
                if ($request->file('profile_file')) {
                    $path = public_path('user-files/user/profile/'. $code);
                    if (!File::isDirectory($path)) {
                        File::makeDirectory($path, 0777, true, true);
                    }
                    $file          = $request->file('profile_file');
                    $profile_file_name     = $file->getClientOriginalName();
                    $file->move($path, $profile_file_name);
                    $user->profile_image	 =$code . '/' .$profile_file_name;
                }
                $user->created_user = Auth::user()->id;
                $user->created_usertype = Auth::user()->usertype;
                $user->active = 1;
                try {
                    $user->save();
                    foreach ($request->privilege as $id) {
                        $myid = $user->id;
                        $existence_count = UserPrivilege::where('privilege',$request->id)->where('user',$myid)->count();
                        if($existence_count > 0){
                            continue;
                        }else{
                            $zonetomanager = UserPrivilege::insert([
                                'user'       => $myid,
                                'privilege'   => $id,
                                'created_user'       => Auth::user()->id,
                                'created_usertype'   =>  Auth::user()->usertype,
                            ]);   
                        }
                    }
                    return response()->json(['status'=>true,'Message'=>"Successfully added"]);
                } catch (Exception $e) {
                    print_R($e->getMessage());
                    return response()->json(['status'=>false,'errors'=>"Something went wrong"]);
                }
            }

        }
    }
     ###################################    Edit Items   ################################################
          public function editUser  ($code)
          {
              $user = User::where('code', $code)->first();
              $countries = Country::all();
              $privilege = Privilege::get();
              $state = State::all();
              $designation = UserType::all();
              $data = [
                'countries' => $countries,
                'state' => $state,
                'designation' => $designation,
                'user_list' => $user,
                'privilege' => $privilege,
              ];
        
             return view('admin/user/edit',$data);
          }

    ###################################    Delete Items   ################################################
    public function activeuser(Request $request) {
        $id     = $request->id;
        $status = $request->status;
        // return response()->json(['stutus'=>'Success']);
        if($id != '' && $status != '') {
            if((int)$id) {
                $user = User::where('id',$id)->first();
                    if($status == 'chacked') {
                        $user->active =  1;
                        $user->save();
                        echo 'Success';
                    } elseif($status == 'unchacked') {
                        $user->active =  0;
                        $user->save();
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
    public function viewUser (Request $request,$code){
        $data['user'] = User::where('code',$request->code)->first();
        return view('admin/user/view',$data);
    }
    public function inviteUser(Request $request){
        $code     = $request->code;
        if($code != '') {
            if((int)$code) {
                $user = user::where('code',$code)->first();
                    if($user) {
                        try{
                            $token = rand(1001, 9999) . time() . rand(1001, 9999);
                            $user->token           = $token;
                            $user->save();
                            $resetLink = url("user/resetlink/"  . $user->email . "/" . $token . "/");
                            $data = array('resetLink' => $resetLink, 'name' => $user->first_name, 'email' => $user->email);
                            Mail::to($user->email)->send(new StudentInviteMail($data));
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
