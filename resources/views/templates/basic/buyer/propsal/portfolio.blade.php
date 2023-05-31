<div class="pb-4">
    
    <h4 class="pb-2">Portfolio</h4>
    <i class="fa-regular fa-circle-ellipsis"></i>
    
    <div class="card">
        
        <div class="card-body " style="border:none">
            
            <div class="row">

                @foreach($portfolios as $key=>$portfolio)
               
                    <div class="col-md-3 ">
                        
                            @if ($portfolio->video_url)
                                <iframe src="{{portfolioVideoUrl($portfolio->video_url)}}" title="YouTube video player" frameborder="0" id="preview_video" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="width:15rem;height:185px"></iframe>
                            @else
                                <img alt="User Pic" src="{{$portfolio->attachments()->exists() ? $portfolio->attachments()->first()->url: asset('assets/images/seller/Rectangle 122.png') }}" id="profile-image1" class=" img-responsive" alt="Portfolio image not found">
                            @endif
                        
                            
                        <span class="card-text">
                            {{ substr($portfolio->name, 0,  25)}}
                        </span>
                        <a href="{{route('profile.portfolio.view',$portfolio->uuid)}}">
                            <strong class="portfolio-desc"> View...</strong>
                        </a>

                    </div>
                    
                    @if ( (($key+1) %4)  == 0)
                        <br>                      
                    @endif

                @endforeach
            </div>
            
        </div>

    </div>

</div>