<div class="single-products-box">
    <div class="image">
        <a href="{{ route('product.single', $item->slug)}}" class="d-block"><img src="{{ $item->images[0] }}" alt="{{ $item->title }}"></a>
        @if($item->sales_status == 2)
            <div class="sale">Endirimli məhsullar</div>
        @elseif($item->sales_status == 1)
        <div class="sale">Ən çox satılanlar</div>
        @endif
        <div class="buttons-list">
            <a class="btn btn-primary" href="{{ route('product.single', $item->slug)}}" role="button">Ətraflı</a>
            <a class="btn btn-primary" href="#" role="button">Səbətə at</a>
        </div>
    </div>
    <div class="content">
        <h3><a href="{{ route('product.single', $item->slug)}}">{{ $item->title }}</a></h3>
        <div class="price">
            <span class="new-price">{{ $item->price }} Azn</span>
        </div>

    </div>
</div>
