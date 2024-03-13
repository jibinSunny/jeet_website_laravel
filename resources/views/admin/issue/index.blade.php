@extends('layouts.admin')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-issue"></i> Issue</h3>


        <ol class="breadcrumb">
            <li><a href=""><i class="fa icon-dashboardIcon"></i> Dashboard</a></li>
            <li class="active">Issue</li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">
            <h5 class="page-header">
                        <a href="{{ route('addBookissue') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg> Issue a Book</a>
                    </h5>

                    <!-- <div class="col-lg-6 col-lg-offset-3 list-group">
                        <div class="list-group-item list-group-item-warning">
                            <form style="" class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
                                <div class='form-group' >
                                    <label for="lid" class="col-sm-3 control-label">
                                        Library ID <span class="text-red">*</span>
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="lid" name="lid" value="" >
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="submit" class="btn btn-success iss-mar" value="Search" >
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div> -->

                <div class="col-sm-12">
                    <div class="row">
                        <div id="hide-table">
                            <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Serial No</th>
                                        <th>Uer Type</th>
                                        <th>Library Member</th>
                                        <th>Class</th>
                                        <th>Division</th>
                                        <th>Book</th>
                                        <th>Issue Date</th>
                                        <th>Due Date</th>
                                        <th>Return Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($bookissue as $row)
                                <tr>
                                    <td data-title="">{{ $loop->iteration }}</td>
                                    <td data-title="">{{ $row->seriel_no }}</td>
                                    <td data-title="">{{ isset($row->user_types->name )?$row->user_types->name :''}}</td>
                                    <td data-title="">{{ $row->user_name['first_name']}}</td>
                                    <td data-title="">{{ isset($row->bookname->name )?$row->bookname->name :''}}</td>
                                    <td data-title="">{{ isset($row->classname->name )?$row->classname->name :''}}</td>
                                    <td data-title="">{{ isset($row->divisionname->name )?$row->divisionname->name :''}}</td>     
                                    <td data-title="">{{date('d-M-y',strtotime($row->issued_date))}} </td>
                                    <td data-title="">{{date('d-M-y',strtotime($row->due_date))}} </td>
                                    <td data-title="">{{date('d-M-y',strtotime($row->return_date))}}</td>
                                    <td data-title="Action">
                                    <a href="{{route('editBookissue',['categoryId'=> $row->id])}}" class="btn btn-warning btn-xs mrg" data-placement="top" data-toggle="tooltip" data-original-title="Edit">Edit

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
    </div>
</div>

    <!-- For invoice -->
    <form class="form-horizontal" role="form" action="" method="post">
        <div class="modal fade" id="invoice">
          <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <input type="text" class="form-control" id="libraryID" name="libraryID" value="" style="display:none" >
                    <div class="form-group">
                        <label for="amount" class="col-sm-2 control-label">
                            <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="amount" name="amount" value="" >
                        </div>
                        <span class="col-sm-4 control-label" id="amount_error">
                        </span>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" style="margin-bottom:0px;" data-dismiss="modal"></button>
                    <input type="button" id="add_invoice" class="btn btn-success" value="" />
                </div>
            </div>
          </div>
        </div>
    </form>
    <!-- email end here -->

@endsection
@section('scripts')
<script type="text/javascript">
      $('#add_invoice').click(function() {
          var amount = $('#amount').val();
          var libraryID = $('#libraryID').val();
          if(amount != '') {
              if(amount.length < 21) {
                  var valid = !/^\s*$/.test(amount) && !isNaN(amount);
                  if(valid) {
                      $.ajax({
                          type: 'POST',
                          url: "",
                          data: {'libraryID' : libraryID, 'amount' : amount},
                          dataType: "html",
                          success: function(data) {
                              window.location.href = data;
                          }
                      });

                      $('#amount_error').html("");
                  } else {
                      $('#amount_error').html("").css('color', 'red');
                  }
              } else {
                   $('#amount_error').html("").css('color', 'red');
              }
          } else {
              $('#amount_error').html("").css('color', 'red');
          }
      });
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
  $('#book-menu').addClass('active')
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
                            url: "{{url('admin/bookissue/delete')}}?categoryId=" + categoryId,
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
