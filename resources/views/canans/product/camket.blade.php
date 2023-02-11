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
                        <li class='active'>Cam kết</li>
                    </ol>
                    <div class="node-content">
                        <div class="title txt_web_color">
                            <h1>Cam kết của chúng tôi</h1>
                        </div>
                        <p class="time">Đăng lúc 15:48:40 19/03/2020</p>
                        <div class="like_button hidden-xs">
                            <div class="fb-like" data-href="http://giupviechaianh.com/cam-ket/"
                                 data-layout="standard" data-action="like" data-show-faces="true" data-share="true">
                            </div>
                        </div>
                        <div class="summary_detail"></div>
                        <div class="article-content">
                            <div class="list-container">
                                <div class="row">
                                    <div class="list list-0 col-md-12 col-sm-6">
                                        <div class="list-photo col-xs-12 col-sm-12 col-md-7"><img
                                                alt="CHẤT LƯỢNG DỊCH VỤ" src="{{asset('images/tct1YcK.jpg')}}" />
                                        </div>

                                        <div class="list-item col-xs-12 col-sm-12 col-md-5">
                                            <h5 class="uppercase"><span style="color: #00a859;">I. CHẤT LƯỢNG DỊCH
                                                        VỤ</span></h5>

                                            <div class="list-content">
                                                <ul>
                                                    <li>Nh&acirc;n vi&ecirc;n gi&uacute;p việc được tuyển chọn
                                                        v&agrave; đ&agrave;o tạo kỹ lưỡng theo chuẩn Singapore,
                                                        c&oacute; nh&acirc;n th&acirc;n tốt được x&aacute;c nhận bởi
                                                        ch&iacute;nh quyền.</li>
                                                    <li>Bảo h&agrave;nh to&agrave;n bộ ca l&agrave;m nếu ca
                                                        l&agrave;m bị đ&aacute;nh gi&aacute; 1-2*.</li>
                                                    <li>Gi&aacute;m s&aacute;t kiểm tra định kỳ 1 lần/qu&yacute; với
                                                        những hợp đồng định kỳ từ 4 th&aacute;ng trở l&ecirc;n.</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="list list-1 col-md-12 col-sm-6">
                                        <div class="list-photo col-xs-12 col-sm-12 col-md-7"><img
                                                alt="ỔN ĐỊNH NHÂN VIÊN" src="{{asset('images/dffnETu.jpg')}}" />
                                        </div>

                                        <div class="list-item col-xs-12 col-sm-12 col-md-5">
                                            <h5 class="uppercase"><span style="color: #00a859;">II. ỔN ĐỊNH
                                                        NH&Acirc;N VI&Ecirc;N GI&Uacute;P VIỆC</span></h5>

                                            <div class="list-content">
                                                <ul>
                                                    <li>Giữ Nh&acirc;n vi&ecirc;n gi&uacute;p việc cố định
                                                        l&agrave;m tại nh&agrave; Qu&yacute; kh&aacute;ch, chỉ thay
                                                        đổi khi Nh&acirc;n vi&ecirc;n nghỉ do ốm, do l&yacute; do
                                                        c&aacute; nh&acirc;n, chuyển đổi vị tr&iacute; c&ocirc;ng
                                                        việc.</li>
                                                    <li>Để đảm bảo việc n&agrave;y, Qu&yacute; kh&aacute;ch vui
                                                        l&ograve;ng x&aacute;c nhận v&agrave; thanh to&aacute;n hợp
                                                        đồng gia hạn trước 15 ng&agrave;y so với thời điểm hợp đồng
                                                        hiện tại kết th&uacute;c, tr&aacute;nh trường hợp
                                                        Kh&aacute;ch h&agrave;ng kh&aacute;c chọn mất nh&acirc;n
                                                        vi&ecirc;n gi&uacute;p việc.</li>
                                                    <li>Bảm bảo c&oacute; nh&acirc;n vi&ecirc;n gi&uacute;p việc
                                                        thay thế: Lu&ocirc;n c&oacute; nh&acirc;n vi&ecirc;n thay
                                                        thế khi nh&acirc;n vi&ecirc;n hiện tại nghỉ việc. Thời gian
                                                        chờ tối đa: 7 ng&agrave;y.</li>
                                                    <li>Số lần đổi nh&acirc;n vi&ecirc;n gi&uacute;p việc mới trong
                                                        suốt thời gian hợp đồng: 2 lần (với hợp đồng 6 th&aacute;ng)
                                                        v&agrave; 3 lần (với hợp đồng 12 th&aacute;ng).</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="list list-2 col-md-12 col-sm-6">
                                        <div class="list-photo col-xs-12 col-sm-12 col-md-7"><img
                                                alt="BẢO HIỂM ĐỀN BÙ" src="{{asset('images/n7uzGJz.jpg')}}" /></div>

                                        <div class="list-item col-xs-12 col-sm-12 col-md-5">
                                            <h5 class="uppercase"><span style="color: #00a859;">III. &nbsp;BẢO HIỂM
                                                        V&Agrave; ĐỀN B&Ugrave; T&Agrave;I SẢN</span></h5>

                                            <div class="list-content">
                                                <ul>
                                                    <li>Bảo hiểm hỏng v&agrave; đổ vỡ: Theo Quy tắc Bảo hiểm của Bảo
                                                        Việt trong trường hợp nh&acirc;n vi&ecirc;n gi&uacute;p việc
                                                        l&agrave;m hư hỏng, vỡ đồ của Kh&aacute;ch h&agrave;ng. Chi
                                                        tiết tại: <a href=""
                                                                     rel="nofollow noopener noreferrer"
                                                                     target="_blank">http://bit.ly/2oQolOx.</a></li>
                                                    <li>Đền b&ugrave; t&agrave;i sản mất cắp: Trong trường hợp
                                                        c&oacute; x&aacute;c nhận bằng văn bản của cơ quan chức năng
                                                        về việc nh&acirc;n vi&ecirc;n gi&uacute;p việc lấy trộm đồ
                                                        của Kh&aacute;ch h&agrave;ng. Hải Anh&nbsp;sẽ c&oacute; đền
                                                        b&ugrave; tối đa 2 triệu (với hợp đồng 6 th&aacute;ng)
                                                        v&agrave; tối đa 3 triệu đồng (với hợp đồng 12
                                                        th&aacute;ng).</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="hidden-xs fb-comment-area">
                            <div class="fb-comments" data-href="http://giupviechaianh.com/cam-ket/"
                                 data-numposts="5"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
@endsection
