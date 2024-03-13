@extends('layouts.teacher')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-puzzle-piece"></i> Exam Schedule</h3>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa icon-dashboardIcon"></i> Dashboard</a></li>
            <li class="active">Exam Schedule</li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="box-body">
                <div class="row">
                    <form id='category-add-form' action="{{ route('teacher_studentExam') }}" method="POST">
                        @csrf
                        <div class="col-sm-12">
                            <div class="form-group col-sm-4">
                                <label>Date<span class="text-red"> * </span></label>

                                <input type="text" class="form-control" id="edate" name="edate" value="{{$date}}" placeholder="Enter Exam Date">

                                
                            </div>
                            <input type="submit" class="btn btn-success bg-lightsky mg-b-10 " style="margin-top: 20px;" value="Submit">
                        </div>
                    </form>


                </div><!-- row -->
            </div><!-- Body -->
            <div class="col-sm-12">

                <div class="nav-tabs-custom">
                    <div class="tab-content">
                        <div id="all" class="tab-pane active">
                            <div id="hide-table">
                                <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Exam Name</th>
                                            <th>Exam Category</th>
                                            <th>Instruction</th>
                                            <th>Class</th>
                                            <th>Division</th>
                                            <th>Subject</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Room</th>
                                    
                                        </tr>
                                    </thead>
                                    <tbody id=shedulelist>
                                        @foreach($examschedulelist as $row)
                                        <tr>
                                            <td data-title="">{{ $loop->iteration}}</td>
                                            <td data-title="">{{ isset($row->name)?$row->name:''}}</td>
                                            <td data-title="">{{ isset($row->exams_category->name)?$row->exams_category->name:''}}</td>
                                            <td data-title="">{{ isset($row->instructions->title)?$row->instructions->title:''}}</td>
                                            <td data-title="">{{ isset($row->classes->name)?$row->classes->name:''}}</td>
                                            <td data-title="">{{ isset($row->divisions->name)?$row->divisions->name:''}}</td>
                                            <td data-title="">{{ isset($row->subjects->name)?$row->subjects->name:''}}</td>
                                            <td data-title="">{{date('d-M-y',strtotime($row->edate))}}</td>
                                            <td data-title="">{{date('h:i A',strtotime($row->examfrom))}} - {{date('h:i A',strtotime($row->examto))}}</td>
                                            <td data-title="">{{ isset($row->rooms->name)?$row->rooms->name:''}}</td>
                                  
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div> <!-- nav-tabs-custom -->
            </div> <!-- col-sm-12 -->
        </div><!-- row -->
    </div><!-- Body -->
</div><!-- /.box -->

@endsection
@section('scripts')
<script type="text/javascript">
    $(".select2").select2();
</script>
<script type="text/javascript">
    $("#edate").datepicker({
        autoclose: true,
        format: 'yyyy-mm-dd',
        startDate: new Date(),
        endDate: '',
    });
</script>
<script>
    $('#teacher-exam-menu').addClass('active')
</script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
@endsection