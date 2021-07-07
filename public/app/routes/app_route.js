app.config(function($routeProvider) {
    $routeProvider
        .when("/", {
            templateUrl : "page/items",
        })
        .when("/list-car",{
            templateUrl : "page/cars"
        })
    }
);