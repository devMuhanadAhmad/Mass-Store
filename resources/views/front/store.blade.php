<x-front breadcrumb="Stores">


    <!-- Start Blog Singel Area -->
    <section class="section blog-section blog-list">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-12">
                    <div class="row">
                        @forelse ($stores as $store)
                        <div class="col-lg-6 col-md-6 col-12">
                            <!-- Start Single Blog -->
                            <div class="single-blog">
                                <div class="blog-img">
                                    <a href="{{route('front.store.show',$store->slug)}}">
                                        <img src="{{$store->image_url}}" style="height: 200px" alt="{{$store->slug}}">
                                    </a>
                                </div>
                                <div class="blog-content">
                                    <a class="category" href="javascript:void(0)">eCommerce</a>
                                    <h4>
                                        <a href="{{route('front.store.show',$store->slug)}}">{{$store->name}}</a>
                                    </h4>
                                    <p>{!! $store->notes !!}</p>
                                   <div class="row">

                                    <div class="button col-4 ">
                                        <a href="{{route('front.store.show',$store->slug)}}" style="border-bottom-color: rgb(18, 108, 226)" class="btn  btn-secondary">Show Store</a>
                                    </div>

                                   </div>
                                </div>
                            </div>
                            <!-- End Single Blog -->
                        </div>
                        @empty
                                    <div class="mt-2 col-lg-12 col-md-12 col-12">
                                        <div class="alert alert-danger">No stores defined.</div>
                                    </div>

                        @endforelse


                    </div>

                    <!-- Pagination -->
                    <div class="pagination left blog-grid-page">
                        <ul class="pagination-list">
                           {{$stores->links()}}
                        </ul>
                    </div>
                    <!--/ End Pagination -->
                </div>
                <aside class="col-lg-4 col-md-12 col-12">
                    <div class="sidebar blog-grid-page">
                        <!-- Start Single Widget -->
                        <div class="widget search-widget">
                            <h5 class="widget-title">Search Name Store</h5>
                            <form action="{{route('front.store.index')}}" method="get">
                                <input name="name" value="{{request('name')}}" placeholder="Enter name store" class="form-control  mx-2">

                                <button type="submit"><i class="lni lni-search-alt"></i></button>
                            </form>
                        </div>
                        <!-- End Single Widget -->

                                             <!-- Start Single Widget -->
                                             <x-new-product-component />
                                             <!-- End Single Widget -->
                                             <!-- Start Single Widget -->
                                             <x-tag-component />
                                             <!-- End Single Widget -->

                    </div>
                </aside>
            </div>
        </div>
    </section>
    <!-- End Blog Singel Area -->
</x-front>
