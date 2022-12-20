

<form role="form" class="user-profile-form" action="{{ route('user.service.store.overview') }}" method="POST">
    @csrf
    <div class="card-body">
        <div class="card-form-wrapper">
            <div class="row justify-content-center">
                <input type="hidden" value="{{ $service->id ?? '' }}" name="service_id" id="service_id">
                @if ($service)
                    <input type="hidden" value="{{ $service->skills ? implode(',',$service->skills->pluck('id')->toArray()) : '' }}" name="service_skills" id="service_skills_id">
                @else
                    <input type="hidden" value="" name="service_skills" id="service_skills_id">
                @endif

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

                    <select data-placeholder="Please Select Tags" class="select2 tags" id="tags" name="tag[]"
                        multiple="multiple" >
                        {{-- <option selected="" disabled="" class="default-select">@lang('Tag1, Tag2, Tag3')</option> --}}

                        @if ($service && count($service->tags)>0)
                            @foreach ($tags as $tag)
                                <option {{isSelectedTag($tag->id,$service->tags)}} > {{ $tag->name }}</option>
                            @endforeach
                        @else
                            @foreach ($tags as $tag)
                                <option > {{ $tag->name }}</option>
                            @endforeach
                        
                        @endif

                    </select>
                    <div id="error"></div>
                    {{-- <small>@lang('Tag and enter press')</small> --}}
                </div>
                <div class="row">
                    
                    <div class="col-xl-4 col-lg-4 col-sm-12 col-xs-12 form-group pt-4">
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
    
                    <div class="col-xl-4 col-lg-4 col-sm-12 col-xs-12 form-group pt-4">
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
    
                    <div class="col-xl-4 col-lg-4 col-sm-12 col-xs-12 form-group pt-4">
    
                        <label class="d-inline-block ">@lang('Include Feature')*</label>
                        <span title="Support : Provide customer service and resolve various issues online
    
                                        Consultancy : Provide consultancy or advice with particular service
    
                                        Training : Provide customer training related to particular service
    
                                        Infrastructure Management : provide a method to monitor and maintain IT infrastructure to ensure best use of resources and cloud service utilization
    
                                        Software Development : Provide key aspects of software development (programming , testing , deployment and  support">
                                    <i class="fa fa-info-circle"></i>
                        </span>
    
                        <select class="form-control select2 select2-hidden-accessible " multiple="" data-placeholder="Select Features" style="width: 100%;" tabindex="-1" aria-hidden="true" name="features[]" id="service_features" >
                            @if (!empty($service))
                                @foreach ($features as  $item )
                                    <option value="{{ $item->id }}" @if(in_array($item->id,$service->features->pluck('id')->toArray())) selected @endif>
                                        {{ __($item->name) }}</option>
                                @endforeach
                            @else
                                @foreach($features as  $item)
                                    <option value="{{__($item->id)}}">{{__($item->name)}}</option>
                                @endforeach
                            @endif
                            
    
                        </select>
                    </div>

                </div>
                
                <br>
                <input type="checkbox" name="skills[]" style="display: none">
                <div style="display:inline;display:none" id="skills_heading">
                    <h4 class="" style="display:inline">Job Attributes* </h4>
                    <small>(At least one skill is required)</small>
                </div>
                <div id="form_attributes" class="col-xl-12 col-lg-12 pt-1" >
                    
                </div>

            </div>
            <hr />
            <div class="row">
                <div class="col-md-6"></div>
                <div class="col-md-6 text-right">
                    <a class="stepwizard-step service--btns btn btn-secondary float-left  mt-20 w-100" href="{{route('user.service.index')}}" type="button">@lang('Cancel')</a>

                    <button type="submit" class="btn btn-save-continue btn-primary float-left mt-20 m-3 mb-0 w-100">@lang('SAVE AND CONTINUE')</button>
                </div>
            </div>

        </div>
    </div>
</form>
<script>
    let action = '';
    
</script>
