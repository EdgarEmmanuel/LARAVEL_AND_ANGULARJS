var app = angular.module('itemsApp', [])
.constant('API_URL', 'http://localhost:8000/api/')
// .service("item",Item)
.config(function($interpolateProvider) {
    // To prevent the conflict of `{{` and `}}` symbols
    // between Blade template engine and AngularJS templating we need
    // to use different symbols for AngularJS.

    $interpolateProvider.startSymbol('<%=');
    $interpolateProvider.endSymbol('%>');
  });