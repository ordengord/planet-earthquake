@section('script')
<script type="text/javascript" language="javascript">
    function submit() {
        var msg = $('#chat-form').serialize();
        $.ajax({
            type: 'POST',
            url: $('#chat-form').attr('action'),
            data: msg,
        })
            .done(function (response) {
                // Make sure that the formMessages div has the 'success' class.
                $(formMessages).removeClass('error');
                $(formMessages).addClass('success');

                // Set the message text.
                $(formMessages).text(response);

                // Clear the form.
                $('#email').val('');
                $('#message').val('');
            })

    }
    </script>

@endsection