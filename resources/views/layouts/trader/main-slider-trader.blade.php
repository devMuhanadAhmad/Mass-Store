<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="sidebar-brand brand-logo" href="index.html"><img src="assets/images/logo.svg"
                alt="logo" /></a>
        <a class="sidebar-brand brand-logo-mini" href="index.html"><img src="assets/images/logo-mini.svg"
                alt="logo" /></a>
    </div>
    <ul class="nav">
        <li class="nav-item profile">
            <div class="profile-desc">
                <div class="profile-pic">
                    @auth('web')
                        <div class="count-indicator">
                            <img class="img-xs rounded-circle " src="{{ Auth::user()->profile->image_url }}"
                                alt="">
                            <span class="count bg-success"></span>
                        </div>
                        <div class="profile-name">
                            <h5 class="mb-0 font-weight-normal">{{ Auth::user()->name }}</h5>
                            <span>{{ Auth::user()->email }}</span>
                        </div>
                    @endauth

                    @guest
                        <div class="count-indicator">
                            <img class="img-xs rounded-circle " src="{{ asset('assets/images/faces/face15.jpg') }}"
                                alt="">
                            <span class="count bg-success"></span>
                        </div>
                        <div class="profile-name">
                            <h5 class="mb-0 font-weight-normal">guest</h5>
                            <span>guest</span>
                        </div>
                    @endguest
                </div>

            </div>
        </li>
        <li class="nav-item nav-category">
            <span class="nav-link">{{__("Trader Dashboard")}} </span>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-speedometer"></i>
                </span>
                <span class="menu-title">{{__("Dashboard")}}</span>
            </a>
        </li>

       @if (Auth::user()->store_id)
       <li class="nav-item menu-items">
        <a class="nav-link" href="{{ route('trader.product.index') }}">
            <span class="menu-icon">
                <i class="mdi mdi-calendar-multiple-check"></i>
            </span>
            <span class="menu-title">{{ __('Products') }}</span>
        </a>
    </li>
       @endif
       <li class="nav-item menu-items">
        <a class="nav-link" href="{{ route('admin.trader.order') }}">
            <span class="menu-icon">
                <i class="mdi mdi-calendar-multiple-check"></i>
            </span>
            <span class="menu-title">{{ __('Orders') }}</span>
        </a>
    </li>
       <li class="nav-item menu-items">
        <a class="nav-link" href="{{ route('front.chat.index') }}">
            <span class="menu-icon">
                <i class="mdi mdi-calendar-multiple-check"></i>
            </span>
            <span class="menu-title">{{ __('Messages') }}</span>
        </a>
    </li>

    <li class="nav-item menu-items">
        <a class="nav-link" href="{{ route('front.chat.index') }}">
            <span class="menu-icon">
                <i class="mdi mdi-calendar-multiple-check"></i>
            </span>
            <span class="menu-title">{{ __('اشتراكات ') }}</span>
        </a>
    </li>

    </ul>
</nav>
