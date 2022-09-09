@extends($activeTemplate.'layouts.frontend')
@section('content')
<section class="all-sections pt-3">
    <div class="container-fluid p-max-sm-0">
        <div class="sections-wrapper d-flex flex-wrap justify-content-center">
            <article class="main-section">
                <div class="section-inner">
                    <div class="item-section item-details-section">
                        <div class="container single-jobc">
                            <div class="item-details-content" style="padding-top: 0px;">
                                <h2 class="title" style="color:#4d9d97">Submit a Proposal</h2>
                            </div>
                            <div  class="jobdetail-c">
                                Job Details
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </div>
</section>
@include($activeTemplate . 'partials.end_ad')
@endsection