@extends($activeTemplate.'layouts.frontend')
@push('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
@endpush
@section('content')


    <section>

        <div class="row container">
            @foreach($jobs as $job)
                <div class="card col-xl-3 col-lg-3 col-md-4 col-sm-2 col-12 mt-4 " style="width: 19rem;">
                    <a href="{{route('job.jobview',$job->uuid)}}">
                    <div class="card-body">
                        <h5 class="card-title "><strong>{{$job->title}}</strong></h5>
                        <h6 class="card-subtitle mb-2 text-muted mt-3"><span><strong>10 Bids</strong></span> <span
                                    style="padding-left: 20px;">USA</span></h6>
                        <p class="card-text mt-3" style="font-size: 12px;">{{\Illuminate\Support\Str::limit($job->description, 50, $end='...more')}}</p>
                        <p>
                            @foreach($job->skill as $job_skill)
                            <button class=" btn-sm-job-list btn-skill-job-list mt-1" style="font-size: 12px;">{{$job_skill->name}}</button>
                            @endforeach
                        </p>
                        <div class="row">
                            <div class="col-lg-7 col-md-7 col-sm-7 col-7 " style="font-size: 12px;">
                                <ul>
                                    <li> @for($j=0; $j<5; $j++)<i
                                                class="fa fa-solid fa-star button-review-color"></i>@endfor</li>
                                    <li class="button-review-color" style="font-weight: 600;">4.98 of 32 reviews</li>
                                    <li><i class="fas fa-badge-check"></i><span>Payment Verified</span></li>
                                </ul>

                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-5 col-5 text-center">
                                <button class=" btn-sm-job-list job-list-price-button"><?php if ($job->budget_type_id == \App\Models\BudgetType::$hourly){ echo "$".$job->hourly_start_range. " to $". $job->hourly_end_range. "<br>per hour"; }  else{ echo "$".$job->fixed_amount; } ?>  </button>
                            </div>

                        </div>

                    </div>
                    </a>
                </div>
            @endforeach
        </div>

    </section>



    @include($activeTemplate . 'partials.end_ad')
@endsection


@push('style')
    <style>
        .button-review-color {
            color: #007F7F;
        }

        .job-list-price-button {
            background: #7F007F;
            font-size: 12px;
            text-align: center;
            vertical-align: middle;

            position: absolute;
            top: 50%;
            left: 50%;
            margin-right: -50%;
            transform: translate(-50%, -50%)
        }

        .btn-skill-job-list {

            background: #007F7F;
            border-radius: 4px;
        }

        .btn-sm-job-list {
            color: white;
        }
    </style>
@endpush
