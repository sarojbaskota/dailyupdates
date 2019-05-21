@extends('layouts.admin')

@section('content')
<section class="content-header">
      
</section>
<!-- Main content -->
<section class="content container-fluid">
<div style="padding: 20px 30px; background: rgb(243, 156, 18, 0.52) none repeat scroll 0% 0%; z-index: 999999; font-size: 16px; font-weight: 600; width:17%;">
<ul>
<li class="dropdown messages-menu" style="list-style: none;">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" >
              <i class="fa fa-envelope-o" style="color: white;font-weight: 900;font-size: 19px;"></i>
              <span class="label label-danger">{{count($leave_requests)}}</span>
            </a>
            <ul class="dropdown-menu" style="width:348%;">
              <li class="header" >You have {{count($leave_requests)}} messages</li>
              <li>
                <!-- inner menu: contains the messages -->
                <ul class="menu">
                 @foreach($leave_requests as $leave_request)
                  <li ><!-- start message -->
                    <a href="#" class="response" data-id="{{$leave_request->id}}" data-user_id="{{$leave_request->user->id}}" data-request="{{$leave_request->leave_request}}">
                      <div class="pull-left">
                        <!-- User Image -->
                          @if( $leave_request->avatar)
                            <img src="{{asset('images/avatar/'.$leave_request->avatar)}}" class="img-circle" alt="User Image" style="width: 24%;">
                          @else
                            <img src="{{asset('images/defaults/avatar.png')}}" class="img-circle" alt="User Image" style="width: 24%;">
                          @endif
                      </div>
                      <!-- Message title and timestamp -->
                      <h4>
                      {{ $leave_request->user->full_name }}
                        <small><i class="fa fa-clock-o"></i>{{$leave_request->created_at->diffForHumans()}}
       </small>
                      </h4>
                    </a>
  </li>
                 @endforeach 
                  <!-- end message -->
                </ul>
                <!-- /.menu -->
              </li>
              <li class="footer"><a>Goodluck</a></li>
            </ul>
          </li>
          </ul>
</section>
</div>

@endsection
