@extends('layouts.admin')
@section('content')
Redirecting to PayUmoney....
<html>
<head>
    <script>
        var hash = '';
        function submitPayuForm() {
            if(hash == '') {
                return;
            }
            var payuForm = document.forms.payuForm;
            payuForm.submit();
        }
    </script>
</head>
<body onload="submitPayuForm()">
    <form action="" method="post" name="payuForm">
        <input type="hidden" name="key" value="" />
        <input type="hidden" name="hash" value=""/>
        <input type="hidden" name="txnid" value="" />
        <input name="amount" type="hidden" value="" />
        <input type="hidden" name="firstname" id="firstname" value="" />
        <input type="hidden" name="email" id="email" value="" />
        <input type="hidden" name="phone" value="" />
        <input type="hidden" name="productinfo" value="" />
        <input type="hidden" name="surl" value="" />
        <input type="hidden" name="furl" value="" />
        <input type="hidden" name="service_provider" value="payu_paisa" size="64" />

    </form>
</body>
</html>
@endsection
@section('scripts')

@endsection