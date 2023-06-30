{{-- <div class="side" wire:poll.4000ms>
    <a href="#" class="close-side"><i class="fa fa-times"></i></a>
    <li class="cart-box">
        <ul class="cart-list">
            @foreach (\Cart::getContent() as $item)
                <li>
                    <a href="#" class="photo"><img
                            src="{{ asset('assets/landing/images/img-pro-01.jpg') }} " class="cart-thumb"
                            alt="" /></a>
                    <h6><a href="#">{{ Str::limit($item->name, 10, '...') }} </a></h6>
                    <p>{{ $item->quantity }}x - <span
                            class="price">${{ $item->quantity * $item->price }}</span></p>
                </li>
            @endforeach
            @if (\Cart::getContent()->count() == 0)
                <span class="float-right"><strong>Your Cart is Empty</strong></span>
            @else
                <li class="total">
                    <a href="{{route('cart.list')}}" class="btn btn-default hvr-hover btn-cart">VIEW CART</a>
                    <span class="float-right"><strong>Total</strong>: $180.00</span>
                </li>
            @endif
        </ul>
    </li>
</div> --}}

<div class="cart-content d-flex" wire:poll>

    <!-- Cart List Area -->
    <div class="cart-list">
        @foreach (\Cart::getContent() as $item)
            <!-- Single Cart Item -->
            <div class="single-cart-item">
                <a href="#" class="product-image">
                    <img src="{{ asset('assets/landing/img/product-img/product-1.jpg') }}" class="cart-thumb"
                        alt="">
                    <!-- Cart Item Desc -->
                    <div class="cart-item-desc">
                        <span class="product-remove" wire:click="DeleteItem({{ $item->id }})"><i class="fa fa-close" aria-hidden="true"></i></span>
                        <span class="badge">{{ Str::limit($item->name, 10, '...') }}</span>
                        <h6>{{ Str::limit($item->name, 10, '...') }}</h6>
                        <p class="price">${{ $item->price }}</p>
                    </div>
                </a>
            </div>
        @endforeach

    </div>

    <!-- Cart Summary -->
    <div class="cart-amount-summary">

        <h2>Summary</h2>
        <ul class="summary-table">
            <li><span>subtotal:</span> <span>${{ Cart::getTotal() }}</span></li>
            <li><span>delivery:</span> <span>30</span></li>
            <li><span>discount:</span> <span>0%</span></li>
            <li><span>total:</span> <span>{{ Cart::getTotal() + 30 }}</span></li>
        </ul>
        <div class="checkout-btn mt-100">
            <a href="{{route('cart.list')}}" class="btn essence-btn">check out</a>
        </div>
    </div>
</div>
