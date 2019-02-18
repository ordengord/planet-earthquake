$(document).ready(function () {
    //e.preventDefault();
    let TOKEN = $('meta[name="csrf-token"]').attr('content');
    $("button").click(function () {
        var name = $(this).attr("name");
        $.ajax({
            type: "POST",
            dataType: 'json',
            url: "/my-orders",
            data: {
                delete_id: name,
                _token: TOKEN
            },
            success: function (data) {
                console.log(data + "success");
            },
            error: function (data) {
                console.log(data + "error");
            }
        });
    });

    /*$("#submit").submit(function () {
        $id = this.getElementsByTagName("button").attr("name");
        $.ajax({
            type: "POST",
            dataType: 'json',
            url: "/my-orders",
            data: {
                delete_id: name,
                _token: TOKEN
            },
            success: function (data) {
                console.log(data + "success");
            },
            error: function (data) {
                console.log(data + "error");
            }
        });
    });*/


});
