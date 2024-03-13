@extends('layouts.admin')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-puzzle-piece"></i> Exam Schedule</h3>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa icon-dashboardIcon"></i> Dashboard</a></li>
            <li class="active">Exam Schedule</li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">

            <div class="studentDiv col-sm-3" style="float: right;">
                <label for="studentID">
                    Class <span class="text-red">*</span>
                </label>
                <select name="classesID" id="classesID" class="form-control select2 select2-offscreen" tabindex="-1">
                <option selected disabled>Select Class</option>
                        @foreach($allclass as $row)
                        <option value="{{$row->id}}">{{$row->name}}</option>
                        @endforeach
                </select>
                <span class="text-red">
                </span>
            </div>
                    <h5 class="page-header">
                                <a href="{{ route('addexamSchedule') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg> Add Exam Schedule
                                </a>

                            <!-- <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12 pull-right drop-marg">
                            </div> -->
                    </h5>

                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#all" aria-expanded="true">All Exam Schedules</a></li>
                            <li class="" id="division"><a data-toggle="tab" href="#" aria-expanded="false"></a></li>
                        </ul>

                        <div class="tab-content">
                            <div id="all" class="tab-pane active">
                                <div id="hide-table">
                                    <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Exam Name</th>
                                                <th>Exam Category</th>
                                                <th>Instruction</th>
                                                <th>Class</th>
                                                <th>Division</th>
                                                <th>Subject</th>
                                                <th>Date</th>
                                                <th>Time</th>
                                                <th>Room</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id=shedulelist>
                                        @foreach($examschedulelist as $row)
                                                <tr>
                                                    <td data-title="">{{ $loop->iteration}}</td>
                                                    <td data-title="">{{$row->name }}</td>
                                                    <td data-title="">{{ isset($row->exams_category->name)?$row->exams_category->name:''}}</td>
                                                    <td data-title="">{{ isset($row->instructions->title)?$row->instructions->title:''}}</td>
                                                    <td data-title="">{{ isset($row->classes->name)?$row->classes->name:''}}</td>
                                                    <td data-title="">{{ isset($row->divisions->name)?$row->divisions->name:''}}</td>
                                                    <td data-title="">{{ isset($row->subjects->name)?$row->subjects->name:''}}</td>
                                                    <td data-title="">{{date('d-M-y',strtotime($row->edate))}}</td>
                                                    <td data-title="">{{date('h:i A',strtotime($row->examfrom))}} - {{date('h:i A',strtotime($row->examto))}}</td>
                                                    <td data-title="">{{ isset($row->rooms->name)?$row->rooms->name:''}}</td>
                                                    <td data-title="Action">

                                                      <a href="{{route('editexamSchedule',['categoryId'=> $row->id])}}" class="btn btn-warning btn-xs mrg" data-placement="top" data-toggle="tooltip" data-original-title="Edit">Edit</i>

                                                      <a href="#" class="btn btn-danger btn-xs mrg delete-button" data-id="{{$row->id}}" data-placement="top" data-toggle="tooltip" data-original-title="Delete">Delete</a>
                                                  </td>
                                                </tr>
                                         @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div> <!-- nav-tabs-custom -->
            </div> <!-- col-sm-12 -->
        </div><!-- row -->
    </div><!-- Body -->
</div><!-- /.box -->

@endsection
@section('scripts')
<script type="text/javascript">
    $(".select2").select2();
</script>
<script>
    $(document).ready(function() {
        @if(Session::has('success'))
        toastr.success('{{ Session::get('
            success ') }}', 'Successful');
        @endif
        @if(Session::has('errors'))
        @foreach($errors -> all() as $error)
        toastr.error('{{ $error }}', 'Error');
        @endforeach
        @endif
    });
</script>
<script type="text/javascript">
    $('#classesID').change(function() {
        var classesID = $(this).val();
        //   alert(classesID);
            $.ajax({
                type: "GET",
                url: "{{route('examSchedulefilter')}}?categoryId=" + classesID,
                success: function(res) {
                    //  alert( res.examschedulelist.length);
                    // $('#loading').hide();
                       $('#shedulelist').empty();
                       $('#division').empty();
                        let html = ''
                        html = '(Division '
                        for (var i = 0; i < res.division.length; ++i) {
                            html += `${res.division[i].name}, `

                        }
                        html += ')'
                        $("#division").append('<a data-toggle="tab" href="#" aria-expanded="false">'+ html +'</a>');
                        for (var i = 0; i < res.examschedulelist.length; ++i) {
                            var date = "{{date('d-M-yy',strtotime(".res.examschedulelist[i]['edate'] . "))}}";
                            var date1 = "{{date('h:i A',strtotime(".res.examschedulelist[i]['examfrom'] . "))}}";
                            var date2 = "{{date('h:i A',strtotime(".res.examschedulelist[i]['examto'] . "))}}";
                            $("#shedulelist").append(`<tr>
                            <td data-title="">${i+1}</td>
                            <td data-title="">${res.examschedulelist[i]['exams']['name']} </td>
                            <td data-title="">${res.examschedulelist[i]['classes']['name']} </td>
                            <td data-title="">${res.examschedulelist[i]['divisions']['name']}</td>
                            <td data-title="">${res.examschedulelist[i]['subjects']['name']}</td>
                            <td data-title="">${date}</td>
                            <td data-title="">${date1}-${date2}</td>
                            <td data-title="">${res.examschedulelist[i]['rooms']['name']}</td>
                            <td data-title="Action">
                            <a href="{{ url('admin/examschedule/edit') }}/${res.examschedulelist[i]['id']}" class="btn btn-warning btn-xs mrg" data-placement="top" data-toggle="tooltip" data-original-title="Edit">Edit</i>
                            <a href="#" class="btn btn-danger btn-xs mrg delete-button" data-id="${res.examschedulelist[i]['id']}" data-placement="top" data-toggle="tooltip" data-original-title="Delete">Delete</a></td></tr> `);
                        }

                }
            });
 
    });
</script>
<script>
  $('#exam-menu').addClass('active')
</script>
<script>
   $(document).on('click', '.delete-button', function(e) {
        var categoryId = $(this).data('id');
        $.confirm({

            title: 'Delete Books?',
            buttons: {
                deleteUser: {
                    text: 'delete',
                    action: function() {
                        $.ajax({
                            type: "GET",
                            url: "{{url('admin/examschedule/delete')}}?categoryId=" + categoryId,
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
@endsection