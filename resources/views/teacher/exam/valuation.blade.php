@extends('layouts.teacher')
@section('content')
<div class="row">
    <div class="col-sm-12" style="margin:10px 0px">
    </div>
</div>

<div class="box">
    <div class="box-header bg-gray">
        <h3 class="box-title text-navy"><i class="fa fa-clipboard"></i>Exam Evaluation</h3>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div id="printablediv">
        <div class="box-body">
            <div class="row">
                <div class="col-sm-12" style="margin-bottom: 15px;"></div>

                <div class="col-sm-12">
                    <div class="box box-solid " style="border: 1px #ccc solid;">

                        <div class="box-body std_result" style="height: 200px;">
                            <div class="col-sm-6">
                                <h5 class="box-title text-navy">Exam Informations</h5>
                                <ul class="list-unstyled">
                                    <li class="item">
                                        <span>Type of Exam:</span>
                                        <span>{{$data[0]->exams->exams_category->name}}</span>
                                    </li>
                                    <li class="item">
                                        <span>Exam Name:</span>
                                        <span>{{$data[0]->exams->name}}</span>
                                    </li>
                                    <li class="item">
                                        <span>Total Questions:{{count($data)}}</span>
                                        <span> </span>
                                    </li>
                                    <li class="item">
                                        <span>Total Mark:</span>
                                        <span>{{$sum}} </span>
                                    </li>
                       
                                </ul>
                            </div>
                            <div class="col-sm-6">
                                <h5 class="box-title text-navy">Student Informations</h5>
                                <ul class="list-unstyled">
                                    <li class="item">
                                        <span>Name:{{$data[0]->students->first_name}} {{$data[0]->students->last_name}}</span>
                                        <span></span>
                                    </li>
                                    <li class="item">
                                        <span>Email:{{$data[0]->students->email}}</span>
                                        <span> </span>
                                    </li>
                                    <li class="item">
                                        <span>Class:{{$data[0]->students->classname->name}}</span>
                                        <span> </span>
                                    </li>
                                    <li class="item">
                                        <span>Division:{{$data[0]->students->divisions->name}}</span>
                                        <span> </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- row -->
        </div><!-- Body -->
    </div>
</div>

<div class="box">
    <!-- form start -->
    <div id="printablediv">
        <div class="box-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="box box-solid " style="border: 1px #ccc solid;">
                        <div class="box-header bg-gray with-border">
                            <h3 class="box-title text-navy">Question & Answers</h3>
                        </div>

                        <div class="box-body">
                            <div id="hide-table">
                                <form class="form-horizontal" id="mainForm" method="post" action="{{ route('saveEvaluation')}}" enctype=" multipart/form-data">
                                    @csrf
                                    <input type="hidden"name="exam" value="{{$data[0]->exams->id}}">
                                    <input type="hidden"name="student"value="{{$data[0]->students->id}}">
                                    <table id="ListBatch" class="table table-bordered table-hover dataTable">
                                        <thead>
                                            <tr>
                                                <th class="">#</th>
                                                <th class="">Question</th>
                                                <th class="">Answer</th>
                                                <th class="">Question Mark</th>
                                                <th class="">Mark</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data as $data1)
                                            <tr>
                                                <td>{{ $loop->iteration}} <input type="hidden" class="btn btn-success"name="question[]" value="{{$data1->questions->id}}"></td>
                                                <td>{{strip_tags($data1->questions->question)}}</td>
                                                <td>{{ $data1->answer}} <input type="hidden"name="answer[]" value="{{ $data1->answer}}"></td>
                                                <td id="id_{{ $loop->iteration}}" data="{{$data1->questions->mark}}">{{ strip_tags($data1->questions->mark)}}</td>
                                                <td> <input type="number" class="form-control mark_enter indv-mark indv-mark{{ $loop->iteration}}" style="width: 100px;" id="{{ $loop->iteration}}" onchange="updateDue({{ $data1->questions->mark }}, {{ $loop->iteration}})" name="mark[]" value="{{$data1->mark}}"></td>


                                            </tr>
                                            @endforeach

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="4"><span class="pull-right"><b>Total Mark</b></span></td>
                                                <td><b><input type="number" class="form-control total-mark" style="width: 100px;" id="sfgfegfe" name="total_mark" value="{{$data1->total_mark}}"></b></td>
                                            </tr>

                                        </tfoot>

                                    </table>
                                    <div class="form-group">
                                            <input type="submit" class="btn btn-success"style="float: right;margin: 10px" value="Submit">
                                    </div>
                                </form>  
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- row -->
        </div><!-- Body -->
    </div>
</div>


<!-- email end here -->
@endsection
@section('scripts')
<script>
    $('#teacher-exam-menu').addClass('active')
</script>
<script type="text/javascript">
    function updateDue(value, iteration) {
        var tot_dis = 0;
        $('.indv-mark').each(function() {
            if ($(this).val() > value) {
                $('.indv-mark' + iteration).val(value);
            } else if ($(this).val() < 0) {
                $('.indv-mark' + iteration).val('');
            }
            if ($(this).val()) {
                tot_dis += parseFloat($(this).val());
            }
            $('.total-mark').val(tot_dis);
        });
    }
</script>

@endsection