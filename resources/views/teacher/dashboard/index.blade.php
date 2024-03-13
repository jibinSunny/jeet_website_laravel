@extends('layouts.teacher')
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
            <div class="col-sm-12">
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
        </div><!-- /.row -->
    </div>
</div>

@endsection
@section('scripts')
<style>
    #chartdiv {
  width: 100%;
  height: 500px;
}
</style>
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
/**
 * ---------------------------------------
 * This demo was created using amCharts 4.
 *
 * For more information visit:
 * https://www.amcharts.com/
 *
 * Documentation is available at:
 * https://www.amcharts.com/docs/v4/
 * ---------------------------------------
 */

// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

// create chart
var chart = am4core.create("chartdiv", am4charts.TreeMap);
chart.hiddenState.properties.opacity = 0; // this makes initial fade in effect

chart.data = [{
  name: "First",
  children: [
    {
      name: "1A",
      value: 19
    },
    {
      name: "1B",
      value: 28
    },
    {
      name: "1C",
      value: 30
    }
  ]
},
{
  name: "Second",
  children: [
    {
      name: "2A",
      value: 35
    },
    {
      name: "2B",
      value: 18
    },
    {
      name: "3c",
      value: 26
    }
  ]
},
{
  name: "Third",
  children: [
    {
      name: "3A",
      value: 35
    },
    {
      name: "3B",
      value: 48
    },
    {
      name: "3C",
      value: 16
    }
  ]
},
{
  name: "Fourth",
  children: [
    {
      name: "4A",
      value: 31
    },
    {
      name: "4B",
      value: 28
    },
    {
      name: "4C",
      value: 19
    }
  ]
},
{
  name: "Fifth",
  children: [
    {
      name: "5A",
      value: 17
    },
    {
      name: "5B",
      value: 18
    },
    {
      name: "5C",
      value: 38
    }
  ]
}];

chart.colors.step = 2;

// define data fields
chart.dataFields.value = "value";
chart.dataFields.name = "name";
chart.dataFields.children = "children";

chart.zoomable = false;
var bgColor = new am4core.InterfaceColorSet().getFor("background");

// level 0 series template
var level0SeriesTemplate = chart.seriesTemplates.create("0");
var level0ColumnTemplate = level0SeriesTemplate.columns.template;

level0ColumnTemplate.column.cornerRadius(10, 10, 10, 10);
level0ColumnTemplate.fillOpacity = 0;
level0ColumnTemplate.strokeWidth = 4;
level0ColumnTemplate.strokeOpacity = 0;

// level 1 series template
var level1SeriesTemplate = chart.seriesTemplates.create("1");
var level1ColumnTemplate = level1SeriesTemplate.columns.template;

level1SeriesTemplate.tooltip.animationDuration = 0;
level1SeriesTemplate.strokeOpacity = 1;

level1ColumnTemplate.column.cornerRadius(10, 10, 10, 10)
level1ColumnTemplate.fillOpacity = 1;
level1ColumnTemplate.strokeWidth = 4;
level1ColumnTemplate.stroke = bgColor;

var bullet1 = level1SeriesTemplate.bullets.push(new am4charts.LabelBullet());
bullet1.locationY = 0.5;
bullet1.locationX = 0.5;
bullet1.label.text = "{name}";
bullet1.label.fill = am4core.color("#ffffff");

chart.maxLevels = 2;
</script>
<script type="text/javascript">
    $(function() {
        $("#withoutBtn").dataTable();
    });
</script>
@endsection
