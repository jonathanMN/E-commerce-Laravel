@extends('layout.administrator.default')

@section('content')
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h1 class="panel-title">Users</h1>
			</div><!-- /.panel-heading -->
			<div class="panel-body">
				{{ Form::open(array('url' => URL::route('multi-delete-user'), 'method' => 'post', 'class' => 'form-delete-confirm')); }}
					<div class="col-md-6 pull-right" style="text-align:right;">
						<button class="btn btn-primary btn-sm" data-toggle="modal" type="button" data-target="#user_modal"><i class="fa fa-file"></i> New</button>
						<button class="btn btn-danger btn-sm" type="submit" id="multi-delete" disabled><i class="fa fa-trash-o"></i> Delete</button>
					</div>
					<p style="clear:both;"></p>
					<table class="table table-bordered small">
						<thead>
							<tr>
								<th style="text-align:center;width:5%;"><input type="checkbox" id="toggle-checks"></th>
								<th>Username</th>
								<th>Password</th>
								<th>Email</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($users as $user)
							<tr>
								<td align="center"><input type="checkbox" name="u_id[]" value="{{ $user->id }}" class="u_id"></td>
								<td>{{ $user['username'] }}</td>
								<td>***********</td>
								<td>{{ $user['email'] }}</td>
								<td>
									<button type="button" class="btn btn-primary btn-xs edit-user" data-toggle="modal" type="button" data-target="#edit_user_modal" rel="{{ URL::route('user-view', $user->id) }}" title="Edit Category"><i class="fa fa-edit"></i></button>
									<a href="{{ URL::route('delete-single-user', $user->id) }}" class="btn btn-danger btn-xs confirm-delete" title="Delete Category"><i class="fa fa-trash-o"></i></a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				{{ Form::close(); }}
			</div><!-- /.panel-body -->
		</div><!-- /.panel -->
	</div><!-- col-md-12 -->

	<!-- Add Category Modal -->
	<div class="modal fade" id="user_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title" id="myModalLabel">Add User</h4>
				</div>
				{{ Form::open(array('url' => URL::route('account-create-post'), 'method' => 'POST', 'class' => 'form-horizontal', 'id' => 'add-user-form')) }}
					<div class="modal-body">
						<div class="form-group">
							<label class="col-md-4 control-label">Username :</label>
							<div class="col-md-7">
								<input class="form-control" type="text" name="username" />
								<div id="error_username"></div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Password :</label>
							<div class="col-md-7">
								<input class="form-control" type="password" name="password" />
								<div id="error_password"></div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Re-type Password :</label>
							<div class="col-md-7">
								<input class="form-control" type="password" name="re_password" />
								<div id="error_repassword"></div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Email :</label>
							<div class="col-md-7">
								<input class="form-control" type="text" name="email" />
								<div id="error_email"></div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary btn-sm">Submit</button>
					</div>
				{{ Form::close() }}
			</div>
		</div>
	</div>
	<!-- END Add Category Modal -->

	<!-- Edit User Modal -->
	<div class="modal fade" id="edit_user_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title" id="myModalLabel">Add User</h4>
				</div>
				{{ Form::open(array('url' => URL::route('account-create-post'), 'method' => 'POST', 'class' => 'form-horizontal', 'id' => 'add-user-form')) }}
					<div class="modal-body">
						<div class="form-group">
							<label class="col-md-4 control-label">Username :</label>
							<div class="col-md-7">
								<input class="form-control" type="text" name="username" id="data-username" readonly />
								<div id="error_username"></div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Password :</label>
							<div class="col-md-7">
								<input class="form-control" type="password" name="password" id="data-password" readonly />
								<div id="error_password"></div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Email :</label>
							<div class="col-md-7">
								<input class="form-control" type="text" name="email" id="data-email" readonly />
								<div id="error_email"></div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary btn-sm">Submit</button>
					</div>
				{{ Form::close() }}
			</div>
		</div>
	</div>
	<!-- END Edit User Modal -->

@stop()<!-- END contents -->

@section('page_scripts')

	{{ HTML::script('js/admin.js') }}
	{{ HTML::script('js/admin/users.js') }}

@stop() <!-- END page_scripts -->