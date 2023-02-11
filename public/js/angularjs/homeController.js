
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
app.controller('homeController', ['$scope', '$http', '$compile', function ($scope, $http, $compile) {

    angular.element(document).ready(function () {
        $scope.getBestSeller();
    });

    angular.element(document).keypress(function (e) {
        if (e.which == 13) {
            $scope.actionLogin();
        }
    });

    $scope.getBestSeller = function () {
        $http({
            method: 'GET',
            url: base + 'home/bestSeller',
            beforeSend: function () {

            },
            onComplete: function () {

            }
        })
            .then(function (response) {
                // console.log(response.data);

                let dataHtm = '';
                let k = 0;
                response.data.result.forEach((element, index) => {
                    let active = index == 0 ? 'product-item-active' : '';
                    let sale = '';
                    if(element.price_sale > 0 && element.price_sale < element.price)
                    {
                        sale+= `
                        <div class="percent-reduction">
                                ${Math.ceil( ((element.price - element.price_sale) / element.price) * 100)}%
                           </div>
                        `;
                    }
                    
                    dataHtm += `<div class="product-item ${active} wow fadeInUp" data-wow-delay="${k}s">
                      <a href="${base}san-pham/${element.id}/${element.slug}" class="action-product-item">
                           ${sale}
                           <img src="${base}${element.image}"
                                alt="">
                           <h3>${element.name}</h3>
                           <div class="price-product-item">
                                <div class="price-sale">${new Intl.NumberFormat('en-IN', { maximumSignificantDigits: 3 }).format(element.price_sale)}đ</div>
                                <div class="price">${new Intl.NumberFormat('en-IN', { maximumSignificantDigits: 3 }).format(element.price)}đ</div>
                           </div>
                           <button class="buy-now">Mua ngay <i class="fa fa-search" aria-hidden="true"></i></button>
                      </a>
                 </div>`
                    k += 0.5;
                });
                angular.element(".best-seller-product-list").append($compile(dataHtm)($scope));

            })
            .catch(function (err) {
                console.error(err);
            });
    }

    $scope.getListCategoryHome = function () {
        $http({
            method: 'GET',
            url: base + 'home/getListCategoryHome',
            // headers: { 'Authorization': 'Bearer ' + $('#access_token').val() }, 
            // params: { id: $scope.edit }
        }).then(function successCallback(response) {
            console.log(response.data);
            let dataHtmSale = '';
            let dataHtm = '';
            let k = 0;
            response.data.result.forEach((element, index) => {
                let dataSale = index == 0 ? `<div class="box-pecent-sale">
                <span>Khuyến mãi</span>
                <span>lên đến</span>
                <span>25%</span>
           </div>` : '';
           
                if (index < 4) {
                    dataHtmSale += `<div class="two-col-item mb-3">
                    <a href="${base}danh-muc/${element.id}/${element.slug}" class="action-two-col-item">
                         ${dataSale}
                         <img src="${base}${element.image}"
                              alt="">
                         <span class="cate-pro-title">${element.name}</span>
                    </a>
               </div>`;
                }else{
                    dataHtm += `<div class="four-col-item wow fadeInLeft" data-wow-delay="${k}s">
                    <a href="${base}danh-muc/${element.id}/${element.slug}">
                         <img src="${base}${element.image}"
                              alt="">
                         <h3>${element.name}</h3>
                    </a>
               </div>`
                }
                k+=0.5;
            });

            angular.element(".dataHtmSale").html($compile(dataHtmSale)($scope));
            angular.element(".dataHtm").html($compile(dataHtm)($scope));
        }, function errorCallback(response) {

        });
    }

    $scope.getListCategoryHome();

    $scope.getNewsHome = function()
    {
        $http({
            method: 'GET',
            url: base + 'home/getNewsHome',
            // headers: { 'Authorization': 'Bearer ' + $('#access_token').val() }, 
            // params: { id: $scope.edit }
        }).then(function successCallback(response) {
            // console.log(response.data.result.data);
            let dataHtmNewHome = '';
            response.data.result.data.forEach((element, index) => {
                dataHtmNewHome += `
                            <div class="content-left-item">
                                  <div class="item-left">
                                       <a href="${base}tin-tuc/${element.id}/${element.slug}">
                                            <img src="${base}${element.image}"
                                                 alt="">
                                       </a>
                                  </div>
                                  <div class="item-right">
                                       <a href="${base}tin-tuc/${element.id}/${element.slug}">
                                            <h3>${element.name}</h3>
                                       </a>
                                       ${element.description}
                                  </div>
                             </div>
                `;
            });
          angular.element("#dataHtmNewHome").html($compile(dataHtmNewHome)($scope))

        }, function errorCallback(response) {

        });
    }
    $scope.getNewsHome();

    $scope.actionLogin = function()
    {
        $http.post(base + 'admin/postLoginUser',{
            email : $scope.email,
            password : $scope.password,
            _token :  $('meta[name="csrf-token"]').attr('content')
        }, 
        // { transformRequest: angular.identity,
        //     headers: {'Content-Type': undefined}}
        )
        .then(function(response){
            console.log(response.data);
            if(response.status == 200)
            {
                window.location.href = base + 'admin'
            }else{
                // toastr["error"](response.data.message)
            }
        },function(response){
            // toastr["error"](response.data.message)
        });
    }

    $scope.logoutUser = function()
    {
        $http.post(base + 'admin/login',{
            // email : $scope.email,
            // password : $scope.password
            _token : $('meta[name="csrf-token"]').attr('content')
        }, 
        // { transformRequest: angular.identity,
        //     headers: {'Content-Type': undefined}}
        )
        .then(function(response){
            console.log(response.data);
            if(response.status == 200)
            {
                window.location.href = base + 'admin/login'
            }else{
                // toastr["error"](response.data.message)
            }
        },function(response){
            // toastr["error"](response.data.message)
        });
    }
    
}]);