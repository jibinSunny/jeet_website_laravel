@extends('layouts.admin')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <div class="profileArea">
        <div class="mainArea">
            <div class="areaTop">
                <div class="studentImage">
                    <img class="studentImg" src="" alt="">
                </div>
                <div class="studentProfile">
                    <div class="singleItem">
                        <div class="single_label"></div>
                        <div class="single_value">: </div>
                    </div>
                    <div class="singleItem">
                        <div class="single_label"></div>
                        <div class="single_value">: </div>
                    </div>
                    <div class="singleItem">
                        <div class="single_label"></div>
                        <div class="single_value">: </div>
                    </div>
                    <div class="singleItem">
                        <div class="single_label"></div>
                        <div class="single_value">: </div>
                    </div>
                    <div class="singleItem">
                        <div class="single_label"></div>
                        <div class="single_value">: </div>
                    </div>
                </div>
            </div>

            <div class="sattendanceArea">
                <h4></h4>
                <table class="attendance_table">
                    <thead>
                        <tr>
                            <th>#</th>
                        
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
                <p class="totalattendanceCount">
                    :, 
                    :, 
                    :, 
                    :, 
                    :, 
                    :, 
                    :
                </p>
            </div>
        </div>
    </div>
</body>
</html>
@endsection
@section('scripts')

@endsection