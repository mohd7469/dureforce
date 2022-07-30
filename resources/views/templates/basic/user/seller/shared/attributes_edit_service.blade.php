@foreach ($attributes as $key => $attr)

    @php 
        $check = "";
       
        if(! empty($model->serviceDetail->entity_fields)) {
            if(array_key_exists($key, $model->serviceDetail->entity_fields)) {
                $check = $model->serviceDetail->entity_fields[$key];
            }
        } 
    @endphp 

    <div class="row">
        <div class="col-xl-4 col-lg-12">
            <p id="err"></p>
            <label for="">{{ __($attr->name ?? '') }}</label>
            @if ($attr->field_type != true)
                <select name="entity_field[]" class="form-control {{count($attr->attributes) > 1 ? 'attribute-selector' : ''}}" id=""
                    onchange="onSelectChange($(this), $('#back-{{ $key }}'), $('#front-{{ $key }}'))"
                   >
                    <option value="">Select {{ __($attr->name) }}</option>

                    <option value="1"
                        {{ $check == '1' ? 'selected' : '' }}>
                        {{ $attr->field_one ?? 'Front End' }}
                    </option>
                    <option value="0"
                        {{ $check == '0' ? 'selected' : '' }}>
                        {{ $attr->field_two ?? 'Back End' }}
                    </option>
                </select>
            @else
                <div class="form-group custom-check-group entity_field px-2" id="back-{{ $key }}">
                    <input
                        {{ $check == '1' ? 'checked' : '' }}
                        type="radio" name="entity_field[]" id="{{ $attr->id }}" value="1">
                    <label for="{{ $attr->id }}"
                        class="services-checks">{{ __($attr->field_one ?? 'Front End') }}</label>
                </div>
                <div class="form-group custom-check-group entity_field px-2" id="front-{{ $key }}">
                    <input
                        {{ $check == '0' ? 'checked' : '' }}
                        class="attrs-back"
                        type="radio" name="entity_field[]" id="{{ $attr->id + 1 }}" value="0">
                    <label for="{{ $attr->id + 1 }}"
                        class="services-checks">{{ __($attr->field_two ?? 'Back End') }}</label>
                </div>
            @endif
        </div>

        @if ($attr->field_type != true)
            <div class="{{ $attr->attribute_type == true ? 'attributes' : 'attributes-radio' }}">
                <div class="col-xl-12 col-lg-12 form-group mt-2 d-flex flex-wrap back"
                    style="display: {{ $check == '1' || $check == ""  ? 'none !important' : '' }}"
                    id="back-{{ $key }}">
                    @foreach ($attr->attributes as $keyBack => $back)
                        @if ($back->type == 0)
                            <div class="form-group custom-check-group px-2">
                                <input class="{{ $attr->attribute_type == true ? 'attrs-back' : 'attrs-radio-back' }}" type="{{ $attr->attribute_type == true ? 'checkbox' : 'radio' }}"
                                    @foreach ($model->serviceAttributes as $val) {{ $back->id == $val->attribute_id ? 'checked' : '' }} @endforeach
                                    name="attrs[] {{ $key }}" id="{{ $back->id }}" value="{{ $back->id }}"/>
                                <label for="{{ $back->id }}"
                                    class="services-checks">{{ __($back->name) }}</label>
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="col-xl-12 col-lg-12 form-group mt-2 d-flex flex-wrap front"
                    style="display: {{ $check == '0' || $check == ""  ? 'none !important' : '' }}"
                    id="front-{{ $key }}">
                    @foreach ($attr->attributes as $keyFront => $front)
                        @if ($front->type == 1)
                            <div class="form-group custom-check-group px-2">
                                <input class="{{ $attr->attribute_type == true ? 'attrs-front' : 'attrs-radio-front' }}" type="{{ $attr->attribute_type == true ? 'checkbox' : 'radio' }}"
                                    @foreach ($model->serviceAttributes as $val) {{ $front->id == $val->attribute_id ? 'checked' : '' }} @endforeach
                                    name="attrs[] {{ $key }}" id="{{ $front->id }}" value="{{ $front->id }}"  />
                                <label for="{{ $front->id }}"
                                    class="services-checks">{{ __($front->name) }}</label>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        @endif
    </div>
@endforeach

{{-- @todo push this code into create-service.js --}}
@push('script')
    <script>
        let action = 'edit';
    </script>
@endpush
