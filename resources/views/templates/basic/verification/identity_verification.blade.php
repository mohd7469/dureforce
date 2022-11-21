@extends($activeTemplate.'layouts.frontend')
@section('content')
identify
@endsection


<style>
   
</style>

@push('script')

<script>
   'use strict';
   $('#defaultSearch').on('change', function() {
       this.form.submit();
   });
</script>


@endpush
