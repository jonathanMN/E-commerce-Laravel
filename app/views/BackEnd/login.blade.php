@extends('layout.administrator.login-layout')

@section('content')

	@if(Auth::check())
		{{ '' }}
	@endif

	{{ Form::open(array('url' => URL::route('user-sign-in'), 'method' => 'post', 'class' => 'form-signin')) }}
		<h2 class="form-signin-heading">Please sign in</h2>
		<input type="text" class="form-control" name="username" placeholder="Username .." value="{{{ (Input::old('username')) ? Input::old('username') : '' }}}" autofocus>
		@if ($errors->has('username'))
			{{ $errors->first('username') }}
		@endif
		<input type="password" class="form-control" name="password" placeholder="Password ..">
		@if ($errors->has('password'))
			{{ $errors->first('password') }}
		@endif
		<label class="checkbox">
			<input type="checkbox" value="remember-me" name="remember"> Remember me
		</label>
		<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
	{{ Form::close() }}

@stop()