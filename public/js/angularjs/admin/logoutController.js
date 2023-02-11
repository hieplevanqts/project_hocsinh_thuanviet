
var app = angular.module('canansAdmin', []);

var base = angular.element('#base').attr('content');
app.controller('logoutController', ['$scope', '$http', '$compile', function ($scope, $http, $compile) {
 


  $scope.logoutUser = function()
  {
      
      $http.post(base + 'admin/logout',{
          // email : $scope.email,
          // password : $scope.password
          _token :  angular.element('#base').val()
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