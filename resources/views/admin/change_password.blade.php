@extends('layouts.admin')
@section('content')
<!-- ########## START: MAIN PANEL ########## -->
<div class="br-mainpanel">
    <div class="br-pagebody">

        <div class="br-section-wrapper" style="background-color: aliceblue;">
            <h6 class="br-section-label" style="padding: 10px;font-size:20px;">Admin Profile</h6><br>
            <form action="{{ route('updateAdminPassword') }}" id="mainForm" method="POST" enctype="multipart/form-data">
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
                                    <li class="active"><a href="#profile" data-toggle="tab">Password</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="active tab-pane" id="profile">

                                        <dl class="row mb-0 pd-15">
                                            <div class="col-sm-4 text-sm-right">
                                                <dt>Password:</dt>
                                            </div>
                                            <div class="form-group col-md-8">
                                            <input class="form-control" type="hidden" value="{{$admin->id}}" name="id" id="id">
                                                <input class="form-control" type="password" value="" name="password" id="password" placeholder="Enter Password">
                                                <label class="form-control-label">Password: <span class="tx-danger">*</span></label>
                                            </div>
                                        </dl>
                                        <dl class="row mb-0 pd-15">
                                            <div class="col-sm-4 text-sm-right">
                                                <dt>Re-EnterPassword:</dt>
                                            </div>
                                            <div class="form-group col-md-8">
                                                <input class="form-control" type="password" value="" name="re_password" id="re_password" placeholder="Re-EnterPassword">
                                                <label class="form-control-label">Re-EnterPassword: <span class="tx-danger">*</span></label>

                                            </div>
                                            <div class="col-12 text-sm-right"style="padding:10px;float:right;">
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
            password: {
                required: true,
                minlength: 5,
            },
            re_password: {
                required: true,
                equalTo: '#password'
            }
        },
        messages: {
            password: {
                required: 'Password is required.',
                minlength: 'minimum 5 character required.'
            },
            re_password: {
                required: 'Confirm Password is required.',
                equalTo: 'Confirm Password and Password must not be the same.'
            }
        },
    });
</script>

@endsection