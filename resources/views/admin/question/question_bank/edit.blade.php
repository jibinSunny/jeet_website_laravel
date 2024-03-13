@extends('layouts.admin')
@section('content')
<style>
    input[type="checkbox"] {
        display: block;
    }
</style>
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-pencil"></i>QuestionBank</h3>
        <ol class="breadcrumb">
            <li><a href="{{ route('showDashboard') }}"><i class="fa icon-dashboardIcon"></i>Dashboard</a></li>
            <li><a href="">Question Bank</a></li>
            <li class="active">Edit Question Bank</li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-10">
                <form class="form-horizontal"id="mainForm" method="post" action="{{ route('saveQuestionBank') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="classesID" class="col-sm-2 control-label">
                            Class <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-7">
                            <select name="class" id="class" class="form-control select2" tabindex="-1">
                                <option selected disabled>Select Class</option>
                                @foreach($allclass as $row)
                                <option value="{{ $row->id}}" {{$question->class ==$row->id ? 'selected' :''}}>{{ $row->name}} </option>
                                @endforeach
                            </select>
                        </div>
                        <span class="col-sm-4 control-label">

                        </span>
                    </div>
                    <div class="form-group">
                        <label for="subjectID" class="col-sm-2 control-label">
                            Subject <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-7">
                            <select name="subject" id="subject" class="form-control select2" tabindex="-1">
                            @foreach($allsubject as $row)
                            <option value="{{ $row->id}}" {{$question->subject ==$row->id ? 'selected' :''}}>{{ $row->name}} </option>
                            @endforeach    
                        </select>
                        </div>
                        <span class="col-sm-4 control-label">
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="classesID" class="col-sm-2 control-label">
                            Level <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-7">
                            <select name="level" id="level" class="form-control select2" tabindex="-1">
                                <option selected disabled>Select Level</option>
                                @foreach($alllevel as $row)
                                <option value="{{ $row->id}}" {{$question->level ==$row->id ? 'selected' :''}}>{{ $row->name}} </option>
                                @endforeach
                            </select>
                        </div>
                        <span class="col-sm-4 control-label">

                        </span>
                    </div>
                    <div class="form-group">
                        <label for="note" class="col-sm-2 control-label">Question<span class="text-red">*</span>
                        </label>
                        <div class="col-sm-7">
                            <textarea style="resize:none;" class="form-control" id="summernote" name="question"> {{$question->question}}</textarea>
                        </div>
                        <span class="col-sm-4 control-label">
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="note" class="col-sm-2 control-label">Explanation<span class="text-red">*</span>
                        </label>
                        <div class="col-sm-7">
                            <textarea style="resize:none;" class="form-control" id="summernote1" name="explanation" > {{$question->explanation}}</textarea>
                        </div>
                        <span class="col-sm-4 control-label">
                        </span>
                    </div>

                    <div class="form-group">
                        <label for="exam" class="col-sm-2 control-label">
                            Hints<span class="text-red"></span>
                        </label>
                        <div class="col-sm-7">
                        <input type="hidden" class="form-control" id="academicyear_id" name="academicyear_id" value="{{$question->id}}" >
                            <input type="text" class="form-control" id="hints" name="hints" value="{{$question->hints}}" placeholder="Enter hints">
                        </div>
                        <span class="col-sm-4 control-label">
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="exam" class="col-sm-2 control-label">
                            Mark<span class="text-red">*</span>
                        </label>
                        <div class="col-sm-7">
                            <input type="number" class="form-control" id="mark" name="mark" value="{{$question->mark}}" placeholder="Enter mark">
                        </div>
                        <span class="col-sm-4 control-label">

                        </span>
                    </div>
                    <div class="form-group">
                        <label for="classesID" class="col-sm-2 control-label">
                            Question Type <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-7">
                            <select name="type" id="type" class="form-control select2" tabindex="-1">
                                <option selected disabled>Select Question Type</option>
                                @foreach($allltype as $row)
                                <option value="{{ $row->id}}" {{$question->type ==$row->id ? 'selected' :''}}>{{ $row->name}} </option>
                                @endforeach
                            </select>
                        </div>
                        <span class="col-sm-4 control-label">

                        </span>
                    </div>
                    <div class="form-group"  id="option">
                        <label for="classesID" class="col-sm-2 control-label">
                            Total Option <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-7">
                            <select name="totalOption" id="totalOption" class="form-control select2" tabindex="-1">
                                <?php
                                for ($i = 0; $i <= 10; $i++) {
                                ?>
                                    <option value="{{$i}}"{{$question->totalOption ==$i ? 'selected' :''}}>{{$i}}</option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <span class="col-sm-4 control-label">

                        </span>
                    </div>

                    <div id="optioninput">

                    </div>
                    <div class="form-group" id="upload" style="display:none">
                        <label for="file" class="col-sm-2 control-label">Upload</label>
                        <div class="col-sm-6">
                            <div class="input-group image-preview">
                                <input type="text" class="form-control image-preview-filename" disabled="disabled">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                        <span class="fa fa-remove"></span>
                                    </button>
                                    <div class="btn btn-success image-preview-input">
                                        <span class="fa fa-repeat"></span>
                                        <span class="image-preview-input-title"></span>
                                        <input type="file" name="upload" />Uplode File
                                    </div>
                                </span>
                            </div>
                        </div>

                        <span class="col-sm-4 control-label"></span>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-8">
                            <input type="submit" class="btn btn-success" value="Submit">
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
      var question = <?php print_r(json_encode($question)) ?>;
      var options = <?php print_r(json_encode($options)) ?>;
      if(question['type'] == "1")
       {       

          
                $("#option").hide();
                $('#totalOption').val("0");
                $("#upload").hide();
                $("#optioninput").show();
                $("#optioninput").empty();
                $("#optioninput").append('<div class="form-group"> <label for="exam" class="col-sm-2 control-label">Answer <span class="text-red"></span></label><div class="col-sm-7"><input type="text" class="form-control" id="answer" name="answer1" value="' + question['answer']+ '" placeholder="Enter Answer"></div></div>');
                                
       }
       else if(question['type'] == "2")
       {       

                $("#upload").hide();
                $("#optioninput").empty();
                let k = 1
                for (var i = 0; i < question['totalOption']; ++i) {
                    if(options[i]['answer']== 1)
                    {
                    $("#optioninput").append('<div class="form-group"> <label for="exam" class="col-sm-2 control-label">options ' + k + '<span class="text-red"></span></label><div class="col-sm-7"><input type="text" class="form-control" id="hints" name="option[]" value="' + options[i]['name']+ '" placeholder="Enter option ' +  k + '"></div><span class="form-radio"><input type="checkbox" value="' + i + '" id="' + i + '" name="answer[]" class="custom-control-input"checked></span></div>');
                    }
                    else{
                        $("#optioninput").append('<div class="form-group"> <label for="exam" class="col-sm-2 control-label">options ' + k + '<span class="text-red"></span></label><div class="col-sm-7"><input type="text" class="form-control" id="hints" name="option[]" value="' + options[i]['name']+ '" placeholder="Enter option ' +  k + '"></div><span class="form-radio"><input type="checkbox" value="' + i + '" id="' + i + '" name="answer[]" class="custom-control-input"></span></div>');
                    }
                k++
                }
       }
       else if(question['type'] == "3")
       {        $("#option").hide();
                $('#totalOption').val("0");
                 $("#upload").hide();
                 $("#upload").show();
                $("#optioninput").empty();
                $("#optioninput").empty();
                $("#optioninput").append('<div class="form-group"> <label for="exam" class="col-sm-2 control-label">Answer <span class="text-red"></span></label><div class="col-sm-7"><input type="text" class="form-control" id="answer" name="answer1" value="' + question['answer']+ '" placeholder="Enter Answer"></div></div>');
       }




    $('#type').change(function() {
        var type = $('#type').val();
        if (type == "1") {        
           $("#option").hide();
           $("#upload").hide();
           $('#totalOption').val("0");
           $("#optioninput").show();
                $("#upload").hide();
                $("#optioninput").empty();
                $("#optioninput").append('<div class="form-group"> <label for="exam" class="col-sm-2 control-label">Answer <span class="text-red"></span></label><div class="col-sm-7"><input type="text" class="form-control" id="answer" name="answer1" value="" placeholder="Enter Answer"></div></div>');
        } 
        if (type == "2") {
           $("#option").show();
           $("#upload").hide();
           $('#totalOption').val("0");
           $("#optioninput").hide();
           $("#optioninput").show();
           $("#upload").hide();
           $("#optioninput").empty();
           $('#totalOption').change(function() {
           var optioncount =  $("#totalOption").val();
           if (optioncount != "0") {
                let k = 1
                for (var i = 0; i < optioncount; ++i) {
                    $("#optioninput").append('<div class="form-group"> <label for="exam" class="col-sm-2 control-label">options ' +  k + '<span class="text-red"></span></label><div class="col-sm-7"><input type="text" class="form-control" id="hints" name="option[]" value="" placeholder="Enter option ' +  k + '"></div><span class="form-radio"><input type="checkbox" value="' + i + '" id="' + i + '" name="answer[]" class="custom-control-input"></span></div>');
                    k++
                }

           }  
        })

        }
        if (type == "3") {
            $("#option").hide();
           $("#upload").hide();
           $('#totalOption').val("0");
           $("#optioninput").show();
           $("#optioninput").empty();
                $("#upload").show();
                $("#optioninput").empty();
                $("#optioninput").append('<div class="form-group"> <label for="exam" class="col-sm-2 control-label">Answer <span class="text-red"></span></label><div class="col-sm-7"><input type="text" class="form-control" id="answer" name="answer1" value="" placeholder="Enter Answer"></div></div>');
        }


                
    })
    $('#exam-question-menu').addClass('active')
</script>
<script type="text/javascript">
    $('#class').change(function() {
        var weekID = $(this).val();
        if (weekID) {
            if (weekID == "0") {
                $('#subject').hide();
            } else {
                $.ajax({
                    type: "GET",
                    url: "{{url('admin/timetable/subject/list')}}?categoryId=" + weekID,
                    success: function(res) {
                        if (res) {
                            $("#subject").empty();
                            $("#subject").append('<option selected disabled>Select Subject</option>');

                            for (var i = 0; i < res.length; ++i) {

                                $("#subject").append('<option value="' + res[i].id + '">' + res[i].name + '</option>');
                            }

                        } else {
                            $("#subject").empty();
                        }
                    }
                });
            }
        } else {
            $("#subject").empty();

        }
    })
</script>

<script>
    $(document).ready(function() {
        $('#summernote').summernote({
                //placeholder: 'Hello bootstrap 4',
                tabsize: 2,
                height: 80
            });
            $('#summernote1').summernote({
                //placeholder: 'Hello bootstrap 4',
                tabsize: 2,
                height: 80
            });
    });
</script>

<script>
    $("form#mainForm").validate({
        normalizer: function(value) {
            return $.trim(value);
        },
        rules: {
            class: {
                required: true
            },
            subject: {
                required: true,
            },
            level: {
                required: true
            },
            question: {
                required: true,
            },
            mark: {
                required: true
            },
            type: {
                required: true,
            },
            totalOption: {
                required: true,
            },
            answer: {
                required: true,
            },

        },
        messages: {
            class: {
                required: "Class is required"
            },
            subject: {
                required: "Subject is required"
            },
            title: {
                required: "Title is required"
            },
            level: {
                required: "Level is required"
            },
            question: {
                required: "Question is required"
            },
            mark: {
                required: "Mark is required"
            },
            type: {
                required: "Type is required"
            },
            totalOption: {
                required: "totalOption is required"
            },
            answer: {
                required: "answer is required"
            },

        },
    });
</script>
@endsection