@extends('layouts.admin')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-student"></i>Messeges</h3>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-laptop"></i> Dashboard</a></li>
            <li class="active">Messages</li>
        </ol>
    </div><!-- /.box-header -->
</div>
<div class="container">
    <div class="row">

        <div class="col-md-10">
        <h5 class="page-header">
            <a data-toggle="modal" href="#newChat" >
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg> New Chat
            </a>
        </h5>
        </div>
        <div class="col-md-10">
            <chat-form username="Saleesh"></chat-form>
        </div>
    </div>
</div>
@endsection
@section('scripts')

<script>
$('#message-menu').addClass('active');
</script>

@endsection
