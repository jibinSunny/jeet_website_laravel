<!DOCTYPE html>
<html class="white-bg-login" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <title>Student Online Exam</title>
    <link rel="SHORTCUT ICON" href="{{ asset('frontend/icons/logo.svg') }}" />
    <!-- bootstrap 3.0.2 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <!-- font Awesome -->
    <link href="{{ asset('backend/fonts/font-awesome.css') }}" rel="stylesheet" type="text/css">
    <!-- Style -->
    <link href="{{ asset('backend/common/themes/default/exam.css') }}" rel="stylesheet" type="text/css">
    <!-- iNilabs css -->
    <link href="{{ asset('backend/common/themes/default/common.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('backend/common/responsive.css') }}" rel="stylesheet" type="text/css">
</head>

<body class="bg_gray">

    <header class="header-wrapper py-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-6">
                    <h2 class="text-white">Online Exam</h2>
                </div>
                <div class="col-12 col-lg-6 text-md-right">
                    <p class="text-white mb-0">
                        <img src="{{ asset('frontend/icons/logo.svg')}}" width="40" height="40" alt="">
                    </p>
                </div>
            </div>
        </div>
    </header>

    <div class="exam-wrapper">
        <div class="container">
            <div class="exam-inner text-white">
                <div class="row">

                    <div class="col-12 col-md-3 col-lg-3 text-center" >
                        <div class="" style="border-radius:10px 0 0 10px">
                        <div class="exam-inner-column">
                            
                            <div class="student-image">
                                <img class="img-fluid" onerror="this.onerror=null;this.src=" https://uifaces.co/our-content/donated/KtCFjlD4.jpg';" src="{{ asset('user-files/student/profile/'.$student->code."/".$student->profile_image) }}">
                            </div>
                            <ul class="sts-list list-unstyled pt-2">
                                <li class="item">
                                    <span>Student ID :</span>
                                    <span>{{$student->id_number}}</span>
                                </li>
                                <li class="item">
                                    <span>Student Name :</span>
                                    <span>{{$student->first_name}} {{$student->last_name}}</span>
                                </li>
                                <li class="item">
                                    <span>Class :</span>
                                    <span>{{$student->classname->name}} {{$student->divisions->name}} </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                    

            
            
                        
                        <div class="col-lg-3 pl-4">
                            
                             <ul class="exam-list pl-0 list-unstyled">
                                <li class="item d-flex">
                                    <div> <span>Subject:</span></div>
                                    <div class="pl-2"> <span>{{$exam->subjects->name}}</span></div>
                                </li>
                                
                                <li class="item d-flex">
                                    <div><span>Teacher:</span></div>

                                    @foreach($teacher_name as $key=>$teacher)
                                    @if($key == 0 )

                                    <div class="pl-2">  <span>
                                        {{ $teacher->first_name}} </span>
                                    </span>
                                    @else
                                  <span class="d-block" >
                                        {{ $teacher->first_name}} </span>
                                    </span>

                                    @endif
                                    @endforeach
                                    </div>
                                </li>

                            </ul>
                        </div>
                        <div class="col-lg-3">
                            <div>
                                <div class="left_exam"></div>
                                <div class="right_exam"></div>
                            </div> 
                            
                            <ul class="exam-list pl-10 list-unstyled" >
                                <li class="item">
                                    <span>Type of Exam :</span>
                                    <span>{{$exam->exams_category->name}}</span>
                                </li>
                                <li class="item">
                                    <span>Exam Name :</span>
                                    <span>{{$exam->name}} </span>
                                </li>
                                <li class="item">
                                    <span>Total Questions :</span>
                                    <span>{{$total_qustion}} </span>
                                </li>
                                <li class="item">
                                    <span>Total Mark :</span>
                                    <span>{{$totalmark}} </span>
                                </li>
                                <li class="item">
                                    <span>Total Time :</span>
                                    <span>{{$totalDuration}} hr</span>
                                </li>
                            </ul>
                        </div>
                        <div class="col-12 col-lg-3 question-list">
                            <div class="fade show border-2 timer" role="alert">
                                <h5>Time</h5>
                                <p class="lead font-weight-bold mb-0">
                                    <span id="hour">00</span> :
                                    <span id="min">00</span> :
                                    <span id="sec">00</span> :
                                    <span id="milisec">00</span>
                                </p>  
                        </div>
                        <div class="exam-title">
                            <h5 class="">{{$exam->name}} Exam</h5>
                        </div>
                            </div>
                    </div>
                    
                        <!-- <div class="exam-list-inner text-white">
                        </div> -->
                    </div>
                </div>
            </div>


            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-exam alert-dismissible fade show" role="alert">
                            <h5>Please Read Instruction Carefully</h5>
                            <h6>{{$exam->instructions->title}}</h6>
                            <p>{{$exam->instructions->content}}</p>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                    
                        
               
                </div>
            </div>
    



    <div class="question-wrapper pb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="row">
                        
                <div class="col-12 col-lg-12 question-list ">
                    <form class="form-horizontal" id="mainForm" method="post" action="{{ route('onlineExamSave') }}" enctype="multipart/form-data">
                        @csrf
                        @foreach($question as $key=>$questions)
                        @if($questions->type=='2')
                        <div class="card exam-list-inner-wrapper mb-4">
                            <div class="card-header font-weight-bold">
                                Objective Type
                            </div>

                            <div class="card-body lead">{{$key+1}}.{{ strip_tags($questions->question)}}</div>
                            <input type="hidden" name="exam_id" value="{{$exam->id}}">
                            <input type="hidden" name="question[]" value="{{$questions->id}}">
                            <div class="container pb-4">
                                <ul class="">
                                    @foreach($questions->option as $row2=>$row1)
                                    <li>
                                        <input type="radio" id="f-option"value="{{$row1->name}}" name="answer[]">
                                        {{$row1->name}}
                                        <!-- <label for="f-option"></label>
                                        <div class="check "></div> -->
                                    </li>
                                    @endforeach


                                    <!-- <button type="button" class="btn btn-primary mt-5 px-4">Submit</button> -->
                                </ul>
                            </div>
                        </div>
                        @endif
                        @if($questions->type=='1')
                        <div class="card exam-list-inner-wrapper mb-4">
                            <div class="card-header font-weight-bold">
                                Single Answer Type
                            </div>

                            <div class="card-body lead">{{$key+1}}.{{ strip_tags($questions->question)}}</div>
                            <input type="hidden" name="question[]" value="{{$questions->id}}">
                            <div class="container">
                                <div class="col-sm-12" style="padding-bottom:20px">
                                    <textarea type="text" class="form-control" id="" name="answer[]" value="" placeholder="Enter Answer"></textarea>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if($questions->type=='3')
                        <div class="card exam-list-inner-wrapper mb-4">
                            <div class="card-header font-weight-bold">
                                Dscriptive Type
                            </div>

                            <div class="card-body lead">{{$key+1}}.{{ strip_tags($questions->question)}}</div>
                            <input type="hidden" name="question[]" value="{{$questions->id}}">
                            <div class="container">
                                <div class="col-sm-12" style="padding-bottom:20px">
                                    <textarea type="text" class="form-control" id="" name="answer[]" value="" placeholder="Enter Answer"></textarea>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach

                        <div class="form-group">
                            <div class="justify-content-end d-flex">
                                <input type="submit" class="btn btn-success" value="Submit">
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div> 



                
            </div>
        </div>
    </div>

    <script type="text/javascript" src="{{ asset('backend/common/jquery.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
    <script src="{{asset('backend/validator/jquery.validate.js')}}"></script>
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.2/toastr.css" rel="stylesheet" />
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.js"></script>

    <script type="text/javascript">
        var x;
        var startstop = 0;
        window.onload = (event) => {
            startstop = startstop + 1;
            start();
        }

        function start() {
            x = setInterval(timer, 10);
        }

        function stop() {
            clearInterval(x);

        }
        var milisec = 0;
        var sec = 0;
        var min = 0;
        var hour = 0;


        function timer() {

            miliSecOut = checkTime(milisec);
            secOut = checkTime(sec);
            minOut = checkTime(min);
            hourOut = checkTime(hour);

            milisec = ++milisec;

            if (milisec === 100) {
                milisec = 0;
                sec = ++sec;
            }

            if (sec == 60) {
                min = ++min;
                sec = 0;
            }

            if (min == 60) {
                min = 0;
                hour = ++hour;

            }
            document.getElementById("milisec").innerHTML = miliSecOut;
            document.getElementById("sec").innerHTML = secOut;
            document.getElementById("min").innerHTML = minOut;
            document.getElementById("hour").innerHTML = hourOut;
            var duration = <?php print_r(json_encode($totalDuration)) ?>;
            if (hourOut + ':' + minOut + ':' + secOut == duration) {
                stop();
                var form_data = new FormData(document.getElementById('mainForm'));
                $.ajax({
                    type: "POST",
                    url: "{{route('onlineExamSaveTimeout')}}",
                    data: form_data,
                    dataType: "json",
                    contentType: false,
                    cache: false,
                    processData: false,
                    async: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if (response.status == 1) {
                            window.location.href = "{{ url('student/exam/') }}";
                        } else {
                            toastr.error('errors', response.errors);
                        }
                    }
                });



            }

        }



        function checkTime(i) {
            if (i < 10) {
                i = "0" + i;
            }
            return i;
        }
    </script>
</body>

</html>