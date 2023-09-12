<div class="cart-items">
    <a href="javascript:void(0)" class="main-btn">
        <i class="lni lni-cart"></i>
        <span class="total-items">{{$carts->count()}}</span>
    </a>
    <!-- Shopping Item -->
    <div class="shopping-item">
        <div class="dropdown-cart-header">
            <span>{{$carts->count()}} Items</span>
            <a href="{{route('front.cart.index')}}">View Cart</a>
        </div>
        <ul class="shopping-list">

            @forelse ($carts as $cart)
            <li>
                <form action="{{route('front.cart.destroy',$cart->id)}}" method="post">
                    @csrf
                    @method('delete')
                <button href="javascript:void(0)" class="remove" title="Remove this item"><i
                        class="lni lni-close"></i></button>
                </form>
                <div class="cart-img-head">
                    <a class="cart-img" href="{{route('front.showProduct',$cart->product->slug)}}"><img
                            src="{{$cart->product->image_url}}" alt="{{$cart->product->slug}}"></a>
                </div>
                <div class="content">
                    <h4><a href="product-details.html">{{$cart->product->name}}</a></h4>
                    <p class="quantity">{{$cart->quantity}}x - <span class="amount">${{$cart->product->price}}</span></p>
                </div>
            </li>
            @empty
            <small class="text-danger">Empty Cart</small>
            @endforelse
        </ul>
        <div class="bottom">
            <div class="total">
                <span>Total</span>
                <span class="total-amount">${{$cart->SubtotalPrice()}}</span>
            </div>
            <div class="button">
                <a href="{{route('front.checkout.index')}}" class="btn animate">Checkout</a>
            </div>
        </div>
    </div>
    <!--/ End Shopping Item -->
</div>
