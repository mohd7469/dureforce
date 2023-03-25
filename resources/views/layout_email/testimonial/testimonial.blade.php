<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <title>Document</title>
    
    <style>
        body {
            margin: 0;
            font-family: sans-serif;
        }

        .email-tag {
            width: 100%;
            text-align: center;
            padding: 30px 0px;
            background: #3690ff;
            font-size: 20px;
            color: white;
            margin: 0;
            font-weight: 600;
        }

        .user_profile {
            text-align: center;
            width: 100%;
            padding: 30px 0px;
            background: #3690ff;
            color: white;
            margin: 0;
        }

        .img-logo {
            text-align: center;
        }

        .name-tag {
            text-align: center;
            color: #585858;
            margin-bottom: 5px;
        }

        .btm-line {
            width: 71px;
            border: 2px solid #3690ff;
        }

        .content-main {
            width: 60%;
            margin: auto;
            color: #818080;
            font-size: 17px;
        }

        b {
            font-size: 18px;
            font-weight: bolder;
        }

        .alert-msg {
            align-content: center;
            color: #ff0000e8;
        }

        .text-dark {
            color: #000;
        }

    </style>
</head>

<body>
    <div>
        <p class="email-tag">This is a System Generated Email</p>
        <br />
        <div class="img-logo">
            <img src="<?php echo  getImage(imagePath()['logoIcon']['path'] . '/logo.png') ?>" alt="">
        </div>
       
        <div class="content-main">
            <div class="col-md-3" >
                <div class="row user_profile" >
                    
                    <div class="col-md-4" style="width:15%;float:left">
                        <img alt="User Pic" src="https://stgdureforcestg.blob.core.windows.net/attachments/6415cbaa8113f1679149994.png" id="profile-image1" class="img-circle img-responsive" style="border-radius:50%; width: 85px;height: 85px"> 
                    </div>

                    <div class="col-md-8" style="text-align:left;width:85%;">

                        <strong class="">
                            {{$user->full_name}}

                        </strong>

                        <p class="" style="margin-top:4px;">{{$user->job_title}}</p>

                        <p class="" style="margin-top:-12px;">{{$user->location}}</p>


                    </div>


                </div>
            </div>
            <br>
            <h2 class="text-dark">Hello <?php echo $user_testimonial->client_name; ?></h2>
            <p class="text-dark">
                <?php echo $user_testimonial->message_to_client; ?>
                 
                <a href="<?php echo $response_url ?>">Click to Endorse <?php echo $user->full_name; ?></a>
                You can help by sharing a brief testimonial for <?php echo $user->full_name; ?> profile
            </p>
            
            <br />
            <p class="text-dark">
                Thank you,
                <br>
                The dureforce team
            </p>

            <br>
        
        </div>
    </div>
</body>

</html>
