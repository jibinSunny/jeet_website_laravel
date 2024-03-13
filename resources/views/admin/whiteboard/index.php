@extends('layouts.admin')
@section('content')
<!-- where the widget goes. you can do CSS to it. -->
    <!-- note: as of 0.4.13, you cannot use 'literally' as the class name.
         sorry about that. -->
         <div class="my-drawing"></div>

<style>
    #zbeubeu {
        width: 100%;
        height: 80vh;
    }
</style>

@endsection
@section('scripts')
<script>
        LC.init(
            document.getElementsByClassName('my-drawing')[0],
            {imageURLPrefix: '/public/img'}
        );
</script>
@endsection