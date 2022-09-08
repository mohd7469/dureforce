
var myDropzone='';
var row_id=1;
'use strict';
Dropzone.autoDiscover = false;
  
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

    $('#defaultSearch').on('change', function() {
      this.form.submit();
    });

    $("#milestone_btn").click(function(){
          addRow();
    });
        
        
        
});

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
            '<label>Description</label>'+
            '<input type="text" name="description" maxlength="255" value="" class="form-control" >'+
          '</div>'+

          '<div class="col-md-2 col-lg-2 col-xl-2 col-sm-4 col-xs-4">'+
            '<label>Start Date</label>'+
            '<div class="input-group mb-3">'+
            '<input type="date" class="form-control" name="start_date" value="" >'+
            '</div>'+
          '</div>'+

          '<div class="col-md-2 col-lg-2 col-xl-2 col-sm-4 col-xs-4">'+
            '<label>Due Date</label>'+
            '<div class="input-group mb-3">'+
            '<input type="date" class="form-control" name="due_date" value=""  >'+
            '</div>'+
          '</div>'+

          '<div class="col-md-2 col-lg-2 col-xl-2 col-sm-4 col-xs-4">'+
            '<label>Amount</label>'+
            '<input type="integer" name="title" maxlength="255" value="" class="form-control" >'+
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

  }
}
function byProject()
{
  if(!$(this).is(':checked')){
    
    $('#by_milestone_section').addClass('d-none');
    $('#by_project_section').removeClass('d-none');

  }

}

