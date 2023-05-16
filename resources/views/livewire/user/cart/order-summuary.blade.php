<div class="col-lg-3 col-sm-12" wire:poll>
    <div class="order-box">
        <h3>Order summary</h3>
        <div class="d-flex">
            <h4>Sub Total</h4>
            <div class="ml-auto font-weight-bold"> ${{ Cart::getTotal() }} </div>
        </div>
        <div class="d-flex">
            <h4>Discount</h4>
            <div class="ml-auto font-weight-bold"> $ 0 </div>
        </div>
        <hr class="my-1">
        <div class="d-flex">
            <h4>Coupon Discount</h4>
            <div class="ml-auto font-weight-bold"> $ 0 </div>
        </div>
        <div class="d-flex">
            <h4>Tax</h4>
            <div class="ml-auto font-weight-bold"> $ 0 </div>
        </div>
        <div class="d-flex">
            <h4>Shipping Cost</h4>
            <div class="ml-auto font-weight-bold"> Free </div>
        </div>
        <hr>
        <div class="d-flex gr-total">
            <h5>Grand Total</h5>
            <div class="ml-auto h5"> $ {{ Cart::getTotal() + 30 }} </div>
        </div>
        <hr>
    </div>
</div>