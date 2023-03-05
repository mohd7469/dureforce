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
                <input type="hidden" name="number_of_add_on_services" value="{{ count($extraService) }}" id="number_of_add_on_services">


                <div class="col-lg-4 form-group">
                    <label>@lang('Per Hour Rate')*</label>
                    <input type="number" step="any"  class="form-control" name="price"  id="price"  oninput="this.value = Math.abs(this.value)"
                        value="{{ old('price',  floatval(@$service->rate_per_hour) ?: "Enter per hour rate") }}" placeholder="@lang('Enter Eg. $50')"
                       min="0" >
                </div>
                <div class="col-lg-4 form-group">
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
                            
                            @if (!empty($service))
                                @foreach ($deliverables as  $item )
                                    <option value="{{ $item->id }}" @if(in_array($item->id,$service->deliverable->pluck('id')->toArray())) selected @endif>
                                        {{ __($item->name) }}</option>
                                @endforeach
                            @else
                                @foreach($deliverables as  $item)
                                    <option value="{{__($item->id)}}">{{__($item->name)}}</option>
                                @endforeach
                            @endif
                           
                        
                        </select>
                        <span class="del_error"></span>
                    </div>
                    <br />
                    
                </div>

               
                <br />
                <h4 class="hdng-create col-12">Add On Service</h4>
                <br />

                @if(count($extraService)>0)

                    @foreach ($extraService as $exKey => $extra)
                        <div id="add-service-container">
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
                    
                @else
                    <div id="add-service-container">

                        <div class="row add-ons">

                            <div class="col-xl-4 col-lg-4 form-group">
                                <label>Title</label>
                                <input type="text" name="service_add_ons[0][title]" placeholder="Title" id="extra_title" class="form-control add-on-title"/>
                            </div>

                            <div class="col-xl-4 col-lg-4 form-group">
                                <label>@lang('Per Hour Rate')</label>
                                <input type="number" class="form-control add_on_price" step="any"  name="service_add_ons[0][rate_per_hour]"
                                    placeholder="@lang('Per hour rate')" id="add_on_price" oninput="this.value = Math.abs(this.value)" >
                            </div>

                            <div class="col-xl-4 col-lg-4 form-group">
                                <label>@lang(' Estimated Delivery Time ')</label>
                                    <input type="number" step="any" class="form-control add-on-delivery" id="add_on_delivery" name="service_add_ons[0][estimated_delivery_time]"
                                    placeholder="@lang('Enter Hours')" oninput="this.value = Math.abs(this.value)">
                            </div>
                        </div>

                    </div>

                @endif

                <div class="row">

                    <div class="col-12 form-group">
                        <button class="btn btn-primary" id="add-more-service" type="button"> ADD
                            MORE</button>
                    </div>
                </div>
                <hr>

                <h4 class="hdng-create">Project Steps</h4>
                <br>
                <p class="msg-create">List the steps involved in delivering your project</p>
                <div class="row">
                    <div class="col-lg-12 ">
                        <div class="row" id="step-rows">
                            <div class="col-xl-12 col-lg-12 form-group p-0">
                                <p id="derror"></p>
                                @if (!isset($serviceSteps) || $serviceSteps->isEmpty())
                                    <label for="" class="d-inline-block">Step Name *</label>
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
                                        class="form-control step"
                                          />
                                    <div>
                                        <label for="discription">Step Description*</label>
                                        <textarea type="text" name="description[]" id="discription" placeholder="This is a short description."
                                            class="form-control description"></textarea>

                                        <br />
                                        <br />
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
                                            <label for="">Step Name *</label>
                                            <input type="text" name="steps[]"
                                                id="step-first"
                                                placeholder="E.g. Initial Requirements" class="form-control step"
                                                value="{{ $item->name }}" />
                                            <div class="mt-2">
                                                <label for="description">Step Description * </label>
                                                <textarea type="text" name="description[]" id="discription-first" placeholder="This is a short description." class="form-control description">{{ $item->description ?? '' }}</textarea>
                                                <br />
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <span class="add-new-row" style="cursor: pointer" onclick="addSteps()">
                            Add Another
                        </span>
                        <br />
                        <br />
                    </div>
                </div>

                <hr>
                <div class="row">
                    <div class="col-md-6 ">
                        <a class="btn service--btns btn-back btn-secondary float-left  mt-20 w-100"
                            href="?view=step-1">@lang('BACK')</a>
                    </div>
                    <div class="col-md-6 text-right">
                        <a class="stepwizard-step service--btns btn btn-secondary float-left  mt-20 w-100" href="{{route('user.service.index')}}" type="button">@lang('Cancel')</a>

    
                        <a href="{{previewServiceRoute($service)}}"><button class="btn service--btns btn-secondary float-left  mt-20 w-100"  type="button">
                           Preview Service
                        </button> </a>
                        <button type="submit"
                            class="btn btn-save-continue btn-primary float-left mt-20 w-100">@lang('SAVE AND CONTINUE')</button>
                    </div>
                </div>

            </div>
        </div>
        {{-- </div> --}}
    </div>
</form>


