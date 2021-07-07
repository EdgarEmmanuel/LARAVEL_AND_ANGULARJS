@extends("layouts.app")

@section("content")


<body ng-controller="itemsController">


    <div class="app-content content ">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>

            <div class="content-body" ng-view>
            </div>
        </div>
    </div>

@endsection