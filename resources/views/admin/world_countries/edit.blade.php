@extends('admin.layouts.app')

@section('panel')
    <div class="row mb-none-30">
        <div class="col-xl-12 col-lg-7 col-md-7">

            <div class="card">
                <div class="card-body">
                    <form action="{{route('admin.world.country.update',$worldCountry->id)}}" method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            

                        {{-- Continent --}}
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-6 form-group">
                                <label>@lang('Continent')*</label>
                                <select class="form-control" name="continent" >
                                    <option selected="" disabled="">@lang('Select Continent')</option>
                                    @foreach($continents as $continent)
                                        <option value="{{__($continent->id)}}">{{__($continent->name)}}</option>
                                        <option value="{{ ($continent->id) }}" {{ $continent->id == $worldCountry->module_id ? 'selected' : '' }}>{{__($continent->name)}}</option>
                                    @endforeach
                                </select>
                            </div>
                          
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="form-control-label font-weight-normal">@lang('Name')<span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="name" value="{{$worldCountry->name}}" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="form-control-label font-weight-normal">@lang('Full Name')<span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="full_name" value="{{$worldCountry->full_name}}" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="form-control-label font-weight-normal">@lang('Capital')<span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="capital" value="{{$worldCountry->capital}}" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="form-control-label font-weight-normal">@lang('Code')<span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="code" value="{{$worldCountry->code}}" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="form-control-label font-weight-normal">@lang('Code alpha3')</label>
                                    <input class="form-control" type="text" name="code_alpha3" value="{{$worldCountry->code_alpha3}}" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="form-control-label font-weight-normal">@lang('Code Numeric')<span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="code_numeric" value="{{$worldCountry->code_numeric}}" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="form-control-label font-weight-normal">@lang('Country Emoji')</label>
                                    <input class="form-control" type="text" name="emoji" value="{{$worldCountry->emoji}}" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="form-control-label font-weight-normal">@lang('Currency Code')<span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="currency_code" value="{{$worldCountry->currency_code}}" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="form-control-label font-weight-normal">@lang('Currency Name')<span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="currency_name" value="{{$worldCountry->currency_name}}" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="form-control-label font-weight-normal">@lang('TLD')</label>
                                    <input class="form-control" type="text" name="tld" value="{{$worldCountry->tld}}" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="form-control-label font-weight-normal">@lang('Calling Code')<span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="callingcode" value="{{$worldCountry->callingcode}}" >
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn--primary btn-block btn-lg ctsmbtn" style="width: 200px; float: right;">@lang('Update')
                                    </button>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection


@push('script')

<script>

</script>

@endpush
