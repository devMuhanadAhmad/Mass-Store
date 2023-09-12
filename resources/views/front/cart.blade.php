<x-front breadcrumb="Cart">
    <!-- Shopping Cart -->
    <div class="shopping-cart section">
        <div class="container">
            <div class="cart-list-head">
                <!-- Cart List Title -->
                <div class="cart-list-title">
                    <div class="row">
                        <div class="col-lg-1 col-md-1 col-12">

                        </div>
                        <div class="col-lg-4 col-md-3 col-12">
                            <p>Product Name</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>Quantity</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>Subtotal</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>Discount</p>
                        </div>
                        <div class="col-lg-1 col-md-2 col-12">
                            <p>Remove</p>
                        </div>
                    </div>
                </div>
                <!-- End Cart List Title -->
                <!-- Cart Single List list -->
     @forelse ($carts as $cart)

     <div class="cart-single-list">
       <div class="row align-items-center">
           <div class="col-lg-1 col-md-1 col-12">
               <a href="product-details.html"><img src="{{$cart->product->image_url}}" alt="{{$cart->product->slug}}"></a>
           </div>
           <div class="col-lg-4 col-md-3 col-12">
               <h5 class="product-name"><a href="{{route('front.showProduct',$cart->product->slug)}}">
                      {{$cart->product->name}}</a></h5>
               <p class="product-des">
                   <span><em>Type:</em> {{$cart->product->category->name}}</span>

               </p>
           </div>
           <div class="col-lg-2 col-md-2 col-12">
              {{-- <input class="count-input" name="quantity" value="{{$cart->quantity}}">--}}
              {{$cart->quantity}}

           </div>
           <div class="col-lg-2 col-md-2 col-12">
               <p>{{$cart->product->price * $cart->quantity}}</p>
           </div>
           <div class="col-lg-2 col-md-2 col-12">
               <p>$29.00</p>
           </div>
           <div class="col-lg-1 col-md-2 col-12">
           <form action="{{route('front.cart.destroy',$cart->id)}}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="remove-item" ><i class="lni lni-close"></i></button>
           </form>
           </div>
       </div>
   </div>
   @empty
         <p class=" m-2 text-danger">Empty Cart .</p>
     @endforelse
                <!-- End Single List list -->

            </div>
            <div class="row">
                <div class="col-12">
                    <!-- Total Amount -->
                    <div class="total-amount">
                        <div class="row">
                            <div class="col-lg-8 col-md-6 col-12">
                                <div class="left">
                                    <div class="coupon">
                                        <form action="#" target="_blank">
                                            <input name="Coupon" placeholder="Enter Your Coupon">
                                            <div class="button">
                                                <button class="btn">Apply Coupon</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="right">
                                    <ul>
                                        <li>Cart Subtotal<span>${{$cart->SubtotalPrice()}}</span></li>
                                        {{--<li>Shipping<span>Free</span></li>
                                        <li>You Save<span>$29.00</span></li>--}}
                                        <li class="last">You Pay<span>${{$cart->SubtotalPrice()}}</span></li>
                                    </ul>
                                    <div class="button">
                                        <a href="{{route('front.checkout.index')}}" class="btn">Checkout</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ End Total Amount -->
                </div>
            </div>
        </div>
    </div>
    <!--/ End Shopping Cart -->
</x-front>
