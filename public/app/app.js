var app = angular.module('customerRecords', [])
.constant('API_URL', 'http://localhost:8000/api/')
.config(function($interpolateProvider) {
    // To prevent the conflict of `{{` and `}}` symbols
    // between Blade template engine and AngularJS templating we need
    // to use different symbols for AngularJS.

    $interpolateProvider.startSymbol('<%=');
    $interpolateProvider.endSymbol('%>');
  });