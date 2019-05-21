<header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>TMS</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>{{config('app.name')}}</b></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Navagation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
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
   <div class="modal fade" id="modal_response_form" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Leave Response</h4>
        </div>
        <div class="modal-body">
        <div class="row">
        <div class="direct-chat-msg">
                        <!-- /.direct-chat-img -->
                        <textarea type="text" class="direct-chat-text leave_request"  cols="70" rows="5" required readonly></textarea>
                        
                        <!-- /.direct-chat-text -->
                </div>
        </div>
        <div class="row">
         <!-- Accept -->
         <div class="col-md-6">
         <form class="leave_form" action="send request response">
         <input type="hidden" class="id">
              <input type="hidden" class="user_id">
                <!-- admin -->
                <div class="direct-chat-msg right">
                        <!-- /.direct-chat-img -->
                        <textarea type="text" class="direct-chat-text leave_response"  cols="35" rows="5" required style="background-color:#337ab773;"></textarea>
                        <!-- /.direct-chat-text -->
                      </div>
                  <button type="submit" class="btn btn-primary pull-right">Response</button>
          </form>
         </div>
        </div>
         
        </div>
        <div class="modal-footer">
        </div>
      </div>
      
    </div>
  </div>
@section('scripts')
<script>
  $( ".response" ).click(function() {
    var id =  $(this).data("id");
    var user_id =  $(this).data("user_id");
    var request =  $(this).data("request");

   $('#modal_response_form').modal('show');
   $("#modal_response_form .id").val( id );
   $("#modal_response_form .user_id").val( user_id );
   $("#modal_response_form .leave_request").val( request );

   });
    // leaves form
var base_url = "http://localhost:8000";
$('#modal_response_form .leave_form').submit(function(event) {
    event.preventDefault();
    var id = $('#modal_response_form .id').val();
    var leave_response = $('.leave_response').val();
    var user_id = $('.user_id').val();
    $.ajax({
        url: base_url+'/administration/leave/response/'+id,
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'POST',
        data: {user_id:user_id, leave_response:leave_response},
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
  </script>
@endsection