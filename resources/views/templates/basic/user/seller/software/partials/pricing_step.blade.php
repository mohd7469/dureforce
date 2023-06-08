@php
    $softwareSteps = collect([]);
    $software_modules = collect([]);

    if (!empty($software)) {
        $software_modules = \App\Models\Software\SoftwareStep::where('software_id', $software->id)->get();
        $softwareSteps = \App\Models\SoftwareProvidingStep::where('software_id', $software->id)->get();
    }
@endphp
<form role="form" action="{{ route('user.software.store.pricing') }}" class="user-pricing-form" method="POST"
      enctype="multipart/form-data">
    @csrf
    <div class="card-body">
        <div class="card-form-wrapper">
            
            <div class="row justify-content-center">
                
                <input type="hidden" name="software_id" value="{{ $software->id ?? '' }}">
                <input type="hidden" name="number_of_software_modules" value="{{ count($software_modules) }}" id="number_of_software_modules">
                
                <div class="col-lg-4 ">
                    <label>@lang('Starting From Price (Base Software)')*</label>
                    <input type="number" class="form-control" name="price" id="price" step="any"
                           value="{{ old('amount', floatval(@$software->price) ? : "Enter Price") }}"
                           placeholder="@lang('E.g. $550')"
                           
                           oninput="this.value = Math.abs(this.value)"
                    >
                </div>

                <div class="col-lg-4">
                    <label>@lang('Estimated Lead Time (Base Software)')*</label>
                    <input type="number" name="delivery_time" class="form-control"
                           value="{{ old('delivery_time', @$software->estimated_lead_time) }}"
                           id="delivery"
                           placeholder="@lang('Enter Hours')"
                           min="0"
                           oninput="this.value = Math.abs(this.value)"
                    >

                </div>

                <div class=" col-lg-4 ">

                    <div class=" select2Tag">
                        <label>@lang('Deliverables')*</label>
                        
                        <select class="form-control select2 select2-hidden-accessible " multiple="" data-placeholder="Select Deliverables" style="width: 100%;" tabindex="-1" aria-hidden="true" name="deliverables[]" id="deliverables">
                            
                            @if (!empty($software))
                                @foreach ($deliverables as  $item )
                                    <option value="{{ $item->id }}" @if(in_array($item->id,$software->deliverable->pluck('id')->toArray())) selected @endif>
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
                   
                </div>
                
                <hr>

               <div class="col-md-12 col-sm-12 col-xs-12 ">
                    <h4 class="hdng-create col-12">Software Module</h4>
                     <label>@lang('List the modules that are part of your software.')*</label>
               </div>
               
                <div class="col-xl-12 col-lg-12 mt-1">
                    <input type="hidden" value="{{$software_module_titles->toJson()}}" id="modules">
                    @if (!isset($software_modules) || $software_modules->isEmpty())
                        
                        <div id="add-service-container">
                            <div class="row software-module mt-2" id="software-module-row-0">
                                
                                <div class="col-md-12 col-lg-12  col-sm-12 col-xs-12 mt-2">
                                    
                                    <label for="">Module Title*<small class="text text-primary ml-2 swap" >(switch to add manual title) </small></label>
                                    <select name="module_title[]" id="" class="form-control module-title" >
                                        
                                        <option value=""> Select Module Title</option>
                                        @foreach ($software_module_titles as $item)
                                            <option value="{{$item->title}}" data-description="{{$item->description}}">{{$item->title}}</option>
                                        @endforeach

                                    </select>

                                </div>
                               
                                <div class="col-md-12 col-lg-12  col-sm-12 col-xs-12 mt-2">
                                
                                    <label for="discription" >Module Description</label>
                                    <textarea type="text" name="module_description[]" id="discription"
                                            placeholder="This is a short description." class="form-control module-description"
                                    ></textarea>
                                
                                </div>

                                <div class="col-xl-6 col-lg-6 col-sm-12 col-xs-12 form-group">
                                    <label>@lang('Starting From Price')*</label>
                                    <input type="number" class="form-control module_price" name="module_price[]"
                                           placeholder="@lang('E.g. $100')" id="module_price" step="any">

                                </div>

                                <div class="col-xl-6 col-lg-6 col-sm-12 col-xs-12 form-group">
                                    <label>@lang('Estimated Lead Time')*</label>
                                        <input type="number" class="form-control module-delivery" id="module_delivery"
                                               name="module_delivery[]"
                                               placeholder="@lang('Enter Hours')">

                                    
                                    
                                </div>

                            </div>
                        </div>

                    @else
                        @foreach ($software_modules as $exKey => $module)
                            
                            <div id="add-service-container">
                                
                                <div class="row software-module" id="add-on-service-row-{{ $exKey }}">
                                    
                                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 form-group">
                                        <label>Module Title* <small class="text text-primary ml-2 swap" >({{$module->is_manual_title ? 'switch to select title' : 'switch to add manual title'}} ) </small></label>
                                        @if ($module->is_manual_title)
                                            <input type="text" name="module_title[]" id="" value="{{$module->name}}" class="form-control module-title" >
                                        @else
                                            <select name="module_title[]" id="" class="form-control module-title">
                                                <option value=""> Select Module Title</option>
                                                @foreach ($software_module_titles as $item)
                                                    <option value="{{$item->title}}" {{$module->name==$item->title ? 'selected' : '' }}>{{$item->title}}</option>
                                                @endforeach
                                            </select>
                                        @endif
                                        
                                    </div>

                                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 mt-2 mt-2">
                                
                                        <label for="discription" >Module Description</label>
                                        <textarea type="text" name="module_description[]" id="discription"
                                                placeholder="This is a short description." class="form-control module-description"
                                                
                                        >{{$module->description}}</textarea>
                                    
                                    </div>

                                    <div class="col-md-6 col-xl-6 col-lg-6 col-sm-12 form-group">
                                        <label>@lang('Starting From Price')*</label>
                                        <input type="number" class="form-control module_price"
                                               value="{{ floatval($module->start_price) ?: 'Enter add on price' }}"
                                               name="module_price[]" placeholder="@lang('E.g $100')"
                                               step="any">
                                    </div>

                                    <div class="{{$exKey>0 ?'col-xl-5 col-lg-5 col-md-5 col-sm-11' : 'col-md-6 col-xl-6 col-lg-6'}} form-group">
                                        <label>@lang(' Estimated Lead Time')*</label>
                                        <input type="number" class="form-control module-delivery"
                                               value="{{ $module->estimated_lead_time ?: 'Enter delivery' }}"
                                               name="module_delivery[]" min="1" placeholder="@lang('Enter Days')">
                                    </div>
                                    @if($exKey>0)
                                        <div class="col-xl-1 col-lg-1 " style="margin-top:2.4rem">
                                            <button type="button" class="btn btn-danger"
                                                    onclick="removeAddOnRow($('#add-on-service-row-{{ $exKey }}'))"><i
                                                        class="fa fa-trash"></i></button>
                                        </div>
                                    @endif

                                </div>

                            </div>

                        @endforeach

                    @endif
                    
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 m-0 p-0" >
                        <button class="btn btn-primary mt-0 add-another" id="add-more-service" type="button" >Add Another</button>
                    </div>
                    <hr>

                   
                    <div class="accordion" id="accordionExample" >

                        <div class="card">

                            <div class="card-header" id="headingOne">

                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button"  data-target="#collapseOne" aria-controls="collapseOne">
                                        Software Providing Steps
                                    </button>
                                </h2>

                            </div>
                      
                          <div id="collapseOne" class="collapsing" aria-labelledby="headingOne" data-parent="#accordionExample">
                                
                                <div >
                            
                                    <div class="col-lg-12 ">
                                        
                                        <div  id="step-rows" class="custom-card-body">
                                            <p class="msg-create">List the steps involved in delivering your project.</p>

                                            <div class="col-xl-12 col-lg-12 form-group p-0 mt-2">
                                                @if (!isset($softwareSteps) || $softwareSteps->isEmpty())
                                                    <label for="">Step Name</label>
                                                    <input type="text" name="steps[]" id="step"
                                                           placeholder="E.g. Initial Requirements"
                                                           class="form-control"/>
                                                    <div class="mt-2">
                                                        <label for="discription">Step Description</label>
                                                        <textarea type="text" name="description[]" id="discription"
                                                                  placeholder="This is a short description."
                                                                  class="form-control"
                                                        ></textarea>
                                                      
                                                      
                                                    </div>
                                                @else
                                                    @foreach ($softwareSteps as $softwareKey => $item)
                                                        <div id="add-on-software-row-{{ $softwareKey }}">
                                                            @if ($softwareKey != 0)
                                                                <div style="float: right; margin-bottom:1rem">
                                                                    <button type="button" class="btn btn-danger"
                                                                            onclick="removeAddOnRow($('#add-on-software-row-{{ $softwareKey }}'))">
                                                                        <i
                                                                                class="fa fa-trash"></i></button>
                                                                </div>
                                                            @endif
                                                            <label for="">Step Name </label>
                                                            <input type="text" name="steps[]" id="step"
                                                                   placeholder="E.g. Initial Requirements"
                                                                   class="form-control" value="{{ $item->name }}"/>
                                                            <div class="mt-2">
                                                                <label for="description">Step Description</label>
                                                                <textarea type="text" name="description[]" id="description"
                                                                          placeholder="This is a short description."
                                                                          class="form-control"
                                                                >{{ $item->description ?? '' }}</textarea>
                                                               
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                        <div class="custom-card-body">
                                            <span class="add-new-row  mt-0 add-another"  style="cursor: pointer" onclick="addSteps()">
                                                Add Another
                                            </span>
                                        </div>
                                        
                                       
                                    </div>
        
                                </div>
                          </div>
                          
                        </div>
                        
                    </div>

                    <div class="col-xl-12 col-lg-12 col-md-12 form-group m-2">
                
                      

                        <div class="row">
                            
                            <div class="col-md-6 m-0 p-0">
                                <a class="stepwizard-step service--btns btn btn-secondary float-left  mt-20 w-100"
                                   href="?view=step-1" type="button">@lang('BACK')</a>
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

            </div>
        </div>
    </div>
</form>
