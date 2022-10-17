var token= $('input[name=_token]').val();
var myDropzone='';
function submitCreateFormData(data)
{
  var action_url=$("#job_form_data").attr('action');
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
              window.location.replace('/buyer/job/index');
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
    $('.select2').next().removeClass("error-field");
    for (var error in validation_errors) { 
        var error_message=validation_errors[error];

        $('[name="'+error+'"]').addClass('error-field');
        $('#'+error).next().addClass('error-field');

        displayAlertMessage(error_message);

      
    }

}

function displaySuccessMessage()
{
    $("#job_form_data").before('<div class="alert alert-success" id="alert-success"><button type="button" class="close" data-dismiss="alert">×</button><i class="icon-exclamation-sign"></i>Job Created Successfully</div>');
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
              }
              else{
                  window.location.replace('/buyer/job/index');
              }

                
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


function switchBudgetFileds(budget_type)
{
    if(budget_type==2){

        $('#budget_amount').show();
        $('.weekly_range').hide();
        $('.budget_type').removeClass('col-xl-4 col-lg-4 col-md-4');
        $('.budget_type').addClass('col-xl-6 col-lg-6 col-md-6');

    }
    else
    {
        $('.weekly_range').show();
        $('#budget_amount').hide();
        $('.budget_type').removeClass('col-xl-6 col-lg-6 col-md-6');
        $('.budget_type').addClass('col-xl-4 col-lg-4 col-md-4');
    }
}





