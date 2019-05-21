// register form
var base_url = "http://localhost:8000";
$('#employee_form').submit(function (event) {
  event.preventDefault();
  var user_id = $('.user_id').val();
  var update_of_fullday = $('.update_of_fullday').val();
  // alert(update_of_fullday);
  $.ajax({
    url: base_url + '/employee/updates/store',
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    type: 'POST',
    data: { user_id: user_id, update_of_fullday: update_of_fullday },
    success: function (result) {
      if(!result.errors) {
        swal({
          title: result,
          text: 'success',
          icon: 'success',
        }).then(function () {
          // location.reload();
          window.location.href = base_url + "/employee/updates/history";
        });
      }
      $("#error").text(result.errors);
    },
  });

});