@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="row">
        <div class="col-lg-3 col-xs-6">
                <div class="small-box ">
                    <a class="small-box-footer bg-gradient-darkblue" href="">
                        <div class="icon text-white">
                            <i class="fa icon-student"></i>
                        </div>
                        <div class="inner ">
                            <h3 class="text-white">{{$count_student}}</h3>
                            <p class="text-white">Student</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box ">
                    <a class="small-box-footer bg-mice" href="">
                        <div class="icon text-white">
                            <i class="fa icon-teacher"></i>
                        </div>
                        <div class="inner ">
                            <h3 class="text-white">{{$count_teacher}}</h3>
                            <p class="text-white">Teacher</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box ">
                    <a class="small-box-footer bg-purple-twitch" href="">
                        <div class="icon text-white">
                            <i class="fa fa-user"></i>
                        </div>
                        <div class="inner ">
                            <h3 class="text-white">{{$count_parents}}</h3>
                            <p class="text-white">Parents</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box ">
                    <a class="small-box-footer bg-soundcloud" href="">
                        <div class="icon text-white">
                            <i class="fa icon-subject"></i>
                        </div>
                        <div class="inner ">
                            <h3 class="text-white">{{$count_class}}</h3>
                            <p class="text-white">Class</p>
                        </div>
                    </a>
                </div>
            </div>

        </div>


        <div class="row">
            <div class="col-sm-4">
                <section class="panel">
                    <div class="profile-db-head bg-sky">
                        <a href=""><img onerror="this.onerror=null;this.src='{{asset('uploads/images/default.png')}}';" src="{{ asset('user-files/admin/admin-profiles/'."/".$user->photo)}}"></a>
                        <h1>{{$user->name}}</h1>
                        <p>admin</p>
                    </div>
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <td>
                                    <i class="fa icon-account_circle"></i>
                                </td>
                                <td>Username</td>
                                <td>{{$user->email}}</td>
                            </tr>
                            <tr>
                                <td>
                                    <i class="fa icon-mail"></i>
                                </td>
                                <td>Email</td>
                                <td>{{$user->email}}</td>
                            </tr>
                            <tr>
                                <td>
                                    <i class="fa icon-phone"></i>
                                </td>
                                <td>Phone</td>
                                <td>{{$user->phone}}</td>
                            </tr>
                            <tr>
                                <td>
                                    <i class=" fa icon-location_pin"></i>
                                </td>
                                <td>Address</td>
                                <td>{{$user->address}}</td>
                            </tr>
                        </tbody>
                    </table>
                </section>
            </div>
            <div class="col-sm-8">
                <div class="box">
                    <div class="box-body">
                        <!-- chart -->
                        <div class="box-header" style="background-color: #fff;">
                            <h2 class="box-title text-black">
                                Student Attendence Overview </h2>
                        </div>
                        <div id="chartdiv"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="box">
                    <div class="box-body" style="padding: 0px;height: 320px">
                        <div class="box">
                            <div class="box-header" style="background-color: #fff;">
                                <h3 class="box-title text-black">
                                    Notice </h3>
                            </div>

                            <div class="box-body" style="padding: 0px;">
                                <table class="table table-hover">
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Programming Contest</td>
                                            <td>On 20-11-2018 will held a programming contest on the..</td>
                                            <td><a href="/v4.6/notice/view/6" class="btn bg-maroon-light btn-xs mrg" style="background-color:#00bcd4;color:#fff;" data-placement="top" data-toggle="tooltip" data-original-title="View">View</a></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Annual Sports Day</td>
                                            <td>In your school campus on 1-03-2018 wil..</td>
                                            <td><a href="/v4.6/notice/view/5" class="btn bg-maroon-light btn-xs mrg" style="background-color:#00bcd4;color:#fff;" data-placement="top" data-toggle="tooltip" data-original-title="View">View</a></td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Second Semester Exam</td>
                                            <td>Your second semester exam will held on 30-08-2018.Pl..</td>
                                            <td><a href="/v4.6/notice/view/4" class="btn bg-maroon-light btn-xs mrg" style="background-color:#00bcd4;color:#fff;" data-placement="top" data-toggle="tooltip" data-original-title="View">View</a></td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>First Semester Exam</td>
                                            <td>Your first semester Exam will held on ..</td>
                                            <td><a href="/v4.6/notice/view/3" class="btn bg-maroon-light btn-xs mrg" style="background-color:#00bcd4;color:#fff;" data-placement="top" data-toggle="tooltip" data-original-title="View">View</a></td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>School holidays 2020</td>
                                            <td>Mar 29, 2020 -&nbsp;N..</td>
                                            <td><a href="/v4.6/notice/view/2" class="btn bg-maroon-light btn-xs mrg" style="background-color:#00bcd4;color:#fff;" data-placement="top" data-toggle="tooltip" data-original-title="View">View</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.row -->
    </div>
</div>

@endsection
@section('scripts')
<script>
  $('#dashboard-menu').addClass('active')
</script>
<script>
    $(document).ready(function() {
        @if(Session::has('success'))
        toastr.success('{{ Session::get('
            success ') }}', 'Successful');
        @endif
        @if(Session::has('errors'))
        @foreach($errors -> all() as $error)
        toastr.error('{{ $error }}', 'Error');
        @endforeach
        @endif
    });
</script>
<style>
#chartdiv {
  width: 100%;
  height: 300px;
}
</style>
<script type="application/javascript">
    $(function() {
        $('#calendar').fullCalendar({
            theme: true,
            customButtons: {
                reload: {
                    text: 'Reload',
                    click: function() {}
                }
            },
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay,listMonth'
            },
            navLinks: true,
            editable: false,
            eventLimit: true,
            events: [{
                title: 'HACKATHON',
                start: '2020-10-29T00:00:00',
                end: '2020-10-29T23:00:00',
                url: 'https://demo.inilabs.net/school/v4.6/event/view/1',
                color: '#5C6BC0'
            }, {
                title: 'Football Tournament',
                start: '2020-09-17T00:00:00',
                end: '2020-10-15T23:00:00',
                url: 'https://demo.inilabs.net/school/v4.6/event/view/3',
                color: '#5C6BC0'
            }, {
                title: 'International Mother Language Day',
                start: '2020-02-20T00:00:00',
                end: '2020-03-22T23:00:00',
                url: 'https://demo.inilabs.net/school/v4.6/event/view/2',
                color: '#5C6BC0'
            }, {
                title: 'Eid-ul-Fitr',
                start: '2020-07-14',
                end: '2020-07-29',
                url: 'https://demo.inilabs.net/school/v4.6/holiday/view/1',
                color: '#C24984'
            }, {
                title: 'Durga Puza 2020',
                start: '2020-08-16',
                end: '2020-08-20',
                url: 'https://demo.inilabs.net/school/v4.6/holiday/view/2',
                color: '#C24984'
            }, {
                title: 'Victory Day',
                start: '2020-12-16',
                end: '2020-12-17',
                url: 'https://demo.inilabs.net/school/v4.6/holiday/view/3',
                color: '#C24984'
            }, {
                title: 'Christmas Day',
                start: '2020-12-25',
                end: '2020-12-25',
                url: 'https://demo.inilabs.net/school/v4.6/holiday/view/4',
                color: '#C24984'
            }, ]
        });
    });
</script>

<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>
<script>
    am4core.ready(function() {

    // Themes begin
    am4core.useTheme(am4themes_animated);
    // Themes end



    var chart = am4core.create('chartdiv', am4charts.XYChart)
    chart.colors.step = 2;

    chart.legend = new am4charts.Legend()
    chart.legend.position = 'top'
    chart.legend.paddingBottom = 20
    chart.legend.labels.template.maxWidth = 95

    var xAxis = chart.xAxes.push(new am4charts.CategoryAxis())
    xAxis.dataFields.category = 'category'
    xAxis.renderer.cellStartLocation = 0.1
    xAxis.renderer.cellEndLocation = 0.9
    xAxis.renderer.grid.template.location = 0;

    var yAxis = chart.yAxes.push(new am4charts.ValueAxis());
    yAxis.min = 0;

    function createSeries(value, name) {
        var series = chart.series.push(new am4charts.ColumnSeries())
        series.dataFields.valueY = value
        series.dataFields.categoryX = 'category'
        series.name = name

        series.events.on("hidden", arrangeColumns);
        series.events.on("shown", arrangeColumns);

        var bullet = series.bullets.push(new am4charts.LabelBullet())
        bullet.interactionsEnabled = false
        bullet.dy = 30;
        bullet.label.text = '{valueY}'
        bullet.label.fill = am4core.color('#ffffff')

        return series;
    }

    chart.data = [
        {
            category: '1',
            total: 45,
            present: 34,
        },
        {
            category: '2',
            total: 45,
            present: 38,
        },
        {
            category: '3',
            total: 45,
            present: 27,
        },
        {
            category: '4',
            total: 45,
            present: 43,
        }
    ]

    createSeries('total', 'Total');
    createSeries('present', 'Present');
    function arrangeColumns() {

        var series = chart.series.getIndex(0);

        var w = 1 - xAxis.renderer.cellStartLocation - (1 - xAxis.renderer.cellEndLocation);
        if (series.dataItems.length > 1) {
            var x0 = xAxis.getX(series.dataItems.getIndex(0), "categoryX");
            var x1 = xAxis.getX(series.dataItems.getIndex(1), "categoryX");
            var delta = ((x1 - x0) / chart.series.length) * w;
            if (am4core.isNumber(delta)) {
                var middle = chart.series.length / 2;

                var newIndex = 0;
                chart.series.each(function(series) {
                    if (!series.isHidden && !series.isHiding) {
                        series.dummyData = newIndex;
                        newIndex++;
                    }
                    else {
                        series.dummyData = chart.series.indexOf(series);
                    }
                })
                var visibleCount = newIndex;
                var newMiddle = visibleCount / 2;

                chart.series.each(function(series) {
                    var trueIndex = chart.series.indexOf(series);
                    var newIndex = series.dummyData;

                    var dx = (newIndex - trueIndex + middle - newMiddle) * delta

                    series.animate({ property: "dx", to: dx }, series.interpolationDuration, series.interpolationEasing);
                    series.bulletsContainer.animate({ property: "dx", to: dx }, series.interpolationDuration, series.interpolationEasing);
                })
            }
        }
    }

    }); // end am4core.ready()
    </script>
@endsection
