
var app = angular.module('canans', []);
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



var base = $('#base').val();
app.controller('categoryController', ['$scope', '$http', '$compile', function ($scope, $http, $compile) {

    angular.element(document).ready(function () {
        // alert(1)
    });

    $scope.getProductByCategory = function()
    {
        let category_id = angular.element("input[name='category_id']").val();
        $http({
            method: 'GET',
            url: base + 'category/listProduct/' + category_id,
            // headers: { 'Authorization': 'Bearer ' + $('#access_token').val() }, 
            // params: { id: $scope.edit }
        }).then(function successCallback(response) {
            console.log(response.data);
            let dataHtml = '';
            let i=0;
            response.data.result.forEach((element, index) => {
               dataHtml += `<div class="product-item product-item-active wow fadeInLeft" data-wow-delay="${i}s">
                                <a href="${base}san-pham/${element.id}/${element.slug}" class="action-product-item">
                                        <div class="percent-reduction">
                                            25%
                                        </div>
                                        <img src="${base}${element.image}" alt="">
                                        <h3>${element.name}</h3>
                                        <div class="price-product-item">
                                            <div class="price-sale">${element.price_sale}đ</div>
                                            <div class="price">${element.price}đ</div>
                                        </div>
                                        <button class="buy-now">Mua ngay <i class="fa fa-search" aria-hidden="true"></i></button>
                                </a>
                            </div>`;

                            i += 0.5;
            });
            angular.element(".best-seller-product-list").html($compile(dataHtml)($scope))
          
        }, function errorCallback(response) {

        });
    }

    $scope.getProductByCategory();
    
}]);