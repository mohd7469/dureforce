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
      @if(session('success'))

      <div class="alert alert-success" style="float: right" role="alert">
        {{session('success')}}
      </div>
  @endif

        <div class="card-body p-0 d-flex align-items-center">
         
            <div class="image-div">
                <img class="card-img-top image-ui" src="{{ !empty($propsal_to_send_offer->user->basicProfile->profile_picture)? $propsal_to_send_offer->user->basicProfile->profile_picture: getImage('assets/images/default.png') }}" alt="">
                <span class="logged-in">●</span>

              </div>
               <div>
                <h4 class="card-title color-purple">{{$propsal_to_send_offer->user->full_name}}</h4>
              <h6>{{$propsal_to_send_offer->user->job_title}}</h6>
                <div class="d-flex justify-content-between responsive-card-section mt-2">
                  <p class="responsive-fonts"><i class="fa fa-map-marker icon-class" aria-hidden="true"></i>{{$propsal_to_send_offer->user->location }}</p>
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
<form  id="offer_form" enctype="multipart/form-data">
  @csrf
  <div class="mt-4">
      <input type="hidden" name="job_id" value="{{$propsal_to_send_offer->module_id}}" />
      <input type="hidden" name="proposal_id" value="{{$propsal_to_send_offer->id}}" />
      <input type="hidden" name="contract_title" value="{{$propsal_to_send_offer->job->job_title}}">
      <input type="hidden" name="start_date" value="{{$propsal_to_send_offer->project_start_date}}">
      <input type="hidden" name="rate_per_hour" value="{{$propsal_to_send_offer->hourly_bid_rate}}">
      <input type="hidden" value="by_project" name="fix_payment_offer_type" id="fix_payment_offer_type">
      <input type="hidden" value="Fixed" name="payment_type">


</div>
<!-- form -->

<hr>

<!-- Weekly Limit  -->
<div>

</div>
<!-- Weekly Limit  -->
<div class="mt-3">
  <input type="hidden" id="switch" onclick="byMilestone()">

    <h6 class="color-green">Deposit funds into Escrow</h6>
    <p class="text-muted fs-15px mt-1">Escrow is a neutral holding place that protects your deposit until work is approved.</p>
    
          <div class="form-row">
            <div class="col-lg-3 col-md-6 col-sm-12">
              <div class="form-check">
                  {{-- <input type="radio" class="form-check-input" id="exampleCheck1" name="" onclick="byProject()"> --}}
                  <input type="radio" class="form-check-input" id="exampleCheck1" name="deposit_fund" onclick="byProject()" checked>

                  <label class="form-check-label fs-14px" for="exampleCheck1">Deposit for the whole project</label>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
              <div class="form-check">
                  <input type="radio" class="form-check-input" id="exampleCheck1" name="deposit_fund"  onclick="byMilestone()">
                  <label class="form-check-label fs-14px" for="exampleCheck1">Deposit a lesser amount to cover the first milestone</label>
              </div>
            </div>
            
          </div>
      
    </div>
    <hr>
    <div  id="amount">
     
        <div class="form-row">
          <div class="col-lg-3 col-md-6 col-sm-12">
            <h6 class="color-green mt-3">Pay by Fixed Price</h6>
          <div class="d-flex">
            <input type="number" name="offer_ammount" id="offer_ammount" class="form-control text-end " value="">
            <span class="ml-2 per-hour"></span>
          </div>
          <!-- <p class="text-muted fs-15px mt-1">This is the price you and Dumitru G’s have agreed upon  </p> -->
          </div>
        
    </div>
    </div>
    <hr>

    <!-- start date  -->
    <div style="display: none" id="milestone">

      <div class="form-row" id="dynamicTable">
        
        <h6 class="color-green">Project Milestones</h6>
        <p class="text-muted fs-15px mt-1">Add project milestones and pay in installments as each milestone is completed to your satisfaction. Due dates will be set in Coordinated Universal Time (UTC).</p>
        <div class="row">
          <div class="col-lg-3 col-md-6 col-sm-12">
            <label><h6>Milestone Description</h6></label>
            <input type="text" name="milestone[0][description]" class="form-control"  value=""  id="milestone.0.description" placeholder="" >
          </div>
          <div class="col-lg-3 col-md-6 col-sm-12">
            <label><h6>Due Date (Optional)</h6></label>
            <input type="date" name="milestone[0][due_date]" class="form-control" placeholder="" value="">
           
          </div>
          <div class="col-lg-3 col-md-6 col-sm-12">
            <label><h6>Deposit Amount</h6></label>
            <input type="number" name="milestone[0][deposit_amount]" class="form-control text-end"  min="0">
          </div>
        </div>
    </div>
      <button type="button" name="add" id="add" class="milestoneButton my-2">
          Add another
      </button>
    </div>
   

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
    
    
    <div>
      <h6 class="color-green">Description*</h6>
        <textarea class=" p-3 border-grey text-area-responsive" value="" id="description" name="description" rows="3" ></textarea>
    </div>

    <div>
      <label class="btn-outline-green" for="offer_files"><i class="fa fa-paperclip" aria-hidden="true"></i>Upload File</label>
      <input type="file" name="uploaded_files[]" id="offer_files" style="display: none;visibility:none" onchange="writeFileName()" multiple>
      
    </div>
    
    <div>
      <h6 class="my-4 color-green ">Attachments</h6>
      <ul class="list-group" id="file_name_div">
          
      </ul>
    </div>
    <!-- description  -->
    <!-- policy section -->
    <div class="d-flex justify-content-between align-items-center responsive-check my-3 ">
        <div class="form-check">
            <input name="accept_privacy_policy" type="checkbox" class="form-check-input " id="exampleCheck1">
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
    var index = 0;
    $("#add").click(function(){
        ++index;
        $("#dynamicTable").append('<div class="row row-line mt-10"><div class="col-lg-3 col-md-6 col-sm-12"><input type="text" name="milestone['+index+'][description]" class="form-control" placeholder=""></div><div class="col-lg-3 col-md-6 col-sm-12"><input type="date" name="milestone['+index+'][due_date]" class="form-control" placeholder=""></div><div class="col-lg-3 col-md-6 col-sm-12"><input type="number" name="milestone['+index+'][deposit_amount]" class="form-control text-end" ></div><div class="col-lg-1 col-md-1 col-sm-1 mt-2"><button type="button" class="deleteButton remove-tr"><i style="color:red" class="fa fa-trash"></i></button></div></div>');

    });

    $(document).on('click', '.remove-tr', function(){  
         $(this).parents('.row-line').remove();
    }); 

    $( document ).ready(function() {

      $("#offer_ammount").val('0'); 

      $('#offer_form').submit(function (event) {
        
        event.preventDefault();
        submitOffer();
      });
      $(document).on('click', '.delete-btn', function(e) {

          filename=jQuery(this).attr("id");
          $('#file_detail_'+filename).remove();
          var original_file_name=$(this).attr("data-id");
          const dt = new DataTransfer();
          var number_of_files=$('#offer_files').get(0).files.length;
          for (let index = 0; index < number_of_files; index++) {
              file=$('#offer_files').get(0).files[index];
              if(file.name!=original_file_name)
              {
                  dt.items.add(file);
              }
          }
          $('#offer_files').get(0).files=dt.files;
        });
    });
    function calculateMilestoneAmountSum()
    {
        var total_amount=0;
        $(".milestones_amount").each(function() {
          var milestone_amount=$(this).val();
          total_amount=total_amount+parseFloat(milestone_amount);
        });
        $('#total_milestones_amount').val(total_amount);
        $('#milestones_amount_receive').val(financial(total_amount*0.80));
        $('#system_fee').html('$'+financial(total_amount*0.20));
    }
    
    function submitOffer()
    {

        var offer_form=$('#offer_form');
        let form_data = new FormData(offer_form[0]);
        form_data.append('offer_files', $('#offer_files')[0].files);
        $.ajax({
            type:"POST",
            headers: {
              'X-CSRF-TOKEN': $('input[name=_token]').val()
            },
            url:"{{ route('buyer.offer.save') }}",
            processData: false,  // tell jQuery not to process the data
            contentType: false,
            enctype: 'multipart/form-data',
            data: form_data,
            success:function(data){
                var html = '';
                console.log(data);
                if(data.error){
                    
                  displayErrorMessage(data.error);

                }
                else{
                  window.location.replace(data.redirect);              
                }
            }
        });  
    }

    function displayAlertMessage(message)
    {
  
      iziToast.error({
        message: message,
        position: "topRight",
      });

    }

    function displayErrorMessage(validation_errors)
    {
      $('input,select,textarea').removeClass('error-field');
      for (var error in validation_errors) { 
          var error_message=validation_errors[error];

          $('[name="'+error+'"]').addClass('error-field');
          $('[id="'+error+'"]').addClass('error-field');

          $('#'+error).next().addClass('error-field');

          displayAlertMessage(error_message);

        
      }

    }

    function writeFileName()
    {
        $('#file_name_div').empty();
        var number_of_files=$('#offer_files').get(0).files.length;
        var form= new FormData();
        for (let index = 0; index < number_of_files; index++) {
            file=$('#offer_files').get(0).files[index];
            $('#file_name_div').append('<li class="list-group-item d-flex justify-content-between align-items-center" id="file_detail_'+file.name.replace(/\./g,'_')+'">'+file.name+'<span class="badge badge-primary badge-pill delete-btn"  id="'+file.name.replace(/\./g,'_')+'"  data-id="'+file.name+'"><i class="fa fa-trash" style="color:red" ></i></span></li>');
        }
        
    }

    function byMilestone() {
        var decider = document.getElementById('switch');
        if(decider.checked){
            alert('check');
        } else {
          $("#milestone").show();
          $('#fix_payment_offer_type').val('by_milestone');
          $("#amount").hide();
        }
    }

    function byProject() {
        var decider = document.getElementById('switch');
        if(decider.checked){
            alert('check');
        } else {
          $("#milestone").hide();
          $("#amount").show();
          $('#fix_payment_offer_type').val('by_project');

        }
    }


</script>
@endpush