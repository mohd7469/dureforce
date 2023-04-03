@extends($activeTemplate.'layouts.frontend')
@section('content')
    <div class="container">
        <div class="offer-main-container">
            <!---Top Container Start-->
            <div class="offer-top-container">


                <div class="offerright">
                    @if (getLastLoginRoleId()==App\Models\Role::$Freelancer && $offer->status_id == App\Models\ModuleOffer::STATUSES['PENDING'])
                        <a href="{{route('seller.offer.accept',$offer->uuid)}}" class="offer-width ">Accept Offer</a>
                        <a href="{{route('seller.offer.reject',$offer->uuid)}}" class="offer-width ">Reject Offer</a>
                    @elseif (getLastLoginRoleId()==App\Models\Role::$Client && $offer->status_id == App\Models\ModuleOffer::STATUSES['PENDING'])
                        <a href="{{ route('buyer.offer.withdraw',$offer->uuid) }}" class="offer-width">Withdraw Offer</a>
                    @elseif($offer->status_id == App\Models\ModuleOffer::STATUSES['ACCEPTED'])
                        <a href="{{route('contracts.show',$offer->contract->uuid)}}" class="offer-width">View Contract</a>
                    @else
                        @if (getLastLoginRoleId()==App\Models\Role::$Client)
                            <a href="{{route('buyer.send.offer',$offer->proposal->uuid)}}" class="offer-width">Resend Offer</a>
                        @endif
                    @endif


                    <a href="#" class="offerclick"><img src="/assets/images/job/menuc.png" alt="img"></a>
                </div>

                <div class="offerleftc">
                    <div class="offer-profilecon">
                        <div class="offer-left"><img src="{{ $offer->sendToUser->user_basic->profile_picture ? $offer->sendToUser->user_basic->profile_picture:  '/assets/images/job/profile-img.png' }}" alt="img" style="border-radius: 50%;height:100px;width:100px"></div>
                        <div class="offerrightc">
                            <h4 class="offer-pname"> {{$offer->sendToUser->fullname}}</h4>
                            <p class="offer-pdesti">{{$offer->sendToUser->job_title}}</p>
                            <ul class="offer-location">
                                <li>{{$offer->sendToUser->location }}</li>
                                <li>{{ showDateTime($offer->sendToUser->created_at, 'd M Y') }}</li>
                                <li>{{ date('H:i',strtotime($offer->sendToUser->last_activity_at)) }} Time -o- clock</li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>

            <!---Top Container End-->

            <!---Description Container Start -->
            <div class="offer-description">
                <div class="offer-d-left">
                    <p class="offer-title">{{$offer->contract_title}}</p>
                    <p class="offer-detail">{{$offer->description_of_work}}</p>
                </div>

            </div>
            <!---Description Container Start -->

            <!---Contact Details Section Start-->
            <div class="offer-contactinfo-s">
                <p class="offer-title"> Contact Details</p>

                <ul class="offer-cnt-info">
                    <li>
                        <p>{{$offer->status->name}}</p>
                        <p>{{$offer->status->name}} expire on {{getFormattedDate($offer->expire_at,'d-m-Y')}}</p>
                    </li>
                    <li>
                        <p>Offer Made by</p>
                        <p>{{$offer->sendByUser->full_name}}</p>
                    </li>
                    <li>
                        <p>Job Category</p>
                        <p>{{$offer->module->category->name}}</p>
                    </li>
                    <li>
                        <p>Offer Expires</p>
                        <p>{{getFormattedDate($offer->expire_at,'d-m-Y')}}</p>
                    </li>
                    <li>
                        <p>Offer Date</p>
                        <p>{{getFormattedDate($offer->created_at,'d-m-Y')}}</p>
                    </li>
                    <li>
                        <p>Start Date</p>
                        <p>September 1 , 2022</p>
                    </li>
                    @if ($offer->payment_type==App\Models\ModuleOffer::PAYMENT_TYPE['HOURLY'])
                        <li>
                            <p>Hourly Rate</p>
                            <p>$30.00/hr</p>
                        </li>
                    @else

                        <li>
                            <p>Offer Amount</p>
                            <p>${{$offer->offer_amount}}</p>
                        </li>

                    @endif


                    <li>
                        <p>Weekly Limit</p>
                        <p>40hrs/week</p>
                    </li>
                    <li>
                        <p>Manual time Allowed</p>
                        <p>Yes</p>
                    </li>
                </ul>

            </div>
            <!---Contact Details Section End-->

        </div>
    </div>




@endsection
@push('style')
    <style>
        .offer-main-container{
            background: #F8FAFA;
            border: 1px solid #CBDFDF;
            padding: 30px 20px;
        }
        .offer-description {
            width: 100%;
            display: inline-block;
            padding-top: 30px;
        }
        .offer-top-container{
            width: 100%;
            display: inline-block;
            border-bottom: 1px solid #CBDFDF;
            padding-bottom: 55px;
        }
        }
        .offer-profilecon{
            width: 100%;
            display: inline-block;
        }
        .offerleftc{
            width: 50%;
            float: left;
            display: inline-block;
        }
        .offerright{
            width: 50%;
            float: right;
            display: inline-block;
            text-align: right;
        }
        .offer-left{
            width: 20%;
            float: left;
            display: inline-block;
        }
        .offerrightc{
            width: 70%;
            display: inline-block;
            float: left;
        }
        .offer-description{
            width: 100%;
            display: inline-block;
            padding: 30px 0px;
            border-bottom: 1px solid #CBDFDF;
        }

        }
        h4.offer-pname {
            font-weight: 600;
            font-size: 18px;
            line-height: 23px;
            color: #7F007F;
        }
        p.offer-pdesti {
            font-weight: 500;
            font-size: 14px;
            line-height: 18px;
            color: #000000;
        }
        ul.offer-location li {
            float: left;
            font-weight: 600;
            font-size: 14px;
            line-height: 18px;
            color: #000000;
            margin-right: 30px;
            position: relative;
            padding-left: 23px;
        }
        ul.offer-location li:before{
            width:24px;
            height: 24px;
            position: absolute;
            content:'';
            left: 0px;
            top:2px;
            background:url(/assets/images/job/l-icon.png) no-repeat;
        }
        ul.offer-location li:nth-child(2):before{
            background:url(/assets/images/job/clock-icon.png) no-repeat;
        }
        a.offer-width {
            font-size: 14px;
            border: 1px solid #7f007f;
            padding: 13px 28px;
            font-weight: 600;
            border-radius: 4px;
            margin: 0px 13px;
            border-radius: 5px;
            font-weight: 600;
            font-size: 15px;
            line-height: 18px;
            text-align: center;
            color: #7F007F;
        }
        a.offerclick {
            cursor: pointer;
        }
        p.offer-title {
            font-weight: 600;
            font-size: 22px;
            line-height: 28px;
            text-align: left;
            color: #000000;
        }
        p.offer-detail {
            font-size: 16px;
            line-height: 20px;
            text-align: left;
            color: #000000;
            margin-top: 30px;
        }
        .offer-d-left {
            width: 60%;
            float: left;
            display: inline-block;
        }
        .offer-d-right {
            background: #EEF7F7;
            border-radius: 4px;
            width: 299px;
            height: 234px;
            float: right;
            display: inline-block;
            padding: 15px 19px;
        }
        .offer-pimg {
            float: left;
            width: 30%;
            float: left;
            display: inline-block;
        }
        .offer-status {
            float: left;
            display: inline-block;
            padding-left: 20px;
        }
        .offer-status p {
            font-style: normal;
            font-weight: 600;
            font-size: 14px;
            line-height: 18px;
            color: #000000;
            margin-bottom: 6px;
        }
        p.offer-status-name{
            font-weight: 600;
            font-size: 16px;
            line-height: 20px;
            color: #7F007F;
        }
        .abt-title {
            font-weight: 600;
            font-size: 16px;
            line-height: 20px;
            text-align: left;
            color: #000000;
            width: 100%;
            display: inline-block;
            padding-bottom: 20px;

        }
        ul.offer-cnt-info {
            width: 100%;
            display: inline-block;
            margin-top:27px;
        }
        ul.offer-cnt-info li {
            float: left;
            width: 35%;
            margin-bottom:30px;
        }
        ul.offer-cnt-info li p:nth-child(1) {
            color: red;
            font-weight: 600;
            font-size: 16px;
            line-height: 20px;
            text-align: left;
            color: #808285;
            margin-bottom: 10px;
        }
        ul.offer-cnt-info li p:nth-child(2){
            font-weight: 600;
            font-size: 14px;
            line-height: 18px;
            text-align: left;
            color: #000000;
        }
        .offer-contactinfo-s {
            display: inline-block;
            width: 100%;
            padding-top: 24px;
        }

        @media only screen and (max-width:767px){

            element.style {
            }
            .offer-d-right {
                margin-top: 30px;
                width: 100%;
                height: 234px;
                float: left;
            }
            .offer-d-left {
                width: 100%;
            }
            .offerleftc{
                width: 100%;
                float: left;
                display: inline-block;
            }
            .offerright{
                width: 100%;
                float: left;
                display: inline-block;
                padding: 30px 0px;
            }
            .offerrightc {
                padding-left: 22px;
            }
            ul.offer-cnt-info li{
                width: 100%;
            }
        }
    </style>
@endpush
@push('script')
    <script>
        "use strict";
        $(document).ready(function(){
            $("#loginWithGmail").modal('show');
        });
    </script>
@endpush
