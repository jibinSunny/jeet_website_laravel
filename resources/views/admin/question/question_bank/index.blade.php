@extends('layouts.admin')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-pencil"></i> Question Bank</h3>
        <ol class="breadcrumb">
            <li><a href="{{ route('showDashboard') }}"><i class="fa icon-dashboardIcon"></i> Dashboard</a></li>
            <li class="active">Question Bank</li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">
                    <h5 class="page-header">
                        <a href="{{ route('addQuestionBank') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg> Add Question
                        </a>
                    </h5>

                <div id="hide-table">
                    <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer">
                        <thead>
                            <tr>
                                <th class="col-lg-1">#</th>
                                <th class="col-lg-2">Question</th>
                                <th class="col-lg-1">Level</th>
                                <th class="col-lg-1">Class</th>
                                <th class="col-lg-1">Subject</th>
                                <th class="col-lg-1">Type</th>
                                <th class="col-lg-1">Options</th>
                                <th class="col-lg-1">Answer</th>
                                <th class="col-lg-1">upload</th>
                                <th class="col-lg-3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                               @foreach($allquestion as $row)
                                <tr>
                                    <td data-title="">{{ $loop->iteration}}</td>
                                    <td data-title="">{{ strip_tags($row->question)}}</td>
                                    <td data-title="">{{ isset($row->levels->name)?$row->levels->name:''}}</td>
                                    <td data-title="">{{ isset($row->classes->name)?$row->classes->name:''}}</td>
                                    <td data-title="">{{ isset($row->subjects->name)?$row->subjects->name:''}}</td>
                                    <td data-title="">{{ isset($row->types->name)?$row->types->name:''}}</td>
                                  
                                    <td data-title="">
                                    @foreach($row->option as $row1)
                                    {{ $loop->iteration}}.{{$row1['name']}} </br>
                                    @endforeach
                                    </td>
                                    <td data-title="">
                                    @if($row->option !="[]")   
                                    @foreach($row->option as $row1)
                                    @if($row1['answer'] == "1")   
                                    {{ $loop->iteration}}.{{$row1['name']}} </br>
                                    @endif
                                    @endforeach
                                   
                                    @else
                                    {{$row->answer}}
                                    @endif
                                    </td>
                                    <td data-title="">
                                    @if($row->upload !="") 
                                    <a href="{{ asset('questions/upload/'.$row->upload) }}" class="btn btn-success btn-xs mrg" data-placement="top" data-toggle="tooltip" data-original-title="Download"download>download.png</a>
                                    @endif 
                                   </td>
         
                                    <td data-title="Action">
                                        <a href="{{route('editQuestionBank',['categoryId'=> $row->id])}}" class="btn btn-warning btn-xs mrg" data-placement="top" data-toggle="tooltip" data-original-title="Edit">Edit</i>
                                        <a href="#" class="btn btn-danger btn-xs mrg delete-button" data-id="{{$row->id}}" data-placement="top" data-toggle="tooltip" data-original-title="Delete">Delete</a>
                                        </td>
                                </tr>
                                @endforeach
                        </tbody>
                    </table>
                </div>


            </div> <!-- col-sm-12 -->
        </div><!-- row -->
    </div><!-- Body -->
</div><!-- /.box -->

@endsection
@section('scripts')
<script>
  $('#exam-question-menu').addClass('active')
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
                            url: "{{url('admin/question_bank/delete')}}?categoryId=" + categoryId,
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
