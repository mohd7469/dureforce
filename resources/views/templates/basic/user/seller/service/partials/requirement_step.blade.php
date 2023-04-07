<form role="form" action="{{ route('user.service.store.requirement') }}" method="POST" class="user-req-form"
    enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="service_id" value="{{ $service->id ?? '' }}">


    <div class="card-body">
        <div class="card-form-wrapper">
            <div>
                <h4 class="hdng-create">
                    Requirements for the client *
                </h4>

                <p class="my-4 msg-create">Tell the client what you need to get started </p>

            </div>
            <div class="row justify-content-center">
                <div class="col-xl-12 col-lg-12 form-group">
                    <label>@lang('Description')*</label> 
                    <textarea class="form-control bg--gray " placeholder="Do you have preferred styles for your illustration. Please share 3 examples."
                        name="client_requirements" id="req">{{ old('Tell Your Requirements', @$service->requirement_for_client) }}</textarea>
                </div>

            </div>
           
            <br/>
            <br/>
            <br/>
            <hr/>
            <br/>
            <div class="row">
                <div class="col-md-3 ">
                    <a class="btn service--btns btn-secondary float-left  mt-20 " href="?view=step-4">@lang('BACK')</a>
                </div>
                <div class="col-md-9 text-right">
                    <a class="stepwizard-step service--btns btn btn-secondary float-left  mt-20 " href="{{route('user.service.index')}}" type="button">@lang('Cancel')</a>


                    <a href="{{previewServiceRoute($service)}}"><button class="btn service--btns btn-secondary float-left  mt-20 "  type="button">
                       Preview Service
                    </button> </a>
                    <button type="submit" class="btn btn-save-continue btn-primary float-left mt-20 ">@lang('SAVE
                        AND
                        CONTINUE')</button>
                </div>
            </div>

        </div>
    </div>
</form>
