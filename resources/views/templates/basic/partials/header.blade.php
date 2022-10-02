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
                            <a href="{{ route('user.home') }}" class="header-link">@lang('Dashboard')</a>
                            <a href="{{ route('logout') }}" class="header-link">@lang('Logout')</a>
                        @endauth
                        <!-- <button type="button" class="short-menu-open-btn"><i class="fas fa-align-center"></i></button> -->
                        <div class="collapse navbar-collapse d-flex justify-content-between"
                             id="navbarSupportedContent">
                            <ul class="navbar-nav main-menu ms-auto me-auto">
                                <li><a href="{{ route('home') }}"
                                       @if (request()->routeIs('home')) class="active" @endif>@lang('Home')</a></li>
{{--                                @if (auth()->user() AND in_array(\App\Models\Role::$ClientName, auth()->user()->getRoleNames()->toArray()))--}}
                                <li><a href="{{ route('service') }}"
                                       @if (request()->routeIs('service')) class="active" @endif>@lang('Service')</a>
                                </li>
                                <li><a href="{{ route('software') }}"
                                       @if (request()->routeIs('software')) class="active" @endif>@lang('Software')</a>
                                </li>
{{--                                @elseif (auth()->user() AND in_array(\App\Models\Role::$FreelancerName, auth()->user()->getRoleNames()->toArray()))--}}
                                <li><a href="{{ route('seller.jobs.listing') }}"
                                       @if (request()->routeIs('jobs.listing')) class="active" @endif>@lang('Job')</a></li>
{{--                                @endif--}}
                                <li><a href="{{ route('blog') }}"
                                       @if (request()->routeIs('blog') || request()->routeIs('blog.details')) class="active" @endif>@lang('Blog')</a>
                                </li>
                                <li><a href="{{ route('contact') }}"
                                       @if (request()->routeIs('contact')) class="active" @endif>@lang('Contact')</a>
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
                                        ><span class="span-color">@lang('Already Have An Account')?</span>
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
    @media (max-width: 480px) {
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
            left: 257px;
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
            left: 307px;
            top: 17px;

            font-family: 'Mulish';
            font-style: normal;
            font-weight: 600;
            font-size: 14px;
            line-height: 18px;
            /* identical to box height */
            color: #7F007F;
        }
    }
    @media screen and (min-device-width: 768px)
        and (max-device-width: 1024px) {
            .navbar {
            position: relative;
            display: contents;
            flex-wrap: wrap;
            align-items: left;
            justify-content: space-between;
        }
        .header-right{
            display:none;
        }
        .header-login{
            position: absolute;
            width: 115px;
            height: 18px;
            left: 635px;
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
            left: 700px;
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
    }
</style>
