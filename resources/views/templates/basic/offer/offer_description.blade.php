@extends($activeTemplate.'layouts.frontend')
@section('content')
offer description

@endsection
@push('style')
<style>
    
</style>
@endpush
@push('script')
    <script>
        "use strict";
        $(document).ready(function(){
            $("#loginWithGmail").modal('show');
        });
    </script>
@endpush
