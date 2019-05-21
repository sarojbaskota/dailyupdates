<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
           @if(Auth::user()->avatar)
            <img src="{{asset('images/avatar/'.Auth::user()->avatar)}}" class="img-circle" alt="User Image">
          @else
            <img src="{{asset('images/defaults/avatar.png')}}" class="img-circle" alt="User Image">
          @endif
        </div>
        <div class="pull-left info">
          <p> {{Auth::user()->full_name}} </p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Navigation</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="{{(Request::segment(2) == 'dashboard')?'active':''}}"><a href="{{url('administration/dashboard')}}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li class="{{(Request::segment(2) == 'users')?'active':''}}"><a href="{{url('administration/users')}}"><i class="fa fa-group"></i> <span>Manage Users</span></a></li>
        <li class="{{(Request::segment(2) == 'scrums')?'active':''}}"><a href="{{url('administration/scrums')}}"><i class="fa fa-comments"></i> <span>Scrums</span></a></li>
        <li class="{{(Request::segment(2) == 'updates')?'active':''}}"><a href="{{url('administration/updates')}}"><i class="fa fa-calendar-check-o"></i> <span>Daily Updates</span></a></li>
        <li class="{{(Request::segment(3) == 'histroy')?'active':''}}"><a href="{{url('administration/leave/histroy')}}"><i class="fas fa-ban"></i> <span>Leave Histroy</span></a></li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>