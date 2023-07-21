@php
$serviceSteps = collect([]);
$extraService = collect([]);
if (!empty($service)) {
    
    $extraService = $service->addOns;
    $serviceSteps = $service->serviceSteps;
}
@endphp





<form role="form" action="{{ route('user.service.store.pricing') }}" id="formAdd" class="user-pricing-form"
    method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card-body">

        <div class="card-form-wrapper">
            <div class="row justify-content-center">
                <input type="hidden" name="service_id" value="{{ $service->id ?? '' }}">

               
                <div class="col-lg-4 ">
                    <label>@lang('Per Hour Rate')*</label>
                    <input type="number" step="any"  class="form-control" name="price"  id="price"  oninput="this.value = Math.abs(this.value)"
                        value="{{ old('price',  floatval(@$service->rate_per_hour) ?: "Enter per hour rate") }}" placeholder="@lang('Enter Eg. $50')"
                       min="0" >
                </div>
                <div class="col-lg-4 ">
                    <label>@lang('Estimated Delivery Time')*</label>
                    <input type="number" name="delivery_time" step="1" min="0"  class="form-control mt-1" id="delivery"
                        value="{{ old('delivery_time', @$service->estimated_delivery_time) }}"
                        placeholder="@lang('Enter Hours')"
                        oninput="this.value = Math.abs(this.value)"
                    >
                </div>
                <div class=" col-lg-4">
                    <div class="form-group">
                        <label class="d-inline-block">@lang('Deliverables')*</label>
                        <span title="No.of Revision (no.)
                            free number field
                            source code
                            Unit test project
                            Deployment ">
                        <i class="fa fa-info-circle"></i></span>
                        <select class="form-control select2 select2-hidden-accessible " multiple="" data-placeholder="Select Deliverables" style="width: 100%;" tabindex="-1" aria-hidden="true" name="deliverables[]" id="deliverables">
                                
                                <option value="" disabled>Select Deliverables</option>

                                @if (!empty($service))

                                    @foreach ($deliverables as  $item )
                                        <option value="{{ $item->id }}" @if(in_array($item->id,$service->deliverable->pluck('id')->toArray())) selected @endif>
                                            {{ __($item->name) }}</option>
                                    @endforeach
                                @else
                                    @foreach ($deliverables as  $item )
                                        <option value="{{ $item->id }}" >
                                            {{ __($item->name) }}</option>
                                    @endforeach
                                @endif
                           
                        
                        </select>
                        <span class="del_error"></span>
                    </div>
                    <br />
                    
                </div>

               
                <div class="accordion" id="accordionExample" style="margin-top: -55px !important">

                    <div class="card">
                      <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                          <button class="btn btn-link btn-block text-left" type="button"  data-target="#collapseOne" aria-controls="collapseOne">
                            Add Ons Service
                          </button>
                        </h2>
                      </div>
                  
                      <div id="collapseOne" class="collapsing" aria-labelledby="headingOne" data-parent="#accordionExample">
                        {{-- <div > --}}
                            @if(count($extraService)>0)

                                @foreach ($extraService as $exKey => $extra)
                                    <div id="add-service-container" class="custom-card-body"> 
                                        <div class="row add-ons" id="add-on-row-id-{{ $exKey }}">
                                            
                                            <div class="col-xl-4 col-lg-4 form-group">
                                                <label>Title</label>
                                                <input type="text"name="service_add_ons[{{$exKey}}][title]" placeholder="Title"  value="{{ $extra->title }}"
                                                    class="form-control add-on-title">
                                            </div>

                                            <div class="col-xl-4 col-lg-4 form-group">
                                                <label>@lang('Per Hour Rate')</label>
                                                <input type="number" class="form-control add_on_price" value="{{ floatval($extra->rate_per_hour) ?: 'Enter add on price' }}"
                                                    name="service_add_ons[{{$exKey}}][rate_per_hour]"  placeholder="@lang('Per hour rate')"
                                                    oninput="this.value = Math.abs(this.value)"
                                                    step="any">
                                            </div>

                                            <div class="col-xl-3 col-lg-3 form-group">
                                                <label>@lang(' Estimated Delivery Time ')</label>
                                                    <input type="number" class="form-control add-on-delivery" value="{{ $extra->estimated_delivery_time ?: 'Enter delivery' }}"
                                                    name="service_add_ons[{{$exKey}}][estimated_delivery_time]" id="add_on_delivery"  placeholder="@lang('Enter Days')"
                                                    oninput="this.value = Math.abs(this.value)"
                                                    >
                                            </div>
                                                @if($exKey>0)
                                                    <div class="col-xl-1 col-lg-1 " style="margin-top:2.4rem">
                                                        <button type="button" class="btn btn-danger"
                                                            onclick="deleteAddOnRow($('#add-on-row-id-{{ $exKey }}'))"><i
                                                                class="fa fa-trash"></i></button>
                                                    </div>
                                                @endif
                                        </div>
                                    </div>
                                @endforeach
                                <input type="hidden" name="number_of_add_on_services" value="{{ count($extraService) }}" id="number_of_add_on_services">
                                
                            @else
                                <div id="add-service-container" class="custom-card-body">

                                    <div class="row add-ons">

                                        <div class="col-xl-4 col-lg-4 form-group">
                                            <label>Title</label>
                                            <input type="text" name="service_add_ons[0][title]" placeholder="Title" id="extra_title" class="form-control add-on-title" />
                                        </div>

                                        <div class="col-xl-4 col-lg-4 form-group">
                                            <label>@lang('Per Hour Rate')</label>
                                            <input type="number" class="form-control add_on_price" step="any"  name="service_add_ons[0][rate_per_hour]"
                                                placeholder="@lang('Per hour rate')" id="add_on_price" oninput="this.value = Math.abs(this.value)" >
                                        </div>

                                        <div class="col-xl-4 col-lg-4 form-group">
                                            <label>@lang(' Estimated Delivery Time ')</label>
                                                <input type="number" step="any" class="form-control add-on-delivery" id="add_on_delivery" name="service_add_ons[0][estimated_delivery_time]"
                                                placeholder="@lang('Enter Hours')" oninput="this.value = Math.abs(this.value)" >
                                        </div>
                                    </div>

                                </div>

                                <input type="hidden" name="number_of_add_on_services" value="1" id="number_of_add_on_services">


                            @endif

                            <div class="row ">

                                <div class="col-12 form-group custom-card-footer" >
                                    <button class="btn btn-primary" id="add-more-service" type="button"> ADD
                                        MORE</button>
                                </div>
                            </div>
                        {{-- </div> --}}
                      </div>
                    </div>
                
                    <div class="card">
                      <div class="card-header" id="headingTwo">
                        <h2 class="mb-0">
                          <button class="btn btn-link btn-block text-left collapsed" type="button"  data-target="#collapseTwo" aria-controls="collapseTwo">
                            Project Steps
                          </button>
                        </h2>
                      </div>
                      <div id="collapseTwo" class="collapsing" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        {{-- <div class="card-body"> --}}
                            <div>
                                <div class="custom-card-body" id="step-rows">
                                
                                    <p class="msg-create">List the steps involved in delivering your project</p>
                                   
                                    @if (!isset($serviceSteps) || $serviceSteps->isEmpty())
                                        <label for="" class="d-inline-block">Step Name</label>
                                        <span title="1 Requirement Gathering : Developer /client must identify the exact  requirements of service from start to finish.
    
                                            2 Analyzing :
                                            After gathering requirements, the developer will forecast the problem and its solution based on the client's requirement.
                                            (service budget analysis can be done at this time )
    
                                            3 Development :
                                            Now, developers can start developing the different milestones of service offering to the client based on the client’s requirement.
    
                                            4 Testing :
                                            In this phase, developers will investigate and discover programming or development bugs by performing required tests on service.
    
                                            5 Deployment :
                                            Developer will deploy the following service (program /software) as per client’s requirements.">
                                            <i class="fa fa-info-circle"></i></span>
                                        <input type="text" name="steps[]" id="step" placeholder="E.g. Initial Requirements"
                                            class="form-control"
                                                />
                                        <div class="mt-2">
                                            <label for="discription ">Step Description</label>
                                            <textarea type="text" name="description[]" id="discription" placeholder="This is a short description."
                                                class="form-control description"></textarea>
                                            <br>
    
                                        </div>
                                    @else
                                        @foreach ($serviceSteps as $serviceKey => $item)
                                            <div id="extra-on-service-row-{{ $serviceKey }}">
                                                @if ($serviceKey != 0)
                                                    <div style="float: right; margin-bottom:1rem">
                                                        <button type="button" class="btn btn-danger"
                                                            onclick="removeExtraService($('#extra-on-service-row-{{ $serviceKey }}'))"><i
                                                                class="fa fa-trash"></i></button>
                                                    </div>
                                                @endif
                                                
                                                <label for="">Step Name </label>
                                                <input type="text" name="steps[]"
                                                    id="step-first"
                                                    placeholder="E.g. Initial Requirements" class="form-control step"
                                                    value="{{ $item->name }}" />

                                                <div  class="mt-2">
                                                    <label for="description ">Step Description  </label>
                                                    <textarea type="text" name="description[]" id="discription-first" placeholder="This is a short description." class="form-control description">{{ $item->description ?? '' }}</textarea>
                                                    <br />
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
    
                                    
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 custom-card-body mb-2">
                                       
                                <span class="add-new-row" style="cursor: pointer" id="another_step_id">
                                    Add Another
                                </span>
                               
                            </div>
                                
                            </div>
            
                        {{-- </div> --}}
                      </div>
                    </div>
                  
                </div>

                <div class="row">
                    <div class="col-md-3" style="margin-left: -10px;">
                        <a class="btn service--btns btn-back btn-secondary float-left  mt-20 "
                            href="?view=step-1">@lang('BACK')</a>
                    </div>
                    <div class="col-md-9 text-right">
                        <a class="stepwizard-step service--btns btn btn-secondary float-left  mt-20 " href="{{route('user.service.index')}}" type="button">@lang('Cancel')</a>

    
                        <a href="{{previewServiceRoute($service)}}"><button class="btn service--btns btn-secondary float-left  mt-20 "  type="button">
                           Preview Service
                        </button> </a>
                        <button type="submit"
                            class="btn btn-save-continue btn-primary float-left mt-20 ">@lang('SAVE AND CONTINUE')</button>
                    </div>
                </div>

             
            </div>
        </div>
        {{-- </div> --}}
    </div>
</form>

<script>
function validPrice(){
    var title, titleLength;
    title=$('#extra_title').val();
    titleLength=title.length;
    console.log(titleLength);
    var prhour, prhourLength;
    prhour=$('#add_on_price').val();
    prhourLength=prhour.length;
    console.log(prhourLength);
    var delivery, deliveryLength;
    delivery=$('#add_on_delivery').val();
    deliveryLength=delivery.length;
    console.log(deliveryLength);
    if(titleLength>0 || prhourLength>0 || deliveryLength>0){
        $('#extra_title').prop('required',true);
        $('#add_on_price').prop('required',true);
        $('#add_on_delivery').prop('required',true);

    }
    if(titleLength < 1 && prhourLength < 1 && deliveryLength < 1){
        console.log("here inside");
        $('#extra_title').prop('required',false);
        $('#add_on_price').prop('required',false);
        $('#add_on_delivery').prop('required',false);
    }




}
</script>


