<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClassModel;
use App\Models\Division;
use App\Models\Payment;
use App\Models\Posting;
use App\Models\Student;
use App\Models\StudentAccount;
use Illuminate\Http\Request;

class BillingController extends Controller
{
    public function showBilling(Request $request){
        $class = $request->class;
        $division = $request->division;
        $student_id = $request->student_id;
        $phone = $request->phone;
        $divisions = array();
        $query = StudentAccount::query();
        if($class){
            $query->where(function ($sub1) use ($class){
                $sub1->where('class',$class);
            });
        }
        if($division){
            $query->where(function ($sub1) use ($division){
                $sub1->where('division',$division);
            });
        }
        if($phone){
            $students = Student::select('id')->where('phone','LIKE', '%' . $phone . '%')->orWhere('phone2','LIKE', '%' . $phone . '%')->get()->toArray();
            if($students){
                $query->where(function ($sub1) use ($students){
                    $sub1->whereIn('student',$students);
                });
            }else{
                $query->where(function ($sub1) use ($students){
                    $sub1->where('student',0);
                });
            }
        }
        if($student_id){
            $student = Student::where('student_id',$student_id)->first();
            if($student){
                $sid = $student->id;
            }else{
                $sid = 0;
            }
            $query->where(function ($sub1) use ($sid){
                $sub1->where('student',$sid);
            });
        }
        $studentAccounts = $query->get();
        if($class){
            $query->where(function ($sub1) use ($class){
                $sub1->where('class',$class);
            });
        }
        $classes = ClassModel::all();
        if($class){
            $divisions = Division::where('class',$class)->get();
        }
        $data = array(  'studentAccounts' => $studentAccounts,
                        'classes' => $classes,
                        'divisions' => $divisions,
                        'class' =>$class,
                        'division' => $division,
                        'student_id' => $student_id,
                        'phone' => $phone );
        return view('admin/billing/index',$data);
    }
    public function showPayment(Request $request, $studentCode){
        $studentCode = $studentCode;
        $student = Student::where('code',$studentCode)->first();
        $postings = Posting::where('student',$student->id)->where('payment_status',0)->get();
        $studentAccounts = StudentAccount::where('student',$student->id)->first();
        $payments = Payment::where('student',$student->id)->get();
        $data = array(  'studentAccounts' => $studentAccounts,
                        'student' => $student,
                        'postings' => $postings,
                        'payments' => $payments );
        return view('admin/billing/showPayment',$data);
    }
    public function addAdvance(Request $request){
        $studentCode = $request->student_code;
        $student = Student::where('code',$studentCode)->first();
        $student->advance = $student->advance+$request->adv_amt;
        $date = $request->adv_date;
        $student->save();
        return response()->json(['status'=>true]);
    }
    public function addDeposit(Request $request){
        $studentCode = $request->student_code;
        $student = Student::where('code',$studentCode)->first();
        $student->deposit = $student->deposit+$request->deposit_amt;
        $date = $request->deposit_date;
        $student->save();
        return response()->json(['status'=>true]);
    }
}
