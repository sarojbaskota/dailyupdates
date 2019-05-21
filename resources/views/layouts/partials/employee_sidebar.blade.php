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

      <li class="{{(Request::segment(2) == 'dashboard')?'active':''}}"><a href="{{url('employee/dashboard')}}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li class="treeview {{(Request::segment(2) == 'updates')?'active':''}}">
          <a href="#" >
            <i class="fa fa-table "></i> <span>Manage Updates</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('employee/updates')}}"><i class="glyphicon glyphicon-calendar"></i> <span>Updates</span>  </a></li>
            <li><a href="{{url('employee/updates/history')}}"><i class="fa fa-book"></i> Updates History</a></li>
          </ul>
        </li>
        <li class="{{(Request::segment(2) == 'scrums')?'active':''}}"><a href="{{url('employee/scrums/history')}}"><i class="glyphicon glyphicon-calendar"></i> <span>Scrums History</span></a></li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>