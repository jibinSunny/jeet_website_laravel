<?php
    header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
    header("Pragma: no-cache");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">

        <title>Admin Dashdoard</title>

        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="SHORTCUT ICON" href="" />

        <link rel="stylesheet" href="{{ asset('backend/pace/pace.css') }}">
        <link rel="SHORTCUT ICON" href="{{ asset('frontend/icons/logo.svg') }}" />
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
        <script src="{{ asset('backend/common/jquery.min.js') }}"></script>
        <link href="{{ asset('backend/bootstrap/bootstrap.css') }}" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
        <script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

        <link href="{{ asset('backend/fonts/style.css') }}" rel="stylesheet">
        <link href="{{ asset('backend/datatables/dataTables.bootstrap.css')}}" rel="stylesheet">
        <link href="{{ asset('backend/datatables/dataTables.min.css')}}" rel="stylesheet">
        <link href="{{ asset('backend/common/themes/default/style.css')}}" rel="stylesheet">
        <link href="{{ asset('backend/common/hidetable.css')}}" rel="stylesheet">
        <link href="{{ asset('backend/common/themes/default/common.css')}}" rel="stylesheet">
        <link href="{{ asset('backend/common/responsive.css')}}" rel="stylesheet">
        <link href="{{ asset('backend/common/mailandmedia.css')}}" rel="stylesheet">
        <link href="{{ asset('backend/jquery-datatables-checkboxes-1.2.12/css/dataTables.checkboxes.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('backend/common/combined.css')}}" >
        <link rel="stylesheet" href="{{ asset('backend/ajaxloder/ajaxloder.css')}}" >
        <link rel="stylesheet" href="{{ asset('backend/select2/css/select2.css')}}" >
        <link rel="stylesheet" href="{{ asset('backend/select2/css/select2-bootstrap.css')}}" >
        <link rel="stylesheet" href="{{ asset('backend/datepicker/datepicker.css')}}">
        <link rel="stylesheet" href="{{ asset('backend/daterangepicker/daterangepicker.css')}}">
        <link rel="stylesheet" href="{{ asset('backend/smartwizard/smart_wizard_arrows.css')}}">
        <link rel="stylesheet" href="{{ asset('backend/smartwizard/new_custom_step.css')}}" >
        <link rel="stylesheet" href="{{ asset('backend/switchery/switchery.min.css')}}" >
        <link rel="stylesheet" href="{{ asset('backend/fullcalendar/fullcalendar.min.css')}}" >
        <link rel="stylesheet" href="{{ asset('backend/vex-4.0.1/dist/css/vex-theme-default.css')}}" >
        <link rel="stylesheet" href="{{ asset('backend/checkbox/checkbox.css')}}" >

        <script type="text/javascript">
          $(window).load(function() {
            $(".se-pre-con").fadeOut("slow");;
          });
        </script>
    </head>
    <body class="skin-blue fuelux" >
        <style>
            .chat {
              list-style: none;
              margin: 0;
              padding: 0;
            }

            .chat li {
              margin-bottom: 10px;
              padding-bottom: 5px;
              border-bottom: 1px dotted #B3A9A9;
            }

            .chat li .chat-body p {
              margin: 0;
              color: #777777;
            }

            .panel-body {
              overflow-y: scroll;
              height: 350px;
            }

            ::-webkit-scrollbar-track {
              -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
              background-color: #F5F5F5;
            }

            ::-webkit-scrollbar {
              width: 12px;
              background-color: #F5F5F5;
            }

            ::-webkit-scrollbar-thumb {
              -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
              background-color: #555;
            }
          </style>

        <div class="se-pre-con"></div>
        <div id="loading">
            <img src="{{ asset('backend/ajaxloder/loader.gif') }}" width="150" height="150"/>
        </div>
        <header class="header">
            <a href="#" class="logo">
                <img height="35px" src="{{ asset('frontend/icons/logo.svg') }}"/>
                Jeet
            </a>
            <nav class="navbar navbar-static-top" role="navigation">
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>

                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <li class="dropdown notifications-menu">
                            <a target="_blank" href="#" class="dropdown-toggle" data-toggle="tooltip" title="menu_visit_site" data-placement="bottom">
                                <i class="fa fa-globe"></i>
                            </a>
                        </li>

                        <li class="dropdown messages-menu my-push-message">
                            <a href="#" class="dropdown-toggle my-push-message-a" data-toggle="dropdown" >
                                <i class="fa icon-notice-board" ></i>
                            </a>
                            <ul class="dropdown-menu my-push-message-ul" style="display:none">
                                <li class='header my-push-message-number'>
                                </li>
                                <li>
                                    <ul class="menu my-push-message-list">
                                    </ul>
                                </li>
                            </ul>
                        </li>


                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="{{ asset('frontend/icons/logo.svg') }}" class="user-logo" alt="" />
                                <span>
                                   Admin
                                    <i class="caret"></i>
                                </span>
                            </a>

                            <ul class="dropdown-menu">
                                <li class="user-body">
                                    <div class="col-xs-6 text-center">
                                        <a href="{{route('adminProfile')}}">
                                            <div><i class="fa fa-briefcase"></i></div>
                                            Profile
                                        </a>
                                    </div>
                                    <div class="col-xs-6 text-center">
                                        <a href="{{route('adminPassword')}}">
                                            <div><i class="fa fa-lock"></i></div>
                                            Change Password
                                        </a>
                                    </div>
                                </li>
                                <li class="user-footer">
                                    <div class="text-center">
                                        <a href="{{ route('adminlogout') }}">
                                            <div><i class="fa fa-power-off"></i></div>
                                            Logout
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img style="display:block" src="{{ asset('img/admin.svg') }}" class="img-circle" alt="" />
                        </div>
                        <div class="pull-left info">
                            <p class="welcome-title">Hi {{ Auth::user()->name }},</p>
                            <span class="welcome-user">
                                <i class="fa fa-angle-double-right color-green"></i>
                                {{-- Hi, Admin --}}
                            </span>
                        </div>
                    </div>

                    <ul class="sidebar-menu">
                    <li class="@if(@$active=='admin'){{'active'}}@endif">
                                    <a href="{{ route('showDashboard') }}"><i class="fa icon-dashboardIcon"></i><span> Dashboard</span> </a>
                                </li>
                                {{--  <li class="treeview"id="dashboard-menu">
                            <a href="{{ route('showDashboard') }}"><i class="fa icon-dashboardIcon"></i><span>Dashboard</span> <i class="fa pull-right"></i></a>
                            <ul class="treeview-menu">
                                <li class="@if(@$active=='admin'){{'active'}}@endif">
                                    <a href="{{ route('showDashboard') }}"><span>Admin Dahboard</span> </a>
                                </li>
                                <li class="@if(@$active=='student'){{'active'}}@endif">
                                    <a href="{{ route('showStudentlogin') }}"><span>Student Dahboard</span> </a>
                                </li>
                                <li class="@if(@$active=='parent'){{'active'}}@endif">
                                    <a href="{{ route('showParentlogin') }}"><span>Parent Dahboard</span> </a>
                                </li>
                                <li class="@if(@$active=='teacher'){{'active'}}@endif">
                                    <a href="{{ route('showTeacherlogin') }}"><span>Teacher Dahboard</span> </a>
                                </li>
                                <li class="@if(@$active=='user'){{'active'}}@endif">
                                    <a href="{{ route('showUserlogin') }}"><span>User Dahboard</span> </a>
                                </li>
                            </ul> --}}
                        </li>
                        <li id="teacher-menu">
                            <a href="{{ route('showTeacher') }}"><i class="fa icon-teachers"></i><span>Teacher</span> </a>
                        </li>
                        <li id="teacher-menu">
                            <a href="{{ route('idCard') }}"><i class="fa icon-teachers"></i><span>ID Card</span> </a>
                        </li>
                        <li id="student-menu">
                            <a href="{{ route('showStudent') }}"><i class="fa icon-student"></i><span>Student</span> </a>
                        </li>
                        <li id="parent-menu">
                            <a href="{{ route('showParent') }}"><i class="fa icon-parents"></i><span>Parents</span> </a>
                        </li>
                        <li id="user-menu">
                            <a href="{{ route('showUser') }}"><i class="fa icon-user"style="font: normal" aria-hidden="true"></i><span>Users</span> </a>
                        </li>

                        <li class="" id="Whiteboard" onclick="Whiteboard()">
                            <a href="javascript:;"><i class="fa icon-attendance"></i><span>whiteboard</span> </a>
                        </li>
                        <li class="" id="message-menu">
                            <a href="{{ route('showMessages') }}"><i class="fa icon-chat"></i><span>Messages</span> </a>
                        </li>
                        <li class="" id="online-class-menu">
                            <a href="{{ route('showOnlineClasses') }}"><i class="fa icon-video"></i><span>Online Class</span> </a>
                        </li>

                        <li class="treeview"id="academic-menu">
                            <a href="javascript:;"><i class="fa icon-award"></i><span>Academic</span><i class="fa pull-right icon-keyboard_arrow_right"></i></a>
                            <ul class="treeview-menu">
                                <li class="@if(@$active=='class_list'){{'active'}}@endif">
                                    <a href="{{ route('showClasses') }}"><span>Classes</span> </a>
                                </li>

                                <li class="@if(@$active=='division_list'){{'active'}}@endif">
                                    <a href="{{ route('showDivision') }}"><span>Division</span> </a>
                                </li>

                                <li class="@if(@$active=='subject_list'){{'active'}}@endif">
                                    <a href="{{ route('showSubject') }}"><span>Subject</span> </a>
                                </li>

                                <li class="@if(@$active=='syllabus_list'){{'active'}}@endif">
                                    <a href="{{ route('showSyllabus') }}"><span>Syllabus</span> </a>
                                </li>
                                <li class="@if(@$active=='departmentlist'){{'active'}}@endif">
                                    <a href="{{ route('showDepartments') }}"><span>Departments</span> </a>
                                </li>
                            </ul>
                        </li>

                        <li class="treeview"id="attendance-menu">
                            <a href="javascript:;"><i class="fa icon-at-sign"></i><span>Attendance</span> <i class="fa pull-right icon-keyboard_arrow_right"></i></a>
                            <ul class="treeview-menu">
                                <li class="@if(@$active=='student_attendance_list'){{'active'}}@endif">
                                    <a href="{{ route('showstudentAttendance') }}"><span>Student Attendance</span> </a>
                                </li>
                                <li class="@if(@$active=='teacher_list'){{'active'}}@endif">
                                    <a href="{{ route('showteacherAttendance') }}"><span>Teacher Attendance</span> </a>
                                </li>
                                <li class="@if(@$active=='auser_list'){{'active'}}@endif">
                                    <a href="{{ route('showuserAttendance') }}"><span>User Attendance</span> </a>
                                </li>
                            </ul>
                        </li>
                         <li class="@if(@$active=='eventlist'){{'active'}}@endif">
                            <a href="{{ route('showEvent') }}"><i class="icon-emoji_events"></i><span style=padding:10px>Events</span> </a>
                        </li>
                        <li class="@if(@$active=='assignmentlist'){{'active'}}@endif">
                            <a href="{{ route('showAssignment') }}"><i class="fa icon-class"></i><span>Assignment</span> </a>
                        </li>
                        <li class="@if(@$active=='timetablelist'){{'active'}}@endif">
                            <a href="{{ route('showTimeTable') }}"><i class="fa icon-clock"></i><span>Timetable</span> </a>
                        </li>
                        <li class="@if(@$active=='premotionlist'){{'active'}}@endif">
                            <a href="{{ route('showPremotion') }}"><i class="fa icon-clock"></i><span>Promotion</span> </a>
                        </li>
                        <li class="treeview"id="exam-menu">
                            <a href="javascript:;"><i class="fa icon-shield"></i><span>Exam</span> <i class="fa pull-right icon-keyboard_arrow_right"></i></a>
                            <ul class="treeview-menu">
                            <li class="@if(@$active=='exam_category_list'){{'active'}}@endif">
                                    <a href="{{ route('showExamCategory') }}"><span>Exam Category</span> </a>
                                </li>
                                <!-- <li class="@if(@$active=='examlist'){{'active'}}@endif">
                                    <a href="{{ route('showExam') }}"><span>Exam</span> </a>
                                </li> -->
                                <li class="@if(@$active=='instruction_list'){{'active'}}@endif">
                                    <a href="{{ route('showInstruction') }}" ><span>Instruction</span> </a>
                                </li>
                                <li class="@if(@$active=='examschedulelist'){{'active'}}@endif">
                                    <a href="{{ route('examSchedule') }}"><span>Exam Schedule</span> </a>
                                </li>
                                <li class="@if(@$active=='exam_result'){{'active'}}@endif">
                                    <a href="{{ route('Grade') }}" ><span>Grade</span> </a>
                                </li>
                                <li class="@if(@$active=='exam_result_list'){{'active'}}@endif">
                                    <a href="{{ route('studentExamresult') }}" ><span>Exam Result</span> </a>
                                </li>
                            </ul>
                        </li>

                        <li class="treeview"id="exam-question-menu">
                            <a href="javascript:;"><i class="fa icon-shield"></i><span>Question</span> <i class="fa pull-right icon-keyboard_arrow_right"></i></a>
                            <ul class="treeview-menu">
                                <li class="@if(@$active=='question_bank_list'){{'active'}}@endif">
                                    <a href="{{ route('showQuestionBank') }}" ><span>Question Bank</span> </a>
                                </li>
                                <li class="@if(@$active=='exam_question_list'){{'active'}}@endif">
                                    <a href="{{ route('showExamQuestion') }}" ><span>Exam Question Assign</span> </a>
                                </li>
                            </ul>
                        </li>
                        <li class="treeview" id="accounts-menu">
                            <a href="javascript:;"><i class="fa icon-exam"></i><span>Accounts</span> <i class="fa pull-right icon-keyboard_arrow_right"></i></a>
                            <ul class="treeview-menu">
                                <li class="treeview" id="income-menu">
                                    <a href="javascript:;"><span>Income</span> <i class="fa pull-right icon-keyboard_arrow_right"></i></a>
                                    <ul class="treeview-menu">
                                        <li class="" id="posting-menu">
                                            <a href="{{ route('addPosting') }}" style="margin-left: 0px;"><span>Posting</span> </a>
                                        </li>
                                        <li class="" id="billing-menu">
                                            <a href="{{ route('showBilling') }}" style="margin-left: 0px;"><span>Billing</span> </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="treeview" id="expense-menu">
                                    <a href="javascript:;"><span>Expenditure</span> <i class="fa pull-right icon-keyboard_arrow_right"></i></a>
                                    <ul class="treeview-menu">
                                        <li class="" id="running-expense-menu">
                                            <a href="{{ route('showExpense') }}" style="margin-left: 0px;"><span>Running Expense</span> </a>
                                        </li>
                                        <li class="treeview" id="payroll-menu">
                                            <a href="javascript:;"><span>Payroll</span> <i class="fa pull-right icon-keyboard_arrow_right"></i></a>
                                            <ul class="treeview-menu">
                                                <li class="" id="salary-template-menu">
                                                    <a href="{{ route('showTemplate') }}" style="margin-left: 0px;"><span>Add Salary</span> </a>
                                                </li>
                                                <li id="hourly-template-menu">
                                                    <a href="{{ route('showHourlyTemplate') }}" style="margin-left: 0px;"><span>Hourly Template</span> </a>
                                                </li>
                                                <li class="" id="process-salary-menu">
                                                    <a href="{{ route('showSalary') }}" style="margin-left: 0px;"><span>Process Salary</span> </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="treeview" id="account-report-menu">
                                    <a href="javascript:;"><span> Reports</span> <i class="fa pull-right icon-keyboard_arrow_right"></i></a>
                                    <ul class="treeview-menu">
                                        <li id="revenue-report-menu">
                                            <a href="{{ route('showRevenueReport') }}" style="margin-left: 0px;"><span>Revenue Report</span> </a>
                                        </li>
                                        <li id="credit-report-menu">
                                            <a href="{{ route('showCreditReport') }}" style="margin-left: 0px;"><span>Credit Report</span> </a>
                                        </li>
                                        <li id="debit-report-menu">
                                            <a href="{{ route('showDebitReport') }}" style="margin-left: 0px;"><span>Debit Report</span> </a>
                                        </li>
                                        <li id="outstanding-report-menu">
                                            <a href="{{ route('showOutstandingReport') }}" style="margin-left: 0px;"><span>Outstanding Report</span> </a>
                                        </li>
                                        <li id="trialbalance-report-menu">
                                            <a href="{{ route('showTrialBalance') }}" style="margin-left: 0px;"><span>Trial Balance</span> </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>

                        <li class="treeview"id="leave-menu">
                            <a href="javascript:;"><i class="fa icon-minus-circle"></i><span>Leave Application</span> <i class="fa pull-right icon-keyboard_arrow_right"></i></a>
                            <ul class="treeview-menu">
                                <li class="@if(@$active=='leavecategorylist'){{'active'}}@endif">
                                    <a href="{{ route('showleaveCategory') }}" style="margin-left: 0px;"><span>Leave Category</span> </a>
                                </li>
                                <li class="@if(@$active=='leavesssign_list'){{'active'}}@endif">
                                    <a href="{{ route('leaveAssign') }}" style="margin-left: 0px;"><span>Leave Assign</span> </a>
                                </li>
                                <li class="@if(@$active=='leaveapply_list'){{'active'}}@endif">
                                    <a href="{{ route('leaveApply') }}" style="margin-left: 0px;"><span>Leave Apply</span> </a>
                                </li>
                                <li class="@if(@$active=='leaveapplicaton_list'){{'active'}}@endif">
                                    <a href="{{ route('leaveApplication') }}" style="margin-left: 0px;"><span>Leave Application</span> </a>
                                </li>
                            </ul>
                        </li>

                        <li class="treeview" id="report-menu">
                            <a href="javascript:;"><i class="fa icon-exam"></i><span>Reports</span> <i class="fa pull-right icon-keyboard_arrow_right"></i></a>
                            <ul class="treeview-menu">
                                <li class="@if(@$active=='class_report_list'){{'active'}}@endif">
                                <a href="{{ route('classReport') }}"><span>Class Report</span> </a>
                                </li>
                                <li class="@if(@$active=='timetable_report_list'){{'active'}}@endif">
                                <a href="{{ route('timetableReport') }}"><span>Time Table Report</span> </a>
                                </li>
                                <li class="@if(@$active=='attandace_report_list'){{'active'}}@endif">
                                <a href="{{ route('attandanceReport') }}"><span>Attendance Report</span> </a>
                                </li>
                                <li class="@if(@$active=='student_report_list'){{'active'}}@endif">
                                <a href="{{ route('studentReport') }}"><span>Student Report</span> </a>
                                </li>
                                <li class="@if(@$active=='teacher_report_list'){{'active'}}@endif">
                                <a href="{{ route('teacherReport') }}"><span>Teacher Report</span> </a>
                                </li>
                                <li class="@if(@$active=='parent_report_list'){{'active'}}@endif">
                                <a href="{{ route('parentReport') }}"><span>Parent Report</span> </a>
                                </li>
                                <li class="@if(@$active=='user_report_list'){{'active'}}@endif">
                                <a href="{{ route('userReport') }}"><span>User Report</span> </a>
                                </li>
                                </ul>
                        </li>



                        <li class="treeview"id="book-menu">
                            <a href="javascript:;"><i class="fa icon-book"></i><span>Library</span> <i class="fa pull-right icon-keyboard_arrow_right"></i></a>
                            <ul class="treeview-menu">
                                <!-- <li class="@if(@$active=='memberlist'){{'active'}}@endif">
                                    <a href="{{ route('showLibrarymember') }}"><span>Member</span> </a>
                                </li> -->
                                <li class="@if(@$active=='booklist'){{'active'}}@endif">
                                    <a href="{{ route('showBook') }}"></i><span>Books</span> </a>
                                </li>
                                <li class="@if(@$active=='bookissue_list'){{'active'}}@endif">
                                    <a href="{{ route('showBookissue') }}"><span>Issue</span> </a>
                                </li>
                            </ul>
                        </li>

                        <li class="treeview"id="hostel-menu">
                            <a href="javascript:;"><i class="fa icon-home"></i><span>Hostel</span> <i class="fa pull-right icon-keyboard_arrow_right"></i></a>
                            <ul class="treeview-menu">
                                <li class="@if(@$active=='hostlist'){{'active'}}@endif">
                                    <a href="{{ route('showHostel') }}" ><span>Hostel</span> </a>
                                </li>
                                <li class="@if(@$active=='host_category_list'){{'active'}}@endif">
                                    <a href="{{ route('showHostelCategory') }}"><span>Category</span> </a>
                                </li>
                                <li class="@if(@$active=='hmember_list'){{'active'}}@endif">
                                    <a href="{{ route('showHostelMember') }}"></i><span>Member</span> </a>
                                </li>
                            </ul>
                        </li>

                        <li class="treeview" id="settings-menu">
                            <a href="javascript:;"><i class="fa icon-settings"id="tax_locavdvtion"></i> <span>Settings</span> <i class="fa pull-right icon-keyboard_arrow_right"></i></a>
                            <ul class="treeview-menu">
                                <li class="" id="general-settings-menu">
                                    <a href="{{ route('showSetting') }}"><span>General Settings</span> </a>
                                </li>
                                <li class="treeview"id="administrator-menu">
                                    <a href="javascript:;"><span>Administrator settings</span> <i class="fa pull-right icon-keyboard_arrow_right"></i></a>
                                    <ul class="treeview-menu">
                                        <li class="@if(@$active=='academicyearlist'){{'active'}}@endif">
                                            <a href="{{ route('showAcademicYear') }}" ><span>Academic Year</span> </a>
                                        </li>
                                        <li class="@if(@$active=='studentgrouplist'){{'active'}}@endif">
                                            <a href="{{ route('showStudentGroup') }}" ><span>Student Group</span> </a>
                                        </li>
                                        <li class="@if(@$active=='feetypelist'){{'active'}}@endif">
                                            <a href="{{ route('showFeeType') }}" ><span>Fee Types</span> </a>
                                        </li>
                                        <li class="@if(@$active=='usertype_list'){{'active'}}@endif">
                                            <a href="{{ route('showUsertype') }}" ><span>User Type</span> </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="treeview"id="content-menu">
                                    <a href="javascript:;"><span>Content settings</span> <i class="fa pull-right icon-keyboard_arrow_right"></i></a>
                                    <ul class="treeview-menu">
                                        <li class="@if(@$active=='religionlist'){{'active'}}@endif">
                                            <a href="{{ route('showReligion') }}" ><span>Religions</span> </a>
                                        </li>
                                        <li class="@if(@$active=='castelist'){{'active'}}@endif">
                                            <a href="{{ route('showCaste') }}" ><span>Castes</span> </a>
                                        </li>
                                        <li class="@if(@$active=='extracurricularlist'){{'active'}}@endif">
                                            <a href="{{ route('showExtracurricular') }}" ><span>Extracurriculars</span> </a>
                                        </li>
                                        <li class="@if(@$active=='sportlist'){{'active'}}@endif">
                                            <a href="{{ route('showSport') }}" ><span>Sports</span> </a>
                                        </li>
                                        <li class="@if(@$active=='artlist'){{'active'}}@endif">
                                            <a href="{{ route('showArt') }}" ><span>Arts</span> </a>
                                        </li>
                                        <li class="@if(@$active=='musiclist'){{'active'}}@endif">
                                            <a href="{{ route('showMusic') }}" ><span>Musics</span> </a>
                                        </li>
                                        <li class="@if(@$active=='roomlist'){{'active'}}@endif">
                                            <a href="{{ route('showRoom') }}" ><span>Rooms</span> </a>
                                        </li>
                                        <li class="@if(@$active=='privilegeist'){{'active'}}@endif">
                                            <a href="{{ route('showPrivilege') }}" ><span>Privilege</span> </a>
                                        </li>

                                    </ul>
                                </li>
                                {{-- <li class="">
                                    <a href="{{ route('emailSettings') }}" ><span>Email Settings</span> </a>
                                </li>
                                <li class="">
                                    <a href="{{ route('paymentSettings') }}"><span>Payment Settings</span> </a>
                                </li> --}}
                                <li class="@if(@$active=='frontsetting_list'){{'active'}}@endif">
                                    <a href="{{ route('showfrontendSettings') }}" ></i><span>Frontend Settings</span> </a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>
            <aside class="right-side">
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12" id="app">
                            @yield('content')
                        </div>
                    </div>
                </section>
            </aside>

</div>

<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.css" rel="stylesheet">
<script src="https://cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.js"></script>

<script type="text/javascript" src="{{ asset('backend/bootstrap/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('backend/select2/select2.js')}}" ></script>
<script type="text/javascript" src="{{ asset('backend/common/style.js')}}"></script>
<script src="{{ asset('backend/toastr/toastr.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('backend/painterro/painterro-1.0.48.min.js')}}"></script>
<!-- <script type="text/javascript" src="{{ asset('backend/datatables/tools/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('backend/datatables/tools/dataTables.buttons.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('backend/datatables/tools/jszip.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('backend/datatables/tools/vfs_fonts.js')}}"></script>
<script type="text/javascript" src="{{ asset('backend/datatables/tools/buttons.html5.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('backend/datatables/dataTables.bootstrap.js')}}"></script> -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs/jszip-2.5.0/dt-1.10.22/af-2.3.5/b-1.6.5/b-colvis-1.6.5/b-flash-1.6.5/b-html5-1.6.5/b-print-1.6.5/cr-1.5.2/fc-3.3.1/fh-3.1.7/kt-2.5.3/r-2.2.6/rg-1.1.2/rr-1.2.7/sc-2.0.3/sb-1.0.0/sp-1.2.1/sl-1.3.1/datatables.min.js"></script>
<script type="text/javascript" src="{{ asset('backend/jquery-datatables-checkboxes-1.2.12/js/dataTables.checkboxes.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('backend/datepicker/datepicker.js')}}"></script>
<script type="text/javascript" src="{{ asset('backend/daterangepicker/daterangepicker.js')}}"></script>
<script type="text/javascript" src="{{ asset('backend/daterangepicker/moment.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('backend/common/common.js') }}"></script>
<script type="text/javascript" src="{{ asset('backend/autofill/jquery.disableAutoFill.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('backend/dropzone-5.7.0/dist/min/dropzone.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ladda-bootstrap/0.9.4/ladda.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ladda-bootstrap/0.9.4/spin.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Uniform.js/4.3.0/js/jquery.uniform.bundled.js" integrity="sha512-gJttPpQKEpc0J8xUGAhOPeMhtPNhQZGChfrrFocLyPgPOxyNdp6sMxTGj7hPIgRAsYYS9P4TqKGgLahJuzCb+g==" crossorigin="anonymous"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js" integrity="sha512-lC8vSUSlXWqh7A/F+EUS3l77bdlj+rGMN4NB5XFAHnTR3jQtg4ibZccWpuSSIdPoPUlUxtnGktLyrWcDhG8RvA==" crossorigin="anonymous"></script>
<script src="https://raw.githubusercontent.com/phstc/jquery-dateFormat/master/dist/jquery-dateformat.min.js"></script>
<script type="text/javascript">
  $(document).ready(function () {
    $(document).ajaxStart(function () {
      $("#loading").show();
    }).ajaxStop(function () {
      $("#loading").hide();
    });
  });

  $(document).ready(function () {
    $('#example3, #example1, #example2').DataTable({
      dom : 'Bfrtip',
      buttons : [
        'copyHtml5',
        'excelHtml5',
        'csvHtml5',
        'pdfHtml5'
      ],
      search : false
    });
  });
</script>

<script type="text/javascript">
  $(function () {
    $("#withoutBtn").dataTable();
  });
</script>
<script>
    function Whiteboard() {
        //var Board = document.getElementById("Whiteboard");
        Painterro().show()
    }
</script>


@yield('scripts')
{{-- <script src="{{ asset('js/app.js') }}"></script> --}}
<script src="{{ mix('js/app.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/vue-chat-scroll/dist/vue-chat-scroll.min.js"></script>
</body>
</html>

