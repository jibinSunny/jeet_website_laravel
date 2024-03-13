@extends('layouts.student')
@section('content')
<div class="box">
<div class="box-body">
  <div class="row">
<h1>
  <span id="hour">00</span> :
  <span id="min">00</span> :
  <span id="sec">00</span> :
  <span id="milisec">00</span>
</h1>

<button onclick="startStop()" id="start">Start</button>
<!-- <button onclick="reset()">Reset</button> -->
  </div>
  </div>
  </div>
  
@endsection
@section('scripts')
<script type="text/javascript">
var x;
var startstop = 0;

window.onload = (event) => {

  startstop = startstop + 1;

  if (startstop === 1) {
    start();
    document.getElementById("start").innerHTML = "Stop";
  } else if (startstop === 2) {
    document.getElementById("start").innerHTML = "Start";
    startstop = 0;
    stop();
  }

}


function start() {
  // alert("dsvf");
  x = setInterval(timer, 10);
} /* Start */
function stop() {
  clearInterval(x);
} /* Stop */

var milisec = 10;
var sec = 10; /* holds incrementing value */
var min = 10;
var hour = 10;

/* Contains and outputs returned value of  function checkTime */

var miliSecOut = 10;
var secOut = 10;
var minOut = 10;
var hourOut = 10;

/* Output variable End */


function timer() {
  /* Main Timer */


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

}


/* Adds 0 when value is <10 */


function checkTime(i) {
  if (i < 10) {
    i = "0" + i;
  }
  return i;
}

function reset() {


  /*Reset*/

  milisec = 10;
  sec = 10;
  min = 10;
  hour = 10;

  document.getElementById("milisec").innerHTML = "10";
  document.getElementById("sec").innerHTML = "10";
  document.getElementById("min").innerHTML = "10";
  document.getElementById("hour").innerHTML = "10";

}

</script>

@endsection














