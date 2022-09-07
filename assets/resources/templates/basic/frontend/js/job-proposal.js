
var myDropzone='';
$(function() {

    var form_data='';
    var action_url=$("#job_form_data").attr('action');
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
                  $("#submit-all").attr("disabled", false);
                }
                if(response.redirect)
                  window.location.replace(response.redirect);
                  
            });
  
            myDropzone = this;
    
            $("#job_form_data").submit(function (e) {
              form_data= $(this).serialize();
                e.preventDefault();
                e.stopPropagation(); 
                var validate_url=$('#job_validate_url').val();
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
                              submitCreateFormData(form_data);
                            }
                            $("#submit-all").attr("disabled", true);
                            displayInfoAlertMessage("Processing Plz Wait");
  
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
        
        
        
});