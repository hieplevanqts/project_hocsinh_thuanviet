@extends('canans.master', ['home'=>0])
@section("title", "Danh mục sản phẩm")
@section("home", 0)

@push('styles')
<link rel="stylesheet" href="{{ asset('css/category.css') }}">
@endpush

@section('content')

<main ng-controller="categoryController">
    <section id="breadcrumb">
         <div class="container">
              <div class="row">
                   <div class="col-md-12 col-xs-12">
                        <nav aria-label="breadcrumb">
                             <ol class="breadcrumb">
                               <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                               <li class="breadcrumb-item"><a href="#">Sản phẩm</a></li>
                               <li class="breadcrumb-item active" aria-current="page">Bồn tắm</li>
                             </ol>
                           </nav>
                   </div>
              </div>
         </div>
    </section>
    <section id="best_seller">
         <div class="container">
              <div class="row">
                   <div class="col-sm-12 col-xs-12">
                        <!-- <div class="best-seller-title">
                             <div class="best-seller-title-left">
                                  <h3>Sản phẩm bán chạy</h3>
                             </div>
                             <div class="best-seller-title-right">
                                  <a href="">
                                       <span>Xem tất cả</span>
                                       <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                  </a>
                             </div>
                        </div> -->
                        <div class="large-title-category">
                             <h3>Bồn tắm</h3>
                             <p>Thiết kế tinh xảo mang đến sự sang trọng, độc đáo kết hợp cùng công nghệ tiên tiến đáp ứng tiêu chuẩn vệ sinh cao nhất. Đỉnh cao thiết kế của bàn cầu tích hợp.</p>
                             <button>Tìm theo<i class="fa fa-angle-down" aria-hidden="true"></i></button>
                        </div>
                        <div class="best-seller-product-list">
                             <div class="product-item product-item-active wow fadeInLeft" data-wow-delay="0s">
                                  <a href="product.htm" class="action-product-item">
                                       <div class="percent-reduction">
                                            25%
                                       </div>
                                       <img src="https://1.bp.blogspot.com/-q5J97DkaESU/YA7mgxxY7sI/AAAAAAAAGL0/fur0pW15okE91oY1joQo5mN5K9M7NbBugCNcBGAsYHQ/s16000/1.jpg" alt="">
                                       <h3>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi eos maxime, autem odit est sunt molestiae optio cupiditate fugit modi.</h3>
                                       <div class="price-product-item">
                                            <div class="price-sale">1.000.000đ</div>
                                            <div class="price">1.500.000đ</div>
                                       </div>
                                       <button class="buy-now">Mua ngay <i class="fa fa-search" aria-hidden="true"></i></button>
                                  </a>
                             </div>
                             <div class="product-item wow fadeInLeft" data-wow-delay="0.5s">
                                  <a href="product.htm" class="action-product-item">
                                       <div class="percent-reduction">
                                            25%
                                       </div>
                                       <img src="https://1.bp.blogspot.com/-q5J97DkaESU/YA7mgxxY7sI/AAAAAAAAGL0/fur0pW15okE91oY1joQo5mN5K9M7NbBugCNcBGAsYHQ/s16000/1.jpg" alt="">
                                       <h3>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi eos maxime, autem odit est sunt molestiae optio cupiditate fugit modi.</h3>
                                       <div class="price-product-item">
                                            <div class="price-sale">1.000.000đ</div>
                                            <div class="price">1.500.000đ</div>
                                       </div>
                                       <button class="buy-now">Mua ngay <i class="fa fa-search" aria-hidden="true"></i></button>
                                  </a>
                             </div>
                             <div class="product-item wow fadeInLeft" data-wow-delay="1s">
                                  <a href="product.htm" class="action-product-item">
                                       <div class="percent-reduction">
                                            25%
                                       </div>
                                       <img src="https://1.bp.blogspot.com/-q5J97DkaESU/YA7mgxxY7sI/AAAAAAAAGL0/fur0pW15okE91oY1joQo5mN5K9M7NbBugCNcBGAsYHQ/s16000/1.jpg" alt="">
                                       <h3>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi eos maxime, autem odit est sunt molestiae optio cupiditate fugit modi.</h3>
                                       <div class="price-product-item">
                                            <div class="price-sale">1.000.000đ</div>
                                            <div class="price">1.500.000đ</div>
                                       </div>
                                       <button class="buy-now">Mua ngay <i class="fa fa-search" aria-hidden="true"></i></button>
                                  </a>
                             </div>
                             <div class="product-item wow fadeInLeft" data-wow-delay="1.5s">
                                  <a href="product.htm" class="action-product-item">
                                       <div class="percent-reduction">
                                            25%
                                       </div>
                                       <img src="https://1.bp.blogspot.com/-q5J97DkaESU/YA7mgxxY7sI/AAAAAAAAGL0/fur0pW15okE91oY1joQo5mN5K9M7NbBugCNcBGAsYHQ/s16000/1.jpg" alt="">
                                       <h3>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi eos maxime, autem odit est sunt molestiae optio cupiditate fugit modi.</h3>
                                       <div class="price-product-item">
                                            <div class="price-sale">1.000.000đ</div>
                                            <div class="price">1.500.000đ</div>
                                       </div>
                                       <button class="buy-now">Mua ngay <i class="fa fa-search" aria-hidden="true"></i></button>
                                  </a>
                             </div>
                             <div class="product-item wow fadeInLeft" data-wow-delay="2s">
                                  <a href="product.htm" class="action-product-item">
                                       <div class="percent-reduction">
                                            25%
                                       </div>
                                       <img src="https://1.bp.blogspot.com/-q5J97DkaESU/YA7mgxxY7sI/AAAAAAAAGL0/fur0pW15okE91oY1joQo5mN5K9M7NbBugCNcBGAsYHQ/s16000/1.jpg" alt="">
                                       <h3>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi eos maxime, autem odit est sunt molestiae optio cupiditate fugit modi.</h3>
                                       <div class="price-product-item">
                                            <div class="price-sale">1.000.000đ</div>
                                            <div class="price">1.500.000đ</div>
                                       </div>
                                       <button class="buy-now">Mua ngay <i class="fa fa-search" aria-hidden="true"></i></button>
                                  </a>
                             </div>
                             <div class="product-item wow fadeInLeft" data-wow-delay="2.5s">
                                  <a href="product.htm" class="action-product-item">
                                       <div class="percent-reduction">
                                            25%
                                       </div>
                                       <img src="https://1.bp.blogspot.com/-q5J97DkaESU/YA7mgxxY7sI/AAAAAAAAGL0/fur0pW15okE91oY1joQo5mN5K9M7NbBugCNcBGAsYHQ/s16000/1.jpg" alt="">
                                       <h3>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi eos maxime, autem odit est sunt molestiae optio cupiditate fugit modi.</h3>
                                       <div class="price-product-item">
                                            <div class="price-sale">1.000.000đ</div>
                                            <div class="price">1.500.000đ</div>
                                       </div>
                                       <button class="buy-now">Mua ngay <i class="fa fa-search" aria-hidden="true"></i></button>
                                  </a>
                             </div>
                             <div class="product-item wow fadeInLeft" data-wow-delay="3s">
                                  <a href="product.htm" class="action-product-item">
                                       <div class="percent-reduction">
                                            25%
                                       </div>
                                       <img src="https://1.bp.blogspot.com/-q5J97DkaESU/YA7mgxxY7sI/AAAAAAAAGL0/fur0pW15okE91oY1joQo5mN5K9M7NbBugCNcBGAsYHQ/s16000/1.jpg" alt="">
                                       <h3>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi eos maxime, autem odit est sunt molestiae optio cupiditate fugit modi.</h3>
                                       <div class="price-product-item">
                                            <div class="price-sale">1.000.000đ</div>
                                            <div class="price">1.500.000đ</div>
                                       </div>
                                       <button class="buy-now">Mua ngay <i class="fa fa-search" aria-hidden="true"></i></button>
                                  </a>
                             </div>
                             <div class="product-item wow fadeInLeft" data-wow-delay="3.5s">
                                  <a href="product.htm" class="action-product-item">
                                       <div class="percent-reduction">
                                            25%
                                       </div>
                                       <img src="https://1.bp.blogspot.com/-q5J97DkaESU/YA7mgxxY7sI/AAAAAAAAGL0/fur0pW15okE91oY1joQo5mN5K9M7NbBugCNcBGAsYHQ/s16000/1.jpg" alt="">
                                       <h3>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi eos maxime, autem odit est sunt molestiae optio cupiditate fugit modi.</h3>
                                       <div class="price-product-item">
                                            <div class="price-sale">1.000.000đ</div>
                                            <div class="price">1.500.000đ</div>
                                       </div>
                                       <button class="buy-now">Mua ngay <i class="fa fa-search" aria-hidden="true"></i></button>
                                  </a>
                             </div>
                             <div class="product-item wow fadeInLeft" data-wow-delay="4s">
                                  <a href="product.htm" class="action-product-item">
                                       <div class="percent-reduction">
                                            25%
                                       </div>
                                       <img src="https://1.bp.blogspot.com/-q5J97DkaESU/YA7mgxxY7sI/AAAAAAAAGL0/fur0pW15okE91oY1joQo5mN5K9M7NbBugCNcBGAsYHQ/s16000/1.jpg" alt="">
                                       <h3>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi eos maxime, autem odit est sunt molestiae optio cupiditate fugit modi.</h3>
                                       <div class="price-product-item">
                                            <div class="price-sale">1.000.000đ</div>
                                            <div class="price">1.500.000đ</div>
                                       </div>
                                       <button class="buy-now">Mua ngay <i class="fa fa-search" aria-hidden="true"></i></button>
                                  </a>
                             </div>
                             <div class="product-item wow fadeInLeft" data-wow-delay="4.5s">
                                  <a href="product.htm" class="action-product-item">
                                       <div class="percent-reduction">
                                            25%
                                       </div>
                                       <img src="https://1.bp.blogspot.com/-q5J97DkaESU/YA7mgxxY7sI/AAAAAAAAGL0/fur0pW15okE91oY1joQo5mN5K9M7NbBugCNcBGAsYHQ/s16000/1.jpg" alt="">
                                       <h3>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi eos maxime, autem odit est sunt molestiae optio cupiditate fugit modi.</h3>
                                       <div class="price-product-item">
                                            <div class="price-sale">1.000.000đ</div>
                                            <div class="price">1.500.000đ</div>
                                       </div>
                                       <button class="buy-now">Mua ngay <i class="fa fa-search" aria-hidden="true"></i></button>
                                  </a>
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

<script src="{{ asset('js/angularjs/categoryController.js') }}"></script>
    
@endsection