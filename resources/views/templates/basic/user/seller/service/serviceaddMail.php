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
            <h2 class="text-dark">Hello <?php echo $service->user->username; ?></h2>
            <p class="text-dark">
            Hey Congratulations !
                You have successfully created a service on 
                 
                <a href="<?php echo $service_url ?>">View Service</a>
                Good Luck!
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
