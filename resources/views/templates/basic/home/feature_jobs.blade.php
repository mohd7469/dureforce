<div id="carouselFeatureJobs" class="carousel" data-bs-ride="carousel">
    <div class="carousel-inner">
        @foreach($jobs as $job)
        <div class="card col-xl-3 col-lg-3 col-md-4 col-sm-2 col-12 mt-5 carousel-item">
            <a href="{{route('seller.job.jobview',$job->uuid)}}">
            <div class="card-body">
                <h5 class="card-title "><strong>{{$job->title}}</strong></h5>
                <h6 class="card-subtitle mb-2 text-muted mt-3"><span><strong>10 Bids</strong></span> <span
                            style="padding-left: 20px;">{{isset($job->country) ? $job->country->name: 'World Wide'}}</span></h6>
                <p class="card-text mt-3" style="font-size: 12px;">{{\Illuminate\Support\Str::limit($job->description, 50, $end='...more')}}</p>
                <p class="skills-cont">
                    @foreach(($job->skill)->slice(0, 6) as $job_skill)
                        <button class=" btn-sm-job-list btn-skill-job-list mt-1" style="font-size: 12px;">{{$job_skill->name}}</button>
                    @endforeach
                </p>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-6 " style="font-size: 12px;">
                        <ul>
                            <li> @for($j=0; $j<5; $j++)<i
                                        class="fa fa-solid fa-star button-review-color" style="margin-left: 0.5px!important;"></i>@endfor</li>
                            <li class="button-review-color" style="font-weight: 600;">4.98 of 32 reviews</li>
                            <li><i class="fas fa-badge-check"></i><span>&nbsp;&nbsp;Payment Verified</span></li>
                        </ul>

                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-5 col-5 text-center">
                        <button class=" btn-sm-job-list job-list-price-button rounded"><?php if ($job->budget_type_id == \App\Models\BudgetType::$hourly){ echo "$".$job->hourly_start_range. " to $". $job->hourly_end_range. "<br>per hour"; }  else{ echo "$".$job->fixed_amount; } ?>  </button>
                    </div>

                </div>

            </div>
            </a>
        </div>
    @endforeach
    </div>
    <span class="seeall"><a href="{{ route('jobs.listing.old') }}">See All</a></span>
    <button class="carousel-control-prev carousel-mobile-view" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next carousel-mobile-view" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<style>
#carouselFeatureJobs .carousel-item {
    margin-right: 16px;
    flex: 0 0 23.333333%;
    display: block;
    margin-bottom: 20px;
}
</style>