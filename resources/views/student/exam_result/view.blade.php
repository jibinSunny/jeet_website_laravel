@extends('layouts.student')
@section('content')
<div class="row">
    <div class="col-sm-12" style="margin:10px 0px">
    </div>
</div>

<div class="box">
    <div class="box-header bg-gray">
        <h3 class="box-title text-navy"><i class="fa fa-clipboard"></i>Exam Result</h3>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div id="printablediv">
        <div class="box-body">
            <div class="row">
                <div class="col-sm-12" style="margin-bottom: 15px;"></div>

                <div class="col-sm-12">
                    <div class="box box-solid " style="border: 1px #ccc solid; border-left: 2px black solid">

                        <div class="box-body" style="height: 200px;">
                            <div class="col-sm-6">
                                <h5 class="box-title text-navy">Exam Informations</h5>
                                <ul>
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
                                <ul>
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
                    <div class="box box-solid " style="border: 1px #ccc solid; border-left: 2px black solid">
                        <div class="box-header bg-gray with-border">
                            <h3 class="box-title text-navy">Question & Answers</h3>
                        </div>

                        <div class="box-body">
                            <div id="hide-table">
                                    <input type="hidden"name="exam" value="{{$data[0]->exams->id}}">
                                    <input type="hidden"name="student"value="{{$data[0]->students->id}}">
                                    <table id="ListBatch" class="table table-bordered table-hover dataTable">
                                        <thead>
                                            <tr>
                                                <th class="col-lg-2">#</th>
                                                <th class="col-lg-2">Question</th>
                                                <th class="col-lg-2">Answer</th>
                                                <th class="col-lg-2">Question Mark</th>
                                                <th class="col-lg-2">Mark</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data as $data1)
                                            <tr>
                                                <td>{{ $loop->iteration}}</td>
                                                <td>{{ strip_tags($data1->questions->question)}}</td>
                                                <td>{{ $data1->answer}}</td>
                                                <td>{{ $data1->questions->mark}}</td>
                                                <td>{{ $data1->mark}}</td>


                                            </tr>
                                            @endforeach

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="4"><span class="pull-right"><b>Total Mark</b></span></td>
                                                <td><b>{{ $data[0]->total_mark}}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="4"><span class="pull-right"><b>Grade</b></span></td>
                                                <td><b>{{$grade}}</td>
                                            </tr>

                                        </tfoot>

                                    </table>
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
    $('#exam-menu').addClass('active')
</script>
@endsection