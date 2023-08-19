<div class="col-md-5 order-details" wire:poll>
    <div class="section-title text-center">
        <h3 class="title">Your Order</h3>
    </div>
    <div class="order-summary">
        <div class="order-col">
            <div><strong>PRODUCT</strong></div>
            <div><strong>TOTAL</strong></div>
        </div>
        <div class="order-products">
            @php
                $total = 0;
            @endphp
            @if (session('cart'))
                @foreach ( session('cart') as $id => $item )
                    @php $total += $item["quantity"] * $item["price"]  @endphp
                    <div class="order-col">
                        <div>{{ $item["quantity"] }}x </span>{{ $item['title'] }}</div>
                        <div>${{ $item["price"] }} </div>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="order-col">
            <div>Shiping</div>
            <div><strong>FREE</strong></div>
        </div>
        <div class="order-col">
            <div><strong>TOTAL</strong></div>
            <div><strong class="order-total">${{ $total + 30 }}</strong></div>
        </div>
    </div>
    <a href="#" class="primary-btn order-submit">Place order</a>
</div>

