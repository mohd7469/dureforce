@extends($activeTemplate.'layouts.frontend')
@section('content')
    <div class="categories_type_container">
        @include('templates.basic.partials.category._header', [
            'type_id' => \App\Models\Category::JobType,
        ])</div>

    <section class="filters-container bg-grey p-15  ">
        <div class="container p2">
            <div class="d-flex"> <h5 class=""><b>All Categoriesxxxx > </b> </h5> </div>
            <div class="row align-items-center">
                {{-- <article class=" col-12 col-md-4 ">
                    <h1 class="heading m-0">Jobs</h1>
                </article> --}}
                <div class="filter-forms col-12 col-md-8">
                    <div class="row justify-content-end">
                        <form id="search" action="{{ route('job') }}" style="width: fit-content;" class="row" method="GET">

                            <div class="form-container col-12 col-md-3">

                                <select name="category_id" class="form-control">
                                    <option value="">Select Categories</option>
                                    @foreach (\App\Models\Category::getByType(\App\Models\Category::ServiceType) as $category)
                                        @if (old('category_id', request()->get('category_id')) == $category->id)
                                            <option selected value="{{ $category->id }}">{{ $category->name }}</option>
                                        @else
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-container col-12 col-md-3">
                                <select name="feature_id" class="form-control">
                                    <option value="" selected>Select Feature</option>
                                    @foreach (\App\Models\Features::getDefault() as $feature)
                                        @if (old('feature_id', request()->get('feature_id')) == $feature->id)
                                            <option selected value="{{ $feature->id }}">{{ $feature->name }}</option>
                                        @else
                                            <option value="{{ $feature->id }}">{{ $feature->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>


                            <div class="form-container col-12 col-md-3">
                                <input type="text" name="title" value="{{ old('title', request()->get('title')) }}"
                                    class="form-control" placeholder="Title....">
                            </div>


                            {{-- <div class="form-container col-12 col-md-3"> --}}
                            {{-- <select class="form-control"> --}}
                            {{-- <option>Select Type</option> --}}
                            {{-- </select> --}}
                            {{-- </div> --}}
                            <div class="form-container col-12 col-md-3">
                                <button class="btn btn-success" type="submit">Search</button>
                                {{-- <input type="reset" name="reset" value="Reset Form"/> --}}
                            </div>


                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="all-sections   section-padding">
        <div class="container">
            <article class="">
                <h2 class="heading"> Jobs</h2>
            </article>

            <div class="container mb-3 float-right">
                <div class="row">
                    <div class="col">
                        {{ $jobs->links() }}
                    </div>
                </div>
            </div>


            <div class="row item-card-wrapper grid-view">
                @forelse($jobs as $job)
                    @include($activeTemplate . 'components.jobs.tile', ['job' => $job])
                @empty
                    <div class="empty-message-box bg--gray">
                        <div class="icon"><i class="las la-frown"></i></div>
                        <p class="caption">{{ __($emptyMessage) }}</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    @include($activeTemplate . 'partials.end_ad')
@endsection

@push('script')
    <script>
        'use strict';
        $('#defaultSearch').on('change', function() {
            this.form.submit();
        });
    </script>
@endpush
