
// // Now fake the file upload, since GitHub does not handle file uploads
// // and returns a 404

//     var minSteps = 6,
//     maxSteps = 60,
//     timeBetweenSteps = 100,
//     bytesPerStep = 100000;

// dropzone.uploadFiles = function(files) {
//     var self = this;

//     for (var i = 0; i < files.length; i++) {

//         var file = files[i];
//         totalSteps = Math.round(Math.min(maxSteps, Math.max(minSteps, file.size / bytesPerStep)));

//             for (var step = 0; step < totalSteps; step++) {
                
//                 var duration = timeBetweenSteps * (step + 1);
//                 setTimeout(function(file, totalSteps, step) {

//                     return function() {

//                         file.upload = {
//                             progress: 100 * (step + 1) / totalSteps,
//                             total: file.size,
//                             bytesSent: (step + 1) * file.size / totalSteps
//                         };

//                         self.emit('uploadprogress', file, file.upload.progress, file.upload.bytesSent);
//                         if (file.upload.progress == 100) {
//                             file.status = Dropzone.SUCCESS;
//                             self.emit("success", file, 'success', null);
//                             self.emit("complete", file);
//                             self.processQueue();
//                         }
//                     };
//                 }(file, totalSteps, step), duration);
//             }
//     }
// }

function LoadDropZone()
    {   
        Dropzone.options.someDropzone = {
            acceptedFiles: ".docx,application/pdf",
            url: "allegati.php", // Set the url,
            dictRemoveFileConfirmation: "Sei sicuro?",
            maxFilesize: 10,
            maxFiles: 1,
            thumbnailWidth: 80,
            thumbnailHeight: null,
            parallelUploads: 20,
        };
        
    }

    // function LoadDropZone()
    // {   
    //     var dropzone = new Dropzone('#demo-upload', {     
    //     previewTemplate: document.querySelector('#demo-upload').innerHTML,
    //     parallelUploads: 2,
    //     thumbnailHeight: 60,
    //     thumbnailWidth: 60,
    //     maxFilesize: 3,
    //     filesizeBase: 1000,
    //     thumbnail: function(file, dataUrl) {
      
    //         if (file.previewElement) {
      
    //             file.previewElement.classList.remove("dz-file-preview");
    //             var images = file.previewElement.querySelectorAll("[data-dz-thumbnail]");
    //             for (var i = 0; i < images.length; i++) {
    //             var thumbnailElement = images[i];
    //             thumbnailElement.alt = file.name;
    //             thumbnailElement.src = dataUrl;
    //             }
    //             setTimeout(function() { file.previewElement.classList.add("dz-image-preview"); }, 1);
      
    //         }
    //     }
      
    //   });

    // }

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



