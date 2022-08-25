
<style>
.features{
    height:600px !important;
    padding: auto;
}

    </style>


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
                    <select  data-placeholder="Tag1, Tag2, Tag3" class="form-control select2 tags" id="tags" name="tag[]"
                        multiple="multiple"   >
                        @if (!empty($software->tag))
                            @foreach ($software->tag as $tag)
                                <option selected="true"> {{ $tag }}</option>
                            @endforeach
                        @endif
                    </select>
                    <div id="error"></div>
                    {{-- <small>@lang('Tag and enter press')</small> --}}
                </div>

                <div class="col-xl-4 col-lg-4 form-group pt-4">
                    <label>@lang('Category')*</label>
                    <select class="form-control bg--gray" name="category_id" id="category">
                        <option selected="" disabled="">@lang('Select Category')</option>
                        @if (!empty($software))
                            @foreach (\App\Models\Category::getByType(\App\Models\Category::SoftwareType) as $category)
                                <option value="{{ $category->id }}" @if ($category->id == $software->category_id) selected @endif>
                                    {{ __($category->name) }}</option>
                            @endforeach
                        @else
                            @foreach (\App\Models\Category::getByType(\App\Models\Category::SoftwareType) as $category)
                                <option value="{{ __($category->id) }}">
                                    {{ __($category->name) }}
                                </option>
                            @endforeach
                        @endif
                    </select>

                </div>

                <div class="col-xl-4 col-lg-4 form-group pt-4">
                    <label for="subCategorys">@lang('Sub Category*')</label>
                    <select name="sub_category_id" class="form-control mySubCatgry" id="sub-category">
                        <option selected="" disabled="">@lang('Select Category')</option>
                        @if (!empty($software))
                            @foreach (\App\Models\Category::find($software->category_id)->subCategory as $sub)
                                <option @if ($sub->id == $software->sub_category_id) selected @endif value="{{ $sub->id }}">
                                    {{ $sub->name }}</option>
                            @endforeach
                        @endif
                    </select>

                </div>

          <div class="col-xl-4 col-lg-4 form-group pt-4 ">
          <label>@lang('Include Feature')*</label><p class="include_error"></p>
          @if (!empty($software))
          
          <select   placeholder="features" name="features[]" id='features' class="form-control features bg--gray">
          @foreach($features as $feature)
          <option selected="true"> {{ $feature->name }}</option>
          @endforeach
        </select>
         
          @else
          <select  placeholder="Select Features"  multiple  name="features[]" id='features' class="features form-control">
          <option selected="" disabled="">@lang('Select Features')</option>
          </select>
          @endif
        </div>
               <!-- <div class="col-xl-12 col-lg-12 ">
                    <label>@lang('Include Feature')*</label><p class="include_error"></p>
                    @if (!empty($software))
                    <div class="col-xl-12 col-lg-12 form-group mt-2 d-flex flex-wrap back">
                    @foreach ($features as $feature)
                    <div class="form-group px-4">
   <label for="privacy" class="d-flex">
   <input  id="include" type="checkbox" name="features[]" class="checkbox-review"  value="{{ $feature->id }}"  @foreach ($software->featuressoftware as $value) {{ $feature->id == $value->id ? 'checked' : '' }} @endforeach
      />
                    <span class="lbl-review review-check mb-3">{{ __($feature->name) }}</span>
                </label>
           </div>
            @endforeach
            </div>
            @else
            <div class="col-xl-12 col-lg-12 form-group mt-2 d-flex flex-wrap back">
            @foreach ($features as $feature)
            <div class="form-group px-4">
            <label for="privacy" class="d-flex">
            <input  id="include" value="{{ $feature->id }}"  class="checkbox-review" name="features[]" type="checkbox" />
          <span class="lbl-review review-check mb-3">{{ __($feature->name) }}</span>
            </label>
        </div>
        @endforeach
        </div>
        @endif -->
                    <!-- <select name="features[]" id="include" class="form-control ">
                        <option selected="" disabled="">@lang('Select Features')</option>
                        @if (!empty($software))
                            @foreach ($features as $feature)
                                <option
                                    @foreach ($software->featuressoftware as $value) {{ $feature->id == $value->id ? 'selected' : '' }} @endforeach
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
                    </select> -->

                
                <br>
                
                <br>

                <!-- @if (empty($software))
                    @include($activeTemplate . 'user.seller.shared.attributes')
                @else
                    @include($activeTemplate . 'user.seller.shared.attributes_edit_software', ['model' => $software])
                @endif -->

            </div>
            <hr />
            <div class="row">
                <div class="col-md-6"></div>
                <div class="col-md-6 text-right">
                    <button type="submit"
                        class="btn btn-save-continue btn-primary float-left mt-20 m-3 mb-0 w-100">@lang('SAVE AND CONTINUE')</button>
                </div>
            </div>

        </div>
    </div>
</form>
