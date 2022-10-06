<div id="carouselExampleControls" class="carousel" data-bs-ride="carousel">
    <div class="carousel-inner">
    @foreach($sellers as $seller)
        <div class="carousel-item ">
            <div class="card user_profile_card  bg-gray">
                    <div class="image-holder">
                        <figure>
                            <img class="card-img-top picture"
                                 src="{{asset('assets\images\user\profile\Ellipse 2.png')}}"
                                alt="Card image cap">
                            <figcaption>
                                <span class="name">{{ !empty($seller->fullname)? $seller->fullname: '' }}</span>
                                    <span>{{ !empty($seller->location)? $seller->location: '' }}</span>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{ !empty($seller->basicProfile->designation)? $seller->basicProfile->designation: '' }}</p>
                        <p class="rating"><i class="fas fa-star"></i>4.5 (2342)</p>
                    </div>
            </div>
        </div>
    @endforeach
    </div>
    <span class="seeall"><a href="">See All</a></span>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
