@extends('dashboard::layouts.master')
@section("title", "Danh sách sản phẩm")
@section('content')
@includeIf('dashboard::layouts.page_title', [
    'pageTitle'=>'Danh sách sản phẩm',
    'title'=>'Thêm mới',
    'icon'=>'<i class="fa fa-plus" aria-hidden="true"></i>',
    'link'=>asset('admin/product/add')
    ])

<div class="main-card card mb-3"  style="display:none">
    <form action="" method="get" class="p-3">
        <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for=""><b>Tìm theo tên</b></label>
                        <input class="form-control" placeholder="Nhập từ khóa"/>
                    </div>
                    <div class="form-group">
                        <label for=""><b>Danh mục</b></label>
                        <select name="category" id="" class="form-control">
                            <option value="">Chọn</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for=""><b>Thương hiệu</b></label>
                        <select name="brand" id="" class="form-control">
                            <option value="">Chọn</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for=""><b>Trạng thái</b></label>
                        <select name="status" id="" class="form-control">
                            <option value="">Chọn</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for=""><br></label>
                        <button type="button" class="btn btn-primary form-control"><i class="fa fa-search" aria-hidden="true"></i> Tìm kiếm</button>
                    </div>
                </div>
        </div>
    </form>
</div>
<div class="row" ng-controller="createMenuController">
    <div class="col-lg-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <table class="mb-0 table table-bordered">
                    <thead>
                    <tr>
                        <th width="2%"><input type="checkbox" ng-click="checkAll()"/></th>
                        <th width="8%">Hình ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th width="10%">Trạng thái</th>
                        <th width="13%">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach (@$list as $key => $value)
                            @php
                                if(@$_GET['page']){
                                    $limit = @$_GET['page']-1 == 0 ? 0 : @$_GET['page']-1;
                                }else{
                                    $limit = 0;
                                }

                            @endphp
                            <tr>
                                <th scope="row"><input type="checkbox" name="ids" value="{{ @$value->id }}"/></th>
                                <td><img src="{{ asset(@$value->image) }}" width="60" height="60"/></td>
                                <td>{{ @$value->name }}</td>
                                <td>
                                    <div class="custom-control custom-switch">
                                        <input ng-click="updateStatus($event, {{ @$value->id }})" type="checkbox" class="custom-control-input" id="customSwitches{{ @$limit*20 + $key + 1 }}" {{ @$value->status == 1 ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="customSwitches{{ @$limit*20 + $key + 1 }}"></label>
                                    </div>
                                </td>
                                <td>
                                    <a href="{{ asset('san-pham/'.@$value->id.'/'.@$value->slug) }}" class=""><i class="btn btn-primary fa fa-eye" aria-hidden="true"></i></a>
                                    <a href="{{ asset('admin/product/edit/'.@$value->id) }}" class=""><i class="btn btn-warning fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                    <i ng-click="deleteProductItem($event, {{ @$value->id }})" class="btn btn-danger fa fa-trash" aria-hidden="true"></i>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="pagination__link mt-3">
                    {{ @$list->appends(['_token'=>@$_GET['_token'], 'province' => @$_GET['province'], 'district' => @$_GET['district'], 'name' => @$_GET['name']])->links() }}
                </div>
            </div>
        </div>
    </div>
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
<script src="{{ asset('js/angularjs/admin/createProductController.js') }}"></script>


@endsection
