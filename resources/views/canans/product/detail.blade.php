@extends('canans.master', ['home'=>0])
@section('title', @$product->name)
@section('home', 0)

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/product.css') }}">
    <style>
        .content p img {
            width: 100% !important;
            height: auto !important;
        }

    </style>
@endpush

@section('content')

    <main ng-controller="productController">
        <section id="breadcrumb">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ asset('/') }}">Trang chủ</a></li>
                                <li class="breadcrumb-item"><a href="#">Sản phẩm</a></li>
                                <li class="breadcrumb-item"><a href="#">Bồn tắm</a></li>
                                <li class="breadcrumb-item active product-name" aria-current="page">NEOREST XH II CW993VA
                                    TCF993WA T53P100VR</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <section id="best_seller">
            <input type="hidden" name="productId" value="{{ @$id }}">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-xs-6">
                        <div class="detail-slider clearfix">

                            {{-- <div class="sider-full"></div> --}}
                            <div class="clearfix sider-full">
                                <div>
                                    <a><img src="{{ asset(@$product->image) }}" /></a>
                                </div>
                                @foreach ($images as $image)
                                    <div>
                                        <a><img src="{{ asset(@$image->url) }}" /></a>
                                    </div>
                                @endforeach

                            </div>
                            <div class="previews">
                                <div>
                                    <a><img src="{{ asset(@$product->image) }}" /></a>
                                </div>
                                @foreach ($images as $image)
                                    <div>
                                        <a><img src="{{ asset(@$image->url) }}" /></a>
                                    </div>
                                @endforeach

                            </div>
                        </div>

                    </div>
                    <div class="col-sm-6 col-xs-6" id="detail_tab">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#home">Kỹ thuật</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#menu1">Tính năng</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#menu2">Tài liệu đính kèm</a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane container active mt-3" id="home">
                                {!! QrCode::size(200)->generate(Request::url()) !!}
                                {{-- <div class="form-group mt-3">
                                    <b>Kích thước : </b> <span>700D x 388W x 734H MM</span>
                                </div>
                                <div class="form-group">
                                    <b>Kích thước : </b> <span>700D x 388W x 734H MM</span>
                                </div>
                                <div class="form-group">
                                    <b>Kích thước : </b> <span>700D x 388W x 734H MM</span>
                                </div>
                                <div class="form-group">
                                    <b>Kích thước : </b> <span>700D x 388W x 734H MM</span>
                                </div>
                                <div class="form-group">
                                    <b>Kích thước : </b> <span>700D x 388W x 734H MM</span>
                                </div>
                                <div class="form-group">
                                    <b>Kích thước : </b> <span>700D x 388W x 734H MM</span>
                                </div>
                                <div class="form-group">
                                    <b>Kích thước : </b> <span>700D x 388W x 734H MM</span>
                                </div>
                                <div class="form-group">
                                    <b>Kích thước : </b> <span>700D x 388W x 734H MM</span>
                                </div> --}}
                            </div>
                            <div class="tab-pane container fade" id="menu1">
                                <ul class="mt-3">
                                    <li>Men sứ chống dính, chống bám bẩn CEFIONTECT</li>
                                    <li>Men sứ chống dính, chống bám bẩn CEFIONTECT</li>
                                    <li>Men sứ chống dính, chống bám bẩn CEFIONTECT</li>
                                </ul>
                            </div>
                            <div class="tab-pane container fade" id="menu2">
                                <div class="form-group mt-3">
                                    <img src="https://vn.toto.com/skin/frontend/rwd/totonew/images/icons/pdf.png" width="60"
                                        height="60" alt="">
                                    <span>Thông số kỹ thuật</span>
                                </div>
                                <div class="form-group">
                                    <img src="https://vn.toto.com/skin/frontend/rwd/totonew/images/icons/pdf.png" width="60"
                                        height="60" alt="">
                                    <span>Thông số kỹ thuật</span>
                                </div>
                                <div class="form-group">
                                    <img src="https://vn.toto.com/skin/frontend/rwd/totonew/images/icons/pdf.png" width="60"
                                        height="60" alt="">
                                    <span>Thông số kỹ thuật</span>
                                </div>
                                <div class="form-group">
                                    <img src="https://vn.toto.com/skin/frontend/rwd/totonew/images/icons/pdf.png" width="60"
                                        height="60" alt="">
                                    <span>Thông số kỹ thuật</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" id="number_product">
                            <b>Số lượng : </b>
                            <input type="text" name="number_product" id="" class="form-control" value="1">
                            <input type="hidden" name="productId" value="{{ @$product->id }}">
                            <i ng-click="countMinus()" class="fa fa-minus" aria-hidden="true"></i>
                            <i ng-click="countPlus()" class="fa fa-plus" aria-hidden="true"></i>
                        </div>
                        <div class="buy-product">
                            <button class="btn btn-danger"><i class="fa fa-plus" aria-hidden="true"></i> Mua
                                ngay</button>
                            <button ng-click="addCart()" class="btn btn-primary"><i class="fa fa-shopping-cart"
                                    aria-hidden="true"></i> Thêm vào
                                giỏ hàng</button>
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-sm-8 col-xs-12">
                        <div class="description">
                            <h3>Mô tả</h3>
                            {!! @$product->description !!}
                        </div>
                        <div class="content mt-5">
                            <h3>Nội dung</h3>
                            {!! @$product->content !!}
                        </div>
                    </div>
                    <div class="col-sm-4 col-xs-12">
                        <div class="left-content-product">
                            @foreach ($news as $item)
                                @php
                                    $i = 0.5;
                                @endphp
                                <div class="left-item wow fadeInUp" data-wow-delay="{{ $i }}s">
                                    <a href="{{ asset('tin-tuc/' . @$item->id . '/' . @$item->slug) }}"><img
                                            src="{{ asset(@$item->image) }}" alt="{{ @$item->name }}"></a>
                                    <div class="left-item-info">
                                        <h3><a
                                                href="{{ asset('tin-tuc/' . @$item->id . '/' . @$item->slug) }}">{{ @$item->name }}</a>
                                        </h3>
                                        <p class="date-create">Ngày :
                                            <i>{{ date('d/m/Y', strtotime(@$item->created_at)) }}</i></p>
                                    </div>
                                </div>
                                @php
                                    $i += 0.5;
                                @endphp
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-xs-12">
                        <div id="product_same" class="mt-5">
                            <h3 class="p-title mb-3">Sản phẩm tương tự</h3>
                            <div class="product-same-wraper">
                                @foreach ($same as $item)
                                    @php
                                        $i = 0.5;
                                    @endphp
                                    <div class="same-item wow fadeInRight" data-wow-delay="{{ @$i }}s">
                                        <img src="{{ asset(@$item->image) }}" alt="">
                                        <h3><a
                                                href="{{ asset('san-pham/' . @$item->id . '/' . @$item->slug) }}">{{ @$item->name }}</a>
                                        </h3>
                                        <div class="same-item-price">
                                            <span class="price-sale">{{ number_format(@$item->price) }}đ</span>
                                            <span class="price-stand">{{ number_format(@$item->price_sale) }}đ</span>
                                        </div>
                                    </div>
                                    @php
                                        $i += 0.5;
                                    @endphp
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>

@endsection

@section('script')
    @parent

    <script src="{{ asset('js/slick.js') }}"></script>
    <script src="{{ asset('js/wow.min.js') }}"></script>
    <script src="{{ asset('js/myScripts.js') }}"></script>
    <script src="{{ asset('js/angularjs/productController.js') }}"></script>


@endsection
