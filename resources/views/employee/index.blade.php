@extends('layouts.employee')

@section('content')
<section class="content-header">
      <h1>
        Task Page
        <small>{{config('app.name')}}</small>
      </h1>
      <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Task</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
    <div class="box">
    <div class="box-header">
       
    </div>
        <!-- /.box-header -->
    <div class="box-body">
        <form id="employee_form">
            <div class="form-group">
                <input type="hidden" class="user_id" value="{{$user_id}}">
                <label for="task-from-admin">Today Task To Do</label>
                <textarea type="text" class="form-control assign_to_employee" id="assign_to_employee" cols="30" rows="10" readonly>
               @if($task)
                  {{ $task->assign_to_employee}}
               @else
                 Hey You are free No task Assign !!!   
              @endif
              
                </textarea>
            </div>
            <div class="form-group">
                <label for="task-from-admin">Report To Admin</label>
                <textarea type="text" class="form-control response_from_employee" id="response_from_employee" cols="30" rows="10">
                    @if($task)
                        {{$task->response_from_employee}}
                    @endif
                </textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary" >Update</button>
            </div>
        </form>
    </div>
</div>

    </section>
@endsection
@section('scripts')
<script>
// register form
var base_url = "http://localhost:8000";
$('#employee_form').submit(function(event) {
    event.preventDefault();
    var user_id = $('.user_id').val();
    var response_from_employee = $('.response_from_employee').val();
    // alert(response_from_employee);
    $.ajax({
        url: base_url+'/employee/tasks/update',
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'POST',
        data: {user_id:user_id,response_from_employee:response_from_employee},
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