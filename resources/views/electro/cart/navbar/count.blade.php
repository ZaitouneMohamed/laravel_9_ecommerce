<div>
    <li>
        <a id="mini-cart-trigger">
            <i class="ion ion-md-basket"></i>
            <span class="item-counter" id="count"></span>
            <span class="item-price" id="total"><span>
        </a>
    </li>
</div>

<script>
    function getCartCount() {
        $.ajax({
            type: 'GET',
            url: "{{ route('getCartCount') }}",
            success: function(response) {
                document.getElementById('count').innerHTML = response.count;
                document.getElementById('total').innerHTML = response.total;
            },
            error: function() {
                console.log('An error occurred.');
            }
        });
    }

    setInterval(() => {
        getCartCount();
    }, 1000);
</script>
