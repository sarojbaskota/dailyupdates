// password match
$('.password, .password_confirmation').on('keyup', function () {
    if($('.password').val() == $('.password_confirmation').val()) {
        $('#message').html('#Password Matched.').css('color', 'green');
    } else
        $('#message').html('*Password Not Matching !!').css('color', 'red');
});
// end password match
$(document).ready(function () {
    var base_url = 'http://localhost:8000';
    // modal close with reset
    $(".modal").on("hidden.bs.modal", function () {
        $('#user_form').trigger("reset");
        $('#user_form_edit').trigger("reset");
    });
    // open create form
    $("#add_new").click(function () {
        // alert(base_url);
        // $('#show_modal').html();
        $('#modal_user_form').modal({ backdrop: 'static', keyboard: false })
        // $('#modal_user_form').modal('show');
    });
    // register form
    $('#user_form').submit(function (event) {
        event.preventDefault();
        var full_name = $('.full_name').val();
        var email = $('.email').val();
        var phone = $('.phone').val();
        var position_in_office = $('.position_in_office').val();
        var password = $('.password').val();
        var password_confirmation = $('.password_confirmation').val();
        var is_admin = $('.is_admin').val();

        var formData = new FormData($(this)[0]);
        var file = $('.user_avatar')[0].files[0];

        formData.append('user_avatar', file);
        formData.append('full_name', full_name);
        formData.append('email', email);
        formData.append('phone', phone);
        formData.append('position_in_office', position_in_office);
        formData.append('password', password);
        formData.append('password_confirmation', password_confirmation);
        formData.append('is_admin', is_admin);
        $.ajax({
            url: "{{ url(' / administration / users') }}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function (result) {
                swal({
                    title: result,
                    text: 'success',
                    icon: 'success',
                }).then(function () {
                    $('#user_form').trigger("reset");
                    $('#modal_user_form').modal('toggle');

                });
            },
            error: function (result) {
                $('.alert-danger').html('');
                $.each(result.errors, function (key, value) {
                    $('.alert-danger').show();
                    $('.alert-danger').append('<li>' + value + '<li>');
                });
            },
        });

    });
    // open creatshowe form
    $(".show_user").click(function () {
        var id = $(this).data("id");
        $.ajax({
            url: base_url + '/administration/users/' + id,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'GET',
            cache: false,
            processData: false,
            contentType: false,
            success: function (result) {
                $("#multi_show").html(result);
                $("#modal_show_form").modal("show");
            },
        });
    });
    // open create form
    $(".edit_user").click(function () {
        var id = $(this).data("id");
        $.ajax({
            url: base_url + '/administration/users/' + id + '/edit',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'GET',
            success: function (result) {
                $('#modal_edit_form').modal({ backdrop: 'static', keyboard: false })
                // $('#modal_edit_form').modal('show');
                $("#user_form_edit").val($(".id").val(result.data.id));
                $("#user_form_edit").val($(".full_name").val(result.data.full_name));
                $("#user_form_edit").val($(".email").val(result.data.email));
                $("#user_form_edit").val($(".phone").val(result.data.phone));
                $("#user_form_edit").val($(".position_in_office").val(result.data.position_in_office));
                $('.is_admin').append("<option value='" + (result.data.is_admin) + "'selected>" + (result.data.is_admin == 1 ? 'Admin' : 'Employee') + "</option>");
            },
        });
    });
    // update form
    $(".close-modal").click(function () {
        $('#user_form_edit').trigger("reset");
        $('#modal_edit_form').modal('toggle');
        $('.alert-danger').hide();
    });
    $('#user_form_edit').submit(function (event) {
        event.preventDefault();
        var id = $('#user_form_edit .id').val();
        // alert(id);
        var full_name = $('#user_form_edit .full_name').val();
        var email = $('#user_form_edit .email').val();
        var phone = $('#user_form_edit .phone').val();
        var position_in_office = $('#user_form_edit .position_in_office').val();
        var is_admin = $('#user_form_edit .is_admin').val();
        var password = $('#user_form_edit .password').val();
        var password_confirmation = $('#user_form_edit .password_confirmation').val();

        var formData = new FormData($(this)[0]);
        var file = $('#user_form_edit .user_avatar')[0].files[0];

        formData.append('user_avatar', file);
        formData.append('full_name', full_name);
        formData.append('email', email);
        formData.append('phone', phone);
        formData.append('position_in_office', position_in_office);
        formData.append('is_admin', is_admin);
        formData.append('password', password);
        formData.append('password_confirmation', password_confirmation);
        for(var pair of formData.entries()) {
            console.log(pair[0] + ', ' + pair[1]);
        }
        $.ajax({
            url: base_url + '/administration/users/' + id,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            //  _method:'patch',
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function (result) {
                if(!result.errors) {
                    swal({
                        title: result,
                        text: 'success',
                        icon: 'success',
                    }).then(function () {
                        $('#user_form_edit').trigger("reset");
                        $('#modal_edit_form').modal('toggle');
                    });
                }
                $('.alert-danger').html('');
                $.each(result.errors, function (key, value) {
                    $('.alert-danger').show();
                    $('.alert-danger').append('<li>' + value + '<li>');
                });
            }
        });

    });
    // change status of user
    $(".change_status").click(function () {
        var id = $(this).data("id");
        $.ajax({
            url: base_url + '/administration/users/status/' + id,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            cache: false,
            processData: false,
            contentType: false,
            success: function (result) {
                swal({
                    title: result,
                    text: 'success',
                    icon: 'success',
                }).then(function () {
                    location.reload();
                });
            },
        });
    });
    // open delete form
    $(".delete_user").click(function () {
        var id = $(this).data("id");
        var req = confirm("Are you Sure ?");
        if(req == true) {
            $.ajax({
                url: base_url + '/administration/users/' + id,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'DELETE',
                cache: false,
                processData: false,
                contentType: false,
                success: function (result) {
                    swal({
                        title: result,
                        text: 'success',
                        icon: 'success',
                    }).then(function () {
                        location.reload();
                    });
                }
            });
        } else {
            swal({
                title: "Your data are save!!",
                text: 'success',
                icon: 'success',
            });
        }
    });
});
