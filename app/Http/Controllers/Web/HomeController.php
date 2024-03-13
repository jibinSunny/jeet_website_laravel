<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\ParentModel;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function showHome(Request $request)
    {
        return view('web/home');
    }

    public function installCheck(Request $request)
    {
        return view('install/index');
    }
    public function databaseCheck(Request $request)
    {
        return view('install/database');
    }
    public function timeZone(Request $request)
    {
        return view('install/timezone');
    }
    public function site(Request $request)
    {
        return view('install/site');
    }
    public function done(Request $request)
    {
        return view('install/done');
    }

    // DASHBOARD
    public function showDashboard(Request $request)
    {
        return view('admin/dashboard/index');
    }

    public function showLogin()
    {
        return view('admin/login');
    }
    // ONLINE-EXAM
    public function onlineExam(Request $request)
    {
        return view('admin/online-exam');
    }
    public function showStudent(Request $request)
    {
        return view('admin/student/index');
    }
    public function addStudent(Request $request)
    {
        return view('admin/student/addStudent');
    }
    // students_resetlink
    public function studentResetlink($email, $token)
    {
        if ($email && $token) {
            $data = [
                'email' => $email,
                'token' => $token,
            ];
            return view('student/resetlink_page', $data);
        }
    }
    // students_saveResetlink
    public function savestudentResetlink(Request $request)
    {
        if ($request->email && $request->token && $request->password) {

            $student = Student::where('email', $request->email)->where('token', $request->token)->first();
            if ($student) {
                $inputs['password'] = Hash::make($request->password);
                Student::where('id', $student->id)->update($inputs);
                return response()->json(['status' => true, 'Message' => "Successfully"]);
            } else {
                return response()->json(['status' => false, 'errors' => "You Are Not Registrated"]);
            }
        } else {
            return response()->json(['status' => false, 'errors' => "Something went wrong"]);
        }
    }
    // teacher_resetlink
    public function teacherResetlink($email, $token)
    {
        if ($email && $token) {
            $data = [
                'email' => $email,
                'token' => $token,
            ];
            return view('teacher/resetlink_page', $data);
        }
    }
    // teacher_saveResetlink
    public function saveteacherResetlink(Request $request)
    {
        if ($request->email && $request->token && $request->password) {

            $student = Teacher::where('email', $request->email)->where('token', $request->token)->first();
            if ($student) {
                $inputs['password'] = Hash::make($request->password);
                Teacher::where('id', $student->id)->update($inputs);
                return response()->json(['status' => true, 'Message' => "Successfully"]);
            } else {
                return response()->json(['status' => false, 'errors' => "You Are Not Registrated"]);
            }
        } else {
            return response()->json(['status' => false, 'errors' => "Something went wrong"]);
        }
    }
    // parent_resetlink
    public function parentResetlink($email, $token)
    {
        if ($email && $token) {
            $data = [
                'email' => $email,
                'token' => $token,
            ];
            return view('parent/resetlink_page', $data);
        }
    }
    // parent_saveResetlink
    public function saveparentResetlink(Request $request)
    {
        if ($request->email && $request->token && $request->password) {

            $student = ParentModel::where('email', $request->email)->where('token', $request->token)->first();
            if ($student) {
                $inputs['password'] = Hash::make($request->password);
                ParentModel::where('id', $student->id)->update($inputs);
                return response()->json(['status' => true, 'Message' => "Successfully"]);
            } else {
                return response()->json(['status' => false, 'errors' => "You Are Not Registrated"]);
            }
        } else {
            return response()->json(['status' => false, 'errors' => "Something went wrong"]);
        }
    }
    // user_resetlink
    public function userResetlink($email, $token)
    {
        if ($email && $token) {
            $data = [
                'email' => $email,
                'token' => $token,
            ];
            return view('user/resetlink_page', $data);
        }
    }
    // user_saveResetlink
    public function saveuserResetlink(Request $request)
    {
        if ($request->email && $request->token && $request->password) {

            $student = User::where('email', $request->email)->where('token', $request->token)->first();
            if ($student) {
                $inputs['password'] = Hash::make($request->password);
                User::where('id', $student->id)->update($inputs);
                return response()->json(['status' => true, 'Message' => "Successfully"]);
            } else {
                return response()->json(['status' => false, 'errors' => "You Are Not Registrated"]);
            }
        } else {
            return response()->json(['status' => false, 'errors' => "Something went wrong"]);
        }
    }

    // PARENT
    public function showParent(Request $request)
    {
        return view('admin/parent/index');
    }
    public function addParent(Request $request)
    {
        return view('admin/parent/add');
    }

    // TEACHER


    // CLASSES
    public function Classes(Request $request)
    {
        return view('admin/classes/index');
    }
    public function addClasses(Request $request)
    {
        return view('admin/classes/add');
    }
    public function editClasses(Request $request)
    {
        return view('admin/classes/edit');
    }

    // DIVISION
    public function Division(Request $request)
    {
        return view('admin/division/index');
    }
    public function addDivision(Request $request)
    {
        return view('admin/division/add');
    }
    public function editDivision(Request $request)
    {
        return view('admin/division/edit');
    }

    // SUBJECT
    public function Subject(Request $request)
    {
        return view('admin/subject/index');
    }
    public function addSubject(Request $request)
    {
        return view('admin/subject/add');
    }

    // SYLLABUS
    public function Syllabus(Request $request)
    {
        return view('admin/syllabus/index');
    }
    public function addSyllabus(Request $request)
    {
        return view('admin/syllabus/add');
    }

    // STUDENT ATTENDANCE
    public function studentAttendance(Request $request)
    {
        return view('admin/sattendance/index');
    }
    public function addstudentAttendance(Request $request)
    {
        return view('admin/sattendance/add');
    }

    // TEACHER ATTENDANCE
    public function teacherAttendance(Request $request)
    {
        return view('admin/tattendance/index');
    }
    public function addteacherAttendance(Request $request)
    {
        return view('admin/tattendance/add');
    }

    public function Whiteboard(Request $request)
    {
        return view('admin/whiteboard/index');
    }

    // USER ATTENDANCE
    public function userAttendance(Request $request)
    {
        return view('admin/uattendance/index');
    }
    public function adduserAttendance(Request $request)
    {
        return view('admin/uattendance/add');
    }
    public function viewuserAttendance(Request $request)
    {
        return view('admin/uattendance/edit');
    }

    // ASSIGNMENT
    public function Assignment(Request $request)
    {
        return view('admin/assignment/index');
    }
    public function addAssignment(Request $request)
    {
        return view('admin/assignment/add');
    }

    // TIMETABLE
    public function timeTable(Request $request)
    {
        return view('admin/timetable/index');
    }
    public function addtimeTable(Request $request)
    {
        return view('admin/timetable/add');
    }

    // EXAM
    public function Exam(Request $request)
    {
        return view('admin/exam/index');
    }
    public function addExam(Request $request)
    {
        return view('admin/exam/add');
    }
    public function editExam(Request $request)
    {
        return view('admin/exam/edit');
    }

    // EXAM SCHEDULE
    public function examSchedule(Request $request)
    {
        return view('admin/examschedule/index');
    }
    public function addexamSchedule(Request $request)
    {
        return view('admin/examschedule/add');
    }
    public function editexamSchedule(Request $request)
    {
        return view('admin/examschedule/edit');
    }

    // GRADE
    public function Grade(Request $request)
    {
        return view('admin/grade/index');
    }
    public function addGrade(Request $request)
    {
        return view('admin/grade/add');
    }
    public function editGrade(Request $request)
    {
        return view('admin/grade/edit');
    }

    // EXAM ATTENDANCE
    public function examAttendance(Request $request)
    {
        return view('admin/eattendance/index');
    }
    public function addexamAttendance(Request $request)
    {
        return view('admin/eattendance/add');
    }

    // FEE TYPES
    public function feeType(Request $request)
    {
        return view('admin/feetypes/index');
    }
    public function addFeeType(Request $request)
    {
        return view('admin/feetypes/add');
    }
    public function editFeeStructure(Request $request)
    {
        return view('admin/feetypes/edit-structure');
    }

    // INVOICE
    public function Invoice(Request $request)
    {
        return view('admin/invoice/index');
    }
    public function addInvoice(Request $request)
    {
        return view('admin/invoice/add');
    }
    public function invoiceView(Request $request)
    {
        return view('admin/invoice/view');
    }
    public function editInvoice(Request $request)
    {
        return view('admin/invoice/edit');
    }
    // public function invoicePayment(Request $request){
    //     return view('admin/invoice/payment');
    // }



    // BILLING
    public function Billing(Request $request)
    {
        return view('admin/billing/index');
    }

    // PAYMENT HISTORY
    public function paymentHistory(Request $request)
    {
        return view('admin/paymenthistory/index');
    }
    public function editpaymentHistory(Request $request)
    {
        return view('admin/paymenthistory/edit');
    }

    // EXPENSE
    public function Expense(Request $request)
    {
        return view('admin/expense/index');
    }
    public function addExpense(Request $request)
    {
        return view('admin/expense/add');
    }

    // INCOME
    public function Income(Request $request)
    {
        return view('admin/income/index');
    }
    public function addIncome(Request $request)
    {
        return view('admin/income/add');
    }

    // GLOBAL PAYMENT
    public function globalPayment(Request $request)
    {
        return view('admin/global_payment/index');
    }

    // LEAVE APPLICATION
    public function leaveApplication(Request $request)
    {
        return view('admin/leaveapplication/index');
    }

    // LEAVE CATEGORY
    public function leaveCategory(Request $request)
    {
        return view('admin/leavecategory/index');
    }
    public function addleaveCategory(Request $request)
    {
        return view('admin/leavecategory/add');
    }
    public function editleaveCategory(Request $request)
    {
        return view('admin/leavecategory/edit');
    }

    // LEAVE ASSIGN
    public function leaveAssign(Request $request)
    {
        return view('admin/leaveassign/index');
    }
    public function addleaveAssign(Request $request)
    {
        return view('admin/leaveassign/add');
    }

    // LEAVE APPLY
    public function leaveApply(Request $request)
    {
        return view('admin/leaveapply/index');
    }
    public function addleaveApply(Request $request)
    {
        return view('admin/leaveapply/add');
    }

    // LIBRARY
    public function lMember(Request $request)
    {
        return view('admin/lmember/index');
    }
    public function addlMember(Request $request)
    {
        return view('admin/lmember/add');
    }
    public function editlMember(Request $request)
    {
        return view('admin/lmember/edit');
    }

    // ISSUE
    public function Issue(Request $request)
    {
        return view('admin/issue/index');
    }
    public function IssueParent(Request $request)
    {
        return view('admin/issue/index_parent');
    }
    public function IssueAdd(Request $request)
    {
        return view('admin/issue/add');
    }
    public function IssueEdit(Request $request)
    {
        return view('admin/issue/edit');
    }
    public function IssueView(Request $request)
    {
        return view('admin/issue/view');
    }

    // BOOK
    public function Book(Request $request)
    {
        return view('admin/book/index');
    }
    public function addBook(Request $request)
    {
        return view('admin/book/add');
    }
    public function editBook(Request $request)
    {
        return view('admin/book/edit');
    }

    // HOSTEL
    public function Hostel(Request $request)
    {
        return view('admin/hostel/index');
    }
    public function addHostel(Request $request)
    {
        return view('admin/hostel/add');
    }
    public function editHostel(Request $request)
    {
        return view('admin/hostel/edit');
    }

    // CATEGORY
    public function Category(Request $request)
    {
        return view('admin/category/index');
    }
    public function addCategory(Request $request)
    {
        return view('admin/category/add');
    }
    public function editCategory(Request $request)
    {
        return view('admin/category/edit');
    }

    // H MEMBER
    public function hostelMember(Request $request)
    {
        return view('admin/hmember/index');
    }
    public function addhostelMember(Request $request)
    {
        return view('admin/hmember/add');
    }
    public function edithostelMember(Request $request)
    {
        return view('admin/hmember/edit');
    }

    // SALARY TEMPLATE
    public function salaryTemplate(Request $request)
    {
        return view('admin/salary_template/index');
    }
    public function addsalaryTemplate(Request $request)
    {
        return view('admin/salary_template/add');
    }
    public function editsalaryTemplate(Request $request)
    {
        return view('admin/salary_template/edit');
    }

    // SALARY TEMPLATE
    public function hourlyTemplate(Request $request)
    {
        return view('admin/hourly_template/index');
    }
    public function addhourlyTemplate(Request $request)
    {
        return view('admin/hourly_template/add');
    }
    public function edithourlyTemplate(Request $request)
    {
        return view('admin/hourly_template/edit');
    }

    // MANAGE SALARY
    public function manageSalary(Request $request)
    {
        return view('admin/manage_salary/index');
    }
    public function addmanageSalary(Request $request)
    {
        return view('admin/manage_salary/add');
    }
    public function editmanageSalary(Request $request)
    {
        return view('admin/manage_salary/edit');
    }

    // REPORTS
    //
    // CLASS REPORT
    public function classReport(Request $request)
    {
        return view('admin/report/class/ClassReport');
    }
    public function classReportPDF(Request $request)
    {
        return view('admin/report/class/ClassReportPDF');
    }
    public function ClassReportShow(Request $request)
    {
        return view('admin/report/class/ClassReportView');
    }

    // REVENUE REPORT
    public function RevenueReport(Request $request)
    {
        return view('admin/report/revenue/RevenueReport');
    }

    // CASH RECIEVED
    public function CashRecieved(Request $request)
    {
        return view('admin/report/cash_recieved/CashRecieved');
    }

    // CASH PAID
    public function CashPaid(Request $request)
    {
        return view('admin/report/cash_paid/CashPaid');
    }

    // OUTSTANDING
    public function Outstanding(Request $request)
    {
        return view('admin/report/outstanding/Outstanding');
    }

    // JOURNAL
    public function Journal(Request $request)
    {
        return view('admin/report/journal/Journal');
    }

    // TRIAL BALANCE
    public function TrialBalance(Request $request)
    {
        return view('admin/report/trial_balance/TrialBalance');
    }

    // MANAGER
    public function Manager(Request $request)
    {
        return view('admin/report/manager/Manager');
    }

    // STUDENT REPORT
    // public function studentReport(Request $request){
    //     return view('admin/report/student/studentReport');
    // }
    // public function studentReportPDF(Request $request){
    //     return view('admin/report/student/studentReportPDF');
    // }
    // public function studentReportView(Request $request){
    //     return view('admin/report/student/studentReportView');
    // }

    // TIMETABLE REPORT
    public function timetableReport(Request $request)
    {
        return view('admin/report/routine/RoutineReport');
    }
    public function timetableReportPDF(Request $request)
    {
        return view('admin/report/routine/RoutineReportPDF');
    }
    public function timetableReportView(Request $request)
    {
        return view('admin/report/routine/RoutineReportView');
    }

    // ATTENDANCE REPORT
    public function attendanceReport(Request $request)
    {
        return view('admin/report/attendance/AttendanceReport');
    }
    public function attendanceReportView(Request $request)
    {
        return view('admin/report/attendance/AttendanceReportView');
    }

    // SETTINGS
    public function generalSettings(Request $request)
    {
        return view('admin/setting/index');
    }
    // public function academicYear(Request $request){
    //     return view('admin/setting/academic/index');
    // }
    // public function addAcademicYear(Request $request){
    //     return view('admin/setting/academic/add');
    // }
    public function emailSettings(Request $request)
    {
        return view('admin/emailsetting/index');
    }
    public function paymentSettings(Request $request)
    {
        return view('admin/paymentsettings/index');
    }
    public function frontendSettings(Request $request)
    {
        return view('admin/frontend_setting/index');
    }
    public function idCard(Request $request)
    {
        return view('admin/id-card/index');
    }
}
