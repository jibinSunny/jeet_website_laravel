@extends('layouts.student')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-assignment"></i>Caleder</h3>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa icon-dashboardIcon"></i> Dashboard</a></li>
            <li class="active">Caleder</li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="box-body">
                <div class="row">
                        <div class="col-sm-12">
                        <div id='calendar'></div>
                        </div>
                </div><!-- row -->
            </div><!-- Body -->
        </div>
    </div>
</div>

@endsection
@section('scripts')
<script>
  $('#personal_reports').addClass('active')
</script>

<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
<script>
    $(document).ready(function() {
        // page is now ready, initialize the calendar...
        $('#calendar').fullCalendar({
            events : [
                @foreach($diarylist as $task)
                {
                    title : '{{ $task->note }}',
                    start : '{{ $task->date }}',
                },
                @endforeach
            ]
        })
    });
</script>
@endsection