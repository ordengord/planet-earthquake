<h1> A message was sent to you by {{$chat->email}} at {{$chat->created_at}} </h1>

Content:
<br /><hr />
{{$chat->issue}}

<br /> <hr />
Click the following <a href = "{{route('contact')}}"> link </a> to forward another message or.
<br />

Sincerely,
{{env('APP_URL')}} Admin

