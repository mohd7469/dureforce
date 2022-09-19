<header class="header-section">
    <div class="header">
        <div class="header-bottom-area">
            <div class="container-fluid">
                <div class="header-menu-content">
                    <nav class="navbar navbar-expand-lg p-0">
                        <a class="site-logo site-title" href="{{ route('home') }}"><img
                                src="{{ getImage(imagePath()['logoIcon']['path'] . '/logo.svg') }}"
                                alt="{{ __($general->sitename) }}"></a>
                        <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="fas fa-bars"></span>
                        </button>
                        <button type="button" class="short-menu-open-btn"><i class="fas fa-align-center"></i></button>
                        <div class="collapse navbar-collapse d-flex justify-content-between"
                            id="navbarSupportedContent">
                            <ul class="navbar-nav main-menu ms-auto me-auto">
                                <li><a href="{{ route('home') }}"
                                        @if (request()->routeIs('home')) class="active" @endif>@lang('How it works')</a></li>
                                <li><a href="{{ route('service') }}"
                                        @if (request()->routeIs('service')) class="active" @endif>@lang('Services we offer')</a>
                                </li>
                                <li><a href="{{ route('software') }}"
                                        @if (request()->routeIs('software')) class="active" @endif>@lang('Pricing')</a>
                                </li>
                                <!-- <li><a href="{{ route('job') }}"
                                        @if (request()->routeIs('job')) class="active" @endif>@lang('Job')</a></li>
                                <li><a href="{{ route('blog') }}"
                                        @if (request()->routeIs('blog') || request()->routeIs('blog.details')) class="active" @endif>@lang('Blog')</a>
                                </li> -->
                                <li><a href="{{ route('contact') }}"
                                        @if (request()->routeIs('contact')) class="active" @endif>@lang('About us')</a>
                                </li>
                            </ul>
                            <div class="header-btn-container d-flex justify-content-between mx-2" style="width: 23%; justify-content: space-around !important;">
                                <a class="btn--post btn active mr-1 d-inline-block "
                                    href="{{ route('user.job.create') }}">Post a Job</a>
                                <div class="search-main">
                                    <select class="search-select-header">
                                        <option></option>
                                    </select>
                                    <i class="fas fa-search"></i>
                                </div>
                            </div>

                            <div class="header-right header-action m-0">
                                        <div class="dropdown text-end">
                                            <a
                                                href="#"
                                                class="d-block link-dark text-decoration-none dropdown-toggle"
                                                id="dropdownUser1"
                                                data-bs-toggle="dropdown"
                                                aria-expanded="false"
                                            >
                                                <i class="fa fa-user"></i>
                                                <span style="margin: 0 10 0 10"
                                                    >Shahzaib</span
                                                >
                                            </a>
                                            <ul
                                                class="dropdown-menu text-small"
                                                aria-labelledby="dropdownUser1"
                                                style=""
                                            >
                                                <li>
                                                    <a
                                                        class="dropdown-item"
                                                        href="#"
                                                        >New project...</a
                                                    >
                                                </li>
                                                <li>
                                                    <a
                                                        class="dropdown-item"
                                                        href="#"
                                                        >Settings</a
                                                    >
                                                </li>
                                                <li>
                                                    <a
                                                        class="dropdown-item"
                                                        href="#"
                                                        >Profile</a
                                                    >
                                                </li>
                                                <li>
                                                    <hr
                                                        class="dropdown-divider"
                                                    />
                                                </li>
                                                <li>
                                                    <a
                                                        class="dropdown-item"
                                                        href="#"
                                                        >Sign out</a
                                                    >
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                            <!-- <div class="header-right  header-action">
                                @guest
                                    <a href="#" class="btn--base active">@lang('Login')</a>
                                    <a href="#" class="btn--base">@lang('Sign Up')</a>
                                @endguest

                                @auth
                                    <a href="{{ route('user.home') }}" class="btn--base">@lang('Dashboard')</a>
                                    <a href="{{ route('logout') }}" class="btn--base">@lang('Logout')</a>
                                @endauth
                            </div> -->

                        </div>
                    </nav>
                </div>
            </div>
        </div>

    </div>
</header>
<style>
    .header-bottom-area .navbar-expand-lg .select2-container--default .select2-selection--single {
    border: 1px solid #7f007f;
    height: 39px;
    display: flex;
    align-items: center;
}
</style>
