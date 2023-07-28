<div wire:poll>
    @foreach (session('cart') as $id => $item)
        <div class="single-cart-item">
            <a href="#" class="product-image">
                <img src="{{ asset('assets/landing/img/product-img/product-1.jpg') }}" class="cart-thumb" alt="">
                <!-- Cart Item Desc -->
                <div class="cart-item-desc">
                    <span class="product-remove" wire:click="DeleteItem({{ $item['id'] }})"><i class="fa fa-close"
                            aria-hidden="true"></i></span>
                    <span class="badge">{{ Str::limit($item['title'], 10, '...') }}</span>
                    <h6>{{ Str::limit($item['title'], 10, '...') }}</h6>
                    <p class="price">${{ $item['price'] }}</p>
                </div>
            </a>
        </div>
    @endforeach
</div>
