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
                        <input type="hidden" name="category_id" value="{{ @$id }}">
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