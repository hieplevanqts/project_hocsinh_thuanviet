@extends('dashboard::layouts.master')
@section('title', 'Chỉnh sửa quyền')
@section('content')
    @includeIf('dashboard::layouts.page_title_category', [
    'pageTitle'=>'Chỉnh sửa quyền',
    'title'=>'Danh sách',
    'icon'=>'<i class="fa fa-bars" aria-hidden="true"></i>',
    'link'=>asset('admin/role/list')
    ])


    <div class="content-wrapper">
        <div class="content mt-3">
            <div class="container-fluid">
                <div class="row">
                    <form action="{{ route('role.update', ['id' => $role->id]) }}" method="post" enctype="multipart/form-data" style="width: 100%;" class="">
                        <div class="col-md-12 mb-3">
                            @csrf
                            <div class="card card-body">
                                <div class="form-group">
                                    <label>Tên vai trò</label>
                                    <input type="text" class="form-control" name="type"
                                        placeholder="Nhập type ..viết liền không dấu." value="{{ @$role->type }}">
    
                                </div>
                                <div class="form-group">
                                    <label>Mô tả vai trò</label>
                                    <input class="form-control" name="name" placeholder="Tên quyền.." value="{{ @$role->name }}">
                                </div>
                            </div>
                           
                        </div>
                        <div class="col-md-12">
                            <div class="row ml-1 mb-2">
                                <button class="btn btn-warning text-white" type="button"><input type="checkbox"  class="checkall" > Tất cả</button>
                            </div>
                            <div class="row">
                                @foreach($permissionsParent as $permissionsParentItem)
                                <div class="mb-3 col-md-4">
                                    <div class="card-header bg-primary text-white">
                                        <input type="checkbox" value="" class="mr-2 checkbox_wrapper">
                                        Module {{ $permissionsParentItem->name }}
                                    </div>
                                    <div class="card card-body">
                                        @foreach($permissionsParentItem->permissionsChildrent as $permissionsChildrentItem)
                                            <div class="">
                                                <h5 class="card-title">
                                                    <input 
                                                    {{ $pemissionsChecked->contains('id', $permissionsChildrentItem->id) ? 'checked' : '' }}
                                                    type="checkbox" 
                                                    name="permission_id[]" 
                                                    value="{{ $permissionsChildrentItem->id }}" 
                                                    class="mr-2 checkbox_childrent">
                                                    {{ $permissionsChildrentItem->name }}
                                                </h5>
                                            </div>
                                            @endforeach
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-sm-12 text-right">
                                <button type="submit" class="btn btn-primary mr-3"><i class="fa fa-cloud-upload" aria-hidden="true"></i> Cập nhật</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('script')
    @parent
    <script src="{{ asset('js/angularjs/admin/role/add.js') }}"></script>
    {{-- <script src="{{ asset('js/angularjs/angular.min.js') }}"></script> --}}


@endsection
