<form role="form" class="user-profile-form" action="{{ route('user.service.store.overview') }}" method="POST">
    @csrf
    <div class="card-body">
        <div class="card-form-wrapper">
            <div class="row justify-content-center">
                <input type="hidden" value="{{ $service->id ?? '' }}" name="service_id">
                <div class="col-xl-12 col-lg-12 form-group">
                    <label>@lang('Title')*</label>
                    <input type="text" name="title" id="title_over" maxlength="255" value="{{ old('title', @$service->title) }}"
                        class="form-control" placeholder="@lang(' E.g. DevOps Service')" >

                </div>
                <div class="col-xl-8 col-lg-8 form-group">
                    <label>@lang('Description')*</label>

                    <textarea class="form-control bg--gray" id="description" placeholder="@lang(' This is a short description for this service.')"
                        name="description">{{ old('description', @$service->description) }}</textarea>

                </div>
                <div class="col-xl-4 col-lg-4 form-group select2Tag">
                    <label>@lang('Service Tags')*</label>

                    <select data-placeholder="Tag1, Tag2, Tag3" class="select2 tags" id="tags" name="tag[]"
                        multiple="multiple" >
                        {{-- <option selected="" disabled="" class="default-select">@lang('Tag1, Tag2, Tag3')</option> --}}

                        @if (!empty($service->tag))
                            @foreach ($service->tag as $tag)
                                <option selected="true" > {{ $tag }}</option>
                            @endforeach
                        @endif

                    </select>
                    <div id="error"></div>
                    {{-- <small>@lang('Tag and enter press')</small> --}}
                </div>

                <div class="col-xl-6 col-lg-6 form-group pt-4">
                    <label>@lang('Category')*</label>
                    <select class="form-control bg--gray" name="category_id" id="category">

                        <option selected="" disabled="" >@lang('Select Category')</option>
                        @if (!empty($service))
                            @foreach (\App\Models\Category::getByType(\App\Models\Category::ServiceType) as $category)
                                <option value="{{ $category->id }}" @if ($category->id == $service->category_id) selected @endif>
                                    {{ __($category->name) }}</option>
                            @endforeach
                        @else
                            @foreach (\App\Models\Category::getByType(\App\Models\Category::ServiceType) as $category)
                                <option value="{{ __($category->id) }}">
                                    {{ __($category->name) }}
                                </option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <div class="col-xl-6 col-lg-6 form-group pt-4">
                    <label for="subCategorys">@lang('Sub-Category*')</label>
                    <select name="sub_category_id" class="form-control mySubCatgry" id="sub-category">
                        <option selected="" disabled="" >@lang('Sub Category')</option>
                        @if (!empty($service))
                            @foreach (\App\Models\Category::find($service->category_id)->subCategory as $sub)
                                <option @if ($sub->id == $service->sub_category_id) selected @endif value="{{ $sub->id }}">
                                    {{ $sub->name }}</option>
                            @endforeach
                        @endif

                    </select>
                </div>
                <div class="col-xl-12 col-lg-12 position-relative">

                    <label class="d-inline-block mx-1">@lang('Include Feature')*</label>
                    <span title="  Support : Provide customer service and resolve various issues online

                                    Consultancy : Provide consultancy or advice with particular service

                                    Training : Provide customer training related to particular service

                                    Infrastructure Management : provide a method to monitor and maintain IT infrastructure to ensure best use of resources and cloud service utilization

                                    Software Development : Provide key aspects of software development (programming , testing , deployment and  support">
                                <i class="fa fa-info-circle"></i>
                    </span>

                    <p class="include_error"></p>
                    @if (!empty($service))
                    <div class="col-xl-12 col-lg-12 form-group mt-2 d-flex flex-wrap back">
                    @foreach ($features as $feature)
                    <div class="form-group px-2 ">
                    <label class="container1 ">{{ __($feature->name) }}
                    <input id="include" value="{{ $feature->id }}" name="features[]" type="checkbox" @foreach ($service->featuresService as $value) {{ $feature->id == $value->id ? 'checked' : '' }} @endforeach
                                                                                    >
                    <span class="checkmark"></span>
                    </label>

                </div>

                            @endforeach
                            </div>
                            @else
                            <div class="col-xl-12 col-lg-12 form-group mt-2 d-flex flex-wrap back">
                            @foreach ($features as $feature)
                            <div class="form-group px-2 pl-2">
                            <!-- <label for="privacy" class="d-flex">
                            <input  id="include" value="{{ $feature->id }}"  class="checkbox-review" name="features[]" type="checkbox" />
                                <span class="lbl-review review-check mb-3">{{ __($feature->name) }}</span>
                            </label> -->
                            <label class="container1">{{ __($feature->name) }}
                                <input id="include" value="{{ $feature->id }}" name="features[]" type="checkbox">
                                <span class="checkmark"></span>
                                </label>
                            </div>

                            @endforeach
                            </div>
                            @endif



                </div>
                <!-- <div class="col-xl-4 col-lg-6 form-group service-feat pt-4">

                    <select name="features[]" id="include" class="form-control ">

                        <option selected="" disabled="">@lang('Select Features')</option>
                        @if (!empty($service))
                            @foreach ($features as $feature)
                                <option
                                    @foreach ($service->featuresService as $value) {{ $feature->id == $value->id ? 'selected' : '' }} @endforeach
                                    value="{{ $feature->id }}">
                                    {{ __($feature->name) }}
                                </option>
                            @endforeach
                        @else
                            @foreach ($features as $feature)
                                <option multiple value="{{ $feature->id }}">
                                    {{ __($feature->name) }}
                                </option>
                            @endforeach
                        @endif
                    </select>
                </div> -->
                <br>
                <div class="col-xl-12 col-lg-12">
                    <h3>
                        Service Attributes
                    </h3>
                    <br />
                </div>
                <br>

                @if (empty($service))
                    @include($activeTemplate . 'user.seller.shared.attributes')
                @else
                    @include($activeTemplate . 'user.seller.shared.attributes_edit_service', ['model' => $service])
                @endif

            </div>
            <hr />
            <div class="row">
                <div class="col-md-6"></div>
                <div class="col-md-6 text-right">
                    <button type="submit"
                        class="btn btn-save-continue btn-primary float-left mt-20 m-3 mb-0 w-100">@lang('SAVE
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                AND
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                CONTINUE')</button>
                </div>
            </div>

        </div>
    </div>
</form>

