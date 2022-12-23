<style>

</style>
<form role="form" action="{{ route('user.software.store.review') }}" method="POST" class="review-form"
    enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="software_id" value="{{ empty($software->id) ? '' : $software->id }}">
    <div class="card-body">
        <div class="card-form-wrapper">
            <div>
                <h4 class="hdng-create">
                    Finalize
                </h4>

                <span class="msg-create">How many projects can you handle at one time and still deliver great results
                    ?</span>
            </div>
            <div class="col-xl-6 col-lg-6 form-group">
                <label>@lang('Maximum number of simultaneous projects')*</label>
                <input type="number" name="max_no_projects" class="form-control bg--gray" id="max_no_projects" placeholder="Max no of projects" value="{{@$software->softwareDetail->max_no_projects}}">
            </div>
            <hr>
            <div class="row mt-2">
                <div>
                <h4 class="hdng-create">
                    Summary
                </h4>
                @if ($software && $software->modules)
                <table class="table table-striped">
                    <thead class="thead">
                      <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Base Price</th>
                        <th scope="col">Estimated Lead Time (Hours)</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($software->modules as $module)
                        <tr>
                            <td>{{  $module->name   }}</td>
                            <td>${{  $module->start_price   }}</td>
                            <td>{{  $module->estimated_lead_time   }}</td>
                      </tr>
                    @endforeach
                      <tr class="modules-total-row">
                        <td><b>{{  'Total'  }}</b></td>
                        <td>${{  $software->modules->sum('start_price')   }}</td>
                        <td>{{  $software->modules->sum('estimated_lead_time')   }}</td>
                      </tr>

                    </tbody>
                  </table>
                @endif

            </div>
            </div>
            <hr>
            <div class="row ">
                <div class="col-md-4 col-lg-4 col-xl-4 col-sm-12 col-xs-12  service-fee">
                                       
                    <div class="form-group pt-3 ">
                       <label for="" ><strong class="text-dark">Dureforce Service Fee</strong></label>
                       <small id="emailHelp" class="form-text text-muted">20% Dureforce Service Fee <a href="#" class="link-space" style="color: #007F7F; margin-left: 80px;">Explain this</a></small><br>
                       <span class="pt-2 text-dark">${{getServiceFee($software)}}</span>
                    </div>

                 </div>
                 <div class="col-md-4 col-lg-4 col-xl-4 col-sm-12 col-xs-12 service-fee ">
                                       
                    <div class="form-group pt-3">
                       <label for="" ><strong class="text-dark">You’ll Recieve *</strong></label>
                       <small id="emailHelp" class="form-text text-muted">The estimated amount you'll receive after service fees</small><br>
                       <span class="pt-2 text-dark">${{getSoftwareFee($software)}}</span>
                    </div>

                 </div>
            </div>
            <div class="row ">

                <br>
                <h4 class="hdng-create">Copyright Notice</h4>
                <p class="lbl-review">By submitting your project, you declare that you either own or have rights to the material posted and
                    that posting these materials does not infringe on any third party's rights. You also acknowledge
                    that you understand your project will be reviewed and evaluated by DureForce to ensure it meets
                    DureForce's requirements.</p>
                <h4 class="hdng-create">Terms of Service *</h4><p id="copy"></p>
                <br>
                <label for="">
                    <input type="checkbox" name="copyright_notice" class="checkbox-review" id="copyright_notice" {{ @$software->is_terms_accepted ? 'checked' : '' }}>
                    <span class="lbl-review review-check mb-3">I understand and agree to the DureForce <a href="#">Terms of software</a>, including the
                        <a href="#">User Agreement</a> and <a href="#">Privacy Policy.</a></span>
                </label>
                <h4 class="hdng-create">Privacy Notice *</h4><p id="copy1"></p>
                <label for="privacy" class="d-flex">
                    <input type="checkbox" name="privacy_notice" class="checkbox-review" id="privacy_notice" {{ @$software->is_terms_accepted ? 'checked' : '' }}>
                    <span class="lbl-review review-check mb-3">By submitting this project and activating it, I understand that it will
                    appear in DureForce search results visible to the general public and will show up in search engine
                    results, even if my profile visibility is set to Private or DureForce Users Only.</span>
                </label>
                </div>
                <br>
                <hr/>
                <div class="row">
                    <div class="col-md-6 ">
                        <a class="stepwizard-step service--btns btn btn-secondary float-left mt-20 w-100"
                            href="?view=step-4" type="button">@lang('BACK')</a>
                    </div>
                    <div class="col-md-6 text-right">
                        <a class="stepwizard-step service--btns btn btn-secondary float-left  mt-20 w-100"
                            href="{{route('user.software.index')}}" type="button">@lang('Cancel')</a>

                        <a class="stepwizard-step service--btns btn btn-secondary float-left  mt-20 w-100"
                            href="{{$software ? route('software.view',[$software->uuid]) : '#'}}" type="button">@lang('Preview')</a>

                    <button class="btn softwar-save-draft--btns btn-secondary float-left  mt-20 w-100"  name="action" type="submit" value="save_project">
                        @lang('Save as Draft')
                     </button> 

                     <button type="submit" name="action" class="btn btn-save-continue btn-primary float-left mt-20 w-100" value="continue">@lang('Continue')</button>
                    </div>
                </div>

        </div>

    </div>

</form>

</div>
