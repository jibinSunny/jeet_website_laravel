@extends('layouts.admin')
@section('content')
<style>
.id-component .image {
  opacity: 0.8;
  width: 100%;
  height: 160px;
  background-position: center center;
  background-color: gray;
  display: inline-block;
  margin: 10px;
}
.id-component .image:hover {
  opacity: 1;
}

.radio-img > input {
  display: none;
}
.radio-img > .image {
  cursor: pointer;
  border: 2px solid black;
  background-size: contain;
  background-repeat: no-repeat;
}
.radio-img > input:checked + .image {
  border: 2px solid orange;
}




    .id-component {
        position:relative;
    }
    .id-component img {
        width:100%;
        height:100%;
    }
</style>
<div class="row">
    <div class="col-xs-12">

        <div class="row">
            <div class="col-sm-12">
                <div class="box">
                    <div class="box-body" style="padding: 0px;height: 320px">
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title text-black">
                                    ID Card </h3>
                            </div>

                            <div class="box-body">
                              <div class="row">
                                  <div class="col-xs-12 col-md-3">
                                      <div class="id-component">
                                        <label class="radio-img w-100">
                                            <input type="radio" name="layout" value="L" />
                                            <div class="image" style="background-image: url(https://www.vexls.com/wp-content/uploads/2020/04/Background2-768x768.png)"></div>
                                          </label>
                                      </div>
                                  </div>
                                  <div class="col-xs-12 col-md-3">
                                    <div class="id-component">
                                        <label class="radio-img w-100">
                                            <input type="radio" name="layout" value="L" />
                                            <div class="image" style="background-image: url(https://www.vexls.com/wp-content/uploads/2020/04/Background2-2-768x768.png)"></div>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-3">
                                    <div class="id-component">
                                        <label class="radio-img w-100">
                                            <input type="radio" name="layout" value="L" />
                                            <div class="image" style="background-image: url(https://www.vexls.com/wp-content/uploads/2020/04/Layer-30-2-768x768.png)"></div>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-3">
                                    <div class="id-component">
                                        <label class="radio-img w-100">
                                            <input type="radio" name="layout" value="L" />
                                            <div class="image" style="background-image: url(https://www.vexls.com/wp-content/uploads/2020/04/Group-3-768x768.png)"></div>
                                        </label>
                                    </div>
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.row -->
    </div>
</div>

@endsection
@section('scripts')
<script>

</script>
<script>
  $('#book-menu').addClass('active')
</script>
<script>
    $('.delete-button').on('click', function() {
        var categoryId = $(this).data('id');
        $.confirm({

            title: 'Delete Books?',
            buttons: {
                deleteUser: {
                    text: 'delete',
                    action: function() {
                        $.ajax({
                            type: "GET",
                            url: "{{url('admin/book/delete')}}?categoryId=" + categoryId,
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
