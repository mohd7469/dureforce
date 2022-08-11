@extends($activeTemplate.'layouts.frontend')
@section('content')
@php
    $content = getContent('breadcrumbs.content', true);
@endphp
{{--  data-background="{{getImage('assets/images/frontend/breadcrumbs/'.$content->data_values->background_image,'1920x1200') }}" --}}
<section class="account-section ptb-80 bg-overlay-white bg_img">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6">
                <h1>Well done , You have created a new service </h1>
                <p>
                You have successfully created a service on [durefore link]. 
Good Luck!

Thank you

The Dure Force Team
                </p>
            </div>
        </div>
    </div>
</section>                    
@endsection

@push('script')
<script>
    (function($){
        "use strict";
        $('#code').on('input change', function () {
          var xx = document.getElementById('code').value;
          
              $(this).val(function (index, value) {
                 value = value.substr(0,7);
                  return value.replace(/\W/gi, '').replace(/(.{3})/g, '$1 ');
              });
          
      });
    })(jQuery)
</script>
@endpush