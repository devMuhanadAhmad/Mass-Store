<x-front breadcrumb="Trader">


    <!-- Start Blog Singel Area -->
    <section class="section blog-section blog-list">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-12">
                    <div class="row">
                        @forelse ($users as $user)
                        <div class="col-lg-6 col-md-6 col-12">
                            <!-- Start Single Blog -->
                            <div class="single-blog">
                                <div class="blog-img">
                                    <a href="{{route('front.trader.show',$user->id)}}">
                                        <img src="{{$user->image_url}}" style="height: 200px" alt="{{$user->name}}">
                                    </a>
                                </div>
                                <div class="blog-content">
                                    <a class="category" href="javascript:void(0)">Trader</a>
                                    <h4>
                                        <a href="{{route('front.trader.show',$user->id)}}">{{$user->name}}</a>
                                    </h4>
                                    <p>{!! $user->notes !!}</p>

                                    <div class="button col-4 ">
                                        <a href="{{route('front.trader.show',$user->id)}}" style="border-bottom-color: grean" class="btn  btn-secondary">Show Profile</a>
                                        <a href="{{route('front.trader.show',$user->id)}}" style="border-bottom-color: grean" class="btn  btn-secondary">اشتراك</a>

                                    </div>

                                  
                                </div>
                            </div>
                            <!-- End Single Blog -->
                        </div>
                        @empty
                                    <div class="mt-2 col-lg-12 col-md-12 col-12">
                                        <div class="alert alert-danger">No users defined.</div>
                                    </div>

                        @endforelse


                    </div>

                    <!-- Pagination -->
                    <div class="pagination left blog-grid-page">
                        <ul class="pagination-list">
                           {{$users->links()}}
                        </ul>
                    </div>
                    <!--/ End Pagination -->
                </div>
                <aside class="col-lg-4 col-md-12 col-12">
                    <div class="sidebar blog-grid-page">
                        <!-- Start Single Widget -->
                        <div class="widget search-widget">
                            <h5 class="widget-title">Search This Name</h5>
                            <form action="{{route('front.trader.index')}}" method="get">
                                <input type="text" name="name" value="{{request('name')}}"  placeholder="Search Here...">
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
