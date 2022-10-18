@extends($activeTemplate.'layouts.frontend')
@section('content')

    <section class="all-sections pt-3">
        <div class="container-fluid p-max-sm-0">
            <div class="sections-wrapper d-flex flex-wrap justify-content-center cv-container">
                <div class="container">
                <div class="main container mt-4">
    <h6 class="my-2">Send Offer</h5>
  <div class="card card-border p-3">
    <div class="">
        <div class="card-body p-0 d-flex align-items-center">
            <div class="image-div">
                <img class="card-img-top image-ui" src="{{ getImage('assets/images/default.png') }}" alt="" alt="Card image cap">
                <span class="logged-in">●</span>

              </div>
               <div>
                <h4 class="card-title color-purple">Domitru G</h4>
              <h6>Full Stack Developer</h6>
             <div class="d-flex justify-content-between responsive-card-section mt-2">
      <p class="responsive-fonts"><i class="fa fa-map-marker icon-class" aria-hidden="true"></i>London,UK</p>
                <p class="responsive-fonts"><i class="fa fa-clock-o icon-class margin-left-responsive-media" aria-hidden="true"></i>1:20PM Local time</p>
             </div>
               </div>
        </div>
      </div>
<!-- contract -->

<h4 class="mt-4">Contract Terms</h5>
<!-- contract -->
<!-- Payment cards -->
<h5 class="mt-4  color-green">Payment Option</h6>
<div class="d-flex responsive-cards">
   <!-- card 1 -->
   <!-- <div class="card  mt-2 border-round bg-green text-white">
    <div class="tag-class"><p>Popular</p></div>  
    <div class="card-body d-flex flex-column align-items-center">
      <i class="fa fa-clock-o fs-23px mt-1 mb-2" aria-hidden="true"></i>
      <h6 class="card-title">Pay By the Hour</h5>
      <p class="paragraph-alignment
        ">Pay for the Number of Hours Worked on a Project</p>
    </div>
  </div> -->
  <!-- card-1 -->
<!-- card 2 -->
<div class="card mt-2 margin-left-responsive border-round bg-green border-bg-green card-border text-white">
  <div class="card-body d-flex flex-column align-items-center">
    <i class="fa fa-tag fs-23px mt-4 mb-3" aria-hidden="true"></i>
    <h6 class="card-title text-white">Pay a Fixed Price</h5>
    <p class="paragraph-alignment">Pay for the Number of Hours Worked on a Project</p>
  </div>
</div>
<!-- card 2 -->
</div>
<!-- Payment cards -->
<!-- Form -->
<div class="mt-4">
    <form>
        <div class="form-row">
          <div class="col-lg-3 col-md-6 col-sm-12">
            <h6 class="color-green mt-3">Pay By the hour</h6>
           <div class="d-flex">
            <input type="text" class="form-control text-end" placeholder="20.00"><span class="ml-2 per-hour">/ hr</span>
           </div>
           <p class="text-muted fs-15px mt-1">Domitri G profile rate is 20/hr</p>
          </div>
          
        </div>
      </form>
</div>
<!-- form -->

<hr>

<!-- Weekly Limit  -->
<div>

</div>
<!-- Weekly Limit  -->
<div class="mt-3">
    <h6 class="color-green">Weekly Limit</h6>
    <p class="text-wrap">Setting weekly limint is a great way to help ensure to daty on budget</p>
    
    
      <form>
          <div class="form-row">
            <div class="col-lg-3 col-md-6 col-sm-12">
              <div class="form-group">
                  <select class="form-control" id="exampleFormControlSelect1">
                  <option>40 hrs / Week</option>
                  <option>40 hrs / Week</option>
                  <option>40 hrs / Week</option>
                  <option>40 hrs / Week</option>
                  <option>40 hrs / Week</option>
                </select>
             <p class="text-muted fs-15px mt-1">$800.0 max/week</p>

              </div>
            </div>
            
          </div>
        </form>
    </div>
    <hr>

    <!-- start date  -->
    <form>
    <div class="form-row">
        <div class="col-lg-3 col-md-6 col-sm-12">
        
        <label><h6>Start Date (Optional)</h6></label>
        <input type="text" class="form-control" placeholder="">
        
        </div>
        
    </div>
    </form>

    <!-- start date  -->
    <hr>
    <!-- description  -->
    <div>
    <h6 class="color-green">Description</h5>
    <h6 class="mt-3">Related Job Listing</h5>
    <h6 class="mt-3 color-green">Full Stack Developer<span class="color-black ml-2">(#100183394)</span></h5>

    <div class="mt-5">
        <form>
        <div class="form-row">
            <div class="col-6">
            
            <label><h6>Contract Title</h6></label>
            <input type="text" class="form-control" placeholder="Full Stack Developer">
            
            </div>
            
        </div>
        </form>
        
    </div>



    <!-- description of work -->
    <div>
        <h6 class="mt-4">Description of Work</h6>
        
    <form>
    
    <textarea  class="p-3 border-grey text-area-responsive"
    id="w3review" name="w3review" rows="5" cols="65">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime iusto voluptates similique quas dolore, reprehenderit at illum! Assumenda sit quia culpa error, modi ea, aliquam cumque obcaecati repudiandae ex hic?</textarea>

    </form>
    <div>
    <button class="btn-outline-green"><i class="fa fa-paperclip" aria-hidden="true"></i>
        Upload File</button>
    </div>
    <h6 class="my-4">Attachments</h6>
    <div class="d-flex flex-column">
    <!-- attachment one -->
    <div class="d-flex">
    <div>
    <i class="fa fa-paperclip  icon-class" aria-hidden="true"></i>
    </div>
    <h6 class="mx-2 fs-16px">FlowChart.pdf</h6>
    <span class="clip-ui">
    <i class="fa fa-trash-o icon-class" aria-hidden="true"></i>
    </div>


    <!-- attachment one -->
    <!-- attachment two-->
    <div class="d-flex mt-1 ">
    <div>
        <i class="fa fa-paperclip  icon-class" aria-hidden="true"></i>
    </div>
    <h6 class="mx-2 fs-16px">Requiremnts.doc</h6>
    <span class="clip-ui">
    <i class="fa fa-trash-o icon-class" aria-hidden="true"></i>
    </div>
    <!-- attachment two -->
    <!-- attachment three -->
    <div class="d-flex mt-1">
        <div>
        <i class="fa fa-paperclip  icon-class" aria-hidden="true"></i>
        </div>
        <h6 class="mx-2 fs-16px">Diagram.jpg</h6>
        <span class="clip-ui">
        <i class="fa fa-trash-o icon-class" aria-hidden="true"></i>
        </div> 
        <!-- attachment three --> 
    </div>
    
    </div>
    </div>
    <!-- description of work -->
    </div>
    <!-- description  -->
    <!-- policy section -->
    <div class="d-flex justify-content-between align-items-center responsive-check my-3">
    <div class="form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label fs-14px" for="exampleCheck1">Yes,I understand and agree to the <span>DF Terms of Service</span>,including the <span>User Agreement </span>and <span>Privacy Policy</span></label>
    </div>
    <div class="d-flex align-items-center">
        <button class="btn-purple-outline">Cancel</button>
        <button class="btn-purple ml-2">Continue</button>

    </div>
    </div>

    <!-- policy section -->
    </div>
    <!-- card  -->
    
    </div> 
                </div>
            </div>
    </section>

    </div>
    @include($activeTemplate . 'partials.end_ad')

@endsection
@push('style')
    <link rel="stylesheet" href="{{asset('assets/resources/templates/basic/frontend/css/custom/send-offer.css')}}">
@endpush