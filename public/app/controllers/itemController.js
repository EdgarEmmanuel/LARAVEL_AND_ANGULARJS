app.controller('itemsController',function ($scope, $http, API_URL,appHelper,iziToastHelper) {
    // global variables
    $scope.customers = [];

    // ==================== start global functions 
    $scope.changeModalTitle = function (title) {
        $scope.form_title = title;
    }

    // ======================== end global functions

    appHelper.sendHttpRequest(API_URL + "items","GET")
        .then((response)=>{
            $scope.customers = response.data.data;
        }).catch((err)=>{
            $scope.customers=[];
            alert('This is embarassing. An error has occurred. Please check the log for details');
        })

    //show modal form
    $scope.displayTheModal = function (action, id) {
        $scope.modalstate = action;
        $scope.item = null;
        $scope.id = id!=null ? id : null;
        switch (action) {
            case 'add':
                $scope.changeModalTitle("Add New Item");
            break;
            case 'edit':
                $scope.changeModalTitle("Item Detail");
                appHelper.sendHttpRequest(API_URL + 'items/' + id,"GET")
                .then(function (response) {
                    $scope.item = response.data;
                });
            break;
            default:
            break;
        }
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

        appHelper.sendHttpRequest(url,method,{ 'Content-Type': 'application/json' },itemInJson)
        .then((data)=>{
             iziToastHelper.displaySimpleToast("success","MISE A JOUR","MODIFICATION EFFECTUE AVEC SUCCESS",callback={closed:true});
        }).catch((err)=>{
            alert('This is embarassing. An error has occurred. Please check the log for details');
        })
    }
    //delete record
    $scope.confirmDelete = function (id) {
        let index = id != null ? id : null;
        if(index){
            var isDeleteConfirmed = confirm('Are you sure you want to delete this Item record?');
            if (isDeleteConfirmed) {
                appHelper.sendHttpRequest(API_URL + 'items/' + index,'DELETE')
                    .then((data)=>{
                        appHelper.reloadPage();
                    }).catch((err)=>{
                        alert('Unable to delete');
                    })
            } else {
                return false;
            }
        }
    }
});