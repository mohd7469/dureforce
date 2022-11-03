@extends($activeTemplate.'layouts.frontend')
@section('content')
    <section class="all-sections pt-3">
        <div class="container-fluid p-max-sm-0">
            <div class="sections-wrapper d-flex flex-wrap justify-content-center cv-container">
                <div class="container">
                <div class="main container mt-4">
    <h6 class="fw-bold my-2 offer-letter-alignment-top">Send Offer</h5>
  <div class="card card-border p-3">
    <div class="">
        <div class="card-body p-0 d-flex align-items-center">
            <div class="image-div">
                <img class="card-img-top image-ui" src="{{ !empty($offer_letter->user->basicProfile->profile_picture)? $offer_letter->user->basicProfile->profile_picture: getImage('assets/images/default.png') }}" alt="">
                <span class="logged-in">●</span>

              </div>
               <div>
                <h4 class="card-title color-purple">{{$offer_letter->user->full_name}}</h4>
              <h6>{{$offer_letter->user->job_title}}</h6>
                <div class="d-flex justify-content-between responsive-card-section mt-2">
                  <p class="responsive-fonts"><i class="fa fa-map-marker icon-class" aria-hidden="true"></i>{{$offer_letter->user->location }}</p>
                  <!-- <p class="responsive-fonts"><i class="fa fa-clock-o icon-class margin-left-responsive-media" aria-hidden="true"></i>1:20PM Local time</p> -->
                </div>
               </div>
        </div>
      </div>
<!-- contract -->

<h4 class="fw-bold mt-4">Contract Terms</h5>
<!-- contract -->
<!-- Payment cards -->
<h6 class="color-green mt-3">Payment Option</h6>
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
            <h6 class="color-green mt-3">Pay by Fixed Price</h6>
           <div class="d-flex">
            <input type="number" name="offer_ammount" class="form-control text-end" placeholder="20.00"><span class="ml-2 per-hour"></span>
           </div>
           <p class="text-muted fs-15px mt-1">This is the price you and Dumitru G’s have agreed upon  </p>
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
    <h6 class="color-green">Deposit funds into Escrow</h6>
    <p class="text-muted fs-15px mt-1">Escrow is a neutral holding place that protects your deposit until work is approved.</p>
      <form>
          <div class="form-row">
            <div class="col-lg-3 col-md-6 col-sm-12">
              <div class="form-check">
                  <input type="radio" class="form-check-input" id="exampleCheck1" name="deposit_fund">
                  <label class="form-check-label fs-14px" for="exampleCheck1">Deposit for the whole project</label>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
              <div class="form-check">
                  <input type="radio" class="form-check-input" id="exampleCheck1" name="deposit_fund">
                  <label class="form-check-label fs-14px" for="exampleCheck1">Deposit a lesser amount to cover the first milestone</label>
              </div>
            </div>
            
          </div>
        </form>
    </div>
    <hr>

    <!-- start date  -->
    <form method="POST" action="{{route('offer.save')}}">
      @csrf
    <div class="form-row" id="dynamicTable">
        
        <h6 class="color-green">Project Milestones</h6>
        <p class="text-muted fs-15px mt-1">Add project milestones and pay in installments as each milestone is completed to your satisfaction. Due dates will be set in Coordinated Universal Time (UTC).</p>
        <div class="row">
          <div class="col-lg-3 col-md-6 col-sm-12">
            <label><h6>Milestone Description</h6></label>
            <input type="text" name="addmore[0][descr]" class="form-control" placeholder="">
          </div>
          <div class="col-lg-3 col-md-6 col-sm-12">
            <label><h6>Due Date (Optional)</h6></label>
            <input type="text" name="addmore[0][due_date]" class="form-control" placeholder="">
          </div>
          <div class="col-lg-3 col-md-6 col-sm-12">
            <label><h6>Deposit Amount</h6></label>
            <input type="number" name="addmore[0][desposit_amout]" class="form-control text-end" placeholder="20.00">
          </div>
        </div>
    </div>
      <button type="button" name="add" id="add" class="addMoreButton my-2">
          Add another
      </button>
   

    <!-- start date  -->
    <hr>
    <!-- description  -->
    <div class="form-row">
      <div class="col-md-12">
        <h6 class="fw-bold mt-3">How do fixed-price contracts work?</h5>
        <br>
        <p class="">Before work begins, agree on milestones with your freelancer. Milestones help to break up larger projects into manageable chunks. Pre-fund milestones by<br> 
        depositing money into escrow. Once the work has been delivered, you can release your payment to the freelancer.<br>
        Over the course of the contract, your freelancer will submit milestones for review and the funds in escrow will be released upon your approval. Failing to respond to<br>
        a milestone submission within 14 days is deemed approval and the escrowed funds will be automatically released to your freelancer.</p>
      </div>
    </div>
    <hr>
    <!-- description of work -->
    <h6 class="color-green">Description</h6>
    <div>
        <h6 class="mt-4">Description of Work</h6>
        

    
    <textarea  class="p-3 border-grey text-area-responsive"
    id="w3review" name="w3review" rows="5" cols="65">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime iusto voluptates similique quas dolore, reprehenderit at illum! Assumenda sit quia culpa error, modi ea, aliquam cumque obcaecati repudiandae ex hic?</textarea>


    <div>
    <br>
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
    <div class="d-flex justify-content-between align-items-center responsive-check my-3 offer-letter-alignment ">
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label fs-14px" for="exampleCheck1">Yes,I understand and agree to the <span>DF Terms of Service</span>,including the <span>User Agreement </span>and <span>Privacy Policy</span></label>
        </div>
        <div class="d-flex align-items-center">
            <button class="btn-purple-outline">Cancel</button>
            <button type="submit" class="btn-purple ml-2">Continue</button>

        </div>
    </div>
  </form>

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
@push('script')
<script type="text/javascript">
    var i = 0;
    $("#add").click(function(){
        ++i;
        // $("#dynamicTable").append('<tr><td><input type="text" name="addmore['+i+'][name]" placeholder="Enter your Name" class="form-control" /></td><td><input type="text" name="addmore['+i+'][qty]" placeholder="Enter your Qty" class="form-control" /></td><td><input type="text" name="addmore['+i+'][price]" placeholder="Enter your Price" class="form-control" /></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>');
        $("#dynamicTable").append('<div class="row row-line mt-10"><div class="col-lg-3 col-md-6 col-sm-12"><input type="text" name="addmore['+i+'][descr]" class="form-control" placeholder=""></div><div class="col-lg-3 col-md-6 col-sm-12"><input type="text" name="addmore['+i+'][due_date]" class="form-control" placeholder=""></div><div class="col-lg-3 col-md-6 col-sm-12"><input type="number" name="addmore['+i+'][desposit_amout]" class="form-control text-end" placeholder="20.00"></div><div class="col-lg-1 col-md-1 col-sm-1 mt-2"><button type="button" class="deleteButton remove-tr"><i class="fa fa-trash"></i></button></div></div>');

    });
    $(document).on('click', '.remove-tr', function(){  
         $(this).parents('.row-line').remove();
    });  
</script>
@endpush