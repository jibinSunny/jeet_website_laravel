<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClassModel;
use App\Models\Division;
use App\Models\Expense;
use App\Models\ExpenseCategory;
use App\Models\FeeType;
use App\Models\Payment;
use App\Models\PaymentPosting;
use App\Models\Posting;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AccountReports extends Controller
{
    public function showRevenueReport(Request $request)
    {
        $classes    = ClassModel::all();
        $divisions  = Division::all();
        $feetypes   = FeeType::orderBy('fee_id', 'ASC')->get();
        $fee_type = $request->fee_type;
        $from = $request->from;
        $to = $request->to;
        if ($from && $to) {
            $from = date('Y-m-d', strtotime($from));
            $to = date('Y-m-d', strtotime($to));
        }
        if ($fee_type) {
            if ($from && $to) {
                $from = date('Y-m-d', strtotime($from));
                $to = date('Y-m-d', strtotime($to));
                $postings   = Posting::whereBetween('date', [$from, $to])->where('feetype', $fee_type)->get();
            } else {
                $postings   = Posting::where('feetype', $fee_type)->get();
            }
            $feetype_rec   = FeeType::where('id', $fee_type)->orderBy('fee_id', 'ASC')->get();
        } else {
            if ($from && $to) {
                $postings   = Posting::whereBetween('date', [$from, $to])->get();
            } else {
                $postings   = Posting::get();
            }
            $feetype_rec   = FeeType::orderBy('fee_id', 'ASC')->get();
        }
        $paid       = $postings->where('payment_status', 1)->sum('amount');
        $pending    = $postings->where('payment_status', 0)->sum('amount');
        $posted     = $postings->sum('amount');
        $date       = Carbon::now()->timezone('Asia/Kolkata');
        $datediff = strtotime($to) - strtotime($from);
        $dateDifference = round($datediff / (60 * 60 * 24));
        $collection = array();
        $i = 0;
        if ($from && $to) {
            for ($j = 0; $j < $dateDifference; $j++) {
                $day =  date('Y-m-d', strtotime($from . '+' . $j . ' day'));
                foreach ($feetype_rec as $fee) {
                    $amount = $postings->where('feetype', $fee->id)->where('date', $day)->sum('amount');
                    if ($amount > 0) {
                        $collection[$i]['sl_no'] = $i + 1;
                        $collection[$i]['date'] = $day;
                        $collection[$i]['fee_id'] = $fee->id;
                        $collection[$i]['name'] = $fee->name;
                        $collection[$i]['id'] = $fee->fee_id;
                        $collection[$i]['amount'] = $postings->where('feetype', $fee->id)->where('date', $day)->sum('amount');
                        $i++;
                    }
                }
            }
        } else {
            foreach ($feetype_rec as $fee) {
                $collection[$i]['sl_no'] = $i + 1;
                $collection[$i]['name'] = $fee->name;
                $collection[$i]['id'] = $fee->fee_id;
                $collection[$i]['fee_id'] = $fee->id;
                $collection[$i]['day_amount'] = $postings->where('feetype', $fee->id)->where('date', date('Y-m-d'))->sum('amount');
                $collection[$i]['month_amount'] = Posting::where('feetype', $fee->id)->whereMonth('date', date('m'))->sum('amount');
                $collection[$i]['year_amount'] = Posting::where('feetype', $fee->id)->whereYear('date', date('Y'))->sum('amount');
                $i++;
            }
        }
        //  return   $collection;
        $data       = array(
            'classes' => $classes,
            'divisions' => $divisions,
            'feetypes' => $feetypes,
            'collection' => $collection,
            'paid' => $paid,
            'pending' => $pending,
            'posted' => $posted,
            'date' => $date,
            'fee_type' => $fee_type,
            'from' => $from,
            'to' => $to
        );
        return view('admin/report/accounts/showRevenueReport', $data);
    }
    public function showCreditReport(Request $request)
    {
        $classes    = ClassModel::all();
        $divisions  = Division::all();
        $feetypes   = FeeType::orderBy('fee_id', 'ASC')->get();
        $fee_type = $request->fee_type;
        $from = $request->from;
        $to = $request->to;
        if ($from && $to) {
            $from = date('Y-m-d', strtotime($from));
            $to = date('Y-m-d', strtotime($to));
        }
        if ($fee_type) {
            if ($from && $to) {
                $from = date('Y-m-d', strtotime($from));
                $to = date('Y-m-d', strtotime($to));
                $postings   = Posting::whereBetween('date', [$from, $to])->where('feetype', $fee_type)->where('payment_status', 0)->get();
            } else {
                $postings   = Posting::where('feetype', $fee_type)->where('payment_status', 0)->get();
            }
            $feetype_rec   = FeeType::where('id', $fee_type)->orderBy('fee_id', 'ASC')->get();
        } else {
            if ($from && $to) {
                $postings   = Posting::whereBetween('date', [$from, $to])->where('payment_status', 0)->get();
            } else {
                $postings   = Posting::where('payment_status', 0)->get();
            }
            $feetype_rec   = FeeType::orderBy('fee_id', 'ASC')->get();
        }
        $date       = Carbon::now()->timezone('Asia/Kolkata');
        $datediff = strtotime($to) - strtotime($from);
        $dateDifference = round($datediff / (60 * 60 * 24));
        $collection = array();
        $i = 0;
        if ($from && $to) {
            for ($j = 0; $j < $dateDifference; $j++) {
                $day =  date('Y-m-d', strtotime($from . '+' . $j . ' day'));
                foreach ($feetype_rec as $fee) {
                    $collection[$i]['sl_no'] = $i + 1;
                    $collection[$i]['date'] = $day;
                    $collection[$i]['name'] = $fee->name;
                    $collection[$i]['fee_id'] = $fee->id;
                    $collection[$i]['id'] = $fee->fee_id;
                    $collection[$i]['amount'] = $postings->where('feetype', $fee->id)->where('date', $day)->where('payment_status', 0)->sum('amount');
                    $i++;
                }
            }
        } else {
            foreach ($feetype_rec as $fee) {
                $collection[$i]['sl_no'] = $i + 1;
                $collection[$i]['name'] = $fee->name;
                $collection[$i]['fee_id'] = $fee->id;
                $collection[$i]['id'] = $fee->fee_id;
                $collection[$i]['day_amount'] = $postings->where('feetype', $fee->id)->where('date', date('Y-m-d'))->where('payment_status', 0)->sum('amount');
                $collection[$i]['month_amount'] = Posting::where('feetype', $fee->id)->whereMonth('date', date('m'))->where('payment_status', 0)->sum('amount');
                $collection[$i]['year_amount'] = Posting::where('feetype', $fee->id)->whereYear('date', date('Y'))->where('payment_status', 0)->sum('amount');
                $i++;
            }
        }
        $data       = array(
            'classes' => $classes,
            'divisions' => $divisions,
            'feetypes' => $feetypes,
            'collection' => $collection,
            'date' => $date,
            'fee_type' => $fee_type,
            'from' => $from,
            'to' => $to
        );
        return view('admin/report/accounts/showCreditReport', $data);
    }
    public function showDebitReport(Request $request)
    {
        $classes    = ClassModel::all();
        $divisions  = Division::all();
        $feetypes   = FeeType::orderBy('fee_id', 'ASC')->get();
        $fee_type = $request->fee_type;
        $from = $request->from;
        $to = $request->to;
        if ($from && $to) {
            $from = date('Y-m-d', strtotime($from));
            $to = date('Y-m-d', strtotime($to));
        }
        if ($fee_type) {
            if ($from && $to) {
                $from = date('Y-m-d', strtotime($from));
                $to = date('Y-m-d', strtotime($to));
                $postings   = Posting::whereBetween('date', [$from, $to])->where('feetype', $fee_type)->where('payment_status', 1)->get();
            } else {
                $postings   = Posting::where('feetype', $fee_type)->where('payment_status', 1)->get();
            }
            $feetype_rec   = FeeType::where('id', $fee_type)->orderBy('fee_id', 'ASC')->get();
        } else {
            if ($from && $to) {
                $postings   = Posting::whereBetween('date', [$from, $to])->where('payment_status', 1)->get();
            } else {
                $postings   = Posting::where('payment_status', 1)->get();
            }
            $feetype_rec   = FeeType::orderBy('fee_id', 'ASC')->get();
        }
        $date       = Carbon::now()->timezone('Asia/Kolkata');
        $datediff = strtotime($to) - strtotime($from);
        $dateDifference = round($datediff / (60 * 60 * 24));
        $collection = array();
        $i = 0;
        if ($from && $to) {
            for ($j = 0; $j < $dateDifference; $j++) {
                $day =  date('Y-m-d', strtotime($from . '+' . $j . ' day'));
                foreach ($feetype_rec as $fee) {
                    $collection[$i]['sl_no'] = $i + 1;
                    $collection[$i]['date'] = $day;
                    $collection[$i]['fee_id'] = $fee->id;
                    $collection[$i]['name'] = $fee->name;
                    $collection[$i]['id'] = $fee->fee_id;
                    $collection[$i]['amount'] = $postings->where('feetype', $fee->id)->where('date', $day)->where('payment_status', 1)->sum('amount');
                    $i++;
                }
            }
        } else {
            foreach ($feetype_rec as $fee) {
                $collection[$i]['sl_no'] = $i + 1;
                $collection[$i]['name'] = $fee->name;
                $collection[$i]['fee_id'] = $fee->id;
                $collection[$i]['id'] = $fee->fee_id;
                $collection[$i]['day_amount'] = $postings->where('feetype', $fee->id)->where('date', date('Y-m-d'))->where('payment_status', 1)->sum('amount');
                $collection[$i]['month_amount'] = Posting::where('feetype', $fee->id)->whereMonth('date', date('m'))->where('payment_status', 1)->sum('amount');
                $collection[$i]['year_amount'] = Posting::where('feetype', $fee->id)->whereYear('date', date('Y'))->where('payment_status', 1)->sum('amount');
                $i++;
            }
        }
        $data = array(
            'classes' => $classes,
            'divisions' => $divisions,
            'feetypes' => $feetypes,
            'collection' => $collection,
            'date' => $date,
            'fee_type' => $fee_type,
            'from' => $from,
            'to' => $to
        );
        return view('admin/report/accounts/showDebitReport', $data);
    }
    public function showOutstandingReport(Request $request)
    { 

        $postings = new Posting;
        $expensive_category = ExpenseCategory::get();
        $expense = new Expense();
        $date       = Carbon::now()->timezone('Asia/Kolkata');
        $paid     = $postings->where('payment_status', 1)->sum('amount');
        $pending     = $postings->where('payment_status', 0)->sum('amount');
        $posted     = $postings->sum('amount');

        if(isset($request->category))
        {
            
            $expense = $expense->where('expense_category',$request->category);
        }
        if ($request->from && $request->to) 
        {
            $from = date('Y-m-d', strtotime($request->from));
            $to = date('Y-m-d', strtotime($request->to));
        
           $expense = $expense->whereBetween('date', [$from,$to]);
        }   

        return view('admin/report/accounts/showOutstandingReport', ['collection' => $expense->orderBy('created_at', 'DESC')->get(),
        'date' =>$date,
        'paid' => $paid,
        'pending' => $pending,
        'posted' => $posted,
        'expensive_category' => $expensive_category,
        'category' => $request->category,
        'from' => $request->from,
        'to' => $request->to,]);
    }
    public function showTrialBalance(Request $request)
    { 
        $postings = new Posting;
        $pay_postings = new PaymentPosting;
        $payment = new Payment();
        $today = date('Y-m-d');
        $projected_amount    = $postings->where('date', '<', $today)->where('payment_status', 0)->sum('amount');
        $todayposted    = $postings->where('date', $today)->sum('amount');
        $todaycredit     = $postings->where('date', $today)->where('payment_status', 1)->sum('amount');
        $todayposted_data = $postings->where('date', $today)->get();

        $today_credited_postings    = $postings->where('date', $today)->where('payment_status', 1)->get();
        // return $today_credited_postings;
        $payments = array();

        foreach ($today_credited_postings as $row) {
            $payments[] = $row->paymentPostings->payment;
        }
        $unique_payments = array_unique($payments);
        $total_cash_amount    = $payment->whereIn('id', $unique_payments)->where('type', 1)->sum('amount');
        $total_cheque_amount    = $payment->whereIn('id', $unique_payments)->where('type', 2)->sum('amount');
        $total_credit_amount    = $payment->whereIn('id', $unique_payments)->where('type', 3)->sum('amount');
        $data   =  array(
            'projected_amount' => $projected_amount,
            'todayposted' => $todayposted,
            'todaycredit' => $todaycredit,
            'todayposted_data' => $todayposted_data,
            'total_cash_amount' => $total_cash_amount,
            'total_credit_amount' => $total_credit_amount,
            'total_cheque_amount' => $total_cheque_amount,

        );
        return view('admin/report/accounts/showTrialbalanceReport', $data);
    }

    public function viewRevenueReport(Request $request)
    {
        $items = new Posting;
        if ($request->date) {
            $items = $items->where('date', $request->get('date'));
        }
        if ($request->code) {
            $items = $items->where('feetype', $request->get('code'));
        }

        $data = [
            'fee' =>  $items->get(),
        ];
        return view('admin/report/accounts/viewRevenueReport', $data);
    }

    public function viewCreditReport(Request $request)
    {
        $items = new Posting;
        if ($request->date) {
            $items = $items->where('date', $request->get('date'));
        }
        if ($request->code) {
            $items = $items->where('feetype', $request->get('code'));
        }

        $data = [
            'fee' =>  $items->where('payment_status', 1)->get(),
        ];
        return view('admin/report/accounts/viewCreditReport', $data);
    }
    public function viewDebitReport(Request $request)
    {
        $items = new Posting;
        if ($request->date) {
            $items = $items->where('date', $request->get('date'));
        }
        if ($request->code) {
            $items = $items->where('feetype', $request->get('code'));
        }

        $data = [
            'fee' =>  $items->where('payment_status', 0)->get(),
        ];
        return view('admin/report/accounts/viewDebitReport', $data);
    }
}
