<div class="setProfile" id="payment-index">
    <div class="container-fluid welcome-body">
        <div class="row">
            <h1 class="mb-4 p-0">Payment Methods </h1>
            <div class="col-md-12 cmnt ">
                <div class="row mb-3">
                    <div class="col-md-8 d-flex align-items-center">
                        <span class="">
                            Add or delete payment methods for your account.
                        </span>
                    </div>
                    <div class="col-md-4">
                        <a href="{{ route('user.basic.profile', ['view' => 'step-4']) }}"
                            class="btn btn-continue btn-secondary btn-add-method m-0">@lang('Add a Payment Method')</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="">
            <div class="mt-3" id="">
                <table class="table">
                    <thead>
                        <tr>
                            {{-- <th colspan="4"></th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (App\Models\UserPayment::where('user_id', auth()->id())->get() as $payments)
                            <tr class="pay-block">
                                <td class="card-num d-flex align-items-center">
                                    <figure class="my-0 m-3">
                                        <svg width="47" height="28" viewBox="0 0 47 28" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <rect width="47" height="28" rx="4" fill="white" />
                                            <path
                                                d="M18.1634 19.8307L20.0024 9.25969H22.944L21.1036 19.8307H18.1634ZM31.731 9.48757C31.1484 9.2734 30.2351 9.04358 29.0947 9.04358C26.188 9.04358 24.1407 10.4773 24.1232 12.5322C24.1068 14.0512 25.5849 14.8986 26.7007 15.4042C27.8457 15.9225 28.2306 16.2528 28.2251 16.7155C28.2177 17.4241 27.3107 17.7477 26.4652 17.7477C25.2879 17.7477 24.6624 17.5874 23.6963 17.1929L23.3172 17.0249L22.9044 19.3913C23.5915 19.6865 24.8619 19.9421 26.1811 19.9553C29.2733 19.9553 31.2806 18.538 31.3034 16.3436C31.3144 15.141 30.5308 14.226 28.8336 13.4714C27.8055 12.9824 27.1758 12.6561 27.1825 12.1609C27.1825 11.7215 27.7155 11.2516 28.8672 11.2516C29.829 11.237 30.5259 11.4425 31.0688 11.6566L31.3324 11.7786L31.731 9.48757ZM39.3007 9.25952H37.0277C36.3236 9.25952 35.7966 9.44777 35.4874 10.1362L31.1188 19.8237H34.2077C34.2077 19.8237 34.7126 18.5212 34.8268 18.2352C35.1644 18.2352 38.1651 18.2397 38.5941 18.2397C38.6821 18.6098 38.952 19.8237 38.952 19.8237H41.6815L39.3007 9.2592V9.25952ZM35.6943 16.0857C35.9377 15.4766 36.8664 13.1306 36.8664 13.1306C36.8491 13.1587 37.1079 12.5185 37.2563 12.1216L37.4551 13.033C37.4551 13.033 38.0184 15.5564 38.1361 16.0855H35.6943V16.0857ZM15.6663 9.25952L12.7864 16.4685L12.4796 15.0036C11.9434 13.3148 10.2731 11.4851 8.40576 10.5691L11.0391 19.8139L14.1513 19.8105L18.7823 9.25942L15.6663 9.25936"
                                                fill="#0E4595" />
                                            <path
                                                d="M10.0997 9.25916H5.35645L5.31885 9.4791C9.00907 10.3541 11.4508 12.4687 12.4646 15.0098L11.4332 10.1519C11.2552 9.48255 10.7387 9.28275 10.0998 9.25942"
                                                fill="#F2AE14" />
                                        </svg>
                                    </figure>
                                    {{ $payments->card_number }}
                                </td>
                                <td>Expiry: {{ Carbon\Carbon::parse($payments->expiration_date)->format('d/m/Y') }}
                                </td>

                                <td>
                                    @if ($payments->status)
                                        <span>Primary</span>
                                    @else
                                        <a class="btn btn-outline-secondary btn-primary "
                                            href="{{ route('user.profile.change-payment-status', $payments->id) }}">Make
                                            Primary</a>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <a href="{{ route('user.basic.profile', ['view' => 'step-4', 'id' => $payments->id]) }}"
                                            class="btn btn-secondary icons"><i class="far fa-edit"></i></a>
                                        <form method="POST"
                                            action="{{ route('user.profile.destroy.payment', $payments->id) }}"
                                            style="margin-left: 2px; width: fit-content">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-secondary icons"
                                                onclick="return confirm('Are you sure you want to delete this payment method ?')"
                                                type="submit">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        @if (count(App\Models\UserPayment::where('user_id', auth()->id())->get())>0)
            <div class=" p-0">
                <div class="col-md-12">
                    <a href="{{route('user.home')}}" class="btn btn-continue m-0 my-2 btn-secondary ">
                        Go To Dashboard
                    </a>
                </div>
            </div>
        @endif

       
    </div>
    
</div>

