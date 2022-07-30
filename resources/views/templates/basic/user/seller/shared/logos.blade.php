@if (! empty($model->logos))
    @foreach (App\Models\Logo::where('status', true)->get() as $key => $value)
        <li class="logo-li"><input name="logo_id[]" value="{{ $value->id }}" @foreach($model->logos as $logo) {{ $logo->logo_id === $value->id ? 'checked' : '' }} @endforeach type="checkbox" id="cb{{ $key }}" />
            <label class="logo-label" for="cb{{ $key }}"><img
                    src="{{ getImage('assets/images/service/' . $value->image, '590x300') }}" width="100" /></label>
        </li>
    @endforeach
@else
    @foreach (App\Models\Logo::where('status', true)->get() as $key => $value)
        <li class="logo-li"><input name="logo_id[]" value="{{ $value->id }}" type="checkbox"
                id="cb{{ $key }}" />
            <label class="logo-label" for="cb{{ $key }}"><img
                    src="{{ getImage('assets/images/service/' . $value->image, '590x300') }}"
                    width="100" /></label>
        </li>
    @endforeach
@endif
