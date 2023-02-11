@extends('dashboard::layouts.master')
@section('title', 'Danh mục sản phẩm')
@section('content')
    @includeIf('dashboard::layouts.page_title_category', [
    'pageTitle'=>'Danh mục sản phẩm',
    'title'=>'Danh sách',
    'icon'=>'<i class="fa fa-bars" aria-hidden="true"></i>',
    'link'=>asset('admin/category')
    ])


    <div class="row" ng-controller="categoryController">
        <div class="col-sm-3"></div>
        <form action="" method="post" class="col-sm-6 card card-body mb-5">
            <input type="hidden" name="edit" value="{{ @$id }}">
            <div class="form-group">
                <label for="" class="mr-2">Tên danh mục </label>
                <input type="text" name="name" id="" class="form-control" ng-model="name" placeholder="Nhập tên danh mục...">
            </div>
            
            <div class="form-group">
                <label for="" class="mr-2">Danh mục cha </label>
                <select name="parent_id" id="parent_id" class="form-control" ng-model="parent_id"></select>
            </div>
            <div class="form-group">
                <img src="/images/no-image.jpg" id="imgCategory" width="200" height="200">
            </div>
            <div class="form-group">
                <input type="file" name="name" id="img" class="" photo-file="image" onchange="angular.element(this).scope().changeImg(event)">
                <input type="hidden" name="old_image" value="">
            </div>
            <div class="form-group">
                <label for="" class="mr-2">Kích hoạt </label>
                <input type="checkbox" name="status" id="status" ng-model="status" ng-checked="isChecked">
            </div>
            <div class="form-group text-right">
                <button ng-click="createCategory($event)" type="button" class="btn btn-primary"><i
                        class="fa {{ @$id ? 'fa-cloud-upload' : 'fa-plus' }}" aria-hidden="true"></i> {{ @$id ? 'Cập nhật' : 'Thêm mới' }}</button>
            </div>
        </form>
        <div class="col-sm-3"></div>
    </div>
@endsection



@section('script')
    @parent
    <script src="{{ asset('js/angularjs/angular.min.js') }}"></script>
    <script src="{{ asset('js/angularjs/angular-animate.min.js') }}"></script>
    <script src="{{ asset('js/angularjs/angular-aria.min.js') }}"></script>
    <script src="{{ asset('js/angularjs/angular-cookies.min.js') }}"></script>
    <script src="{{ asset('js/angularjs/angular-loader.min.js') }}"></script>
    <script src="{{ asset('js/angularjs/angular-message-format.min.js') }}"></script>
    <script src="{{ asset('js/angularjs/angular-messages.min.js') }}"></script>
    <script src="{{ asset('js/angularjs/angular-parse-ext.min.js') }}"></script>
    <script src="{{ asset('js/angularjs/angular-route.min.js') }}"></script>
    <script src="{{ asset('js/angularjs/angular-sanitize.min.js') }}"></script>
    <script src="{{ asset('js/angularjs/angular-touch.min.js') }}"></script>
    <script src="{{ asset('js/angularjs/admin/categoryController.js') }}"></script>

@endsection
