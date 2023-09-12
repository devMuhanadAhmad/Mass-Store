<!-- Start Trending Product Area -->
<section class="trending-product section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>Trending Product</h2>
                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                        suffered alteration in some form.</p>
                </div>
            </div>
        </div>
        <div class="row">
@forelse ($products as $product)

<div class="col-lg-3 col-md-6 col-12">
    <!-- Start Single Product -->
    <div class="single-product">
        <div class="product-image">
            <img src="{{$product->image_url}}" style="height: 200px" alt="{{$product->slug}}">
            <span class="sale-tag">-{{$product->sale_price}}%</span>
            <div class="button">
                <a href="{{route('front.showProduct',$product->slug)}}" class="btn"><i class="lni lni-cart"></i> Add to Cart</a>
            </div>
        </div>
        <div class="product-info">
            <span class="category">{{$product->category->name}}</span>
            <h4 class="title">
                <a href="{{route('front.showProduct',$product->slug)}}">{{$product->name}}</a>
            </h4>
            <ul class="review">
                @if ($product->rating >=5 && $product->rating <= 5)
                <li><i class="lni lni-star-filled"></i></li>
                <li><i class="lni lni-star-filled"></i></li>
                <li><i class="lni lni-star-filled"></i></li>
                <li><i class="lni lni-star-filled"></i></li>
                <li><i class="lni lni-star-filled"></i></li>
                @elseif ($product->rating >=4 && $product->rating < 5)
                <li><i class="lni lni-star-filled"></i></li>
                <li><i class="lni lni-star-filled"></i></li>
                <li><i class="lni lni-star-filled"></i></li>
                <li><i class="lni lni-star-filled"></i></li>
                <li><i class="lni lni-star"></i></li>
                @elseif ($product->rating >=3 && $product->rating < 4)
                <li><i class="lni lni-star-filled"></i></li>
                <li><i class="lni lni-star-filled"></i></li>
                <li><i class="lni lni-star-filled"></i></li>
                <li><i class="lni lni-star"></i></li>
                <li><i class="lni lni-star"></i></li>
                @elseif ($product->rating >=2 && $product->rating < 3)
                <li><i class="lni lni-star-filled"></i></li>
                <li><i class="lni lni-star-filled"></i></li>
                <li><i class="lni lni-star"></i></li>
                <li><i class="lni lni-star"></i></li>
                <li><i class="lni lni-star"></i></li>
                @elseif ($product->rating >=1 && $product->rating < 2)
                <li><i class="lni lni-star-filled"></i></li>
                <li><i class="lni lni-star"></i></li>
                <li><i class="lni lni-star"></i></li>
                <li><i class="lni lni-star"></i></li>
                <li><i class="lni lni-star"></i></li>
                @elseif ($product->rating < 1)
                <li><i class="lni lni-star"></i></li>
                <li><i class="lni lni-star"></i></li>
                <li><i class="lni lni-star"></i></li>
                <li><i class="lni lni-star"></i></li>
                <li><i class="lni lni-star"></i></li>
                @endif
                <li><span>{{$product->rating}} Review(s)</span></li>
            </ul>
            <div class="price">
                <span>${{$product->price}}</span>
                <span class="discount-price">${{$product->compare_price}}</span>
            </div>
        </div>
    </div>
    <!-- End Single Product -->
</div>
@empty
<tr>
    <td colspan="9">{{ __('No products defined.') }}</td>
</tr>
@endforelse

        </div>
    </div>
</section>
<!-- End Trending Product Area -->
