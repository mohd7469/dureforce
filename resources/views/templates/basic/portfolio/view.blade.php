
<div class="row section-heading-border " style="margin-bottom: 23px;">
    
    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12"> <b>My Portfolio > {{$user_portfolio->name}}</b></div>
    <div class="sep-solid"></div>
    
    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 mt-2 mb-f">
        <Label>Project Name</Label>
        <Label>{{$user_portfolio->name}}</Label>
    </div>
    <div class="sep-solid"></div>

    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 mt-2 mb-f">
        <Label>Project Description</Label>
        <Label>{{$user_portfolio->description}}</Label>
    </div>
    <div class="sep-solid"></div>

    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 mt-2 mb-f">
        <Label>What was your Role in the Project?</Label>
        <Label>{{$user_portfolio->role}}</Label>
    </div>
    <div class="sep-solid"></div>

    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 mt-2 ">
        <Label>Project Images</Label>
        <div class="row">

            @if ($user_portfolio->attachments->isNotEmpty())
                
                @foreach ($user_portfolio->attachments as $item)
                    <div class="col-md-3 ">
                        <img alt="User Pic" src="{{ $item->url }}" id="profile-image1" class=" img-responsive" alt="Portfolio image not found">    
                    </div>
                @endforeach
                
            @endif

        </div>
       

    </div>
    <div class="sep-solid"></div>

    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 mt-2 ">
        <Label>Skills</Label>
        <div class="tags-container">

            @foreach($user_portfolio->skills as $item)
                <span  class=" grey_badge  skill_badge skills badge-secondary">{{$item->name}}</span>
            @endforeach    
            
        </div>
        
       
    </div>
    <div class="sep-solid"></div>


    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 mt-2 mb-f">
        <Label>Completion Date</Label>
        <label for="">{{$user_portfolio->completion_date}}</label>
    </div>
    <div class="sep-solid"></div>

    <div class="row">
        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 mt-2 mb-f">
            <Label>Youtube Url</Label>
            <label for="">{{$user_portfolio->video_url}}</label>
        </div>
        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 mt-2 mb-f">
            <Label>Public Url</Label>
            <label for="">{{$user_portfolio->project_url}}</label>
        </div>
    </div>
    <div class="sep-solid"></div>



</div>

<div class="row portfolio">
    <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
        
    </div>
</div>

@push('style')
    <style>
        .mb-f{
            margin-bottom: -16px;
        }
        .skills{
            height: 40px;
            text-align: middle !important;
        }
        .skill_badge {
            display: inline-block;
            padding: 1.25em 1.4em;
            font-size: 75%;
            line-height: 1;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: 0.25rem;
            background: #007f7f;
            color: white;
            border-radius: 20px;
        }
    </style>
@endpush