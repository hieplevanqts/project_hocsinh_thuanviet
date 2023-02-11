@php
    $level = ' / ----';
@endphp
<li class="dd-item" data-id="{{ $item->id }}">
    <div class="dd-handle">{{ $item->name }}</div>
    <div class="dd-handle-action">
        <i ng-click="editMenu({{ $item->id }})" class="fa fa-cogs btn btn-warning btn-xs" aria-hidden="true"></i>
        <i ng-click="deleteMenu($event, {{ $item->id }})" class="fa fa-times btn btn-danger btn-xs" aria-hidden="true"></i>
    </div>
    
    @if (count($item->children) > 0)
    <ol class="dd-list">
        @foreach ($item->children as $val)
                @include('categories.select_box.list_item', ['item'=>$val])
        @endforeach
    </ol>
</li>
@endif
