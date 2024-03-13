@extends('layouts.admin')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-classreport"></i>Class Report</h3>

        <ol class="breadcrumb">
            <li><a href=""><i class="fa icon-dashboardIcon"></i> Dashbaord</a></li>
            <li class="active"> Class Report</li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <form id='mainForm' method="POST" action="{{ route('classReport') }}">
              @csrf
                <div class="col-sm-12">
                    <div class="form-group col-sm-4" id="classesDiv">
                        <label>Class<span class="text-red"> * </span></label>
                        <select name="class" id="class" class="form-control select2" tabindex="-1">
                            <option selected disabled>Select Class</option>
                            @foreach($classes as $row)
                            <option value="{{ $row->id}}"{{$class_id ==$row->id ? 'selected' :''}}>{{ $row->name}}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="col-sm-4">
                        <input type="submit" class="btn btn-success bg-lightsky mg-b-10 " style="margin-top: 20px;" value="Submit">

                    </div>
                </div>
            </form>


        </div><!-- row -->
    </div><!-- Body -->

    <div class="box" id="class_report_details">
        <!-- form start -->
        <div class="box-body">
        <div class="row">

        <div id="printablediv">
            <!-- form start -->
        <div class="box-body">
            <div class="row">
                <div class="col-sm-12">
                    <div id="hide-table">
                        <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer">
                            <thead>
                            <tr>
                            <th class="col-sm-1">#</th>
                            <th class="col-sm-2">Name</th>
                            <th class="col-sm-2">Name Numeric</th>
                            <th class="col-sm-2">Divisions</th>
                            <th class="col-sm-1">Action</th>
                            </tr>
                            </thead>
                            <tbody id="all_student">    

                            @foreach($all_report_class as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->name_numeric }} </td>
                                    <td>
                                    @foreach($item->divisions as $item1)
                                    {{ isset($item1->name )?$item1->name:''}}
                                    @endforeach 
                                    </td>
                                    <td>
                                        <a href="{{route('classReportView',['code'=> $item->id])}}" class="btn btn-warning btn-xs mrg" >View</a>
                                    </tr>
                            @endforeach                         
                               
                            </tbody>
                        </table>
                    </div>
                        <!-- <div class="callout callout-danger">
                            <p><b class="text-info"></b></p>
                        </div> -->
                </div>
                <!-- <div class="col-sm-12 text-center footerAll"></div> -->
            </div><!-- row -->
        </div><!-- Body -->
    </div>

        </div><!-- row -->
    </div><!-- Body -->
    </div>

</div><!-- /.box -->


@endsection
@section('scripts')
<!--jQuery Validate -->
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<!--toastr Validate -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<!--alert -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script>
    $('#report-menu').addClass('active')
    $('#general_reports').addClass('active')
</script>


<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"></script>
<script>
  $("form#mainForm").validate({
                normalizer: function(value) {
                    return $.trim(value);
                },
                rules: {
                    class: {
                        required: true
                    },
                   
           
                },
                messages: {
                    class: {
                        required: "class is required"
                    },
                   
 
                },
            });

</script>
@endsection