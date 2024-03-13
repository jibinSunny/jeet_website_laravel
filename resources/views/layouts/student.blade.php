<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">

    <title>Student Dashdoard</title>

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
    <!-- <link href="{{ asset('backend/datatables/dataTables.bootstrap.css')}}" rel="stylesheet"> -->
    <link href="{{ asset('backend/datatables/dataTables.min.css')}}" rel="stylesheet">
    <link href="{{ asset('backend/common/themes/default/style.css')}}" rel="stylesheet">
    <link href="{{ asset('backend/common/hidetable.css')}}" rel="stylesheet">
    <link href="{{ asset('backend/common/themes/default/common.css')}}" rel="stylesheet">
    <link href="{{ asset('backend/common/responsive.css')}}" rel="stylesheet">
    <link href="{{ asset('backend/common/mailandmedia.css')}}" rel="stylesheet">
    <link href="{{ asset('backend/jquery-datatables-checkboxes-1.2.12/css/dataTables.checkboxes.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('backend/common/combined.css')}}">
    <link rel="stylesheet" href="{{ asset('backend/ajaxloder/ajaxloder.css')}}">
    <link rel="stylesheet" href="{{ asset('backend/select2/css/select2.css')}}">
    <link rel="stylesheet" href="{{ asset('backend/select2/css/select2-bootstrap.css')}}">
    <link rel="stylesheet" href="{{ asset('backend/datepicker/datepicker.css')}}">
    <link rel="stylesheet" href="{{ asset('backend/daterangepicker/daterangepicker.css')}}">
    <link rel="stylesheet" href="{{ asset('backend/smartwizard/smart_wizard_arrows.css')}}">
    <link rel="stylesheet" href="{{ asset('backend/smartwizard/new_custom_step.css')}}">
    <link rel="stylesheet" href="{{ asset('backend/switchery/switchery.min.css')}}">
    <link rel="stylesheet" href="{{ asset('backend/fullcalendar/fullcalendar.min.css')}}">
    <link rel="stylesheet" href="{{ asset('backend/vex-4.0.1/dist/css/vex-theme-default.css')}}">
    <link rel="stylesheet" href="{{ asset('backend/checkbox/checkbox.css')}}">

    <?php
    if (isset($headerassets)) {
        foreach ($headerassets as $assetstype => $headerasset) {
            if ($assetstype == 'css') {
                if (customCompute($headerasset)) {
                    foreach ($headerasset as $keycss => $css) {
                        echo '<link rel="stylesheet" href="' . base_url($css) . '">' . "\n";
                    }
                }
            } elseif ($assetstype == 'js') {
                if (customCompute($headerasset)) {
                    foreach ($headerasset as $keyjs => $js) {
                        echo '<script type="text/javascript" src="' . base_url($js) . '"></script>' . "\n";
                    }
                }
            }
        }
    }
    ?>

    <script type="text/javascript">
        $(window).load(function() {
            $(".se-pre-con").fadeOut("slow");;
        });
    </script>
</head>

<body class="skin-blue fuelux">
    <div class="se-pre-con"></div>
    <div id="loading">
        <img src="{{ asset('backend/ajaxloder/loader.gif') }}" width="150" height="150" />
    </div>
    <header class="header">
        <a href="#" class="logo">
            <img height="35px" src="{{ asset('frontend/icons/logo.svg') }}" />
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
                        <a href="#" class="dropdown-toggle my-push-message-a" data-toggle="dropdown">
                            <i class="fa icon-notice-board"></i>
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
                                Student
                                <i class="caret"></i>
                            </span>
                        </a>

                        <ul class="dropdown-menu">
                            <li class="user-body">
                                <div class="col-xs-6 text-center">
                                    <a href="{{route('studentProfile')}}">
                                        <div><i class="fa fa-briefcase"></i></div>
                                        Profile
                                    </a>
                                </div>
                                <div class="col-xs-6 text-center">
                                    <a href="{{route('studentPassword')}}">
                                        <div><i class="fa fa-lock"></i></div>
                                        Change Password
                                    </a>
                                </div>
                            </li>
                            <li class="user-footer">
                                <div class="text-center">
                                    <a href="{{ route('showStudentlogout') }}">
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
                        <p class="welcome-title">Hi {{ Auth::user()->first_name }} {{ Auth::user()->middle_name}} {{ Auth::user()->last_name}}</p>
                        <span class="welcome-user">
                            <i class="fa fa-angle-double-right color-green"></i>
                            {{-- Hi, Admin --}}
                        </span>
                    </div>
                </div>
                <ul class="sidebar-menu">
                    <li id="dashboard-menu">
                        <a href="{{ route('studentshowDashboard') }}"><i class="fa icon-dashboardIcon"></i><span>Dashboard</span> </a>
                    </li>
                    <li class="treeview" id="personal_reports">
                        <a href="javascript:;"><i class="fa icon-minus-circle"></i><span>Personal</span> <i class="fa pull-right icon-keyboard_arrow_right"></i></a>
                        <ul class="treeview-menu">
                            <li class="@if(@$active=='myprofile'){{'active'}}@endif"><a href="{{ route('myProfile') }}"><span>My Profile</span> </a></li>
                            <li class="@if(@$active=='mydiary'){{'active'}}@endif"><a href="{{ route('showDiary') }}"><span>My Diaries</span> </a></li>
                            <li class="@if(@$active=='staffdirectorylist'){{'active'}}@endif"><a href="{{ route('staffDirectory') }}"><span>Staff Directory</span> </a></li>
                            <li class="@if(@$active=='calander'){{'active'}}@endif"><a href="{{ route('Calander') }}"><span>Calender</span> </a></li>
                            <li class="treeview" id="student_leave-menu">
                                <a href="javascript:;"><span>Leave Application</span> <i class="fa pull-right icon-keyboard_arrow_right"></i></a>
                                <ul class="treeview-menu">
                                    <li class="@if(@$active=='student_leave_assigned'){{'active'}}@endif">
                                        <a href="{{ route('studentLeaveAssigned') }}" style="margin-left: 0px;"><span>Assigned Leave</span> </a>
                                    </li>
                                    <li class="@if(@$active=='student_leaveapply_list'){{'active'}}@endif">
                                        <a href="{{ route('studentleaveApply') }}" style="margin-left: 0px;"><span>Leave Apply</span> </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview" id="academic-menu">
                    <a href="javascript:;"><i class="fa icon-award"></i><span>Academic</span> <i class="fa pull-right icon-keyboard_arrow_right"></i></a>
                    <ul class="treeview-menu">
                        <li class="@if(@$active=='assignment_list'){{'active'}}@endif">
                            <a href="{{ route('studentAssignment') }}" style="margin-left: 0px;"><span>Assignment</span> </a>
                        </li>
                        <li class="@if(@$active=='subject_list'){{'active'}}@endif">
                            <a href="{{ route('studentSubject') }}" style="margin-left: 0px;"><span>Subject</span> </a>
                        </li>
                        <li class="@if(@$active=='library_list'){{'active'}}@endif">
                            <a href="{{ route('studentLibrary') }}" style="margin-left: 0px;"><span>Library</span> </a>
                        </li>
                        <li class="@if(@$active=='time_table_list'){{'active'}}@endif">
                            <a href="{{ route('studentTimeTable') }}" style="margin-left: 0px;"><span>Time Table</span> </a>
                        </li>
                        <li class="@if(@$active=='attandance_list'){{'active'}}@endif">
                            <a href="{{ route('studentAttandance') }}" style="margin-left: 0px;"><span>Attandance</span> </a>
                        </li>
                        <li class="@if(@$active=='event_list'){{'active'}}@endif">
                            <a href="{{ route('studentEvent') }}" style="margin-left: 0px;"><span>Events</span> </a>
                        </li>

                    </ul>
                </li>
                <li class="treeview" id="exam-menu">
                    <a href="javascript:;"><i class="fa icon-shield"></i><span>Exam</span> <i class="fa pull-right icon-keyboard_arrow_right"></i></a>
                    <ul class="treeview-menu">
                        <li class="@if(@$active=='exam_list'){{'active'}}@endif">
                            <a href="{{ route('studentExam') }}" style="margin-left: 0px;"><span>Exam Scheduled</span> </a>
                        </li>
                        <li class="@if(@$active=='attend_list'){{'active'}}@endif">
                            <a href="{{ route('studentExamAttend') }}" style="margin-left: 0px;"><span> Attend Exam </span> </a>
                        </li>
                        <li class="@if(@$active=='exam-result_list'){{'active'}}@endif">
                            <a href="{{ route('examResult') }}" style="margin-left: 0px;"><span>Exam Result</span> </a>
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
                    <div class="col-xs-12">
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
    <script type="text/javascript" src="{{ asset('backend/select2/select2.js')}}"></script>
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
        $(document).ready(function() {
            $(document).ajaxStart(function() {
                $("#loading").show();
            }).ajaxStop(function() {
                $("#loading").hide();
            });
        });

        $(document).ready(function() {
            $('#example3, #example1, #example2').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5'
                ],
                search: false
            });
        });
    </script>

    <script type="text/javascript">
        $(function() {
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
</body>

</html>
