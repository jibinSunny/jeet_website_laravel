@extends('layouts.teacher')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa iniicon-leaveassign"></i> Leave Assigend</h3>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa icon-dashboardIcon"></i> Dashboard</a></li>
            <li class="active">Leave Assigend</li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">

                        <h5 class="page-header">
                        </h5>
                <div id="hide-table">
                    <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer">
                        <thead>
                            <tr>
                                <th class="">#</th>
                                <th class="">Category</th>
                                <th class="">No of Days</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($data  as $row)
                                <tr>
                                    <td data-title="">{{ $loop->iteration }}</td>
                                    <td data-title="">{{ isset($row->leavecategoryname->name)?$row->leavecategoryname->name:''}}</td>
                                    <td data-title="">{{ $row->leave_days }}</td>
                            
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
@endsection