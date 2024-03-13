@extends('layouts.student')
@section('content')
<div class="box">
<div class="box-header">
        <h3 class="box-title"> Edit Diary</h3>


        <ol class="breadcrumb">
            <li><a href=""><i class="fa icon-dashboardIcon"></i> Dashboard</a></li>
            <li><a href=""></i>Diary</a></li>
            <li class="active">Edit Diary</li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-10">
            <form class="form-horizontal"id="mainForm" method="post" action="{{ route('saveDiary') }}" enctype="multipart/form-data">
             @csrf
             <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">
                            Date <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="date" name="date" value="{{$mydiary->date}}"placeholder="Enter Date">
                            <input type="hidden" class="form-control" id="academicyear_id" name="academicyear_id" value="{{$mydiary->id}}"placeholder="Enter Date">
                        </div>
                        <span class="col-sm-4 control-label"></span>
                    </div>
                    <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">
                          Note <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                        <textarea class="form-control" style="resize:none;" id="note"name="note"placeholder="Enter Note">{{$mydiary->note}}</textarea>
                        </div>
                      
                     
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
  $('#personal_reports').addClass('active')
  $("#date").datepicker();
</script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"></script>
<script>
  $("form#mainForm").validate({
                normalizer: function(value) {
                    return $.trim(value);
                },
                rules: {
                    date: {
                        required: true
                    },
                    note: {
                        required: true
                    },
                },
                messages: {
                    date: {
                        required: "Date is required"
                    },
                    note: {
                        required: "note is required"
                    },
 
                },
            });
</script>

@endsection