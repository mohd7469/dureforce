@extends('admin.layouts.app')
@section('panel')
    <div class="row mb-none-30">
        <div class="col-xl-3 col-lg-5 col-md-5 col-sm-12">
            <div class="card b-radius--10 overflow-hidden box--shadow1">
                <div class="card-body p-0">
                    <div class="p-3 bg--white">
                        <div>
                            <img src="{{ getImage('assets/images/software/' . $software->image, '590x300') }}"
                                alt="@lang('Software image')" class="b-radius--10 w-100">

                            <div class="text-center my-3">
                                <h5>@lang('Demo Url') : <a href="{{ $software->demo_url }}"
                                        target="__blank">{{ $software->demo_url }}</a></h5>
                            </div>
                        </div>
                        <div class="mt-10">
                            <h4>{{ __($software->title) }}</h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card b-radius--10 overflow-hidden mt-30 box--shadow1">
                <div class="card-body">
                    <h5 class="mb-20 text-muted">@lang('Seller Information')</h5>
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            @lang('Username')
                            <span class="font-weight-bold">{{ __(@$software->user->username) }}</span>
                        </li>

                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            @lang('Status')
                      
                                <span class="badge badge-pill bg--success">@lang('Active')</span>
                          
                                <span class="badge badge-pill bg--danger">@lang('Banned')</span>
                        
                        </li>

                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            @lang('Balance')
                            <span class="font-weight-bold">{{ getAmount(@$software->user->balance) }}
                                {{ __(@$general->cur_text) }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-xl-9 col-lg-7 col-md-7 col-sm-12 mt-10">

            <div class="row mb-30">
                <div class="col-lg-6 mt-2">
                    <div class="card border--dark">
                        <h5 class="card-header bg--dark">@lang('Software Information')</h5>
                        <div class="card-body">
                            <ul class="list-group">
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center font-weight-bold">
                                    @lang('Category')
                                    <span>{{ __(@$software->category->name) }}</span>
                                </li>
                                @if (!empty($software->sub_category_id))
                                    <li
                                        class="list-group-item d-flex justify-content-between align-items-center font-weight-bold">
                                        @lang('Sub Category')
                                        <span>{{ __(@$software->subCategory->name) }}</span>
                                    </li>
                                @endif

                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center font-weight-bold">
                                    @lang('Service Price')
                                    <span>{{ getAmount($software->amount) }} {{ $general->cur_text }}</span>
                                </li>

                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center font-weight-bold">
                                    @lang('Last Update')
                                    <span>{{ diffforhumans($software->updated_at) }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 mt-2">
                    <div class="card border--dark">
                        <h5 class="card-header bg--dark">@lang('Other Information')</h5>
                        <div class="card-body">
                            <ul class="list-group">
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center font-weight-bold">
                                    @lang('Status')
                                    @if($software->status_id == 24)
                                        <span class="badge badge-pill bg--success">@lang('Approved')</span>
                                    @elseif($software->status_id == 25)
                                        <span class="badge badge-pill bg--danger">@lang('Canceled')</span>
                                    @elseif($software->status_id == 22)
                                        <span class="badge badge-pill bg--warning">@lang('Draft')</span>
                                    @elseif($software->status_id == 26)
                                        <span class="badge badge-pill bg--info">@lang('Under Review')</span>
                                    @else
                                        <span class="badge badge-pill bg--primary">@lang('Pending')</span>
                                    @endif
                                </li>


                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center font-weight-bold">
                                    @lang('Rating')
                                    <span>{{ getAmount($software->rating) }}</span>
                                </li>

                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center font-weight-bold">
                                    @lang('Like')
                                    <span>{{ $software->likes }}</span>
                                </li>

                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center font-weight-bold">
                                    @lang('Dislike')
                                    <span>{{ $software->dislike }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row mb-30">

                <div class="col-lg-3 mt-2">
                    <div class="card border--dark">
                        <h5 class="card-header bg--dark">@lang('File Include')</h5>
                        <div class="card-body">
                            <ul>
                                @if (!empty($software->file_include))
                                    @foreach ($software->file_include as $value)
                                        <li class="font-weight-bold">{{ $loop->iteration }}. {{ __($value) }}</li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-30">
                <div class="col-lg-12">
                    <div class="card border--dark">
                        <h5 class="card-header bg--dark">@lang('Description')</h5>
                        <div class="card-body">
                            @php echo $software->description @endphp
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('breadcrumb-plugins')
    <a href="{{ route('admin.software.download', encrypt($software->id)) }}" class="btn btn--primary"><i
            class="las la-cloud-download-alt"></i>@lang('Software')</a>
    <a href="{{ route('admin.document.download', encrypt($software->id)) }}" class="btn btn--info"><i
            class="las la-cloud-download-alt"></i>@lang('Document')</a>
@endpush
