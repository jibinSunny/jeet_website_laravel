<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClassModel;
use App\Models\Division;
use App\Models\FeeType;
use App\Models\Posting;
use App\Models\Student;
use App\Models\StudentAccount;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostingController extends Controller
{

    public function Posting(Request $request){
        return view('admin/posting/index');
    }
    public function addPosting(Request $request){
        $classes = ClassModel::all();
        $divisions = Division::all();
        $feetypes = FeeType::all();
        $postings = Posting::where('payment_status',0)->orderBy('created_at', 'DESC')->get();
        $data = array('classes' => $classes,
                        'divisions' => $divisions,
                        'feetypes' => $feetypes,
                        'postings' => $postings);
        return view('admin/posting/add', $data);
    }
    public function savePosting(Request $request){
        $class = $request->class;
        $division = $request->division;
        $feetypes = $request->feetypes;
        $fee_id = $request->feetypes;
        $fee_tenure = '1';
        $amount = $request->amount;
        $student = $request->student;
        if($student){
            $students = Student::where('class',$class)->where('division',$division)->where('id',$student)->get();
        }else{
            $students = Student::whereIn('id',$student)->get();
        }
        try{
            $rows = array();
            DB::beginTransaction();
            foreach($students as $stud){
                $rows[] = array( 'class' => $class,
                                'division' => $division,
                                'student' => $stud->id,
                                'feetype' => $fee_id,
                                'tenure' => $fee_tenure,
                                'amount' => $amount,
                                'payment_status' => 0,
                                'date' => Carbon::now(),
                                'created_user' => Auth::user()->id,
                                'created_usertype' => Auth::user()->usertype);
                $student_account = StudentAccount::where('student',$stud->id)->first();
                if(!$student_account){
                    $student_account = new StudentAccount();
                }
                $student_account->student = $stud->id;
                $student_account->class = $class;
                $student_account->division = $division;
                // $student_account->previous_due = $student_account->previous_due+$amount;
                $student_account->current_due = $student_account->current_due+$amount;
                $student_account->total_due = $student_account->total_due+$amount;
                $student_account->save();
            }
            Posting::insert($rows);
            DB::commit();
            return redirect('admin/posting/add')->withSuccess('Posted successfully');
        }
        catch(\Exception $e){
            print_R($e->getMessage());
            // return redirect('admin/posting/add')->withError('Oops Something went wrong!!');
        }
    }
    public function addBatchPosting(Request $request){
        return view('admin/posting/addBatch');
    }
}
