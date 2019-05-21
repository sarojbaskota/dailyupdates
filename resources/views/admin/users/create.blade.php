<!-- Modal -->
<div class="modal fade" id="modal_user_form" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Create User</h4>
        </div>
        <div class="modal-body">
        <form id="user_form" class="form-horizontal" action="post form">
        <div class="form-group">
      <label class="control-label col-sm-2" for="full_name">Full Name</label>
      <div class="col-sm-10">
        <input type="full_name" class="form-control full_name"  placeholder="Enter full_name" name="full_name" value="{{ old('full_name') }}" required autofocus>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-10">
        <input type="email" class="form-control email"  placeholder="Enter email" name="email" required >
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="phone">Phone:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control phone"  placeholder="Enter phone" name="phone">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="position_in_office">Position:</label>
      <div class="col-sm-10">
        <input type="position_in_office" class="form-control position_in_office" placeholder="Example: CEO, Developer" name="position_in_office">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="is_admin">Role:</label>
      <div class="col-sm-10">
        <select type="text" class="form-control is_admin"  placeholder="Enter is_admin" name="is_admin">
          <option value="0">Select</option>
          <option value="0">Employee</option>
          <option value="1">Admin</option>
        </select>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="avauser_avatartar">Avatar:</label>
      <div class="col-sm-10">
        <input type="file" class="form-control user_avatar" name="user_avatar">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="password">Password:</label>
      <div class="col-sm-10">          
        <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="password">Confirm Password:</label>
      <div class="col-sm-10">   
      <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="password_confirmation" required>
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Submit</button>
      </div>
    </div>
  </form>
        </div>
        <div class="modal-footer">
         
        </div>
      </div>
      
    </div>
  </div>
<!-- modal end -->