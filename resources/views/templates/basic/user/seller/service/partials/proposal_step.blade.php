<form action="{{route('seller.service.store.proposal')}}" method="post" id="propsal_form" enctype="multipart/form-data">
    @csrf
    <input type="hidden" value="{{ $service->id ?? '' }}" name="service_id" id="service_id">
    @php
        $proposal=getServiceProposalData($service);
        $files=old('uploaded_files',$proposal['attachments']);
        if(is_string($files)){
            $files=json_decode($files);
        }

        $service_fee=getSystemServiceFee();
        $user_percentage=(100-$service_fee)/100;
        $service_fee_percentage=$service_fee/100;

    @endphp
    <div class="card-body">
        <div class="card-form-wrapper">
            <input type="hidden" value="{{getSystemServiceFee()}}" id="system_service_fee_id">
            <div class="row justify-content-center">
                {{-- Bidding Rate --}}
                <div class="row section-end-line">
                    
                    {{-- hourly rate --}}
                    <div class="col-md-4 col-lg-4 col-xl-4 col-sm-12 col-xs-12">
                        <div class="form-group pt-3">
                            <label for=""><strong class="text-dark">Hourly Rate *</strong></label>
                            <small id="milestones_amount_receive" class="form-text text-muted">Total amount the client will see on your proposal</small>
                            <div class="input-group">
                                <input type="number" name="hourly_bid_rate" class="form-control" step="any" id="hourly_bid_rate"  min="1" oninput="this.value = Math.abs(this.value)" value="{{old('hourly_bid_rate',$proposal['hourly_bid_rate'] ? $proposal['hourly_bid_rate'] : floatval(@$service->rate_per_hour) ) }}" >
                                <span class="input-group-text float-end">$</span>
                            </div>
                        </div>
                    </div>
                    
                    {{-- service fee --}}
                    <div class="col-md-4 col-lg-4 col-xl-4 col-sm-12 col-xs-12 bg-default">
                    
                        <div class="form-group pt-3">
                            <label for="" ><strong class="text-dark">Dureforce Service Fee</strong></label>
                            <small id="emailHelp" class="form-text text-muted">{{$service_fee}}% Service Fee 
                                {{-- <a href="#" class="link-space " style="color: #007F7F; margin-left: 80px;">Explain this</a> --}}
                            </small><br>
                            <span class="pt-2 text-dark" id="system_fee">{{old('hourly_bid_rate',$proposal['hourly_bid_rate'] ? (float)$proposal['hourly_bid_rate'] :  floatval(@$service->rate_per_hour) )* $service_fee_percentage }}</span>
                        </div>

                    </div>
                    
                    {{-- freelancer recieving amount --}}
                    <div class="col-md-4 col-lg-4 col-xl-4 col-sm-12 col-xs-12">
                        <div class="form-group pt-3 ">
                            <label for=""><strong class="text-dark">You’ll Recieve *</strong></label>
                            <small  class="form-text text-muted">The estimated amount you'll receive after service fees</small>
                            <div class="input-group">
                                <input type="number"  class="form-control" id="amount_receive" aria-describedby="emailHelp" name="amount_receive" step="any" readonly value="{{old('hourly_bid_rate',$proposal['hourly_bid_rate'] ? (float)$proposal['hourly_bid_rate']  : floatval(@$service->rate_per_hour))   * $user_percentage }}">
                                <span class="input-group-text float-end">$</span>
                            </div>
                            
                        </div>
                    </div>

                </div>

                <div class="row ">
                    
                    {{-- hours Limit --}}
                    <div class="col-md-6 col-lg-6 col-xl-6 col-sm-12 col-xs-12">
                        <div class="form-group pt-3">
                            <label for=""><strong class="text-dark">What is your weekly working hours limit?</strong></label>
                            <div class="row">
                                <div class="col-md-6 col-lg-6 col-sm12 col-xs-12">

                                    <small  class="form-text text-dark">Min. Hours Per Week *</small>
                                    <input type="integer" class="form-control" step="any" id="start_hour_limit" name="start_hour_limit" oninput="this.value = Math.abs(this.value)" value="{{old('start_hour_limit',$proposal['start_hour_limit']) }}">

                                </div>
                                <div class="col-md-6 col-lg-6 col-sm12 col-xs-12">

                                    <small  class="form-text text-dark">Max. Hours Per Week *</small>
                                    <input type="integer" step="any" class="form-control" id="end_hour_limit" name="end_hour_limit" oninput="this.value = Math.abs(this.value)" value="{{old('end_hour_limit',$proposal['end_hour_limit']) }}">

                                </div>
                            </div>

                        </div>
                    </div>
                    
                
                    {{-- Mode of Work Delivery --}}
                    <div class="col-md-6 col-lg-6 col-xl-6 col-sm-12 col-xs-12">
                        <div class="form-group pt-3">
                            <label for="" ><strong class="text-dark">What is your mode of work delivery?</strong></label>
                            <small id="emailHelp" class="form-text text-dark">Mode of Delivery *</small>
                            <select name="delivery_mode_id" id="mode_of_delivery" class="form-control">
                                <option value="">Select Mode Of Delivery</option>
                                @foreach ($delivery_modes as $mode)
                                <option value="{{$mode->id}}" {{ (old("delivery_mode_id",$proposal['delivery_mode_id']) == $mode->id ? "selected":"") }}>{{$mode->title}}</option>
                                    
                                @endforeach
                            </select>
                        </div>
                    </div>

                </div>

                {{-- Additional Detail--}}
                <div class="row">
                
                    {{-- card header --}}
                    <div class="card-header bg-default ">
                        {{-- div title --}}
                        <h3>Additional Detail </h3>
                    </div>
                    {{-- card body --}}
                    <div class="div-background" >
                        
                        {{-- Cover Letter --}}
                        <div class="form-group">
                            <label for="cover_letter">Cover Letter*</label>
                            <textarea class="form-control cover-letter" id="cover_letter" rows="20" cols="8" name="cover_letter" >{{config('settings.service_description_prefix')}}{{old('cover_letter',$proposal['cover_letter'] ? $proposal['cover_letter'] : @$service->description) }}</textarea>
                        </div>
            
                        {{-- Required documents --}}
                        <div class="form-group">
                            <label>@lang('Required Documents')</label>
                            <div id="dropzone">
                                <div class="dropzone needsclick" id="demo-upload" action="#" >
                                    
                                    <div class="fallback">
                                        <input name="file" type="file" multiple />
                                    </div>
                                    <div>
                                        <div class="upload_icon">
                                            <img src="{{url('assets/images/frontend/job/upload.svg')}}" alt="">
                                            <img src="{{url('assets/images/frontend/job/arrow_up.svg')}}" alt="" class="upload_inner_arrow">
                                        </div>
                                    </div>
                                    <div class="dz-message"> 
                                        @lang('Drag or Drop to Upload')  <br> 
                                        <span class="text text-primary ">
                                        @lang('Browse')  
                                        
                                        </span>
                                    </div>
            
                                </div>
                            </div>
                            <small>
                                Attachments Guideline: You may attach up to 6 files under the size of 3MB each. Include work samples or other documents to support your application. 
                                Do not attach your résumé — your Dureforce profile is automatically forwarded to the client with your job.
                            </small>
                    
                        </div>
                    </div>

                    
                </div>
                {{-- uploaded files preview --}}
                <div>
                    <table class="table table-bordered" id="uploaded_file_table_id">
                        <tbody id="file_name_div">
                            @foreach ( $files  as $item)
                                <tr>
                                    <td><a href="{{$item->url}}" download>{{$item->uploaded_name}}</a></td>
                                    <td class="text-center">{{$item->type}}</td>
                                    <td class="text-center" id="DeleteButton">
                                        <span class="badge badge-primary badge-pill delete-btn"  ><i class="fa fa-trash" style="color:red" ></i></span>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{$item->url}}" download><span class="badge badge-primary badge-pill delete-btn"  ><i class="fa fa-download"  ></i></span></a>

                                    </td>
 
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 " style="margin-left: -10px;">
                    <a class="btn service--btns btn-secondary float-left  mt-20 " href="?view=step-3">@lang('BACK')</a>
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
            <input type="hidden" value="{{old('uploaded_files',json_encode($proposal['attachments']))}}" name="uploaded_files" id="uploaded_files_input_id">
        </div>
    </div>
  
 </form>

@push('style-lib')

    <link rel="stylesheet" href="{{asset('assets/resources/templates/basic/frontend/css/custom/proposal_step.css')}}">

@endpush

@push('script-lib')
    <script>
        var file_upload_url="{{route('file.upload') }}";
    </script>
   <script src="{{asset('/assets/resources/templates/basic/frontend/js/dropzone.js')}}"></script>
   <script src="{{asset('/assets/resources/templates/basic/frontend/js/proposal-step.js')}}"></script>


@endpush


