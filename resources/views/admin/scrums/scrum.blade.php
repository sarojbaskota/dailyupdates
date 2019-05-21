@extends('layouts.admin')

@section('content')
<section class="content-header">
      <h1>
        Scrums
        <small>{{config('app.name')}}</small>
      </h1>
      <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
 <section class="content container-fluid">
  <div class="box box-warning direct-chat direct-chat-warning">
      <div class="box-header with-border">
      <h3 >Scrums With {{$employee->full_name}}</h3>
      </div>
          <!-- /.box-header -->
      <div class="box-body">
      <!-- form -->
      <form id="create_form" action="post form">
        <div class="direct-chat-msg">
        <input type="hidden" class="user_id" value="{{$user_id}}">
                          <div class="direct-chat-info clearfix">
                            <span class="direct-chat-name pull-left">{{Auth::user()->full_name}}</span>
                          </div>
                          <!-- /.direct-chat-info -->
                          <img class="direct-chat-img" src="{{asset('images/avatar/'.Auth::user()->avatar)}}" alt="message user image">
                          <!-- /.direct-chat-img -->
                          <div class="direct-chat-text">
                            What Did You Do?
                          </div>
                          <!-- /.direct-chat-text -->
        </div>
        <!-- replay  -->
        <div class="direct-chat-msg right">
                        <div class="direct-chat-info clearfix">
                          <span class="direct-chat-name pull-right">From  {{$employee->full_name}} side</span>
                        </div>
                        <!-- /.direct-chat-info -->
                        <img class="direct-chat-img" src="{{asset('images/avatar/'.$employee->avatar)}}" alt="message user image">
                        <!-- /.direct-chat-img -->
                          <textarea name="done"  cols="142" rows="10" class="done direct-chat-text" ></textarea>
                        <!-- /.direct-chat-text -->
        </div>
        <div class="direct-chat-msg">
                          <div class="direct-chat-info clearfix">
                            <span class="direct-chat-name pull-left">{{Auth::user()->full_name}}</span>
                          </div>
                          <!-- /.direct-chat-info -->
                          <img class="direct-chat-img" src="{{asset('images/avatar/'.Auth::user()->avatar)}}" alt="message user image">
                          <!-- /.direct-chat-img -->
                          <div class="direct-chat-text">
                            What Will You Do?
                          </div>
                          <!-- /.direct-chat-text -->
        </div>
        <!-- replay  -->
        <div class="direct-chat-msg right">
                        <div class="direct-chat-info clearfix">
                          <span class="direct-chat-name pull-right">From  {{$employee->full_name}} side</span>
                        </div>
                        <!-- /.direct-chat-info -->
                        <img class="direct-chat-img" src="{{asset('images/avatar/'.$employee->avatar)}}" alt="message user image">
                        <!-- /.direct-chat-img -->
                          <textarea name="todo"  cols="142" rows="10" class="todo direct-chat-text" ></textarea>
                        <!-- /.direct-chat-text -->
        </div>
        <div class="direct-chat-msg">
                          <div class="direct-chat-info clearfix">
                            <span class="direct-chat-name pull-left">{{Auth::user()->full_name}}</span>
                          </div>
                          <!-- /.direct-chat-info -->
                          <img class="direct-chat-img" src="{{asset('images/avatar/'.Auth::user()->avatar)}}" alt="message user image">
                          <!-- /.direct-chat-img -->
                          <div class="direct-chat-text">
                            What Are The Roadblock?
                          </div>
                          <!-- /.direct-chat-text -->
        </div>
        <!-- replay  -->
        <div class="direct-chat-msg right">
                        <div class="direct-chat-info clearfix">
                          <span class="direct-chat-name pull-right">From  {{$employee->full_name}} side</span>
                        </div>
                        <!-- /.direct-chat-info -->
                        <img class="direct-chat-img" src="{{asset('images/avatar/'.$employee->avatar)}}" alt="message user image">
                        <!-- /.direct-chat-img -->
                          <textarea name="done"  cols="142" rows="10" class="roadblock direct-chat-text" ></textarea>
                        <!-- /.direct-chat-text -->
        </div>
              <span class="input-group-btn">
                            <button type="button" class="btn btn-warning button_update">update</button>
                          </span>
      </form>        
      </div>
  </div>
  </section>
    <!-- Modal -->
<div class="modal fade modal_edit_form" id="" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit scrum</h4>
        </div>
        <div class="modal-body">
        <div class="alert alert-danger" id="editAlert" style="display:none" ></div>
        <form id="update_form" class="form-horizontal assign_to_employee" action="post form">
      <div class="form-group">
      <input type="hidden" class="user_id" value="{{$user_id}}">
      <label class="control-label col-sm-2">Today scrum For {{$employee->full_name}}</label>
      <div class="col-sm-10">
      <textarea type="text" class="form-control assign_to_employee" id="assign_to_employee" cols="30" rows="10" >
          @if($scrum)
              {{ $scrum->assign_to_employee}}
          @endif
       </textarea>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="response_from_employee">Report From {{$employee->full_name}}</label>
      <div class="col-sm-10">
      <textarea type="text" class="form-control response_from_employee" id="response_from_employee" cols="30" rows="10" readonly>
                    @if($scrum)
                        {{$scrum->response_from_employee}}
                    @endif
                </textarea>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Update</button>
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
// register form
var base_url = "http://localhost:8000";
// open create form
$( ".create_scrum" ).click(function() {
    $('.modal_create_form').modal('show');
  });
$("#create_form .button_update").click(function(event){
    event.preventDefault();
    var user_id = $('#create_form .user_id').val();
    var done = $('#create_form .done').val();
    var todo = $('#create_form .todo').val();
    var roadblock = $('#create_form .roadblock').val();
    // alert(assign_to_employee);
    $.ajax({
        url: base_url+'/administration/scrum/employee',
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'POST',
        data: {user_id:user_id, done:done, todo:todo, roadblock:roadblock},
        success: function(result)
        {
          console.log(result);
          swal({
          title: result.message,
          text: 'success',
          icon: 'success',
          }).then(function(){
            location.reload();
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

// open create form
 $( ".showupdate" ).click(function() {
    $('.modal_edit_form').modal('show');
  });
 $('#update_form').submit(function(event) {
    event.preventDefault();
    var user_id = $('#update_form .user_id').val();
    var assign_to_employee = $('#update_form .assign_to_employee').val();
    // alert(assign_to_employee);
    $.ajax({
        url: base_url+'/administration/employee/scrums-update',
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'POST',
        data: {user_id:user_id,assign_to_employee:assign_to_employee},
        success: function(result)
        {
          swal({
          title: result,
          text: 'success',
          icon: 'success',
          }).then(function(){
            location.reload();
            $('#update_form').trigger("reset");
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
</script>
@endsection