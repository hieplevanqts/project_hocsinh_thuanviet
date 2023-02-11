<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
      <div class="logo-src"></div>
      <div class="header__pane ml-auto">
        <div>
          <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
            <span class="hamburger-box">
              <span class="hamburger-inner"></span>
            </span>
          </button>
        </div>
      </div>
    </div>
    <div class="app-header__mobile-menu">
      <div>
        <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
          <span class="hamburger-box">
            <span class="hamburger-inner"></span>
          </span>
        </button>
      </div>
    </div>
    <div class="app-header__menu">
      <span>
        <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
          <span class="btn-icon-wrapper">
            <i class="fa fa-ellipsis-v fa-w-6"></i>
          </span>
        </button>
      </span>
    </div>
    <div class="scrollbar-sidebar">
      <div class="app-sidebar__inner">
        <ul class="vertical-nav-menu">
          <li class="app-sidebar__heading">Trang chủ</li>
          <li>
            <a href="{{ asset('admin') }}" class="mm-active">
              <i class="metismenu-icon pe-7s-rocket"></i> Trang chủ </a>
          </li>
          <li class="app-sidebar__heading">Modules</li>
          {{-- <li>
            <a href="#">
              <i class="metismenu-icon pe-7s-diamond"></i> Dữ liệu <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
            </a>
            <ul>
              <li><a href="{{ route('gallery.index') }}"><i class="metismenu-icon"></i> Thư viện ảnh </a></li>
              <li><a href="{{ asset('admin/province') }}"><i class="metismenu-icon"></i> Quản lý tỉnh </a></li>
              <li><a href="{{ asset('admin/district') }}"><i class="metismenu-icon"></i> Quản lý huyện </a></li>
              <li><a href="{{ asset('admin/ward') }}"><i class="metismenu-icon"></i> Quản lý xã </a></li>
            </ul>
          </li> --}}
          <li>
            <a href="#">
              <i class="metismenu-icon fa fa-product-hunt" aria-hidden="true"></i> Sản phẩm <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
            </a>
                    <ul>
                            <li>
                                <a href="{{ asset('admin/product') }}">
                                <i class="metismenu-icon"></i>Danh sách sản phẩm </a>
                            </li>
                            <li>
                                <a href="{{ asset('admin/product/add') }}">
                                <i class="metismenu-icon"></i>Thêm sản phẩm </a>
                            </li>
                            {{-- <li><a href="{{ asset('admin/brand') }}"><i class="metismenu-icon"></i> Thương hiệu </a></li> --}}
                            <li><a href="{{ asset('admin/category') }}"><i class="metismenu-icon"></i> Danh mục sản phẩm </a></li>
                    </ul>
          </li>

          <li>
            <a href="#">
                <i class="fa fa-users metismenu-icon" aria-hidden="true"></i> Thành viên <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
            </a>
                    <ul>
                            <li>
                                <a href="{{ asset('admin/users') }}">
                                <i class="metismenu-icon"></i>Danh sách thành viên </a>
                            </li>
                            <li>
                                <a href="{{ asset('admin/user/add') }}">
                                <i class="metismenu-icon"></i>Thêm thành viên </a>
                            </li>
                    </ul>
          </li>

          <li>
            <a href="#">
                <i class="fa fa-newspaper-o metismenu-icon" aria-hidden="true"></i> Tin tức <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
            </a>
                    <ul>
                            <li>
                                <a href="{{ asset('admin/news') }}">
                                <i class="metismenu-icon"></i>Danh sách tin tức </a>
                            </li>
                            <li>
                                <a href="{{ asset('admin/news/add') }}">
                                <i class="metismenu-icon"></i>Thêm tin tức </a>
                            </li>
                    </ul>
          </li>
          <li>
              <a href="#"><i class="fa fa-cart-arrow-down metismenu-icon" aria-hidden="true"></i> Đặt hàng <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i></a>
              <ul>
                  <li><a href="{{ asset('admin/order') }}"><i class="metismenu-icon"></i>Danh sách đặt hàng </a></li>
              </ul>
          </li>
          <li>
            <a href="#"><i class="fa fa-cog metismenu-icon" aria-hidden="true"></i> Cài đặt <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i></a>
            <ul>
                <li><a href="{{ asset('admin/config') }}"><i class="metismenu-icon"></i>Thông tin website </a></li>
                <li><a href="{{ asset('admin/menu') }}"><i class="metismenu-icon"></i>Menu </a></li>
                @if (auth()->user()->email == 'vanhiep2008@gmail.com')
                <li><a href="{{ asset('admin/role/list') }}"><i class="fa fa-expeditedssl" aria-hidden="true"></i> Phân quyền </a></li>
                @endif
            </ul>
        </li>

          {{-- <li class="app-sidebar__heading">Widgets</li>
          <li>
            <a href="dashboard-boxes.html">
              <i class="metismenu-icon pe-7s-display2"></i> Dashboard Boxes </a>
          </li>
          <li class="app-sidebar__heading">Forms</li>
          <li>
            <a href="forms-controls.html">
              <i class="metismenu-icon pe-7s-mouse"></i>Forms Controls </a>
          </li>
          <li>
            <a href="forms-layouts.html">
              <i class="metismenu-icon pe-7s-eyedropper"></i>Forms Layouts </a>
          </li>
          <li>
            <a href="forms-validation.html">
              <i class="metismenu-icon pe-7s-pendrive"></i>Forms Validation </a>
          </li>
          <li class="app-sidebar__heading">Charts</li>
          <li>
            <a href="charts-chartjs.html">
              <i class="metismenu-icon pe-7s-graph2"></i>ChartJS </a>
          </li>
          <li class="app-sidebar__heading">PRO Version</li>
          <li>
            <a href="https://dashboardpack.com/theme-details/architectui-dashboard-html-pro/" target="_blank">
              <i class="metismenu-icon pe-7s-graph2"></i> Upgrade to PRO </a>
          </li> --}}
        </ul>
      </div>
    </div>
  </div>
