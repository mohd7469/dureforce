<header class="header-section">
    <div class="header">
        <div class="header-bottom-area">
            <div class="container-fluid">
                <div class="header-menu-content">
                    <nav class="navbar navbar-expand-lg p-0">
                        <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                            <span class="fas fa-bars"></span>
                        </button>
                        <a class="site-logo site-title" href="{{ route('home') }}"><img
                                    src="{{ getImage(imagePath()['logoIcon']['path'] . '/logo.svg') }}"
                                    alt="{{ __($general->sitename) }}"></a>
                        @guest
                        <a href="#loginModal" data-bs-toggle="modal" class="navbar-toggler header-login">@lang('Login')</a>

                        <a href="{{ route('user.register') }}" class="header-signup navbar-toggler">@lang('Sign Up')</a>
                        @endguest
                        @auth
                            <a href="{{ route('user.home') }}" class="header-link navbar-toggler header-login">@lang('Dashboard')</a>
                            <a href="{{ route('logout') }}" class="header-link navbar-toggler header-signup">@lang('Logout')</a>
                        @endauth
                        <!-- <button type="button" class="short-menu-open-btn"><i class="fas fa-align-center"></i></button> -->
                        <div class="collapse navbar-collapse d-flex justify-content-between"
                             id="navbarSupportedContent">
                            <ul class="navbar-nav main-menu ms-auto me-auto">
                                <li><a href="{{ route('home') }}"
                                       @if (request()->routeIs('home')) class="active" @endif>@lang('Home')</a></li>
{{--                                @if (auth()->user() AND in_array(\App\Models\Role::$ClientName, auth()->user()->getRoleNames()->toArray()))--}}
                                <li><a href="{{ route('featured.service') }}"
                                       @if (request()->routeIs('featured.service')) class="active" @endif>@lang('Service')</a>
                                </li>
                                <li><a href="{{ route('featured.software') }}"
                                       @if (request()->routeIs('featured.software')) class="active" @endif>@lang('Software')</a>
                                </li>
{{--                                @elseif (auth()->user() AND in_array(\App\Models\Role::$FreelancerName, auth()->user()->getRoleNames()->toArray()))--}}
                                <li><a href="{{ route('jobs.listing.old') }}"
                                       @if (request()->routeIs('jobs.listing.old')) class="active" @endif>@lang('Job')</a></li>
{{--                                @endif--}}
                                <li><a href="{{ route('blog') }}"
                                       @if (request()->routeIs('blog') || request()->routeIs('blog.details')) class="active" @endif>@lang('Blog')</a>
                                </li>
                                <li><a href="{{ route('contact') }}"
                                       @if (request()->routeIs('contact')) class="active" @endif>@lang('Contact')</a>
                                </li>
                                <li class="nav-item dropdown nav-list-item">
                                    <a class="nav-link" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Category <i class="fa fa-caret-down" aria-hidden="true"></i>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    @foreach(\App\Models\Category::all() as $category)
                                        <li class="nav-item active">
                                            <a href="service/?category_id={{$category->id}}&category_name={{$category->name}}">{{__($category->name)}}</a>
                                        </li>
                                    @endforeach
                                    </ul>
                                </li>
                            </ul>
                            @if (auth()->user() AND in_array(\App\Models\Role::$ClientName, auth()->user()->getRoleNames()->toArray()))
                            <div class="header-btn-container d-flex justify-content-between mx-2" style="width: 23%; justify-content: space-around !important;">
                                <a class="btn--post btn active mr-1 d-inline-block "
                                    href="{{ route('buyer.job.create') }}" >Post a Job</a>
                                <div class="search-main">
                                    <select class="search-select-header">
                                        <option></option>
                                    </select>
                                    <i class="fas fa-search"></i>
                                </div>
                            </div>
                            @endif
                            <div class="header-right  header-action">
                                @guest
                                    <!-- <a href="{{ route('user.login') }}" class="btn--base active">@lang('Login')</a> -->
                                    <a href="#loginModal" data-bs-toggle="modal" class="btn--base active">@lang('Login')</a>
                                    <!-- <a href="#signUpModal" data-bs-toggle="modal" class="btn--base active">@lang('Sign Up')</a> -->

                                    <a href="{{ route('user.register') }}" class="btn--base">@lang('Sign Up')</a>
                                @endguest

                                @auth
                                    <a href="{{ route('user.home') }}" class="btn--base">@lang('Dashboard')</a>
                                    <a href="{{ route('logout') }}" class="btn--base">@lang('Logout')</a>
                                @endauth
                            </div>

                        </div>
                    </nav>
                </div>
            </div>
        </div>

    </div>
</header>
<!-- log in form modal  -->
    <div
        class="modal fade"
        id="loginModal"
        tabindex="1"
        aria-labelledby="loginModalLabel"
        aria-hidden="true"
        >
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal body -->
                <div class="modal-body">
                    <!-- <div class="row">
                        <div class="col-md-12">
                        <button
                                type="button"
                                class="btn-close float-end"
                                data-bs-dismiss="modal"
                            ></button>
                        </div>
                    </div> -->
                    <div class="row"> 
                        <div class="account-header col-md-12 col-sm-12 text-center">
                            <h2 class="title">
                                @lang('Log in to') {{__($general->sitename)}}
                            </h2>
                        </div>
                    </div>
                    <form
                    autocomplete="nope"
                        class="account-form"
                        method="POST"
                        action="{{ route('user.login')}}"
                        onsubmit="return submitUserForm();"
                    >
                        @csrf
                        <div class="row ml-b-20">
                            <div class="col-lg-12 form-group">
                                <label class="label-color" for="username">@lang('Username / Email')*</label>
                                <input
                                    type="text"
                                    autocomplete="off"
                                    class="form-control form-control-lg form--control"
                                    id="username"
                                    name="username"
                                    value="{{old('username')}}"
                                    placeholder="@lang('Username / Email')"
                                    required=""
                                />
                            </div>

                            <div class="col-lg-12 form-group">
                                <label class="label-color" for="password">@lang('Password')*</label>
                                <input type="password" class="form-control form-control-lg
                                form--control" id="password" name="password"
                                placeholder="@lang('Enter password')"
                                required="">
                                <i class="las la-eye input-icon" onclick="showPassword()"></i>
                            </div>

                            <!-- <div class="col-lg-12 form-group">
                                @php echo loadReCaptcha() @endphp
                            </div> -->

                            @include($activeTemplate.'partials.custom_captcha')

                            <div class="col-lg-12 form-group">
                                <div class="forgot-item float-end">
                                    <label
                                        ><a
                                            href="{{route('user.password.request')}}"
                                            class="text--base "
                                            ><span class="span-color">@lang('Forgot Password')?</span></a
                                        ></label
                                    >
                                </div>
                            </div>
                            <div class="col-lg-12 form-group text-center">
                                <button type="submit" class="submit-btn w-100">
                                    @lang('Login Now')
                                </button>
                            </div>
                            <div class="col-lg-12 text-center">
                                <div class="account-item mt-10">
                                    <label
                                        ><span class="span-color">@lang("Don't have an account")?</span>
                                        <a
                                            href="{{ route('user.register') }}"
                                            class="text--base"
                                            ><span class="label-color">@lang('Register Now')</span></a
                                        ></label
                                    >
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- end login form modal -->


<style>
    .header-bottom-area .navbar-expand-lg .select2-container--default .select2-selection--single {
    border: 1px solid #7f007f;
    height: 39px;
    display: flex;
    align-items: center;
    }
    .modal { position: fixed; top:15%; } 
    .google-button{
        width: 100%; border-radius: 50px;
    }
    .span-color{
        color: #7F007F;
    }
    .label-color{
        color: #007F7F;
    }
    .modal-header .btn-close {
        margin-bottom: 30px;
        height: 1px !important;
    }
    .form-control-lg{
        height: 50px !important;
    }
    .account-header {
        margin-bottom: 15px;
    }
    .modal-body {
        position: relative;
        flex: 1 1 auto;
        padding: 3rem;
    }
    .btn-outline-secondary{
        color: #007F7F;
        background-color: #ccffff;
        border-radius: 4px;
    }
    .btn-check:checked+.btn-outline-secondary, .btn-outline-secondary.hover, .btn-outline-secondary.dropdown-toggle.show, .btn-outline-secondary:hover {
        color: #fff;
        background-color: #007F7F;
        border-color: #007F7F;
    }
    .btn-check:checked+.btn-outline-secondary, .btn-outline-secondary.active, .btn-outline-secondary.dropdown-toggle.show, .btn-outline-secondary:active {
        color: #fff;
        background-color: #007F7F;
        border-color: #007F7F;
    }
    /* Media Query for Mobile Devices */
    @media (max-width: 350px) {
        .header-short-menu{
            display:none;
        }
        img {
            max-width: 70%;
            height: auto;
        }
        .navbar {
            position: relative;
            display: contents;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
        }
        .header-right{
            display:none;
        }
        .header-login{
            position: absolute;
            width: 115px;
            height: 18px;
            left: 170px;
            top: 17px;

            font-family: 'Mulish';
            font-style: normal;
            font-weight: 600;
            font-size: 11px;
            line-height: 18px;
            /* identical to box height */
            color: #7F007F;
            padding-left:35px;
        }
        .header-signup{
            position: absolute;
            width: 115px;
            height: 18px;
            left: 230px;
            top: 17px;

            font-family: 'Mulish';
            font-style: normal;
            font-weight: 600;
            font-size: 11px;
            line-height: 18px;
            /* identical to box height */
            color: #7F007F;
            padding-left:45px;
        }
        .dropdown-menu {
            pointer-events: none;
            -webkit-transform-origin: 50% 0;
            -ms-transform-origin: 50% 0;
            transform-origin: 50% 0;
            -webkit-transform: scale(0.75) translateY(-21px);
            -ms-transform: scale(0.75) translateY(-21px);
            transform: scale(0.75) translateY(-21px);
            -webkit-transition: all 0.2s cubic-bezier(0.5, 0, 0, 1.25), opacity 0.15s ease-out;
            transition: all 0.2s cubic-bezier(0.5, 0, 0, 1.25), opacity 0.15s ease-out;
            display: none;
            opacity: 0;
            visibility: hidden;
            border: none;
            background-color: white;
            box-shadow: 7px 5px 30px 0px rgb(72 73 121 / 15%);
        }
    }
    @media (min-width: 351px) and (max-width: 430px) {
        .header-short-menu{
            display:none;
        }
        img {
            max-width: 80%;
            height: auto;
        }
        .navbar {
            position: relative;
            display: contents;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
        }
        .header-right{
            display:none;
        }
        .header-login{
            position: absolute;
            width: 115px;
            height: 18px;
            left: 195px;
            top: 17px;

            font-family: 'Mulish';
            font-style: normal;
            font-weight: 600;
            font-size: 11px;
            line-height: 18px;
            /* identical to box height */
            color: #7F007F;
            padding-left:35px;
        }
        .header-signup{
            position: absolute;
            width: 115px;
            height: 18px;
            left: 260px;
            top: 17px;

            font-family: 'Mulish';
            font-style: normal;
            font-weight: 600;
            font-size: 11px;
            line-height: 18px;
            /* identical to box height */
            color: #7F007F;
            padding-left:45px;
        }
        .dropdown-menu {
            pointer-events: none;
            -webkit-transform-origin: 50% 0;
            -ms-transform-origin: 50% 0;
            transform-origin: 50% 0;
            -webkit-transform: scale(0.75) translateY(-21px);
            -ms-transform: scale(0.75) translateY(-21px);
            transform: scale(0.75) translateY(-21px);
            -webkit-transition: all 0.2s cubic-bezier(0.5, 0, 0, 1.25), opacity 0.15s ease-out;
            transition: all 0.2s cubic-bezier(0.5, 0, 0, 1.25), opacity 0.15s ease-out;
            display: none;
            opacity: 0;
            visibility: hidden;
            border: none;
            background-color: white;
            box-shadow: 7px 5px 30px 0px rgb(72 73 121 / 15%);
        }
    }
    @media (min-width: 431px) and (max-width: 575px) {
        .header-short-menu{
            display:none;
        }
        img {
            max-width: 80%;
            height: auto;
        }
        .navbar {
            position: relative;
            display: contents;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
        }
        .header-right{
            display:none;
        }
        .header-login{
            position: absolute;
            width: 115px;
            height: 18px;
            left: 315px;
            top: 17px;

            font-family: 'Mulish';
            font-style: normal;
            font-weight: 600;
            font-size: 13px;
            line-height: 18px;
            /* identical to box height */
            color: #7F007F;
            padding-left:35px;
        }
        .header-signup{
            position: absolute;
            width: 115px;
            height: 18px;
            left: 415px;
            top: 17px;

            font-family: 'Mulish';
            font-style: normal;
            font-weight: 600;
            font-size: 13px;
            line-height: 18px;
            /* identical to box height */
            color: #7F007F;
            padding-left:45px;
        }
        .dropdown-menu {
            pointer-events: none;
            -webkit-transform-origin: 50% 0;
            -ms-transform-origin: 50% 0;
            transform-origin: 50% 0;
            -webkit-transform: scale(0.75) translateY(-21px);
            -ms-transform: scale(0.75) translateY(-21px);
            transform: scale(0.75) translateY(-21px);
            -webkit-transition: all 0.2s cubic-bezier(0.5, 0, 0, 1.25), opacity 0.15s ease-out;
            transition: all 0.2s cubic-bezier(0.5, 0, 0, 1.25), opacity 0.15s ease-out;
            display: none;
            opacity: 0;
            visibility: hidden;
            border: none;
            background-color: white;
            box-shadow: 7px 5px 30px 0px rgb(72 73 121 / 15%);
        }
    }          
    /* Media Query for low resolution  Tablets, Ipads */
    @media (min-width: 576px) and (max-width: 767px) {
        .header-short-menu{
            display:none;
        }
        img {
            max-width: 80%;
            height: auto;
        }
        .navbar {
            position: relative;
            display: contents;
            flex-wrap: wrap;
            align-items: left;
            justify-content: space-between;
        }
        .header-bottom-area .navbar-collapse .main-menu li a:hover::after, .header-bottom-area .navbar-collapse .main-menu li a.active::after {
            width: 520px;
        }
        .item-card .rates {
            background: #7f007f;
            border-radius: 4px;
            text-align: center;
            padding: 7px;
            width: 100px;
            color: #fff;
        }
        .header-right{
            display:none;
        }
        .header-login{
            position: absolute;
            width: 115px;
            height: 18px;
            left: 315px;
            top: 17px;

            font-family: 'Mulish';
            font-style: normal;
            font-weight: 600;
            font-size: 14px;
            line-height: 18px;
            /* identical to box height */
            color: #7F007F;
        }
        .header-signup{
            position: absolute;
            width: 115px;
            height: 18px;
            left: 425px;
            top: 17px;

            font-family: 'Mulish';
            font-style: normal;
            font-weight: 600;
            font-size: 14px;
            line-height: 18px;
            /* identical to box height */
            color: #7F007F;
        }
        .header-bottom-area .navbar-collapse .main-menu li {
            padding-right: 630px;
        }
        
        .hero-banner .heading {
            max-width: 90%;
            font-size: 26px;
        }
        .mt-h {
            margin-top: 0px;
        }
        .hero-banner .para {
                font-size: 13px;
                color: #a5a5a5;
                font-weight: 500;
            }
        .hero-banner .inline-list li {
            font-size: 11px;
            display: list-item;
            margin-right: 27px;
            float: left;
        }
        .dropdown-menu {
            pointer-events: none;
            -webkit-transform-origin: 50% 0;
            -ms-transform-origin: 50% 0;
            transform-origin: 50% 0;
            -webkit-transform: scale(0.75) translateY(-21px);
            -ms-transform: scale(0.75) translateY(-21px);
            transform: scale(0.75) translateY(-21px);
            -webkit-transition: all 0.2s cubic-bezier(0.5, 0, 0, 1.25), opacity 0.15s ease-out;
            transition: all 0.2s cubic-bezier(0.5, 0, 0, 1.25), opacity 0.15s ease-out;
            display: none;
            opacity: 0;
            visibility: hidden;
            border: none;
            background-color: white;
            box-shadow: 7px 5px 30px 0px rgb(72 73 121 / 15%);
        }
    }
    /* Media Query for Tablets Ipads portrait mode */
    @media (min-width: 768px) and (max-width: 1023px){
        .header-short-menu{
            display:none;
        }
        .collapse:not(.show) {
            display: none !important;
        }
        .navbar {
            position: relative;
            display: contents;
            flex-wrap: wrap;
            align-items: left;
            justify-content: space-between;
        }
        .ms-auto {
            margin-left: inherit !important;
        }
        .header-right{
            display:none;
        }
        .header-login{
            position: absolute;
            width: 115px;
            height: 18px;
            left: 580px;
            top: 17px;

            font-family: 'Mulish';
            font-style: normal;
            font-weight: 600;
            font-size: 14px;
            line-height: 18px;
            /* identical to box height */
            color: #7F007F;
        }
        .header-signup{
            position: absolute;
            width: 115px;
            height: 18px;
            left: 670px;
            top: 17px;

            font-family: 'Mulish';
            font-style: normal;
            font-weight: 600;
            font-size: 14px;
            line-height: 18px;
            /* identical to box height */
            color: #7F007F;
        }        
        .hero-banner .heading {
            max-width: 90%;
            font-size: 26px;
        }
        .mt-h {
            margin-top: 0px;
        }
        .hero-banner .para {
                font-size: 13px;
                color: #a5a5a5;
                font-weight: 500;
            }
        .hero-banner .inline-list li {
            font-size: 11px;
            display: list-item;
            margin-right: 27px;
            float: left;
        }
        .dropdown-menu {
            pointer-events: none;
            -webkit-transform-origin: 50% 0;
            -ms-transform-origin: 50% 0;
            transform-origin: 50% 0;
            -webkit-transform: scale(0.75) translateY(-21px);
            -ms-transform: scale(0.75) translateY(-21px);
            transform: scale(0.75) translateY(-21px);
            -webkit-transition: all 0.2s cubic-bezier(0.5, 0, 0, 1.25), opacity 0.15s ease-out;
            transition: all 0.2s cubic-bezier(0.5, 0, 0, 1.25), opacity 0.15s ease-out;
            display: none;
            opacity: 0;
            visibility: hidden;
            border: none;
            background-color: white;
            box-shadow: 7px 5px 30px 0px rgb(72 73 121 / 15%);
        }
    }
    @media (min-width: 1025px){
        .nav-list-item{
            display:none;
        }
    }     
    .collapse:not(.show){
        display: inline;
    }
    .input-icon {
        position: absolute;
        top: 44px;
        right: 20px;
        width: 32px;
        height: 32px;
        /*background-color: #e3ebf1;*/
        color: #5b6e88;
        justify-content: center;
        align-items: center;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        border-radius: 50%;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
        -ms-border-radius: 50%;
        -o-border-radius: 50%;
        font-size: 20px;
    }

</style>


