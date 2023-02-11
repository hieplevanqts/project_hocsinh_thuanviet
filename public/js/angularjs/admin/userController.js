



var base = $('#base').attr('content');
app.controller('userController', ['$scope', '$http', '$compile', function ($scope, $http, $compile) {
    $scope.action = 'Thêm mới';
    $scope.avatarDefaul = base + '/images/no-image.jpg';
    angular.element(document).ready(function () {
        
    });

  $scope.deleteUser =function(e, id)
  {
    e.preventDefault();
    if(confirm("Bạn có chắc chắn xóa không ? "))
    {
        $http.post(base + '/admin/user/deleteUser', {
            id: id,
            _token :  $('meta[name="csrf-token"]').attr('content')
        },
        {
            // transformRequest: angular.identity,
            // headers: { 'Content-Type': undefined }
        })
        .then(function (response) {
            console.log(response);
            if(response.data.status == 200)
            {
                toastr["success"](response.data.message)
            }
            // window.location.href = base + '/admin/users'
            angular.element(e.target).parent().parent().hide();
        }, function (response) {
            toastr["error"](response.data.message)
        });
    }
    
  }

  $scope.checkAll = function()
  {
      $("input[name='ids']").each(function(index, value){
          var attr = $(value).attr('checked');
          if(typeof attr !== 'undefined' && attr !== false)
          {
              $(value).removeAttr("checked");
          }else{
              $(value).attr("checked", "checked");
          }
        
          
      });
  }

  
  $scope.deleteAll = function()
  {
      if(confirm("Bạn có chắc chắn xóa không ?"))
      {
        $("input[name='ids']:checked").each(function(index, element){
            $scope.deleteItem(element.value)
            $(element).parent().parent().hide();
        });
      }
     
  }

  $scope.deleteItem = function(id)
  {
      $http.post(base + '/admin/user/deleteUser', {
          _token : $('meta[name="csrf-token"]').attr('content'),
          id : id
      },
      {
          // transformRequest: angular.identity,
          // headers: { 'Content-Type': undefined }
      })
      .then(function (response) {
          console.log(response.data);
          if(response.data.status == 200)
          {
              toastr["success"](response.data.message)
          }
      }, function (response) {
          toastr["error"](response.data.message)
      });
  }

  $scope.logoutUser = function()
  {
      $http.post(base + 'admin/logout',{
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

