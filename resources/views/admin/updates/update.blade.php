@extends('layouts.admin')

@section('content')
<section class="content-header">
      <h1>
       update
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
      <h3 >Updates Of {{$employee->full_name}}</h3>
      </div>
          <!-- /.box-header -->
      <div class="box-body">
      <div class="direct-chat-msg right">
                      <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-right">{{$employee->full_name}}</span>
                        <span class="direct-chat-timestamp pull-left">{{$employee->created_at->diffForHumans()}}</span>
                      </div>
                      <!-- /.direct-chat-info -->
                      <img class="direct-chat-img" src="{{asset('images/avatar/'.$employee->avatar)}}" alt="message user image">
                      <!-- /.direct-chat-img -->
                      <div class="direct-chat-text">
                      It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.
                      </div>
                      <!-- /.direct-chat-text -->
                    </div>
      </div>
  </div>
  </section>
<div id="multi_show"></div>
@endsection
@section('scripts')
<script>
</script>
@endsection