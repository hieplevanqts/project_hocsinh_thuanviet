@extends('dashboard::layouts.master')
@section("title", "Thêm tin tức")
@section('content')
@includeIf('dashboard::layouts.page_title_news', [
    'pageTitle'=>'Danh sách',
    'title'=>'Danh sách',
    'icon'=>'<i class="fa fa-bars" aria-hidden="true"></i>',
    'link'=>asset('admin/news')
    ])
@push('style')
<link rel="stylesheet" href="https://raw.githubusercontent.com/esvit/ng-ckeditor/master/ng-ckeditor.css">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.4.0/styles/default.min.css">
@endpush
<div class="main-card card mb-3">
    
</div>
<div class="row" ng-controller="newsController">
    <div class="col-lg-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <form class="p-3">
                    <input type="hidden" name="edit" value="{{ @$id }}">
                    <div class="row">
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <label for=""><b>Nhập tiêu đề</b></label>
                                    <input class="form-control" placeholder="Nhập tiêu đề..." ng-model="name" name="name"/>
                                </div>
                                <div class="form-group">
                                    <label for=""><b>Nhập mô tả</b></label>
                                    <textarea ck-editor placeholder="Nhập mô tả..." class="form-control" rows="3" id="description" ng-model="description"><% description %></textarea>
                                </div>
                                <div class="form-group">
                                    <label for=""><b>Nhập nội dung</b></label>
                                    <textarea ck-editor placeholder="Nhập nội dung..." class="form-control" rows="5" id="ckeditor_content" ng-model="ckeditor_content"><% ckeditor_content %></textarea>
                                </div>
                                <div class="form-group text-right">
                                    <label for=""><b></b></label>
                                    <button ng-click="createNews($event)" class="btn btn-primary" type="button"><i class="fa fa-plus" aria-hidden="true"></i> <% action %></button>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group" id="avatarNews">
                                    <label for=""><b></b></label>
                                    <img src="<% avatarDefaul %>" width="200" height="200" class="mb-3" id=""/>
                                    <input type="file" photo-file="avatar"/>
                                    <input type="hidden" name="old_image" value="">
                                </div>
                            </div>
                            
                    </div>
                </form>
               
            </div>
        </div>
    </div>
</div>
@endsection


@section('script')
@parent
<script src="{{ asset('js/angularjs/angular.min.js') }}"></script>
<script src="{{ asset('js/angularjs/angular-animate.min.js') }}"></script>
<script src="{{ asset('js/angularjs/angular-aria.min.js') }}"></script>
<script src="{{ asset('js/angularjs/angular-cookies.min.js') }}"></script>
<script src="{{ asset('js/angularjs/angular-loader.min.js') }}"></script>
<script src="{{ asset('js/angularjs/angular-message-format.min.js') }}"></script>
<script src="{{ asset('js/angularjs/angular-messages.min.js') }}"></script>
<script src="{{ asset('js/angularjs/angular-parse-ext.min.js') }}"></script>
<script src="{{ asset('js/angularjs/angular-route.min.js') }}"></script>
<script src="{{ asset('js/angularjs/angular-sanitize.min.js') }}"></script>
<script src="{{ asset('js/angularjs/angular-touch.min.js') }}"></script>
<script src="{{ asset('js/angularjs/admin/newsController.js') }}"></script>
{{-- <script src="{{ asset('ckeditor/ckeditor.js') }}"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.7.1/ckeditor.js"></script>
<script src="https://raw.githubusercontent.com/esvit/ng-ckeditor/master/ng-ckeditor.min.js"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.4.0/highlight.min.js"></script>


<script type="text/javascript">
    $(document).ready(function(){
    //    let url= $("#base").val() +'/ckfinder/';
       // ckeditor mo ta không full
    //    CKEDITOR.replace( 'description', {})
    //    CKEDITOR.replace( 'ckeditor_content', {
    //       height:200,
    //          title:'',
    //       // Configure your file manager integration. This example uses CKFinder 3 for PHP.
    //          filebrowserBrowseUrl: url+'ckfinder.html',
    //          filebrowserImageBrowseUrl: url+'ckfinder.html?type=Images',
    //          filebrowserUploadUrl: url+'core/connector/php/connector.php?command=QuickUpload&type=Files',
    //          filebrowserImageUploadUrl: url+'core/connector/php/connector.php?command=QuickUpload&type=Images'
    //    } );
    hljs.initHighlightingOnLoad();
   
    }); 
    
 </script>

@endsection
