@extends('layout.administrator.default')

@section('content')
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h1 class="panel-title">Brands</h1>
			</div><!-- /.panel-heading -->
			<div class="panel-body">
				{{ Form::open(array('url' => URL::route('multi-delete-brand'), 'method' => 'post', 'class' => 'form-delete-confirm')) }}
					<div class="col-md-6 pull-right" style="text-align:right;">
						<button class="btn btn-primary btn-sm" data-toggle="modal" type="button" data-target="#brand_modal"><i class="fa fa-file"></i> New</button>
						<button class="btn btn-danger btn-sm" type="submit" id="multi-delete" disabled><i class="fa fa-trash-o"></i> Delete</button>
					</div>
					<p style="clear:both;"></p>
					<table class="table table-bordered small">
						<thead>
							<tr>
								<th style="text-align:center;">
									<input type="checkbox" id="toggle-check" />
								</th>
								<th>ID</th>
								<th>Brand</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($brands as $brand)
								<tr>
									<td align="center">
										<input type="checkbox" class="brand-ids" name="brand-ids[]" value="{{ $brand['id'] }}" />
									</td>
									<td>{{ $brand['id'] }}</td>
									<td>{{ $brand['brand'] }}</td>
									<td>
										<button data-toggle="modal" data-target="#edit_brand" class="btn btn-primary btn-xs btn-edit-brand" rel="{{ URL::route('brand-id', $brand['id']) }}" title="Edit Category" type="button"><i class="fa fa-edit"></i></button>
										<a href="{{ URL::route('delete-single-brand', $brand['id']) }}" class="btn btn-danger btn-xs confirm-delete" title="Delete Category"><i class="fa fa-trash-o"></i></a>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				{{ Form::close() }}
			</div><!-- /.panel-body -->
		</div><!-- /.panel -->
	</div><!-- col-md-6 -->

	<!-- Add Brands Modal -->
	<div class="modal fade" id="brand_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title" id="myModalLabel">Add Brands</h4>
				</div>
				{{ Form::open(array('url' => URL::route('create-brand'), 'method' => 'POST')) }}
					<div class="modal-body">
						<table class="table table-bordered" id="input-tbl">
							<thead>
								<tr>
									<th>Brand</th>
									<th style="text-align:center;">
										<a href="#" class="text-primary" id="btn-add-input"><i class="fa fa-plus"></i></a>
									</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><input class="form-control" type="text" name="brand[]" required /></td>
									<td></td>
								</tr>
							</tbody>
						</table>
					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary btn-sm">Submit</button>
					</div>
				{{ Form::close() }}
			</div>
		</div>
	</div>
	<!-- END Add Brands Modal -->

	<!-- Edit Brand Modal -->
	<div class="modal fade" id="edit_brand" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title" id="myModalLabel">Edit Category</h4>
				</div>
				{{ Form::open(array('url' => URL::route('update-brand'), 'method' => 'POST', 'class' => 'form-horizontal')) }}
					<div class="modal-body">
						<div class="form-group">
							<label class="col-md-3 control-label">ID:</label>
							<div class="col-md-8">
								<input class="form-control" type="text" name="id" id="data-id" readonly required />
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Brand:</label>
							<div class="col-md-8">
								<input class="form-control" type="text" name="brand" id="data-brand" required />
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary btn-sm">Save</button>
					</div>
				{{ Form::close() }}
			</div>
		</div>
	</div>
	<!-- END Edit Brand Modal -->

@stop() <!-- END Contents -->

@section('page_scripts')

	{{ HTML::script('js/admin.js') }}
	{{ HTML::script('js/admin/brands.js') }}

@stop() <!-- END Page Scripts -->