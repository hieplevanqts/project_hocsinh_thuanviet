@extends('dashboard::layouts.master')
@section('title', 'Danh sách quyền')
@section('content')
    @includeIf('dashboard::layouts.page_title_category', [
    'pageTitle'=>'Danh sách quyền',
    'title'=>'Thêm mới',
    'icon'=>'<i class="fa fa-plus" aria-hidden="true"></i>',
    'link'=>asset('admin/role/add')
    ])


    <div class="content-wrapper card card-body">

        <div class="content mt-3">
            <div class="container-fluid">
                <div class="row">
                  
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Type</th>
                                <th scope="col">Tên</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($roles as $role)

                                <tr>
                                    <th scope="row">{{ @$role->id }}</th>
                                    <td>{{ @$role->type }}</td>
                                    <td>{{ @$role->name }}</td>

                                    <td>
                                        <a href="{{ route('role.edit', ['id'=>@$role->id]) }}"
                                           class="btn btn-default">Edit</a>
                                        <a href=""
                                           data-url=""
                                           class="btn btn-danger action_delete">Delete</a>

                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                  

                </div>
            </div>
        </div>

    </div>

    @endsection


    @section('script')
        @parent
        <script src="{{ asset('js/angularjs/angular.min.js') }}"></script>
       
    
    @endsection

