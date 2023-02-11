@extends('dashboard::layouts.master')
@section('title', 'Thêm tin tức')
@section('content')
    @includeIf('dashboard::layouts.page_title_common', [
    'pageTitle'=>'Danh sách',
    'title'=>'Danh sách',
    'icon'=>'<i class="fa fa-bars" aria-hidden="true"></i>',
    'link'=>asset('admin/config')
    ])
    @push('style')


    @endpush
    <div ng-controller="configController">
        <form class="p-3" name="createConfig">
            <div class="row">
                <div class="col-sm-8">
                    <div class="card card-body">
                        <div class="form-group">
                            <label for=""><b>Nhập tiêu website</b></label>
                            <input class="form-control" placeholder="Nhập tiêu đề..." ng-model="createConfig.title" required/>
                        </div>
                        <div class="form-group">
                            <label for=""><b>Nhập từ khóa thẻ meta</b></label>
                            <input class="form-control" placeholder="Phân cách bởi dấu phẩy" ng-model="createConfig.keyword" required/>
                        </div>
                        <div class="form-group">
                            <label for=""><b>Nhập link video giới thiệu</b></label>
                            <input class="form-control" placeholder="Link video giới thiệu ở trang chủ" ng-model="createConfig.link_video" required/>
                        </div>
                        <div class="form-group">
                            <label for=""><b>Nhập Giới thiệu ngắn về website</b></label>
                            <textarea name="" id="" cols="30" rows="3" class="form-control" ng-model="createConfig.description" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for=""><b>Nhập địa chỉ 1</b></label>
                            <textarea name="" id="" cols="30" rows="3" class="form-control" ng-model="createConfig.address_one" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for=""><b>Nhập địa chỉ 2</b></label>
                            <textarea name="" id="" cols="30" rows="3" class="form-control" ng-model="createConfig.address_two" required></textarea>
                        </div>
                        <div class="form-group text-right">
                            <button ng-disabled="createConfig.$invalid" ng-click="creatMenu($event)" class="btn btn-primary" type="button"><i class="fa fa-cloud-upload" aria-hidden="true"></i> Cập nhật</button>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card card-body">
                        <div class="form-group">
                            <label for=""><b>Nhập số điện thoại 1</b></label>
                            <input class="form-control" placeholder="Số điện thoại 1" ng-model="createConfig.phone_one" required/>
                        </div>
                        <div class="form-group">
                            <label for=""><b>Nhập số điện thoại 2</b></label>
                            <input class="form-control" placeholder="Số điện thoại 2" ng-model="createConfig.phone_two" required/>
                        </div>
                        <div class="form-group">
                            <label for=""><b>Nhập email</b></label>
                            <input class="form-control" placeholder="Nhập email" ng-model="createConfig.email" required/>
                        </div>
                        <div class="form-group">
                            <label for=""><b>Nhập mã số thuế</b></label>
                            <input class="form-control" placeholder="Nhập MST" ng-model="createConfig.code_tax" required/>
                        </div>
                    </div>
                </div>
        </form>
    </div>
@endsection


@section('script')
    @parent
    <script src="{{ asset('js/angularjs/angular.min.js') }}"></script>
    <script src="{{ asset('js/angularjs/admin/configController.js') }}"></script>


@endsection
