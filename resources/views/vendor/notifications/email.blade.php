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
            <img src="{{ getImage(imagePath()['logoIcon']['path'] . '/logo.png') }}" alt="">
        </div>
        <div class="content-main">
            <h2 class="text-dark">Hello {{ session()->get('registerUsername') }}</h2>
            <p class="text-dark">
                We just need a small favor from you – please confirm your email to continue using DureForce.
                Click on the link below
            </p>
            @component('mail::button', ['url' => $actionUrl, 'color' => 'blue'])
                {{ $actionText }}
            @endcomponent
            <br />

            <p class="text-dark">
                If you did not create this account, No further action is required.
            </p>
            <p class="text-dark">
                Thank you,
                <br>
                The DureForce Team
            </p>

            <br>
            <p class="text-dark">
                If you are having trouble clicking the "Verify Email Address" button, copy and paste the URL below
                into your web browser.
                {{ $actionUrl }}
            </p>
        </div>
    </div>
</body>

</html>
