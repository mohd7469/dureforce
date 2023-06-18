var token= $('input[name=_token]').val();
var myDropzone='';
var row_id=1;

let service_fee=$('#system_service_fee_id').val();
let user_percentage=(100-service_fee)/100;
let service_fee_percentage=service_fee/100;

'use strict';
var uploaded_files=Array();
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
function financial(x) {
    return Number.parseFloat(x).toFixed(2);
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
    uploaded_files= JSON.parse($('#uploaded_files_input_id').val());
    var form_data='';
    var action_url=file_upload_url;
    var dropzone = new Dropzone('#demo-upload', {
          url:action_url,
          autoProcessQueue: true,
          parallelUploads: 1,
          dictDefaultMessage: "your custom message",
          thumbnailHeight: 120,
          thumbnailWidth: 120,
          maxFiles: 6,
          uploadMultiple:false,
          acceptedFiles: ".jpg,.png,.jpeg,.docx,.pdf",
          filesizeBase: 1000,
          addRemoveLinks: false,
          headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          init: function() {
            
            this.on("addedfile", function (file) {
                var _this = this;
                
            });
            
            this.on("sending", function(file, xhr, formData) {
              formData.append("_token",token);
            });

            this.on("error", function (file, response) {
                var _this = this;
                _this.removeFile(file);
                let errors=response.errors;
                Object.entries(errors).forEach(([key, value]) => {
                  displayAlertMessage(value);

                });
            });

            this.on("success", function (file, response) {
              var _this = this;
              _this.removeFile(file);
              uploaded_files.push(response.uploaded_file);
              addFile(response.uploaded_file);
             

            });
            
            this.on("complete", function(file, xhr, formData) {
                if(response.error)
                {
                  displayErrorMessage(response.error);
                }
                if(response.redirect)
                  window.location.replace(response.redirect);
            });
  
            myDropzone = this;
  
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

    //remove file
    $("#uploaded_file_table_id").on("click", "#DeleteButton", function() {
      
      let file_index=$(this).closest("tr").index();
      uploaded_files.splice(file_index, 1);
      $(this).closest("tr").remove();
      $('#uploaded_files_input_id').val(JSON.stringify(uploaded_files));

    });

    //hourly bid rate
    $("#hourly_bid_rate").focusout(function(){
       
      var rate_per_hour = $(this).val();
      if(rate_per_hour<0){
        displayAlertMessage("Rate Per hour should be greater than $0 ");
        $(this).val("");
      }
      else{

        $('#amount_receive').val(financial(rate_per_hour*user_percentage));
        $('#system_fee').html('$'+financial(rate_per_hour*service_fee_percentage));

      }
    });

    
    $("#total_milestones_amount").focusout(function(){
       
      var total_cost = $(this).val();
      if(total_cost<0){
        displayAlertMessage("Project Cost should be greater than $0 ");
        $(this).val("");
      }
      else{

        $('#milestones_amount_receive').val(financial(total_cost*user_percentage));
        $('#system_fee').html('$'+financial(total_cost*service_fee_percentage));


      }
      
    });

    //milestones sum
    $(document).on('focusout', '.milestones_amount', function() {
      calculateMilestoneAmountSum();
    });
  
});

function addFile(file){

  $('#file_name_div').append('<tr><td>'+file.uploaded_name+'</td><td class="text-center">'+file.type+'</td><td class="text-center" id="DeleteButton"><span class="badge badge-primary badge-pill delete-btn"  ><i class="fa fa-trash" style="color:red" ></i></span></td><td class="text-center">'+
  '<a href="'+file.url+'" download><span class="badge badge-primary badge-pill delete-btn"  ><i class="fa fa-download"  ></i></span></a></td></tr>');
  $('#uploaded_files_input_id').val(JSON.stringify(uploaded_files));

}

function calculateMilestoneAmountSum()
{
    var total_amount=0;
    $(".milestones_amount").each(function() {
      var milestone_amount=$(this).val();
      total_amount=total_amount+parseFloat(milestone_amount);
    });
    $('#total_milestones_amount').val(total_amount);
    $('#milestones_amount_receive').val(financial(total_amount*user_percentage));
    $('#system_fee').html('$'+financial(total_amount*service_fee_percentage));


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
            '<input type="date" class="form-control" name="milestones['+row_id+'][start_date]" value="" id="milestones.'+row_id+'.start_date" >'+
            '</div>'+
          '</div>'+

          '<div class="col-md-2 col-lg-2 col-xl-2 col-sm-4 col-xs-4">'+
            '<label>Due Date*</label>'+
            '<div class="input-group mb-3">'+
            '<input type="date" class="form-control" name="milestones['+row_id+'][end_date]" value=""  id="milestones.'+row_id+'.end_date" >'+
            '</div>'+
          '</div>'+

          '<div class="col-md-2 col-lg-2 col-xl-2 col-sm-4 col-xs-4">'+
            '<label>Amount*</label>'+
            '<div class="input-group"><input type="number" class="form-control milestones_amount" name="milestones['+row_id+'][amount]" maxlength="255" value=""  id="milestones.'+row_id+'.amount"> <span class="input-group-text float-end">$</span></div>'+
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

