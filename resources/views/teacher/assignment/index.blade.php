@extends('layouts.teacher')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-assignment"></i> Assignment</h3>
        <ol class="breadcrumb">
            <li><a href="{{ route('showDashboard') }}"><i class="fa icon-dashboardIcon"></i> Dashboard</a></li>
            <li class="active">Assignment</li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="box-body">
                <div class="row">
                <h5 class="page-header">
                    <a href="{{ route('addTeacherAssignment') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus">
                            <line x1="12" y1="5" x2="12" y2="19"></line>
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg> Add Assignment
                    </a>
                </h5>
         
                </div><!-- row -->
            </div><!-- Body -->

            <div class="col-sm-12">
                <div id="hide-table">
                    <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Deadline</th>
                                <th>Subject</th>
                                <th>Calss</th>
                                <th>Division</th>
                                <th>Academic Year</th>
                                <th>Attachment</th>
                                <th class="col-lg-3">Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($assignmentlist as $row)
                            <tr>
                                <td data-title="">{{ $loop->iteration }}</td>
                                <td data-title="">{{ $row->name }}</td>
                                <td data-title="">{{ $row->category }}</td>
                                <td data-title="">{{date('Y-m-d',strtotime($row->deadline_date))}}</td>
                                <td data-title="">{{ isset($row->subjectname->name)?$row->subjectname->name:''}}</td>
                                <td data-title="">{{ isset($row->classname->name)?$row->classname->name:''}}</td>
                                <td data-title="">{{ isset($row->divisionname->name)?$row->divisionname->name:''}}</td>
                                <td data-title="">{{ isset($row->academic_yearname->name)?$row->academic_yearname->name:''}}</td>
                                <td data-title=""><a href="{{ asset('storage/assignment-file/'.$row->file) }}" class="btn btn-success btn-xs mrg" data-placement="top" data-toggle="tooltip" data-original-title="Download" download>download.png</a></td>
                                <td data-title="">{{substr($row->description,0,10)}}</td>
                                <td style="width: 156px;">
                                    <a href="{{route('editTeacherAssignment',['categoryId'=> $row->id])}}" class="btn btn-warning btn-xs mrg" data-placement="top" data-toggle="tooltip" data-original-title="Edit">Edit
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
        @if(Session::has('errors'))
        @foreach($errors -> all() as $error)
        toastr.error('{{ $error }}', 'Error');
        @endforeach
        @endif
    });
</script>
<script>
    $('.delete-button').on('click', function() {
        var categoryId = $(this).data('id');
        $.confirm({

            title: 'Delete Books?',
            buttons: {
                deleteUser: {
                    text: 'delete',
                    action: function() {
                        $.ajax({
                            type: "GET",
                            url: "{{url('teacher/assignment/delete')}}?categoryId=" + categoryId,
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