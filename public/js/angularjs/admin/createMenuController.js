// author : Le Van Hiep - vanhiep.net

app.controller('createMenuController', ['$scope', '$http', '$compile', '$sce', function ($scope, $http, $compile, $sce) {
    $scope.isChecked = false;
    $scope.isPosition = 'top';
    $scope.isParent = 0;
    $scope.isCategory = false;
    $scope.isLink = false;
    
    $scope.creatMenu = function () {
        console.log($scope.frmMenu);
        let data = $scope.frmMenu;
        let edit = angular.element("input[name='edit']").val();
        data.edit = edit;
        data.parent_id = angular.element("#parent_id").val();
        if(!data.status)
        {
            data.status = 0;
        }
        $http.post(base + '/admin/menu/create', data,
            {
                // transformRequest: angular.identity,
                // headers: { 'Content-Type': undefined }
            })
            .then(function (response) {
                console.log('response.data',response.data);
                if (response.data.status == 200) {
                    toastr["success"](response.data.message)
                    $scope.frmMenu = {};
                    window.location.href = base + '/admin/menu/list';
                } else {
                    toastr["error"](response.data.message)
                }
            }, function (response) {
                toastr["error"](response.data.message)
            });
    }

    $scope.initCreatemenu = function()
    {
        let edit = angular.element("input[name='edit']").val();
        if(edit)
        {
            $http({ 
                method: 'GET', 
                url: base + '/admin/menu/detail/'+edit, 
                headers: { 'Authorization': 'Bearer ' + $('#access_token').val() }, 
                params: { id: edit } 
                }).then(function successCallback(response) {
                    let parent = response.data.result.item.parent_id;
                    console.log(parent);
                    $scope.frmMenu = response.data.result.item;
                    $scope.isChecked = response.data.result.item.status == 1 ? true : false;
                    $scope.isParent = parent;
                    let htm = renderCategoryOption(response.data.result.list, '', '', $scope, 'short', parent);
                    angular.element("#parent_id").html($compile('<option value="">root</option>'+htm)($scope));
                }, function errorCallback(response) {

                });
        }else{
            $http({ 
                method: 'GET', 
                url: base + '/admin/menu/all', 
                headers: { 'Authorization': 'Bearer ' + $('#access_token').val() }, 
                params: { id: edit } 
                }).then(function successCallback(response) {
                    console.log(response.data);
                    let htm = renderCategoryOption(response.data.result, '', '', $scope, 'short');
                    angular.element("#parent_id").html('<option value="">root</option>'+htm);
                }, function errorCallback(response) {

                });
        }
    }
    $scope.initCreatemenu();

    $scope.editMenu = function(id)
    {
        // alert(id)
        window.location.href = base + '/admin/menu/edit/'+id;
    }

    $scope.deleteMenu = function(element, id)
    {
        if(confirm("Bạn có chắn chắn xóa không ?"))
        {
            $http.post(base + '/admin/menu/delete', {id:id},
            {
                // transformRequest: angular.identity,
                // headers: { 'Content-Type': undefined }
            })
            .then(function (response) {
                console.log('response.data',response.data);
                if (response.data.status == 200) {
                    toastr["success"](response.data.message);
                    angular.element(element.target).parent().parent().hide();
                    // $scope.frmMenu = {};
                    // window.location.href = base + '/admin/menu/list';
                } else {
                    toastr["error"](response.data.message)
                }
            }, function (response) {
                toastr["error"](response.data.message)
            });
        }
        
    }

    $scope.selectModule = function(element)
    {
        let module = $(element.target).val();
        switch (module) {
            case 'product':
                $scope.isCategory = true;
                $scope.isLink = false;
                let url = base + '/admin/category/getListCategory';
                let data =    $http({ 
                    method: 'GET', 
                    url: url, 
                    // headers: { 'Authorization': 'Bearer ' + $('#access_token').val() }, 
                    // params: { id: $scope.edit } 
                    }).then(function successCallback(response) {
                        let htm = renderCategoryOption(response.data.result, '', '', $scope, 'short', parent);
                        angular.element("#dataModule").html($compile(htm)($scope));
                    }, function errorCallback(response) {
                        console.log();
                    })
                console.log(data);
                break;
            case 'news':
                $scope.isCategory = false;
                $scope.isLink = true;
                $scope.frmMenu.url = 'tin-tuc';
                break;
            default:
                $scope.isCategory = false;
                $scope.isLink = true;
                break;
        }
    }

    $scope.selectCategory = function(element)
    {
        $http({ 
            method: 'GET', 
            url: base + '/categories/detail/'+$scope.frmMenu.category, 
            headers: { 'Authorization': 'Bearer ' + $('#access_token').val() }, 
            params: { id: $scope.frmMenu.category } 
            }).then(function successCallback(response) {
                console.log(response.data);
                $scope.isLink = true;
                $scope.frmMenu.url = 'danh-muc/'+response.data.result.id+'/'+response.data.result.slug;
            }, function errorCallback(response) {

            });
    }

}]);