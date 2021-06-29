app.controller('itemsController',function ($scope, $http, API_URL,appHelper) {
    $scope.reloadPage = function (){
        location.reload();
    }
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
    $scope.toggle = function (action, id) {
        $scope.modalstate = action;
        $scope.item = null;
        switch (action) {
            case 'add':
                $scope.form_title = "Add New Item";
                break;
            case 'edit':
                $scope.form_title = "Item Detail";
                $scope.id = id;
                $http.get(API_URL + 'items/' + id)
                .then(function (response) {
                    $scope.item = response.data;
                });
                break;
            default:
                break;
        }
        // console.log(id);
        $('#myModal').modal('show');
    }
    //save new record and update existing record
    $scope.save = function (action, id) {
        var url = API_URL + "items";
        var method = "POST";
        //append customer id to the URL if the form is in edit mode
        if (action === 'edit') {
            url += "/" + id;
            method = "PATCH";
        }

        let itemInJson = new Item($scope.item.title,$scope.item.description).fromItemToDto();
        itemInJson = {
            ...itemInJson,
            "updated_at": appHelper.generateDateWithMyslFormat(),
            "created_at": appHelper.generateDateWithMyslFormat()
        }

        $http({
            method: method,
            url: url,
            data: itemInJson,
            headers: { 'Content-Type': 'application/json' }
        }).then(function (response) {
            $scope.reloadPage();
        }), (function (error) {
            alert('This is embarassing. An error has occurred. Please check the log for details');
        });
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