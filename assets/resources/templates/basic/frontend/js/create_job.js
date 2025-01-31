var token= $('input[name=_token]').val();
var myDropzone='';
var uploaded_files=Array();


$(document).ready(function() {
    
    $('.select2').select2({
        tags: true
    });
    loadFiles();

    $('#job_form_data').submit(function (e) {
        
        e.preventDefault();
        $('#submit_btn_job').attr("disabled", true);

        var form = $('#job_form_data')[0];
        var form_data = new FormData(form);
        form_data.append("file", JSON.stringify(uploaded_files));
        submitCreateFormData(form_data);

    });
    
    $("#uploaded_file_table_id").on("click", "#DeleteButton", function() {
  
        let file_index=$(this).closest("tr").index();
        uploaded_files.splice(file_index, 1);
        $(this).closest("tr").remove();
        $('#uploaded_files_input_id').val(JSON.stringify(uploaded_files));

    });
});
$(document).ready(function() {


    $('.select2').select2({
        tags: true
    });
    $('#job_form_data').submit(function (e) {
        $('#submit_btn_job').attr("disabled", true);
        e.preventDefault();
        var form = $('#job_form_data')[0];
        var form_data = new FormData(form);
        form_data.append("file", JSON.stringify(uploaded_files));
        submitCreateFormData(form_data);

    });
    $("#uploaded_file_table_id").on("click", "#DeleteButton", function() {
  
        let file_index=$(this).closest("tr").index();
        uploaded_files.splice(file_index, 1);
        $(this).closest("tr").remove();
        $('#uploaded_files_input_id').val(JSON.stringify(uploaded_files));

    });

});

function submitCreateFormData(form_data)
{
    var action_url=$("#job_form_data").attr('action');
    $.ajax({
        type:"POST",
        url:action_url,
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: form_data,
        processData: false,
        contentType: false,
        success:function(data){
            var html = '';
            if(data.errors){
            $('#submit_btn_job').attr("disabled", false);

              console.log(data);
              displayErrorMessage(data.errors);
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

});

 function addFile(file){

      $('#file_name_div').append('<tr><td>'+file.uploaded_name+'</td><td class="text-center">'+file.type+'</td><td class="text-center" id="DeleteButton"><span class="badge badge-primary badge-pill delete-btn"  ><i class="fa fa-trash" style="color:red" ></i></span></td><td class="text-center">'+
      '<a href="'+file.url+'" download><span class="badge badge-primary badge-pill guide-lines-lbl"><i class="fa fa-download "></i></span></a></td></tr>');
      $('#uploaded_files_input_id').val(JSON.stringify(uploaded_files));
}

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





