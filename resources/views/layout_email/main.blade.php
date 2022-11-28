<!DOCTYPE html>
<html>
<head>
<title>Email Template</title>
</head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<body  style="padding: 0px; margin: 0px; box-sizing: border-box;">
    <div style="width: 600px; margin: 0px auto; display: block; box-sizing: border-box;" class="body_container">
        @include('email-template-layout.header')
            @include('email-template-layout.email-template-img')
            @yield('content')
            @include('email-template-layout.footer')

            @yield('style')
    </div>
</body>