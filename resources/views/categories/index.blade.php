<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}"/>
        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/jquery.nestable.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/DataTables/datatables.min.css') }}">
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <input type="hidden" id="base" value="{{ URL::to('/') }}">
        <div class="container">
            <div class="row">
                {{-- <div class="col-md-12">
                    <div class="card mt-2">
                        <div class="card-body">
                               @include('categories.category_table', ['cateories', $categories])
                        </div>
                    </div>
                </div> --}}


                {{-- <div class="col-md-6">
                    <div class="card mt-2">
                        <div class="card-body">
                               @include('categories.select_box.category_select', ['cateories', $categories])
                        </div>
                    </div>
                </div> --}}

                <div class="dd" id="dd" data-url="{{route('category.updateTree')}}">
                    <ol class="dd-list">
                        @foreach ($categories as $item)
                            @include('categories.select_box.list_item', ['item'=>$item])
                        @endforeach
                    </ol>
                </div>

                <textarea id="dataOutput" class="form-control"></textarea>


            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="{{ asset('js/jquery.nestable.min.js') }}"></script>
        <script src="{{ asset('css/DataTables/datatables.min.js') }}"></script>

        <script>
            let Output = $('#dataOutput')
            let dd = $('#dd')
            let base = $('#base').val()

            dd.nestable({  }).on('change', function(){
                let dataOutput = dd.nestable('serialize')
                Output.val(JSON.stringify(dataOutput))
                try {
                    $.ajax({
                    type: "post",
                    url: dd.data('url'),
                    data: {
                        data: dataOutput,
                        _token : $('meta[name="csrf-token"]').attr("content")
                    },
                    success: function (response) {
                        console.log(response);
                    }
                });
                } catch (error) {
                    console.log(error);
                }
               
            })
            

            $(document).ready(function(){
            $('#empTable').DataTable({
                'processing': true,
                'serverSide': true,
                'serverMethod': 'post',
                // 'headers': {  _token : $('meta[name="csrf-token"]').attr("content") },
                'ajax': {
                    'url': base + '/categories/datatable-serverside',
                    "data": function ( d ) {
                        d._token = $('meta[name="csrf-token"]').attr("content") 
                        // d.custom = $('#myInput').val();
                        // etc
                    }
                },
                'columns': [
                    { data: 'id' },
                    { data: 'name' },
                    { data: 'order' },
                ]
            });
        });

        </script>
    </body>
</html>
