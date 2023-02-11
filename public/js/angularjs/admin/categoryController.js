
var app = angular.module('canansAdmin', ['ngSanitize']);
app.config(function ($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
})

app.directive('attachmentFile', function ($parse) {
    return {
        restrict: 'A',
        link: function (scope, element, attributes) {
            var model = $parse(attributes.attachmentFile);
            var assign = model.assign;
            element.bind('change', function () {
                var files = [];
                angular.forEach(element[0].files, function (file) {
                    files.push(file);
                });
                scope.$apply(function () {
                    assign(scope, files);
                });

            });
        }
    }
});

app.directive('photoFile', function($parse){
    return {
      restrict: 'A',
      link : function(scope, element, attributes){
        var set = $parse(attributes.photoFile);
        element.bind('change', function(){
          set.assign(scope, element[0].files);
          scope.$apply();
        })
      }
    }
 });



var base = $('#base').attr('content');
app.controller('categoryController', ['$scope', '$http', '$compile', '$sce', function ($scope, $http, $compile, $sce) {
    // $scope.test = '/js/angularjs/admin/template/category/list.html';
    $scope.isChecked = false;
    $scope.status = false;
    angular.element(document).ready(function () {
        let edit = angular.element("input[name='edit']").val();
        $scope.getCategory(0);
      
        $scope.getListCategory();
    });

    $scope.createCategory = function (e) {
        e.preventDefault();
        var data = new FormData();
        data.append('name', $scope.name);
        data.append('status', $scope.status);
        data.append('parent_id', angular.element("select[name='parent_id']").val());
        data.append('old_image', angular.element("input[name='old_image']").val());
        data.append('edit', angular.element("input[name='edit']").val());
        if($scope.image)
        {
            data.append('image', $scope.image[0]);
        }else{
            data.append('image', null);
        }
        data.append('_token', $('meta[name="csrf-token"]').attr('content'));
        $http.post(base + '/admin/category/add',data, 
        { transformRequest: angular.identity,
            headers: {'Content-Type': undefined}})
        .then(function(response){
            console.log(response.data);
            if(response.data.status == 200)
            {
                window.location.href = base + '/admin/category'
            }else{
                toastr["error"](response.data.message)
            }
        },function(response){
            toastr["error"](response.data.message)
        });
    }

    $scope.getCategory = function(parent)
    {
        $http({ 
            method: 'GET', 
            url: base + '/admin/category/getListCategory', // admin/category/getCategory
            // headers: { 'Authorization': 'Bearer ' + $('#access_token').val() }, 
            // params: { id: $scope.edit } 
        }).then(function successCallback(response) {
            let dataCategory = '<option value="">Root</option>';
            let htm = $scope.renderCategoryOption(response.data.result, '', '');
            dataCategory += htm;
            angular.element('#parent_id').html($compile(dataCategory)($scope));
         }, function errorCallback(response) {

          });
    }

    $scope.renderCategoryOption = function(arr, str='', htm ='')
    {
        arr.forEach((element, index) => {
            let seleted = element.id == parent ? "selected" : "";
            let name = element.parent_id == null ? '<b>'+str+element.name+'</b>' : str+'+ '+element.name;
            htm += `<option value="${element.id}" ${seleted}>${name}</option>`;
            if(element.categories.length > 0)
            {
                let newHtm = $scope.renderCategoryOption(element.categories, '&emsp;&emsp;&emsp;&emsp;', '')
                htm += newHtm;
                newHtm = '';
            }
        });
        return htm;
    }

    $scope.changeImg = function(event)
    {
        const preview = document.querySelector('#imgCategory');
        const file = document.querySelector('#img').files[0];
        const reader = new FileReader();

        reader.addEventListener("load", function () {
            // convert image file to base64 string
            preview.src = reader.result;
        }, false);

        if (file) {
            reader.readAsDataURL(file);
        }
    }

    $scope.getListCategory = function ()
    {
        $http({ 
            method: 'GET', 
            url: base + '/admin/category/getListCategory', 
            // headers: { 'Authorization': 'Bearer ' + $('#access_token').val() }, 
            // params: { id: $scope.edit } 
        }).then(function successCallback(response) {
                console.log(response.data.result);
                let dataHtmCategoryItem = $scope.renderCategory(response.data.result, '', '')
                // <a href="" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></a>
                console.log(dataHtmCategoryItem);
                angular.element("#list_category").html($compile(dataHtmCategoryItem)($scope));
             }, function errorCallback(response) { 

             });
    }

    $scope.renderCategory = function(arr, str='', dataHtmCategoryItem ='')
    {
        arr.forEach((element, index) => {
            let img = element.image ? element.image : 'images/no-image.jpg';
            let checked = element.status == 'true' ? 'checked' : '';
            console.log(element.categories.length);
            let name = element.parent_id == null ? '<b>'+str+element.name+'</b>' : str+'+ '+element.name;
            dataHtmCategoryItem += `<tr>
                                        <th scope="row"><input type="checkbox"></th>
                                        
                                        <td>${name}</td>
                                        
                                        <td>
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input" id="customSwitches${element.id}" ${checked} ng-click="statusCategory($event, ${element.id})">
                                                <label class="custom-control-label" for="customSwitches${element.id}"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <i ng-click="viewEdit('${base}/admin/category/edit/${element.id}')" class="btn btn-warning btn-xs fa fa-pencil-square-o"
                                                    aria-hidden="true"></i>
                                            <i ng-click="deleteCategory($event, ${element.id})" class="btn btn-danger btn-xs fa fa-trash" aria-hidden="true"></i>
                                        </td>
                                    </tr>`;
            if(element.categories.length > 0)
            {
                let newHtm = $scope.renderCategory(element.categories, '&emsp;&emsp;&emsp;&emsp;', '')
                dataHtmCategoryItem += newHtm;
                newHtm = '';
            }
        });
        return dataHtmCategoryItem;
    }

    $scope.editCategory = function()
    {
       let someHtmlVar = '';
        $scope.test = $sce.trustAsHtml(someHtmlVar);
    }

    $scope.initCategoryEdit = function ()
    {
        let edit = angular.element("input[name='edit']").val();
        if(edit > 0)
        {
            $http({ 
                method: 'GET', 
                url: base + '/admin/category/detail/'+edit, 
                headers: { 'Authorization': 'Bearer ' + $('#access_token').val() 
            }, params: { id: edit } 
            }).then(function successCallback(response) {
                console.log('edit', response.data);
                $scope.name = response.data.result.name;
                $scope.isChecked = response.data.result.status == 'true' ? true : false;
                angular.element("#imgCategory").attr("src", "/"+response.data.result.image);
                angular.element("input[name='old_image']").val(response.data.result.image);
                $scope.getCategory(response.data.result.parent_id);
                if(response.data.result.status == 'true')
                {
                    // angular.element("#status").attr("checked", "checked")
                }
            }, function errorCallback(response) {
                
            });
        }
    }
    $scope.initCategoryEdit();

    $scope.statusCategory = function(element, id)
    {
        console.log(element.target);
        $http({ 
            method: 'GET', 
            url: base + '/admin/category/status/update/'+id, 
            headers: { 'Authorization': 'Bearer ' + $('#access_token').val() }, 
            params: { id: id } 
        }).then(function successCallback(response) {
            console.log(response.data);
            if(response.data.status == 'true')
            {
                angular.element(element.target).attr("checked", "checked")
            }
            toastr["success"](response.data.message)
        }, function errorCallback(response) {
            toastr["error"](response.data.message)
        });
    }

    $scope.deleteCategory = function(element, id)
    {
        console.log(element.target);
        if(confirm("Bạn có chắc chắn xóa không ?"))
        {
            $http({ 
                method: 'GET', 
                url: base + '/admin/category/delete/'+id, 
                headers: { 'Authorization': 'Bearer ' + $('#access_token').val() }, 
                params: { id: id } 
            }).then(function successCallback(response) {
                console.log(response.data);
                if(response.data.status == 200)
                {
                    angular.element(element.target).parent().parent().hide()
                }
                toastr["success"](response.data.message)
            }, function errorCallback(response) {
                toastr["error"](response.data.message)
            });
        }
        
    }

    $scope.viewEdit = function(url)
    {
        window.location.href = url;
    }
}]);