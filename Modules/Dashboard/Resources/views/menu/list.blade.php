@extends('dashboard::layouts.master')
@section('title', 'Danh sách menu')
@section('content')
    @includeIf('dashboard::layouts.page_title_common', [
    'pageTitle'=>'Danh sách menu',
    'title'=>'Thêm mới',
    'icon'=>'<i class="fa fa-plus" aria-hidden="true"></i>',
    'link'=>asset('admin/menu')
    ])
    @push('styles')

        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/nestable2/1.6.0/jquery.nestable.min.css">
        <link rel="stylesheet" href="{{ asset('css/admin/menu/list.css') }}">
    @endpush
    <div class="main-card card mb-3">

    </div>
    <div class="row" ng-controller="createMenuController">
        <div class="col-lg-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <div class="dd" id="dd" data-url="{{ asset('admin/menu/sort') }}">
                        <ol class="dd-list">
                            @foreach ($menus as $item)
                                @include('categories.select_box.list_item', ['item'=>$item])
                            @endforeach
                        </ol>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
    @parent
    <script src="{{ asset('js/angularjs/admin/helper.js') }}"></script>
    <script src="{{ asset('js/angularjs/angular.min.js') }}"></script>
    <script src="{{ asset('js/angularjs/admin/setting.js') }}"></script>
    <script src="{{ asset('js/angularjs/admin/createMenuController.js') }}"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/nestable2/1.6.0/jquery.nestable.min.js"></script>

<script>
    $('#dd').nestable({ /* config options */ }).on('change', function(){
                let data = $('#dd').nestable('serialize')
                try {
                    $.ajax({
                    type: "post",
                    url: $('#dd').data('url'),
                    data: {
                        data: data,
                        _token : $('meta[name="csrf-token"]').attr("content")
                    },
                    success: function (response) {
                        console.log(response);
                        if(response.status==200)
                        {
                            toastr["success"](response.message);
                        }else{
                            toastr["error"](response.message)
                        }
                    }
                });
                } catch (error) {
                    console.log(error);
                }
               
            });
</script>


@endsection
