@extends('layouts.employee')

@section('content')
<section class="content container-fluid">
  <div style="padding: 20px 30px; background: rgb(243, 156, 18, 0.52) none repeat scroll 0% 0%; z-index: 999999; font-size: 16px; font-weight: 600; width:17%;">
            <li class="dropdown messages-menu" style="list-style: none;">
              <!-- Menu toggle button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-envelope-o" style="color: white;font-weight: 900;font-size: 19px;"></i>
                <span class="label label-danger">{{count($leave_requests)}}</span>
              </a>
              <ul class="dropdown-menu" style="list-style: none;width:194%;">
                <li class="header">You have {{count($leave_requests)}} messages</li>
                @foreach($leave_requests as $leave_request)
                <li>
                  <!-- inner menu: contains the messages -->
                  <ul class="menu">
                    <li><!-- start message -->
                      <a href="#" class="open_response" data-id="{{$leave_request->id}}" data-response="{{$leave_request->leave_response}}" >
                        <div class="pull-left">
                        <button type="button" class="btn btn-default btn-sm">
                          <span class="glyphicon glyphicon-check"></span>
                          </button>
                        </div>
                        <!-- Message title and timestamp -->
                        <h4 class="message" >
                          Response {{$loop->iteration}}
                          <small><i class="fa fa-clock-o"></i>{{$leave_request->created_at->diffForHumans()}}</small>
                        </h4>
                      </a>
                    </li>
                    <!-- end message -->
                  </ul>
                  <!-- /.menu -->
                </li>
                @endforeach
                <li class="footer"><a href="#">Good luck</a></li>
              </ul>
            </li>
  </div>
</section>          
@endsection
@section('scripts')
<script src="{{asset('js/employee_dashboard.js')}}"></script>
@endsection