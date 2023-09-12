<div class="widget popular-feeds">
    <h5 class="widget-title">New Product</h5>
    @foreach ($products  as $product)
    <div class="popular-feed-loop mb-1">
        <div class="single-popular-feed">
            <div class="feed-desc">
                <a class="feed-img" href="{{route('front.showProduct',$product->slug)}}">
                    <img src="{{$product->image_url}}" alt="{{$product->slug}}">
                </a>
                <h6 class="post-title"><a href="{{route('front.showProduct',$product->slug)}}">{{$product->name}}</a></h6>
                <span class="time">{{$product->category->name}}</span>

                <span class="time"><i class="lni lni-calendar"></i> {{$product->created_at->diffForHumans()}}</span>
            </div>
        </div>
    </div>
    @endforeach
</div>
