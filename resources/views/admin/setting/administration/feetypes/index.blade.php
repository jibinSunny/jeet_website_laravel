@extends('layouts.admin')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-feetypes"></i> Fee Types</h3>


        <ol class="breadcrumb">
            <li><a href=""><i class="fa icon-dashboardIcon"></i> Dashboard</a></li>
            <li class="active">Fee Type</li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">
                    <h5 class="page-header">
                        <a href="{{ route('addFeeType') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg> Add a Fee Type
                        </a>
                    </h5>

                <div id="hide-table">
                    <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer">
                        <thead>
                            <tr>
                                <th class="col-sm-2">#</th>
                                <th class="col-sm-2">Fee Type</th>
                                <th class="col-sm-2">Fee ID</th>
                                <th class="col-sm-2">Description</th>
                                <th class="col-sm-2">Generating Duration</th>
                                <th class="col-sm-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($feetypelist as $row)
                                <tr>
                                    <td data-title="">{{ $loop->iteration }}</td>
                                    <td data-title="">{{ $row->name }}</td>
                                    <td data-title="">{{ $row->fee_id }}</td>
                                    <td data-title="">{{ $row->note }}</td>
                                    <td data-title="">@if($row->duration == '0') Occasionaly  @elseif($row->duration == '12') Monthly @elseif($row->duration == '4')Quarterly @elseif($row->duration == '2') Half-Yearly @elseif($row->duration == '1') Yearly @endif</td>
                                    <td data-title="Action">
                                    <a href="{{route('editFeeType',['categoryId'=> $row->id])}}" class="btn btn-warning btn-xs mrg" data-placement="top" data-toggle="tooltip" data-original-title="Edit">Edit

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
  $('#settings-menu').addClass('active')
  $('#administrator-menu').addClass('active')
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

            title: 'Delete academic year ?',
            buttons: {
                deleteUser: {
                    text: 'delete',
                    action: function() {
                        $.ajax({
                            type: "GET",
                            url: "{{url('admin/setting/administrator/feeType/delete')}}?categoryId=" + categoryId,
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
