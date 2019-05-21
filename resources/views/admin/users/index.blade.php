@extends('layouts.admin')

@section('content')
<section class="content-header">
      <h1>
        Page Header
        <small>Optional description</small>
      </h1>
      <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
    <div class="box">
    <div class="box-header">
        <button class=" box-title btn btn-primary" id="add_new">Add New</button>
    </div>
        <!-- /.box-header -->
    <div class="box-body">
        <table id="example2" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>SN</th>
                     <th>Action</th>
                     <th>Status</th>
                     <th>Is Admin</th>
                    <th>Full Name</th>
                    <th>Phone</th>
                    <th>Position</th>
                    <th>Email</th>
                    <th>Created On</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr> <td>{{$loop->iteration}}</td>
                      <td>
                      <!-- <a class="btn btn-primary show_user" data-id=" {{$user->id}} " > <i class="glyphicon glyphicon-eye-open" ></i> </a> -->
                      <a class="btn btn-success edit_user btn-sm" data-id=" {{$user->id}} "> <i class="glyphicon glyphicon-edit" ></i> </a>
                      <a class="btn btn-danger delete_user btn-sm" data-id=" {{$user->id}} "> <i class="glyphicon glyphicon-trash" ></i> </a>

                      </td>
                      <td>
                        <label class="switch">
                        <input type="checkbox" class="status_button change_status" data-id=" {{$user->id}} "  {{($user->status == 1)?"checked":""}}>
                        <span class="slider round"></span>
                        </label>
                      </td>
                    <td>{{($user->is_admin==1)?'Admin':'Employee'}}</td>
                    <td>{{$user->full_name}}</td>
                    <td>{{$user->phone}}</td>
                    <td>{{$user->position_in_office}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->created_at}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

    </section>
    <!-- /.content -->
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
        <div class="alert alert-danger" id="editAlert" style="display:none" ></div>
        <form id="user_form" class="form-horizontal" action="post form">
        <div class="form-group">
      <label class="control-label col-sm-2" for="full_name">Full Name:</label>
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
        <input type="number" class="form-control phone"  placeholder="Enter phone" name="phone">
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
        <input type="password" class="form-control password" id="password" placeholder="Enter password" name="password">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="password">Confirm Password:</label>
      <div class="col-sm-10">
      <input id="password-confirm" type="password" class="form-control password_confirmation" name="password_confirmation" placeholder="password_confirmation" required>
      </div>
      <span id='message' style="margin-left:17px;"></span>
    </div>
    <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Update</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal" style="float:right;">Close</button>
      </div>
    </div>
  </form>
        </div>
        <div class="modal-footer">
         <div id="response"></div>
        </div>
      </div>

    </div>
  </div>
<!-- modal end -->
<!-- Modal -->
<div class="modal fade" id="modal_edit_form" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit User</h4>
        </div>
        <div class="modal-body">
        <div class="alert alert-danger" id="editAlert" style="display:none" ></div>
        <form id="user_form_edit" class="form-horizontal" action="post form">
        <div class="form-group">
      <label class="control-label col-sm-2" for="full_name">Full Name:</label>
      <div class="col-sm-10">
      <input type="hidden" name="user_id" class="id">
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
        <input type="number" class="form-control phone"  placeholder="Enter phone" name="phone">
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
          <option value="0">Employee</option>
          <option value="1">Admin</option>
        </select>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="user_avatar">Avatar:</label>
      <div class="col-sm-10">
        <input type="file" class="form-control user_avatar" name="user_avatar">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="password">Password:</label>
      <div class="col-sm-10">
        <input type="password" class="form-control password"  placeholder="Enter password" name="password">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="password">Confirm Password:</label>
      <div class="col-sm-10">
      <input  type="password" class="form-control password_confirmation" name="password_confirmation" placeholder="password_confirmation" required>
      </div>
      <span id='message' style="margin-left:17px;"></span>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Update</button>
        <button type="button" class="btn btn-danger close-modal" data-dismiss="modal" style="float:right;">Close</button>
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
<div id="multi_show"></div>
@endsection
@section('scripts')
<script src="{{asset('js/users.js')}}"></script>
@endsection
