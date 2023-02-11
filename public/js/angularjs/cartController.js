
var app = angular.module('canans', []);
app.config(function ($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
})




var base = $('#base').val();
app.controller('cartController', ['$scope', '$http', '$compile', function ($scope, $http, $compile) {

    angular.element(document).ready(function () {
        // alert(1)
    });

    $scope.getListCart = function () {
        $http({
            method: 'GET',
            url: base + 'product/cart/list',
            // headers: { 'Authorization': 'Bearer ' + $('#access_token').val() }, 
            params: { _token: $('meta[name="csrf-token"]').attr('content'), }
        }).then(function successCallback(response) {
            console.log(response.data);
            let carts = response.data.result;
            // carts = Object.carts;
            let dataHtmlCart = '';
            let i=1;
            $.each(carts, function(index, element) {
                console.log(element);
                dataHtmlCart += ` <tr>
                <th scope="row">${i}</th>
                <td>${element.name}</td>
                <td>${new Intl.NumberFormat().format(element.price)}<sup>đ</sup></td>
                <td class="qty">
                        <input class="form-control" value="${element.qty}" />
                        <i ng-click="updateQty($event)" value="${element.qty}" data-i="${i}" data-rowId="${index}" data-id="${element.id}" class="fa fa-caret-up" aria-hidden="true"></i>
                        <i ng-click="updownQty($event)" value="${element.qty}" data-i="${i}" data-rowId="${index}" data-id="${element.id}" class="fa fa-caret-down" aria-hidden="true"></i>
                </td>
                <td>${new Intl.NumberFormat().format(element.subtotal)}<sup>đ</sup></td>
                <td><i ng-click="deleteItemCart($event)" data-rowId="${index}" data-id="${element.id}" class="fa fa-trash btn btn-danger btn-xs" aria-hidden="true"></i></td>
            </tr>`;
            i++
             });
            // carts.forEach((element, index) => {
               
            // });
            angular.element("#dataHtmlCart").html($compile(dataHtmlCart)($scope));
        }, function errorCallback(response) {

        });
    }
    $scope.getListCart();

    $scope.updateQty = function(e)
    {
        let val = $(e.target).attr("value");
        let price = $(e.target).parent().parent().children("td:nth-child(5)")
        val = parseInt(val);
        val += 1; 
        console.log(e);
        let rowId = $(e.target).attr("data-rowId");
        let id = $(e.target).data("id");
        console.log(rowId+" "+id);
        $scope.updateQtyItem(val, rowId, price)
        $(e.target).parent().children("input").val(val);
        $(e.target).parent().children("i.fa-caret-up").attr("value", val);
        $(e.target).parent().children("i.fa-caret-down").attr("value", val);
    }

    $scope.updownQty = function(e)
    {
        let val = $(e.target).attr("value");
        let price = $(e.target).parent().parent().children("td:nth-child(5)")
        val = parseInt(val);
        val -= 1; 
        let rowId = $(e.target).attr("data-rowId");
        let id = $(e.target).data("id");
        console.log(rowId+" "+id);
        $scope.updateQtyItem(val, rowId, price)
        $(e.target).parent().children("input").val(val);
        $(e.target).parent().children("i.fa-caret-up").attr("value", val);
        $(e.target).parent().children("i.fa-caret-down").attr("value", val);
        
        
    }

    $scope.updateQtyItem = function(qty, rowId, price)
    {
        
        $http.post(base + 'product/cart/updateQtyItem',{
            qty:qty,
            rowId:rowId,
            _token : $('meta[name="csrf-token"]').attr('content'),
        }, 
        { 
            // transformRequest: angular.identity,
            // headers: {'Content-Type': undefined}
        })
        .then(function(response){
            console.log(response.data.subtotal);
            if(response.data.status == 200)
            {
                angular.element("#cart_count").text(response.data.count);
                angular.element("#priceTotal").val(response.data.priceTotal)
                $(price).text(response.data.subtotal);
                toastr["success"]("Cập nhật giỏ hàng thành công !")
            }else{
                toastr["error"](response.data.message)
            }
        },function(response){
            toastr["error"](response.data.message)
        });
    }

    $scope.deleteItemCart = function(e)
    {
        if(confirm("Bạn có chắc chắn xóa không ?"))
        {
            let rowId = $(e.target).attr("data-rowId");
            $http.post(base + 'product/cart/deleteItemCart',{
                rowId:rowId,
                _token : $('meta[name="csrf-token"]').attr('content'),
            }, 
            { 
                // transformRequest: angular.identity,
                // headers: {'Content-Type': undefined}
            })
            .then(function(response){
                console.log(response.data);
                if(response.data.status == 200)
                {
                    angular.element("#cart_count").text(response.data.count)
                    $scope.getListCart()
                    angular.element("#priceTotal").val(response.data.priceTotal)
                    toastr["success"]("Xóa thành công !")
                }else{
                    toastr["error"](response.data.message)
                }
            },function(response){
                toastr["error"](response.data.message)
            });
        }
        
    }

    $scope.orderCart = function()
    {
        angular.element("#orderCart").modal("show")
    }

    $scope.postOrderCart = function()
    {
        if(angular.element("#fullname").val() == '')
        {
            toastr["error"]("Vui lòng nhập họ tên !")
        }else if(angular.element("#phone").val() == '')
        {
            toastr["error"]("Vui lòng nhập số điện thoại liên hệ !")
        }else if(angular.element("#address").val() == '')
        {
            toastr["error"]("Vui lòng nhập địa chỉ nhận hàng !")
        }else{
            $http.post(base + 'product/cart/order',{
                fullname : angular.element("#fullname").val(),
                phone: angular.element("#phone").val(),
                address : angular.element("#address").val(),
                _token : $('meta[name="csrf-token"]').attr('content'),
            }, 
            { 
                // transformRequest: angular.identity,
                // headers: {'Content-Type': undefined}
            })
            .then(function(response){
                console.log(response.data);
                if(response.data.status == 200)
                {
                    angular.element("#fullname").val('');
                    angular.element("#phone").val('');
                    angular.element("#address").val('');
                    angular.element("#orderCart").modal("hide");
                    angular.element("#cart_count").text("0")
                    toastr["success"]("Gửi thông tin thành công !")
                    $scope.getListCart();
                }else{
                    toastr["error"](response.data.message)
                }
            },function(response){
                toastr["error"](response.data.message)
            });
        }
      
    }
}]);