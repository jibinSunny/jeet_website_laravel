@extends('layouts.admin')
@section('content')
<div id="printablediv">
    <div class="box">
        <div class="col-sm-12">
        </div>

        <h2 style="margin-bottom: -12px;margin-left: 10px"></h2>

        <!-- form start -->
        <div class="box-body">
            <div class="row">

                <div class="col-sm-6 pull-left">
                    <div class="box box-solid classinfo">
                        <div class="box-header bg-gray with-border">
                            <h3 class="box-title text-navy"></h3>
                        </div>
                        <div class="box-body">
                            <span></span><br>
                            <span></span>
                        </div>
                    </div>

                    <br>

                    <div class="box box-solid subjectandteacher">
                        <div class="box-header bg-gray with-border">
                            <h3 class="box-title text-navy"></h3>
                        </div>
                        <div class="box-body">
                            <table>
                                <thead>
                                    <tr>
                                        <th>

                                        </th>
                                        <th>
                    
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                   
                                        <tr>
                                            <td>
                                               
                                            </td>
                                            <td>
                                                
                                            </td>
                                        </tr>
                                  
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <br>
                </div>

                <div class="col-sm-6 pull-right">
                    <div class="box box-solid classteacher" >
                        <div class="box-header bg-gray with-border">
                            <h3 class="box-title text-navy"></h3>
                        </div>
                        <div class="box-body">
                            
                            <div class="profile">
                                    <div class="border_image">
                                        <img src="" alt="">
                                    </div>
                                <h1><?=$teacher->name?></h1>
                              </div>
                              <table class="table table-hover">
                                  <tbody>
                                      <tr>
                                        <td></td>
                                        <td><?=$teacher->phone?></td>
                                      </tr>
                                      <tr>
                                          <td></td>
                                        <td></td>
                                      </tr>
                                      <tr>
                                        <td></td>
                                        <td></td>
                                      </tr>
                                  </tbody>
                              </table>

                        </div>
                    </div>

                    <br>

                    <div class="box box-solid free_collection">
                        <div class="box-header bg-gray with-border">
                            <h3 class="box-title text-navy">></h3>
                        </div>
                        <div class="box-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                   
                </div>

            </div><!-- row -->
        </div><!-- Body -->
        <hr class="hr">
        <div class="col-sm-12">
        </div>
    </div>
</div>
@endsection
@section('scripts')

@endsection