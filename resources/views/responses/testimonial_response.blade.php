<!DOCTYPE html>
<html lang="en">
    <head>
        @yield('header')
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Maven+Pro:wght@400;500;600;700;800;900&display=swap"
            rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css"
            rel="stylesheet">

        <link rel="stylesheet" href="{{asset($activeTemplateTrue.'frontend/css/fontawesome-all.min.css')}}">

        <link rel="stylesheet" href="{{asset($activeTemplateTrue.'frontend/css/fontawesome-all.min.css')}}">
        <link rel="stylesheet" href="{{asset($activeTemplateTrue.'frontend/css/bootstrap.min.css')}}">
        <link rel="shortcut icon" href="{{getImage(imagePath()['logoIcon']['path'] .'/favicon.png')}}" type="image/x-icon">
        <link rel="stylesheet" href="{{asset($activeTemplateTrue.'frontend/css/swiper.min.css')}}">
        <link rel="stylesheet" href="{{asset($activeTemplateTrue. 'frontend/css/chosen.css')}}">
        <link rel="stylesheet" href="{{asset($activeTemplateTrue.'frontend/css/line-awesome.min.css')}}">
        <link rel="stylesheet" href="{{asset($activeTemplateTrue.'frontend/css/animate.css')}}">
        <link rel="stylesheet" href="{{asset('/assets/resources/style/style.css')}}">
        <link rel="stylesheet" href="{{asset('/assets/resources/templates/basic/frontend/css/custom/custom.css')}}">
        <link rel="stylesheet" href="{{asset($activeTemplateTrue.'frontend/css/select2.min.css')}}">
        <link rel="stylesheet" href="{{asset($activeTemplateTrue.'frontend/css/seller_profile.css')}}">


        {{-- <link rel="stylesheet" href="{{asset('/assets/resources/style/index.scss')}}"> --}}

        <link rel="stylesheet" href="{{asset($activeTemplateTrue.'frontend/css/bootstrap-fileinput.css')}}">
        <link rel="stylesheet" href="{{asset('/assets/resources/style/index.css')}}">
        @stack('style-lib')
        @stack('style')
        <link href="{{ asset($activeTemplateTrue . 'frontend/css/color.php') }}?color={{$general->base_color}}&secondColor={{$general->secondary_color}}"
            rel="stylesheet"/>
       <style>
         .text_area{
                min-height: 150px !important
            }
            .rating {
                display: inline-block;
                position: relative;
                height: 50px;
                line-height: 50px;
                font-size: 50px;
                }

                .rating label {
                position: absolute;
                top: 0;
                left: 0;
                height: 100%;
                cursor: pointer;
                }

                .rating label:last-child {
                position: static;
                }

                .rating label:nth-child(1) {
                z-index: 5;
                }

                .rating label:nth-child(2) {
                z-index: 4;
                }

                .rating label:nth-child(3) {
                z-index: 3;
                }

                .rating label:nth-child(4) {
                z-index: 2;
                }

                .rating label:nth-child(5) {
                z-index: 1;
                }

                .rating label input {
                position: absolute;
                top: 0;
                left: 0;
                opacity: 0;
                }

                .rating label .icon {
                    float: left;
                    color: transparent;
                    margin-top: 20px;
                    margin-left: 3px;
                }

                .rating label:last-child .icon {
                    color: #000;
                }

                .rating:not(:hover) label input:checked ~ .icon,
                .rating:hover label:hover input ~ .icon {
                    color: #7f007f;
                }

                .rating label input:focus:not(:checked) ~ .icon:last-child {
                    color: #000;
                    text-shadow: 0 0 5px #7f007f;
                }
                .th_color{
                    color: #7f007f !important;

                }
       </style>
    </head>
    <body>

        <div class="container" >
            @foreach ($errors->all() as $error)
                
            <div class="alert alert-danger" role="alert">
               {{$error}}
              </div>

            @endforeach

            <div class="row  mt-5"  >
               <div class="row text-center">
                    <strong class="th_color"><h1 class="th_color"> Help {{$user->full_name}} with a testimonial</h1></strong>
               </div>
               <br>
                <div class="col-md-8 col-xl-8 col-lg-8 col-sm-12 offset-md-2 ">
                    <div class="row">
                        <div class="mt-3  ">
                            <div class="card mb-4">
                                <div class="card-body row">
                                    <div class="col-md-5 col-xl-5 col-lg-5 col-sm-12 ">
                                        <div >
                                        
                                            <img class="thumbnail" 
                                                src="{{ !empty($user->basicProfile->profile_picture)? $user->basicProfile->profile_picture: getImage('assets/images/default.png') }}" 
                                                id="preview-img"
                                                alt=""
                                            >
        
                                            
                                        </div>
                                        
        
                                        <h4 class="my-3 text-center">{{$user->full_name}}</h4>
                                        <h5 class="my-3 text-center">{{$user->job_title}}</h5>
                                        <div class="text-center ">
                                            <p class="short-text"><i class="fa fa-map-marker-alt"></i> {{$user->location}}</p>
                                            <p class="short-text"><i class="fa fa-clock"></i> {{ date('h:i a', strtotime($user->last_activity_at))}} Local time</p>
                                            
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-7 col-xl-7 col-lg-7 col-sm-12  ">
                                        <form action="{{route('save.response.testimonial')}}" method="post" >
                                            @csrf
                                            <input type="hidden" name="user_testimonial_id" value="{{$user_testimonial->id}}">
                                            
                                            <div class="col-md-12 col-sm-12 col-lg-12">
                                                <label for="">Enter your testimonialTip: Showcase their expertise, project results or soft skills</label>
                                                <textarea class="text_area error " name="client_response" id="" placeholder="Example : I hired {{$user->full_name}} to help with our company's rebranding effort.">{{old('client_response')}}</textarea>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6 col-lg-6 col-sm-12 ">
                                                    <span>Communication Rating : </span>
                                                    <div class="rating ">
                                                        <label >
                                                            <input type="radio" name="communication_rating" value="1" />
                                                            <span class="icon">★</span>
                                                          </label>
                                                          <label>
                                                            <input type="radio" name="communication_rating" value="2" />
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>
                                                          </label>
                                                          <label>
                                                            <input type="radio" name="communication_rating" value="3" />
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>   
                                                          </label>
            
                                                          <label>
                                                            <input type="radio" name="communication_rating" value="4" />
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>
                                                          </label>
            
                                                          <label>
                                                            <input type="radio" name="communication_rating" value="5" />
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>
                                                          </label>
                                                    </div>
                                                    
                                                </div>
                                                <div class="col-md-6 col-lg-6 col-sm-12 ">
                                                    <span>Expertise Rating :</span>
                                                    <div class="rating">
                                                        <label>
                                                            <input type="radio" name="expertise_rating" value="1" />
                                                            <span class="icon">★</span>
                                                          </label>
                                                          <label>
                                                            <input type="radio" name="expertise_rating" value="2" />
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>
                                                          </label>
                                                          <label>
                                                            <input type="radio" name="expertise_rating" value="3" />
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>   
                                                          </label>
            
                                                          <label>
                                                            <input type="radio" name="expertise_rating" value="4" />
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>
                                                          </label>
            
                                                          <label>
                                                            <input type="radio" name="expertise_rating" value="5" />
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>
                                                          </label>
                                                    </div>
                                                    
                                                </div>
                                                <div class="col-md-6 col-lg-6 col-sm-12 ">
                                                    <span>Professionalism Rating :</span>
                                                    <div class="rating">
                                                        <label>
                                                            <input type="radio" name="professionalism_rating" value="1" />
                                                            <span class="icon">★</span>
                                                          </label>
                                                          <label>
                                                            <input type="radio" name="professionalism_rating" value="2" />
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>
                                                          </label>
                                                          <label>
                                                            <input type="radio" name="professionalism_rating" value="3" />
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>   
                                                          </label>
            
                                                          <label>
                                                            <input type="radio" name="professionalism_rating" value="4" />
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>
                                                          </label>
            
                                                          <label>
                                                            <input type="radio" name="professionalism_rating" value="5" />
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>
                                                          </label>
                                                    </div>
                                                    
                                                </div>
                                                <div class="col-md-6 col-lg-6 col-sm-12 ">
                                                    <span>Quality Rating : </span>
                                                    <div class="rating" style="margin-left:15px;">
                                                        <label>
                                                            <input type="radio" name="quality_rating" value="1" />
                                                            <span class="icon">★</span>
                                                          </label>
                                                          <label>
                                                            <input type="radio" name="quality_rating" value="2" />
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>
                                                          </label>
                                                          <label>
                                                            <input type="radio" name="quality_rating" value="3" />
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>   
                                                          </label>
            
                                                          <label>
                                                            <input type="radio" name="quality_rating" value="4" />
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>
                                                          </label>
            
                                                          <label>
                                                            <input type="radio" name="quality_rating" value="5" />
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>
                                                          </label>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                           
                                            
                                            <div class="float-right mt-4 mb-2">
                                                <button class="submit-btn" type="submit">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                   
                                    
                                </div>
                                    
                            </div>
                        </div>
                        

                    </div>
                  
                </div>
            </div>
        </div>

    </body>
</html>
