
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

app.directive('photoFile', function ($parse) {
    return {
        restrict: 'A',
        link: function (scope, element, attributes) {
            var set = $parse(attributes.photoFile);
            element.bind('change', function () {
                set.assign(scope, element[0].files);
                scope.$apply();
            })
        }
    }
});




app.directive('ckEditor', function() {
    return {
      require: '?ngModel',
      link: function(scope, elm, attr, ngModel) {
        let url= base +'/ckfinder/';
        var ck = CKEDITOR.replace(elm[0], {
            height: 200,
            title: '',
            extraPlugins : 'codesnippet',
            codeSnippet_theme : 'school_book',
            codeSnippet_languages : {
                javascript: 'JavaScript',
                php: 'PHP',
                apache: 'Apache',
                bash: 'Bash',
                coffeescript: 'CoffeeScript',
                cpp: 'C++',
                cs: 'C#',
                css: 'CSS',
                diff: 'Diff',
                html: 'HTML',
                http: 'HTTP',
                ini: 'INI',
                java: 'Java',
                json: 'JSON',
                makefile: 'Makefile',
                markdown: 'Markdown',
                nginx: 'Nginx',
                objectivec: 'Objective-C',
                perl: 'Perl',
                python: 'Python',
                ruby: 'Ruby',
                sql: 'SQL',
                vbscript: 'VBScript',
                xhtml: 'XHTML',
                xml: 'XML'
            },
            // Configure your file manager integration. This example uses CKFinder 3 for PHP.
            filebrowserBrowseUrl: url + 'ckfinder.html',
            filebrowserImageBrowseUrl: url + 'ckfinder.html?type=Images',
            filebrowserUploadUrl: url + 'core/connector/php/connector.php?command=QuickUpload&type=Files',
            filebrowserImageUploadUrl: url + 'core/connector/php/connector.php?command=QuickUpload&type=Images'
        });

  
        if (!ngModel) return;
  
        ck.on('instanceReady', function() {
          ck.setData(ngModel.$viewValue);
        });
  
        function updateModel() {
            scope.$apply(function() {
                ngModel.$setViewValue(ck.getData());
            });
        }
  
        ck.on('change', updateModel);
        ck.on('key', updateModel);
        ck.on('dataReady', updateModel);
        ck.on('paste', updateModel);
        ck.on('selectionChange', updateModel);
  
        ngModel.$render = function(value) {
          ck.setData(ngModel.$viewValue);
        };
      }
    };
  });



var base = $('#base').attr('content');
app.controller('newsController', ['$scope', '$http', '$compile', function ($scope, $http, $compile) {

    


    $scope.action = 'Thêm mới';
    $scope.avatarDefaul = base + '/images/no-image.jpg';
    angular.element(document).ready(function () {
        let url= base +'/ckfinder/';
        CKEDITOR.replace('description', {})
        CKEDITOR.replace('ckeditor_content', {
            height: 200,
            title: '',
            extraPlugins : 'codesnippet',
            codeSnippet_theme : 'school_book',
            codeSnippet_languages : {
                javascript: 'JavaScript',
                php: 'PHP'
            },
            // Configure your file manager integration. This example uses CKFinder 3 for PHP.
            filebrowserBrowseUrl: url + 'ckfinder.html',
            filebrowserImageBrowseUrl: url + 'ckfinder.html?type=Images',
            filebrowserUploadUrl: url + 'core/connector/php/connector.php?command=QuickUpload&type=Files',
            filebrowserImageUploadUrl: url + 'core/connector/php/connector.php?command=QuickUpload&type=Images'
        });
    
        $scope.$watch('ckeditor_content', function () {
            CKEDITOR.instances.ckeditor_content.setData($scope.ckeditor_content);
        });
    
        $scope.$watch('description', function () {
            CKEDITOR.instances.description.setData($scope.description);
        });
    });

    $scope.listNews = function () {
        $http({
            method: 'GET',
            url: base + '/admin/news/list',
            headers: { 'Authorization': 'Bearer ' + $('#access_token').val() },
            params: {}
        })
            .then(function successCallback(response) {
                console.log(response.data.result.data);
                let dataHtmListNews = '';
                response.data.result.data.forEach((element, index) => {
                    dataHtmListNews += `<tr>
                <th scope="row"><input type="checkbox" name="ids" value="${element.id}"/></th>
                <td><img src="${base}/${element.image}" width="60" height="60"/></td>
                <td>${element.name}</td>
          
                <td>
                    <a href="${base}/tin-tuc/${element.id}/${element.slug}" class=""><i class="btn btn-primary fa fa-eye" aria-hidden="true"></i></a>
                    <a href="javascript:void(0)" class=""><i ng-click="updateNews(${element.id})" class="btn btn-warning fa fa-pencil-square-o" aria-hidden="true"></i></a>
                    <a href="javascript:void(0)" class=""><i ng-click="deleteNewsItem($event, ${element.id})" class="btn btn-danger fa fa-trash" aria-hidden="true"></i></a>
                </td>
            </tr>`;
                });
                angular.element("#dataHtmListNews").html($compile(dataHtmListNews)($scope));


            }, function errorCallback(err) {
                console.log(err);
            });
    }
    $scope.listNews();

    $scope.createNews = function (e) {
        
        e.preventDefault();
        let data = new FormData();
        data.append('name', $scope.name);
        // data.append('description', angular.element("#description").val());
        // data.append('content', angular.element("#ckeditor_content").val());

        data.append('description', $scope.description);
        data.append('content', $scope.ckeditor_content);

        if ($scope.avatar) {
            data.append('image', $scope.avatar[0]);
        }

        if ($("input[name='edit']").val() != null) {
            data.append('old_image', $("input[name='old_image']").val());
            data.append('edit', $("input[name='edit']").val());
        }

        data.append('_token', $('meta[name="csrf-token"]').attr('content'));

        $http.post(base + '/admin/news/createNews', data,
            {
                transformRequest: angular.identity,
                headers: { 'Content-Type': undefined }
            })
            .then(function (response) {
                console.log(response);
                if (response.data.status == 200) {
                    toastr["success"](response.data.message)
                }
                window.location.href = base + '/admin/news'
            }, function (response) {
                toastr["error"](response.data.message)
            });
    }

    $scope.deleteNewsItem = function (e, id) {
        e.preventDefault();
        if (confirm("Bạn có chắn chắn xóa không ?")) {
            $http.post(base + '/admin/news/deleteNews', {
                _token: $('meta[name="csrf-token"]').attr('content'),
                id: id
            },
                {
                    //  transformRequest: angular.identity,
                    //  headers: { 'Content-Type': undefined }
                })
                .then(function (response) {
                    console.log(response);
                    if (response.data.status == 200) {
                        toastr["success"](response.data.message)
                    }
                    $(e.target).parent().parent().parent().hide();
                }, function (response) {
                    toastr["error"](response.data.message)
                });
        }

    }

    $scope.checkAll = function () {
        $("input[name='ids']").each(function (index, value) {
            var attr = $(value).attr('checked');
            if (typeof attr !== 'undefined' && attr !== false) {
                $(value).removeAttr("checked");
            } else {
                $(value).attr("checked", "checked");
            }


        });
    }

    $scope.deleteAll = function () {
        if (confirm("Bạn có chắc chắn xóa không ?")) {
            $("input[name='ids']:checked").each(function (index, element) {
                $scope.deleteItem(element.value)
                $(element).parent().parent().hide();
            });
        }

    }

    $scope.deleteItem = function (id) {
        $http.post(base + '/admin/news/deleteNews', {
            _token: $('meta[name="csrf-token"]').attr('content'),
            id: id
        },
            {
                // transformRequest: angular.identity,
                // headers: { 'Content-Type': undefined }
            })
            .then(function (response) {
                console.log(response.data);
                if (response.data.status == 200) {
                    toastr["success"](response.data.message)
                }
            }, function (response) {
                toastr["error"](response.data.message)
            });
    }

    $scope.deleteProductItem = function (element, id) {
        if (confirm("Bạn có chắc chắn xóa không ?")) {
            $(element.target).parent().parent().hide();
            $scope.deleteItem(id)

        }
    }

    $scope.updateNews = function (id) {
        window.location.href = base + '/admin/news/edit/' + id
    }

    $scope.updateNewsItem = function (id) {
        $http({
            method: 'GET',
            url: base + '/admin/news/updateNews',
            headers: { 'Authorization': 'Bearer ' + $('#access_token').val() },
            params: { id: $("input[name='edit']").val() }
        })
            .then(function successCallback(response) {
                console.log("response.data.result", response.data.result);
                let imgLink = response.data.result.image ? base + "/" + response.data.result.image : $scope.avatarDefaul;
                angular.element("#avatarNews img").attr("src", imgLink)
                angular.element("input[name='old_image']").val(response.data.result.image);
                angular.element("input[name='name']").val(response.data.result.name);
                if (angular.element("input[name='edit']").val() != null) {
                    $scope.action = 'Cập nhật';
                } else {
                    $scope.action = 'Thêm mới';
                }
                $scope.name = response.data.result.name;
                $scope.description = response.data.result.description;
                $scope.ckeditor_content = response.data.result.content;
            }, function errorCallback(err) {
                console.log(err);
            });
    }

    $scope.updateNewsItem();

    



}]);