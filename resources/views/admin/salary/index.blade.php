@extends('layouts.admin')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-beer"></i> Manage Salary</h3>


        <ol class="breadcrumb">
            <li><a href=""><i class="fa icon-dashboardIcon"></i> Dashboard</a></li>
            <li class="active">Manage Salary</li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">
            <form id='category-add-form'action="{{ route('showSalary') }}" method="POST">
                @csrf
                <div class="col-sm-12">
                    <div class="form-group col-sm-2" id="classes1">
                    </div>
                    <div class="form-group col-sm-4" id="classes1">
                        <label for="role" class="control-label">
                            Role <span class="text-red">*</span>
                        </label>
                        <select class="form-control" id="usertype" name="usertype">
                            <option value="">Select Roll</option>
                            @foreach ($usertypes as $item)
                            @if($item->id != 1 && $item->id != 3 && $item->id != 4)
                                <option value="{{ $item->id }}" @if($usertype == $item->id ) selected @endif>{{ $item->name }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-sm-2" id="division1">
                    <input type="submit" class="btn btn-success bg-lightsky mg-b-10 mt-3" style="margin-top: 23px;" value="Submit">
                    </div>
                </div>
            </form>
            @if(isset($usertype))
                <div id="hide-table">
                    <table class="table table-bordered table-hover dataTable no-footer">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th class="col-sm-2">Name</th>
                                <th class="col-sm-2">User Type</th>
                                <th class="col-sm-2">Gross Salary</th>
                                <th class="col-sm-2">Total Deductions</th>
                                <th class="col-sm-2">Net Salary</th>
                                <th class="col-sm-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($salaries as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>@if(isset($item->users->first_name)) {{ $item->users->first_name }} {{ $item->users->last_name }} @else {{ $item->teachers->first_name }} {{ $item->teachers->last_name }}@endif</td>
                                    <td>{{ $item->usertypes->name }}</td>
                                    <td>{{ $item->salary_templates->gross_salary }}</td>
                                    <td>{{ $item->salary_templates->total_deduction }}</td>
                                    <td>{{ $item->salary_templates->net_salary }}</td>
                                    <td data-title="Action">
                                        @if($item->processed == 0)
                                        <a href="#paymentlist" data-toggle="modal" class="btn btn-warning btn-xs mrg">Proceed to pay</a>
                                    @else
                                        <input type="submit" class="btn btn-secondary" value="Payment Status: Paid"  id="paid_button" disabled>
                                    @endif
                                    </td>
                                </tr>
                                <form action="{{ route('viewSalary')}}" method="POST">
                                @csrf
                                    <div class="modal fade" id="paymentlist">
                                        <div class="modal-dialog modal-md">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                    <h4 class="modal-title">Calculate Your Overtime Payment</h4>
                                                </div>
                                                <div class="modal-body" style="height:100px;">
                                                    <div id="row">
                                                        <div class="col-sm-12 col-md-12">
                                                            <div class="col-sm-4 col-md-4">
                                                                <div class="form-group">
                                                                    <label for="category" class=" control-label">
                                                                        Overtime Rate :
                                                                    </label>
                                                                    <input type="text" class="form-control" name="overtime_rate" placeholder="Enter Overtime Rate" value="{{ $item->salary_templates->overtime_rate }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4 col-md-4">
                                                                <div class="form-group">
                                                                    <label for="category" class=" control-label">
                                                                        Overtime Hours :
                                                                    </label>
                                                                    <input type="text" class="form-control" name="overtime_hour" placeholder="Enter Overtime Hours" value="0">
                                                                    <input type="hidden" name="salary_code" value="{{ $item->code }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4 col-md-4">
                                                                <div class="form-group">
                                                                    <label for="category" class=" control-label">
                                                                    </label>
                                                                    <button class="btn btn-info form-control" onclick="payment()">Proceed</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @endif
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
<script type="text/javascript">
    $(".select2").select2();

    $('#role').change(function() {
        var role = $(this).val();
        if(role == 0) {
            $('#hide-table').hide();
        } else {
            $.ajax({
                type: 'POST',
                url: "",
                data: "id=" + role,
                dataType: "html",
                success: function(data) {
                    window.location.href = data;
                }
            });
        }
    });
</script>
<script>
    $('#accounts-menu').addClass('active');
    $('#expense-menu').addClass('active');
    $('#payroll-menu').addClass('active');
    $('#process-salary-menu').addClass('active');
</script>
@endsection
