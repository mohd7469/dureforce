<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="padding:0px 150px 150px;">
<h1><center>Forget Password Email</center></h1>
   
   <p>We cannot simply send you your old password. 
    A unique code to reset your password has been generated for you. 
    To reset your password, use the following code and follow the instructions.</p>
    <h1><center>{{ $token_data }}</h1>
  
    <p>Thank you</p>
    <p>The DureForce Team</p>
   <!-- <a href="{{ route('user.password.reset', $token_data) }}">Reset Password</a> -->
</body>
</html>