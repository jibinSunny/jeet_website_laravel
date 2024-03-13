@extends('layouts.admin')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa iniicon-leaveapplication"></i> Leave Application</h3>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa icon-dashboardIcon"></i> Dashboard</a></li>
            <li class="active">Leave Application</li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">
                <div id="hide-table">
                    <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Applicat Name</th>
                                <th>Role</th>
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
                            @foreach($tacher_list as $key=>$row)
                            <tr>
                                <td data-title="">{{ $loop->iteration }}</td>
                                <td data-title="">{{ isset($row->Teachername->first_name)?$row->Teachername->first_name:''}}</td>
                                <td data-title="">{{ isset($row->usertypename->name)?$row->usertypename->name:''}}</td>
                                <td data-title="">{{ isset($row->leave_categoryname->name)?$row->leave_categoryname->name:''}}</td>
                                <td data-title="">{{date('D-M-Y ',strtotime($row->apply_date))}}</td>
                                <td data-title="">{{date('D-M-Y ',strtotime($row->from_date))}} - {{date('D-M-Y ',strtotime($row->to_date))}}</td>
                                <td data-title="">{{$row->leave_days}}</td>
                                <td data-title="">{{$row->reason}}</td>
                                <td data-title="">{{$row->action_reason}}</td>
                                <td data-title=""><a href="{{ asset('user-files/teacher/attachment/apply_leave/'.$row->attachment) }}" class="btn btn-success btn-xs mrg" data-placement="top" data-toggle="tooltip" data-original-title="Download" download>download.png</a></td>
                                <td data-title="">@if($row->status=="0")<span class="btn btn-warning btn-xs mrg">{{ "pending" }}</span>
                                    @elseif($row->status=="1") <span class="btn btn-success btn-xs ">{{ "Approval" }}</span> @else <span class="btn btn-danger btn-xs">{{ "Reject" }}</span>@endif</td>
                                <td data-title="Action">
                                    @if($row->status != "1")

                                    <a href="" class="btn btn-primary btn-xs mrg" data-toggle="modal" data-target="#myModalA{{$key}}" data-placement="top" data-toggle="tooltip" data-original-title="Approve">Approve</a>
                                    @endif
                                    @if($row->status != "2")
                                    <a href="" class="btn btn-success btn-xs mrg" data-toggle="modal" data-target="#myModalR{{$key}}" style="background-color: #ee2507" data-placement="top" data-toggle="tooltip" data-original-title="Reject">Reject</a>
                                    @endif
                                </td>
                            </tr>
                            <div class="modal fade" id="myModalA{{$key}}" role="dialog">
                                <div class="modal-dialog">
                                    <form method="post" class="form-horizontal" action="{{ route('approveleaveApplicationteacher') }}" enctype="multipart/form-data">
                                        @csrf
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" style="margin-left: 160px;">Enter Approve Reson</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>

                                            </div>
                                            <div class="modal-body">
                                                <input type="hidden" class="form-control" id="teacher_id" name="teacher_id" value="{{$row->id}}" />
                                                 <label class=" control-label"><strong>Reson</strong></label>
                                                <textarea class="form-control" id="reson" placeholder="Enter Reson" name="reson"required></textarea>

                                            </div>

                                            <div class="modal-footer">
                                                <div class="col-sm-4 col-sm-offset-2 pull-right">

                                                    <button class="btn btn-white" type="submit" id="btn" style="background-color: #1ab394; border-color: #1ab394; margin-top:-16px; color: #FFF">Save
                                                    </button>

                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                            <div class="modal fade" id="myModalR{{$key}}" role="dialog">
                                <div class="modal-dialog">
                                    <form method="post" class="form-horizontal" action="{{ route('rejectleaveApplicationteacher')}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" style="margin-left: 160px;">Enter Rejected Reson</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>

                                            </div>
                                            <div class="modal-body">
                                                <input type="hidden" class="form-control" id="teacher_id" name="teacher_id" value="{{$row->id}}" />
                                                <label class=" control-label"><strong>Reson</strong></label>
                                                <textarea class="form-control" id="reson" placeholder="Enter Reson" name="reson"required></textarea>

                                            </div>

                                            <div class="modal-footer">
                                                <div class="col-sm-4 col-sm-offset-2 pull-right">

                                                    <button class="btn btn-white" type="submit" id="btn" style="background-color: #1ab394; border-color: #1ab394; margin-top:-16px; color: #FFF">Save
                                                    </button>

                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                            @endforeach
                            @foreach($user_list as $row)
                            <tr>
                                <td data-title="">{{ $loop->iteration }}</td>
                                <td data-title="">{{ isset($row->username->first_name)?$row->username->first_name:''}}</td>
                                <td data-title="">{{ isset($row->usertypename->name)?$row->usertypename->name:''}}</td>
                                <td data-title="">{{ isset($row->leave_categoryname->name)?$row->leave_categoryname->name:''}}</td>
                                <td data-title="">{{$row->apply_date}}</td>
                                <td data-title="">{{date('DD-m-Y ',strtotime($row->from_date))}} - {{date('DD-m-Y ',strtotime($row->to_date))}}</td>
                                <td data-title="">{{$row->leave_days}}</td>
                                <td data-title=""><a href="" class="btn btn-success btn-xs mrg" data-placement="top" data-toggle="tooltip" data-original-title="Download">download.png</a></td>
                                <td data-title="">@if($row->status=="0")<span class="btn btn-warning btn-xs mrg">{{ "pending" }}</span>
                                    @elseif($row->status=="1") <span class="btn btn-success btn-xs ">{{ "Approval" }}</span> @else <span class="btn btn-danger btn-xs">{{ "Reject" }}</span>@endif</td>
                                <td data-title="Action">
                                    @if($row->status != "1")
                                    <a href="{{route('approveleaveApplicationuser',['categoryId'=> $row->id])}}" class="btn btn-primary btn-xs mrg" data-placement="top" data-toggle="tooltip" data-original-title="Approve">Approve</a>
                                    @endif
                                    @if($row->status != "2")
                                    <a href="{{route('rejectleaveApplicationuser',['categoryId'=> $row->id])}}" class="btn btn-success btn-xs mrg" style="background-color: #ee2507" data-placement="top" data-toggle="tooltip" data-original-title="Reject">Reject</a>
                                    @endif
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
    $('#leave-menu').addClass('active')
</script>
@endsection