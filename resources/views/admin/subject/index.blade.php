@extends('layouts.admin')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-subject"></i> Subject</h3>

        <ol class="breadcrumb">
            <li><a href=""><i class="fa icon-dashboardIcon"></i> Dashboard</a></li>
            <li class="active">Subject</li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">
                <h5 class="page-header">
                        <a href="{{ route('addSubject') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg> Add Subject
                        </a>

                        <!-- <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12 pull-right drop-marg">
                        </div> -->
                </h5>

                <div id="hide-table">
                    <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer">
                        <thead>
                            <tr>
                            <th>#</th>
                                <th>Subject Name</th>
                                <th>Subject Author</th>
                                <th>Subject Code</th>
                                <th>Class Name</th>
                                <th>Pass Mark</th>
                                <th>Final Mark</th>
                                <th>Note</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                        @foreach($subject_list as $row)
                            <tr>
                                <td data-title="">{{ $loop->iteration}}</td>
                                <td data-title="">{{ $row->name}}</td>
                                <td data-title="">{{ $row->author}}</td>
                                <td data-title="">{{ $row->subject_code}}</td>
                                <td data-title="">{{ isset($row->classname->name)?$row->classname->name:''}}</td>
                                <td data-title="">{{ $row->pass_mark}}</td>
                                <td data-title="">{{ $row->total_mark}}</td>
                                <td data-title=""style="width:100px">{{ $row->note}}</td>
                                <td data-title="Action"style="width:100px">
                                    <a href="{{route('editSubject',['categoryId'=> $row->id])}}" class="btn btn-warning btn-xs mrg" data-placement="top" data-toggle="tooltip" data-original-title="Edit">Edit</i>
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
    $('#academic-menu').addClass('active')
</script>
<script>
    $('.delete-button').on('click', function() {
        var categoryId = $(this).data('id');
        $.confirm({

            title: 'Delete Subject ?',
            buttons: {
                deleteUser: {
                    text: 'delete',
                    action: function() {
                        $.ajax({
                            type: "GET",
                            url: "{{url('admin/subject/delete')}}?categoryId=" + categoryId,
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
