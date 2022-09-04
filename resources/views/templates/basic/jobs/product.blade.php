@extends($activeTemplate.'layouts.frontend')
@section('content')
dddddddddd
@include($activeTemplate . 'partials.end_ad')
@endsection
@push('script')
<script>
   'use strict';
   $('#defaultSearch').on('change', function() {
       this.form.submit();
   });
</script>
@endpush
