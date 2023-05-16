<div class="products-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-all text-center">
                    <h1>Latest Products {{$product_id}} </h1>
                </div>
            </div>
        </div>
        <div class="row special-list">
            @foreach ($this->Products as $item)
                <div class="col-lg-3 col-md-6 special-grid top-featured">
                    <div class="products-single fix">
                        <div class="box-img-hover">
                            <div class="type-lb">
                                <p class="new">New</p>
                            </div>
                            <img src="{{ asset('assets/landing/images/img-pro-02.jpg') }}" class="img-fluid"
                                alt="Image">
                            <div class="mask-icon">
                                <ul>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i
                                                class="fas fa-eye"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right"
                                            title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right"
                                            title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                </ul>
                                {{-- <form action="{{route('cart.store')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method("post")
                                    <input type="hidden" value="{{ $item->id }}" name="id">
                                    <input type="hidden" value="{{ $item->title }}" name="name">
                                    <input type="hidden" value="{{ $item->price }}" name="price">
                                    <input type="hidden" value="{{ $item->image }}" name="image">
                                    <input type="hidden" value="1" name="quantity">
                                </form> --}}
                                <button class="cart" wire:click="AddToCard({{ $item->id }})">Add to Cart</button>
                            </div>
                        </div>
                        <div class="why-text">
                            <h4>{{ $item->title }}</h4>
                            <h5> ${{ $item->price }}</h5>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>