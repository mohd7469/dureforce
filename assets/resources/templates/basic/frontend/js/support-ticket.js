'use strict';
Dropzone.autoDiscover = false;
var myDropzone='';
var token= $('input[name=_token]').val();
  
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
function submitTicketForm(data)
{
    var action_url=$("#support_ticket_form").attr('action');

    $.ajax({
        type:"POST",
        url:action_url,
        data: {data : data,_token:token},
        success:function(data){
            var html = '';
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
    var action_url=$("#support_ticket_form").attr('action');
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
            $("#support_ticket_form").submit(function (event) {
                form_data= $(this).serialize();
                event.preventDefault();
                event.stopPropagation(); 
                if(myDropzone.getQueuedFiles().length>0){
                    myDropzone.processQueue();
                  }
                  else
                  {
                    submitTicketForm(form_data);
                  }
            
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

    

});