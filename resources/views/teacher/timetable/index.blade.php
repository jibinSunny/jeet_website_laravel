@extends('layouts.Teacher')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-classreport"></i> Time Table Report</h3>

        <ol class="breadcrumb">
            <li><a href=""><i class="fa icon-dashboardIcon"></i> Dashbaord</a></li>
            <li class="active"> Time Table Report</li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->

    <div class="box" id="timetable_report_details">
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
                            <th class="col-sm-2">Day</th>
                            <th class="col-sm-2">Period</th>
                            <th class="col-sm-2">Class</th>
                            <th class="col-sm-2">subject</th>
                            <th class="col-sm-2">Teacher </th>
                            <th class="col-sm-2">Star Time </th>
                            <th class="col-sm-2">End Time </th>
                            <th class="col-sm-2">Room </th>
                            </tr>
                            </thead>
                            <tbody id="all_student">    

                            @foreach($data as $key=>$item)
                            
                                <tr>
                                    <td class="text-center">{{ $key}}</td>
                                    <td> @foreach($item as $keys=>$items)
                                    {{ $keys+1 }}<hr>
                                    @endforeach</td>
                                    <td>  @foreach($item as $keys=>$items)
                                    {{  $items['classname']['name']  }}<hr>
                                    @endforeach</td>
                                    <td>  @foreach($item as $keys=>$items)
                                    {{  $items['subjectname']['name']  }}<hr>
                                    @endforeach</td>
                                    <td> @foreach($item as $keys=>$items)
                                    {{  $items['teachername']['first_name']  }} {{  $items['teachername']['last_name']  }}<hr>
                                    @endforeach</td>
                                    <td> @foreach($item as $keys=>$items)
                                    {{  $items['start_time']  }}<hr>
                                    @endforeach</td>
                                    <td> @foreach($item as $keys=>$items)
                                    {{  $items['end_time']  }}<hr>
                                    @endforeach</td>
                                    <td> @foreach($item as $keys=>$items)
                                    {{  $items['roomname']['name']  }}<hr>
                                    @endforeach</td>
                                    
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
    $('#academic-menu').addClass('active')
</script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"></script>

@endsection
