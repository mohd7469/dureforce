

   @extends($activeTemplate.'layouts.frontend')
   @section('content')
   <section class="all-sections pt-3">
    <div class="container">
       <div class="">
          <article class="main-section" id="job_form_data">
              <div class="row">
                <div class="password-info-section">
                    <p class="cp-basic">Password & Security</p>
                </div>
                  <div class="col-md-6">
                    <div class="main-container-click" id="info-password">
                        
                        <div class="">
                            <p class="fnt-changep">Change Password</p>
                        </div>
            
                        <form method="POST" id="securityFrom" class="password-cs">
                            @csrf
                            <div class="form-label">Old Password</div>
                            <input type="password" name="old_password" placeholder="********">
 
            
                            <div class="form-label">New Password</div>
                            <input type="password" name="new_password" placeholder="********" >
            
                            <div class="form-label">Confirm New Password</div>
                            <input type="password" name="password_confirmation" placeholder="********" >
                           
                                
                         
                        </form>
                        <div>
                            <button  onclick="submitPasswordForm()" type="button" class="btn btn-primary cstm-edit" >
                                Save
                            </button>
                        </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                   
                        <div class="sidebar">
                            <div class="widget custom-widget mb-30 cstm-sidebar">
                                            
                                <span class="password-h">Password Instructions</span>
                                            
                        
                                <ul class="insturstions-lst">
                                 <li>At  least 6 characters</li>
                                 <li>One number</li> 
                                 <li>One symbol</li> 
                                 <li>One Capital Letter</li> 
                                 <li>One lower - case letter </li> 
                                </ul>
                                   <p class="fnt-increase">To increase your password strength:</p>
                                   <ul class="btm-listing">
                                       <li>Use unique characters</li>
                                       <li>Increase your password length</li>
                                   </ul>
                                
                            </div>
                        </div>
                    
                  </div>
              </div>
            
          </article>
         
    </div>
 </section>
   @endsection

<script language="javascript" type="text/javascript">
    function displayErrorMessage(validation_errors)
        {
            $('input,select,textarea').removeClass('error-field');
            $('.select2').next().removeClass("error-field");
            for (var error in validation_errors) { 
                var error_message=validation_errors[error];

                $('[name="'+error+'"]').addClass('error-field');
                $('[id="'+error+'"]').addClass('error-field');
                $('#'+error).next().addClass('error-field');

                displayAlertMessage(error_message);

            
            }
        }
        function displaySuccessMessage()
        {
        $("#job_form_data").before('<div class="alert alert-success" id="alert-success"><button type="button" class="close" data-dismiss="alert">×</button><i class="icon-exclamation-sign"></i>Job Created Successfully</div>');
        }

    function submitPasswordForm() {
       $.ajax({
        url: "{{ route('seller.profile.seller.password.change') }}",
        type: 'post',
        dataType: 'json',
        data: $('#securityFrom').serialize(),
        success: function(response) {
            console.log(response)
            if (response.success) {
                notify('success', response.success);
                location.reload();
             }
            else if(response.validation_errors){

                 displayErrorMessage(response.validation_errors);
            }
            else {

                console.log(response.errors);
                errorMessages(response.errors);
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

</script>



<style>
/* #info-password{
    display: none;
}     */

article.main-section {
    margin: 0px auto;
    display: block;
    width: 92%;
    background: #F8FAFA;
    border-radius: 0px 3px 3px 0px;
    padding: 23px 36px;
}
.sidebar{
    width: 287px;
    float: right;
}
.insturstions-lst{
    width: 100%;
    display: inline-block;
}
.insturstions-lst li{
    font-family: 'Mulish';
font-style: normal;
font-weight: 500;
font-size: 14px;
line-height: 18px;
color: #000;
margin-bottom: 16px;
position: relative;
padding-left: 35px;
}
ul.insturstions-lst li:before {
    /* background: #000; */
    width: 20px;
    height: 20px;
    position: absolute;
    content: '';
    border-radius: 50%;
    left: 0px;
    top: -3px;
    /* background: url(/assets/images/jobs/checked.png) !important; */
    background: url(/assets/images/job/checked.png) no-repeat;
    background-size: 20px !important;
    
}
p.fnt-increase {
    font-family: 'Mulish';
    font-style: normal;
    font-weight: 500;
    font-size: 14px;
    line-height: 18px;
    margin-top: 27px;
    color: #000;
}
ul.btm-listing li {
    font-family: 'Mulish';
    font-style: normal;
    font-weight: 600;
    font-size: 14px;
    line-height: 18px;
    color: #000;
    margin-bottom: 16px;
    position: relative;
    padding-left: 25px;
}
ul.btm-listing li:before {
    position: absolute;
    width: 10px;
    height: 10px;
    background: #D9D9D9;
    content: '';
    border-radius: 50%;
    left: 0px;
    top: 3px;
}
span.password-h {
    font-family: 'Mulish';
    font-style: normal;
    font-weight: 600;
    font-size: 16px;
    line-height: 20px;
    margin-bottom: 27px;
}
p.cp-basic {
    font-family: 'Mulish';
    font-style: normal;
    font-weight: 700;
    font-size: 22px;
    line-height: 28px;
    color: #007F7F;
    border-bottom: 1px solid #CBDFDF;
    padding-bottom: 20px;
}
p.fnt-changep {
    font-family: 'Mulish';
    font-style: normal;
    font-weight: 700;
    font-size: 16px;
    line-height: 20px;
    color: #007F7F;
    margin-bottom: 42px !important;
    width: 100%;
    display: inline-block;
}

.header-short-menu {
    display: none;
}

p.bullet-p:before {
    width: 27px;
    height: 27px;
    position: absolute;
    content: '';
    background: #007F7F;
    border-radius: 50%;
    left: 0px;
    top:-4px;
    background: url(/assets/images/job/checked.png) no-repeat;
    background-size: 25px;
}
p.bullet-p {
    position: relative;
    font-family: 'Mulish';
    font-style: normal;
    font-weight: 400;
    font-size: 14px;
    line-height: 18px;
    color: #000000;
    padding-left: 40px;
}
.password-info-section {
    width: 100%;
   
    padding: 23px 0px 10px 0px;
    margin-bottom: 23px;
}
button.btn.btn-primary.cstm-edit {
    background: #7F007F;
    border-radius: 5px;
    width: 103px;
    height: 40px;
    position: relative;
    /* top: -62px; */
    font-size: 14px;
}
.pasword-changes_con {
    background: #F8FAFA;
    border-radius: 0px 3px 3px 0px;
    padding: 23px 36px;
    display: inline-block;
    width: 100%;
    height: 600px;
    min-height: 100vh !important;
}


form.password-cs {
    width: 300px;
    display: inline-block;
}
form.password-cs input {
    width: 100%;
    height: 37px;
    left: 287px;
    top: 272px;
    background: #FFFFFF;
    border: 1px solid #CBDFDF;
    border-radius: 4px;
    display: inline-block;
    padding-top: 14px;
    margin-bottom: 20px;
}
.form-label {
    font-family: 'Mulish';
    font-style: normal;
    font-weight: 500;
    font-size: 14px;
    line-height: 18px;
    color: #000000;
    margin-bottom: 10px;
    width: 100%;
    display: inline-block;
}

    </style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>

    $(document).ready(function(){
      $("#hide").click(function(){
        $("#info-edit-password ").hide();
        
        $("#info-password").show();
      });
    });
    </script>