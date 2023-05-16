<div class="side" wire:poll.4000ms>
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
</div>