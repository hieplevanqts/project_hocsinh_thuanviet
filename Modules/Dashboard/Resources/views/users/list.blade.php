@extends('dashboard::layouts.master')
@php
    use Illuminate\Support\Facades\Config;
    $heading = $title = "Danh sách thành viên";
$menu = [
        ['label' => 'Danh sách', 'url' => url('category/index'),'options' => ['class' => 'btn btn-info']],
        ['label' => 'Thêm mới','url' => url('category/create'),'options' => ['class' => 'btn btn-info']]
    ];
$breadcrumb =[
    ['label' => "Trang chủ", 'url' => url('/admin')],
    ['label' => $heading, 'url' => url('/admin/user/add')],
    ['label' => "Danh sách", 'url' => ''],

];
Config::set(['app.breadcrumb'=>$breadcrumb]);

@endphp
@section('title', 'Danh sách thành viên')


@section('content')
@include('dashboard::layouts.page_title_user', [
    'pageTitle'=>'Thêm thành viên', 
    'title'=>'Thêm thành viên', 
    'icon'=>'<i class="fa fa-plus-circle" aria-hidden="true"></i>', 
    'link'=>'/admin/user/add'
    ])
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

        <form action="{{ route('district.index') }}" method="get" id="district_filter">
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
            <table class="table table-bordered table-striped table-hover table-sm">
                <thead>
                   <tr height="45">
                      <th width="5%"><input type="checkbox" ng-click="checkAll()" /></th>
                      <th>Avatar</th>
                      <th>Name</th>
                      <th>Actions</th>
                   </tr>

                </thead>
                <tbody>
                    @if ($list)
                        @foreach ($list as $key => $item)
                        @php
                            if(@$_GET['page']){
                                $limit = @$_GET['page']-1 == 0 ? 0 : @$_GET['page']-1;
                            }else{
                                $limit = 0;
                            }

                        @endphp
                                <tr>
                                    <td><input type="checkbox" name="ids" value="{{ @$item->id }}"/></td>
                                    {{-- {{ @$limit*20 + $key + 1 }} --}}
                                    <td><img src="{{ asset(@$item->avatar) }}" width="60" height="60"/></td>
                                    <td>{{ @$item->name }}</td>
                                    <td>
                                        <a href="{{ route('user.edit', ["id"=>@$item->id]) }}" class="text-white"><i class="btn btn-warning btn-xs fas fa-edit"></i></a>
                                        <i ng-click="deleteUser($event, {{ @$item->id }})" class="btn btn-danger btn-xs fa fa-trash-o" aria-hidden="true"></i>
                                    </td>
                                </tr>
                        @endforeach
                   @endif
                </tbody>
                <tfoot>

                </tfoot>
             </table>
             <br>
            <div class="text-center pagination__link"> {{ @$list->appends(['_token'=>@$_GET['_token'], 'province' => @$_GET['province'], 'name' => @$_GET['name']])->links() }}</div>
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
<script src="{{ asset('js/angularjs/admin/userController.js') }}"></script>
 


@endsection
