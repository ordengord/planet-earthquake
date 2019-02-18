@extends ('layouts.app')

@section('content')

    User: {{ auth()->user()->email }} <br/>
    Amount: {{ $transaction->total}} <br />

    <hr />
    Not gonna work <br/>

    <br />
    <?php
    $payNowButtonUrl = 'https://www.sandbox.paypal.com/cgi-bin/websc';
    ?>

    <form action="{{$payNowButtonUrl}}" method="post">

        <button type="submit">
            Pay Now
        </button>
    </form>
@endsection