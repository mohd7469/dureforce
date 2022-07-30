<div class="row">
    <div class="slick-slider-container be-center ">

        @foreach ($sellers as $seller)
            <div class="col-3 ">
                <div class="card user_profile_card  bg-gray">
                    <div class="image-holder">
                        <figure>
                            <img class="card-img-top picture"
                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVR42mNk+P+/HgAFhAJ/wlseKgAAAABJRU5ErkJggg=="
                                style="background-image:url({{ imagePath()['profile']['user']['path'] . '/' . $seller->image }})"
                                alt="Card image cap">
                            <figcaption><span class="name">{{ $seller->username ?? $seller->email }}</span>
                                <span>{{ $seller->address->address }}</span>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{ $seller->designation ?? ' ' }}</p>
                        <p class="rating"><i class="fas fa-star"></i>4.5 (2342)</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
