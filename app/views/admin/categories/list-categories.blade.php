@extends('layout.administrator.default')

@section('content')
<div class="col-md-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h1 class="panel-title">Categories</h1>
		</div><!-- /.panel-heading -->
		<div class="panel-body">
			<div class="col-md-6 pull-right" style="text-align:right;">
				<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#category"><i class="fa fa-file"></i> New</button>
				<button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i> Delete</button>
			</div>
			
			<p style="clear:both;"></p>
			
			<table class="table table-bordered small">
				<thead>
					<tr>
						<th style="width:5%;text-align:center;"><input type="checkbox" name="toggle" id="toggle" /></th>
						<th>ID</th>
						<th>Category</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td style="text-align:center;"><input type="checkbox" name="catids[]" class="catids" /></td>
						<td></td>
						<td></td>
						<td>
							<a class="btn btn-primary btn-xs" title="Edit Category"><i class="fa fa-edit"></i></a>
							<a class="btn btn-danger btn-xs" title="Delete Category"><i class="fa fa-trash-o"></i></a>
						</td>
					</tr>
				</tbody>
			</table>
		</div><!-- /.panel-body -->
	</div><!-- /.panel -->
</div><!-- col-md-6 -->


<div class="modal fade" id="category" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabel">Add Category</h4>
			</div>

			<div class="modal-body">

			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary btn-sm">Submit</button>
			</div>

		</div>
	</div>
</div>

@stop()