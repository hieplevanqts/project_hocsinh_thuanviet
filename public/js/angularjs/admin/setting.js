// author : Le Van Hiep - vanhiep.net

var app = angular.module('canansAdmin', []);
app.config(function ($interpolateProvider, $httpProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
    $httpProvider.useApplyAsync(true);
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

var base = $('#base').attr('content');