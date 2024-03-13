<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Expense;
use App\Models\ExpenseCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpenseController extends Controller
{
    public function showExpense(Request $request){
        $expenses = Expense::orderBy('created_at','DESC')->get();
        $data = array('expenses' => $expenses);
        return view('admin/expense/index',$data);
    }
    public function addExpense(Request $request){
        $expense_categories = ExpenseCategory::all();
        $data = array(  'expense_categories' => $expense_categories);
        return view('admin/expense/add', $data);
    }
    public function editExpense(Request $request,$expense_code){
        $expense_categories = ExpenseCategory::all();
        $expense = Expense::where('code',$expense_code)->first();
        $data = array(  'expense_categories' => $expense_categories,'expense' => $expense);
        return view('admin/expense/edit', $data);
    }
    public function saveExpense(Request $request){
        $file_name = '';
        if($request->file('file')){
            $path = public_path('user-files/expense/');
            $file          = $request->file('file');
            $file_name     = $file->getClientOriginalName();
            $file->move($path, $file_name);
        }
        $inputs = $request->only(['expense_category','amount','description']);
        $inputs['code'] =  mt_rand(1000000000, 9999999999);
        $inputs['date'] =date('Y-m-d',strtotime($request->date));
        $inputs['file'] =$file_name;
        $inputs['created_user'] =Auth::user()->id;
        $inputs['created_usertype']=Auth::user()->usertype;
        try{
            if($request->expense_code){
                Expense::where('code',$request->expense_code)->update($inputs);
            }else{
                Expense::create($inputs);
            }
            return redirect('admin/expense')->withSuccess('Added successfully');
        }
        catch(\Exception $e){
            // print_R($e->getMessage());
            return redirect('admin/expense')->withError('Oops Something went wrong!!');
        }
    }
}
