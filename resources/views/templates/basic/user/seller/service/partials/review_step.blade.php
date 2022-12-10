<form role="form" action="{{ route('user.service.store.review') }}" method="POST"
class="review-form"
    enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="service_id" value="{{ empty($service->id) ? '' : $service->id }}">

    <div class="card-body">
        <div class="card-form-wrapper">
            <div>
                <h4 class="hdng-create">
                    Finalize
                </h4>

                <span class="msg-create">How many projects can you handle at one time and still deliver great results?</span>
            </div>
            <br>
            <div class="row ">
                <div class="col-xl-6 col-lg-6 form-group">
                    <label>@lang('Maximum number of simultaneous projects')*</label>
                    <input type="number" class="form-control bg--gray" id="max_no_projects"  name="max_no_projects" placeholder="Max no of projects" value="{{@$service->number_of_simultaneous_projects}}">
                </div>

                <br>
                <h4 class="hdng-create">@lang('Copyright Notice')</h4>
                <p class="lbl-review">By submitting your project, you declare that you either own or have rights to the material posted and
                    that posting these materials does not infringe on any third party's rights. You also acknowledge
                    that you understand your project will be reviewed and evaluated by DureForce to ensure it meets
                    DureForce's requirements.</p>
                <h4 class="hdng-create">@lang('Terms of Service')*</h4>
                <br>
                <label for="">
                    <input type="checkbox" name="copyright_notice"  class="checkbox-review" id="copyright_notice" {{ @$service->is_terms_accepted ? 'checked' : '' }}>
                    <span class="lbl-review review-check mb-3">I understand and agree to the DureForce <a href="#">Terms of Service</a>, including the
                        <a href="#">User Agreement</a> and <a href="#">Privacy Policy.</a>
                    
                    
                    </span><br>

                </label>
                <span id="copy"></span>

                <h4 class="hdng-create">@lang('Privacy Notice')*</h4>   
                <label for="privacy" class="d-flex">
                    <input type="checkbox" name="privacy_notice" class="checkbox-review" id="privacy_notice" {{ @$service->is_privacy_accepted ? 'checked' : '' }}>
                    <span class="lbl-review review-check mb-3" >By submitting this project and activating it, I understand that it will
                    appear in DureForce search results visible to the general public and will show up in search engine
                    results, even if my profile visibility is set to Private or DureForce Users Only.
                

                </span>
                </label>
                <span id="copy1"></span>

                </div>
                <br>
                <hr/>
            <div class="row">
                <div class="col-md-4 ">
                    <a class="btn service--btns btn-secondary float-left  mt-20 w-100"
                        href="?view=step-4">@lang('BACK')</a>
                </div>
                <div class="col-md-8 text-right">

                    {{-- <button class="btn service--btns btn-secondary float-left  mt-20 w-100"  type="button">
                        CANCEL 
                    </button>--}}

                    <button class="btn service-cancel-btn  m-3">
                        @lang('Cancel')
                    </button>

                    <a href="{{previewServiceRoute($service)}}"><button class="btn service--btns btn-secondary float-left  mt-20 w-100"  type="button">
                        @lang('Preview Service')
                    </button> </a>

                    <button class="btn service--btns btn-secondary float-left  mt-20 w-100"  name="action" type="submit" value="save_project">
                        @lang('Save Project')
                     </button> 
                   
                    <button type="submit" name="action" class="btn btn-save-continue btn-primary float-left mt-20 w-100" value="submit_for_review">@lang('Submit For Review')</button>
                </div>  
            </div>

        </div>
    </div>
</form>

</div>
