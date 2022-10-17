

    <div class="pasword-changes_con">    
        

        <!----== Sidebar Container End ==-----> 

        <!----== Password Info Section Start ==----->
        <div class="main-container-click" id="info-edit-password">
            <div class="password-info-section">
                <p class="cp-basic">Password & Security</p>
                <p class="cp-detail">Choose a strong, unique password that’s at least 8 characters long. </p>
                
                <div style="float:right">
                    <button type="button" class="btn btn-primary cstm-edit" id="hide">
                        Edit
                    </button>
                </div>
            </div>

            <p class="bullet-p">Password has been set. Use edit button above to update password</p>
        </div>
               <!----============End================--->  
       

         <!----== Password Info Section Start ==----->
        <div class="main-container-click" id="info-password">
            <div class="password-info-section">
                <p class="cp-basic">Password & Security</p>
                <p class="cp-detail">Choose a strong, unique password that’s at least 8 characters long.  </p>
                
                <div style="float:right">
                    <button  onclick="submiSecurityForm()" type="button" class="btn btn-primary cstm-edit" >
                        Save
                    </button>
                </div>
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
        </div>
               <!----============End================--->  
             


       
    


</div>

<script language="javascript" type="text/javascript">
    function submiSecurityForm() {
       $.ajax({
        url: "{{ route('profile.password.change') }}",
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
</script>



<style>
#info-password{
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
    border-bottom: 1px solid #CBDFDF;
    padding: 23px 0px 10px 0px;
    margin-bottom: 23px;
}
button.btn.btn-primary.cstm-edit {
    background: #7F007F;
    border-radius: 5px;
    width: 103px;
    height: 40px;
    position: relative;
    top: -62px;
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