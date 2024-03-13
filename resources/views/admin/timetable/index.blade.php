@extends('layouts.admin')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-routine"></i> Time Table</h3>
        <ol class="breadcrumb">
            <li><a href=">"><i class="fa icon-dashboardIcon"></i> Dashboard</a></li>
            <li class="active">Time table</li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-xs-12 col-sm-2">
                <h5 class="page-header">
                    <a href="{{ route('addTimeTable') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus">
                            <line x1="12" y1="5" x2="12" y2="19"></line>
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg> Add Time Table
                    </a>
                </h5>
                <div class="studentDiv form-group">
                    <label for="studentID">
                        Class <span class="text-red">*</span>
                    </label>
                    <select name="classesID" id="classesID" class="form-control select2 select2-offscreen" tabindex="-1">
                        <option selected disabled>Select Class</option>
                        @foreach($classes as $classess)
                        <option value="{{$classess->id}}">{{$classess->name}}</option>
                        @endforeach
                    </select>
                    <span class="text-red">
                    </span>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                    <li class="active"><a  href="{{route('showTimeTable')}}">All timetables</a></li>
       
                             <li class="" id="division"><a data-toggle="tab" href="#" aria-expanded="false"></a></li>
                        
                    </ul>
<!-- 
                    <div class="tab-content" id="scrolling">
                        <div id="all" class="tab-pane active">
                            <div id="hide-table-2">
                                <table id="table" class="table table-bordered ">
                                    <tbody>
                                        <tr>
                                            <td>SUNDAY</td>
                                        </tr>
                                        <tr>
                                            <td>MONDAY</td>
                                        </tr>
                                        <tr>
                                            <td>TUESDAY</td>
                                        </tr>
                                        <tr>
                                            <td>WEDNESDAY</td>
                                        </tr>
                                        <tr>
                                            <td>THURSDAY</td>
                                        </tr>
                                        <tr>
                                            <td>FRIDAY</td>
                                        </tr>
                                        <tr>
                                            <td>SATURDAY</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> -->

                    <div id="show" class="tab-pane">
                        <div id="hide-table-2">
                            <table id="table" class="table table-bordered ">
                            <tbody id="all_course">
                            @foreach($timetable_list as $row)
                            <tr> <td class="text-center">{{$row->day}}</td>
                            <td class='text-center'>{{$row->start_time}} - {{$row->end_time}}</br>{{$row->teachername->first_name}} {{$row->teachername->last_name}}</br>{{$row->classname->name}}</br>{{$row->divisionname->name}}</br>{{$row->departmentname->name}}</br>{{$row->subjectname->name}}
                            </br>{{$row->roomname->name}}</br>
                            <a href="{{route('editTimeTable',['categoryId'=> $row->id])}}"   class="btn btn-warning btn-xs mrg" data-placement="top" data-toggle="tooltip" data-original-title="Edit">Edit</i>
                            <a href="#" class="btn btn-danger btn-xs mrg delete-button" data-id="{{$row->id}}" data-placement="top" data-toggle="tooltip" data-original-title="Delete">Delete</a></td></tr>
                            @endforeach
                            </tbody>
                            </table>
                        </div>

                    </div>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        @if(Session::has('success'))
        toastr.success('{{ Session::get('
            success ') }}', 'Successful');
        @endif
        @error('name')
        toastr.error('{{ $message }}');
       @enderror
    });
</script>
<script>
$(document).on('click', '.delete-button', function(e) {
        var categoryId = $(this).data('id');
        $.confirm({
            title: 'Delete Subject ?',
            buttons: {
                deleteUser: {
                    text: 'delete',
                    action: function() {
                        $.ajax({
                            type: "GET",
                            url: "{{url('admin/timetable/delete')}}?categoryId=" + categoryId,
                            success: function(data) {
                                if (data.status == 1) {
                                    toastr.success('Deleted Successfully.');
                                    $('#timeid').removeAttr('checked').prop('checked', false);
                                    setTimeout(function() {
                                        window.location.href = "";
                                    }, 500);

                                } else {
                                    toastr.error('Something went wrong. please try again.');
                                    $('#timeid').removeAttr('checked').prop('checked', false);
                                }
                            }
                        });
                    }
                },
                cancelAction: function() {
                    $.alert('canceled');
                }
            }
        });
    });
</script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script type="text/javascript">
    $('#classesID').change(function() {
        var classesID = $(this).val();
        if (classesID == 0) {
            $('#table').hide();
            $('.nav-tabs-custom').hide();
        } else {
            // location.assign("{{url('admin/timetable/view')}}?categoryId=" + classesID);
            $.ajax({
                type: "GET",
                url: "{{url('admin/timetable/view')}}?categoryId=" + classesID,
                success: function(res) {
                    if (res.assignmentlist.length == "0")
                    {
                    toastr.error('No Time Table Created This Class');
                    // window.location.href= "{{url('admin/timetable/index')}}";
                    }
                    else
                    {
                     $('#scrolling').hide();
                     $('#show').show();
                     $('#division').empty();
                     let html = ''
                        html = '(Division '
                        for (var i = 0; i < res.division.length; ++i) {
                            html += `${res.division[i].name}, `

                        }
                        html += ')'
                        $("#division").append('<a data-toggle="tab" href="#" aria-expanded="false">'+ html +'</a>');
                     $("#all_course").empty();
                        for (var i = 0; i < res.assignmentlist.length; ++i) {

                            $("#all_course").append(`<tr> <td class="text-center">${res.assignmentlist[i]['day']}</td>
                            <td class='text-center'>${res.assignmentlist[i]['start_time']} - ${res.assignmentlist[i]['end_time']}</br>${res.assignmentlist[i]['teachername']['first_name']} ${res.assignmentlist[i]['teachername']['last_name']}</br>${res.assignmentlist[i]['classname']['name']}</br>${res.assignmentlist[i]['divisionname']['name']}</br>${res.assignmentlist[i]['departmentname']['name']}</br>${res.assignmentlist[i]['subjectname']['name']}</br>${res.assignmentlist[i]['roomname']['name']}</br>
                            <a href="{{ url('admin/timetable/edit') }}/${res.assignmentlist[i]['id']}"   class="btn btn-warning btn-xs mrg" data-placement="top" data-toggle="tooltip" data-original-title="Edit">Edit</i>
                            <a href="#" class="btn btn-danger btn-xs mrg delete-button" data-id="${res.assignmentlist[i]['id']}" data-placement="top" data-toggle="tooltip" data-original-title="Delete">Delete</a></td></tr> `);
                        }

                    }
                }
            });
        }
    });

    $('.select2').select2();
    var mainWidth = $('html').width();
    if (mainWidth >= 980) {
        $('.tab-pane').mCustomScrollbar({
            axis: "x" // horizontal scrollbar
        });
    }
</script>
@endsection
