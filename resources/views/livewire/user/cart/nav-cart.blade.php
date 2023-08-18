<div wire:poll>
    @if (session('cart'))
        @foreach (session('cart') as $id => $item)
            <div class="product-widget">
                <div class="product-img">
                    <img src="{{ $item['image'] }}" alt="">
                </div>
                <div class="product-body">
                    <h3 class="product-name"><a href="#">{{ $item['title'] }}</a>
                    </h3>
                    <h4 class="product-price"><span class="qty">{{ $item["quantity"] }} x </span>${{ $item['price'] }}</h4>
                </div>
                <button class="delete"><i class="fa fa-close"></i></button>
            </div>
        @endforeach
    @endif
</div>
