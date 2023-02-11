@extends('dashboard::layouts.master')
@php
    use Illuminate\Support\Facades\Config;
    $heading = $title = "Danh sách thành viên";
$menu = [
        ['label' => 'Danh sách', 'url' => url('admin/user'),'options' => ['class' => 'btn btn-info']],
        ['label' => 'Thêm mới','url' => url('admin/user/add'),'options' => ['class' => 'btn btn-info']]
    ];
$breadcrumb =[
    ['label' => "Trang chủ", 'url' => url('/admin')],
    ['label' => $heading, 'url' => url('/admin/user')],
    ['label' => "Danh sách", 'url' => '/admin/users'],

];
Config::set(['app.breadcrumb'=>$breadcrumb]);

@endphp
@section('title', 'Chỉnh sửa thông tin thành viên')


@section('content')
@include('dashboard::layouts.page_title_user', ['pageTitle'=>'Danh sách thành viên'])

@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
       
    </style>
@endpush
<div class="row text-right mb-3">
    <div class="col-md-12">


        @if (session('mess'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" id="alert_success">
            {{ session('mess') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert" id="alert_success">
            {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        <form action="" id="district_filter">
            @csrf
            <div class="card card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="Tìm theo tên" value="{{ @$_GET['name'] }}" onchange="district_filter()">
                        </div>
                        <div class="form-group">
                            <select name="province" id="" class="form-control" onchange="district_filter()">
                                <option value="">Chọn tỉnh</option>
                                @if (@$provinces)
                                    @foreach (@$provinces as $item)
                                        <option value="{{ $item->id }}" {{ @$item->id==@$_GET['province'] ? 'selected' : '' }}>{{ $item->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary form-control"><i class="fa fa-search" aria-hidden="true"></i> Tìm kiếm</button>
                        </div>
                    </div>
                    <div class="col-md-4">

                    </div>
            </div>
        </div>

    </form>
    </div>
    {{-- <div class="col-md-4">
        <button class="btn btn-primary" onclick="addDistrict()"><i class="fas fa-plus"></i> Thêm</button>
    </div> --}}

</div>
    <div class="card card-outline card-info" id="district_main" ng-controller="userController">
        <div class="card-body p-3">
            
            <form class="p-3" action="{{ route('user.postEdit') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="edit" value="{{ @$edit->id }}">
                <div class="row">
                        <div class="col-sm-8">
                            <div class="form-group">
                                <label for=""><b>Nhập họ tên</b></label>
                                <input class="form-control" placeholder="Nhập họ tên..." name="name" value="{{ @$edit->name }}"/>
                            </div>
                            <div class="form-group">
                                <label for=""><b>Nhập Email</b></label>
                                <input class="form-control" placeholder="Nhập email..." name="email" value="{{ @$edit->email }}"/>
                            </div>
                            <div class="form-group">
                                <label for=""><b>Nhập mật khẩu</b></label>
                                <input type="password" class="form-control" placeholder="Nhập mật khẩu..." name="password" value=""/>
                            </div>
                            <div class="form-group">
                                <label for=""><b>Nhập lại mật khẩu</b></label>
                                <input type="password" class="form-control" placeholder="Nhập lại mật khẩu..." name="re-password" value=""/>
                            </div>
                            <div class="form-group">
                                <label for=""><b>Chọn quyền</b></label>
                                <select name="roleId[]" id="roleId" class="form-control choose-permission" multiple>
                                    <option value="">Chọn</option>
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}" {{ $rolesOfUser->contains('id', $role->id) ? 'selected' : '' }}>{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group text-right">
                                <label for=""><b></b></label>
                                <button type="submit" class="btn btn-primary"><i class="fa fa-cloud-upload" aria-hidden="true"></i> Cập nhật</button>
                            {{--  ng-click="createUser($event)"  --}}
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group" id="avatarNews">
                                <label for=""><b></b></label>
                                <img src="<% avatarDefaul %>" width="200" height="200" class="mb-3" id="img_display"/>
                                <input type="file" photo-file="avatar" name="avatar" onchange="renderImg(this)" id="img"/>
                                {{-- angular.element(this).scope().changeImg(event) --}}
                                <input type="hidden" name="old_image" value="">
                            </div>
                        </div>
                        
                </div>
            </form>

        </div>
    </div>
    @include('local::local.district.modal')
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
<script src="{{ asset('js/angularjs/admin/helper.js') }}"></script>
<script src="{{ asset('js/angularjs/admin/setting.js') }}"></script>
<script src="{{ asset('js/angularjs/admin/userController.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{ asset('js/angularjs/admin/user/select2Init.js') }}"></script>


@endsection
