<x-front breadcrumb="Trader">


<!-- Start Blog Singel Area -->
<section class="section blog-single">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1 col-md-12 col-12">
                <div class="single-inner">
                    <div class="post-details">
                        <div class="main-content-head">
                            <div class="post-thumbnils">
                                <img src="{{$user->profile->image_url}}" style="height: 350px"  alt="{{$user->name}}">
                            </div>
                            <div class="meta-information">
                                <h2 class="post-title">
                                    <a href="blog-single.html"> {{$user->profile->first_name}} {{$user->profile->last_name}}</a>
                                </h2>
                                <!-- End Meta Info -->
                                <ul class="meta-info">
                                    <li>
                                        <a href="javascript:void(0)"> <i class="lni lni-user"></i>{{$user->name}}</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)"><i class="lni lni-calendar"></i> {{$user->created_at->diffForHumans()}}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)"><i class="lni lni-tag"></i> {{$user->profile->job_name ?? 'job'}}</a>
                                    </li>

                                </ul>
                                <!-- End Meta Info -->
                            </div>
                            <div class="detail-inner">

                                <!-- post image -->


                                <!-- post quote -->
                                <blockquote>
                                    <div class="icon">
                                        <i class="lni lni-quotation"></i>
                                    </div>
                                    <h4>" {{$user->notes}}"</h4>
                                    <span>-{{$user->name}} </span>
                                </blockquote>


                                <div class="post-bottom-area">
                                    <!-- Start Post Tag -->

                                    <!-- End Post Tag -->
                                    <!-- Post Social Share -->
                                    <div class="post-social-media">
                                        <h5 class="share-title">Share post :</h5>
                                        <ul>
                                            <li>
                                                <a href="javascript:void(0)">
                                                    <i class="lni lni-facebook-filled"></i>
                                                    <span>facebook</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)">
                                                    <i class="lni lni-twitter-original"></i>
                                                    <span>twitter</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)">
                                                    <i class="lni lni-google"></i>
                                                    <span>google+</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)">
                                                    <i class="lni lni-linkedin-original"></i>
                                                    <span>linkedin</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)">
                                                    <i class="lni lni-pinterest"></i>
                                                    <span>pinterest</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- Post Social Share -->
                                </div>
                            </div>
                        </div>
                        <!-- Comments -->
                        @auth('web')
                            <div class="post-comments">
                            <h3 class="comment-title"><span>Post Message</span></h3>
                            @forelse ($chats as $chat)
                            <ul class="comments-list">
                                <li>
                                    <div class="comment-img">
                                        <img src="{{$chat->user->profile->image_url}}" alt="{{$chat->user->name}}">
                                    </div>
                                    <div class="comment-desc">
                                        <div class="desc-top">
                                            <h6>{{$chat->user->name}}</h6>
                                            <span class="date">{{$chat->created_at}}</span>
                                        </div>
                                        <p>
                                           {{$chat->message}}
                                        </p>
                                    </div>
                                    <form action="{{route('front.chat.destroy',$chat->id)}}" method="post">
                                        @method('delete')
                                        @csrf
                                        <button class="mt-2 btn btn-outline-danger btn-sm" type="submit">Delete</button>
                                    </form>
                                </li>
                               <br>
                             <!--
                                 <li class="children">
                                    <div class="comment-img">
                                        <img src="https://via.placeholder.com/150x150" alt="img">
                                    </div>
                                    <div class="comment-desc">
                                        <div class="desc-top">
                                            <h6>Rosalina Kelian</h6>
                                            <span class="date">15th May 2023</span>
                                            <a href="javascript:void(0)" class="reply-link"><i
                                                    class="lni lni-reply"></i>Reply</a>
                                        </div>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim.
                                        </p>
                                    </div>
                                </li>
                             -->

                            </ul>
                            @empty
                            <ul class="comments-list">No message define ! </ul>
                            @endforelse
                        </div>
                        <div class="comment-form">
                            <h3 class="comment-reply-title">Add Message </h3>
                            <form action="{{route('front.chat.store')}}" method="POST">
                                @csrf
                                <div class="row">
                                        <input name="recipient_user_id" type="hidden" value="{{$user->id}}" />
                                    <div class="col-12">
                                        <div class="form-box form-group">
                                            <textarea name="message" class="form-control form-control-custom"
                                                placeholder="Your Comments" required></textarea>
                                        </div>
                                        @error('message')
                                           <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <div class="button">
                                            <button type="submit" class="btn">Send Trader</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        @else
                        <div class="comment-form">
                            <h3 class="comment-reply-title text-danger">Before sending a message, you must <button class="btn btn-primary"><a href="{{route('login')}}">log in</a></button></h3>

                                <div class="row">

                                    <div class="col-12">
                                        <div class="form-box form-group">
                                            <textarea name="message" rows="7" class="form-control form-control-custom"
                                                placeholder="Your Comments" readonly></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="button">
                                            <button type="btn" class="btn mt-2">Post Message</button>
                                        </div>
                                    </div>
                                </div>

                        </div>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Blog Singel Area -->


</x-front>
