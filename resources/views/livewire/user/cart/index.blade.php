<div class="row" wire:poll>
    <div class="col-lg-12">
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
                    @foreach ($this->Cards as $item)
                        <tr>
                            <td class="thumbnail-img">
                                <a href="#">
                                    <img class="img-fluid"
                                        src="{{ asset('assets/landing/images/img-pro-01.jpg') }}"
                                        alt="" />
                                </a>
                            </td>
                            <td class="name-pr">
                                <a href="#">
                                    {{ Str::limit($item->name, 10, '...') }}
                                </a>
                            </td>
                            <td class="price-pr">
                                <p>
                                    {{ $item->price }}
                                </p>
                            </td>
                            <td class="quantity-box">
                                <p>{{ $item->quantity }}</p>
                                {{-- <input type="number" size="4"
                                    value="{{ $item->quantity }}" min="0" step="1"
                                    class="c-input-text qty text" width="100px"><br> --}}
                                <button class="btn btn-success" wire:click="increaseQantity({{$item->id}})">+</button>
                                <button class="btn btn-danger" wire:click="decreaseQantity({{$item->id}})">-</button>
                            </td>
                            <td class="total-pr">
                                <p>
                                    {{ $item->price * $item->quantity }}
                                </p>
                            </td>
                            <td class="remove-pr">
                                    <button wire:click="DeleteItem({{ $item->id }})" class="btn btn-link text-danger">
                                        <i class="fas fa-times"></i>
                                    </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

