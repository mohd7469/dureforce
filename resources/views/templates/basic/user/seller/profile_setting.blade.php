@extends($activeTemplate.'layouts.master')
@section('content')
    <section class="all-sections ptb-60">
        <div class="container-fluid">
            <div class="section-wrapper">
                <div class="row justify-content-center mb-30-none">
                    @include($activeTemplate . 'partials.seller_sidebar')
                    <div class="col-xl-9 col-lg-12 mb-30">
                        <div class="dashboard-sidebar-open"><i class="las la-bars"></i> @lang('Menu')</div>
                        <form class="user-profile-form" action="" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="card custom--card">
                                <div class="profile-settings-wrapper">
                                    <div class="preview-thumb profile-wallpaper">
                                        <div class="avatar-preview">
                                            <div class="profilePicPreview bg_img"
                                                 data-background="{{ userDefaultImage(imagePath()['profile']['user_bg']['path'].'/'. $user->bg_image,'background_image') }}"></div>
                                        </div>
                                        <div class="avatar-edit">
                                            <input type='file' class="profilePicUpload" name="bg_image"
                                                   id="profilePicUpload1" accept=".png, .jpg, .jpeg"/>
                                            <label for="profilePicUpload1"><i
                                                        class="las la-cloud-upload-alt me-1"></i> @lang('Update')
                                            </label>
                                        </div>
                                    </div>
                                    <div class="profile-thumb-content">
                                        <div class="preview-thumb profile-thumb">
                                            <div class="avatar-preview">
                                                <div class="profilePicPreview bg_img"
                                                     data-background="{{ userDefaultImage(imagePath()['profile']['user']['path'].'/'. $user->image,'profile_image') }}">
                                                </div>
                                            </div>
                                            <div class="avatar-edit">
                                                <input type='file' class="profilePicUpload" name="image"
                                                       id="profilePicUpload2"
                                                       accept=".png, .jpg, .jpeg"/>
                                                <label for="profilePicUpload2"><i class="las la-pen"></i></label>
                                            </div>
                                        </div>
                                        <div class="profile-content">
                                            <h6 class="username">{{__($user->username)}}</h6>
                                            <ul class="user-info-list mt-md-2">
                                                <li><i class="las la-envelope"></i>{{__($user->email)}}</li>
                                                <li><i class="las la-phone"></i> {{__($user->mobile)}}</li>
                                                <li>
                                                    <i class="las la-map-marked-alt"></i> {{__(@$user->address->country)}}
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="card-form-wrapper">
                                        <div class="row justify-content-center">
                                            <div class="col-xl-6 col-lg-6 col-md-6 form-group">
                                                <label>@lang('First Name')*</label>
                                                <input type="text" name="firstname" value="{{__($user->firstname)}}"
                                                       class="form-control" required="">
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 form-group">
                                                <label>@lang('Last Name')*</label>
                                                <input type="text" name="lastname" value="{{__($user->lastname)}}"
                                                       class="form-control" required="">
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 form-group">
                                                <label>@lang('Designation')*</label>
                                                <input type="text" name="designation" value="{{__($user->designation)}}"
                                                       class="form-control" required="">
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 form-group">
                                                <label>@lang('Address')*</label>
                                                <input type="text" name="address"
                                                       value="{{__($user->address->address)}}" class="form-control"
                                                       required="">
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 form-group">
                                                <label>@lang('State')*</label>
                                                <input type="text" name="state" class="form-control"
                                                       value="{{__($user->address->state)}}" required="">
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 form-group">
                                                <label>@lang('Zip Code')*</label>
                                                <input type="text" name="zip" class="form-control"
                                                       value="{{__($user->address->zip)}}" required="">
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 form-group">
                                                <label>@lang('City')*</label>
                                                <input type="text" name="city" class="form-control"
                                                       value="{{__($user->address->city)}}" required="">
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 form-group">
                                                <label>@lang('About Me')*</label>
                                                <textarea class="form-control" name="about_me" rows="5"
                                                          required="">{{__($user->about_me)}}</textarea>
                                            </div>
                                            <div class="col-12 form-group">
                                                <label>@lang('Add Social Links')</label>
                                                <button type="button" id="add-social-form" class="btn btn-primary mb-2">
                                                    +Add
                                                    Social Profile
                                                </button>
                                                {{--                                                {{dd($user->socials)}}--}}
                                                <div class="social-form-container">
                                                    @foreach($user->socials as $index=> $social)
                                                        <div data-row="{{$index}}" class="rower row">
                                                            <div class="col-5 col-md-5">
                                                                <label>@lang('Platform')</label>
                                                                <input type="text" name="socials[{{$index}}][platform]"
                                                                       value="{{$social->platform}}"
                                                                       required
                                                                       class="form-control"
                                                                ></div>
                                                            <div class="col-5 col-md-5">
                                                                <label>@lang('Social Link')</label>
                                                                <input value="{{$social->url}}" type="text"
                                                                       name="socials[{{$index}}][url]"
                                                                       class="form-control"
                                                                       placeholder=""
                                                                       required
                                                                >
                                                            </div>
                                                            <div class="col-1">
                                                                <label>@lang('Del')</label>
                                                                <button type="button" id="delRow"
                                                                        class="btn btn-lg btn-danger mb-2">
                                                                    -
                                                                </button>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="col-xl-12 form-group">
                                                <button type="submit"
                                                        class="submit-btn mt-20 w-100">@lang('Update Profile')</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
    <script>
        "use strict";
        let $row = {{$user->socials->count()}};

        function proPicURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    var preview = $(input).parents('.preview-thumb').find('.profilePicPreview');
                    $(preview).css('background-image', 'url(' + e.target.result + ')');
                    $(preview).addClass('has-image');
                    $(preview).hide();
                    $(preview).fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(".profilePicUpload").on('change', function () {
            proPicURL(this);
        });

        $(document).on("click", "#delRow", function () {

            $(this).parent().closest(".rower").remove();

            let $r = $(this).parentsUntil(".rower").attr('data-row');
            console.log($r);
        })

        $("#add-social-form").on("click", function (e) {
            $(".social-form-container").append(getHtml($row));
        });

        $(".remove-image").on('click', function () {
            $(".profilePicPreview").css('background-image', 'none');
            $(".profilePicPreview").removeClass('has-image');
        })


        function getHtml(row) {
            $row = row + 1;


            return `    <div data-row=${$row} class="rower row">
              <div class="col-5 col-md-5">
                                                            <label>@lang('Platform')</label>
                                                            <input type="text" name="socials[${$row}][platform]"
                                                                   class="form-control"
                                                                   required
                                                            ></div>
                                                        <div class="col-5 col-md-5">
                                                            <label>@lang('Social Link')</label>
                                                            <input type="text" name="socials[${$row}][url]"
                                                                   class="form-control"
                                                                   required
                                                                   placeholder=""
                                                            >
                                                        </div>
                                                        <div class="col-1">
                                                            <label>@lang('Del')</label>
                                                            <button type="button" id="delRow"
                                                                    class="btn btn-lg btn-danger mb-2">
                                                                -
                                                            </button>
                                                        </div>
                                                    </div>`;
        }
    </script>

@endpush