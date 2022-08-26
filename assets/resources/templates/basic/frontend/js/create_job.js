function submitCreateFormData(data)
{
  var token= $('input[name=_token]').val();
    
  $.ajax({
      type:"POST",
      url:"store",
      data: {data : data,_token:token},
      success:function(data){
          var html = '';
          if(data.error){
              
            displayErrorMessage();

          }
          else{
            window.location.replace(data.redirect);              
          }
      }
  });  
}

function displayErrorMessage()
{
    $("#job_form_data").before('<div class="alert alert-error" id="alert-error"><button type="button" class="close" data-dismiss="alert">×</button><i class="icon-exclamation-sign"></i> There is a problem with the files being uploaded. Please check the form below.</div>');
}

function displaySuccessMessage()
{
    $("#job_form_data").before('<div class="alert alert-success" id="alert-success"><button type="button" class="close" data-dismiss="alert">×</button><i class="icon-exclamation-sign"></i>Job Created Successfully</div>');
}

$(function() {
  var form_data='';
    var dropzone = new Dropzone('#demo-upload', {
      url:'store',
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
            var token= $('input[name=_token]').val();
            formData.append("_token",token);
            formData.append("data", form_data);
          });
          
          this.on("complete", function(file, xhr, formData) {
            var _this=this;
            _this.removeAllFiles();
          });

          this.on("successmultiple", function(files, response) {
             displaySuccessMessage();
             window.location.replace(response.redirect);
          });

        this.on("errormultiple", function(files, response) {
          displayErrorMessage();
          exit();
        });
          
          var myDropzone = this;
  
          $("#job_form_data").submit(function (e) {
            form_data= $(this).serialize();
              
              e.preventDefault();
              e.stopPropagation();
              if(myDropzone.getQueuedFiles().length>0)
                  myDropzone.processQueue();  
              else
              {
                submitCreateFormData(form_data);
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
      
      
      // Now fake the file upload, since GitHub does not handle file uploads
      // and returns a 404
      
      // var minSteps = 6,
      //     maxSteps = 60,
      //     timeBetweenSteps = 100,
      //     bytesPerStep = 100000;
      
      // dropzone.uploadFiles = function(files) {
       
      //   var self = this;
      
      //   for (var i = 0; i < files.length; i++) {
      
      //     var file = files[i];
      //     totalSteps = Math.round(Math.min(maxSteps, Math.max(minSteps, file.size / bytesPerStep)));
      
      //     for (var step = 0; step < totalSteps; step++) {
      //       var duration = timeBetweenSteps * (step + 1);
      //       setTimeout(function(file, totalSteps, step) {
      //         return function() {
      //           file.upload = {
      //             progress: 100 * (step + 1) / totalSteps,
      //             total: file.size,
      //             bytesSent: (step + 1) * file.size / totalSteps
      //           };
      
      //           self.emit('uploadprogress', file, file.upload.progress, file.upload.bytesSent);
      //           if (file.upload.progress == 100) {
      //             file.status = Dropzone.SUCCESS;
      //             self.emit("success", file, 'success', null);
      //             self.emit("complete", file);
      //             self.processQueue();
      //             // document.getElementsByClassName("dz-success-mark").style.opacity = "1";
      //           }
      //         };
      //       }(file, totalSteps, step), duration);
      //     }
      //   }
      // }
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



