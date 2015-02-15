@extends('layout.administrator.default')

@section('content')
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h1 class="panel-title">Products</h1>
			</div><!-- /.panel-heading -->
			<div class="panel-body">
				<div class="col-md-6 pull-right" style="text-align:right;">
					<button class="btn btn-primary btn-sm" data-toggle="modal" type="button" data-target="#product_modal"><i class="fa fa-file"></i> New</button>
					<button class="btn btn-danger btn-sm" type="submit" id="multi-delete" disabled><i class="fa fa-trash-o"></i> Delete</button>
				</div>
				<p style="clear:both;"></p>
				<table class="table table-bordered small">
					<thead>
						<tr>
							<th>Name</th>
							<th>Category</th>
							<th>Brand</th>
							<th>Qty</th>
							<th>Unit Cost</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($products as $product)
						<tr>
							<td>{{ $product['name'] }}</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td>
								<a class="btn btn-primary btn-xs" title="Edit Category"><i class="fa fa-edit"></i></a>
								<a class="btn btn-danger btn-xs confirm-delete" title="Delete Category"><i class="fa fa-trash-o"></i></a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div><!-- /.panel-body -->
		</div><!-- /.panel -->
	</div><!-- col-md-6 -->

	<!-- Add Product Modal -->
	<div class="modal fade" id="product_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title" id="myModalLabel">Add Product</h4>
				</div>
				{{ Form::open(array('url' => URL::route('create-product'), 'files' => true, 'method' => 'POST', 'class' => 'form-horizontal')) }}
					<div class="modal-body">
						<div class="form-group">
							<label class="col-md-3 control-label">Brand :</label>
							<div class="col-md-9">
								<select class="form-control" name="brand" required>
									<option></option>
									@foreach ($brands as $brand)
									<option value="{{ $brand['id'] }}">{{ $brand['brand'] }}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Category :</label>
							<div class="col-md-9">
								<select class="form-control" name="category" required>
									<option></option>
									@foreach ($categories as $category)
									<option value="{{ $category['id'] }}">{{ $category['category'] }}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Product :</label>
							<div class="col-md-9">
								<input type="text" class="form-control" name="product" required />
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Description :</label>
							<div class="col-md-9">
								<input type="text" class="form-control" name="description" required />
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Quantity :</label>
							<div class="col-md-9">
								<input type="text" class="form-control" name="quantity" required />
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Unit Cost :</label>
							<div class="col-md-9">
								<input type="text" class="form-control" name="unit_cost" required />
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Image :</label>
							<div class="col-md-9">
								<input type="file" class="form-control" name="image" />
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
	<!-- END Add Brands Modal -->
@stop()<!-- END contents -->

@section('page_scripts')

	{{ HTML::script('js/admin.js') }}

@stop()<!-- END page_scripts -->