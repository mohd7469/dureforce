<form role="form"  class="user-profile-form" action="{{ route('user.software.store.overview') }}" method="POST">
    @csrf
    <div class="card-body">
        <div class="card-form-wrapper">
            <div class="row justify-content-center">
                <input type="hidden" value="{{ $software->id ?? '' }}" name="software_id">
                <div class="col-xl-12 col-lg-12 form-group">
                    <label>@lang('Title')*</label>
                    <input type="text" id="title_over" name="title" maxlength="255" value="{{ old('title', @$software->title) }}"
                        class="form-control" placeholder="@lang(' E.g. Full Stack Developer ')"   >

                </div>

                <div class="col-xl-8 col-lg-8 form-group">
                    <label>@lang('Description')*</label>
                    <textarea class="form-control bg--gray"id="description" placeholder="@lang(' This is a short description for this Software.')"
                        name="description">{{ old('description', @$software->description) }}</textarea>

                </div>

                <div class="col-xl-4 col-lg-4 form-group select2Tag">
                    <label>@lang('Software Tags')*</label>

                    <select data-placeholder="Please Select Tags" class="select2 tags" id="tags" name="tag[]"
                        multiple="multiple" >
                        {{-- <option selected="" disabled="" class="default-select">@lang('Tag1, Tag2, Tag3')</option> --}}

                        @if ($software && count($software->tags)>0)
                            @foreach ($tags as $tag)
                                <option {{isSelectedTag($tag->id,$software->tags)}} > {{ $tag->name }}</option>
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

                <div class=" col-sm-12 col-xl-4 col-lg-4 form-group pt-4">
                    <label>@lang('Category')*</label>
                    <select class="form-control bg--gray" name="category_id" id="category">
                        <option selected="" disabled="">@lang('Select Category')</option>
                        @if (!empty($software))
                            @foreach (\App\Models\Category::getByType(\App\Models\Category::ServiceType) as $category)
                                <option value="{{ $category->id }}" @if ($category->id == $software->category_id) selected @endif>
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

                <div class="col-sm-12  col-xl-4 col-lg-4 form-group pt-4">
                    <label for="subCategorys">@lang('Sub Category*')</label>
                    <select name="sub_category_id" class="form-control mySubCatgry" id="sub-category" >
                        <option selected="" disabled="">@lang('Select Category')</option>

                        @if (!empty($software))
                        @foreach (\App\Models\Category::find($software->category_id)->subCategory as $sub)
                            <option @if ($sub->id == $software->sub_category_id) selected @endif value="{{ $sub->id }}">
                                {{ $sub->name }}</option>
                        @endforeach
                    @endif
                    </select>

                </div>

                <div class="col-sm-12  col-xl-4 col-lg-4 col-md-4  form-group pt-4">
                    <label for="features[]">@lang('Include Feature')*</label><p class="include_error"></p>
                    <select class="form-control select2 select2-hidden-accessible " multiple="" data-placeholder="Select Features" style="width: 100%;" tabindex="-1" aria-hidden="true" name="features[]" id="service_features" >
                        @if (!empty($software))
                            @foreach ($features as  $item )
                                <option value="{{ $item->id }}" @if(in_array($item->id,$software->features->pluck('id')->toArray())) selected @endif>
                                    {{ __($item->name) }}</option>
                            @endforeach
                        @else
                            @foreach($features as  $item)
                                <option value="{{__($item->id)}}">{{__($item->name)}}</option>
                            @endforeach
                        @endif
                        

                    </select>

                </div>

                <div class="col-md-12 col-lg-12 col-sm-12">
                    <label for="software_application">@lang('Software Application')</label>
                    <textarea name="software_application" id="software_application" cols="30" rows="3" wrap="virtual" class="form-control module-description ">{{ old('software_application',@$software->software_application) }}</textarea>
                </div>
                
                <input type="checkbox" name="skills[]" id="" checked value="1" style="display: none">

                <div class="row">
                    <div class="col-md-6">
                        <a class="stepwizard-step service--btns btn btn-secondary float-left  mt-20 w-100"
                                href="{{url()->previous()}}" type="button">@lang('BACK')</a>
                    </div>
                    <div class="col-md-6 text-right">
                        <a class="stepwizard-step service--btns btn btn-secondary float-left  mt-20 w-100"
                                href="{{route('user.software.index')}}" type="button">@lang('Cancel')</a>
    
                        <button class="btn softwar-save-draft--btns btn-secondary float-left  mt-20 w-100"  name="action" type="submit" value="save_project">
                            @lang('Save as Draft')
                         </button> 
                         
                         <button type="submit" name="action" class="btn btn-save-continue btn-primary float-left mt-20 w-100" value="continue">@lang('Continue')</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</form>
