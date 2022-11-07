<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Maven+Pro:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'frontend/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'frontend/css/bootstrap.min.css')}}">
    <link rel="shortcut icon" href="{{getImage(imagePath()['logoIcon']['path'] .'/favicon.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'frontend/css/swiper.min.css')}}">
    <link rel="stylesheet" href="{{asset($activeTemplateTrue. 'frontend/css/chosen.css')}}">
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'frontend/css/line-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'frontend/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'frontend/css/style.css')}}">
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'frontend/css/bootstrap-fileinput.css')}}">
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'frontend/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/resources/templates/basic/frontend/css/dropzone.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('/assets/resources/style/index.css')}}">
    
    @stack('style-lib')
    @stack('style')
    <link href="{{ asset($activeTemplateTrue . 'frontend/css/color.php') }}?color={{$general->base_color}}&secondColor={{$general->secondary_color}}" rel="stylesheet"/>

</head>
<body>
    
    
@include($activeTemplate.'partials.inertia_user_header')

@inertia

@include($activeTemplate.'partials.inertia_footer')
<script src="https://js.pusher.com/7.2/pusher.min.js"></script>
<script src="{{asset($activeTemplateTrue.'frontend/js/jquery-3.5.1.min.js')}}"></script>
<script src="{{asset($activeTemplateTrue.'frontend/js/main.js')}}"></script>

<script src="{{ asset('public/js/app.js') }}" type="text/javascript"></script>

</body>
</html>
