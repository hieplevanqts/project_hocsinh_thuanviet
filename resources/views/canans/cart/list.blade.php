@extends('canans.master', ['home'=>0])
@section('title', 'Sản phẩm trong giỏ hàng')
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
                                <li class="breadcrumb-item active product-name"><a href="#">Giỏ hàng</a></li>

                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <section id="best_seller mt-5 mb-5">
            <div class="container">


                <div class="row">
                    <div class="col-sm-10">
                        <div class="mt-5 mb-5">

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Price</th>
                                        <th scope="col" width="100">Qty</th>
                                        <th scope="col">Count</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="dataHtmlCart">
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-10">
                        <div class="mt-5">
                            <div class="text-right">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">$</span>
                                        <span class="input-group-text"><b>Total :</b> </span>
                                    </div>
                                    <input id="priceTotal" type="text" class="form-control"
                                        aria-label="Dollar amount (with dot and two decimal places)" value="{{ Cart::priceTotal() }}">
                                </div>
                                <button ng-click="orderCart()" class="btn btn-danger"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Thanh
                                    toán</button>
                                <a href="{{ asset('/') }}" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Mua
                                    thêm</a>
                            </div>
                        </div>
                    </div>
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
