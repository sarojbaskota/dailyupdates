@extends('layouts.admin')

@section('content')
<section class="content-header">
      <h1>
        Employee For Scruming
        <small>{{config('app.name')}}</small>
      </h1>
      <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Scrums</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
    <div class="box">
    <div class="box-header">
    </div>
        <!-- /.box-header -->
    <div class="box-body">
        <table id="example2" class="table table-bordered table-hover">
            <thead>
                <tr>
                  <th width="20px" >SN</th>
                  <th width="20px">Info*</th>
                  <th width="60px">Scrum</th>
                  <th width="60px">Scrum History</th>
                  <th>Full Name</th>
                  <th>Position</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr> <td>{{$loop->iteration}}</td>
                      <td>
                      <a class="btn btn-info show_user" data-id=" {{$user->id}} " > <i class="glyphicon glyphicon-eye-open" ></i> </a>
                      </td>
                      <td>
                      <a class="btn btn-primary task-assign" href=" {{url('administration/scrums/'.$user->id)}} "> <i class="fa fa-comments" ></i> </a>
                      </td>
                      <td>
                      <a class="btn btn-success task-history" href="{{url('administration/scrums/history/'.$user->id)}}" > <i class="glyphicon glyphicon-calendar" ></i> </a>
                      </td>
                    <td>{{$user->full_name}}</td>
                    <td>{{$user->position_in_office}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

    </section>
@endsection    
@section('scripts')
<script>
$( document ).ready(function() {
  var base_url = 'http://localhost:8000';
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
});
</script>
@endsection