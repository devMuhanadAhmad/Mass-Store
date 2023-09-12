<x-front breadcrumb="Checkout">
    <!--====== Checkout Form Steps Part Start ======-->

    <section class="checkout-wrapper section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="checkout-steps-form-style-1">
                        <ul id="accordionExample">
                            <form action="{{route('front.checkout.store')}}" method="post">
                            @csrf

                            <li>
                                <h6 class="title" data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                    aria-expanded="true" aria-controls="collapseThree">Your Personal Details </h6>
                                <section class="checkout-steps-form-content collapse show" id="collapseThree"
                                    aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="single-form form-default">
                                                <label>User Name</label>
                                                <div class="row">
                                                    <div class="col-md-6 form-input form">
                                                        <input name="billing_first_name"
                                                            value="{{ old('billing_first_name') }}" type="text"
                                                            placeholder="First Name">
                                                        @error('billing_first_name')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-6 form-input form">
                                                        <input name="billing_last_name"
                                                            value="{{ old('billing_last_name') }}" type="text"
                                                            placeholder="Last Name">
                                                        @error('billing_last_name')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="single-form form-default">
                                                <label>Email Address</label>
                                                <div class="form-input form">
                                                    <input name="billing_email" value="{{ old('billing_email') }}"
                                                        type="email" placeholder="Email Address">
                                                    @error('billing_email')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="single-form form-default">
                                                <label>Phone Number</label>
                                                <div class="form-input form">
                                                    <input name="billing_phone_number"
                                                        value="{{ old('billing_phone_number') }}" type="text"
                                                        placeholder="Phone Number">
                                                    @error('billing_phone_number')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="single-form form-default">
                                                <label>Street Address</label>
                                                <div class="form-input form">
                                                    <input name="billing_street_address" value="{{old('billing_street_address')}}" type="text" placeholder="Mailing Address">
                                                @error('billing_street_address')
                                                <small class="text-danger">{{$message}}</small>
                                                @enderror
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="single-form form-default">
                                                <label>City</label>
                                                <div class="form-input form">
                                                    <input name="billing_city" value="{{old('billing_city')}}" type="text" placeholder="City">
                                                @error('billing_city')
                                                <small class="text-danger">{{$message}}</small>
                                                @enderror
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="single-form form-default">
                                                <label>Post Code</label>
                                                <div class="form-input form">
                                                    <input name="billing_postal_code" value="{{old('billing_postal_code')}}" type="number" placeholder="Post Code">
                                                @error('billing_postal_code')
                                                <small class="text-danger">{{$message}}</small>
                                                @enderror
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="single-form form-default">
                                                <label>Country</label>
                                                <div class="form-input form">
                                                    <input name="billing_country" value="{{old('billing_country')}}" type="text" placeholder="Country">
                                                @error('billing_country')
                                                <small class="text-danger">{{$message}}</small>
                                                @enderror
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="single-form form-default">
                                                <label>Region/State</label>
                                                <div class="form-input form">
                                                    <input name="billing_state" value="{{old('billing_state')}}" type="text" placeholder="Region/State">
                                                @error('billing_state')
                                                <small class="text-danger">{{$message}}</small>
                                                @enderror
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="single-checkbox checkbox-style-3">
                                                <input type="checkbox" id="checkbox-3">
                                                <label for="checkbox-3"><span></span></label>
                                                <p>My delivery and mailing addresses are the same.</p>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="single-form button">
                                                <a class="btn" data-bs-toggle="collapse"
                                                    data-bs-target="#collapseFour" aria-expanded="false"
                                                    aria-controls="collapseFour">next
                                                    step</a>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </li>
                            <li>
                                <h6 class="title collapsed" data-bs-toggle="collapse" data-bs-target="#collapseFour"
                                    aria-expanded="false" aria-controls="collapseFour">Shipping Address</h6>
                                <section class="checkout-steps-form-content collapse" id="collapseFour"
                                    aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="single-form form-default">
                                                <label>User Name</label>
                                                <div class="row">
                                                    <div class="col-md-6 form-input form">
                                                        <input name="shipping_first_name" value="{{old('shipping_first_name')}}" type="text" placeholder="First Name">
                                                    </div>
                                                    @error('shipping_last_name')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                                    <div class="col-md-6 form-input form">
                                                        <input name="shipping_last_name" value="{{old('shipping_last_name')}}" type="text" placeholder="Last Name">
                                                    </div>
                                                    @error('shipping_last_name')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="single-form form-default">
                                                <label>Email Address</label>
                                                <div class="form-input form">
                                                    <input name="shipping_email" value="{{old('shipping_email')}}" type="email" placeholder="Email Address">
                                                </div>
                                                @error('shipping_email')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="single-form form-default">
                                                <label>Phone Number</label>
                                                <div class="form-input form">
                                                    <input name="shipping_phone_number" value="{{old('shipping_phone_number')}}" type="text" placeholder="Phone Number">
                                                </div>
                                                @error('shipping_phone_number')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="single-form form-default">
                                                <label>Street Address</label>
                                                <div class="form-input form">
                                                    <input name="shipping_street_address" type="text" placeholder="Mailing Address">
                                                </div>
                                                @error('shipping_street_address')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="single-form form-default">
                                                <label>City</label>
                                                <div class="form-input form">
                                                    <input name="shipping_city" type="text" placeholder="City">
                                                </div>
                                                @error('shipping_city')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="single-form form-default">
                                                <label>Post Code</label>
                                                <div class="form-input form">
                                                    <input name="shipping_postal_code" type="number" placeholder="Post Code">
                                                </div>
                                                @error('shipping_postal_code')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="single-form form-default">
                                                <label>Region/State</label>
                                                <div class="form-input form">
                                                    <input name="shipping_state" type="text" placeholder="Region/State">
                                                </div>
                                                @error('shipping_state')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="single-form form-default">
                                                <label>Country</label>
                                                <div class="form-input form">
                                                    <input name="shipping_country" type="text" placeholder="Country">
                                                </div>
                                                @error('shipping_country')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="checkout-payment-option">
                                                <h6 class="heading-6 font-weight-400 payment-title">Select Delivery
                                                    Option</h6>
                                                <div class="payment-option-wrapper">
                                                    <div class="single-payment-option">
                                                        <input type="radio" name="shipping" checked
                                                            id="shipping-1">
                                                        <label for="shipping-1">
                                                            <img src="https://via.placeholder.com/60x32"
                                                                alt="Sipping">
                                                            <p>Standerd Shipping</p>
                                                            <span class="price">$10.50</span>
                                                        </label>
                                                    </div>
                                                    <div class="single-payment-option">
                                                        <input type="radio" name="shipping" id="shipping-2">
                                                        <label for="shipping-2">
                                                            <img src="https://via.placeholder.com/60x32"
                                                                alt="Sipping">
                                                            <p>Standerd Shipping</p>
                                                            <span class="price">$10.50</span>
                                                        </label>
                                                    </div>
                                                    <div class="single-payment-option">
                                                        <input type="radio" name="shipping" id="shipping-3">
                                                        <label for="shipping-3">
                                                            <img src="https://via.placeholder.com/60x32"
                                                                alt="Sipping">
                                                            <p>Standerd Shipping</p>
                                                            <span class="price">$10.50</span>
                                                        </label>
                                                    </div>
                                                    <div class="single-payment-option">
                                                        <input type="radio" name="shipping" id="shipping-4">
                                                        <label for="shipping-4">
                                                            <img src="https://via.placeholder.com/60x32"
                                                                alt="Sipping">
                                                            <p>Standerd Shipping</p>
                                                            <span class="price">$10.50</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="steps-form-btn button">
                                                <a class="btn" data-bs-toggle="collapse"
                                                    data-bs-target="#collapseThree" aria-expanded="false"
                                                    aria-controls="collapseThree">previous</a>
                                                <button type="submit" href="javascript:void(0)"  class="btn btn-alt">Save & Continue</button>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </li>
                        </form>
                            <li>
                                <h6 class="title collapsed" data-bs-toggle="collapse" data-bs-target="#collapsefive"
                                    aria-expanded="false" aria-controls="collapsefive">Payment Info</h6>
                                <section class="checkout-steps-form-content collapse" id="collapsefive"
                                    aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="checkout-payment-form">
                                                <div class="single-form form-default">
                                                    <label>Cardholder Name</label>
                                                    <div class="form-input form">
                                                        <input type="text" placeholder="Cardholder Name">
                                                    </div>
                                                </div>
                                                <div class="single-form form-default">
                                                    <label>Card Number</label>
                                                    <div class="form-input form">
                                                        <input id="credit-input" type="text"
                                                            placeholder="0000 0000 0000 0000">
                                                        <img src="assets/images/payment/card.png" alt="card">
                                                    </div>
                                                </div>
                                                <div class="payment-card-info">
                                                    <div class="single-form form-default mm-yy">
                                                        <label>Expiration</label>
                                                        <div class="expiration d-flex">
                                                            <div class="form-input form">
                                                                <input type="text" placeholder="MM">
                                                            </div>
                                                            <div class="form-input form">
                                                                <input type="text" placeholder="YYYY">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="single-form form-default">
                                                        <label>CVC/CVV <span><i
                                                                    class="mdi mdi-alert-circle"></i></span></label>
                                                        <div class="form-input form">
                                                            <input type="text" placeholder="***">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="single-form form-default button">
                                                    <button class="btn">pay now</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="checkout-sidebar">
                        <div class="checkout-sidebar-coupon">
                            <p>Appy Coupon to get discount!</p>
                            <form action="#">
                                <div class="single-form form-default">
                                    <div class="form-input form">
                                        <input type="text" placeholder="Coupon Code">
                                    </div>
                                    <div class="button">
                                        <button class="btn">apply</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="checkout-sidebar-price-table mt-30">
                            <h5 class="title">Pricing Table</h5>

                            <div class="sub-total-price">
                                <div class="total-price">
                                    <p class="value">Subotal Price:</p>
                                    <p class="price">${{$cart->SubtotalPrice()}}</p>
                                </div>

                            </div>

                            <div class="total-payable">
                                <div class="payable-price">
                                    <p class="value">Subotal Price:</p>
                                    <p class="price text-primary">${{$cart->SubtotalPrice()}}</p>
                                </div>
                            </div>
                            <div class="price-table-btn button">
                                <a href="javascript:void(0)" class="btn btn-alt">Checkout</a>
                            </div>
                        </div>
                        <div class="checkout-sidebar-banner mt-30">
                            <a href="product-grids.html">
                                <img src="https://via.placeholder.com/400x330" alt="#">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====== Checkout Form Steps Part Ends ======-->
</x-front>
