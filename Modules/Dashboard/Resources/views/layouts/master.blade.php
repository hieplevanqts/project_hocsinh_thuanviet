<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>@yield('title') - VanHiep.NET</title>
    @yield('meta_tags')
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
    <base content="{{ URL::to('/') }}" id="base">
<link href="{{ Module::asset('dashboard:css/main.css') }} " rel="stylesheet">
<link href="{{ asset('css/custom-style.css') }} " rel="stylesheet">
<link href="{{ asset('css/toastr.min.css') }} " rel="stylesheet">

<link rel="stylesheet" href="{{ asset('css/font-awesome-4.7.0/css/font-awesome.min.css') }}"/>
@stack('styles')
</head>

<body ng-app="canansAdmin">
   <input type="hidden" name="success" value="{{ session()->get('success') }}">
   <input type="hidden" name="error" value="{{ session()->get('error') }}">
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
       {{-- header --}}
       @include('dashboard::layouts.header')
       @include('dashboard::layouts.setting-theme')
       <div class="app-main">
          {{-- sidebar --}}
          @include('dashboard::layouts.sidebar')
          <div class="app-main__outer">
             <div class="app-main__inner">
                @yield('content')
             </div>
             {{-- footer --}}
             @include('dashboard::layouts.footer')
          </div>
          <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
       </div>
    </div>
    
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    {{-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --}}
    <script type="text/javascript" src="{{ Module::asset('dashboard:scripts/main.js') }}"></script>
    <script type="text/javascript" src="{{ Module::asset('dashboard:js/admin.js') }}"></script>
    <script type="text/javascript" src="{{ Module::asset('dashboard:js/fix_scripts.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/toastr.min.js') }}"></script>
    
    {{-- <script src="{{ asset('js/angularjs/admin/logoutController.js') }}"></script> --}}
    @section('script')
    @show
 </body>
</html>
