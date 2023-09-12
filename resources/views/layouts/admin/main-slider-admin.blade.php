<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="sidebar-brand brand-logo" href="index.html"><img src="assets/images/logo.svg" alt="logo" /></a>
        <a class="sidebar-brand brand-logo-mini" href="index.html"><img src="assets/images/logo-mini.svg"
                alt="logo" /></a>
    </div>
    <ul class="nav">
        <li class="nav-item profile">
            <div class="profile-desc">
                <div class="profile-pic">
                    @auth('web')
                        <div class="count-indicator">
                            <img class="img-xs rounded-circle " src="{{ Auth::user()->profile->image_url }}" alt="">
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
            <span class="nav-link">Dashboard</span>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-speedometer"></i>
                </span>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>

        @can('user.view')
            <li class="nav-item menu-items">
                <a class="nav-link" href="{{ route('user.index') }}">
                    <span class="menu-icon">
                        <i class="mdi mdi-account-outline"></i>
                    </span>
                    <span class="menu-title">{{ __('Users') }}</span>
                </a>
            </li>
        @endcan

        @can('category.view')
            <li class="nav-item menu-items">
                <a class="nav-link" href="{{ route('category.index') }}">
                    <span class="menu-icon">
                        <i class="mdi mdi-file-document-box"></i>
                    </span>
                    <span class="menu-title">{{ __('Category') }}</span>
                </a>
            </li>
        @endcan
        @can('product.view')
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ route('product.index') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-file-document-box"></i>
                </span>
                <span class="menu-title">{{ __('Product') }}</span>
            </a>
        </li>
    @endcan
        @can('store.view')
            <li class="nav-item menu-items">
                <a class="nav-link" href="{{ route('store.index') }}">
                    <span class="menu-icon">
                        <i class="mdi mdi-contacts"></i>
                    </span>
                    <span class="menu-title">{{ __('Store') }}</span>
                </a>
            </li>
        @endcan

        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ route('admin.order.index') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-contacts"></i>
                </span>
                <span class="menu-title">{{ __('Orders') }}</span>
            </a>
        </li>


        @can('setting.view')
            <li class="nav-item menu-items">
                <a class="nav-link" href="{{ route('settings') }}">
                    <span class="menu-icon">
                        <i class="mdi mdi mdi-brightness-5"></i>
                    </span>
                    <span class="menu-title">{{ __('Setting') }}</span>
                </a>
            </li>
        @endcan
        @can('role.view')
            <li class="nav-item menu-items">
                <a class="nav-link" href="{{ route('roleuser.index') }}">
                    <span class="menu-icon">
                        <i class="mdi  mdi-security"></i>
                    </span>
                    <span class="menu-title">{{ __('User Permissions') }}</span>
                </a>
            </li>
        @endcan




    </ul>
</nav>
{{--

    mdi mdi-map-marker
    mdi mdi-message-processing
    mdi mdi-cart-plus
--}}
