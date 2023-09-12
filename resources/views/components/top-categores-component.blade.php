<div class="widget categories-widget">
    <h5 class="widget-title">Top Categories</h5>
    <ul class="custom">
        @foreach ($categories as $category)
        <li>
            <a href="javascript:void(0)">{{$category->parent_id}}</a><span>(24)</span>
        </li>
        @endforeach


    </ul>
</div>
