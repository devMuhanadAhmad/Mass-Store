<x-front breadcrumb="Prodcts">

 <!-- Start Product Grids -->
 <section class="product-grids section">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-12">
                <!-- Start Product Sidebar -->
                <div class="product-sidebar">
                    <!-- Start Single Widget -->
                    <div class="single-widget search">
                        <h3>Search Product</h3>

                        <form action="{{route('front.store.show',$store)}}" method="get">
                            <input name="name" value="{{request('name')}}" placeholder="Enter name" class="form-control  mx-2">

                            <button type="submit"><i class="lni lni-search-alt"></i></button>
                        </form>
                    </div>
                    <!-- End Single Widget -->
                    <!-- Start Single Widget -->
                    <div class="single-widget">
                        <h3>All Categories</h3>
                        @foreach ($categories as $category)
                        <ul class="list">
                            <li>
                                <form action="{{route('front.store.show',$store)}}" method="get">
                                    <input type="hidden" value="{{$category->id}}" name="category" value="{{request('category')}}" >
                                <a><button style="border:none">{{$category->name}}</button></a>
                                </form>
                            </li>
                            <li></li>
                        </ul>

                        @endforeach
                    </div>

                     <!-- Start Single Widget -->
                    <x-tag-component />
                    <!-- End Single Widget -->
                    <!-- End Single Widget -->
                    <!-- Start Single Widget -->

                    <!-- End Single Widget -->
                    <!-- Start Single Widget -->

                    <!-- End Single Widget -->
                    <!-- Start Single Widget -->

                    <!-- End Single Widget -->
                </div>
                <!-- End Product Sidebar -->
            </div>

            <div class="col-lg-9 col-12">
                <div class="product-grids-head">

                    <div class="product-grid-topbar">
                        <div class="row align-items-center">
                            <div class="col-lg-7 col-md-8 col-12">
                                <div class="product-sorting">
                                    <label for="sorting">Sort by:</label>
                                    <select class="form-control" id="sorting">
                                        <option>Popularity</option>
                                        <option>Low - High Price</option>
                                        <option>High - Low Price</option>
                                        <option>Average Rating</option>
                                        <option>A - Z Order</option>
                                        <option>Z - A Order</option>
                                    </select>
                                    <h3 class="total-show-product">Showing: <span>1 - 12 items</span></h3>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-4 col-12">
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <button class="nav-link active" id="nav-grid-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-grid" type="button" role="tab"
                                            aria-controls="nav-grid" aria-selected="true"><i
                                                class="lni lni-grid-alt"></i></button>
                                        <button class="nav-link" id="nav-list-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-list" type="button" role="tab"
                                            aria-controls="nav-list" aria-selected="false"><i
                                                class="lni lni-list"></i></button>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>

                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-grid" role="tabpanel"
                            aria-labelledby="nav-grid-tab">
                            <div class="row">
                                @foreach ($products as $product)

                                <div class="col-lg-4 col-md-6 col-12">
                                    <!-- Start Single Product -->
                                    <div class="single-product">
                                        <div class="product-image">
                                            <img src="{{$product->image_url}}" style="height: 200px" alt="{{$product->slug}}">
                                            <span class="sale-tag">{{$product->sale_price}}%</span>
                                            <div class="button">
                                                <a href="{{route('front.showProduct',$product->slug)}}" class="btn"><i
                                                        class="lni lni-cart"></i> Add to Cart</a>
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
                                @endforeach


                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <!-- Pagination -->
                                    <div class="pagination left">
                                       {{$products->links()}}
                                    </div>
                                    <!--/ End Pagination -->
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-list" role="tabpanel" aria-labelledby="nav-list-tab">
                            <div class="row">
                                @forelse ($products as $product)
                                <div class="col-lg-12 col-md-12 col-12">
                                    <!-- Start Single Product -->
                                    <div class="single-product">
                                        <div class="row align-items-center">
                                            <div class="col-lg-4 col-md-4 col-12">
                                                <div class="product-image">
                                                    <img src="{{$product->image_url}}" style="height: 200px"  alt="{{$product->slug}}">
                                                    <span class="sale-tag">-{{$product->sale_price}}%</span>
                                                    <div class="button">
                                                        <a href="{{route('front.showProduct',$product->slug)}}" class="btn"><i
                                                                class="lni lni-cart"></i> Add to
                                                            Cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-8 col-md-8 col-12">
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
                                        </div>
                                    </div>
                                    <!-- End Single Product -->
                                </div>
                                @empty
                                <div class="mt-3 col-lg-4 col-md-6 col-12">
                                    <div class="alert alert-danger">No products defined.</div>
                                </div>

                                @endforelse
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <!-- Pagination -->
                                    <div class="pagination left">
                                        <ul class="pagination-list">
                                            {{$products->links()}}
                                        </ul>
                                    </div>
                                    <!--/ End Pagination -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Product Grids -->

 </x-front>
