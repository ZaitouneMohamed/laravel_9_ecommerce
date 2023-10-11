<div class="mini-cart-wrapper">
    <div class="mini-cart">
        <div class="mini-cart-header">
            YOUR CART
            <button type="button" class="button ion ion-md-close" id="mini-cart-close"></button>
        </div>
        <ul class="mini-cart-list" id="cart_content">
        </ul>
        <div class="mini-shop-total clearfix">
            <span class="mini-total-heading float-left">Total:</span>
            <span class="mini-total-price float-right" id="total_content"><span>
        </div>
        <div class="mini-action-anchors">
            <a href="{{ route('cart.list') }}" class="cart-anchor">View Cart</a>
            <a href="{{ route('cart.checkout') }}" class="checkout-anchor">Checkout</a>
        </div>
    </div>
</div>
