@extends('layouts.admin')
@section('content')
<div class="box">
<div class="box-header">
        <h3 class="box-title"><i class="fa icon-hostel"></i> Edit Hostel</h3>

       
        <ol class="breadcrumb">
            <li><a href="{{ route('showDashboard') }}"><i class="fa icon-dashboardIcon"></i> Dashboard</a></li>
            <li><a href="{{ route('showHostel') }}">Hostel</a></li>
            <li class="active">Edit Hostel</li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-10">
            <form class="form-horizontal"id="mainForm" method="post" action="{{ route('saveHostel') }}" enctype="multipart/form-data">
             @csrf
                <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">
                           Name <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                        <input type="hidden" class="form-control" id="classes" name="academicyear_id" value="{{$hostel->id}}">
                            <input type="text" class="form-control" id="name" name="name" value="{{$hostel->name}}" >
                        </div>
                        @if ($errors->has('name'))
                        <strong>{{ $errors->first('name') }}</strong>
                        @endif
                        <span class="col-sm-4 control-label"></span>
                    </div>
                    <div class="form-group">
                        <label for="htype" class="col-sm-2 control-label">
                           Type <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                        <select name="hostel_type" id="class"
                                        class="form-control select2" tabindex="-1">
                                        @if($hostel->hostel_type=="boys")
                                        <option value="boys"selected>Boys</option>
                                        <option value="girls">Girls</option>
                                        <option value="common">Common</option>
                                        @elseif($hostel->hostel_type=="girls")
                                        <option value="boys">Boys</option>
                                        <option value="girls">Girls</option>
                                        <option value="common"selected>Common</option>
                                        @elseif($hostel->hostel_type=="common")
                                        <option value="boys">Boys</option>
                                        <option value="girls">Girls</option>
                                        <option value="common"selected>Common</option>
                                        @endif
                                        </select>
                        </div>
                        <span class="col-sm-4 control-label">
                        @if ($errors->has('hostel_type'))
                        <strong>{{ $errors->first('hostel_type') }}</strong>
                        @endif
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="address" class="col-sm-2 control-label">
                           Address <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="address" name="address" value="{{$hostel->address}}" >
                        </div>
                        @if ($errors->has('address'))
                        <strong>{{ $errors->first('address') }}</strong>
                        @endif
                        <span class="col-sm-4 control-label">
                           
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="note" class="col-sm-2 control-label">Note</label>
                        <div class="col-sm-6">
                            <textarea class="form-control" style="resize:none;" id="note" name="note">{{$hostel->note}}</textarea>
                        </div>
                        @if ($errors->has('note'))
                        <strong>{{ $errors->first('note') }}</strong>
                        @endif
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
</div>

@endsection
@section('scripts')
<script type="text/javascript">
    $('.select2').select2();
</script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"></script>
<script>
  $("form#mainForm").validate({
                normalizer: function(value) {
                    return $.trim(value);
                },
                rules: {
                    name: {
                        required: true
                    },
                    hostel_type: {
                        required: true
                    },
                    address: {
                        required: true
                    },
           
                },
                messages: {
                    hostel_type: {
                        required: "Hostel Type is required"
                    },
                    name: {
                        required: "Name Type is required"
                    },
                    address: {
                        required: "Address Type is required"
                    },
 
                },
            });

</script>
@endsection