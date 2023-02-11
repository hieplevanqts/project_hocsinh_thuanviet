@extends('canans.master', ['home' => 1])
@section("title", "Dịch Vụ Giúp Việc Chuyên Nghiệp THUẦN VIỆT !!!")

@section('content')
    @include('canans.banner.index')
    <section id="content_contact_index" class="clearfix">
        <section id="content" class="clearfix">
            <div class="container">
                <div class="box_page">
                    <ol class="breadcrumb txt_web_color">
                        <li><a href="/">Trang chủ</a></li>
                        <li class='active'>Liên hệ</li>
                    </ol>
                    <div class="node-content">

                        <div class="title_bar_center text-uppercase">
                            <h1>Liên hệ</h1>
                        </div>
                        <div class="form-checkout">
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="content_company_info_contact">
                                        <ul>
                                            <li class="text-uppercase">Dịch Vụ Giúp Việc Chuyên Nghiệp Hải Anh!!!
                                            </li>
                                            <li class="clearfix">
                                                <i class="icon-dia-chi"></i>
                                                <span>Tân Bình, TP HCM</span>
                                            </li>
                                            <li class="clearfix">
                                                <i class="icon-sodienthoai"></i>
                                                <span><a href="tel:0336888648">0336.888.648 -
                                                            0336.888.648</a></span>
                                            </li>
                                            <li class="clearfix">
                                                <i class="icon-mail"></i>
                                                <span><a
                                                        href="mailto:vanhiep2008@gmail.com">vanhiep2008@gmail.com</a></span>
                                            </li>
                                        </ul>
                                    </div>
                                    <form name="frm_checkout" role="form" method="post">
                                        <div class="form-group clearfix">
                                            <label for="inputFullName">Họ tên(<span class="red">*</span>):</label>
                                            <input type="text" id="name" name="name" class="form-control"
                                                   placeholder="Họ tên" />
                                        </div>
                                        <div class="form-group clearfix">
                                            <label for="inputEmail">Email:</label>
                                            <input type="email" id="email" name="email" class="form-control"
                                                   placeholder="Email" />
                                        </div>

                                        <div class="form-group clearfix">
                                            <label for="inputPhone">Điện thoại(<span class="red">*</span>):</label>
                                            <input type="text" id="phone" name="phone" class="form-control"
                                                   placeholder="Điện thoại" />
                                        </div>

                                        <div class="form-group clearfix">
                                            <label for="inputAddress">Địa chỉ:</label>
                                            <input type="text" id="address" name="address" class="form-control"
                                                   placeholder="Địa chỉ" />
                                        </div>

                                        <div class="form-group clearfix">
                                            <label for="inputPhone">Tiêu đề:</label>
                                            <input type="text" id="subject" name="subject" class="form-control"
                                                   placeholder="Tiêu đề" />
                                        </div>

                                        <div class="form-group clearfix">
                                            <label for="inputNote">Yêu cầu khác:</label>
                                            <textarea id="comment" name="comment" class="form-control"
                                                      placeholder="Yêu cầu khác" rows="5"></textarea>
                                        </div>

                                        <div class="form-group clearfix">
                                            <input type="submit" class="btn btn-success" value="Gửi">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="title_bar_center text-uppercase">
                            <h2>Bản đồ</h2>
                        </div>
                        <div class="map_code">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
@endsection
