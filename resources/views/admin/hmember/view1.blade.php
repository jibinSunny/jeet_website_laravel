@extends('layouts.admin')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-member"></i> Hostel Member</h3>

        <ol class="breadcrumb">
            <li><a href=""><i class="fa icon-dashboardIcon"></i> Dashboard</a></li>
            <li class="active">Hostel Member</li>
        </ol>
    </div><!-- /.box-header -->
    <div id="printablediv">
        <div class="row">
            <div class="col-sm-3">
                <div class="box box-primary">
                    <div class="box-body box-profile">
                      
                        <h3 class="student-username text-center">hkjkjh</h3>
                        <p class="text-muted text-center">hgjhj</p>
                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item" style="background-color: #FFF">
                                <b>ghgh</b> <a class="pull-right">jhgjg</a>
                            </li>
                            <li class="list-group-item" style="background-color: #FFF">
                                <b>hjkhj</b> <a class="pull-right">hkhjk</a>
                            </li>
                            <li class="list-group-item" style="background-color: #FFF">
                                <b>hgjhg</b> <a class="pull-right">jhh</a>
                            </li>
                            <li class="list-group-item" style="background-color: #FFF">
                                <b>jhg</b> <a class="pull-right">hjh</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-sm-9">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#profile" data-toggle="tab">vhjjhg</a></li>
                    </ul>

                    <div class="tab-content">
                        <div class="active tab-pane" id="profile">
                            <div class="panel-body profile-view-dis">
                                <div class="row">
                                    <div class="profile-view-tab">
                                        <p><span>jghj </span>:hjjh</p>
                                    </div>
                                    <div class="profile-view-tab">
                                        <p><span> </span>:</p>
                                    </div>
      
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>>
</div>
@endsection
@section('scripts')
<script>
    $('.delete-button').on('click', function() {
        var categoryId = $(this).data('id');
        $.confirm({

            title: 'Delete academic year ?',
            buttons: {
                deleteUser: {
                    text: 'delete',
                    action: function() {
                        $.ajax({
                            type: "GET",
                            url: "{{url('admin/hmember/delete')}}?categoryId=" + categoryId,
                            success: function(data) {
                                if (data.status == 1) {
                                    toastr.success('Deleted Successfully.');
                                    $('#timeid').removeAttr('checked').prop('checked', false);
                                    setTimeout(function() {
                                        window.location.href = "";
                                    }, 500);

                                } else {
                                    toastr.error('Something went wrong. please try again.');
                                    $('#timeid').removeAttr('checked').prop('checked', false);
                                }
                            }
                        });
                    }
                },
                cancelAction: function() {
                    $.alert('canceled');
                }
            }
        });
    });
</script>
<script type="text/javascript">
    window.addEventListener('load', function() {
        setTimeout(lazyLoad, 1000);
    });

    function lazyLoad() {
        var card_images = document.querySelectorAll('.card-image');
        card_images.forEach(function(card_image) {
            var image_url = card_image.getAttribute('data-image-full');
            var content_image = card_image.querySelector('img');
            content_image.src = image_url;
            content_image.addEventListener('load', function() {
                card_image.style.backgroundImage = 'url(' + image_url + ')';
                card_image.className = card_image.className + ' is-loaded';
            });
        });
    }
</script>

<script type="text/javascript">
    $('.select2').select2();
    $('#classesID').change(function() {
        var classesID = $(this).val();
        if(classesID == 0) {
            $('#hide-table').hide();
        } else {
            $.ajax({
                type: 'POST',
                url: "",
                data: "id=" + classesID,
                dataType: "html",
                success: function(data) {
                    window.location.href = data;
                }
            });
        }
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
<script>
  $('#hostel-menu').addClass('active')
</script>
<script>
    $('.delete-button').on('click', function() {
        var categoryId = $(this).data('id');
        $.confirm({

            title: 'Delete academic year ?',
            buttons: {
                deleteUser: {
                    text: 'delete',
                    action: function() {
                        $.ajax({
                            type: "GET",
                            url: "{{url('admin/setting/administrator/student-group/delete')}}?categoryId=" + categoryId,
                            success: function(data) {
                                if (data.status == 1) {
                                    toastr.success('Deleted Successfully.');
                                    $('#timeid').removeAttr('checked').prop('checked', false);
                                    setTimeout(function() {
                                        window.location.href = "";
                                    }, 500);

                                } else {
                                    toastr.error('Something went wrong. please try again.');
                                    $('#timeid').removeAttr('checked').prop('checked', false);
                                }
                            }
                        });
                    }
                },
                cancelAction: function() {
                    $.alert('canceled');
                }
            }
        });
    });
</script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
@endsection
