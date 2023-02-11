@extends('canans.master', ['home' => 1])
@section("title", "Dịch Vụ Giúp Việc Chuyên Nghiệp THUẦN VIỆT !!!")

@section('content')
    @include('canans.banner.index')
    <section id="content_product_category" class="clearfix">
        <section id="content" class="clearfix">
            <div class="container">


                <div class="box_page">
                    <ol class="breadcrumb txt_web_color">
                        <li><a href="/">Trang chủ</a></li>
                        <li><a href='/san-pham/'>Sản phẩm</a></li>
                        <li class='active'>Đội ngũ nhân viên</li>
                    </ol>
                    <div class="box_category_inner">
                        <div class="title_cate clearfix">

                            <div class="title_bar_center text-uppercase">
                                <h1>Đội ngũ nhân viên</h1>
                            </div>

                        </div>
                    </div>
                    <div class="box_list_product">
                        <div class="row">
                            <div class="col-md-4 col-sm-4 col-xs-6 col-ss-12 col-product">
                                <div class="box_product"><a href="/chi-nguyen-thi-thu-que-nam-dinh/">
                                        <div class="box_product_img"><img
                                                src="{{asset('images/z245137665180180462e58921b9690e71caff09f7ccedb_tbR6GIx2.jpeg')}}"
                                                alt="Chị Nguyễn Thị Thu - quê Nam Định "></div>
                                    </a>
                                    <div class="box_product_name"><a href="/chi-nguyen-thi-thu-que-nam-dinh/">Chị
                                            Nguyễn Thị Thu - quê Nam Định </a></div>
                                    <div class="box_product_summary">
                                        <p><strong>Qu&ecirc; Qu&aacute;n:</strong>&nbsp;<font color="#ff0000">Nam
                                                Định&nbsp;</font><br />
                                            <strong>Năm Sinh:</strong> <span style="color:#FF0000;">1965</span>
                                        </p>

                                        <p>&nbsp;</p>
                                    </div>
                                    <div class="btn_view_product_detail text-center">
                                        <!-- <a
                                            href="/chi-nguyen-thi-thu-que-nam-dinh/"
                                            class="btn btn-blue bar_web_bgr">Xem hồ sơ</a> -->
                                        <i class="fa fa-check" aria-hidden="true"></i> Đã nhận việc
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-6 col-ss-12 col-product">
                                <div class="box_product"><a href="/chi-le-thi-hoa-que-phu-tho/">
                                        <div class="box_product_img"><img
                                                src="{{asset('images/z24513860261817484f006c0aa427d8d7626f7a082de6e_V2xWHojw.jpeg')}}"
                                                alt="Chị Lê Thị Hoa - quê Phú Thọ "></div>
                                    </a>
                                    <div class="box_product_name"><a href="/chi-le-thi-hoa-que-phu-tho/">Chị Lê Thị
                                            Hoa - quê Phú Thọ </a></div>
                                    <div class="box_product_summary">
                                        <p><strong>Qu&ecirc; Qu&aacute;n:</strong> <span
                                                style="color:#FF0000;">Ph&uacute; Thọ&nbsp;</span><br />
                                            <strong>Năm Sinh:</strong> <span style="color:#FF0000;">1977</span>
                                        </p>
                                    </div>
                                    <div class="btn_view_product_detail text-center">
                                        <!-- <a
                                            href="/chi-nguyen-thi-thu-que-nam-dinh/"
                                            class="btn btn-blue bar_web_bgr">Xem hồ sơ</a> -->
                                        <i class="fa fa-check" aria-hidden="true"></i> Đã nhận việc
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-6 col-ss-12 col-product">
                                <div class="box_product"><a href="/chi-nguyen-thi-thu-que-thai-nguyen/">
                                        <div class="box_product_img"><img
                                                src="{{asset('images/z245138653061809aeb983d4946ffb6059d0985b05e85c_Hjc26oIs.jpeg')}}"
                                                alt="Chị Nguyễn Thị Thu - quê Thái nguyên."></div>
                                    </a>
                                    <div class="box_product_name"><a href="/chi-nguyen-thi-thu-que-thai-nguyen/">Chị
                                            Nguyễn Thị Thu - quê Thái nguyên.</a></div>
                                    <div class="box_product_summary">
                                        <p><strong>Qu&ecirc; Qu&aacute;n:</strong>&nbsp;<font color="#ff0000">
                                                Th&aacute;i Nguy&ecirc;n</font><br />
                                            <strong>Năm Sinh:</strong> <span style="color:#FF0000;">1983</span>
                                        </p>
                                    </div>
                                    <div class="btn_view_product_detail text-center">
                                        <!-- <a
                                            href="/chi-nguyen-thi-thu-que-nam-dinh/"
                                            class="btn btn-blue bar_web_bgr">Xem hồ sơ</a> -->
                                        <i class="fa fa-check" aria-hidden="true"></i> Đã nhận việc
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-6 col-ss-12 col-product">
                                <div class="box_product"><a href="/le-thi-thu-que-thai-binh/">
                                        <div class="box_product_img"><img
                                                src="{{asset('images/z24513894923640a04791f8c57a9da4c9870de2c6eccdb_sT3plpul.jpeg')}}"
                                                alt="Lê Thị Thu -  quê Thái Bình"></div>
                                    </a>
                                    <div class="box_product_name"><a href="/le-thi-thu-que-thai-binh/">Lê Thị Thu -
                                            quê Thái Bình</a></div>
                                    <div class="box_product_summary">
                                        <p><strong>Qu&ecirc; Qu&aacute;n:</strong>&nbsp;<font color="#ff0000">
                                                Th&aacute;i B&igrave;nh</font><br />
                                            <strong>Năm Sinh:</strong> <span style="color:#FF0000;">1976</span>
                                        </p>
                                    </div>
                                    <div class="btn_view_product_detail text-center">
                                        <!-- <a
                                            href="/chi-nguyen-thi-thu-que-nam-dinh/"
                                            class="btn btn-blue bar_web_bgr">Xem hồ sơ</a> -->
                                        <i class="fa fa-check" aria-hidden="true"></i> Đã nhận việc
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-6 col-ss-12 col-product">
                                <div class="box_product"><a href="/nguyen-thi-hang-que-ba-vi-ha-noi/">
                                        <div class="box_product_img"><img
                                                src="{{asset('images/z2451392781655ed464b8e8b717dd732d8b66730bfbb42_aZuJUHyd.jpeg')}}"
                                                alt="Nguyễn Thị Hằng - quê Ba Vì Hà Nội."></div>
                                    </a>
                                    <div class="box_product_name"><a
                                            href="/nguyen-thi-hang-que-ba-vi-ha-noi/">Nguyễn Thị Hằng - quê Ba Vì Hà
                                            Nội.</a></div>
                                    <div class="box_product_summary">
                                        <p><strong>Qu&ecirc; Qu&aacute;n:</strong>&nbsp;<font color="#ff0000">Ba
                                                V&igrave; H&agrave; Nội</font><br />
                                            <strong>Năm Sinh:</strong> <span style="color:#FF0000;">1978</span>
                                        </p>
                                    </div>
                                    <div class="btn_view_product_detail text-center">
                                        <!-- <a
                                            href="/chi-nguyen-thi-thu-que-nam-dinh/"
                                            class="btn btn-blue bar_web_bgr">Xem hồ sơ</a> -->
                                        <i class="fa fa-check" aria-hidden="true"></i> Đã nhận việc
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-6 col-ss-12 col-product">
                                <div class="box_product"><a href="/nguyen-thi-nu-que-ba-vi-ha-noi/">
                                        <div class="box_product_img"><img
                                                src="{{asset('images/z245139239058199b360958f3c67a6be4ae9711d61c4c1_qNMHr4Sd.jpeg')}}"
                                                alt="Nguyễn Thị Nữ - quê Ba Vì Hà Nội"></div>
                                    </a>
                                    <div class="box_product_name"><a href="/nguyen-thi-nu-que-ba-vi-ha-noi/">Nguyễn
                                            Thị Nữ - quê Ba Vì Hà Nội</a></div>
                                    <div class="box_product_summary">
                                        <p><strong>Qu&ecirc; Qu&aacute;n:</strong>&nbsp;<font color="#ff0000">Ba
                                                V&igrave; H&agrave; Nội</font><br />
                                            <strong>Năm Sinh:</strong> <span style="color:#FF0000;">1978</span>
                                        </p>
                                    </div>
                                    <div class="btn_view_product_detail text-center">
                                        <!-- <a
                                            href="/chi-nguyen-thi-thu-que-nam-dinh/"
                                            class="btn btn-blue bar_web_bgr">Xem hồ sơ</a> -->
                                        <i class="fa fa-check" aria-hidden="true"></i> Đã nhận việc
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-6 col-ss-12 col-product">
                                <div class="box_product"><a href="/le-thi-luyen-que-ba-vi-ha-noi/">
                                        <div class="box_product_img"><img
                                                src="{{asset('images/z24513919863472badd8fcc082fb3a33771e65d120e49c_SlqF9wb1.jpeg')}}"
                                                alt="Lê Thị Luyến - quê Ba Vì Hà Nội"></div>
                                    </a>
                                    <div class="box_product_name"><a href="/le-thi-luyen-que-ba-vi-ha-noi/">Lê Thị
                                            Luyến - quê Ba Vì Hà Nội</a></div>
                                    <div class="box_product_summary">
                                        <p><strong>Qu&ecirc; Qu&aacute;n:</strong>&nbsp;<font color="#ff0000">Ba
                                                V&igrave; H&agrave; Nội</font><br />
                                            <strong>Năm Sinh:</strong> <span style="color:#FF0000;">1965</span>
                                        </p>
                                    </div>
                                    <div class="btn_view_product_detail text-center">
                                        <!-- <a
                                            href="/chi-nguyen-thi-thu-que-nam-dinh/"
                                            class="btn btn-blue bar_web_bgr">Xem hồ sơ</a> -->
                                        <i class="fa fa-check" aria-hidden="true"></i> Đã nhận việc
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-6 col-ss-12 col-product">
                                <div class="box_product"><a href="/nguyen-thi-hien-que-thai-binh/">
                                        <div class="box_product_img"><img
                                                src="{{asset('images/z24513911102394771fefb2adfcf2d18c573e5939249fd_L88GzRlR.jpeg')}}"
                                                alt="Nguyễn Thị Hiền - quê Thái Bình"></div>
                                    </a>
                                    <div class="box_product_name"><a href="/nguyen-thi-hien-que-thai-binh/">Nguyễn
                                            Thị Hiền - quê Thái Bình</a></div>
                                    <div class="box_product_summary">
                                        <p><strong>Qu&ecirc; Qu&aacute;n:</strong>&nbsp;<font color="#ff0000">
                                                Th&aacute;i B&igrave;nh</font><br />
                                            <strong>Năm Sinh:</strong> <span style="color:#FF0000;">1969</span>
                                        </p>
                                    </div>
                                    <div class="btn_view_product_detail text-center">
                                        <!-- <a
                                            href="/chi-nguyen-thi-thu-que-nam-dinh/"
                                            class="btn btn-blue bar_web_bgr">Xem hồ sơ</a> -->
                                        <i class="fa fa-check" aria-hidden="true"></i> Đã nhận việc
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-6 col-ss-12 col-product">
                                <div class="box_product"><a href="/tran-thi-len-que-nam-dinh/">
                                        <div class="box_product_img"><img
                                                src="{{asset('images/z24513907589598737dd58370afe695a823beebd9f0dff_U9A3r6JK.jpeg')}}"
                                                alt="Trần Thị Len - quê Nam Định"></div>
                                    </a>
                                    <div class="box_product_name"><a href="/tran-thi-len-que-nam-dinh/">Trần Thị Len
                                            - quê Nam Định</a></div>
                                    <div class="box_product_summary">
                                        <p><strong>Qu&ecirc; Qu&aacute;n:</strong>&nbsp;<font color="#ff0000">Nam
                                                Định</font><br />
                                            <strong>Năm Sinh:</strong> <span style="color:#FF0000;">1976</span>
                                        </p>
                                    </div>
                                    <div class="btn_view_product_detail text-center">
                                        <!-- <a
                                            href="/chi-nguyen-thi-thu-que-nam-dinh/"
                                            class="btn btn-blue bar_web_bgr">Xem hồ sơ</a> -->
                                        <i class="fa fa-check" aria-hidden="true"></i> Đã nhận việc
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-6 col-ss-12 col-product">
                                <div class="box_product"><a href="/le-thi-thom-que-phu-tho/">
                                        <div class="box_product_img"><img
                                                src="{{asset('images/z2490094852915a5b6980ebb09cee464c2c4b3120d4830_1Aq6HEVn.jpeg')}}"
                                                alt="Lê Thị Thơm - quê Phú Thọ"></div>
                                    </a>
                                    <div class="box_product_name"><a href="/le-thi-thom-que-phu-tho/">Lê Thị Thơm -
                                            quê Phú Thọ</a></div>
                                    <div class="box_product_summary">
                                        <p><strong>Qu&ecirc; Qu&aacute;n:</strong>&nbsp;<font color="#ff0000">
                                                Ph&uacute; Thọ</font><br />
                                            <strong>Năm Sinh:</strong> <span style="color:#FF0000;">1976</span>
                                        </p>
                                    </div>
                                    <div class="btn_view_product_detail text-center">
                                        <!-- <a
                                            href="/chi-nguyen-thi-thu-que-nam-dinh/"
                                            class="btn btn-blue bar_web_bgr">Xem hồ sơ</a> -->
                                        <i class="fa fa-check" aria-hidden="true"></i> Đã nhận việc
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-6 col-ss-12 col-product">
                                <div class="box_product"><a href="/nguyen-thi-hoai-que-hai-duong/">
                                        <div class="box_product_img"><img
                                                src="{{asset('images/z2490095866831171cc570b70d1af36df315f39fae06a8_XUA5eXEG.jpeg')}}"
                                                alt="Nguyễn Thị Hoài - quê Hải Dương"></div>
                                    </a>
                                    <div class="box_product_name"><a href="/nguyen-thi-hoai-que-hai-duong/">Nguyễn
                                            Thị Hoài - quê Hải Dương</a></div>
                                    <div class="box_product_summary">
                                        <p><strong>Qu&ecirc; Qu&aacute;n:</strong>&nbsp;<font color="#ff0000">Hải
                                                Dương</font><br />
                                            <strong>Năm Sinh:</strong> <span style="color:#FF0000;">1985</span>
                                        </p>
                                    </div>
                                    <div class="btn_view_product_detail text-center">
                                        <!-- <a
                                            href="/chi-nguyen-thi-thu-que-nam-dinh/"
                                            class="btn btn-blue bar_web_bgr">Xem hồ sơ</a> -->
                                        <i class="fa fa-check" aria-hidden="true"></i> Đã nhận việc
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-6 col-ss-12 col-product">
                                <div class="box_product"><a href="/ha-thi-hoa-que-tuyen-quang/">
                                        <div class="box_product_img"><img
                                                src="{{asset('images/z24900965814877aa5cebe4316df2c413bbad231279438_Qb990H9N.jpeg')}}"
                                                alt="Hà Thị Hoa - quê Tuyên Quang"></div>
                                    </a>
                                    <div class="box_product_name"><a href="/ha-thi-hoa-que-tuyen-quang/">Hà Thị Hoa
                                            - quê Tuyên Quang</a></div>
                                    <div class="box_product_summary">
                                        <p><strong>Qu&ecirc; Qu&aacute;n:</strong>&nbsp;<font color="#ff0000">
                                                Tuy&ecirc;n Quang</font><br />
                                            <strong>Năm Sinh:</strong> <span style="color:#FF0000;">1969</span>
                                        </p>
                                    </div>
                                    <div class="btn_view_product_detail text-center">
                                        <!-- <a
                                            href="/chi-nguyen-thi-thu-que-nam-dinh/"
                                            class="btn btn-blue bar_web_bgr">Xem hồ sơ</a> -->
                                        <i class="fa fa-check" aria-hidden="true"></i> Đã nhận việc
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-6 col-ss-12 col-product">
                                <div class="box_product"><a href="/chi-ngo-thi-huyen-que-ha-tay/">
                                        <div class="box_product_img"><img
                                                src="{{asset('images/z2490097211612469974c432926cb1630e8ff46a3449e5_YlJpwfER.jpeg')}}"
                                                alt="Chị Ngô Thị Huyền - quê Hà Tây"></div>
                                    </a>
                                    <div class="box_product_name"><a href="/chi-ngo-thi-huyen-que-ha-tay/">Chị Ngô
                                            Thị Huyền - quê Hà Tây</a></div>
                                    <div class="box_product_summary">
                                        <p><strong>Qu&ecirc; Qu&aacute;n:</strong>&nbsp;<font color="#ff0000">
                                                H&agrave; T&acirc;y</font><br />
                                            <strong>Năm Sinh:</strong> <span style="color:#FF0000;">1977</span>
                                        </p>
                                    </div>
                                    <div class="btn_view_product_detail text-center">
                                        <!-- <a
                                            href="/chi-nguyen-thi-thu-que-nam-dinh/"
                                            class="btn btn-blue bar_web_bgr">Xem hồ sơ</a> -->
                                        <i class="fa fa-check" aria-hidden="true"></i> Đã nhận việc
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-6 col-ss-12 col-product">
                                <div class="box_product"><a href="/nguyen-thi-hoa-que-nam-dinh/">
                                        <div class="box_product_img"><img
                                                src="{{asset('images/z2490098173197a0515225cb59be3f9621eee9e23929c6_z2jpO32l.jpeg')}}"
                                                alt="Nguyễn Thị Hoa - quê Nam Định"></div>
                                    </a>
                                    <div class="box_product_name"><a href="/nguyen-thi-hoa-que-nam-dinh/">Nguyễn Thị
                                            Hoa - quê Nam Định</a></div>
                                    <div class="box_product_summary">
                                        <p><strong>Qu&ecirc; Qu&aacute;n:</strong>&nbsp;<font color="#ff0000">Nam
                                                Định</font><br />
                                            <strong>Năm Sinh:</strong> <span style="color:#FF0000;">1968</span>
                                        </p>
                                    </div>
                                    <div class="btn_view_product_detail text-center">
                                        <!-- <a
                                            href="/chi-nguyen-thi-thu-que-nam-dinh/"
                                            class="btn btn-blue bar_web_bgr">Xem hồ sơ</a> -->
                                        <i class="fa fa-check" aria-hidden="true"></i> Đã nhận việc
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-6 col-ss-12 col-product">
                                <div class="box_product"><a href="/dang-thi-lien-que-cao-bang/">
                                        <div class="box_product_img"><img
                                                src="{{asset('images/z249009888712887898e7a2955da73035353c4c89a65c1_1bpaFifZ.jpeg')}}"
                                                alt="Đặng Thị Liên - quê Cao Bằng"></div>
                                    </a>
                                    <div class="box_product_name"><a href="/dang-thi-lien-que-cao-bang/">Đặng Thị
                                            Liên - quê Cao Bằng</a></div>
                                    <div class="box_product_summary">
                                        <p><strong>Qu&ecirc; Qu&aacute;n:</strong>&nbsp;<font color="#ff0000">Cao
                                                Bằng</font><br />
                                            <strong>Năm Sinh:</strong> <span style="color:#FF0000;">1977</span>
                                        </p>
                                    </div>
                                    <div class="btn_view_product_detail text-center">
                                        <!-- <a
                                            href="/chi-nguyen-thi-thu-que-nam-dinh/"
                                            class="btn btn-blue bar_web_bgr">Xem hồ sơ</a> -->
                                        <i class="fa fa-check" aria-hidden="true"></i> Đã nhận việc
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-6 col-ss-12 col-product">
                                <div class="box_product"><a href="/nguyen-thi-thanh-que-ninh-binh/">
                                        <div class="box_product_img"><img
                                                src="{{asset('images/z24900994960179cfbba12f14377e05e9411051e711430_xg7mw6uX.jpeg')}}"
                                                alt="Nguyễn Thị Thanh - quê Ninh Bình"></div>
                                    </a>
                                    <div class="box_product_name"><a href="/nguyen-thi-thanh-que-ninh-binh/">Nguyễn
                                            Thị Thanh - quê Ninh Bình</a></div>
                                    <div class="box_product_summary">
                                        <p><strong>Qu&ecirc; Qu&aacute;n:</strong>&nbsp;<font color="#ff0000">Ninh
                                                B&igrave;nh</font><br />
                                            <strong>Năm Sinh:</strong> <span style="color:#FF0000;">1975</span>
                                        </p>
                                    </div>
                                    <div class="btn_view_product_detail text-center">
                                        <!-- <a
                                            href="/chi-nguyen-thi-thu-que-nam-dinh/"
                                            class="btn btn-blue bar_web_bgr">Xem hồ sơ</a> -->
                                        <i class="fa fa-check" aria-hidden="true"></i> Đã nhận việc
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-6 col-ss-12 col-product">
                                <div class="box_product"><a href="/nguyen-thi-hue-que-thai-binh/">
                                        <div class="box_product_img"><img
                                                src="{{asset('images/z24901013422452af72ff3fd41ed533ee79b4612ba007b_lrhKc82K.jpeg')}}"
                                                alt="Nguyễn Thị Huệ - quê Thái Bình"></div>
                                    </a>
                                    <div class="box_product_name"><a href="/nguyen-thi-hue-que-thai-binh/">Nguyễn
                                            Thị Huệ - quê Thái Bình</a></div>
                                    <div class="box_product_summary">
                                        <p><strong>Qu&ecirc; Qu&aacute;n:</strong>&nbsp;<font color="#ff0000">
                                                Th&aacute;i B&igrave;nh</font><br />
                                            <strong>Năm Sinh:</strong> <span style="color:#FF0000;">1972</span>
                                        </p>
                                    </div>
                                    <div class="btn_view_product_detail text-center">
                                        <!-- <a
                                            href="/chi-nguyen-thi-thu-que-nam-dinh/"
                                            class="btn btn-blue bar_web_bgr">Xem hồ sơ</a> -->
                                        <i class="fa fa-check" aria-hidden="true"></i> Đã nhận việc
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-6 col-ss-12 col-product">
                                <div class="box_product"><a href="/nguyen-thi-le-que-lao-cai/">
                                        <div class="box_product_img"><img
                                                src="{{asset('images/z24901000579002fe5ba4c264dc0e0335236816512b1ce_vTsyLuu8.jpeg')}}"
                                                alt="Nguyễn Thị Lệ - quê Lào Cai"></div>
                                    </a>
                                    <div class="box_product_name"><a href="/nguyen-thi-le-que-lao-cai/">Nguyễn Thị
                                            Lệ - quê Lào Cai</a></div>
                                    <div class="box_product_summary">
                                        <p><strong>Qu&ecirc; Qu&aacute;n:</strong>&nbsp;<font color="#ff0000">
                                                L&agrave;o Cai</font><br />
                                            <strong>Năm Sinh:</strong> <span style="color:#FF0000;">1977</span>
                                        </p>
                                    </div>
                                    <div class="btn_view_product_detail text-center">
                                        <!-- <a
                                            href="/chi-nguyen-thi-thu-que-nam-dinh/"
                                            class="btn btn-blue bar_web_bgr">Xem hồ sơ</a> -->
                                        <i class="fa fa-check" aria-hidden="true"></i> Đã nhận việc
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-6 col-ss-12 col-product">
                                <div class="box_product"><a href="/dang-thi-linh-que-ha-noi/">
                                        <div class="box_product_img"><img
                                                src="{{asset('images/z24901006380492a44447cf14da8952bfcb69415ef8862_D3K7Pxph.jpeg')}}"
                                                alt="Đặng Thị Linh - quê Hà Nội."></div>
                                    </a>
                                    <div class="box_product_name"><a href="/dang-thi-linh-que-ha-noi/">Đặng Thị Linh
                                            - quê Hà Nội.</a></div>
                                    <div class="box_product_summary">
                                        <p><strong>Qu&ecirc; Qu&aacute;n:</strong>&nbsp;<font color="#ff0000">
                                                H&agrave; Nội</font><br />
                                            <strong>Năm Sinh:</strong> <span style="color:#FF0000;">1984</span>
                                        </p>
                                    </div>
                                    <div class="btn_view_product_detail text-center">
                                        <!-- <a
                                            href="/chi-nguyen-thi-thu-que-nam-dinh/"
                                            class="btn btn-blue bar_web_bgr">Xem hồ sơ</a> -->
                                        <i class="fa fa-check" aria-hidden="true"></i> Đã nhận việc
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-6 col-ss-12 col-product">
                                <div class="box_product"><a
                                        href="/co-phan-thi-tam-que-thai-binh-san-sang-di-lam-ngay/">
                                        <div class="box_product_img"><img
                                                src="{{asset('images/ahahash_pB129FvO.jpg')}}"
                                                alt="Cô Phan Thị Tám Quê Thái Bình Sẵn Sàng Đi Làm Ngay"></div>
                                    </a>
                                    <div class="box_product_name"><a
                                            href="/co-phan-thi-tam-que-thai-binh-san-sang-di-lam-ngay/">Cô Phan Thị
                                            Tám Quê Thái Bình Sẵn Sàng Đi Làm Ngay</a></div>
                                    <div class="box_product_summary">
                                        <p><span style="font-size:14px;"><span
                                                    style="color:#000000;"><strong>Qu&ecirc; qu&aacute;n:</strong>
                                                    </span><span style="color:#FF0000;">Th&aacute;i
                                                        B&igrave;nh</span></span><br />
                                            <span style="font-size:14px;"><span style="color:#000000;"><strong>Năm
                                                            sinh:</strong> </span><span
                                                    style="color:#FF0000;">1972</span></span>
                                        </p>
                                    </div>
                                    <div class="btn_view_product_detail text-center">
                                        <!-- <a
                                            href="/chi-nguyen-thi-thu-que-nam-dinh/"
                                            class="btn btn-blue bar_web_bgr">Xem hồ sơ</a> -->
                                        <i class="fa fa-check" aria-hidden="true"></i> Đã nhận việc
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center box_pagination">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
@endsection
