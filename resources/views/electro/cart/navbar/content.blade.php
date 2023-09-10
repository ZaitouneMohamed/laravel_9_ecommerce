<div class="mini-cart-wrapper">
    <div class="mini-cart">
        <div class="mini-cart-header">
            YOUR CART
            <button type="button" class="button ion ion-md-close" id="mini-cart-close"></button>
        </div>
        @if (session('cart'))
            <ul class="mini-cart-list" id="cart_content">
            </ul>
            <div class="mini-shop-total clearfix">
                <span class="mini-total-heading float-left">Total:</span>
                <span class="mini-total-price float-right" id="total_content"><span>
            </div>
        @else
        @endif
        <div class="mini-action-anchors">
            <a href="{{ route('cart.list') }}" class="cart-anchor">View Cart</a>
            <a href="checkout.html" class="checkout-anchor">Checkout</a>
        </div>
    </div>
</div>
<script>
    function getCartContent() {
        $.ajax({
            type: 'GET',
            url: "{{ route('getCartContent') }}",
            success: function(response) {
                var cart = "";
                var total = 0;
                if (response.length > 0) {
                    response.forEach(function(item) {
                        total += item.price * item.quantity
                        cart +=
                            `
                            <li class="clearfix">
                                <a href="single-product.html">
                                    <img src="` + item.image + `" alt="Product">
                                    <span class="mini-item-name">` + item.title + `</span>
                                    <span class="mini-item-price">` + item.price + `</span>
                                    <span class="mini-item-quantity"> x ` + item.quantity + ` </span>
                                </a>
                            </li>
                            `
                    });
                } else {
                    cart = "<li>Your cart is empty</li>";
                }
                document.getElementById('cart_content').innerHTML = cart;
                document.getElementById('total_content').innerHTML = "$" + total;
                console.log(cart)
            },
            error: function() {
                console.log('An error occurred.');
            }
        });
    }

    setInterval(() => {
        getCartContent();
    }, 1000);
</script>
