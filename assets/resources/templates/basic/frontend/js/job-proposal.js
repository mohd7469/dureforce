var token= $('input[name=_token]').val();
var myDropzone='';
var row_id=1;
'use strict';
Dropzone.autoDiscover = false;
  

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
function submitProposal(data)
{
  var action_url=$("#propsal_form").attr('action');
  $.ajax({
      type:"POST",
      url:action_url,
      data: {data : data,_token:token},
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
function displayInfoAlertMessage(message)
{
  iziToast.info({
      class:"wait",
      message: message,
      position: "center",
      timeOut: 50000,
      extendedTimeOut: 0
  });
}
$(function() {

    var form_data='';
    var action_url=$("#propsal_form").attr('action');
    var dropzone = new Dropzone('#demo-upload', {
        url:action_url,
        autoProcessQueue: false,
          parallelUploads: 4,
          dictDefaultMessage: "your custom message",
          thumbnailHeight: 60,
          thumbnailWidth: 60,
          maxFiles: 4,
          uploadMultiple:true,
          maxFilesize: 3,
          acceptedFiles: ".jpg,.png,.jpeg,.docx,.pdf",
          filesizeBase: 1000,
          addRemoveLinks: true,
          init: function() {
            
            this.on("sendingmultiple", function(file, xhr, formData) {
              formData.append("_token",token);
              formData.append("data", form_data);
            });
            
            this.on("complete", function(file, xhr, formData) {
             
            });
  
            this.on("successmultiple", function(files, response) {
  
                if(response.error)
                {
                  displayErrorMessage(response.error);
                }
                if(response.redirect)
                  window.location.replace(response.redirect);
                  
            });
  
            myDropzone = this;
    
            $("#propsal_form").submit(function (event) {
              form_data= $(this).serialize();
                event.preventDefault();
                event.stopPropagation(); 
                var validate_url='/seller/validate-proposal';
                $.ajax({
                    type:"POST",
                    url:validate_url,
                    data: {data : form_data,_token:token},
                    success:function(data){
  
                        if(data.validated){
  
                            if(myDropzone.getQueuedFiles().length>0){
                              myDropzone.processQueue();
                              


                            }
                            else
                            {
                              submitProposal(form_data);
                            }
  
                        }
                        else{

                          displayErrorMessage(data.error);
  
                        }
                    }
                });
            }); 
          },
          thumbnail: function(file, dataUrl) {
         
  
            if (file.previewElement) {
          
  
              file.previewElement.classList.remove("dz-file-preview");
              var images = file.previewElement.querySelectorAll("[data-dz-thumbnail]");
              for (var i = 0; i < images.length; i++) {
                var thumbnailElement = images[i];
                thumbnailElement.alt = file.name;
                thumbnailElement.src = dataUrl;
              }
              setTimeout(function() { file.previewElement.classList.add("dz-image-preview"); }, 1);
            }
          }
        
    });

    $('#defaultSearch').on('change', function() {
      this.form.submit();
    });

    $("#milestone_btn").click(function(){
          addRow();
    });
    
    //hourly bid rate
    $("#hourly_bid_rate").focusout(function(){
       
      var rate_per_hour = $(this).val();
      if(rate_per_hour<0){
        displayAlertMessage("Rate Per hour should be greater than $0 ");
        $(this).val("");
      }
      else{

        $('#amount_receive').val(rate_per_hour*0.80);

      }
    });
    
    $("#total_milestones_amount").focusout(function(){
       
      var total_cost = $(this).val();
      if(total_cost<0){
        displayAlertMessage("Project Cost should be greater than $0 ");
        $(this).val("");
      }
      else{

        $('#milestones_amount_receive').val(total_cost*0.80);
        $('#system_fee').html(total_cost*0.20);


      }
    });

    //milestones sum
    $(document).on('focusout', '.milestones_amount', function() {
      calculateMilestoneAmountSum();
    });
  
});

function calculateMilestoneAmountSum()
{
    var total_amount=0;
    $(".milestones_amount").each(function() {
      var milestone_amount=$(this).val();
      total_amount=total_amount+parseInt(milestone_amount);
    });
    $('#total_milestones_amount').val(total_amount);
    $('#milestones_amount_receive').val(total_amount*0.80);
    $('#system_fee').html(total_amount*0.20);


}

function removerow(row)
{
    var div_to_remove='#milestone'+row;
    $(div_to_remove).remove();
}

function addRow()
{
    var div_to_add_row='#milestiones';
    row_id+=1;
    $(div_to_add_row).append(
          '<div class="row" id="milestone'+row_id+'">'+
          '<div class="col-md-4 col-lg-4 col-xl-4 col-sm-12 col-xs-12">'+
            '<label>Description*</label>'+
            '<input type="text" name="milestones['+row_id+'][description]" maxlength="255" value="" class="form-control"  id="milestones.'+row_id+'.description">'+
          '</div>'+

          '<div class="col-md-2 col-lg-2 col-xl-2 col-sm-4 col-xs-4">'+
            '<label>Start Date*</label>'+
            '<div class="input-group mb-3">'+
            '<input type="date" class="form-control" name="milestones['+row_id+'][start_date]" value="" id="milestones.'+row_id+'.start_date">'+
            '</div>'+
          '</div>'+

          '<div class="col-md-2 col-lg-2 col-xl-2 col-sm-4 col-xs-4">'+
            '<label>Due Date*</label>'+
            '<div class="input-group mb-3">'+
            '<input type="date" class="form-control" name="milestones['+row_id+'][end_date]" value=""  id="milestones.'+row_id+'.end_date">'+
            '</div>'+
          '</div>'+

          '<div class="col-md-2 col-lg-2 col-xl-2 col-sm-4 col-xs-4">'+
            '<label>Amount*</label>'+
            '<input type="number" class="form-control milestones_amount" name="milestones['+row_id+'][amount]" maxlength="255" value=""  id="milestones.'+row_id+'.amount">'+
          '</div>'+

          '<div class="col-md-2 col-lg-2 col-xl-2 col-sm-4 col-xs-4 pt-custom" >'+
            '<Button class="btn btn-danger " id="delete_btn'+row_id+'" onclick="removerow('+row_id+')"><i class="fa fa-trash"></i></button> '+
          '</div>'+
      '</div>'

    );
}

function byMilestone()
{
  if(!$(this).is(':checked')){
    $('#by_project_section').addClass('d-none');
    $('#by_milestone_section').removeClass('d-none');
    $('#total_milestones_amount').attr("readonly", true); 

  }
}
function byProject()
{
  if(!$(this).is(':checked')){
    
    $('#by_milestone_section').addClass('d-none');
    $('#by_project_section').removeClass('d-none');
    $('#total_milestones_amount').attr("readonly", false); 


  }

}

