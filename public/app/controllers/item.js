app.controller('itemsController',function ($scope, $http, API_URL,appHelper) {
    //fetch items listing from 
    $http({
        method: 'GET',
        url: API_URL + "items"
    }).then(function (response) {
        $scope.customers = response.data.data;
        //console.log(response.data.data);
    }, function (error) {
        console.log(error);
        alert('This is embarassing. An error has occurred. Please check the log for details');
    });
    //show modal form
    $scope.toggle = function (modalstate, id) {
        $scope.modalstate = modalstate;
        $scope.item = null;
        switch (modalstate) {
            case 'add':
                $scope.form_title = "Add New Item";
            break;
            case 'edit':
                $scope.form_title = "Item Detail";
                $scope.id = id;
                $http.get(API_URL + 'items/' + id)
                .then(function (response) {
                    console.log(response.data);
                    $scope.item = response.data;
                });
            break;
            default:
            break;
        }
        console.log(id);
        $('#myModal').modal('show');
    }
    //save new record and update existing record
    $scope.save = function (modalstate, id) {
        var url = API_URL + "items";
        var method = "POST";
        //append customer id to the URL if the form is in edit mode
        if (modalstate === 'edit') {
            url += "/" + id;
            method = "PATCH";
        }
        console.log(appHelper.generateDateToIsoString());
        let itemDataInJSON = {
            "title": $scope.item.title,
            "description": $scope.item.description,
            "created_at": $scope.item.created_at,
            "updated_at": $scope.item.updated_at
        }
        // console.log(data);
        // $http({
        //     method: method,
        //     url: url,
        //     data: itemDataInJSON,
        //     headers: { 'Content-Type': 'application/json' }
        // }).then(function (response) {
        //     console.log(response);
        //     location.reload();
        // }), (function (error) {
        //     console.log(error);
        //     alert('This is embarassing. An error has occurred. Please check the log for details');
        // });
    }
    //delete record
    $scope.confirmDelete = function (id) {
        var isConfirmDelete = confirm('Are you sure you want this record?');
        if (isConfirmDelete) {
            $http({
                method: 'DELETE',
                url: API_URL + 'items/' + id
            }).then(function (response) {
                console.log(response);
                location.reload();
            }, function (error) {
                console.log(error);
                alert('Unable to delete');
            });
        } else {
            return false;
        }
    }
});