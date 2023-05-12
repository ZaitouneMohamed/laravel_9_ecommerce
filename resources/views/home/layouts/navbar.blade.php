<div class="col-12">
    <header class="row">
        <!-- Top Nav -->
        <div class="col-12 bg-dark py-2 d-md-block d-none">
            <div class="row">
                <div class="col-auto me-auto">
                    <ul class="top-nav">
                        <li>
                            <a href="tel:+123-456-7890"><i class="fa fa-phone-square me-2"></i>+123-456-7890</a>
                        </li>
                        <li>
                            <a href="mailto:mail@ecom.com"><i class="fa fa-envelope me-2"></i>mail@ecom.com</a>
                        </li>
                    </ul>
                </div>
                <div class="col-auto">
                    <ul class="top-nav">
                        @guest
                            <li>
                                <a href="/register"><i class="fas fa-user-edit me-2"></i>Register</a>
                            </li>
                            <li>
                                <a href="/login"><i class="fas fa-sign-in-alt me-2"></i>Login</a>
                            </li>
                        @endguest
                        @auth
                            <li>
                                <a href="#"><i class="fas fa-user"></i>Profile</a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}"><i class="fas fa-sign-in-alt me-2"></i>Log Out</a>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </div>
        <!-- Top Nav -->

        <!-- Header -->
        <div class="col-12 bg-white pt-4">
            <div class="row">
                <div class="col-lg-auto">
                    <div class="site-logo text-center text-lg-left">
                        <a href="index.html">E-Commerce</a>
                    </div>
                </div>
                <div class="col-lg-5 mx-auto mt-4 mt-lg-0">
                    <form action="#">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="search" class="form-control border-dark" placeholder="Search..." required>
                                <button class="btn btn-outline-dark"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-auto text-center text-lg-left header-item-holder">
                    <a href="#" class="header-item">
                        <i class="fas fa-heart me-2"></i><span id="header-favorite">0</span>
                    </a>
                    <a href="{{ route('cart.list') }}" class="header-item">
                        <i class="fas fa-shopping-bag me-2"></i><span id="header-qty"
                            class="me-3">{{ Cart::getTotalQuantity() }}</span>
                        <i class="fas fa-money-bill-wave me-2"></i><span id="header-price">$4,000</span>
                    </a>
                </div>
            </div>

            <!-- Nav -->
            <div class="row">
                <nav class="navbar navbar-expand-lg navbar-light bg-white col-12">
                    <button class="navbar-toggler d-lg-none border-0" type="button" data-bs-toggle="collapse"
                        data-bs-target="#mainNav">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="mainNav">
                        <ul class="navbar-nav mx-auto mt-2 mt-lg-0">
                            <li class="nav-item active">
                                <a class="nav-link" href="index.html"><b>Home</b> <span
                                        class="sr-only">(current)</span></a>
                            </li>
                            @foreach (\App\Models\Categorie::latest()->get() as $item)
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="electronics"
                                        data-bs-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false"><b>{{ $item->name }}</b></a>
                                    <div class="dropdown-menu" aria-labelledby="electronics">
                                        @foreach ($item->subcategories as $item)
                                            <a class="dropdown-item" href=""><b>{{ $item->name }}</b></a>
                                        @endforeach
                                    </div>
                                </li>
                            @endforeach
                            @auth
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="electronics"
                                        data-bs-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false"><b>{{ Auth::user()->name }}</b></a>
                                    <div class="dropdown-menu" aria-labelledby="electronics">
                                        <a class="dropdown-item" href="#"><b>profile</b></a>
                                        <a class="dropdown-item" href="#"><b>my orders</b> </a>
                                    </div>
                                </li>
                            @endauth
                        </ul>
                    </div>
                </nav>
            </div>
            <!-- Nav -->

        </div>
        <!-- Header -->

    </header>
</div>
