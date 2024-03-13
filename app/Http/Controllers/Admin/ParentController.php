<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\StudentInviteMail;
use App\Models\Country;
use App\Models\ParentModel;
use App\Models\State;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Validator;

class ParentController extends Controller
{
    protected $table = 'parents';

    public function showParent(Request $request){
        $parents = ParentModel::all();
        $data = array('parents' => $parents);
        return view('admin/parent/index',$data);
    }
    public function newParent(Request $request){
        $countries = Country::all();
        $data = array('countries' => $countries);
        return view('admin/parent/add',$data);
    }
    public function editParent(Request $request){
        if($request->code){
            $teacher = ParentModel::where('code', $request->code)->first();
            $countries = Country::all();
            $states = State::where('country',$teacher->country)->get();
            // return $teacher;
            $data = array('countries' => $countries,
                        'states' => $states,
                        'teacher' => $teacher );
            return view('admin/parent/edit',$data);
        }else{
            abort(404);
        }
    }
    public function saveParent(Request $request){
        $rules = [
            'fname'     => 'required',
            'lname'    => 'required',
            'email'     => 'required|email',
            'std_code'    => 'required',
            'phone'     => 'required|numeric',
            'country'    => 'required',
            'state'     => 'required',
            'house'    => 'required',
            'post'     => 'required',
            'place'    => 'required',
            'district'    => 'required',
            'nationality'     => 'required',
            'place'    => 'required'
        ];
        $messages = [
            'email.required'    => 'E-mail is invalid'
        ];
        $validator = Validator::make(request()->all(), $rules, $messages);
        if (!$validator->passes()) {
            return response()->json(['status' => 0, 'errors' => $validator->errors()->first()]);
        }else{
            if($request->code){
                $parent = ParentModel::where('code',$request->code)->first();
            }else{
                $parent = new ParentModel();
                $code = mt_rand(1000000000, 9999999999);
            }
            if(!$request->code){
            $parent->code = $code;
            $parent->active = 1;
            }
            $parent->first_name = $request->fname;
            $parent->last_name = $request->lname;
            $parent->phone = $request->std_code."-".$request->phone;
            $parent->phone2 = $request->std_code2."-".$request->secondary_phone;
            $parent->landline = $request->landline;
            $parent->email = $request->email;
            $parent->country = $request->country;
            $parent->state = $request->state;
            $parent->district = $request->district;
            $parent->house_name = $request->house;
            $parent->place = $request->place;
            $parent->zip = $request->post;
            $parent->nationality = $request->nationality;
            $parent->id_type = $request->id_type;
            $parent->id_number = $request->id_number;
            if($request->file('id_file')){
                $path = public_path('user-files/parent/'. $code);
                if(!File::isDirectory($path)){
                    File::makeDirectory($path, 0777, true, true);
                }
                $file          = $request->file('id_file');
                $file_name     = $file->getClientOriginalName();
                $file->move($path, $file_name);
                $parent->id_file = $file_name;
            }
           
            $parent->annual_income = $request->annual_income;
            $parent->username = $request->email;
            $parent->usertype = 4;
            $parent->created_user = Auth::user()->id;
            $parent->created_usertype = Auth::user()->usertype;
            try{
                // return "sdvgf";
                $parent->save();
                return response()->json(['status'=>true,'Message'=>"Successfully added"]);
            }catch(Exception $e){
                // print_R($e->getMessage());
                return response()->json(['status'=>false,'errors'=>"Something went wrong"]);
            }
        }
    }
    public function activeParent(Request $request) {
        $id     = $request->id;
        $status = $request->status;
        // return response()->json(['stutus'=>'Success']);
        if($id != '' && $status != '') {
            if((int)$id) {
                $parent = ParentModel::where('id',$id)->first();
                    if($status == 'chacked') {
                        $parent->active =  1;
                        $parent->save();
                        echo 'Success';
                    } elseif($status == 'unchacked') {
                        $parent->active =  0;
                        $parent->save();
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
    public function viewParent (Request $request,$code){
        $data['parent'] = ParentModel::where('code',$request->code)->first();
        return view('admin/parent/view',$data);
    }
    public function inviteParent(Request $request){
        $code     = $request->code;
        $status = $request->status;
        if($code != '') {
            if((int)$code) {
                $parent = ParentModel::where('code',$code)->first();
                    if($parent) {
                        try{
                            $token = rand(1001, 9999) . time() . rand(1001, 9999);
                            $parent->token           = $token;
                            $parent->save();
                            $resetLink = url("parent/resetlink/"  . $parent->email . "/" . $token . "/");
                            $data = array('resetLink' => $resetLink, 'name' => $parent->first_name, 'email' => $parent->email);
                            Mail::to($parent->email)->send(new StudentInviteMail($data));
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
