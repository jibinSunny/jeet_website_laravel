<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Allowance;
use App\Models\Deduction;
use App\Models\SalaryTemplate;
use App\Models\UserType;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SalaryTemplateController extends Controller
{
    public function showTemplate(Request $request){
        $usertypes = UserType::orderBy('created_at','DESC')->get();
        $salary_templates = SalaryTemplate::orderBy('created_at','DESC')->get();
        $data = array('usertypes' => $usertypes,
                    'salary_templates' => $salary_templates);
        return view('admin/salary_template/index',$data);
    }
    public function addTemplate(Request $request){
        $usertypes = UserType::orderBy('created_at','DESC')->get();
        $data = array('usertypes' => $usertypes);
        return view('admin/salary_template/add', $data);
    }
    public function saveTemplate(Request $request){
        if($request->code){
            $salary = SalaryTemplate::where('code',$request->code)->first();
        }else{
            $salary = new SalaryTemplate();
            $code = mt_rand(1000000000, 9999999999);
            $salary->code = $code;
            $salary->code = $code;
            if($request->usertype == 2){
                $salary->teacher = $request->user;
            }else{
                $salary->user = $request->user;
            }
            $salary->usertype = $request->usertype;
            $salary->basic_salary = $request->basic_salary;
            $salary->overtime_rate = $request->overtime_rate;
            $salary->gross_salary = $request->gross_salary;
            $salary->total_deduction = $request->total_deduction;
            $salary->net_salary = $request->net_salary;
            $salary->created_user = Auth::user()->id;
            $salary->created_usertype = Auth::user()->usertype;
            try{
                DB::beginTransaction();
                $salary->save();
                $rows = array();
                for($i=1;$i<10;$i++){
                    $name = 'allowanceslabel'.$i;
                    $amount = 'allowancesamount'.$i;
                    if(isset($request->$name) && isset($request->$amount)){
                            $rows[] = array(    'salary_template' => $salary->id,
                                            'name' => $request->$name,
                                            'amount' => $request->$amount,
                                            'created_user' => Auth::user()->id,
                                            'created_usertype' => Auth::user()->usertype) ;
                    }else{
                        break;
                    }
                }
                Allowance::insert($rows);
                $rows = array();
                for($j=1;$j<10;$j++){
                    $name = 'deductionslabel'.$j;
                    $amount = 'deductionsamount'.$j;
                    if(isset($request->$name) && isset($request->$amount)){
                        $rows[] = array(    'salary_template' => $salary->id,
                                            'name' => $request->$name,
                                            'amount' => $request->$amount,
                                            'created_user' => Auth::user()->id,
                                            'created_usertype' => Auth::user()->usertype) ;
                    }else{
                       break;
                    }
                }
                Deduction::insert($rows);
                DB::commit();
                return redirect('admin/salary/template')->withSuccess('Success');
            }catch(Exception $e){
                // print_R($e->getMessage());
                return redirect('admin/salary/template')->withError('Oops Something went wrong!!');
            }
        }
    }
}
