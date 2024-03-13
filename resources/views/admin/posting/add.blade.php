@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-sm-4">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><i class="fa icon-invoice"></i> Posting</h3>
                <ol class="breadcrumb flex align-items-center justify-items-center">
                    <p class="f-500 mb-0 mr-1">Batch Post</p>
                    <input type="checkbox" class="js-switch toggle-batch-post">
                </ol>
            </div><!-- /.box-header -->
            <div class="box-body">
                <form role="form" method="post" action="{{ route('savePosting') }}" id="singleDataPost">
                @csrf
                    <div class="classesDiv form-group" >
                        <label for="classesID">
                            Class <span class="text-red">*</span>
                        </label>
                        <select name="class" id="class" class="form-control classes" >
                            <option value="">Select Class</option>
                            @foreach ($classes as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        <span class="text-red"></span>
                    </div>

                    <div class="classesDiv form-group" >
                        <label for="classesID">
                            Division <span class="text-red">*</span>
                        </label>
                        <select name="division" id="division" class="form-control ">
                            <option value="">Select Division</option>
                        </select>
                        <span class="text-red"></span>
                    </div>

                    <div class="studentDiv form-group" >
                        <label for="studentID">
                            Student ID <span class="text-red">*</span>
                        </label>
                        <select name="student" id="student" class="form-control ">
                            <option value="">Select Student</option>
                        </select>
                        <span class="text-red">
                        </span>
                    </div>

                    <div class="form-group" >
                        <label for="feetypeID" class="control-label">
                            Fee Type <span class="text-red">*</span>
                        </label>

                        <select name="feetypes" id="feetypes" class="form-control">
                            <option value="">Select Fee </option>
                            @foreach ($feetypes as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                            {{-- <optgroup label="Select Fee Types"></optgroup>
                            @foreach ($feetypes as $item)
                            @php $dur=array(); @endphp
                            @if($item->duration == 0)
                                @php $string = ''; @endphp
                            @elseif($item->duration == 1)
                                @php $string = ''; @endphp
                            @elseif($item->duration == 2)
                                @php $string = '- [1st half year], - [2nd half year]'; @endphp
                            @elseif($item->duration == 4)
                                @php $string = '- [Quarter 1],- [Quarter 2],- [Quarter 3],- [Quarter 4]'; @endphp
                            @elseif($item->duration == 12)
                                @php  $string =  '- [Jan],- [Feb],- [Mar],- [Apr],- [May],- [Jun],- [Jul],- [Aug],- [Sep],- [Oct],- [Nov],- [Dec]'; @endphp
                            @endif
                            @php $dur = explode(",",$string) @endphp
                            <optgroup label="{{ $item->name }}">
                                @for($i=0;$i<$item->duration;$i++)
                                    <option value="{{ $item->id }}-{{ $i }}">
                                        {{ $item->name }} {{ $dur[$i] }}
                                    </option>
                                @endfor
                            </optgroup>
                            @endforeach --}}
                        </select>
                        <span class="control-label"></span>
                    </div>
                    <div class="form-group ">
                        <label for="Amount">
                            Amount <span class="text-red">*</span>
                        </label>
                            <input type="number" class="form-control" id="amount" name="amount" >
                        <span class="text-red"> </span>
                    </div>

                    <input type="submit" class="btn btn-primary" value="Submit" >
                </form>

                <form role="form" method="post" action="{{ route('savePosting') }}" id="batchDataPost" style="display: none;">
                    @csrf
                    <div class="callout callout-warning callout-sm">
                        <p><b>Note:</b> Batch Posting Enabled</p>
                    </div>

                    <div class="classesDiv form-group" >
                        <label for="classesID">
                            Class <span class="text-red">*</span>
                        </label>
                        <select name="class" id="class2" class="form-control classes" >
                            <option value="">Select Class</option>
                            @foreach ($classes as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        <span class="text-red"></span>
                    </div>

                    <div class="classesDiv form-group" >
                        <label for="classesID">
                            Division <span class="text-red">*</span>
                        </label>
                        <select name="division" id="division2" class="form-control ">
                            <option value="">Select Division</option>
                        </select>
                        <span class="text-red"></span>
                    </div>
                    <div class="studentDiv form-group">
                      <label for="studentID">Student ID</label>
                        <select name="student[]" id="student2" class="form-control select2" multiple >
                        </select>      
                    </div> 
                    <div class="form-group" >
                        <label for="feetypeID" class="control-label">
                            Fee Type <span class="text-red">*</span>
                        </label>

                        <select name="feetypes" id="feetypes" class="form-control">
                            @foreach ($feetypes as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                            {{-- <optgroup label="Select Fee Types"></optgroup>
                            @foreach ($feetypes as $item)
                            @php $dur=array(); @endphp
                            @if($item->duration == 0)
                                @php $string = ''; @endphp
                            @elseif($item->duration == 1)
                                @php $string = ''; @endphp
                            @elseif($item->duration == 2)
                                @php $string = '- [1st half year], - [2nd half year]'; @endphp
                            @elseif($item->duration == 4)
                                @php $string = '- [Quarter 1],- [Quarter 2],- [Quarter 3],- [Quarter 4]'; @endphp
                            @elseif($item->duration == 12)
                                @php  $string =  '- [Jan],- [Feb],- [Mar],- [Apr],- [May],- [Jun],- [Jul],- [Aug],- [Sep],- [Oct],- [Nov],- [Dec]'; @endphp
                            @endif
                            @php $dur = explode(",",$string) @endphp
                            <optgroup label="{{ $item->name }}">
                                @for($i=0;$i<$item->duration;$i++)
                                    <option value="{{ $item->id }}-{{ $i }}">
                                        {{ $item->name }} {{ $dur[$i] }}
                                    </option>
                                @endfor
                            </optgroup>
                            @endforeach --}}
                        </select>
                        <span class="control-label"></span>
                    </div>
                    <div class="form-group ">
                        <label for="Amount">
                            Amount <span class="text-red">*</span>
                        </label>
                            <input type="number" class="form-control" id="amount" name="amount" >
                        <span class="text-red"> </span>
                    </div>

                    <input type="submit" class="btn btn-primary" value="Submit" >
                </form>
            </div>
        </div>
    </div>


    <div class="col-sm-8">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><i class="fa icon-feetypes"></i>Student Posting</h3>
                <ol class="breadcrumb">
                    <li><a href=""><i class="fa icon-dashboardIcon"></i> Dashboard</a></li>
                    <li><a href="">Invoice</a></li>
                    <li class="active">Add Invoice</li>
                </ol>
            </div><!-- /.box-header -->
            <div class="box-body">
                <div id="hide-table">
                    <table id="ListBatch" class="table table-bordered table-hover dataTable">
                        <thead>
                            <tr>
                                <th><a href="javascript:;" class="p6n-sort-link">#</a></th>
                                <th><a href="javascript:;" class="p6n-sort-link">Fee Type</a></th>
                                <th><a href="javascript:;" class="p6n-sort-link">Student Name</a></th>
                                <th><a href="javascript:;" class="p6n-sort-link">Student ID</a></th>
                                <th><a href="javascript:;" class="p6n-sort-link">Class</a></th>
                                <th><a href="javascript:;" class="p6n-sort-link">Division</a></th>
                                <th><a href="javascript:;" class="p6n-sort-link">Amount</a></th>
                                {{-- <th><a href="javascript:;" class="p6n-sort-link">Actions</a></th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($postings)>0)
                                @foreach($postings as $item)
                                <tr>
                                    <td data-title="">{{ $loop->iteration }}</td>
                                    <td data-title="">{{ $item->feetypes->name }}</td>
                                    <td data-title="">{{ $item->students->first_name }}</td>
                                    <td data-title="">{{ $item->students->student_id }}</td>
                                    <td data-title="">{{ $item->classes->name }}</td>
                                    <td data-title="">{{ $item->divisions->name }}</td>
                                    <td data-title="">{{ $item->amount }}</td>
                                    {{-- <td data-title="Action">
                                        <a href="{{ route('editInvoice') }}" class="btn btn-warning btn-xs mrg" data-placement="top" data-toggle="tooltip" data-original-title="Edit"><i class="fa icon-edit1"></i></a>
                                        <a href="delete/45" onclick="return confirm('you are about to delete a record. This cannot be undone. are you sure?')" class="btn btn-danger btn-xs mrg" data-placement="top" data-toggle="tooltip" data-original-title="Delete"><i class="fa icon-trash"></i></a>
                                    </td> --}}
                                </tr>
                                @endforeach
                            @else
                            <tr>
                                <td valign="top" colspan="7" class="dataTables_empty">No data available in table</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')

<script type="text/javascript">
    $(function () {

        $("#ListSingle").dataTable({

'columnDefs': [],
      "info": false,
      "paging":   false,
      "searching": false
      });


      $("#ListBatch").dataTable({

'columnDefs': [
         {
            'targets': 0,
         }
      ],
      "info": false,
      "paging":   false,
      });
    });

    var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
    elems.forEach(function(html) {
    var switchery = new Switchery(html, { size: 'small' });
    });

    var clickCheckbox = document.querySelector('.toggle-batch-post');
    clickCheckbox.onchange = function() {
    if(clickCheckbox.checked == true) {
        $('#singleDataPost').hide();
        $('#batchDataPost').show();
    } else {
        $('#singleDataPost').show();
        $('#batchDataPost').hide();
    }
    };
  </script>
<script>
    $('#accounts-menu').addClass('active');
    $('#income-menu').addClass('active');
    $('#posting-menu').addClass('active');
</script>
<script>
    $(".classes").change(function() {
        var class_name = $(this).val();
        $.ajax({
            type: "POST",
            url: "{{route('selectDivision')}}",
            data: {
                'class_name': class_name
            },
            dataType: "json",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                if (data.status == 1) {
                    var html = '<option value="">Select Division</option>';
                    $.each(data.divisions, function(k, v) {
                        html = html + "<option value=" + v.id + ">" + v.name + "</option>";
                    });
                    $('#division').html(html);
                    $('#division2').html(html);
                } else {

                }
            }
        });
    });
    $("#division2").change(function() {
        var division = $(this).val();
        var class_name = $("#class2").val();
        // alert(class_name);
        $.ajax({
            type: "POST",
            url: "{{route('selectStudents')}}",
            data: {
                'class_name': class_name, 'division' : division
            },
            dataType: "json",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                if (data.status == 1) {
                    var html = '<option value="">Select Student</option>';
                    $.each(data.students, function(k, v) {
                        html = html + "<option value=" + v.id + ">" + v.first_name + "</option>";
                    });
                    $('#student2').html(html);
                } else {

                }
            }
        });
    });



    $("#division").change(function() {
        var division = $(this).val();
        var class_name = $("#class").val();
        $.ajax({
            type: "POST",
            url: "{{route('selectStudents')}}",
            data: {
                'class_name': class_name, 'division' : division
            },
            dataType: "json",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                if (data.status == 1) {
                    var html = '<option value="">Select Student</option>';
                    $.each(data.students, function(k, v) {
                        html = html + "<option value=" + v.id + ">" + v.first_name + "</option>";
                    });
                    $('#student').html(html);
                } else {

                }
            }
        });
    });
    
</script>
<script>
    $(document).ready(function() {
        @if(Session::has('success'))
        toastr.success('{{ Session::get('
            success ') }}', 'Successful');
        @endif
        @if(Session::has('errors'))
        @foreach($errors -> all() as $error)
        toastr.error('{{ $error }}', 'Error');
        @endforeach
        @endif
    });
</script>

@endsection
