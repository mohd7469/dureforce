<style>

</style>
<?php
if (!empty($software)) {
 $software_module = App\Models\SoftwareModule::where('software_id',$software->id)->get();
}
?>

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
            <br>
          
            <div class="row ">
                <div class="col-xl-6 col-lg-6 form-group">
                    <label>@lang('Maximum number of simultaneous projects')*</label>
                    <input type="number" name="max_no_projects" class="form-control bg--gray" id="max_no_projects" placeholder="Max no of projects" value="{{@$software->softwareDetail->max_no_projects}}">
                </div>
                <br>
                <div class="row">
            <h4 class="hdng-create">
                 Summary 
                </h4>
                <div class="col-xl-12 col-lg-12 form-group">
                    <table class="table table-striped t1">
                        <tr>
                          <th>
                          Title
                         </th>
                         <th>
                         Base Price
                         </th> 
                         <th>
                         Estimated Lead Time (Hours)
                         </th>
                        </tr>
                       
                        <tr>
                            <td >
                            @foreach($software_module  as $module)
                               {{ $module->module_title }} 
                               
                            </td>
                          
                            <td class="hdng-create">  {{ $module->price }}  </td>
                            <td class="hdng-create">  {{ $module->estimated_lead_time	 }}  </td>
                         
                            @endforeach
                        </tr>
                      
                    </table>
</div>
</div> 

            <div class="container overflow-hidden ">
            <div class="row gx-5 ">
                <div class="col">
                   
                <div class="p-3 box1">
                <label>Dureforce Service Fee</label>    
                20% Dureforce Service Fee<a href="">Explain this</a>
              <br/>
              <br/>
                <h3 class="hdng-create">$778.00</h3>
            </div>
               
            </div>
                <div class="col">
                <div class="p-3  box1">
                <label>You’ll Recieve *</label>
                The estimated amount you'll receive after service fees
                <br/>
              <br/>
                <h3 class="hdng-create">$3114.40</h3>
                </div>
               
                </div>
            </div>
            </div>

            &nbsp;
            <br>
               <hr/>
                <h4 class="hdng-create">Copyright Notice</h4>
                <p class="lbl-review">By submitting your project, you declare that you either own or have rights to the material posted and
                    that posting these materials does not infringe on any third party's rights. You also acknowledge
                    that you understand your project will be reviewed and evaluated by DureForce to ensure it meets
                    DureForce's requirements.</p>
                <h4 class="hdng-create">Terms of Service</h4><p id="copy"></p>
                <br>
                <label for="">
                    <input type="checkbox" name="copyright_notice" class="checkbox-review" id="copyright_notice" {{ @$service->softwareDetail->copyright_notice ? 'checked' : '' }}>
                    <span class="lbl-review review-check mb-3">I understand and agree to the DureForce <a href="#">Terms of Service</a>, including the
                        <a href="#">User Agreement</a> and <a href="#">Privacy Policy.</a></span>
                </label>
                <h4 class="hdng-create">Privacy Notice</h4><p id="copy1"></p>
                <label for="privacy" class="d-flex">
                    <input type="checkbox" name="privacy_notice" class="checkbox-review" id="privacy_notice" {{ @$service->softwareDetail->privacy_notice ? 'checked' : '' }}>
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
                        <button type="submit"
                            class="btn btn-save-continue btn-primary float-left mt-20 w-100">@lang('SAVE AND
                            CONTINUE')</button>
                    </div>
                </div>

        </div>
    </div>

</form>

</div>
