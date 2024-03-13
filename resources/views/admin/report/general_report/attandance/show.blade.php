@extends('layouts.admin')
@section('content')
<?php
    $monthArray = array(
      "01" => "jan",
      "02" => "feb",
      "03" => "mar",
      "04" => "apr",
      "05" => "may",
      "06" => "jun",
      "07" => "jul",
      "08" => "aug",
      "09" => "sep",
      "10" => "oct",
      "11" => "nov",
      "12" => "dec"
    );
?>
    <div id="printablediv">
        <div class="row">
            <div class="col-sm-3">
                <div class="box box-primary">
                    <div class="box-body box-profile">
                       
                        <h3 class="profile-username text-center">hjmgkhjk</h3>
                        <p class="text-muted text-center">hklhjlhk</p>
                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item" style="background-color: #FFF">
                                <b>gkjlhhj</a>
                            </li>
                            <li class="list-group-item" style="background-color: #FFF">
                                <b>ghkjjjjjjjjjjuy</a>
                            </li>
                            <li class="list-group-item" style="background-color: #FFF">
                                <b>bvgmkhjgkjh</b> <a class="pull-right">kj,.lk</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-sm-9">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#" data-toggle="tab"></a></li>
                    </ul>

                    <div class="tab-content">
                        <div class="active tab-pane" id="attendance">
                            <div id="teacherDIV">
                                <table class="attendance_table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <?php
                                                for($i=1; $i<=31; $i++) {
                                                   echo  "<th>$i</th>";
                                                }
                                            ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($monthArray as $yearKey => $months) 
                                    <tr>
                                    <td>{{$months }}</td>
                                    
                                    <?php
                                                for($i=1; $i<=31; $i++) {
                                                   echo  "<th></th>";
                                                }
                                            ?>
                                    <tr>
                                    @endforeach  
                                    </tbody>
                                </table>
                            </div>
                            <div>
                                <p class="totalattendanceCount">

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 

    @endsection
@section('scripts')
<script>
    $(document).ready(function() {
        @if(Session::has('success'))
        toastr.success('{{ Session::get('
            success ') }}', 'Successful');
        @endif
        @error('name')
        toastr.error('{{ $message }}');
       @enderror
    });
</script>
<script>
  $('#attandance-menu').addClass('active')
</script>
@endsection

 

