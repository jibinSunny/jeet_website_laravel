@extends('layouts.admin')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-student"></i> View Class</h3>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-laptop"></i> Dashboard</a></li>
            <li class="active">View Class</li>
        </ol>
    </div><!-- /.box-header -->
    <div id="printablediv">
    <div class="box" id="class_report_details">
        <div class="box-header bg-gray" id="header">
            <h3 class="box-title text-navy"><i class="fa fa-clipboard"></i> View For Class - {{$class->name}} ( Divisions  @foreach($class->divisions as $item1) {{ isset($item1->name )?$item1->name:''}}, @endforeach )</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        <div id="printablediv">
            <div class="box-body">
                <div class="row">
                    <!-- <div class="col-sm-12"style="text-align: center;padding: 20px;" id="academic_year"></div> -->
                    <div class="col-sm-12">
                </div>
                    <div class="col-sm-6">
                        <div class="box box-solid " style="border: 1px #ccc solid; border-left: 2px black solid">
                            <div class="box-header bg-gray with-border">
                                <h3 class="box-title text-navy">Class Informations</h3>
                                <ol class="breadcrumb">
                                    <li><i class="fa fa-info fa-2x"></i></li>
                                </ol>
                            </div>
                            <div class="box-body">
                            <span class="text-blue">Number of Students : {{$student_count}}</span><br>
                            <span class="text-blue">Total Subject Assigned : {{$subject_count}} </span>

                            </div>
                        </div>

                        <br>

                        <div class="box box-solid " style="border: 1px #ccc solid; border-left: 2px green solid">
                            <div class="box-header bg-gray with-border">
                                <h3 class="box-title text-navy">Subjects And Teachers</h3>
                                <ol class="breadcrumb">
                                    <li><i class="fa fa-book fa-2x"></i></li>
                                </ol>
                            </div>
                            <div class="box-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Subject</th>
                                            <th>Teacher</th>
                                        </tr>
                                    </thead>
                                    <tbody >

                                        <tr> 
                                        @foreach($class_subject_teacher as $item)
                                            <td>{{$item->name}}</td>
                                            <td>
                                              @foreach($item->teacher_name as $item1)
                                              {{ isset($item1->first_name )?$item1->first_name:''}}  {{ isset($item1->last_name )?$item1->last_name:''}},
                                               @endforeach 
                                            </td>
                                            @endforeach    
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <br>


                    </div>

                    <div class="col-sm-6">
                        <div class="box box-solid " style="border: 1px #ccc solid; border-left: 2px red solid">
                            <div class="box-header bg-gray with-border">
                                <h3 class="box-title text-navy">Class Teacher</h3>
                                <ol class="breadcrumb">
                                    <li><i class="fa icon-teacher fa-2x"></i></li>
                                </ol>
                            </div>
                            <div class="box-body" >
                            @foreach($class_teacher as $item)
                            <section class="panel"><div class="profile-db-head bg-maroon-light"><a>
                            <img src="{{ asset('user-files/teacher/profile/'.$item->code."/".$item->profile_image) }}" onerror="this.onerror=null;this.src='{{asset('uploads/images/default.png')}}';" class="profile-user-img img-responsive img-circle" alt=""></a>
                            <h1>{{$item->first_name}} {{$item->last_name}}</h1>
                            </div> <table class="table table-hover"><tbody> <tr><td><i class="fa fa-phone text-maroon-light"></i></td><td>Phone</td><td>{{$item->phone}}</td></tr><tr><td><i class="fa fa-envelope text-maroon-light"></i></td><td>Email</td><td>{{$item->email}}</td></tr><tr><td><i class=" fa fa-globe text-maroon-light"></i></td><td>Address</td><td>{{$item->address}}</td></tr></tbody></table></section>
                            @endforeach  
                            </div>

                        </div>

                    </div>

                    <div class="col-sm-12 text-center footerAll">
                    </div>
                </div><!-- row -->
            </div><!-- Body -->
        </div>
    </div>
    </div>
</div>


@endsection
@section('scripts')
<script>
    $('#report-menu').addClass('active')
    $('#general_reports').addClass('active')
</script>
@endsection
