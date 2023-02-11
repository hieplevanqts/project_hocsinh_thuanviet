@extends('canans.master', ['home' => 1])
@section("title", "Dịch Vụ Giúp Việc Chuyên Nghiệp THUẦN VIỆT !!!")

@section('content')
    @include('canans.banner.index')
<section id="content_news_menu" class="clearfix">
    <section id="content" class="clearfix">
        <div class="container">
            <div class="content_main">
                <ol class="breadcrumb txt_web_color">
                    <li><a href="/">Trang chủ</a></li>
                    <li class="active">Giới Thiệu</li>
                </ol>
                <div class="node-content">
                    <div class="title txt_web_color">
                        <h1>DỊCH VỤ GIÚP VIỆC THUẦN VIỆT</h1>
                    </div>
                    <p class="time">Đăng lúc 15:10:20 19/03/2020</p>
                    <div class="like_button hidden-xs">
                        <div class="fb-like fb_iframe_widget" data-href="http://giupviechaianh.com/gioi-thieu/"
                             data-layout="standard" data-action="like" data-show-faces="true" data-share="true"
                             fb-xfbml-state="rendered"
                             fb-iframe-plugin-query="action=like&amp;app_id=&amp;container_width=0&amp;href=http%3A%2F%2Fgiupviechaianh.com%2Fgioi-thieu%2F&amp;layout=standard&amp;locale=vi_VN&amp;sdk=joey&amp;share=true&amp;show_faces=true">
                                    <span style="vertical-align: bottom; width: 450px; height: 28px;"><iframe
                                            name="fc928eb0c951e8" width="1000px" height="1000px"
                                            data-testid="fb:like Facebook Social Plugin"
                                            title="fb:like Facebook Social Plugin" frameborder="0"
                                            allowtransparency="true" allowfullscreen="true" scrolling="no"
                                            allow="encrypted-media"
                                            src="https://www.facebook.com/v2.12/plugins/like.php?action=like&amp;app_id=&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fx%2Fconnect%2Fxd_arbiter%2F%3Fversion%3D46%23cb%3Df107c1c3ebb6584%26domain%3Dgiupviechaianh.com%26is_canvas%3Dfalse%26origin%3Dhttp%253A%252F%252Fgiupviechaianh.com%252Ffbab99689b2688%26relation%3Dparent.parent&amp;container_width=0&amp;href=http%3A%2F%2Fgiupviechaianh.com%2Fgioi-thieu%2F&amp;layout=standard&amp;locale=vi_VN&amp;sdk=joey&amp;share=true&amp;show_faces=true"
                                            class=""
                                            style="border: none; visibility: visible; width: 450px; height: 28px;"></iframe></span>
                        </div>
                    </div>
                    <div class="summary_detail"></div>
                    <div class="article-content">
                        <div class="row row-solid">
                            <div class="dich-vu-chinh">
                                <div class="gioi-thieu-dich-vu-chinh">
                                    <h2 style="text-align: center;"><span style="font-size: 28px;">CÁC DỊCH VỤ
                                                    CHÍNH</span></h2>

                                    <div class="text-center">
                                        <div class="is-divider divider clearfix"
                                             style="max-width: 177px; height: 3px; display: block; background-color: rgba(0,0,0,0.1); margin: 1.5em 0 2em; width: 100%; margin-left: auto; margin-right: auto;">
                                            &nbsp;</div>
                                    </div>

                                    <div class="col-md-3 col-solid">
                                        <div class="col-inner">
                                            <div class="icon-box-img" style="width: 90px;"><img alt=""
                                                                                                height="128" src="{{asset('images/VjKbKIJ.jpg')}}"
                                                                                                width="128"></div>

                                            <div class="box-text last-reset">
                                                <p style="margin-bottom: 1.5em;"><strong>GIÚP VIỆC THEO
                                                        GIỜ</strong></p>

                                                <p>Giúp việc nhà theo giờ gồm: lau dọn, giặt giũ, sắp xếp đồ
                                                    đạc,nấu ăn cho gia đình, đưa đón các con đi học, trông bé
                                                    giờ hành chính, chăm ông bà giờ hành chính… Khung giờ làm sẽ
                                                    tùy theo khách hàng đăng ký khi phát sinh nhu cầu.</p>
                                            </div>
                                        </div>
                                        <!-- .icon-box -->
                                    </div>

                                    <div class="col-md-3 col-solid">
                                        <div class="col-inner">
                                            <div class="icon-box-img" style="width: 90px;"><img alt=""
                                                                                                height="128" src="{{asset('images/k2j8rFf.png')}}"
                                                                                                width="128"></div>

                                            <div class="box-text last-reset">
                                                <p style="margin-bottom: 1.5em;"><strong>GIÚP VIỆC GIA
                                                        ĐÌNH</strong></p>

                                                <p>Giúp việc gia đình là dịch vụ không thể thiếu cho các ông bố,
                                                    bà mẹ trong xã hội hiên đại ngày nay. Bởi, cuộc sống hiện
                                                    đại bận rộn, việc nhà nhiều, trở thành nỗi lo của nhiều bà
                                                    mẹ không có nhiều thời gian để chăm sóc gia đình.</p>
                                            </div>
                                        </div>
                                        <!-- .icon-box -->
                                    </div>

                                    <div class="col-md-3 col-solid">
                                        <div class="col-inner">
                                            <div class="icon-box-img" style="width: 90px;"><img alt=""
                                                                                                height="128" src="{{asset('images/VQGVwna.png')}}"
                                                                                                width="128"></div>

                                            <div class="box-text last-reset">
                                                <p style="margin-bottom: 1.5em;"><strong>TẠP VỤ VĂN
                                                        PHÒNG</strong></p>

                                                <p>Tạp vụ văn phòng là một công việc không thể thiếu tại các
                                                    doanh nghiệp, các tòa nhà văn phòng bởi nó không chỉ giúp
                                                    văn phòng làm việc luôn được sạch sẽ, tạo hình ảnh tốt với
                                                    đối tác khách hàng.</p>
                                            </div>
                                        </div>
                                        <!-- .icon-box -->
                                    </div>

                                    <div class="col-md-3 col-solid">
                                        <div class="col-inner">
                                            <div class="icon-box-img" style="width: 90px;"><img alt=""
                                                                                                height="128" src="{{asset('images/YspENIA.png')}}"
                                                                                                width="128"></div>

                                            <div class="box-text last-reset">
                                                <p style="margin-bottom: 1.5em;"><strong>CHĂM SÓC EM BÉ</strong>
                                                </p>

                                                <p>Làm cha mẹ, ai chả muốn dành cho con mình những điều tuyệt
                                                    vời nhất. Nhưng xã hội phát triển khiến cho các ông bố bà mẹ
                                                    phải dành thời gian nhiều hơn đến công việc mà không có thời
                                                    gian chăm lo đến gia đình và con cái.</p>
                                            </div>
                                        </div>
                                        <!-- .icon-box -->
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="list-container gioi-thieu">
                            <div class="row">
                                <div class="list list-1 col-md-12 col-sm-6">
                                    <div class="list-photo col-xs-12 col-sm-12 col-md-7">
                                        <h3 style="text-align: center;"><span style="font-size:20px;">TẦM NHÌN
                                                        VÀ SỨ MỆNH</span></h3>

                                        <blockquote>
                                            <p style="text-align: center;"><span
                                                    style="color: #00a859;"><strong>“Mang đến không gian
                                                                xanh”</strong></span></p>
                                        </blockquote>
                                    </div>

                                    <div class="list-item col-xs-12 col-sm-12 col-md-5">
                                        <div class="list-content">
                                            <p style="margin-bottom: 15px;"><strong>THUẦN VIỆT</strong>&nbsp;ra đời
                                                với mong muốn mang đến một không gian sống sạch sẽ, trong lành,
                                                thoải mái và hạnh phúc cho các gia đình. Không những thế, với
                                                các dịch vụ vệ sinh văn phòng, chúng tôi còn hướng đến sự tiện
                                                nghi và thành công cho các công ty…</p>

                                            <p><strong>THUẦN VIỆT</strong>&nbsp;với sứ mệnh nỗ lực từng ngày trong
                                                việc trở thành đơn vị cung cấp các dịch vụ dọn dẹp hàng đầu trên
                                                thị trường cùng những giải pháp linh hoạt và toàn diện nhất.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- row nội dung chính !-->

                        <div class="row">
                            <div class="list-container cam-ket">
                                <h5 class="uppercase"><strong>NHỮNG CAM KẾT CỦA THUẦN VIỆT&nbsp;DÀNH CHO KHÁCH
                                        HÀNG</strong></h5>

                                <p><span style="font-size:16px;">Luôn đặt sự hài lòng của khách hàng lên hàng
                                                đầu, chúng tôi cung cấp các dịch vụ với những cam kết sau:</span></p>

                                <ul>
                                    <li><span style="font-size:16px;">Người giúp việc nhà tại THUẦN VIỆT đạt tiêu
                                                    chuẩn, đáng tin cậy và có đầy đủ hồ sơ, thông tin cá nhân. Tất cả
                                                    đều được đào tạo bài bản và được quản lý bởi đơn vị THUẦN VIỆT, một
                                                    trong những đơn vị tuyển chọn và đào tạo người giúp việc uy tín nhất
                                                    hiện nay.</span></li>
                                </ul>

                                <p><span style="font-size:18px;"><span style="color:#008000;"><i>Người giúp việc
                                                        đáng tin cậy, được đào tạo bài bản</i></span></span></p>

                                <ul>
                                    <li><span style="font-size:16px;">Đội ngũ nhân viên tư vấn và chăm sóc khách
                                                    hàng giàu kinh nghiệm, chuyên nghiệp và tận tâm, hỗ trợ khách hàng
                                                    tối đa trong việc lựa chọn dịch vụ phù hợp cũng như giải đáp các vấn
                                                    đề phát sinh trong quá trình sử dụng dịch vụ.</span></li>
                                    <li><span style="font-size:16px;">THUẦN VIỆT tìm người giúp việc nhanh chóng
                                                    sau khi khách hàng đăng ký theo nhu cầu. Chúng tôi còn cung cấp ứng
                                                    dụng đầy đủ thông tin về dịch vụ và người giúp việc, giúp cho khách
                                                    hàng chủ động chọn lựa và đánh giá một cách tiện lợi.</span></li>
                                    <li><span style="font-size:16px;">Bất cứ dịch vụ nào THUẦN VIỆT cũng đều tiến
                                                    hành theo quy trình khoa học, logic.</span></li>
                                </ul>

                                <p style="text-align: center;"><span style="font-size:16px;"><strong>Hải
                                                    Anh</strong>&nbsp;sẽ là lựa chọn lý tưởng cho các gia đình, các văn
                                                phòng công ty mong muốn được tận hưởng một môi trường sạch sẽ, thoải
                                                mái. Liên hệ ngay với chúng tôi qua số hotline&nbsp;</span><span
                                        style="font-size:18px;"><strong><span
                                                style="color:#FF0000;">0336.888.648</span></strong></span><span
                                        style="font-size:16px;"><strong>&nbsp;</strong>hoặc&nbsp;</span><span
                                        style="font-size:18px;"><span
                                            style="color:#FF0000;"><strong>0336.888.648</strong></span></span><span
                                        style="font-size:16px;">&nbsp;để được tư vấn nhanh chóng và chi tiết
                                                nhất.</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="hidden-xs fb-comment-area">
                        <div class="fb-comments fb_iframe_widget fb_iframe_widget_fluid_desktop"
                             data-href="http://giupviechaianh.com/gioi-thieu/" data-numposts="5"
                             fb-xfbml-state="rendered"
                             fb-iframe-plugin-query="app_id=&amp;container_width=1489&amp;height=100&amp;href=http%3A%2F%2Fgiupviechaianh.com%2Fgioi-thieu%2F&amp;locale=vi_VN&amp;numposts=5&amp;sdk=joey&amp;version=v2.12&amp;width=550">
                                    <span style="vertical-align: bottom; width: 550px; height: 203px;"><iframe
                                            name="fecc0621f0fc24" width="550px" height="100px"
                                            data-testid="fb:comments Facebook Social Plugin"
                                            title="fb:comments Facebook Social Plugin" frameborder="0"
                                            allowtransparency="true" allowfullscreen="true" scrolling="no"
                                            allow="encrypted-media"
                                            src="https://www.facebook.com/v2.12/plugins/comments.php?app_id=&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fx%2Fconnect%2Fxd_arbiter%2F%3Fversion%3D46%23cb%3Df12a6f99c90cacc%26domain%3Dgiupviechaianh.com%26is_canvas%3Dfalse%26origin%3Dhttp%253A%252F%252Fgiupviechaianh.com%252Ffbab99689b2688%26relation%3Dparent.parent&amp;container_width=1489&amp;height=100&amp;href=http%3A%2F%2Fgiupviechaianh.com%2Fgioi-thieu%2F&amp;locale=vi_VN&amp;numposts=5&amp;sdk=joey&amp;version=v2.12&amp;width=550"
                                            style="border: none; visibility: visible; width: 550px; height: 203px;"
                                            class=""></iframe></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>
@endsection
