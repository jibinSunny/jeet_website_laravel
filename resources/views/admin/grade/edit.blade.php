@extends('layouts.admin')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-signal"></i> Add Grade</h3>

       
        <ol class="breadcrumb">
            <li><a href=""><i class="fa icon-dashboardIcon"></i>Dashboard</a></li>
            <li><a href=""></a>Grade</li>
            <li class="active"> Edit Grade</li>
        </ol>
    </div><!-- /.box-header -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-10">
            <form class="form-horizontal"id="mainForm" method="post" action="{{ route('savegrade') }}" enctype="multipart/form-data">
             @csrf
                    <div class="form-group">
                        <label for="grade" class="col-sm-2 control-label">
                            Grade Name <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                        <input type="hidden" class="form-control" id="academicyear_id" name="academicyear_id" value="{{$gradelist->id}}" >
                            <input type="text" class="form-control" id="grade" name="grade" value="{{$gradelist->grade}}"placeholder="Enter Grade" >
                           @if ($errors->has('grade'))
                           <strong style="color: #f56954;font-size: 12px;">{{ $errors->first('grade') }}</strong>
                           @endif
                        </div>
                        <span class="col-sm-4 control-label">
            
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="point" class="col-sm-2 control-label">
                           Grade Point <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="point" name="point" value="{{$gradelist->point}}" placeholder="Enter Point">
                          @if ($errors->has('point'))
                           <strong style="color: #f56954;font-size: 12px;">{{ $errors->first('point') }}</strong>
                           @endif
                        </div>
                        <span class="col-sm-4 control-label">
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="gradefrom" class="col-sm-2 control-label">
                           Mark From <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="number" class="form-control" id="gradefrom" name="gradefrom" value="{{$gradelist->gradefrom}}" placeholder="Enter grade from">
                          @if ($errors->has('gradefrom'))
                           <strong style="color: #f56954;font-size: 12px;">{{ $errors->first('gradefrom') }}</strong>
                           @endif
                        </div>
                        <span class="col-sm-4 control-label">
                            
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="gradeupto" class="col-sm-2 control-label">
                            Mark Upto <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="number" class="form-control" id="gradeupto" name="gradeupto" value="{{$gradelist->gradeupto}}" placeholder="Enter Grade upto">
                          @if ($errors->has('gradeupto'))
                           <strong style="color: #f56954;font-size: 12px;">{{ $errors->first('gradeupto') }}</strong>
                           @endif
                        </div>
                        <span class="col-sm-4 control-label">
                            
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="note" class="col-sm-2 control-label">Note
                        </label>
                        <div class="col-sm-6">
                            <textarea style="resize:none;" class="form-control" id="note" name="note"placeholder="Enter note">{{$gradelist->note}}</textarea>
                        </div>
                        <span class="col-sm-4 control-label">
                           
                        </span>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-8">
                            <input type="submit" class="btn btn-success" value="Submit" >
                        </div>
                    </div>
                </form>
            </div>    
        </div>
    </div>
@endsection
@section('scripts')
<script>
  $('#exam-menu').addClass('active')
</script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"></script>
<script>
  $("form#mainForm").validate({
                normalizer: function(value) {
                    return $.trim(value);
                },
                rules: {
                    grade: {
                        required: true,
                        unique: true,
                    },
                    point: {
                        required: true,
                    },
                    gradefrom: {
                        required: true,
                    },
                    gradeupto: {
                        required: true,
                        min: function() {
                                return parseInt($('#gradefrom').val());
                            }
                    },
           
                },
                messages: {
                    grade: {
                        required: "grade is required"
                    },
                    point: {
                        required: "point is required"
                    },
                    gradefrom: {
                        required: "grade from is required"
                    },
                    gradeupto: {
                        required: "grade upto is required"
                    },
 
                },
            });

</script>
<script>
    $('#class').(function() {
        var courseID = $(this).val();
    });
</script>
@endsection