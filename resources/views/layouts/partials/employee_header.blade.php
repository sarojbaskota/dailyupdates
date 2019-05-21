<header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>BigO</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>{{config('app.name')}}</b></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <?php
      $dashboard = (request()->is('employee/dashboard')) ? true : false;
      ?>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <!-- send -->
          <?php
           if($dashboard == true){
          ?>
          <li class="dropdown messages-menu">
          <!-- Menu toggle button -->
          <a href="#" class="dropdown-toggle message" data-toggle="dropdown">
            <i class="glyphicon glyphicon-edit">Leave</i>
          </a>
          </li>
          <?php
            }
          ?>
          <!-- end send -->
          <!-- /.messages-menu -->
          
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
                @if(Auth::user()->avatar)
                <img src="{{asset('images/avatar/'.Auth::user()->avatar)}}" class="user-image" alt="User Image">
                @else
                <img src="{{asset('images/defaults/avatar.png')}}" class="user-image" alt="User Image">
                @endif
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">{{Auth::user()->full_name}}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                @if(Auth::user()->avatar)
                <img src="{{asset('images/avatar/'.Auth::user()->avatar)}}" class="img-circle" alt="User Image">
                @else
                <img src="{{asset('images/defaults/avatar.png')}}" class="img-circle" alt="User Image">
                @endif
                <p>
                     {{Auth::user()->full_name}}
                  <small>{{Auth::user()->created_at}}</small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a class=" btn btn-default btn-flat show_user" data-id=" {{Auth::user()->id}}">Profile</a>
                </div>
                <div class="pull-right">
                <a class="btn btn-default btn-flat" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Modal -->
  <div class="modal fade" id="modal_message_form" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Leave Request</h4>
        </div>
        <div class="modal-body">
            <form class="leave_form" action="send request message">
            <input type="hidden" class="user_id" value="{{Auth::user()->id}}">
            <div class="direct-chat-msg">
                      <!-- /.direct-chat-info -->
                      <img class="direct-chat-img" src="{{asset('images/avatar/'.Auth::user()->avatar)}}" alt="message user image">
                      <!-- /.direct-chat-img -->
                      <textarea type="text" class="direct-chat-text leave_request"  cols="65" rows="5" required auto-focus></textarea>
                     
                      <!-- /.direct-chat-text -->
              </div>
                <button type="submit" class="btn btn-primary pull-right">Send</button>
            </form>
        </div>
        <div class="modal-footer">
        </div>
      </div>
      
    </div>
  </div>
  <!-- details Modal -->
  <div class="modal fade" id="modal_response_details_form" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Leave Request</h4>
        </div>
        <div class="modal-body">
            <form class="seen_leave_form" action="send request message">
            <input type="hidden" class="id">
            <div class="direct-chat-msg">
                      <!-- /.direct-chat-img -->
                      <textarea type="text" class="direct-chat-text leave_response"  cols="70" rows="7" required readonly></textarea>
                     
                      <!-- /.direct-chat-text -->
              </div>
                <button type="submit" class="label label-info pull-right"> <span class="glyphicon glyphicon-ok-sign"></span> Do not show again</button>
            </form>
        </div>
        <div class="modal-footer">
        </div>
      </div>
      
    </div>
  </div>