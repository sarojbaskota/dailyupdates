@extends('layouts.admin')

@section('content')
<section class="content-header">
      <h1>
        Leaves  Histroy
        <small>{{config('app.name')}}</small>
      </h1>
      <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Leaves History</li>
      </ol>
</section>

    <!-- Main content -->
 <section class="content container-fluid">
        @foreach($leaves as $leave)
            <div class="box box-success" style="margin-top:30px;">
                <div class="box-header">
                    <div class="progress-group">
                    <span class="progress-text"> Date : {{$leave->created_at}}</span>
                        <div class="progress sm">
                        <div class="progress-bar progress-bar-aqua" style="width: 100%"></div>
                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                    <div class="box-body">
                    <strong>Status :</strong> 
                        <h5>{{$leave->status}}</h5>
                        <strong>Name : </strong>
                        <h5>{{$leave->user->full_name}}</h5>
                        <strong>Request :</strong> 
                        <h5>{{$leave->leave_request}}</h5>
                        <strong>Response :</strong> 
                        <h5>{{$leave->leave_response}}</h5>
                    </div>
             </div>
        @endforeach
       <div style="float:right;" >{{ $leaves->links() }}</div> 
 </section>
@endsection
@section('scripts')
@endsection