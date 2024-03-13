@extends('layouts.student')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-student"></i> View  Attandance</h3>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-laptop"></i> Dashboard</a></li>
            <li class="active">View Attandance</li>
        </ol>
    </div><!-- /.box-header -->
    <div id="printablediv">
        <div class="row">
        
            <div class="col-sm-3">
                <div class="box box-primary">
                    <div class="box-body box-profile">
                    <img src="{{ asset('user-files/student/profile/'.$student->code."/".$student->profile_image) }}" onerror="this.onerror=null;this.src='{{asset('uploads/images/default.png')}}';" class="profile-user-img img-responsive img-circle" alt="">
                        <h3 class="profile-username text-center">{{$student->first_name}} {{$student->last_name}}</h3>
                        <p class="text-muted text-center">Reg.No :{{$student->reg_number}}</p>
                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item" style="background-color: #FFF">
                                <b>Gender</b> <a class="pull-right">{{ $student->gender }}</a>
                            </li>
                            <li class="list-group-item" style="background-color: #FFF">
                                <b>Class</b> <a class="pull-right">{{ $student->classname->name }}</a>
                            </li>
                            <li class="list-group-item" style="background-color: #FFF">
                                <b>Division</b> <a class="pull-right">{{ $student->divisions->name }}</a>
                            </li>
                            <li class="list-group-item" style="background-color: #FFF">
                                <b>Roll No.</b> <a class="pull-right">{{ $student->roll_number }}</a>
                            </li>
                            <li class="list-group-item" style="background-color: #FFF">
                                <b>DOB</b> <a class="pull-right">{{ $student->dob }}</a>
                            </li>
                            <li class="list-group-item" style="background-color: #FFF">
                                <b>Phone</b> <a class="pull-right">{{ substr($student->phone,6)}}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-sm-9">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                    <li class="active"><a href="" data-toggle="tab">Attandance : {{$year}}</a></li>
                    </ul>

                    <div class="tab-content"style="overflow: auto;margin-right: 10px;">
                        <div class="active tab-pane" id="attendance">
                            <div id="teacherDIV">
                                <table class="attendance_table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <?php
                                                for($i=1; $i<=31; $i++) {
                                                   echo  "<th>$i</th>";
                                                }
                                            ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($monthArray as  $id=>$months) 
                                    <tr>
                                    <td>{{$months}}</td>
                                 
                                               <?php
                                                    $con = false;
                                                    foreach($attandance as $row1){
                                                        if($row1->month == $id){
                                                            $con = true;
                                                        }
                                                    }
                                                    for($i=1; $i<=31; $i++) {
                                                        if($con == false){
                                                            echo  ' <th class=""style=background-color:antiquewhite;><a href="#" data-toggle="tooltip"data-placement="top" title="N/A">N/A </a></th>';
                                                        }
                                                        foreach($attandance as $row) 
                                                        {
                                                              if($row->month == $id){
                                                                    $t  = "a".$i;
                                                                    $np = $row->$t;
                                                                    if($np ===null){
                                                                        echo  '<th class=""style=background-color:antiquewhite;><a href="#" data-toggle="tooltip"data-placement="top" title="N/A">N/A </a></th>';
                                                                    }else{
                                                                        if($np ==="P"){
                                                                        echo  '<th calss=""style=background-color:#22b3a5;color:aliceblue;><a href="#" data-toggle="tooltip"data-placement="top" title="Present">'.$np.'</a></th>';
                                                                        }
                                                                        elseif($np ==="LE")
                                                                        {
                                                                         echo  '<th calss=""style=background-color:#9fb935;color:aliceblue;><a href="#" data-toggle="tooltip"data-placement="top" title="Late Present With Excuse">'.$np.'</a></th>';
                                                                        }
                                                                        elseif($np ==="L")
                                                                        {
                                                                         echo  '<th calss=""style=background-color:#f79384;color:aliceblue;><a href="#" data-toggle="tooltip"data-placement="top" title="Late Present">'.$np.'</a></th>';
                                                                        }
                                                                        elseif($np ==="A")
                                                                        {
                                                                         echo  '<th calss=""style=background-color:#e87070;color:aliceblue;><a href="#" data-toggle="tooltip"data-placement="top" title="Absent">'.$np.'</a></th>';
                                                                        }
                                                                    }
                                                                }
                                                        }
                                                    }
                                                ?>

                                    <tr>
                                    @endforeach  
                                    </tbody>
                                </table>
                            </div>
                            <div>
                                <p class="totalattendanceCount">

                                </p>
                            </div>
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
  $('#academic-menu').addClass('active')
</script>
@endsection

 

