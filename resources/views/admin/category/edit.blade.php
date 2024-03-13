@extends('layouts.admin')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-leaf"></i>Edit Category</h3>

        <ol class="breadcrumb">
            <li><a href="{{ route('showDashboard') }}"><i class="fa icon-dashboardIcon"></i> Dashboard</a></li>
            <li><a href="{{ route('showHostelCategory') }}">Category</a></li>
            <li class="active">Edit Category</li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-10">
            <form class="form-horizontal"id="mainForm" method="post" action="{{ route('savedHostelCategory') }}" enctype="multipart/form-data">
             @csrf
                    <div class="form-group">
                        <label for="hname" class="col-sm-2 control-label">
                            Hostel Name <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                        <input type="hidden" class="form-control" id="classes" name="academicyear_id" value="{{$host_category_list->id}}">
                            <select name="hostel" id="hostel" class="form-control select2" tabindex="-1">
                                <option value="0">Select Hostel</option>
                                @foreach($hostel as $expert)
                                    <option value="{{ $expert->id}}" {{$host_category_list->hostel ==$expert->id ? 'selected' :''}}>{{ $expert->name}} </option>
                              @endforeach
                       
                            </select>
                        </div>
                        @if ($errors->has('name'))
                        <strong>{{ $errors->first('name') }}</strong>
                        @endif
                        <span class="col-sm-4 control-label">
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="class_type" class="col-sm-2 control-label">
                            Class Type <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="class_type" name="class_type" value="{{$host_category_list->class_type}}"placeholder="Enter Class Type" >
                        </div>
                        @if ($errors->has('class_type'))
                        <strong>{{ $errors->first('class_type') }}</strong>
                        @endif
                        <span class="col-sm-4 control-label"></span>
                    </div>

                    <div class="form-group">
                        <label for="hbalance" class="col-sm-2 control-label">
                            Hostel Fee <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="number" class="form-control" id="fee" name="fee" value="{{$host_category_list->fee}}"placeholder="Enter Fee" >
                        </div>
                        @if ($errors->has('fee'))
                        <strong>{{ $errors->first('fee') }}</strong>
                        @endif
                        <span class="col-sm-4 control-label">

                        </span>
                    </div>

                    <div class="form-group">
                        <label for="note" class="col-sm-2 control-label">Description</label>
                        <div class="col-sm-6">
                            <textarea class="form-control" style="resize:none;" id="note" name="note"placeholder="Enter Description">{{$host_category_list->note}}</textarea>
                        </div>
                        @if ($errors->has('note'))
                        <strong>{{ $errors->first('note') }}</strong>
                        @endif
                         <span class="col-sm-4 control-label"></span>
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
</div>

@endsection
@section('scripts')
<script type="text/javascript">
    $('.select2').select2();
</script>
<script>
  $('#hostel-menu').addClass('active')
</script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"></script>
<script>
  $("form#mainForm").validate({
                normalizer: function(value) {
                    return $.trim(value);
                },
                rules: {
                    hostel: {
                        required: true
                    },
                    class_type: {
                        required: true
                    },
                    fee: {
                        required: true
                    },
                },
                messages: {
                    hostel: {
                        required: "Hostel is required"
                    },
                    class_type: {
                        required: "Class Type is required"
                    },
                    fee: {
                        required: "Fee is required"
                    },
                },
            });

</script>
@endsection
