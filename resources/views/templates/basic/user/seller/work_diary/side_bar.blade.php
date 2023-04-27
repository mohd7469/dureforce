@if (getLastLoginRoleId()==App\Models\Role::$Client)
    @include($activeTemplate . 'partials.buyer_sidebar')
@else
    @include($activeTemplate . 'partials.seller_sidebar')
@endif