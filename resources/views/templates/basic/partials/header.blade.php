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
<<<<<<< HEAD
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
=======
                                       @if (request()->routeIs('home')) class="active" @endif>@lang('Home')</a></li>
                                <li><a href="{{ route('service') }}"
                                       @if (request()->routeIs('service')) class="active" @endif>@lang('Service')</a>
                                </li>
                                <li><a href="{{ route('software') }}"
                                       @if (request()->routeIs('software')) class="active" @endif>@lang('Software')</a>
                                </li>
                                <li><a href="{{ route('job') }}"
                                       @if (request()->routeIs('job')) class="active" @endif>@lang('Job')</a></li>
                                <li><a href="{{ route('blog') }}"
                                       @if (request()->routeIs('blog') || request()->routeIs('blog.details')) class="active" @endif>@lang('Blog')</a>
                                </li>
                                <li><a href="{{ route('contact') }}"
                                       @if (request()->routeIs('contact')) class="active" @endif>@lang('Contact')</a>
>>>>>>> aa91ab0242748cddd7b75dc6440587f9c519e90d
                                </li>
                            </ul>
                            <div class="header-btn-container d-flex justify-content-between mx-2" style="width: 23%; justify-content: space-around !important;">
                                <a class="btn--post btn active mr-1 d-inline-block "
                                    href="{{ route('user.job.create') }}" >Post a Job</a>
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
<<<<<<< HEAD
                                    <a href="#" class="btn--base active">@lang('Login')</a>
                                    <a href="#" class="btn--base">@lang('Sign Up')</a>
=======
                                    <!-- <a href="{{ route('user.login') }}" class="btn--base active">@lang('Login')</a> -->
                                    <a href="#loginModal" data-bs-toggle="modal" class="btn--base active">@lang('Login')</a>
                                    <a href="#signUpModal" data-bs-toggle="modal" class="btn--base active">@lang('Sign Up')</a>

                                    <!-- <a href="{{ route('user.register') }}" class="btn--base">@lang('Sign Up')</a> -->
>>>>>>> aa91ab0242748cddd7b75dc6440587f9c519e90d
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
<!-- signup form modal -->
<div
        class="modal fade"
        id="signUpModal"
        tabindex="-1"
        aria-labelledby="signUpModalLabel"
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
                            <h3 class="title">
                                @lang('Complete Your Free Account Setup')
                            </h3>
                        </div>
                    </div>
                    <form class="account-form col-md-12 m-auto" action="{{ route('user.register') }}" method="POST" onsubmit="return submitUserForm();">
                        @csrf
                        <div class="row ml-b-20">
                            <div class="col-lg-6 form-group">
                                {{-- <label for="firstname">@lang('First Name')*</label> --}}
                                <input type="text" class="form-control form--control" id="firstname" name="firstname" value="{{old('firstname')}}" required="" placeholder="@lang('First name')">
                            </div>

                            <div class="col-lg-6 form-group">
                                {{-- <label for="lastname">@lang('Last Name')*</label> --}}
                                <input type="text" class="form-control form--control" name="lastname" value="{{old('lastname')}}" required="" placeholder="@lang('Last name')">
                            </div>

                            <div class="col-lg-6 form-group">
                                {{-- <label id="email">@lang('Email address')*</label> --}}
                                <input type="email" class="form-control form--control checkUser" name="email" value="{{old('email')}}" required="" placeholder="@lang('Email address')">
                            </div>

                            <div class="col-lg-6 form-group">
                                {{-- <label id="username">@lang('Username')*</label> --}}
                                <input type="text" class="form-control form--control checkUser" name="username" value="{{old('username')}}" required="" placeholder="@lang('Username')">
                                <small class="text-danger usernameExist"></small>
                            </div>

                            {{-- <div class="col-lg-6 form-group">
                                <select name="country" id="country" class="form-control form--control">
                                    @foreach($countries as $key => $country)
                                        <option data-mobile_code="{{ $country->dial_code }}" value="{{ $country->country }}" data-code="{{ $key }}">{{ __($country->country) }}</option>
                                    @endforeach
                                </select>
                            </div> --}}


                            <div class="col-lg-6 form-group hover-input-popup">
                                {{-- <label for="password">@lang('Password')*</label> --}}
                                <input type="password" class="form-control form--control" id="password" name="password" required="" placeholder="@lang("Enter password")">
                                @if($general->secure_password)
                                    <div class="input-popup">
                                      <p class="error lower">@lang('1 small letter minimum')</p>
                                      <p class="error capital">@lang('1 capital letter minimum')</p>
                                      <p class="error number">@lang('1 number minimum')</p>
                                      <p class="error special">@lang('1 special character minimum')</p>
                                      <p class="error minimum">@lang('6 character password')</p>
                                    </div>
                                @endif
                            </div>

                            <div class="col-lg-6 form-group">
                                {{-- <label>@lang('Confirm Password')*</label> --}}
                                <input type="password" class="form-control form--control" name="password_confirmation" required="" placeholder="@lang("Enter confirm password")">
                            </div>
                            <h5 class="text-center mb-4"><b>I want to</b></h5>
                            <div class="col-lg-12 form-group">
                                <div class="btn-group justify-content-center" role="group" style="width: 100%" aria-label="Basic radio toggle button group">
                                 <div>
                                    <input type="radio" class="btn-check" name="type" value="1" id="btnradio1" autocomplete="off" checked>
                                    <label class="btn btn-outline-secondary btn-freelance" for="btnradio1">@lang('Work As A Freelancer')</label>
                                </div>
                                <div>

                                    <input type="radio" class="btn-check" name="type" value="2" id="btnradio2" autocomplete="off">
                                    <label class="btn btn-outline-secondary btn-hire" for="btnradio2">@lang('Hire For A Project')</label>
                                </div>
                                {{--                                    <input type="radio" class="btn-check" name="type" value="3" id="btnradio3" autocomplete="off">--}}
                                {{--                                    <label class="btn btn-outline-secondary" for="btnradio3">@lang('Both')</label>--}}
                                  </div>
                            </div>



                            <div class="col-lg-12 form-group">
                                @php echo loadReCaptcha() @endphp
                            </div>

                            @include($activeTemplate.'partials.custom_captcha')

                            @if($general->agree)
                                <div class="col-lg-12 form-group">
                                    <div class="form-group custom-check-group">
                                        <input type="checkbox" name="agree" id="level-1">
                                        <label for="level-1">@lang('Yes, I understand and agree to the Dureforce terms and conditions including user Agreement and ')<a href="#0" class="text--base">@lang('Privacy Policy')</a></label>
                                    </div>
                                </div>
                            @endif

                            <div class="col-lg-12 form-group text-center">
                                <button type="submit" class="submit-btn w-100">@lang('Create My Account')</button>
                            </div>

                            <div class="col-lg-12 text-center">
                                <div class="account-item mt-10">
                                    <label>@lang('Already Have An Account')? <a href="{{route('user.login')}}" class="text--base">@lang('Sign In')</a></label>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- end signup modal  -->
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
                        {{-- action="{{ route('user.login')}}" --}}
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
                                            {{-- href="{{route('user.password.request')}}" --}}
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
                                            {{-- href="{{ route('user.register') }}" --}}
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
</style>
