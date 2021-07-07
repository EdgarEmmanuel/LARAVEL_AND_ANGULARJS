@extends("layouts.app")

@section("content")


<body ng-controller="itemsController">
    <ul class="nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Active</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#!/list-car">ListCar</a>
        </li>
      </ul>


    <div class="app-content content ">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>

            <div class="content-body" ng-view>
            </div>
        </div>
    </div>

@endsection