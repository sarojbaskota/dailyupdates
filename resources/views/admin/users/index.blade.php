@extends('layouts.admin')

@section('content')
<section class="content-header">
      <h1>
        Page Header
        <small>Optional description</small>
      </h1>
      <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
    <div class="box">
    <div class="box-header">
        <button class=" box-title btn btn-primary" id="add_new">Add New</button>
    </div>
        <!-- /.box-header -->
    <div class="box-body">
        <table id="example2" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>SN</th>
                     <th>Action</th>
                     <th>Status</th>
                     <th>Is Admin</th>
                    <th>Full Name</th>
                    <th>Phone</th>
                    <th>Position</th>
                    <th>Email</th>
                    <th>Created On</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr> <td>{{$loop->iteration}}</td>
                      <td>
                      <a class="btn btn-primary show_user" data-id=" {{$user->id}} " > <i class="glyphicon glyphicon-eye-open" ></i> </a>
                      <a class="btn btn-success edit_user" data-id=" {{$user->id}} "> <i class="glyphicon glyphicon-edit" ></i> </a>
                      <a class="btn btn-danger delete_user" data-id=" {{$user->id}} "> <i class="glyphicon glyphicon-trash" ></i> </a>

                      </td>
                      <td>
                        <label class="switch">
                        <input type="checkbox" class="status_button change_status" data-id=" {{$user->id}} "  {{($user->status == 1)?"checked":""}}>
                        <span class="slider round"></span>
                        </label>
                      </td>
                    <td>{{($user->is_admin==1)?'Admin':'Employee'}}</td>
                    <td>{{$user->full_name}}</td>
                    <td>{{$user->phone}}</td>
                    <td>{{$user->position_in_office}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->created_at}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

    </section>
    <!-- /.content -->
<!-- Modal -->
<div class="modal fade" id="modal_user_form" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Create User</h4>
        </div>
        <div class="modal-body">
        <div class="alert alert-danger" id="editAlert" style="display:none" ></div>
        <form id="user_form" class="form-horizontal" action="post form">
        <div class="form-group">
      <label class="control-label col-sm-2" for="full_name">Full Name:</label>
      <div class="col-sm-10">
        <input type="full_name" class="form-control full_name"  placeholder="Enter full_name" name="full_name" value="{{ old('full_name') }}" required autofocus>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-10">
        <input type="email" class="form-control email"  placeholder="Enter email" name="email" required >
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="phone">Phone:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control phone"  placeholder="Enter phone" name="phone">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="position_in_office">Position:</label>
      <div class="col-sm-10">
        <input type="position_in_office" class="form-control position_in_office" placeholder="Example: CEO, Developer" name="position_in_office">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="is_admin">Role:</label>
      <div class="col-sm-10">
        <select type="text" class="form-control is_admin"  placeholder="Enter is_admin" name="is_admin">
          <option value="0">Select</option>
          <option value="0">Employee</option>
          <option value="1">Admin</option>
        </select>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="avauser_avatartar">Avatar:</label>
      <div class="col-sm-10">
        <input type="file" class="form-control user_avatar" name="user_avatar">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="password">Password:</label>
      <div class="col-sm-10">
        <input type="password" class="form-control password" id="password" placeholder="Enter password" name="password">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="password">Confirm Password:</label>
      <div class="col-sm-10">
      <input id="password-confirm" type="password" class="form-control password_confirmation" name="password_confirmation" placeholder="password_confirmation" required>
      </div>
      <span id='message' style="margin-left:17px;"></span>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Submit</button>
      </div>
    </div>
  </form>
        </div>
        <div class="modal-footer">
         <div id="response"></div>
        </div>
      </div>

    </div>
  </div>
<!-- modal end -->
<!-- Modal -->
<div class="modal fade" id="modal_edit_form" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit User</h4>
        </div>
        <div class="modal-body">
        <div class="alert alert-danger" id="editAlert" style="display:none" ></div>
        <form id="user_form_edit" class="form-horizontal" action="post form">
        <div class="form-group">
      <label class="control-label col-sm-2" for="full_name">Full Name:</label>
      <div class="col-sm-10">
      <input type="hidden" name="user_id" class="id">
        <input type="full_name" class="form-control full_name"  placeholder="Enter full_name" name="full_name" value="{{ old('full_name') }}" required autofocus>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-10">
        <input type="email" class="form-control email"  placeholder="Enter email" name="email" required >
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="phone">Phone:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control phone"  placeholder="Enter phone" name="phone">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="position_in_office">Position:</label>
      <div class="col-sm-10">
        <input type="position_in_office" class="form-control position_in_office" placeholder="Example: CEO, Developer" name="position_in_office">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="is_admin">Role:</label>
      <div class="col-sm-10">
        <select type="text" class="form-control is_admin"  placeholder="Enter is_admin" name="is_admin">
          <option value="0">Employee</option>
          <option value="1">Admin</option>
        </select>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="user_avatar">Avatar:</label>
      <div class="col-sm-10">
        <input type="file" class="form-control user_avatar" name="user_avatar">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="password">Password:</label>
      <div class="col-sm-10">
        <input type="password" class="form-control password"  placeholder="Enter password" name="password">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="password">Confirm Password:</label>
      <div class="col-sm-10">
      <input  type="password" class="form-control password_confirmation" name="password_confirmation" placeholder="password_confirmation" required>
      </div>
      <span id='message' style="margin-left:17px;"></span>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Update</button>
        <button type="button" class="btn btn-danger close-modal" data-dismiss="modal" style="float:right;">Close</button>
      </div>
    </div>
  </form>
        </div>
        <div class="modal-footer">

        </div>
      </div>

    </div>
  </div>
<!-- modal end -->
<div id="multi_show"></div>
@endsection
@section('scripts')
<script>
// password match
$('.password, .password_confirmation').on('keyup', function () {
  if ($('.password').val() == $('.password_confirmation').val()) {
    $('#message').html('#Password Matched.').css('color', 'green');
  } else 
    $('#message').html('*Password Not Matching !!').css('color', 'red');
});
// end password match
$( document ).ready(function() {
  var base_url = 'http://localhost:8000';
  // modal close with reset
    $(".modal").on("hidden.bs.modal", function(){
      $('#user_form').trigger("reset");
      $('#user_form_edit').trigger("reset");
  });
  // open create form
    $( "#add_new" ).click(function() {
        // alert(base_url);
        // $('#show_modal').html();
        $('#modal_user_form').modal('show');
    });
    // register form
    $('#user_form').submit(function(event) {
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
        url: '{{ url('/administration/users') }}',
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'POST',
        data: formData,
        cache: false,
        processData: false,
        contentType : false,
        success: function(result)
        {
          swal({
          title: result,
          text: 'success',
          icon: 'success',
          }).then(function(){
            $('#user_form').trigger("reset");
            $('#modal_user_form').modal('toggle');

          });
        },
        error: function(result)
        {
          $('.alert-danger').html('');
          $.each(result.errors, function(key, value){
            $('.alert-danger').show();
            $('.alert-danger').append('<li>'+value+'<li>');
          });
        },
    });

});
 // open creatshowe form
 $( ".show_user" ).click(function() {
  var id = $(this).data("id");
  $.ajax({
      url: base_url+'/administration/users/'+id,
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type: 'GET',
      cache: false,
      processData: false,
      contentType : false,
      success: function(result)
      {
        $("#multi_show").html(result);
        $("#modal_show_form").modal("show");
      },
    });
  });
 // open create form
 $( ".edit_user" ).click(function() {
      var id = $(this).data("id");
        $.ajax({
            url: base_url+'/administration/users/'+id+'/edit',
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'GET',
            success: function(result)
            {
              $('#modal_edit_form').modal({backdrop: 'static', keyboard: false}) 
              // $('#modal_edit_form').modal('show');
              $("#user_form_edit").val($(".id").val(result.data.id));
              $("#user_form_edit").val($(".full_name").val(result.data.full_name));
              $("#user_form_edit").val($(".email").val(result.data.email));
              $("#user_form_edit").val($(".phone").val(result.data.phone));
              $("#user_form_edit").val($(".position_in_office").val(result.data.position_in_office));
              $('.is_admin').append("<option value='" +(result.data.is_admin)+"'selected>" +(result.data.is_admin == 1 ? 'Admin' : 'Employee') + "</option>");
            },
        });
   });
   // update form
   $( ".close-modal" ).click(function() {
        $('#user_form_edit').trigger("reset");
        $('#modal_edit_form').modal('toggle');
        $('.alert-danger').hide();
   });
  $('#user_form_edit').submit(function(event) {
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
      for (var pair of formData.entries()) {
      console.log(pair[0]+ ', ' + pair[1]);
  }
  $.ajax({
      url: base_url+'/administration/users/'+id,
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type: 'POST',
      //  _method:'patch',
      data: formData,
      cache: false,
      processData: false,
      contentType : false,
      success: function(result)
      {
        if(!result.errors){
            swal({
          title: result,
          text: 'success',
          icon: 'success',
          }).then(function(){
              $('#user_form_edit').trigger("reset");
              $('#modal_edit_form').modal('toggle');
          });
        }
        $('.alert-danger').html('');
          $.each(result.errors, function(key, value){
            $('.alert-danger').show();
            $('.alert-danger').append('<li>'+value+'<li>');
          });
  }
  });

});
// change status of user
$( ".change_status" ).click(function() {
  var id = $(this).data("id");
  $.ajax({
      url: base_url+'/administration/users/status/'+id,
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type: 'POST',
      cache: false,
      processData: false,
      contentType : false,
      success: function(result)
      {
        swal({
        title: result,
        text: 'success',
        icon: 'success',
        }).then(function(){
          location.reload();
        });
      },
    });
  });
    // open delete form
 $( ".delete_user" ).click(function() {
       var id = $(this).data("id");
     var req = confirm("Are you Sure ?");
      if(req == true) {
        $.ajax({
        url: base_url+'/administration/users/'+id,
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'DELETE',
        cache: false,
        processData: false,
        contentType : false,
        success: function(result)
        {
          swal({
          title: result,
          text: 'success',
          icon: 'success',
          }).then(function(){
            location.reload();
          });
        }
    });
       }else{
        swal({
          title: "Your data are save!!",
          text: 'success',
          icon: 'success',
          });
       }
    });
});

</script>
@endsection
