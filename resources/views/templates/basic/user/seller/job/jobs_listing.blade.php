@extends($activeTemplate.'layouts.frontend')
@push('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
@endpush
@section('content')

<div class="categories_type_container">
<!-- <div class="header-short-menu">
    <div class="container-fluid">
        <div class="row justify-content-center align-items-center flex-start">
            <div class="nav-prev arrow" style="display: none;"></div>
                <div class="col-lg-12 px-5 cat-nav">
                    <ul class="text-center main_nav" id="active">
                        @foreach($categories as $category)
                            <li class="nav-item " >
                            <a href="{{ route('seller.jobs.listing', ['category'=>$category->id]) }}"> {{$category->name}}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div> -->

 <section class="container">
 <div>
            <div>
{{--                <div class="categories_type_container">--}}
{{--                    <div class="header-short-menu mt-3">--}}
{{--                <div class="container-fluid">--}}
{{--                    <div class="row justify-content-left align-items-left flex-start">--}}
{{--                        <div class="nav-prev arrow" style="display: none;"></div>--}}
{{--                        <div class="col-lg-1 t-sbh">Sub Categories: </div>--}}
{{--                        --}}
{{--                        <div class="col-lg-11 sub-nav">--}}
{{--                            <ul class="text-center  listing-nav-in">--}}
{{--                                @isset($subcategories)--}}
{{--                                <li class="nav-item active-c">--}}
{{--                                    All--}}
{{--                                 </li>--}}
{{--                                    @foreach($subcategories as $subcategorie)--}}
{{--                                        <li class="nav-item">--}}
{{--                                           {{$subcategorie->name}}--}}
{{--                                        </li>--}}
{{--                                    @endforeach--}}
{{--                                @endisset--}}
{{--                           </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                </div>--}}
{{--                </div>--}}
            </div>
        <div class="row ">
{{--            <div class="isub-head-con">--}}
{{--                <div class="isub-heading"> {{$Categorytitle->name  ?? ''}} Jobs</div>--}}
{{--                <div class="right-con-isub">--}}
{{--                    <span class="isub-filter">Filter</span>--}}
{{--                   <div id="custom-search-input">--}}
{{--                        <div class="input-group col-md-12">--}}
{{--                            <input type="text" class="form-control input-lg" placeholder="Search job"/>--}}
{{--                            <span class="input-group-btn">--}}
{{--                                <button class="btn btn-info btn-lg" type="button">--}}
{{--                                    <i class="glyphicon glyphicon-search"></i>--}}
{{--                                </button>--}}
{{--                            </span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
            @foreach($jobs as $job)
                <div class="card col-xl-3 col-lg-3 col-md-4 col-sm-2 col-12 mt-5 " style="width: 19rem;">
                    <a href="{{route('seller.job.jobview',$job->uuid)}}">
                    <div class="card-body">
                        <h5 class="card-title "><strong>{{$job->title}}</strong></h5>
                        <h6 class="card-subtitle mb-2 text-muted mt-3"><span><strong>10 Bids</strong></span> <span
                                    style="padding-left: 20px;">{{isset($job->country) ? $job->country->name: 'World Wide'}}</span></h6>
                        <p class="card-text mt-3" style="font-size: 12px;">{{\Illuminate\Support\Str::limit($job->description, 50, $end='...more')}}</p>
                        <p class="skills-cont">
                            @foreach($job->skill as $job_skill)
                            <button class=" btn-sm-job-list btn-skill-job-list mt-1" style="font-size: 12px;">{{$job_skill->name}}</button>
                            @endforeach
                        </p>
                        <div class="row">
                            <div class="col-lg-7 col-md-7 col-sm-7 col-7 " style="font-size: 12px;">
                                <ul>
                                    <li> @for($j=0; $j<5; $j++)<i
                                                class="fa fa-solid fa-star button-review-color" style="margin-left: 0.5px!important;"></i>@endfor</li>
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
        </div>

    </section>



    @include($activeTemplate . 'partials.end_ad')
@endsection


@push('style')
    <style>
        @media (max-width: 1400px){
         .header-short-menu {
                padding: 0px 10px;
        }
        }
    
.skills-cont{
    min-height: 80px !important;
}
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
         .cat-nav{
            padding: 12px 0px 20px;
            width: 92.5%;
            -ms-overflow-style: -ms-autohiding-scrollbar;
            -webkit-overflow-scrolling: touch;
            white-space: nowrap;
            }
        .cat-nav li {
            margin: -21px 30px;
            display: inline-table;
            /* margin: 0 13px; */
            font-size: 13px;
            font-weight: 600;
        }
        .cat-nav ul{
            display: inherit;
        }
        .sub-nav ul{
            display: inherit;
        }
        .sub-nav {
            padding: 12px 0px 20px;

        }
        .sub-nav {
            width: 100.5%;
        }
        .sub-nav li {
            margin: 0px 15px;
            display: inline-table;
            /* margin: 0 13px; */
            font-size: 12px;
            font-weight: 600;
        }
        .listing-jb-container{
            background: #F8FAFA;
            border: 1px solid #CBDFDF;
            
        }
        .listing-nav-in li a {
            font-weight: 600;
            font-size: 14px;
            line-height: 18px;
            color: #636060;
        }
        .listing-nav-in {
            text-align: left;
            display: inline-block;
            float: left;
        }
        .sub-nav{
            width: 82.5%;
        }
        .t-sbh {
            width: 130px;
            position: relative;
            top: 23epx;
            font-weight: 600;
            font-size: 14px;
            line-height: 18px;
            color: #000000;
            padding-top: 18px;
            margin-bottom: 10px;
        }
        .isub-head-con{
            width: 100%;
            display: inline-block;
            padding: 28px 0px 6px 0px;
        }
        .isub-heading{
            float:left;
            display: inline-block;
            width: 30%;
            font-weight: 600;
            font-size: 22px;
            line-height: 28px;
            color: #000000;
            padding-left: 11px;
        }
        .right-con-isub{
            float: right;
            display: inline-block;
        }
        span.isub-filter {
            width: 98px;
            height: 44px;
            background: #EFF8F8;
            border: 1px solid #CBDFDF;
            border-radius: 5px;
            float: right;
            font-weight: 600;
            font-size: 15px;
            line-height: 18px;
            color: #007F7F;
            text-align: center;
            padding-top: 13px;
            padding-left: 30px;
            background: #EFF8F8 url(/assets/images/job/lines.png) no-repeat;
            background-position: 14px center;
            cursor: pointer;

        }
        
        #custom-search-input {
            border: solid 1px #E4E4E4;
            border-radius: 6px;
            float: right;
            width: 242px;
            height: 44px;
            background: #EFF8F8;
            border: 1px solid #CBDFDF;
            border-radius: 6px;
            margin-right:14px;
        }

        #custom-search-input input {
            border: 0;
            box-shadow: none;
            background: transparent;
        }

        #custom-search-input button {
            margin: 5px 0 0 0;
            background: none;
            box-shadow: none;
            border: 0;
            color: #666666;
            padding: 0 8px 0 10px;
            /* border-left: solid 1px #ccc; */
            background: url(/assets/images/job/searchicon.png) no-repeat;
            width: 26px;
            height: 30px;
            margin-right: 10px;
            background-position: center;
            margin-right: 15px;
        }

        #custom-search-input button:hover{
            border: 0;
            box-shadow: none;
            border-left: solid 1px #ccc;
        }
        li.nav-item.active-c {
            border-bottom: 2px solid #007F7F;
        }
        .intro{border-bottom: 2px solid #007F7F;}
        .ul-margin li:nth-child(1) a{border-bottom: 2px solid #007F7F;}
        .intro2{
            border-bottom: 2px solid #007F7F !important;
        }

        @media only screen and (max-width:767px){
            .isub-heading{
                font-size: 18px !important;
            }
            .t-sbh {
                width: 100%;
                position: relative;
                left: 0px;
                top: 6px;
                font-weight: 600;
                font-size: 16px;
                line-height: 18px;
                color: #000000;
                text-align: center;
            }
        }
                @media (min-width: 768px){
                .container {
                    max-width: 1390px !important;
                }
        }
        
        .main_nav > :first-child {
           border-bottom: 2px solid #007F7F!impo;
        }
        
    </style>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 
    <script>


jQuery(function($) {

     $("#active").removeClass("main_nav");
     var path = window.location.href;

     $('ul a').each(function() {
      if (this.href === path) {
         
        $("ul").removeClass("main_nav");
        $(this).addClass('intro');

    
      }
     });
   
    });

  

    </script>
@endpush
