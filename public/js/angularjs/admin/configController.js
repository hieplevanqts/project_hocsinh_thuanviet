
var app = angular.module('canansAdmin', []);
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
app.controller('configController', ['$scope', '$http', '$compile', '$sce', function ($scope, $http, $compile, $sce) {
    $scope.postConfig = function()
    {
        console.log($scope.createConfig);
        let data = $scope.createConfig;
        $http.post(base + '/admin/config/create', data,
        {
            // transformRequest: angular.identity,
            // headers: { 'Content-Type': undefined }
        })
        .then(function (response) {
            console.log("response.data" , response.data);
            if (response.data.status == 200) {
                toastr["success"](response.data.message)
            } else {
                toastr["error"](response.data.message)
            }
        }, function (response) {
            toastr["error"](response.data.message)
        });
    }

    $scope.initConfig = function()
    {
        $http({ 
            method: 'GET', 
            url: base + '/admin/config/init', 
            // headers: { 'Authorization': 'Bearer ' + $('#access_token').val() }, 
            // params: { id: $scope.edit } 
            }).then(function successCallback(response) {
                $scope.createConfig = JSON.parse(response.data.result.content);
            }, function errorCallback(response) {

            });
    }

    $scope.initConfig();
}]);