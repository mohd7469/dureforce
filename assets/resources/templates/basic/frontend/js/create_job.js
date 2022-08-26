$(function() {
  var form_data='';
    var dropzone = new Dropzone('#demo-upload', {
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
            formData.append("data", form_data);
          });
          
          this.on("complete", function(file, xhr, formData) {
            var _this=this;
            _this.removeAllFiles();
          });
          
          var myDropzone = this;
  
          $("#job_form_data").submit(function (e) {
            form_data= $(this).serialize();
              e.preventDefault();
              e.stopPropagation();
              alert("yess");
              myDropzone.processQueue();
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



