@extends('dashboard::layouts.master')
@section('title', 'Danh mục sản phẩm')
@section('content')
    @includeIf('dashboard::layouts.page_title_category', [
    'pageTitle'=>'Danh mục sản phẩm',
    'title'=>'Thêm mới',
    'icon'=>'<i class="fa fa-plus" aria-hidden="true"></i>',
    'link'=>asset('admin/category/add')
    ])

    <div class="main-card card mb-3">
        <form action="" method="get" class="p-3" style="display:none">
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for=""><b>Tìm theo tên</b></label>
                        <input class="form-control" placeholder="Nhập từ khóa" />
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
                        <button type="button" class="btn btn-primary form-control"><i class="fa fa-search"
                                aria-hidden="true"></i> Tìm kiếm</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="row" ng-controller="categoryController">
        <div class="col-lg-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <table class="mb-0 table table-bordered">
                        <thead>
                            <tr>
                                <th width="2%"><input type="checkbox"></th>
                                
                                <th>Tên sản phẩm</th>
                                <th width="10%">Trạng thái</th>
                                <th width="13%">Action</th>
                            </tr>
                        </thead>
                        <tbody id="list_category">
                            
                          
                        </tbody>
                    </table>
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
    <script src="{{ asset('js/angularjs/admin/categoryController.js') }}"></script>

@endsection