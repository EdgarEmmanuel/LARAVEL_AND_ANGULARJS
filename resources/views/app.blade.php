<!doctype html>
<html lang="en" ng-app="customerRecords">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1,
shrink-to-fit=no">
<!-- Bootstrap CSS -->
<link rel="stylesheet"
href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
crossorigin="anonymous">
<title>Laravel 6 Crud application Angular JS Tutorial</title>
</head>
<body>
<div class="container" ng-controller="itemsController">
<header>
<h2>customers Database</h2>
</header>
	<div>
	<table class="table">
	<thead>
	<tr>
	<th>ID</th>
	<th>Title</th>
	<th>Description</th>
	<th><button id="btn-add" class="btn btn-primary btn-xs" ng-click="toggle('add', 0)">Add New Item</button></th>
	</tr>
	</thead>
	<tbody>
		<tr ng-repeat="customer in customers">
			<td><%= customer.id %></td>
			<td><%= customer.title %></td>
			<td><%= customer.description %></td>
			<td>
			<button class="btn btn-default btn-xs btn-detail" ng-click="toggle('edit',customer.id )">Edit</button>
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
	<form name="frmcustomers" class="form-horizontal" novalidate="">
		<div class="form-group error">
			<label for="inputEmail3" class="col-sm-12 control-label">Title</label>
			<div class="col-sm-12">
				<input type="text" class="form-control has-error" id="name" name="title" placeholder="Title" value="<%=title%>" ng-model="item.title" ng-required="true">
				<span class="help-inline" ng-show="frmcustomers.title.$invalid && frmcustomers.title.$touched">
					title
					field is required
				</span>
			</div>
		</div>
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-12 control-label">Description</label>
			<div class="col-sm-12">
				<input type="description" class="form-control" id="email" name="description" placeholder="Item description" value="<%=description%>" ng-model="item.description" ng-required="true">
				<span class="help-inline" ng-show="frmcustomers.description.$invalid && frmcustomers.description.$touched">
					Valid
					Description field is required
				</span>
			</div>
		</div>
	</form>
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		<button type="button" class="btn btn-primary" id="btn-save" ng-click="save(modalstate, id)" ng-disabled="frmcustomers.$invalid">Save changes</button>
	</div>
</div>
</div>
</div>
</div>
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
crossorigin="anonymous"></script>
<!-- Load Javascript Libraries (AngularJS, JQuery, Bootstrap) -->
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.8/angular.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.8/angular-animate.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.8/angular-route.min.js"></script>
<!-- AngularJS Application Scripts -->
<script src="<?= asset('app/app.js') ?>"></script>
<script src="<?= asset('app/controllers/item.js') ?>"></script>
</body>
</html>