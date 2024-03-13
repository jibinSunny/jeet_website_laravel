@extends('layouts.admin')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-expense"></i> Add Expense</h3>

        <ol class="breadcrumb">
            <li><a href=""><i class="fa icon-dashboardIcon"></i> Dashboard</a></li>
            <li><a href="">Expense</a></li>
            <li class="active">Add Expense</li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">
                <div class="callout callout-danger">
                    <p><b>Note:</b> Add your institute expense</p>
                </div>
                <form class="form-horizontal" action="{{ route('saveExpense') }}" role="form" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-xs-12 col-sm-3">
                            <div class="form-group">
                                <label for="namea" class="col-xs-12">
                                  Expense Category <span class="text-red">*</span>
                                </label>
                                <div class="col-sm-12">
                                    <select name="expense_category" id="expense_category" class="form-control select2" tabindex="-1">
                                        <option value="">Select Category</option>
                                        @foreach($expense_categories as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <span class="col-sm-4 control-label">
                                </span>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-3">
                            <div class="form-group">
                                <label for="date" class="col-xs-12">
                                   Date <span class="text-red">*</span>
                                </label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="date" name="date" placeholder="Choose Date" >
                                </div>
                                <span class="col-sm-4 control-label">
                                </span>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-3">
                            <div class="form-group">
                                <label for="amount" class="col-sm-12">
                                   Amount <span class="text-red">*</span>
                                </label>
                                <div class="col-sm-12">
                                   <input type="text" class="form-control" id="amount" name="amount" placeholder="Enter Amount">
                                </div>
                                <span class="col-sm-4 control-label">
                                </span>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-3">
                            <div class="form-group">
                                <label for="file" class="col-sm-12">File</label>
                                <div class="col-sm-12">
                                    <div class="input-group image-preview">
                                        <input type="text" class="form-control image-preview-filename">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                                <span class="fa fa-remove"></span>
                                            </button>
                                            <div class="btn btn-primary image-preview-input">
                                                <span class="fa fa-repeat"></span>
                                                <span class="image-preview-input-title">File Browser</span>
                                                <input type="file" name="file" accept="image/png, image/jpeg, image/gif, application/pdf, application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint, text/plain, application/pdf"/>
                                            </div>
                                        </span>
                                    </div>
                                </div>
                                <span class="col-sm-4 control-label">
                                </span>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="row mt-3 m-l-4">
                        <div class="col-sm-12 col-md-12 col-lg-12">

                            <button class="btn btn-light addbtn mr-1" onclick="addRowExpense()">
                                <span class="ti-plus"></span> Add
                                Row
                            </button>
                            <button class="btn btn-light removebtn" type="submit" id="removiefield" onclick="removeExpense()">
                                <span class="ti-trash"></span> Remove
                            </button>
                        </div>
                    </div> --}}

                    <div class="row mt-2">
                        <div class="col-sm-5">
                            <div class="row">
                                <label for="note" class="col-sm-12">Add Description (if any)</label>
                                <div class="col-sm-12">
                                    <textarea style="resize:none;" class="form-control" id="description" name="description" placeholder="Enter description"></textarea>
                                </div>
                                <span class="col-sm-4 control-label"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-1">
                        <div class="col-sm-4">
                            <input type="submit" class="btn btn-primary" value="Add Expense" >
                        </div>
                    </div>
                    </form>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
$("#date").datepicker({
    autoclose: true,
    format: 'dd-mm-yyyy',
    startDate:'',
    endDate:'',
});


$(document).on('click', '#close-preview', function(){
    $('.image-preview').popover('hide');
    // Hover befor close the preview
    $('.image-preview').hover(
        function () {
           $('.image-preview').popover('show');
           $('.content').css('padding-bottom', '100px');
        },
         function () {
           $('.image-preview').popover('hide');
           $('.content').css('padding-bottom', '20px');
        }
    );
});

$(function() {
    // Create the close button
    var closebtn = $('<button/>', {
        type:"button",
        text: 'x',
        id: 'close-preview',
        style: 'font-size: initial;',
    });
    closebtn.attr("class","close pull-right");
    // Set the popover default content
    $('.image-preview').popover({
        trigger:'manual',
        html:true,
        title: "<strong>Preview</strong>"+$(closebtn)[0].outerHTML,
        content: "There's no image",
        placement:'bottom'
    });
    // Clear event
    $('.image-preview-clear').click(function(){
        $('.image-preview').attr("data-content","").popover('hide');
        $('.image-preview-filename').val("");
        $('.image-preview-clear').hide();
        $('.image-preview-input input:file').val("");
        $(".image-preview-input-title").text("");
    });
    // Create the preview image
    $(".image-preview-input input:file").change(function (){
        var img = $('<img/>', {
            id: 'dynamic',
            width:250,
            height:200,
            overflow:'hidden'
        });
        var file = this.files[0];
        var reader = new FileReader();
        // Set preview image into the popover data-content
        reader.onload = function (e) {
            $(".image-preview-input-title").text("");
            $(".image-preview-clear").show();
            $(".image-preview-filename").val(file.name);
        }
        reader.readAsDataURL(file);
    });
});

</script>
@endsection
