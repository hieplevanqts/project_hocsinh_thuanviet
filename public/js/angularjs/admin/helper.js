// author : Le Van Hiep - vanhiep.net

function renderCategoryOption(arr, str='', htm ='', $scope, short="short", parent="")
    {
        arr.forEach((element, index) => {
            // if(angular.element("input[name='edit']").val().length > 0 && angular.element("input[name='edit']").val() == parent)
            // {
            //     arr.splice(index, 1);
            // }
            let seleted = element.id == parent ? "selected" : "";
            let name = element.parent_id == null ? '<b>'+str+element.name+'</b>' : str+'+ '+element.name;
            let newStr = '';
            htm += `<option value="${element.id}" ${seleted}>${name}</option>`;
            if(element.categories && element.categories.length > 0)
            {
                if(short == "short")
                {
                    newStr += '&emsp;&emsp;';
                }else{
                    newStr += '&emsp;&emsp;&emsp;&emsp;';
                }
                newStr += str;
                let newHtm = renderCategoryOption(element.categories, newStr, '', $scope, "short", parent)
                htm += newHtm;
                newHtm = '';
            }
        });
        return htm;
}


function renderImg ($scope, input) {
    const preview = document.querySelector('#img_display');
    const file = document.querySelector('#img').files[0];
    const reader = new FileReader();

    reader.addEventListener("load", function () {
        preview.src = reader.result;
    }, false);

    if (file) {
        reader.readAsDataURL(file);
    }
}

function getDateApi($scope, url) {
    $http = angular.injector(["ng"]).get("$http");
    $http({ 
        method: 'GET', 
        url: url, 
        // headers: { 'Authorization': 'Bearer ' + $('#access_token').val() }, 
        // params: { id: $scope.edit } 
        }).then(function successCallback(response) {
            return response.data;
        }, function errorCallback(response) {
            return response.data;
        });
}