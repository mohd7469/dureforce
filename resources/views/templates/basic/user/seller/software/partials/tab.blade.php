<style>
    .stepwizard-step p {
        margin-top: 0px;
        color: #fff;
    }
    .create-service-main .stepwizard-step {
        width: 16% !important;
    }
    .stepwizard-row {
        display: table-row;
    }

    .stepwizard {
        display: table;
        width: 100%;
        position: relative;
    }

    .stepwizard-step button[disabled] {
        /*opacity: 1 !important;
    filter: alpha(opacity=100) !important;*/
    }

    .stepwizard .btn.disabled,
    .stepwizard .btn[disabled],
    .stepwizard fieldset[disabled] .btn {
        opacity: 1 !important;
        color: #fff;
    }

    .stepwizard-row:before {
        top: 14px;
        bottom: 0;
        position: absolute;
        content: " ";
        width: 100%;
        height: 1px;
        background-color: transparent;
        z-index: 0;
    }

    .stepwizard-step {
        display: table-cell;
        text-align: center;
        position: relative;
    }

    .btn-circle {
        width: 30px;
        height: 30px;
        text-align: center;
        padding: 6px 0;
        font-size: 12px;
        line-height: 1.428571429;
        border-radius: 15px;
    }

    .completed {
        background: green !important;
        border-color: green !important;
    }

</style>

<div class="stepwizard">
    <div class="stepwizard-row setup-panel">
        <div class="stepwizard-step col-xs-3">
            <a href="#step-1" type="button" class="btn btn-success btn-circle {{ $completedOverview }}"><i
                    class="fa fa-pen"></i></a>
            <h6 class="m-0 py-1 service-step">Overview</h6>
            <p class="mr-5"></p>
        </div>
        <div class="stepwizard-step col-xs-3">
            <a href="#step-2" type="button" class="btn btn-default btn-circle {{ $completedPricing }}"
                disabled="disabled"><i class="fa fa-dollar-sign"></i></a>
            <h6 class="m-0 py-1 service-step">Pricing & Deliverables</h6>
            <p></p>
        </div>
        <div class="stepwizard-step col-xs-3">
            <a href="#step-3" type="button" class="btn btn-default btn-circle {{ $completedBanner }}"
                disabled="disabled">
                <i class="fa fa-image"></i>
            </a>
            <h6 class="m-0 py-1 service-step">Banner</h6>
            <p></p>
        </div>
        
        <div class="stepwizard-step col-xs-3">
            <a href="#step-4" type="button" class="btn btn-default btn-circle {{ $completedRequirements }}"
                disabled="disabled"> <i class="fa fa-money-check-alt"></i></a>
            <h6 class="m-0 py-1 service-step">Proposal</h6>
            <p></p>
        </div>

        <div class="stepwizard-step col-xs-3">
            <a href="#step-5" type="button" class="btn btn-default btn-circle {{ $completedRequirements }}"
                disabled="disabled"> <i class="fa fa-list"></i></a>
            <h6 class="m-0 py-1 service-step">Requirements</h6>
            <p></p>
        </div>
        <div class="stepwizard-step col-xs-3">
            <a href="#step-6" type="button" class="btn btn-default step-review btn-circle {{ $completedReview }}"
                disabled="disabled"><i class="fa fa-list"></i></a>
            <h6 class="m-0 py-1 service-step">Review</h6>
            <p></p>
        </div>
    </div>
</div>
