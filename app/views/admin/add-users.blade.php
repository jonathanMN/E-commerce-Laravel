@extends('layout.administrator.default')

@section('content')
<div class="col-md-6">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h1 class="panel-title">Add User</h1>
		</div><!-- /.panel-heading -->
		<div class="panel-body">
			{{ Form::open(array('url' => URL::route('account-create-post'), 'method' => 'POST', 'class' => 'form-horizontal')) }}
				<div class="form-group">
					<label class="col-md-4 control-label">Username :</label>
					<div class="col-md-7">
						<input class="form-control" type="text" name="username" value="{{{ (Input::old('username')) ? Input::old('username') : '' }}}" />
						@if ($errors->has('username'))
							{{ $errors->first('username') }}
						@endif
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label">Password :</label>
					<div class="col-md-7">
						<input class="form-control" type="password" name="password" />
						@if ($errors->has('password'))
							{{ $errors->first('password') }}
						@endif
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label">Re-type Password :</label>
					<div class="col-md-7">
						<input class="form-control" type="password" name="re-password" />
						@if ($errors->has('re-password'))
							{{ $errors->first('re-password') }}
						@endif
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label">Email :</label>
					<div class="col-md-7">
						<input class="form-control" type="text" name="email" value="{{{ (Input::old('email')) ? Input::old('email') : '' }}}" />
						@if ($errors->has('email'))
							{{ $errors->first('email') }}
						@endif
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label"></label>
					<div class="col-md-7">
						<button class="btn btn-success">Add User</button> <button class="btn btn-danger" type="reset">Reset</button>
					</div>
				</div>
			{{ Form::close() }}
		</div><!-- /.panel-body -->
	</div><!-- /.panel -->
</div><!-- col-md-6 -->

@stop()