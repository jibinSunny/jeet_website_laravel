<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\StudentInviteMail;
use App\Models\Art;
use App\Models\Arts_student;
use App\Models\Caste;
use App\Models\ClassModel;
use App\Models\Country;
use App\Models\Department;
use App\Models\Division;
use App\Models\Extracurricular;
use App\Models\Music;
use App\Models\Music_student;
use App\Models\ParentModel;
use App\Models\Religion;
use App\Models\Sport;
use App\Models\Sports_student;
use App\Models\State;
use App\Models\Student;
use App\Models\Student_extra_curricular;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Validator;

class StudentController extends Controller
{
    public function showStudent(Request $request){
        $students = Student::all();
        $data = array('students' => $students);
        return view('admin/student/index',$data);
    }

    public function parentDatails(Request $request){
        $parent_details = ParentModel::where('id',$request->parent_id)->first();
        $data = array('parent_details' => $parent_details);
        return response()->json($data);
        
    }
    public function editStudent (Request $request){
        if($request->code){
            $teacher = Student::where('id', $request->code)->first();
            $parents   = ParentModel::all();
            $arts = Art::all();
            $sports = Sport::all();
            $extracurriclurs = Extracurricular::all();
            $musics = Music::all();
            $religions = Religion::all();
            $castes = Caste::all();
            $divisions = Division::all();
            $countries = Country::all();
            $departments = Department::all();
            $subjects = Subject::where('class',$teacher->classes)->get();
            $classes = ClassModel::all();
            $states = State::where('country',$teacher->country)->get();
            $stduentart=Arts_student::where('students_id',$request->code)->pluck('arts_id')->toArray();
            $stduentmusic=Music_student::where('students_id',$request->code)->pluck('music_id')->toArray();
            $stduentextra=Student_extra_curricular::where('students_id',$request->code)->pluck('extra_curricular_id')->toArray();
            $stduentsport=Sports_student::where('students_id',$request->code)->pluck('sport_id')->toArray();
            $data = array('countries' => $countries,
                        'departments' => $departments,
                        'subjects' => $subjects,
                        'classes' => $classes,
                        'states' => $states,
                        'teacher' => $teacher,
                        'parents' => $parents,
                        'sports' => $sports,
                        'arts' => $arts,
                        'extracurriclurs' => $extracurriclurs,
                        'musics' => $musics,
                        'religions' => $religions,
                        'castes' => $castes,
                        'divisions' => $divisions,
                        'stduentart' => $stduentart,
                        'stduentmusic' => $stduentmusic,
                        'stduentextra' => $stduentextra,
                        'stduentsport' => $stduentsport,
                    );
            return view('admin/student/edit',$data);
        }else{
            abort(404);
        }
    }
    public function newStudent(Request $request){
        $countries = Country::all();
        $parents   = ParentModel::all();
        $arts = Art::all();
        $sports = Sport::all();
        $extracurriclurs = Extracurricular::all();
        $musics = Music::all();
        $religions = Religion::all();
        $castes = Caste::all();
        $classes = ClassModel::all();
        $divisions = Division::all();
        $departments = Department::all();
        $data = array(  'countries' => $countries,
                        'parents' => $parents,
                        'arts' => $arts,
                        'sports' => $sports,
                        'extracurriclurs' => $extracurriclurs,
                        'musics' => $musics,
                        'religions' => $religions,
                        'castes' => $castes,
                        'classes' => $classes,
                        'divisions' => $divisions,
                        'departments' => $departments
                    );
        return view('admin/student/addStudent',$data);
    }
    public function saveStudent(Request $request){
        // return count( $request->curricular);
        if($request->code)
        {
            $rules = [
                'fname'     => 'required',
                'curricular'     => 'required',
                'sports'  => 'required',
                'arts' => 'required',
                'musics'     => 'required'
            ];
            $messages = [
                'email.required'    => 'E-mail is invalid'
            ];
            $validator = Validator::make(request()->all(), $rules, $messages);
        }
        else{
        $rules = [
            'fname'     => 'required',
            'mname'     => 'required',
            'lname'     => 'required',
            'blood'     => 'required',
            'profile_file'     => 'required',
            'gender'    => 'required',
            'dob'       => 'required',
            'parent'    => 'required',
            'address'   => 'required',
            'email'     => 'required|email|unique:teachers,email,NULL,id,deleted_at,NULL',
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
            'fname'     => 'required',
            'curricular'     => 'required',
            'sports'  => 'required',
            'arts' => 'required',
            'musics'     => 'required' ,
        ];
        $messages = [
            'email.required'    => 'E-mail is invalid'
        ];
        $validator = Validator::make(request()->all(), $rules, $messages);
       }
        if (!$validator->passes()) {
            return response()->json(['status' => 0, 'errors' => $validator->errors()->first()]);
        }else{

            if($request->code){
                $student = Student::where('code',$request->code)->first();
            }else{
                $student = new Student();
                $code = mt_rand(1000000000, 9999999999);
                $student->code = $code;
                $student->active = 1;
            }
            $student->parent = $request->parent;
            $student->first_name = $request->fname;
            $student->middle_name = $request->mname;
            $student->last_name = $request->lname;
            $student->gender = $request->gender;
            $student->dob = $request->dob;
            $student->blood = $request->blood;
            $student->address = $request->address;
            $student->phone = $request->std_code."-".$request->phone;
            $student->phone2 = $request->std_code2."-".$request->secondary_phone;
            $student->email = $request->email;
            $student->country = $request->country;
            $student->state = $request->state;
            $student->district = $request->district;
            $student->house = $request->house;
            $student->place = $request->place;
            $student->taluk = $request->taluk;
            $student->village = $request->village;
            $student->post = $request->post;
            $student->nationality = $request->nationality;
            $student->id_card = $request->id_type;
            $student->id_number = $request->id_number;
            $id_file_name = '';
            if($request->file('id_file')){
                $path = public_path('user-files/student/id_card/'. $code);
                if(!File::isDirectory($path)){
                    File::makeDirectory($path, 0777, true, true);
                }
                $file          = $request->file('id_file');
                $id_file_name  = $file->getClientOriginalName();
                $file->move($path, $id_file_name);
            }
            $student->id_file = $id_file_name;
            $student->nationality = $request->nationality;
            $student->username = $request->email;
            $student->visa_number = $request->visa_number;
            $student->visa_issued = $request->visa_issued;
            $student->visa_expiry = $request->visa_expiry;
            if($request->file('visa_file')){
                $path = public_path('user-files/student/visa/'. $code);
                if(!File::isDirectory($path)){
                    File::makeDirectory($path, 0777, true, true);
                }
                $file          = $request->file('visa_file');
                $visa_file_name     = $file->getClientOriginalName();
                $file->move($path, $visa_file_name);
                $student->visa_file     = $visa_file_name;
            }
            $student->passport_number = $request->passport_number;
            if($request->file('passport_file')){
                $path = public_path('user-files/student/passport/'. $code);
                if(!File::isDirectory($path)){
                    File::makeDirectory($path, 0777, true, true);
                }
                $file          = $request->file('passport_file');
                $passport_file_name     = $file->getClientOriginalName();
                $file->move($path, $passport_file_name);
                $student->passport_file = $passport_file_name;
            }
            $student->department = $request->department;
            $student->class = $request->class;
            $student->division = $request->division;
            $student->opt_subject = $request->opt_subject;
            $student->reg_number = $request->reg_number;
            $student->roll_number = $request->roll_number;
            $student->religion = $request->religion;
            $student->physical = $request->physical;
            $student->caste = $request->caste;
            if(!$request->code)
            {
            $c_name = ClassModel::where('id',$request->class)->first()->name;
            $d_name = Division::where('id',$request->division)->first()->name;
            $student_slot=Student::where('class',$request->class)->where('division',$request->division)->count()+1;
            $student->student_id  = date('y').$c_name.$d_name.$student_slot;
            }
            if($request->file('transfer_file')){
                $path = public_path('user-files/student/transfer/'. $code);
                if(!File::isDirectory($path)){
                    File::makeDirectory($path, 0777, true, true);
                }
                $file          = $request->file('transfer_file');
                $certificate_file_name     = $file->getClientOriginalName();
                $file->move($path, $certificate_file_name);
                $student->transfer = $certificate_file_name;
            }
            if($request->file('adhar_file')){
                $path = public_path('user-files/student/adhar_file/'. $code);
                if(!File::isDirectory($path)){
                    File::makeDirectory($path, 0777, true, true);
                }
                $file          = $request->file('adhar_file');
                $certificate_file_name     = $file->getClientOriginalName();
                $file->move($path, $certificate_file_name);
                $student->adhar = $certificate_file_name;
            }
            if($request->file('birth_file')){
                $path = public_path('user-files/student/birth/'. $code);
                if(!File::isDirectory($path)){
                    File::makeDirectory($path, 0777, true, true);
                }
                $file          = $request->file('birth_file');
                $certificate_file_name     = $file->getClientOriginalName();
                $file->move($path, $certificate_file_name);
                $student->birth = $certificate_file_name;
            }
            if($request->file('profile_file')){
                $path = public_path('user-files/student/profile/'. $code);
                if(!File::isDirectory($path)){
                    File::makeDirectory($path, 0777, true, true);
                }
                $file          = $request->file('profile_file');
                $profile_file_name     = $file->getClientOriginalName();
                $file->move($path, $profile_file_name);
                $student->profile_image = $profile_file_name;
            }
            $student->usertype = 3;
            $student->created_user = Auth::user()->id;
            $student->created_usertype = Auth::user()->usertype;
            $student->gov_sub =$request->gov_sub;
            try{
                    if($request->code);
                    {
                        $Userleave = Student_extra_curricular::where('students_id',$student->id)->get();
                        foreach ($Userleave as  $option) {
                            $option->delete();
                        }
                        $Userleave = Arts_student::where('students_id',$student->id)->get();
                        foreach ($Userleave as  $option) {
                            $option->delete();
                        }
                        $Userleave = Music_student::where('students_id',$student->id)->get();
                        foreach ($Userleave as  $option) {
                            $option->delete();
                        }
                        $Userleave = Sports_student::where('students_id',$student->id)->get();
                        foreach ($Userleave as $option) {
                            $option->delete();
                        }
                    }
        
                    for ($j = 0; $j < count($request->curricular); $j++) {
                        $question_option = new Student_extra_curricular();
                        $question_option->extra_curricular_id = $request->curricular[$j];
                        $question_option->students_id = $student->id;
                        $question_option->save();
                    }
                    
                    for ($j = 0; $j < count($request->arts); $j++) {
                        $question_option = new Arts_student();
                        $question_option->arts_id = $request->curricular[$j];
                        $question_option->students_id = $student->id;
                        $question_option->save();
                    }
  
                    for ($j = 0; $j < count($request->musics); $j++) {
                        $question_option = new Music_student();
                        $question_option->music_id = $request->curricular[$j];
                        $question_option->students_id = $student->id;
                        $question_option->save();
                    }
                 
                    for ($j = 0; $j < count($request->sports); $j++) {
                        $question_option = new Sports_student();
                        $question_option->sport_id = $request->curricular[$j];
                        $question_option->students_id = $student->id;
                        $question_option->save();
                    }
                  
                $student->save();
                return response()->json(['status'=>true,'Message'=>"Successfully added"]);
            }catch(\Exception $e){
                return response()->json(['status'=>false,'errors'=>"Something went wrong"]);
            }
        }
    }
    public function viewStudent (Request $request,$code){
        $data['student'] = Student::where('code',$request->code)->first();
        return view('admin/student/view',$data);
    }
    public function inviteStudent(Request $request){
        $code     = $request->code;
        $status = $request->status;
        if($code != '') {
            if((int)$code) {
                $student = Student::where('code',$code)->first();
                    if($student) {
                        try{
                            $token = rand(1001, 9999) . time() . rand(1001, 9999);
                            $student->token           = $token;
                            $student->save();
                            $resetLink = url("student/resetlink/"  . $student->email . "/" . $token . "/");
                            $data = array('resetLink' => $resetLink, 'name' => $student->first_name, 'email' => $student->email);
                            Mail::to($student->email)->send(new StudentInviteMail($data));
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
    public function activeStudent(Request $request) {
        $id     = $request->id;
        $status = $request->status;
        if($id != '' && $status != '') {
            if((int)$id) {
                $student = Student::where('id',$id)->first();
                    if($status == 'chacked') {
                        $student->active =  1;
                        $student->save();
                        echo 'Success';
                    } elseif($status == 'unchacked') {
                        $student->active =  0;
                        $student->save();
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
}
