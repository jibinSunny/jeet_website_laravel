@extends('layouts.admin')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-member"></i> Hostel Member</h3>

        <ol class="breadcrumb">
            <li><a href=""><i class="fa icon-dashboardIcon"></i> Dashboard</a></li>
            <li class="active">Hostel Member</li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
        <div class="col-xs-12">

        <div class="studentDiv col-sm-2" style="float: right;">
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
                <a href="{{ route('addHostelMember') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg> Add Member
                </a>
            </h5>

        </div>

            <div class="col-sm-12">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a  href="{{route('showHostelMember')}}">All Members</a></li>
                          <li class="" id="division"><a data-toggle="tab" href="#" aria-expanded="false"></a></li>
                        </ul>

                        <div class="tab-content">
                            <div id="all" class="tab-pane active">
                                <div id="hide-table">
                                    <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer">
                                        <thead>
                                            <tr>
                                                <th class="col-sm-2">#</th>
                                                <th class="col-sm-2">Hostel Name</th>
                                                <th class="col-sm-2">Class Type</th>
                                                <th class="col-sm-2">Student Name</th>
                                                <th class="col-sm-2">Join Date</th>
                                                <th class="col-sm-2">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="mhostel">
                                        @foreach($hmember as $row)
                                                <tr>
                                                    <td data-title="">{{ $loop->iteration}}</td>
                                                    <td data-title="">{{ isset($row->hostelname->name )?$row->hostelname->name :''}}</td>
                                                    <td data-title="">{{ isset($row->hostelcategoryname->class_type )?$row->hostelcategoryname->class_type :''}}</td>
                                                    <td data-title="">{{ isset($row->studentlname->first_name )?$row->studentlname->first_name :''}}</td>
                                                    <!-- <td data-title="">{{ $row->hostel_balance }}</td> -->
                                                    <td data-title="">{{ $row->join_date }}</td>
                                                    <td data-title="Action">
                                                        <!-- <a href="" class="btn btn-primary btn-xs mrg" data-placement="top" data-toggle="tooltip" data-original-title="View">View</a> <a href="/hmember/edit/2/1" class="btn btn-warning btn-xs mrg" data-placement="top" data-toggle="tooltip" data-original-title="Edit">Edit</a> <a href="/hmember/delete/2/1" onclick="return confirm('you are about to delete a record. This cannot be undone. are you sure?')" class="btn btn-danger btn-xs mrg" data-placement="top" data-toggle="tooltip" data-original-title="Delete">Delete</a> -->
                                                        <a href="{{route('viewHostelMember',['categoryId'=> $row->id])}}" class="btn btn-primary btn-xs mrg" data-placement="top" data-toggle="tooltip" data-original-title="View">View
                                                        <a href="{{route('editHostelMember',['categoryId'=> $row->id])}}" class="btn btn-warning btn-xs mrg" data-placement="top" data-toggle="tooltip" data-original-title="Edit">Edit</a>
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
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $('.delete-button').on('click', function() {
        var categoryId = $(this).data('id');
        $.confirm({

            title: 'Delete Member ?',
            buttons: {
                deleteUser: {
                    text: 'delete',
                    action: function() {
                        $.ajax({
                            type: "GET",
                            url: "{{url('admin/hmember/delete')}}?categoryId=" + categoryId,
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
  $('#hostel-menu').addClass('active')
</script>
<script type="text/javascript">
    $('#classesID').change(function() {
        var classesID = $(this).val();
        //   alert(classesID);
            $.ajax({
                type: "GET",
                url: "{{url('admin/hostelm/class/filter')}}?categoryId=" + classesID,
                success: function(res) {
                     alert( res.hostelm.length);
                    // $('#loading').hide();
                       $('#mhostel').empty();
                       $('#division').empty();
                        let html = ''
                        html = '(Division '
                        for (var i = 0; i < res.division.length; ++i) {
                            html += `${res.division[i].name}, `

                        }
                        html += ')'
                        $("#division").append('<a data-toggle="tab" href="#" aria-expanded="false">'+ html +'</a>');
                        for (var i = 0; i < res.hostelm.length; ++i) {

                            $("#mhostel").append(`<tr>
                            <td data-title="">${i+1}</td>
                            <td data-title="">${res.hostelm[i][0]['hostelname']['name']} </td>
                            <td data-title="">${res.hostelm[i][0]['hostelcategoryname']['class_type']} </td>
                            <td data-title="">${res.hostelm[i][0]['studentlname']['first_name']}</td>
                            <td data-title="">${res.hostelm[i][0]['join_date']}</td>
                            <td data-title="Action">
                          
                            <a href="#" class="btn btn-danger btn-xs mrg delete-button" data-id="${res.hostelm[i][0]['id']}" data-placement="top" data-toggle="tooltip" data-original-title="Delete">Delete</a>
                            </td> `);
                        }

                }
            });
 
    });

    $('.select2').select2();
</script>

@endsection
