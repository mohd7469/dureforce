<div class="pb-4">
    
    <h4 class="pb-2">Portfolio</h4>
    <i class="fa-regular fa-circle-ellipsis"></i>
    
    <div class="card">
        
        <div class="card-body " style="border:none">
            
            <div class="row">

                @foreach($portfolios as $portfolio)
               
                    <div class="col-md-3 ">
                        @if ($portfolio->attachments->isNotEmpty())
                            <img alt="User Pic" src="{{ $portfolio->attachments[0]->url }}" id="profile-image1" class=" img-responsive" alt="Portfolio image not found">
                            
                        @endif
                        <span>{{$portfolio->name}}</span>
                    </div>
                @endforeach
            </div>
            
        </div>

    </div>

</div>