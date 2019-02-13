@extends('layouts.app')

@section('content')
    <div class="container">
        <p class="text-justify"> If you have any questions, you are free to forward them via <a
                    href="mailto:{{env('MAIL_ADMIN_EMAIL')}}"> hereto. </a></p>
        <p class="text-justify"> Also, you might use this request form to site admin using the form below. </p>
        <p class="text-justify"> Please provide your email if not authorized </p>

        <form method="post" class="form-control" id="chat-form" action="/contact" onsubmit="submit()">
            {{csrf_field()}}
            @if(!Auth::check())
                <label for="email" >Your email</label>
                <input type="email" id="email" name="email"><br/>
            @endif

            <label for="issue"> Describe your issue </label><br/>
            <textarea name="issue" class=form-control id="message"></textarea>
            @if ($msgSent)
                <p class="alert-success"> Your message have been uploaded.
                    The developers will provide feedback to your email </p> <br/>
            @endif
            <input type="submit" class="btn-success" id="chat-submit" value="Submit a message"><br/>
        </form>
    </div>
@endsection

