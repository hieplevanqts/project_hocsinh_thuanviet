@extends('dashboard::layouts.master')
@section("title", "Thêm tin tức")
@section('content')
@includeIf('dashboard::layouts.page_title_common', [
    'pageTitle'=>'Danh sách',
    'title'=>'Danh sách',
    'icon'=>'<i class="fa fa-bars" aria-hidden="true"></i>',
    'link'=>asset('admin/menu/list')
    ])
@push('style')

@endpush
<div class="main-card card mb-3">
    
</div>
<div class="row" ng-controller="createMenuController">
    <div class="col-sm-3"></div>
    <form name="frmMenu" class="p-3 col-sm-6 mb-5">
        <input type="hidden" name="edit" ng-model="frmMenu.edit" value="{{ @$id }}">
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-body">
                    <div class="form-group">
                        <label for=""><b>Nhập tên</b></label>
                        <input class="form-control" placeholder="Nhập tên..." ng-model="frmMenu.name" required/>
                    </div>
                    <div class="form-group">
                        <label for=""><b>Chọn module</b></label>
                        <select name="" id="" class="form-control" ng-model="frmMenu.type" ng-init="frmMenu.type='root'" onchange="angular.element(this).scope().selectModule(event)" required>
                            <option value="root">Root</option>
                            <option value="product">Sản phẩm</option>
                            <option value="news">Tin tức</option>
                            <option value="custom">Nhập link</option>
                        </select>
                    </div>

                    <div class="form-group" ng-show="isCategory">
                        <label for=""><b>Chọn danh mục</b></label>
                        <select name="" id="dataModule" class="form-control" required ng-model="frmMenu.category" ng-change="selectCategory($event)">
                        </select>
                    </div>

                    <div class="form-group" ng-show="isLink">
                        <label for=""><b>Nhập URL</b></label>
                        <input class="form-control" placeholder="Nhập URL..." ng-model="frmMenu.url" />
                    </div>
                    <div class="form-group">
                        <label for=""><b>Chọn vị trí</b></label>
                        <select name="" id="" class="form-control" ng-model="frmMenu.position" ng-init="frmMenu.position='top'" ng-selected="frmMenu.position" required>
                            <option value="">chọn</option>
                            <option value="top">Top</option>
                            <option value="bottom">Bottom</option>
                            <option value="left">left</option>
                            <option value="right">right</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for=""><b>Chọn menu cha</b></label>
                        <select name="" id="parent_id" class="form-control">
                            <option value="">root</option>
                            <option value="1">Trang chủ</option>
                            <option value="2">Giới thiệu</option>
                            <option value="3">Sản phẩm</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="" id="" ng-model="frmMenu.status" ng-checked="isChecked">
                        <label for="">Kích hoạt</label>
                    </div>
                    <div class="form-group text-right">
                        <button ng-disabled="frmMenu.$invalid" ng-click="creatMenu($event)" class="btn btn-primary" type="button"><i class="fa {{ @$id ? 'fa-cloud-upload' : 'fa-plus-circle' }}" aria-hidden="true"></i>{{ @$id ? ' Cập nhật' : ' Thêm mới' }}</button>
                    </div>
                </div>
            </div>
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
<script src="{{ asset('js/angularjs/admin/setting.js') }}"></script>
<script src="{{ asset('js/angularjs/admin/helper.js') }}"></script>
<script src="{{ asset('js/angularjs/admin/createMenuController.js') }}"></script>




@endsection
