// details response
var base_url = "http://localhost:8000";
$(".message").click(function () {
    $('#modal_message_form').modal('show');
});
// leaves form
$('#modal_message_form .leave_form').submit(function (event) {
    event.preventDefault();
    var leave_request = $('.leave_request').val();
    var user_id = $('.user_id').val();
    $.ajax({
        url: base_url + '/employee/leave/request',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'POST',
        data: { user_id: user_id, leave_request: leave_request },
        success: function (result) {
            swal({
                title: result,
                text: 'success',
                icon: 'success',
            }).then(function () {
                location.reload();
                $('.leave_form').trigger("reset");
            });
        },
    });
});
$(".open_response").click(function () {
    var id = $(this).data("id");
    $.ajax({
        url: base_url + '/employee/leave/response/' + id,
        type: 'GET',
        success: function (result) {
            // console.log(result.response.leave_response);
            $('#modal_response_details_form').modal('show');
            $("#modal_response_details_form .id").val(id);
            $("#modal_response_details_form .leave_response").val(result.response.leave_response);
        },
    });

});
$('#modal_response_details_form .seen_leave_form').submit(function (event) {
    event.preventDefault();
    var id = $(".seen_leave_form .id").val();
    $.ajax({
        url: base_url + '/employee/leave/request/seen/' + id,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'POST',
        success: function (result) {
            location.reload();
        },
    });
});