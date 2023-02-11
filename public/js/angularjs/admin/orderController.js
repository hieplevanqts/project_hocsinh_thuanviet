var app = angular.module('canansAdmin', []);
app.config(function ($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});

var base = $('#base').attr('content');
app.controller('orderController', ['$scope', '$http', '$compile', function ($scope, $http, $compile) {


$scope.getCartByOrder = function(element, orderId, fullName)
{
    let titleModalCart = 'Đơn hàng : '+ fullName;
    $http({ 
        method: 'GET', 
        url: base + '/admin/order/cart', 
        headers: { 'Authorization': 'Bearer ' + $('#access_token').val() }, 
        params: { order_id: orderId } 
    }).then(function successCallback(response) {
        $("#modalCart").addClass('show')
        $("#modalCart").css('display', 'block');
        $('body').addClass("modal-open")
        $("#titleModalCart").text(titleModalCart);
        $("input[name='orderId']").val(orderId);
        console.log(response.data);
        let tr = '';
        let total = 0;
        response.data.result.forEach((element, key) => {
            total += element.price * element.qty 
            tr += `<tr>
                        <th scope="row">${key+1}</th>
                        <td><img src="${base}/${element.image}" width="30" height="30"></td>
                        <td>${element.name}</td>
                        <td>${new Intl.NumberFormat().format(element.price)}<sup>đ</sup></td>
                        <td>${element.qty}</td>
                        <td>${new Intl.NumberFormat().format(element.price * element.qty)}<sup>đ</sup></td>
                    </tr>`;
        });
        tr += `<tr>
                    <th scope="row">#</th>
                    <td colspan="3"></td>
                    <td><b>Tổng</b></td>
                    <td>${new Intl.NumberFormat().format(total)}<sup>đ</sup></td>
                </tr>`;
        $("#htmTr").html($compile(tr)($scope));
    }, function errorCallback(response) {

    });


}

$scope.closeModal = function()
{
    $("#modalCart").removeClass('show')
    $("#modalCart").css('display', 'none');
    $('body').removeClass("modal-open")
}

$scope.updateStatus = function()
{
    let orderId = $("input[name='orderId']").val();
    $http({ 
        method: 'GET', 
        url: base + '/admin/order/status/update', 
        headers: { 'Authorization': 'Bearer ' + $('#access_token').val() }, 
        params: { id: orderId } 
    }).then(function successCallback(response) {
        if(response.data.status == 200)
        {
            toastr["success"](response.data.message);
            $scope.closeModal();
        }else{
            toastr["error"](response.data.message);
            $scope.closeModal();
        }
    }, function errorCallback(response) {
        toastr["error"](response.data.message);
        $scope.closeModal();
    });
}

$scope.printOrder = function () 
{
  let divToPrint=document.getElementById('modalCart');
  let newWin=window.open('','Print-Window');
  newWin.document.open();
  newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');
  newWin.document.close();
  setTimeout(function(){newWin.close();},10);
}

}]);