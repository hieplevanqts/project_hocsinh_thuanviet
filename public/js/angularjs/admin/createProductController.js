
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

app.directive('ckEditor', function () {
    return {
        require: '?ngModel',
        link: function (scope, elm, attr, ngModel) {
            let url = base + '/ckfinder/';
            var ck = CKEDITOR.replace(elm[0], {
                height: 200,
                title: '',
                extraPlugins: 'codesnippet',
                codeSnippet_theme: 'school_book',
                codeSnippet_languages: {
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

            ck.on('instanceReady', function () {
                ck.setData(ngModel.$viewValue);
            });

            function updateModel() {
                scope.$apply(function () {
                    ngModel.$setViewValue(ck.getData());
                });
            }

            ck.on('change', updateModel);
            ck.on('key', updateModel);
            ck.on('dataReady', updateModel);
            ck.on('paste', updateModel);
            ck.on('selectionChange', updateModel);

            ngModel.$render = function (value) {
                ck.setData(ngModel.$viewValue);
            };
        }
    };
});



var base = $('#base').attr('content');
app.controller('createProductController', ['$scope', '$http', '$compile', function ($scope, $http, $compile) {
    $scope.formCreateProduct = {
        'category': {},
        'arrImg': [],
    }
    $scope.formCreateProduct.name = '';
    $scope.formCreateProduct.slug = '';
    $scope.formCreateProduct.description = '';
    $scope.formCreateProduct.detail = '';
    $scope.formCreateProduct.title_seo = '';
    $scope.formCreateProduct.keyword_seo = '';
    $scope.formCreateProduct.tags = '';
    $scope.formCreateProduct.description_seo = '';
    // $scope.formCreateProduct.status = '';
    // $scope.formCreateProduct.home = '';
    // $scope.formCreateProduct.focus = '';
    // $scope.formCreateProduct.hot = '';
    $scope.formCreateProduct.price_sale = '';
    $scope.formCreateProduct.price = '';
    $scope.formCreateProduct.code = '';

    angular.element(document).ready(function () {
        $scope.getListCategoryCreateProduct();
        var success = angular.element("input[name='success']").val();
        var error = angular.element("input[name='error']").val();
        if (success != '') {
            toastr["success"](success)
        }
        if (error != '') {
            toastr["error"](error)
        }
    });

    $scope.getListCategoryCreateProduct = function () {
        $http({
            method: 'GET',
            url: base + '/admin/category/getCategory',
            // headers: { 'Authorization': 'Bearer ' + $('#access_token').val() }, 
            // params: { id: $scope.edit } 
        }).then(function successCallback(response) {
            let dataHtmCategoryCreateProduct = '';
            localStorage.setItem("allCategory", JSON.stringify(response.data.result));
            response.data.result.forEach((element, index) => {
                dataHtmCategoryCreateProduct += ` <div class="form-check mb-1">
            <input class="form-check-input" type="checkbox" value="${element.id}" name="category[]" id="${element.id}">
            <label class="form-check-label" for="defaultCheck${index}">${element.name}</label>
        </div>`
            });
            if ($("input[name='edit']").val() == null) {
                angular.element("#dataHtmCategoryCreateProduct").html($compile(dataHtmCategoryCreateProduct)($scope));
            }
        }, function errorCallback(response) {
            console.log(response.data);
        });
    }

    $scope.createProduct = function (e) {
        let arrCategory = [];
        let altImg = [];
        let arrImg = [];
        let arrSize = [];
        let arrTmp = [];
        if ($scope.formCreateProduct.name == '') {
            toastr["error"]("Chưa nhập tên sản phẩm !");
        } else if ($scope.formCreateProduct.description == '') {
            toastr["error"]("Chưa nhập mô tả sản phẩm !");
        } else if ($scope.formCreateProduct.detail == '') {
            toastr["error"]("Chưa nhập nội dung sản phẩm !");
        } else if ($scope.formCreateProduct.price == '') {
            toastr["error"]("Chưa nhập giá sản phẩm !");
        } else {
            angular.element("input[name='category[]']:checked").each(function (index, element) {
                arrCategory.push(element.value);
            });
            $scope.formCreateProduct.category = arrCategory;

            angular.element("input[name='alts[]']").each(function (index, element) {
                altImg.push(element.value)
            })
            angular.element("input[name='images[]']").each(function (index, element) {
                arrImg.push(element.value)
            })
            angular.element("input[name='size[]']").each(function (index, element) {
                arrSize.push(element.value)
            })

            altImg.forEach((element, index) => {
                arrTmp[index] = {
                    'alt': altImg[index],
                    'image': arrImg[index],
                    'size': arrSize[index]
                }
            });
            $scope.formCreateProduct.arrImg = arrTmp;
            var data = new FormData();
            data.append('name', $scope.formCreateProduct.name);
            data.append('slug', $scope.formCreateProduct.slug);
            data.append('description', $scope.formCreateProduct.description);
            data.append('detail', $scope.formCreateProduct.detail);
            data.append('title_seo', $scope.formCreateProduct.title_seo);
            data.append('keyword_seo', $scope.formCreateProduct.keyword_seo);
            data.append('tags', $scope.formCreateProduct.tags);
            data.append('description_seo', $scope.formCreateProduct.description_seo);
            if ($scope.formCreateProduct.image) {
                data.append('image', $scope.formCreateProduct.image[0]);
            } else {
                data.append('image', null);
            }
            data.append('category', $scope.formCreateProduct.category);
            data.append('status', angular.element("#status").is(':checked') ? 1 : 0);
            data.append('home', angular.element("#home").is(':checked') ? 1 : 0);
            data.append('focus', angular.element("#focus").is(':checked') ? 1 : 0);
            data.append('hot', angular.element("#hot").is(':checked') ? 1 : 0);
            data.append('price_sale', $scope.formCreateProduct.price_sale);
            data.append('price', $scope.formCreateProduct.price);
            data.append('code', $scope.formCreateProduct.code);
            data.append('countImg', arrTmp.length);
            data.append('edit', $("input[name='edit']").val());
            data.append('old_image', $scope.formCreateProduct.old_image);
            arrTmp.forEach((element, index) => {
                data.append('arrImg' + index, JSON.stringify(element));
            });

            $http.post(base + '/admin/product/create', data,
                {
                    transformRequest: angular.identity,
                    headers: { 'Content-Type': undefined }
                })
                .then(function (response) {
                    console.log(response.data);
                    if (response.data.status == 200) {
                        window.location.href = base + '/admin/product'
                    } else {
                        toastr["error"](response.data.message)
                    }
                }, function (response) {
                    toastr["error"](response.data.message)
                });
        }

    }

    $scope.getProductEdit = function () {

        $http({
            method: 'GET',
            url: base + '/admin/product/edit/item/' + angular.element("input[name='edit']").val(),
            headers: { 'Authorization': 'Bearer ' + $('#access_token').val() },
            params: {}
        })
            .then(function successCallback(response) {
                console.log('response.data.result', response.data.result);
                if (response.data.status == 200) {
                    let avatar = '';
                    if (response.data.result != '') {
                        avatar += base + '/' + response.data.result.image;
                    } else {
                        avatar += 'https://via.placeholder.com/640x480.png/00dd99?text=consequatur';
                    }

                    angular.element(".avt-product").attr("src", avatar);
                    let arrCategoryId = [];
                    response.data.result.product_category.forEach(element => {
                        arrCategoryId.push(element.category_id);
                    });
                    console.log(arrCategoryId);

                    // angular.element(".form-check .form-check-input").each(function(index, el){
                    //     alert(1)
                    //     console.log(el.target);
                    // });
                    let dataHtmCategoryCreateProduct = '';
                    let allCategory = localStorage.getItem("allCategory");
                    allCategory = JSON.parse(allCategory);
                    console.log(allCategory);
                    allCategory.forEach((element, index) => {
                        let checked = arrCategoryId.indexOf(element.id) >= 0 ? "checked" : "";
                        dataHtmCategoryCreateProduct += ` <div class="form-check mb-1">
                    <input class="form-check-input" type="checkbox" value="${element.id}" name="category[]" id="${element.id}" ${checked}>
                    <label class="form-check-label" for="defaultCheck${index}">${element.name}</label>
                </div>`;
                    });
                    angular.element("#dataHtmCategoryCreateProduct").html($compile(dataHtmCategoryCreateProduct)($scope));

                    $scope.formCreateProduct.name = response.data.result.name;
                    $scope.formCreateProduct.slug = response.data.result.slug;
                    $scope.formCreateProduct.description = response.data.result.description;
                    $scope.formCreateProduct.detail = response.data.result.content;
                    $scope.formCreateProduct.title_seo = response.data.result.title_seo;
                    $scope.formCreateProduct.keyword_seo = response.data.result.keyword_seo;
                    // $scope.formCreateProduct.tags = ;
                    $scope.formCreateProduct.description_seo = response.data.result.description_seo;
                    // $scope.formCreateProduct.status = response.data.result.status;
                    // $scope.formCreateProduct.home = response.data.result.home;
                    // $scope.formCreateProduct.focus = response.data.result.focus;
                    // $scope.formCreateProduct.hot = response.data.result.hot;
                    response.data.result.focus == 1 ? angular.element("#focus").attr("checked", "checked") : '';
                    response.data.result.home == 1 ? angular.element("#home").attr("checked", "checked") : '';
                    response.data.result.status == 1 ? angular.element("#status").attr("checked", "checked") : '';
                    response.data.result.hot == 1 ? angular.element("#hot").attr("checked", "checked") : '';

                    $scope.formCreateProduct.price_sale = response.data.result.price_sale;
                    $scope.formCreateProduct.price = response.data.result.price;
                    $scope.formCreateProduct.code = response.data.result.code;
                    $scope.formCreateProduct.old_image = response.data.result.image;
                }
            }, function errorCallback(err) {
                console.log(err);
            });
    }

    $scope.getProductEdit();

    $scope.updateStatus = function (e, product_id) {
        console.log(product_id);
        $http.post(base + '/admin/product/updateStatus', {
            _token: $('meta[name="csrf-token"]').attr('content'),
            product_id: product_id
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
        $http.post(base + '/admin/product/deleteItem', {
            _token: $('meta[name="csrf-token"]').attr('content'),
            product_id: id
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

    $scope.getAllCategory = function () {
        let edit = angular.element("input[name='edit']").val();
        if (edit == '') {
            $http({
                method: 'GET',
                url: base + '/categories',
                headers: { 'Authorization': 'Bearer ' + $('#access_token').val() },
                // params: { id: $scope.edit } 
            }).then(function successCallback(response) {
                console.log('response', response);
                if (response.data.status == 200) {
                    let allCategory = response.data.result;
                    let dataHtmCategoryCreateProduct = '';
                    allCategory.forEach((element, index) => {
                        dataHtmCategoryCreateProduct += ` <div class="form-check mb-1">
                    <input class="form-check-input" type="checkbox" value="${element.id}" name="category[]" id="${element.id}">
                    <label class="form-check-label" for="defaultCheck${index}">${element.name}</label>
                </div>`;
                    });
                    angular.element("#dataHtmCategoryCreateProduct").html($compile(dataHtmCategoryCreateProduct)($scope));
                }
            }, function errorCallback(response) {

            });
        }
    }

    $scope.getAllCategory();

}]);