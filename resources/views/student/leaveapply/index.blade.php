@extends('layouts.student')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa iniicon-leaveapply"></i> Leave Apply</h3>
        <ol class="breadcrumb">
        <li><a href=""><i class="fa icon-dashboardIcon"></i> Dashboard</a></li>
            <li class="active"> Apply Leave</li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">
                        <h5 class="page-header">
                            <a href="{{ route('studentaddleaveApply') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg> Add a Leave Application
                            </a>
                        </h5>
                <div id="hide-table">
                    <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Applicat Name</th>
                                <th>Category</th>
                                <th>Date</th>
                                <th>Schedule</th>
                                <th>Days</th>
                                <th>Reson</th>
                                <th>Action Reson</th>
                                <th>Attachment</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($leaveapply_list as $row)
                                <tr>
                                    <td data-title="">{{ $loop->iteration }}</td>
                                    <td data-title="">{{ isset($row->studentname->first_name)?$row->studentname->first_name:''}} {{ isset($row->studentname->last_name)?$row->studentname->last_name:''}}</td>
                                    <td data-title="">{{ isset($row->leave_categoryname->name)?$row->leave_categoryname->name:''}}</td>
                                    <td data-title="">{{date('D-M-Y ',strtotime($row->apply_date))}}</td>
                                    <td data-title="">{{date('D-M-Y ',strtotime($row->from_date))}} - {{date('D-M-Y ',strtotime($row->to_date))}}</td>
                                    <td data-title="">{{$row->leave_days}}</td>
                                    <td data-title="">{{$row->reason}}</td>
                                    <td data-title="">{{$row->action_reason}}</td>
                                    <td data-title=""><a href="{{ asset('user-files/teacher/attachment/apply_leave/'.$row->attachment) }}" class="btn btn-success btn-xs mrg" data-placement="top" data-toggle="tooltip" data-original-title="Download"download>download.png</a></td>
                                    <td data-title="">@if($row->status=="0")<span class="btn btn-warning btn-xs mrg">{{ "pending" }}</span>
                                        @elseif($row->status=="1") <span class="btn btn-success btn-xs ">{{ "Approval" }}</span> @else <span class="btn btn-danger btn-xs">{{ "Reject" }}</span>@endif</td>
                                    <td data-title="Action">
                                    <a href="{{route('studenteditleaveApply',['categoryId'=> $row->id])}}" class="btn btn-warning btn-xs mrg" data-placement="top" data-toggle="tooltip" data-original-title="Edit">Edit</a>
                                    <a href="#" class="btn btn-danger btn-xs mrg delete-button" data-id="{{$row->id}}" data-placement="top" data-toggle="tooltip" data-original-title="Delete">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                        </tbody>
                    </table>
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
  $('#student_leave-menu').addClass('active')
  $('#personal_reports').addClass('active')
</script>
<script>
    $('.delete-button').on('click', function() {
        var categoryId = $(this).data('id');
        $.confirm({

            title: 'Delete academic year ?',
            buttons: {
                deleteUser: {
                    text: 'delete',
                    action: function() {
                        $.ajax({
                            type: "GET",
                            url: "{{url('student/leaveapply/delete')}}?categoryId=" + categoryId,
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
