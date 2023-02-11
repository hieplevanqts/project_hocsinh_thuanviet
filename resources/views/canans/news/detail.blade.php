@extends('canans.master', ['home'=>0])
@section('title', @$news->name)
@section('home', 0)

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/product.css') }}">
@endpush

@section('content')
    <main ng-controller="cartController">
        <section id="breadcrumb">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ asset('/') }}">Trang chủ</a></li>
                                <li class="breadcrumb-item"><a href="{{ asset('tin-tuc') }}">Tin tức</a></li>
                                <li class="breadcrumb-item active product-name"><a href="#">{{ @$news->name }}</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <section id="best_seller mt-5 mb-5">
            <div class="container">


                <div class="row">
                   {!! @$news->content !!}
                </div>
            </div>
        </section>
        @include('canans.cart.modal')
    </main>


@endsection

@section('script')
    @parent
    <script src="{{ asset('js/slick.js') }}"></script>
    <script src="{{ asset('js/wow.min.js') }}"></script>
    <script src="{{ asset('js/myScripts.js') }}"></script>
    <script src="{{ asset('js/angularjs/cartController.js') }}"></script>


@endsection
