<!-- Modal -->
<div class="modal fade" id="modal_show_form" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Quick View User</h4>
         </div>
        <div class="modal-body"> 
          <div class="row">
            <div class="col-md-6">
              <dl>
                  <dt>Full Name</dt>
                  <dd>{{$user->full_name}}</dd>
                  <dt>Email</dt>
                  <dd>{{$user->email}}</dd>
                  <dt>Phone</dt>
                  <dd>{{$user->phone}}</dd>
                  <dt>Position In Office</dt>
                  <dd>{{$user->position_in_office}}</dd>
                  <dt>Role</dt>
                  <dd>{{($user->is_admin)==1?'Admin.':'Employee.'}}</dd>
              </dl> 
            </div>
            <div class="col-md-6">
              <img src="{{url('images/avatar/'.$user->avatar)}}" alt="{{$user->full_name}}"class="img-circle"  height=175px; >
            </div>
        </div>
        </div>
        <div class="modal-footer">
        </div>
      </div>
      
    </div>
</div>
<!-- modal end -->