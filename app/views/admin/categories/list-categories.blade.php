@extends('layout.administrator.default')

@section('content')
	{{ Form::open(array('url' => URL::route('delete-multi'), 'method' => 'post', 'class' => 'form-delete-confirm')) }}
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h1 class="panel-title">Categories</h1>
				</div><!-- /.panel-heading -->
				<div class="panel-body">
					<div class="col-md-6 pull-right" style="text-align:right;">
						<button class="btn btn-primary btn-sm" data-toggle="modal" type="button" data-target="#category"><i class="fa fa-file"></i> New</button>
						<button class="btn btn-danger btn-sm" type="submit" id="multi-delete" disabled><i class="fa fa-trash-o"></i> Delete</button>
					</div>
					@if ($errors->has('category[]'))
						{{ 'The Category field is required' }}
					@endif
					<p style="clear:both;"></p>
					
					<table class="table table-bordered small">
						<thead>
							<tr>
								<th style="width:5%;text-align:center;">
									<input type="checkbox" name="toggle" id="toggle-catids" />
								</th>
								<th>ID</th>
								<th>Category</th>
								<th>Main Category</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($categories as $category)
							<tr>
								<td style="text-align:center;">
									<input type="checkbox" name="catids[]" class="catids" value="{{ $category['id'] }}" />
								</td>
								<td>{{ $category['id'] }}</td>
								<td>{{ $category['category'] }}</td>
								<td>{{ $category['main_category'] }}</td>
								<td>
									<button data-toggle="modal" data-target="#edit_category" rel="{{ URL::route('cat-id', $category['id']) }}" class="btn btn-primary btn-xs edit-view" title="Edit Category" type="button"><i class="fa fa-edit"></i></button>
									<a class="btn btn-danger btn-xs confirm-delete" href="{{ URL::route('delete-single', $category['id']) }}" title="Delete Category"><i class="fa fa-trash-o"></i></a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div><!-- /.panel-body -->
			</div><!-- /.panel -->
		</div><!-- col-md-12 -->
	</form>

	<!-- Add Category Modal -->
	<div class="modal fade" id="category" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title" id="myModalLabel">Add Category</h4>
				</div>
				{{ Form::open(array('url' => URL::route('create-category'), 'method' => 'POST')) }}
					<div class="modal-body">
						<table class="table table-bordered" id="input-tbl">
							<thead>
								<tr>
									<th>Category</th>
									<th>Main Category</th>
									<th style="text-align:center;">
										<a href="#" class="text-primary" id="btn-add-input"><i class="fa fa-plus"></i></a>
									</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><input class="form-control" type="text" name="category[]" required /></td>
									<td>
										<select class="form-control" name="main_category[]" id="main_cat_val">
											<option value="null"></option>
											@foreach ($categories as $category)
												@if ($category['main_category'] == null)
												<option value="{{ $category['id'] }}">{{ $category['category'] }}</option>
													@foreach ($categories as $sub_cat)
														@if (($sub_cat['main_category'] == $category['id']) && ($sub_cat['main_category'] != null))
															<option value="{{ $category['id'] }}">&emsp;-- {{ $sub_cat['category'] }}</option>
														@endif
													@endforeach
												@endif
											@endforeach
										</select>
									</td>
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

	<!-- Edit Category Modal -->
	<div class="modal fade" id="edit_category" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title" id="myModalLabel">Edit Category</h4>
				</div>
				{{ Form::open(array('url' => URL::route('update-category'), 'method' => 'POST', 'class' => 'form-horizontal')) }}
					<div class="modal-body">
						<div class="form-group">
							<label class="col-md-3 control-label">ID:</label>
							<div class="col-md-8">
								<input class="form-control" type="text" name="id" id="data-id" readonly required />
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Category:</label>
							<div class="col-md-8">
								<input class="form-control" type="text" name="category" id="data-cat" required />
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Main Category:</label>
							<div class="col-md-8">
								<select class="form-control" name="main_category" id="data-main-cat">
									<option value="null"></option>
									@foreach ($categories as $category)
										@if ($category['main_category'] == null)
										<option value="{{ $category['id'] }}">{{ $category['category'] }}</option>
											@foreach ($categories as $sub_cat)
												@if (($sub_cat['main_category'] == $category['id']) && ($sub_cat['main_category'] != null))
													<option value="{{ $category['id'] }}">&emsp;-- {{ $sub_cat['category'] }}</option>
												@endif
											@endforeach
										@endif
									@endforeach
								</select>
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

@stop() <!-- END contents -->

@section('page_scripts')

	{{ HTML::script('js/admin.js') }}
	{{ HTML::script('js/admin/categories.js') }}

@stop() <!-- END page_scripts -->