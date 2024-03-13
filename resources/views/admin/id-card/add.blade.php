@extends('layouts.admin')
@section('content')


<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-lbooks"></i> Add Books</h3>


        <ol class="breadcrumb">
            <li><a href="{{ route('showDashboard') }}"><i class="fa icon-dashboardIcon"></i> Dashboard</a></li>
            <li><a href="{{ route('showBook') }}">Books</a></li>
            <li class="active">Add Books</li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-10">
                <form class="form-horizontal" id="mainForm" method="post" action="{{ route('saveBook') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="book" class="col-sm-2 control-label">
                            Name <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="name" name="name" value=""placeholder="Enter Name">
                        </div>
                        <span class="col-sm-4 control-label"></span>
                    </div>
                    <div class="form-group">
                        <label for="subject_code" class="col-sm-2 control-label">
                            Category<span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <select name="category" id="category" class="form-control select2" tabindex="-1">
                                <option selected disabled>Select category</option>
                                <option value="1">Academic</option>
                                <option value="2">General</option>

                            </select>
                        </div>
                        <span class="col-sm-4 control-label"></span>
                    </div>
                    <div class="form-group"id="subject_id"style="display:none">
                        <label for="subject_code" class="col-sm-2 control-label">
                            Subject<span class="text-red"></span>
                        </label>
                        <div class="col-sm-6">
                            <select name="subject" id="subject" class="form-control select2" tabindex="-1">
                                <option selected disabled>Select Subject</option>
                                @foreach($subject as $subjects)
                                <option value="{{$subjects->id}}">{{$subjects->name}}</option>
                                @endforeach

                            </select>
                        </div>
                        <span class="col-sm-4 control-label"></span>
                    </div>


                    <div class="form-group">
                        <label for="author" class="col-sm-2 control-label">
                            Author <span class="text-red"></span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="author" name="author" value=""placeholder="Enter Author">
                        </div>
                        <span class="col-sm-4 control-label"></span>
                    </div>



                    <div class="form-group">
                        <label for="price" class="col-sm-2 control-label">
                            Price <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="price" name="price" value=""placeholder="Enter Price">
                        </div>
                        <span class="col-sm-4 control-label"></span>
                    </div>
                    <div class="form-group">
                        <label for="quantity" class="col-sm-2 control-label">
                            Quantity <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="quantity" name="quantity" value=""placeholder="Enter Quantity">
                        </div>
                        <span class="col-sm-4 control-label"></span>
                    </div>
                    <div class="form-group">
                        <label for="quantity" class="col-sm-2 control-label">
                            Minimum Quantity <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="minimum_quantity" name="minimum_quantity" value=""placeholder="Enter Minimum Quantity">
                        </div>
                        <span class="col-sm-4 control-label"></span>
                    </div>
                    <div class="form-group">
                        <label for="rack" class="col-sm-2 control-label">
                            Rack No <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="rack" name="rack" value=""placeholder="Enter Rack">
                        </div>
                        <span class="col-sm-4 control-label"></span>
                    </div>
                    <div class="form-group">
                        <label for="file" class="col-sm-2 control-label">PDF</label>
                        <div class="col-sm-6">
                            <div class="input-group image-preview">
                                <input type="text" class="form-control image-preview-filename" disabled="disabled">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-default image-preview-clear"
                                        style="display:none;">
                                        <span class="fa fa-remove"></span>
                                    </button>
                                    <div class="btn btn-success image-preview-input">
                                        <span class="fa fa-repeat"></span>
                                        <span class="image-preview-input-title"></span>
                                        <input type="file" name="pdf" />Uplode PDF
                                    </div>
                                </span>
                            </div>
                        </div>

                        <span class="col-sm-4 control-label"></span>
                    </div>
                    <div class="form-group">
                        <label for="rack" class="col-sm-2 control-label">
                            Status <span class="text-red">*</span>
                        </label>
                        <div class="col-auto">
                            <div class="form-radio">
                                <input name="status" value="available" id="radio1"checked type="radio">
                                <label for="radio1">Available</label>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="form-radio">
                                <input name="status"value="unvailable" id="radio2" type="radio">
                                <label for="radio2">Unavailable</label>
                            </div>
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
    $('#book-menu').addClass('active')
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
            price: {
                required: true
            },
            quantity: {
                required: true
            },
            minimum_quantity: {
                required: true
            },
            rack: {
                required: true
            },
            category: {
                required: true
            },
        },
        messages: {
            name: {
                required: "Name is required"
            },
            price: {
                required: "Price is required"
            },
            quantity: {
                required: "Quantity is required"
            },
            minimum_quantity: {
                required: "Minimum Quantity is required"
            },
            rack: {
                required: "Rack is required"
            },
            category: {
                required: "Category is required"
            },
        },
    });
</script>
<script type="text/javascript">
    $('#category').change(function() {
       var courseID = $(this).val();
       if(courseID == "1")
       {
        $('#subject_id').show();
       }
       if(courseID == "2")
       {
        $('#subject_id').hide();
        $('#subject').val('');
       }
    });
</script>
@endsection