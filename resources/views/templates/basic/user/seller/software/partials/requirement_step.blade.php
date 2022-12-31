<form role="form" action="{{ route('user.software.store.requirement') }}" method="POST" class="user-req-form"
    enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="software_id" value="{{ $software->id ?? '' }}">


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
                        name="client_requirements" id="req">{{ old('Tell Your Requirements', @$software->requirement_for_client) }}</textarea>
                </div>

            </div>
        
            <div class="row">
                <div class="col-md-6">
                    <a class="stepwizard-step service--btns btn btn-secondary float-left  mt-20 w-100"
                        href="?view=step-3" type="button">@lang('BACK')</a>
                </div>
                <div class="col-md-6 text-right">
                    <a class="stepwizard-step service--btns btn btn-secondary float-left  mt-20 w-100"
                            href="{{route('user.software.index')}}" type="button">@lang('Cancel')</a>

                    <button class="btn softwar-save-draft--btns btn-secondary float-left  mt-20 w-100"  name="action" type="submit" value="save_project">
                        @lang('Save as Draft')
                     </button> 
                     <button type="submit" name="action" class="btn btn-save-continue btn-primary float-left mt-20 w-100" value="continue">@lang('Continue')</button>
                </div>

            </div>

        </div>
    </div>
</form>
