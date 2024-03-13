<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\PaymentPosting;
use App\Models\Posting;
use App\Models\Setting;
use App\Models\Student;
use App\Models\StudentAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function addPayment(Request $request){
        $payment_type = $request->payment_type;
        $cheque_number = $request->cheque_number;
        $discount = $request->discount;
        $total = $request->total;
        $studentCode = $request->student_code;
        $student = Student::where('code',$studentCode)->first();
        $date = date('Y-m-d');
        $trans_id = "TXN".strtotime(date('d-m-Y H:i:s')).$studentCode;
        $postings = $request->posting_id;
        $discount_item = $request->discount_item;
        //insert to payment
        $payment = new Payment;
        $payment->code = mt_rand(100000, 999999)+mt_rand(100000, 9999999);
        $payment->student = $student->id;
        $payment->amount  = $total;
        $payment->discount = $discount;
        $payment->advance_deduction = $request->advance;
        $payment->advance_balance = $request->advance_balance;
        $payment->paid_amount = $request->subtotal;
        $payment->date = $date;
        $payment->transaction_id = $trans_id;
        $payment->type = $payment_type;
        if($payment_type == 2){
            $payment->cheque_number = $cheque_number;
        }
        $payment->created_user = Auth::user()->id;
        $payment->created_usertype = Auth::user()->usertype;
        $payment->save();
        //substract advance amount from student table
        $advance_balance = $student->advance-$request->advance;
        if($advance_balance < 0){
            $advance_balance = 0;
        }
        $student->advance = $advance_balance;
        $student->save();
        //update student account
        $student_account = StudentAccount::where('student',$student->id)->first();
        $current_due = $student_account->current_due-$total;
        if($current_due<0){
            $current_due = 0;
        }
        $total_due = $student_account->total_due-$total;
        if($total_due<0){
            $total_due = 0;
        }
        $student_account->current_due = $current_due;
        $student_account->total_due = $total_due;
        $student_account->save();
        // insert to payment posting relation tables
        $rows = array();
        DB::beginTransaction();
        for($i=0;$i<count($postings);$i++){
            $rows[] = array( 'posting' => $postings[$i],
            'payment' => $payment->id );
            Posting::where('id',$postings[$i])->update(['payment_status'=>1,'discount' => $discount_item[$i]]);
        }
        PaymentPosting::insert($rows);
        DB::commit();
        return response()->json(['status'=>true,'payment_code'=>$payment->code,'student_code'=>$student->code]);
    }
    public function showInvoice(Request $request,$student_code,$payment_code){
        $student = Student::where('code',$student_code)->first();
        $payment = Payment::where('code',$payment_code)->first();
        $paidPostings = PaymentPosting::where('payment',$payment->id)->get();
        $settings = Setting::first();
        $data = array(  'student' => $student,
                        'payment' => $payment,
                        'settings' => $settings,
                        'paidPostings' => $paidPostings);
        return view('admin.billing.view',$data);
    }
}
