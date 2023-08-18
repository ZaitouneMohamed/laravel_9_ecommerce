@extends('electro.layouts.master')

@section('content')
    <div class="table-main table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Images</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Remove</th>
                </tr>
            </thead>
            <tbody>

                <tr rowid="1">
                    <td class="thumbnail-img">
                        <a href="#">
                            <img class="img-fluid"
                                src="https://mzecomme.electroniqueclasse.com/assets/landing/images/img-pro-01.jpg"
                                alt="">
                        </a>
                    </td>
                    <td class="name-pr">
                        <a href="#">
                            product 1
                        </a>
                    </td>
                    <td class="price-pr">
                        <p>
                            160.00
                        </p>
                    </td>
                    <td class="quantity-box">
                        <input min="1" type="number" id="1" value="1" onblur="edit(1,160.00)">
                    </td>
                    <td class="total-pr">
                        <p id="total1">
                            160
                        </p>
                    </td>
                    <td class="remove-pr">
                        <button class="btn btn-link text-danger delete-product">
                            <i class="fas fa-times" aria-hidden="true"></i>
                        </button>
                    </td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5" class="text-right">
                        <a href="/" class="btn btn-primary"><i class="fa fa-angle-left" aria-hidden="true"></i>
                            Continue
                            Shopping</a>
                        <button class="btn btn-danger">Checkout</button>
                    </td>
                </tr>
            </tfoot>

        </table>
    </div>
@endsection

@section("BREADCRUMB")
    <!--  -->
    <div id="breadcrumb" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb-tree">
                        <li><a href="#">Home</a></li>
                        <li class="active">Cart</li>
                    </ul>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /BREADCRUMB -->
@endsection
