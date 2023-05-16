<div class="attr-nav" wire:poll>
    <ul>
        <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
        <li class="side-menu">
            <a href="#">
                <i class="fa fa-shopping-bag"></i>
                <span class="badge">
                    {{ Cart::getTotalQuantity() }}
                </span>
                <p>My Cart</p>
            </a>
        </li>
    </ul>
</div>