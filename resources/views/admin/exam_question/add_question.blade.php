@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-sm-8">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><i class="fa fa-puzzle-piece"></i>Question Bank</h3>

                <ol class="breadcrumb">
                    <li><a href=""><i class="fa fa-laptop"></i>Dashboard</a></li>
                    <li class="active">Exam Question</li>
                </ol>
            </div><!-- /.box-header -->
            <!-- form start -->
            <div class="box-body">
                <div class="row">
                <div class='col-sm-12' id="questionstable">
                
                   
                    <table  class="table table-striped table-bordered ">
                        <thead>
                            <tr>
                                <th class="col-lg-1">#</th>
                                <th class="col-lg-3">Question</th>
                                <th class="col-lg-2">Type</th>
                                <th class="col-lg-2">Class</th>
                                <th class="col-lg-2">Subject</th>
                                <th class="col-lg-2">Level</th>
                                <th class="col-lg-2">Mark</th>
                                <th class="col-lg-2">Action</th>
                            </tr>
                        </thead>
                        <tbody id="questions">
                                @foreach($question as $row)
                                <tr >
                                    <td data-title="">{{ $loop->iteration}}</td>
                                    <td data-title="">{{ strip_tags($row->question)}}</td>
                                    <td data-title="">{{ $row->types->name}}</td>
                                    <td data-title="">{{ $row->classes->name}}</td>
                                    <td data-title="">{{ $row->subjects->name}}</td>
                                    <td data-title="">{{ $row->levels->name}}</td>
                                    <td data-title="">{{ $row->mark}}</td>
                                  <td><a id="add" class="btn btn-primary btn-sm" onClick="addquestio('{{$exam->id}}','{{$row->id}}')" data-placement="top" data-toggle="tooltip" data-original-title="Add">Add</i></td>
                              </tr> 
                              @endforeach
                        </tbody>
                    </table>
               

                    </div>
                </div>
            </div>
        </div>


        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><i class="fa fa-puzzle-piece"></i>  Associated Question</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-12" id="asso-questions">

                    <table  class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="col-lg-1">#</th>
                                <th class="col-lg-3">Question</th>
                                <th class="col-lg-2">Type</th>
                                <th class="col-lg-2">Class</th>
                                <th class="col-lg-2">Subject</th>
                                <th class="col-lg-2">Level</th>
                                <th class="col-lg-2">Mark</th>
                                <th class="col-lg-2">Action</th>
                            </tr>
                        </thead>
                        <tbody id="addquestion">
                                @foreach($add_question_list as $row)
                                <tr >
                                    <td data-title="">{{ $loop->iteration}}</td>
                                    <td data-title="">{{ strip_tags($row->question)}}</td>
                                    <td data-title="">{{ $row->types->name}}</td>
                                    <td data-title="">{{ $row->classes->name}}</td>
                                    <td data-title="">{{ $row->subjects->name}}</td>
                                    <td data-title="">{{ $row->levels->name}}</td>
                                    <td data-title="">{{ $row->mark}}</td>
                                    <td data-title="Action">
                                    <a  class="btn btn-danger btn-xs mrg delete-button" onClick="removequestio('{{$exam->id}}','{{$row->id}}')" data-placement="top" data-toggle="tooltip" data-original-title="Remove">Remove</i>
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
    <div class="col-sm-4">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><i class="fa fa-puzzle-piece"></i> Exam Details</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="info-box">
                        <?php
                        $format1 = 'Y-m-d';
                        $format2 = 'H:i:s';
                        $date = Carbon\Carbon::parse($exam->date_time)->format($format1);
                        $time = Carbon\Carbon::parse($exam->date_time)->format($format2);
                        ?>
                            <p> <span>name : </span>{{$exam->name}}</p>
                            <p> <span>Category : </span>{{ isset($exam->exams_category->name)?$exam->exams_category->name:''}}</p>
                            <p> <span>Class : </span>{{ isset($exam->classes->name)?$exam->classes->name:''}}</p>
                            <p> <span>Division : </span>{{ isset($exam->divisions->name)?$exam->divisions->name:''}}</p>
                            <p> <span>Subject : </span>{{ isset($exam->subjects->name)?$exam->subjects->name:''}}</p>
                            <p> <span>Room : </span>{{ isset($exam->rooms->name)?$exam->rooms->name:''}}</p>
                            <p> <span>Instruction : </span>{{ isset($exam->instructions->title)?$exam->instructions->title:''}}</p>
                            <p> <span>Date : </span> {{$date}} </p>    
                            <p> <span>Time : </span> {{$time}} </p>
                            <div  id="total"><span>Total Mark :  </span> {{$totalMark}}</p></div>               
               
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
@section('scripts')
<script>
  $('#exam-question-menu').addClass('active')
</script>

<script>
//   var exam_id = <?php print_r(json_encode($exam->id)) ?>;
    function addquestio(exam_id,question_id) {
        if(exam_id && question_id)
        { 

        $.ajax({
                type: "POST",
                url: '{{route("ExamQuestionadd")}}',
                data: {
                    exam_id: exam_id,
                    question_id: question_id
                },
                dataType: "json",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    if (data) {

                        $("#questionstable").show();
                        $("#questions").empty();
                        $("#addquestion").empty();
                        $("#total").empty();
                        $("#total").append(`<span>Total Mark :  </span> ${data.totalMark}  </p>`);

                        for (var i = 0; i < data.add_question.length; ++i) {
                            $("#questions").append(`<tr>
                            <td>${i+1}</td>
                            <td>${data.add_question[i]['question']}</td>
                            <td>${data.add_question[i]['types']['name']}</td>
                            <td>${data.add_question[i]['classes']['name']}</td>
                            <td>${data.add_question[i]['subjects']['name']}</td>
                            <td>${data.add_question[i]['levels']['name']}</td>
                            <td>${data.add_question[i]['mark']}</td>
                            <td><a id="add" class="btn btn-primary btn-sm" onClick="addquestio(${exam_id},${data.add_question[i]['id']})" data-placement="top" data-toggle="tooltip" data-original-title="Add">Add</i></td>
                            </tr> `);

                        }
                        for (var i = 0; i < data.question.length; ++i) {
                            $("#addquestion").append(`<tr>
                            <td>${i+1}</td>
                            <td>${data.question[i]['question']}</td>
                            <td>${data.question[i]['types']['name']}</td>
                            <td>${data.question[i]['classes']['name']}</td>
                            <td>${data.question[i]['subjects']['name']}</td>
                            <td>${data.question[i]['levels']['name']}</td>
                            <td>${data.question[i]['mark']}</td>
                            <td><a id="remove" class="btn btn-danger btn-xs mrg delete-button btn btn-primary btn-sm" onClick="removequestio(${exam_id},${data.question[i]['id']})" data-placement="top" data-toggle="tooltip" data-original-title="Rmove">Rmove</i></td>
                            </tr> `);

                        }

                    

                    }


                },
                error: function() {}
            });
        }
    
    }
    function removequestio(exam_id,question_id) {
        if(exam_id && question_id)
        {
        $.ajax({
                type: "POST",
                url: '{{route("ExamQuestionRemove")}}',
                data: {
                    exam_id: exam_id,
                    question_id: question_id
                },
                dataType: "json",
                async: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    if (data) {

                        $("#questionstable").show();
                        $("#questions").empty();
                        $("#addquestion").empty();
                        $("#total").empty();
                        $("#total").append(`<span>Total Mark :  </span> ${data.totalMark}  </p>`);
                        for (var i = 0; i < data.question.length; ++i) {
                            $("#addquestion").append(`<tr>
                            <td>${i+1}</td>
                            <td>${data.question[i]['question']}</td>
                            <td>${data.question[i]['types']['name']}</td>
                            <td>${data.question[i]['classes']['name']}</td>
                            <td>${data.question[i]['subjects']['name']}</td>
                            <td>${data.question[i]['levels']['name']}</td>
                            <td>${data.question[i]['mark']}</td>
                            <td><a id="add" class="btn btn-danger btn-xs mrg delete-button btn btn-primary btn-sm" onClick="removequestio(${exam_id},${data.question[i]['id']})" data-placement="top" data-toggle="tooltip" data-original-title="Rmove">Rmove</i></td>
                            </tr> `);

                        }
                        for (var i = 0; i < data.requestion.length; ++i) {
                            $("#questions").append(`<tr>
                            <td>${i+1}</td>
                            <td>${data.requestion[i]['question']}</td>
                            <td>${data.requestion[i]['types']['name']}</td>
                            <td>${data.requestion[i]['classes']['name']}</td>
                            <td>${data.requestion[i]['subjects']['name']}</td>
                            <td>${data.requestion[i]['levels']['name']}</td>
                            <td>${data.requestion[i]['mark']}</td>
                            <td><a id="add" class="btn btn-primary btn-sm" onClick="addquestio(${exam_id},${data.requestion[i]['id']})" data-placement="top" data-toggle="tooltip" data-original-title="Add">Add</i></td>
                            </tr> `);

                        }

                    
                        

                    }


                },
                error: function() {}
            });
        }
    }

</script>
@endsection