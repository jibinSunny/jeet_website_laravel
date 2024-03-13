<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AcademicYear;
use App\Models\ClassModel;
use App\Models\Division;
use App\Models\Setting;
use App\Models\Student;
use App\Models\Students_old_record;
use App\Models\Subject;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use \PDF;

class PremotionController extends Controller
{
   ################################### class Report index   ################################################
   public function showPremotion(Request $request)
   {

      $classes = ClassModel::orderBy('created_at', 'DESC')->get();
      $academic_year = AcademicYear::orderBy('created_at', 'DESC')->get();
      return view('admin.promotion.index')
         ->with(['classes' => $classes])
         ->with(['academic_year' => $academic_year])
         ->with(['active' => 'premotionlist']);
   }

   ################################### class Report show   ################################################
   public function studentPremotion(Request $request)
   {

      if ($request->division) {
         $query = Division::where('id', $request->division)->first();
         $query1 = ClassModel::where('id', $request->select_class)->first();
         $query2 = Student::where('division', $request->division)->with('classname', 'divisions')->get();
      }

      $data = [
         'division_details' =>  $query,
         'class_details' =>  $query1,
         'student_details' =>  $query2,

      ];
      return response()->json($data);
   }
   ################################### save Premotion   ################################################
   public function savestudentPremotion(Request $request)
   {

      $std_id = explode(",", $request->std_id);
      if (!$request->std_id) {
         return redirect('admin/premotion/index')->withErrors(['name' => 'Please Select Students!!']);
      } else {
         if ($request->promotion_type == "1") {
            $old_student = Student::whereIn('id', $std_id)->get();
            $setting = Setting::first();
            $academic_year = AcademicYear::where('name', $setting->academic_year)->first();
            for ($j = 0; $j < count($old_student); $j++) {
               $students_old_record = new Students_old_record();
               $students_old_record->code = $old_student[$j]->code;
               $students_old_record->place = $old_student[$j]->place;
               $students_old_record->first_name =  $old_student[$j]->first_name;
               $students_old_record->middle_name =  $old_student[$j]->middle_name;
               $students_old_record->last_name =  $old_student[$j]->last_name;
               $students_old_record->gender = $old_student[$j]->gender;
               $students_old_record->dob = $old_student[$j]->dob;
               $students_old_record->blood = $old_student[$j]->blood;
               $students_old_record->address = $old_student[$j]->address;
               $students_old_record->phone = $old_student[$j]->phone;
               $students_old_record->phone2 = $old_student[$j]->phone2;
               $students_old_record->email = $old_student[$j]->email;
               $students_old_record->country = $old_student[$j]->country;
               $students_old_record->state = $old_student[$j]->state;
               $students_old_record->district = $old_student[$j]->district;
               $students_old_record->house = $old_student[$j]->house;
               $students_old_record->house = $old_student[$j]->house;
               $students_old_record->post = $old_student[$j]->post;
               $students_old_record->nationality = $old_student[$j]->nationality;
               $students_old_record->id_card = $old_student[$j]->id_card;
               $students_old_record->id_number = $old_student[$j]->id_number;
               $students_old_record->id_file = $old_student[$j]->id_file;
               $students_old_record->nationality = $old_student[$j]->nationality;
               $students_old_record->username = $old_student[$j]->username;
               $students_old_record->visa_number = $old_student[$j]->visa_number;
               $students_old_record->visa_issued = $old_student[$j]->visa_issued;
               $students_old_record->visa_expiry = $old_student[$j]->visa_expiry;
               $students_old_record->visa_file     = $old_student[$j]->visa_file;
               $students_old_record->passport_number = $old_student[$j]->passport_number;
               $students_old_record->passport_file = $old_student[$j]->passport_file;
               $students_old_record->department = $old_student[$j]->department;
               $students_old_record->class = $old_student[$j]->class;
               $students_old_record->division = $old_student[$j]->division;
               $students_old_record->opt_subject = $old_student[$j]->opt_subject;
               $students_old_record->reg_number = $old_student[$j]->reg_number;
               $students_old_record->roll_number = $old_student[$j]->roll_number;
               $students_old_record->student_id = $old_student[$j]->student_id;
               $students_old_record->profile_image = $old_student[$j]->profile_image;
               $students_old_record->certificate = $old_student[$j]->certificate;
               $students_old_record->usertype = 3;
               $students_old_record->active = 1;
               $students_old_record->promotion_type = $request->promotion_type;
               $students_old_record->created_user = Auth::user()->id;
               $students_old_record->created_usertype =  Auth::user()->usertype;
               $students_old_record->academic_year_id = $academic_year->id;
               $students_old_record->save();
               // $this->Student_tc($old_student[$j]);
               $data = ['array' => $old_student[$j]];
               $pdf = PDF::loadView('pdf/student_tc',$data)->setPaper('a4','landscape');
               $path = public_path('uploads/student_tc/');
               $fileName =  $old_student[$j]->code.'.pdf' ;
               $pdf->save($path . '/' . $fileName);
               
               $pdf->download($fileName);
               exit;
               $old_student[$j]->delete(); 
            }
            return redirect('admin/premotion/index')->withSuccess('successfully');
         } else {
            $division_data = Division::where('id', $request->division1)->first();
            if ($division_data->capacity < count($std_id)) {
               return redirect('admin/premotion/index')->withErrors(['name' => 'Your Selected Students Count is Over Than Class Division Capacity!!']);
            } else {
               $old_student = Student::whereIn('id', $std_id)->get();
               $setting = Setting::first();
               $academic_year = AcademicYear::where('name', $setting->academic_year)->first();
               for ($j = 0; $j < count($old_student); $j++) {
                  $students_old_record = new Students_old_record();
                  $students_old_record->code = $old_student[$j]->code;
                  $students_old_record->place = $old_student[$j]->place;
                  $students_old_record->first_name =  $old_student[$j]->first_name;
                  $students_old_record->middle_name =  $old_student[$j]->middle_name;
                  $students_old_record->last_name =  $old_student[$j]->last_name;
                  $students_old_record->gender = $old_student[$j]->gender;
                  $students_old_record->dob = $old_student[$j]->dob;
                  $students_old_record->blood = $old_student[$j]->blood;
                  $students_old_record->address = $old_student[$j]->address;
                  $students_old_record->phone = $old_student[$j]->phone;
                  $students_old_record->phone2 = $old_student[$j]->phone2;
                  $students_old_record->email = $old_student[$j]->email;
                  $students_old_record->country = $old_student[$j]->country;
                  $students_old_record->state = $old_student[$j]->state;
                  $students_old_record->district = $old_student[$j]->district;
                  $students_old_record->house = $old_student[$j]->house;
                  $students_old_record->house = $old_student[$j]->house;
                  $students_old_record->post = $old_student[$j]->post;
                  $students_old_record->nationality = $old_student[$j]->nationality;
                  $students_old_record->id_card = $old_student[$j]->id_card;
                  $students_old_record->id_number = $old_student[$j]->id_number;
                  $students_old_record->id_file = $old_student[$j]->id_file;
                  $students_old_record->nationality = $old_student[$j]->nationality;
                  $students_old_record->username = $old_student[$j]->username;
                  $students_old_record->visa_number = $old_student[$j]->visa_number;
                  $students_old_record->visa_issued = $old_student[$j]->visa_issued;
                  $students_old_record->visa_expiry = $old_student[$j]->visa_expiry;
                  $students_old_record->visa_file     = $old_student[$j]->visa_file;
                  $students_old_record->passport_number = $old_student[$j]->passport_number;
                  $students_old_record->passport_file = $old_student[$j]->passport_file;
                  $students_old_record->department = $old_student[$j]->department;
                  $students_old_record->class = $old_student[$j]->class;
                  $students_old_record->division = $old_student[$j]->division;
                  $students_old_record->opt_subject = $old_student[$j]->opt_subject;
                  $students_old_record->reg_number = $old_student[$j]->reg_number;
                  $students_old_record->roll_number = $old_student[$j]->roll_number;
                  $students_old_record->student_id = $old_student[$j]->student_id;
                  $students_old_record->profile_image = $old_student[$j]->profile_image;
                  $students_old_record->certificate = $old_student[$j]->certificate;
                  $students_old_record->usertype = 3;
                  $students_old_record->active = 1;
                  $students_old_record->promotion_type = $request->promotion_type;
                  $students_old_record->created_user = Auth::user()->id;
                  $students_old_record->created_usertype =  Auth::user()->usertype;
                  $students_old_record->academic_year_id = $academic_year->id;
                  $students_old_record->save();

                  $inputs['created_user'] = Auth::user()->id;
                  $inputs['created_usertype'] = Auth::user()->usertype;
                  $inputs['class'] = $request->class1;
                  $inputs['division'] = $request->division1;
                  $inputs['academic_year_id'] = $request->academic_year;
                  Student::where('id', $old_student[$j]->id)->update($inputs);
               }
               return redirect('admin/premotion/index')->withSuccess('successfully');
            }
         }
      }
   }

   public function Student_tc($data)
   {
          $data = ['array' => $data];
          $pdf = PDF::loadView('pdf/student_tc',$data)
          ->setPaper('a4','landscape');
          return $pdf->download('student_tc.pdf');
  }
}
