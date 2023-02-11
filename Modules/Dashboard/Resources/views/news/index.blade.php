@extends('dashboard::layouts.master')
@section("title", "Danh sách tin tức")
@section('content')

@push('styles')
    <style>
        #avatarNews{
            display: flex;
            flex-direction: column;
        }
    </style>
@endpush
@includeIf('dashboard::layouts.page_title_news', [
    'list'=>true,
    'pageTitle'=>'Danh sách tin tức',
    'title'=>'Thêm mới',
    'icon'=>'<i class="fa fa-plus" aria-hidden="true"></i>',
    'link'=>asset('admin/news/add')
    ])

<div class="main-card card mb-3">
    <form action="" method="get" class="p-3">
        <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for=""><b>Tìm theo tên</b></label>
                        <input class="form-control" placeholder="Nhập từ khóa"/>
                    </div>
                    
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for=""><br></label>
                        <button type="button" class="btn btn-primary form-control"><i class="fa fa-search" aria-hidden="true"></i> Tìm kiếm</button>
                    </div>
                   
                </div>
                <div class="col-sm-4">
                    
                </div>
        </div>
    </form>
</div>
<div class="row" ng-controller="newsController">
    <div class="col-lg-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <table class="mb-0 table table-bordered">
                    <thead>
                    <tr>
                        <th width="2%"><input type="checkbox" ng-click="checkAll()"/></th>
                        <th width="8%">Hình ảnh</th>
                        <th>Tiêu đề</th>
                        <th width="13%">Action</th>
                    </tr>
                    </thead>
                    <tbody id="dataHtmListNews">
                        
                    </tbody>
                </table>
                <div class="pagination__link mt-3">
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
<script src="{{ asset('js/angularjs/admin/newsController.js') }}"></script>


@endsection
