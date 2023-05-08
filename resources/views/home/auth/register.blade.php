@extends('home.master.master')

@section('content')
<div class="col-12">
    <!-- Main Content -->
    <div class="row">
        <div class="col-12 mt-3 text-center text-uppercase">
            <h2>Register</h2>
        </div>
    </div>

    <main class="row">
        <div class="col-lg-4 col-md-6 col-sm-8 mx-auto bg-white py-3 mb-4">
            <div class="row">
                <div class="col-12">
                    <form>
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" id="name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="password-confirm" class="form-label">Confirm Password</label>
                            <input type="password" id="password-confirm" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input type="checkbox" id="agree" class="form-check-input" required>
                                <label for="agree" class="form-check-label ml-2">I agree to Terms and Conditions</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-outline-dark">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </main>
    <!-- Main Content -->
</div>

<div class="col-12 align-self-end">
    <!-- Footer -->
    <footer class="row">
        <div class="col-12 bg-dark text-white pb-3 pt-5">
            <div class="row">
                <div class="col-lg-2 col-sm-4 text-center text-sm-left mb-sm-0 mb-3">
                    <div class="row">
                        <div class="col-12">
                            <div class="footer-logo">
                                <a href="index.html">E-Commerce</a>
                            </div>
                        </div>
                        <div class="col-12">
                            <address>
                                221B Baker Street<br>
                                London, England
                            </address>
                        </div>
                        <div class="col-12">
                            <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="social-icon"><i class="fab fa-pinterest-p"></i></a>
                            <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="social-icon"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-8 text-center text-sm-left mb-sm-0 mb-3">
                    <div class="row">
                        <div class="col-12 text-uppercase">
                            <h4>Who are we?</h4>
                        </div>
                        <div class="col-12 text-justify">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam imperdiet vel ligula vel sodales. Aenean vel ullamcorper purus, ac pharetra arcu. Nam enim velit, ultricies eu orci nec, aliquam efficitur sem. Quisque in sapien a sem vestibulum volutpat at eu nibh. Suspendisse eget est metus. Maecenas mollis quis nisl ac malesuada. Donec gravida tortor massa, vitae semper leo sagittis a. Donec augue turpis, rutrum vitae augue ut, venenatis auctor nulla. Sed posuere at erat in consequat. Nunc congue justo ut ante sodales, bibendum blandit augue finibus.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-3 col-5 ms-lg-auto ms-sm-0 ms-auto mb-sm-0 mb-3">
                    <div class="row">
                        <div class="col-12 text-uppercase">
                            <h4>Quick Links</h4>
                        </div>
                        <div class="col-12">
                            <ul class="footer-nav">
                                <li>
                                    <a href="#">Home</a>
                                </li>
                                <li>
                                    <a href="#">Contact Us</a>
                                </li>
                                <li>
                                    <a href="#">About Us</a>
                                </li>
                                <li>
                                    <a href="#">Privacy Policy</a>
                                </li>
                                <li>
                                    <a href="#">Terms & Conditions</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1 col-sm-2 col-4 me-auto mb-sm-0 mb-3">
                    <div class="row">
                        <div class="col-12 text-uppercase text-underline">
                            <h4>Help</h4>
                        </div>
                        <div class="col-12">
                            <ul class="footer-nav">
                                <li>
                                    <a href="#">FAQs</a>
                                </li>
                                <li>
                                    <a href="#">Shipping</a>
                                </li>
                                <li>
                                    <a href="#">Returns</a>
                                </li>
                                <li>
                                    <a href="#">Track Order</a>
                                </li>
                                <li>
                                    <a href="#">Report Fraud</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 text-center text-sm-left">
                    <div class="row">
                        <div class="col-12 text-uppercase">
                            <h4>Newsletter</h4>
                        </div>
                        <div class="col-12">
                            <form action="#">
                                <div class="mb-3">
                                    <input type="text" class="form-control" placeholder="Enter your email..." required>
                                </div>
                                <div class="mb-3">
                                    <button class="btn btn-outline-light text-uppercase">Subscribe</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer -->
</div>
@endsection
