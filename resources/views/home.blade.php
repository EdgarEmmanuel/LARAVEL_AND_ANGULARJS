@extends("layouts.app")

@section("content")
		<div class="container">
			<header>
				<h2>Items</h2>
			</header>
			<div>
				<table class="table">
					<thead>
						<tr>
							<th>ID</th>
							<th>Title</th>
							<th>Description</th>
							<th><button id="btn-add" class="btn btn-primary btn-xs" ng-click="displayTheModal('add', 0)">Add New Item</button></th>
						</tr>
					</thead>
					<tbody>
						<tr ng-repeat="customer in customers track by $index">
							<td><%= ++$index %></td>
							<td><%= customer.title %></td>
							<td><%= customer.description %></td>
							<td>
								<button class="btn btn-default btn-xs btn-detail" ng-click="displayTheModal('edit',customer.id )">Edit</button>
								<button class="btn btn-danger btn-xs btn-delete" ng-click="confirmDelete(customer.id)">Delete</button>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
				<!-- Modal -->
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
						<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel"><%= form_title %> </h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">×</span>
									</button>
								</div>
						<div class="modal-body">
							<form name="form_items" class="form-horizontal" novalidate="">
								<div class="form-group error">
									<label for="inputEmail3" class="col-sm-12 control-label">Title</label>
									<div class="col-sm-12">
										<input type="text" class="form-control has-error" id="name" name="title" placeholder="Title" value="<%=title%>" ng-model="item.title" ng-required="true">
										<span class="help-inline" ng-show="form_items.title.$invalid && form_items.title.$touched">
											title
											field is required
										</span>
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-12 control-label">Description</label>
									<div class="col-sm-12">
										<input type="description" class="form-control" id="email" name="description" placeholder="Item description" value="<%=description%>" ng-model="item.description" ng-required="true">
										<span class="help-inline" ng-show="form_items.description.$invalid && form_items.description.$touched">
											Valid
											Description field is required
										</span>
									</div>
								</div>
							</form>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="button" class="btn btn-primary" id="btn-save" ng-click="save(modalstate, id)" ng-disabled="form_items.$invalid">Save changes</button>
						</div>
					</div>
				</div>
			</div>
		</div>

@endsection