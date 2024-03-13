@extends('layouts.admin')
@section('content')

<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-lbooks"></i> Books</h3>


        <ol class="breadcrumb">
            <li><a href="{{ route('showDashboard') }}"><i class="fa icon-dashboardIcon"></i> Dashboard</a></li>
            <li class="active">Books</li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">
                    <h5 class="page-header">
                        <a href="{{ route('addBook') }}">

                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg> Add Book
                        </a>
                    </h5>

                <div id="hide-table">
                    <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer">
                        <thead>
                            <tr>
                                <th class="col-sm-1">#</th>
                                <th class="col-sm-2">Name</th>
                                <th class="col-sm-2">Category</th>
                                <th class="col-sm-2">Author</th>
                                <th class="col-sm-2">Subject Code</th>
                                <th class="col-sm-1">Price</th>
                                <th class="col-sm-1">Quantity</th>
                                <th class="col-sm-1">Min Quantity</th>
                                <th class="col-sm-1">Rack No</th>
                                <th class="col-sm-1">PDF</th>
                                <th class="col-sm-1">Status</th>
                                <th class="col-sm-1"style="width: 350px;">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                        @foreach($book as $row)
                                <tr>
                                    <td data-title="">{{ $loop->iteration }}</td>
                                    <td data-title="">{{ $row->name }}</td>
                                    <td data-title="">@if($row->category =="1")Academic @else General @endif</td>
                                    <td data-title="">{{ $row->author }}</td>
                                    <td data-title="">{{ isset($row->subjects->name)?$row->subjects->name:''}}</td>
                                    <td data-title="">{{ $row->price }}</td>
                                    <td data-title="">{{ $row->quantity }}</td>
                                    <td data-title="">{{ $row->minimum_quantity }}</td>
                                    <td data-title="">{{ $row->rack }}</td>
                                    <td data-title=""><a href="{{ asset('book/Pdf/'.$row->pdf) }}">view Pdf</a></td>
                                    <td>@if($row->status=="available")<span class="btn btn-success btn-xs">{{ "Available" }}</span>
                                        @else<span class="btn btn-danger btn-xs ">{{ "UnAvailable" }}</span>@endif</td>
                                    <!-- <td data-title=""><button class="btn btn-success btn-xs">Available</button></td> -->
                                    <td style="width: 156px;">
                                    <a href="{{route('editBook',['categoryId'=> $row->id])}}" class="btn btn-warning btn-xs mrg" data-placement="top" data-toggle="tooltip" data-original-title="Edit">Edit

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
  $('#book-menu').addClass('active')
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
                            url: "{{url('admin/book/delete')}}?categoryId=" + categoryId,
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
