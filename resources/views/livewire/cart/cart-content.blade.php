<div class="mini-cart-wrapper">
    <div class="mini-cart">
        <div class="mini-cart-header">
            YOUR CART
            <button type="button" class="button ion ion-md-close" id="mini-cart-close"></button>
        </div>
        @if ($cart)
            @php
                $total = 0;
            @endphp
            <ul class="mini-cart-list">
                @foreach ($cart as $item)
                    @php $total += $item['price'] * $item['quantity']; @endphp
                    <li class="clearfix">
                        <a href="single-product.html">
                            <img src="{{$item['image'] }}" alt="Product">
                            <span class="mini-item-name">{{ $item['title'] }}</span>
                            <span class="mini-item-price">${{ $item['price'] }}</span>
                            <span class="mini-item-quantity"> x {{ $item['quantity'] }} </span>
                        </a>
                    </li>
                @endforeach
            </ul>
            <div class="mini-shop-total clearfix">
                <span class="mini-total-heading float-left">Total:</span>
                <span class="mini-total-price float-right">${{ $total }}</span>
            </div>
        @else
        @endif
        <div class="mini-action-anchors">
            <a href="{{route('cart.list')}}" class="cart-anchor">View Cart</a>
            <a href="checkout.html" class="checkout-anchor">Checkout</a>
        </div>
    </div>
</div>
