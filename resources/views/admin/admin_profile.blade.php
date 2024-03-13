@extends('layouts.admin')
@section('content')
<!-- ########## START: MAIN PANEL ########## -->
<div class="br-mainpanel">
    <div class="br-pagebody">

        <div class="br-section-wrapper" style="background-color: aliceblue;">
            <h6 class="br-section-label" style="padding: 10px;font-size:20px;">Admin Profile</h6><br>
            <form action="{{ route('adminupdateProfile') }}"id="mainForm" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- <form id='news-add-form' method="POST" action="javascript:;"> -->
                <div class="form-layout form-layout-1">
                    <div class="row">

                        <div class="col-md-4">
                            <div class="box box-primary" style="background-color: #fff;">
                                <div class="box-body box-profile" style="text-align:center">
                                    <img onerror="this.onerror=null;this.src='{{asset('uploads/images/default.png')}}';" src="{{URL::asset('/user-files/admin/admin-profiles/').'/'.$admin->photo}}">

                                    <h5 class="profile-username text-center pd-15">{{$admin->name}}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="nav-tabs-custom" style="background-color: azure;">
                                <ul class="nav nav-tabs pd-15">
                                    <li class="active"><a href="#profile" data-toggle="tab">Profile</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="active tab-pane" id="profile">

                                        <dl class="row mb-0 pd-15">
                                            <div class="col-sm-4 text-sm-right">
                                                <dt>Name:</dt>
                                            </div>
                                            <div class="form-group col-md-8">
                                                <input class="form-control" type="hidden" value="{{$admin->id}}" name="id" id="id">
                                                <input class="form-control" type="text" value="{{$admin->name}}" name="name" id="name" placeholder="Enter Commission">
                                                <label class="form-control-label">Name: <span class="tx-danger">*</span></label>
                                            </div>
                                        </dl>
                                        <dl class="row mb-0 pd-15">
                                            <div class="col-sm-4 text-sm-right">
                                                <dt>Mobile:</dt>
                                            </div>
                                            <div class="form-group col-md-8">
                                                <input class="form-control" type="text" value="{{$admin->phone}}" name="mobile" id="mobile" placeholder="Enter mobile">

                                            </div>
                                        </dl>
                                        <dl class="row mb-0 pd-15">
                                            <div class="col-sm-4 text-sm-right">
                                                <dt>Email:</dt>
                                            </div>
                                            <div class="form-group col-md-8">
                                                <input class="form-control" type="email" value="{{$admin->email}}" name="email" id="mobile" placeholder="Enter mobile">
                                                <label class="form-control-label">Email: <span class="tx-danger">*</span></label>
                                            </div>
                                        </dl>
                                        <dl class="row mb-0">
                                            <div class="col-sm-4 text-sm-right">
                                                <dt>Image:</dt>
                                            </div>

                                            <div class="form-group col-md-8">
                                                <img src="{{URL::asset('/user-files/admin/admin-profiles/').'/'.$admin->photo}}" width="40" alt="">
                                                <input class="form-control" type="file" value="" name="photo" id="photo">
                                                <label class="form-control-label">Image: <span class="tx-danger">*</span></label>
                                            </div>
                                        </dl>
                                        <dl class="row pd-15">

                                            <div class="col-sm-4 text-sm-right">
                                                <dt>Status:</dt>
                                            </div>
                                            <div class="col-sm-8 text-sm-left">
                                                <select class="form-control" name="active" id="active">
                                                    <option value="" selected disabled>Choose Status</option>

                                                    @if($admin->active =="1")
                                                    <option value="1" selected>Active</option>
                                                    <option value="0">InActive</option>
                                                    @else
                                                    <option value="1">Active</option>
                                                    <option value="0" selected>InActive</option>
                                                    @endif

                                                </select>
                                                <label class="form-control-label">Status: <span class="tx-danger">*</span></label>
                                            </div>
                                            <div class="col-12 text-sm-right"style="padding:10px;padding-top:30px;float: right;">
                                            <button type="submit" class="btn btn-success">Update</button>
                                            </div>
                              
                                        </dl>
            </form>
        </div>

    </div>
</div>
@endsection
@section('scripts')
<script>
    $('#dashboard-menu').addClass('active')
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
                    mobile: {
                        required: true,
                    },
                    email: {
                        required: true,
                    },
                    status: {
                        required: true,
                    },
           
                },
                messages: {
                    name: {
                        name: "name is required"
                    },
                    mobile: {
                        required: "mobile is required"
                    },
                    email: {
                        required: "email is required"
                    },
                    status: {
                        required: "status is required"
                    },
 
                },
            });

</script>

@endsection