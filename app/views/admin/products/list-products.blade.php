@extends('layout.administrator.default')

@section('content')
<div class="col-md-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h1 class="panel-title">Products</h1>
		</div><!-- /.panel-heading -->
		<div class="panel-body">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>Name</th>
						<th>Category</th>
						<th>Brand</th>
						<th>Qty</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td>
							<a class="btn btn-success btn-sm" title="Edit Category"><i class="fa fa-edit"></i></a>
							<a class="btn btn-danger btn-sm" title="Delete Category"><i class="fa fa-trash-o"></i></a>
						</td>
					</tr>
				</tbody>
			</table>
		</div><!-- /.panel-body -->
	</div><!-- /.panel -->
</div><!-- col-md-6 -->

@stop()