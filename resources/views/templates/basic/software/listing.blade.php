@extends($activeTemplate.'layouts.frontend')
@section('content')
@guest
    <div class="categories_type_container">
        @include('templates.basic.partials.category._header',['type_id'=>\App\Models\Category::SoftwareType])</div>
@endguest        

    <section class="filters-container bg-grey p-15  ">
        <div class="container p2">
            <div class="d-flex"> <h5 class=""><b>All Categories > </b></h5> </div>
            <div class="row align-items-center">
                <article class=" col-12 col-md-4 ">
                    <h1 class="heading m-0" id="category_search_selected">Softwares</h1>
                </article>
                <div class="filter-forms col-12 col-md-8">
                    <div class="row justify-content-end">
                        @include('templates.basic.partials.filters.common_filter',['type_id'=>\App\Models\Category::SoftwareType,'route'=>route('software')])
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="all-sections   section-padding">
        <div class="container">
            {{-- <article class="default-article">
                <h2 class="heading"> Softwares</h2>
            </article> --}}

            <div class="container mb-3 float-right">
                <div class="row">
                    <div class="col">
                        {{ $softwares->links() }}
                    </div>
                </div>
            </div>

            <div class="row item-card-wrapper grid-view">
                @forelse($softwares as $software)
                    @include($activeTemplate.'components.software.tile',['software'=>$software])
                @empty
                    <div class="empty-message-box bg--gray">
                        <div class="icon"><i class="las la-frown"></i></div>
                        <p class="caption">{{ __($emptyMessage) }}</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    @include($activeTemplate.'partials.end_ad')
@endsection

@push('script')
    <script>
        'use strict';
        $('#defaultSearch').on('change', function () {
            this.form.submit();
        });

        $(document).ready(function () {
            fillSearchData();
        })

        function getQuerystring(key) {

        }

        function fillSearchData() {
            const urlSearchParams = new URLSearchParams(window.location.search);
            const params = Object.fromEntries(urlSearchParams.entries());
            for (const [key, value] of Object.entries(params)) {
                $(`select[name='${key}']`).val(value);
            }
        }

        function reset() {
            console.log($(this).parent('form'));
            $(this).parent('form').reset();
        }
    </script>
@endpush
