@extends('dashboard::layouts.master')
@section("title", "Danh sách đặt hàng")
@section('content')
@includeIf('dashboard::layouts.page_title_common', [
    'pageTitle'=>'Danh sách đặt hàng',
    'title'=>'Thêm mới',
    'icon'=>'<i class="fa fa-plus" aria-hidden="true"></i>',
    'link'=>asset('admin/order')
    ])
<div class="row" ng-controller="orderController">
    <div class="col-lg-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <table class="mb-0 table table-bordered">
                    <thead>
                    <tr>
                        <th width="2%">#</th>
                        <th width="20%">Họ tên</th>
                        <th width="10%">Số điện thoại</th>
                        <th width="20%">Địa chỉ</th>
                        <th width="10%">Trạng thái</th>
                        <th width="10%">Thời gian</th>
                        <th width="2%">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $key => $item)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ @$item->fullname }}</td>
                            <td>{{ @$item->phone }}</td>
                            <td>{{ @$item->address }}</td>
                            <td>{{ @$item->status == 0 ? 'Chờ xác nhận' : 'Đã xử lý' }}</td>
                            <td>{{ date('H:i:s d/m/Y', strtotime(@$item->created_at)) }}</td>
                            <td><i ng-click="getCartByOrder($event, '{{ @$item->id }}', '{{ @$item->fullname }}')" class="btn btn-primary fa fa-cart-arrow-down" aria-hidden="true"></i></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="pagination__link mt-3">
                    
                </div>
            </div>
        </div>
    </div>
    @include('dashboard::order.modal')
</div>

@endsection

@section('script')
@parent
<script src="{{ asset('js/angularjs/angular.min.js') }}"></script>
<script src="{{ asset('js/angularjs/admin/orderController.js') }}"></script>

@endsection