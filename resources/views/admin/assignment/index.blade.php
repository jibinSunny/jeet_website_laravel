@extends('layouts.admin')
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
                    <a href="{{ route('addAssignment') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus">
                            <line x1="12" y1="5" x2="12" y2="19"></line>
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg> Add Assignment
                    </a>
                </h5>
                    <form id='category-add-form'action="{{ route('showAssignment') }}" method="POST">
                    @csrf
                        <div class="col-sm-12">
                            <div class="form-group col-sm-4" id="classes1">
                                <label>Class<span class="text-red"> * </span></label>
                                <select name="class" id="class" class="form-control select2" tabindex="-1">
                                    <option selected disabled>Select Class</option>
                                    @foreach($classes as $row)
                                    <option value="{{ $row->id}}"{{$class_id ==$row->id ? 'selected' :''}}>{{ $row->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-sm-4" id="division1">
                                <label>Division<span class="text-red"> * </span></label>
                                <select id="division" name="division" class="form-control select2">
                                    <option selected disabled>Select Division</option>
                                    @if($division_id !="")
                                    @foreach($all_division as  $row)
                                    <option value="{{ $row->id}}"{{$division_id ==$row->id ? 'selected' :''}}>{{ $row->name}}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>

                            <div class="form-group col-sm-3" id="subject1">
                                <label>Subject<span class="text-red"> * </span></label>
                                <select id="subject" name="subject" class="form-control select2">
                                    <option selected disabled>Select Subject</option>
                                    @if($subject_id !="")
                                    @foreach($all_subject as $row)
                                    <option value="{{ $row->id}}"{{$subject_id ==$row->id ? 'selected' :''}}>{{ $row->name}}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                            <!-- <div class="col-sm-4"> -->
                                <input type="submit" class="btn btn-success bg-lightsky mg-b-10 " style="margin-top: 20px;" value="Submit">

                            <!-- </div> -->
                        </div>
                    </form>


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
                                    <a href="{{route('editAssignment',['categoryId'=> $row->id])}}" class="btn btn-warning btn-xs mrg" data-placement="top" data-toggle="tooltip" data-original-title="Edit">Edit
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
                            url: "{{url('admin/assignment/delete')}}?categoryId=" + categoryId,
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
    $('#class').change(function() {
        var courseID = $(this).val();
        
        if (courseID) {
            if (courseID == "0")
            {
             $('#division').hide();
            }
            else{
                $.ajax({
                type: "GET",
                url: "{{url('admin/timetable/division/list')}}?categoryId=" + courseID,
                success: function(res) {
                    if (res) {
                        $("#division").empty();
                        $("#division").append('<option selected disabled>Select Division</option>');

                        for (var i = 0; i < res.length; ++i) {

                            $("#division").append('<option value="' + res[i].id + '">' + res[i].name + '</option>');
                        }

                    } else {
                        $("#division").empty();
                    }
                }
            });
        }
        }else {
            $("#division").empty();

        }
    });
    $('#class').change(function() {
        var weekID = $(this).val();
        //  alert(weekID);
        if (weekID) {
            if (weekID == "0")
            {
             $('#subject').hide();
            }
            else{
                $.ajax({
                type: "GET",
                url: "{{url('admin/timetable/subject/list')}}?categoryId=" + weekID,
                success: function(res) {
                    if (res) {
                        $("#subject").empty();
                        $("#subject").append('<option selected disabled>Select Subject</option>');

                        for (var i = 0; i < res.length; ++i) {

                            $("#subject").append('<option value="' + res[i].id + '">' + res[i].name + '</option>');
                        }

                    } else {
                        $("#subject").empty();
                    }
                }
            });
        }
        }else {
            $("#subject").empty();

        }
    })
</script>
@endsection