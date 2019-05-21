@extends('layouts.employee')

@section('content')
<section class="content-header">
      <h1>
       Scrums Histroy 
        <small>{{config('app.name')}}</small>
      </h1>
      <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li> <li class="active">Scrums History</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        @foreach($scrums as $scrum)
            <div class="box box-success">
            <div class="box-header">
            <div class="progress-group">
                    <span class="progress-text"> Date : {{$scrum->created_at}}</span>
                    <div class="progress sm">
                      <div class="progress-bar progress-bar-aqua" style="width: 100%"></div>
                    </div>
                  </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <!-- question -->
            <div class="direct-chat-msg">
                          <div class="direct-chat-info clearfix">
                            <span class="direct-chat-name pull-left">Project Manager</span>
                          </div>
                          <!-- /.direct-chat-info -->
                          <img class="direct-chat-img" src="{{asset('images/defaults/avatar.png')}}" alt="message user image">
                          <!-- /.direct-chat-img -->
                          <div class="direct-chat-text">
                            What Did You Do?
                          </div>
                          <!-- /.direct-chat-text -->
        </div>
        <!-- replay  -->
        <div class="direct-chat-msg right">
                        <div class="direct-chat-info clearfix">
                          <span class="direct-chat-name pull-right"> {{\Auth::user()->full_name}} </span>
                        </div>
                        <!-- /.direct-chat-info -->
                        <img class="direct-chat-img" src="{{asset('images/avatar/'.\Auth::user()->avatar)}}" alt="message user image">
                        <!-- /.direct-chat-img -->
                        <div class="done direct-chat-text">
                           {{ $scrum->done}}
                        </div>
                        <!-- /.direct-chat-text -->
        </div> 
         <!-- question -->
         <div class="direct-chat-msg">
                          <div class="direct-chat-info clearfix">
                            <span class="direct-chat-name pull-left">Project Manager</span>
                          </div>
                          <!-- /.direct-chat-info -->
                          <img class="direct-chat-img" src="{{asset('images/defaults/avatar.png')}}" alt="message user image">
                          <!-- /.direct-chat-img -->
                          <div class="direct-chat-text">
                            What Will You Do?
                          </div>
                          <!-- /.direct-chat-text -->
        </div>
        <!-- replay  -->
        <div class="direct-chat-msg right">
                        <div class="direct-chat-info clearfix">
                          <span class="direct-chat-name pull-right">{{Auth::user()->full_name}}</span>
                        </div>
                        <!-- /.direct-chat-info -->
                        <img class="direct-chat-img" src="{{asset('images/avatar/'.\Auth::user()->avatar)}}" alt="message user image">
                        <!-- /.direct-chat-img -->
                        <div class="done direct-chat-text">
                           {{ $scrum->todo}}
                        </div>
                        <!-- /.direct-chat-text -->
        </div> 
         <!-- question -->
         <div class="direct-chat-msg">
                          <div class="direct-chat-info clearfix">
                            <span class="direct-chat-name pull-left">Project Manager</span>
                          </div>
                          <!-- /.direct-chat-info -->
                          <img class="direct-chat-img" src="{{asset('images/defaults/avatar.png')}}" alt="message user image">
                          <!-- /.direct-chat-img -->
                          <div class="direct-chat-text">
                            What Are The Roadblocks?
                          </div>
                          <!-- /.direct-chat-text -->
        </div>
        <!-- replay  -->
        <div class="direct-chat-msg right">
                        <div class="direct-chat-info clearfix">
                          <span class="direct-chat-name pull-right">{{Auth::user()->full_name}}</span>
                        </div>
                        <!-- /.direct-chat-info -->
                        <img class="direct-chat-img" src="{{asset('images/avatar/'.Auth::user()->avatar)}}" alt="message user image">
                        <!-- /.direct-chat-img -->
                        <div class="done direct-chat-text">
                           {{ $scrum->roadblock}}
                        </div>
                        <!-- /.direct-chat-text -->
        </div> 
               </div>
            </div>
        @endforeach
       <div style="float:right;" >{{ $scrums->links() }}</div> 
    </section>
@endsection
@section('scripts')
<script>
// register form
var base_url = "http://localhost:8000";
$('#employee_form').submit(function(event) {
    event.preventDefault();
    

});
</script>
@endsection