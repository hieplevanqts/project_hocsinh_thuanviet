@extends('canans.master', ['home'=>0])
@section('title', 'Tin tức')
@section('home', 0)

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/product.css') }}">
    <style>
        #list_news{
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-content: space-between;
            width: 100%;
            flex-wrap: wrap;
            flex: 1;
        }
       
    </style>
@endpush


@section('content')

    <main>
        <section id="breadcrumb">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ asset('/') }}">Trang chủ</a></li>
                                <li class="breadcrumb-item  active product-name"><a href="#">Tin tức</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <section id="best_seller mt-5 mb-5">
            <div class="container">
                <div class="row" id="list_news">
                    
                        @foreach ($news as $item)
                        <div class="card-deck col-sm-4 mb-5">
                            <div class="card">
                                <a href="{{ asset('tin-tuc/' . @$item->id . '/' . @$item->slug) }}"><img
                                        class="card-img-top" src="{{ asset(@$item->image) }}"
                                        alt="{{ @$item->name }}"></a>
                                <div class="card-body">
                                    <h5 class="card-title"><a
                                            href="{{ asset('tin-tuc/' . @$item->id . '/' . @$item->slug) }}">{{ @$item->name }}</a>
                                    </h5>
                                    {!! @$item->description !!}
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted"><i>Ngày đăng : {{ date('H:i:s d/m/Y') }}</i></small>
                                </div>
                            </div>
                        </div>
                        @endforeach


                    
                </div>
                <div class="row text-center">
                    {{ $news->links() }}
                </div>
            </div>
        </section>

    </main>





@endsection

@section('script')
    @parent



@endsection
