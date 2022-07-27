@php
$softwareSteps = collect([]);
$extraSoftware = collect([]);

if (!empty($software)) {
    $extraSoftware = App\Models\ExtraSoftware::where('software_id', $software->id)->get();
    $softwareSteps = App\Models\softwareStep::where('software_id', $software->id)->get();
}
@endphp
<form role="form" action="{{ route('user.software.store.pricing') }}" class="user-pricing-form" method="POST"
    enctype="multipart/form-data">
    @csrf
    <div class="card-body">

        <div class="card-form-wrapper">
            <div class="row justify-content-center">
                <input type="hidden" name="software_id" value="{{ $software->id ?? '' }}">

                <div class="col-lg-4 form-group">
                    <label>@lang('Per Hour Rate')*</label>
                    <input type="number"  class="form-control" name="amount" id="price" step=".01"
                        value="{{ old('amount', floatval(@$software->price) ?: "Enter Price") }}"  placeholder="@lang('Enter Hours')"
                           >
                </div>
                <div class="col-lg-4 form-group">
                    <label>@lang('Estimated Delivery Time')*</label>
                    <input type="number" name="delivery_time" class="form-control"
                        value="{{ old('delivery_time', @$software->delivery_time) }}"
                        id="delivery"
                        placeholder="@lang('Enter Hours')"
                        min="0"
                    >

                </div>
                <div class=" col-lg-4">
                    <div class="form-group select2Tag">
                        <label>@lang('Deliverables')*</label>
                        <select class="form-control select2" data-placeholder="Enter Deliverables" name="deliverables[]" id="deliverables"
                            multiple="multiple">
                            {{-- <option selected="" disabled="" class="default-select">@lang('Tag1, Tag2, Tag3')</option> --}}

                            @if (!empty($software) && !empty($software->_decoded_deliverables()))
                                @foreach ($software->_decoded_deliverables() as $delivery)
                                    <option selected="true"> {{ $delivery }}</option>
                                @endforeach
                            @endif
                        </select><span class="del_error"></span>


                    </div>
                    <br />
                        <br />
                </div>

                <br />
                <br />
                <hr />
                {{-- <div class="col-lg-4 "> --}}

                <br />
                <br />
                <h4 class="hdng-create col-12">Add On Software</h4>
                <br />


                @if (!isset($extraSoftware) || $extraSoftware->isEmpty())
                    <div id="add-service-container">
                        <div class="row add-ons">
                            <div class="col-xl-4 col-lg-4 form-group">
                                <label>Title</label>
                                <input type="text" name="extra_title[]" id="extra_title" placeholder="Title" class="form-control add-on-title"
                                        />
                            </div>

                            <div class="col-xl-4 col-lg-4 form-group">
                                <label>@lang('Per Hour Rate')</label>
                                <input type="number" class="form-control add_on_price" name="add_on_price[]"
                                    placeholder="@lang('Per hour rate')" id="add_on_price" step=".01" >

                            </div>
                            <div class="col-xl-4 col-lg-4 form-group">
                                <label>@lang(' Estimated Delivery Time ')</label>
                                <div class="input-group mb-3">
                                    <input type="number" class="form-control add-on-delivery" id="add_on_delivery" name="add_on_delivery[]"
                                        placeholder="@lang('Enter Hours')">

                                </div>
                            <div id="delivery_error"></div>
                            </div>

                        </div>
                    </div>
                @else
                    @foreach ($extraSoftware as $exKey => $extra)
                        <div id="add-service-container">
                            <div class="row add-ons" id="add-on-service-row-{{ $exKey }}">
                                <div class="col-xl-4 col-lg-4 form-group">
                                    <label>Title *</label>
                                    <input type="text" name="extra_title[]" value="{{ $extra->title }}"
                                        placeholder="Title" class="form-control add-on-title">

                                </div>

                                <div class="col-xl-4 col-lg-4 form-group">
                                    <label>@lang('Per Hour Rate')*</label>
                                    <input type="number" class="form-control add_on_price" value="{{ floatval($extra->price) ?: 'Enter add on price' }}"
                                        name="add_on_price[]" placeholder="@lang('Per hour rate')"
                                        step=".01">
                                </div>
                                <div class="col-xl-3 col-lg-3 form-group">
                                    <label>@lang(' Delivery Days ')*</label>
                                        <input type="number" class="form-control add-on-delivery" value="{{ $extra->delivery ?: 'Enter delivery' }}"
                                            name="add_on_delivery[]" min="1" placeholder="@lang('Enter Days')">
                                </div>
                                <div class="col-xl-1 col-lg-1 " style="margin-top:2.4rem">
                                    <button type="button" class="btn btn-danger"
                                        onclick="removeAddOnRow($('#add-on-service-row-{{ $exKey }}'))"><i
                                            class="fa fa-trash"></i></button>
                                </div>
                            </div>
                        </div>
                    @endforeach

                @endif
                <div class="row">

                    <div class="col-12 form-group">
                        <button class="btn btn-primary" id="add-more-service" type="button"> ADD MORE</button>
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
                                @if (!isset($softwareSteps) || $softwareSteps->isEmpty())
                                    <label for="">Step Name*</label>
                                    <input type="text" name="steps[]" id="step" placeholder="E.g. Initial Requirements"
                                        class="form-control"     />
                                    <div>
                                        <label for="discription">Step Description*</label>
                                        <textarea type="text" name="description[]" id="discription" placeholder="This is a short description." class="form-control"
                                               ></textarea>
                                        <br />
                                        <br />
                                    </div>
                                @else
                                    @foreach ($softwareSteps as $softwareKey => $item)
                                        <div id="add-on-software-row-{{ $softwareKey }}">
                                            @if ($softwareKey != 0)
                                                <div style="float: right; margin-bottom:1rem">
                                                    <button type="button" class="btn btn-danger"
                                                        onclick="removeAddOnRow($('#add-on-software-row-{{ $softwareKey }}'))"><i
                                                            class="fa fa-trash"></i></button>
                                                </div>
                                            @endif
                                            <label for="">Step Name </label>
                                            <input type="text" name="steps[]" id="step" placeholder="E.g. Initial Requirements"
                                                class="form-control" value="{{ $item->name }}"     />
                                            <div class="mt-2">
                                                <label for="description">Step Description</label>
                                                <textarea type="text" name="description[]" id="description" placeholder="This is a short description." class="form-control"
                                                       >{{ $item->description ?? '' }}</textarea>
                                                <br />
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
                        <a class="stepwizard-step service--btns btn btn-secondary float-left  mt-20 w-100"
                            href="?view=step-1" type="button">@lang('BACK')</a>
                    </div>
                    <div class="col-md-6 text-right">
                        <button type="submit"
                            class="btn btn-save-continue btn-primary float-left mt-20 w-100">@lang('SAVE AND
                            CONTINUE')</button>
                    </div>
                </div>

            </div>
        </div>

    </div>
</form>
