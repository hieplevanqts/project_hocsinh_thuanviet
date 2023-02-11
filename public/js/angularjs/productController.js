
var app = angular.module('canans', []);
app.config(function ($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
})

app.directive('slickSlider',function($timeout){
    return {
      restrict: 'A',
      link: function(scope,element,attrs) {
        $timeout(function() {
            $(element).slick(scope.$eval(attrs.slickSlider));
        });
      }
    }
   }); 


var base = $('#base').val();
app.controller('productController', ['$scope', '$http', '$compile', function ($scope, $http, $compile) {

    angular.element(document).ready(function () {
        // alert(1)
    });

    $scope.getProductDetail = function()
    {
        let productId = $("input[name='productId']").val();
        let url = base + 'product/detail/'+productId;
        $http({ 
            method: 'GET', 
            url: url, 
            // headers: { 'Authorization': 'Bearer ' + $('#access_token').val() }, 
            params: { id: productId } 
        }).then(function successCallback(response) {
            console.log(response.data.result);
            let product = response.data.result.product;
            let images = response.data.result.images;
            $scope.images = images;
            angular.element(".product-name").text(product.name);
            // angular.element(".sider-full").html($compile('<div><img src="'+base+product.image+'" /></div>')($scope));
            images.forEach(element => {
                // angular.element(".sider-full").append($compile('<div><img src="'+base+element.url+'" /></div>')($scope));
            });
            
        }, function errorCallback(response) {

        });
    }

    $scope.getProductDetail();

    $scope.countPlus = function()
    {
        let count = angular.element("input[name='number_product']").val();
        count = parseInt(count);
        count += 1;
        angular.element("input[name='number_product']").val(count);
    }

    $scope.countMinus = function()
    {
        let count = angular.element("input[name='number_product']").val();
        count = parseInt(count);
        count -= 1;
        if(count < 0){
            count = 0;
        }
        angular.element("input[name='number_product']").val(count);
    }

    $scope.addCart = function()
    {
        let data = {
            id : angular.element("input[name='productId']").val(),
            count : angular.element("input[name='number_product']").val(),
            _token : $('meta[name="csrf-token"]').attr('content'),
        };
        $http.post(base + 'product/addCart', data, 
        { 
            // transformRequest: angular.identity,
            // headers: {'Content-Type': undefined}
        }
        )
        .then(function(response){
            console.log(response);
            if(response.data.status == 200)
            {
                // window.location.href = base + '/admin/category'
                angular.element("#cart_count").text(response.data.count)
                toastr["success"]("Đã thêm vào giỏ hàng ")
            }else{
                
            }
        },function(response){
            alert(response.data.message)
            // toastr["error"](response.data.message)
        });
    }
    
}]);