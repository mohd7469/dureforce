<style>
    .stepwizard-step p {
        margin-top: 0px;
        color: #fff;
    }
    .btn-link{
        color: #007f7f !important;
        text-decoration:none !important;
    }
    .create-service-main .stepwizard-step {
        width: 16% !important;
    }
    .custom-card-body{

        margin-left: 20px !important;
        margin-right: 20px !important;

    }

    .custom-card-footer{

        margin-left: 12px !important;
        margin-right:12px !important;

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
        background: #007f7f !important;
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
        @if ($completedReview)
            <div class="stepwizard-step col-xs-3">
                <a href="#step-4" type="button" class="btn btn-default btn-circle {{ $completedProposal }}"
                    disabled="disabled">
                    <i class="fa fa-money-check-alt"></i>
                </a>
                <h6 class="m-0 py-1 service-step">Proposal</h6>
                <p></p>
            </div>
        @endif
        


        <div class="stepwizard-step col-xs-3">
            <a href="#step-5" type="button" class="btn btn-default btn-circle {{ $completedRequirements }}"
                disabled="disabled"> <i class="fa fa-list-ul"></i></a>
            <h6 class="m-0 py-1 service-step">Requirements</h6>
            <p></p>
        </div>
        <div class="stepwizard-step col-xs-3">
            <a href="#step-6" type="button" class="btn btn-default step-review btn-circle p-0 {{ $completedReview }}"
                disabled="disabled" >
                <figure>
                    <svg xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape" xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd" xmlns="http://www.w3.org/2000/svg" xmlns:svg="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 52 52" fill="none" version="1.1" id="svg16" sodipodi:docname="e3cc8dbec771d50fa49b45fb2fcd0fa4.svg">
                        <defs id="defs20"/>
                        <sodipodi:namedview id="namedview18" pagecolor="#ffffff" bordercolor="#666666"  borderopacity="1.0" inkscape:pageshadow="2" inkscape:pageopacity="0.0" inkscape:pagecheckerboard="0"/>
                        <!-- <circle cx="26" cy="26" r="24.5" fill="#ecfcfc" stroke="#8cc2c2" stroke-width="3" id="circle2"/> -->
                        <rect x="20" y="18" width="18" height="2.1428599"  rx="1.07143" fill="#8cc2c2" id="rect4"/>
                        <path d="m 16.3546,17.1469 c 0.0466,0.0464 0.0835,0.1016 0.1087,0.1624 0.0253,0.0607 0.0382,0.1258 0.0382,0.1916 0,0.0658 -0.0129,0.1309 -0.0382,0.1916 -0.0252,0.0608 -0.0621,0.1159 -0.1087,0.1624 l -3,3 c -0.0464,0.0466 -0.1016,0.0835 -0.1623,0.1087 -0.0608,0.0252 -0.1259,0.0382 -0.1917,0.0382 -0.0657,0 -0.1309,-0.013 -0.1916,-0.0382 -0.0607,-0.0252 -0.1159,-0.0621 -0.1624,-0.1087 l -1.5,-1.5 C 11.1001,19.3084 11.0633,19.2532 11.0381,19.1925 11.0129,19.1317 11,19.0666 11,19.0009 c 0,-0.0658 0.0129,-0.1309 0.0381,-0.1916 0.0252,-0.0607 0.062,-0.1159 0.1085,-0.1624 0.0465,-0.0465 0.1017,-0.0834 0.1624,-0.1085 0.0608,-0.0252 0.1259,-0.0381 0.1916,-0.0381 0.0658,0 0.1309,0.0129 0.1916,0.0381 0.0608,0.0251 0.1159,0.062 0.1624,0.1085 l 1.146,1.147 2.646,-2.647 C 15.6931,17.1003 15.7483,17.0634 15.809,17.0382 15.8697,17.013 15.9349,17 16.0006,17 c 0.0658,0 0.1309,0.013 0.1917,0.0382 0.0607,0.0252 0.1159,0.0621 0.1623,0.1087 z" fill="#8cc2c2" id="path6"/>
                        <path d="m 16.3546,25.1469 c 0.0466,0.0464 0.0835,0.1016 0.1087,0.1624 0.0253,0.0607 0.0382,0.1258 0.0382,0.1916 0,0.0658 -0.0129,0.1309 -0.0382,0.1916 -0.0252,0.0608 -0.0621,0.1159 -0.1087,0.1624 l -3,3 c -0.0464,0.0466 -0.1016,0.0835 -0.1623,0.1087 -0.0608,0.0252 -0.1259,0.0382 -0.1917,0.0382 -0.0657,0 -0.1309,-0.013 -0.1916,-0.0382 -0.0607,-0.0252 -0.1159,-0.0621 -0.1624,-0.1087 l -1.5,-1.5 C 11.1001,27.3084 11.0633,27.2532 11.0381,27.1925 11.0129,27.1317 11,27.0666 11,27.0009 c 0,-0.0658 0.0129,-0.1309 0.0381,-0.1916 0.0252,-0.0607 0.062,-0.1159 0.1085,-0.1624 0.0465,-0.0465 0.1017,-0.0834 0.1624,-0.1085 0.0608,-0.0252 0.1259,-0.0381 0.1916,-0.0381 0.0658,0 0.1309,0.0129 0.1916,0.0381 0.0608,0.0251 0.1159,0.062 0.1624,0.1085 l 1.146,1.147 2.646,-2.647 C 15.6931,25.1003 15.7483,25.0634 15.809,25.0382 15.8697,25.013 15.9349,25 16.0006,25 c 0.0658,0 0.1309,0.013 0.1917,0.0382 0.0607,0.0252 0.1159,0.0621 0.1623,0.1087 z" fill="#8cc2c2" id="path8"/>
                        <path d="m 16.3546,33.1469 c 0.0466,0.0464 0.0835,0.1016 0.1087,0.1624 0.0253,0.0607 0.0382,0.1258 0.0382,0.1916 0,0.0658 -0.0129,0.1309 -0.0382,0.1916 -0.0252,0.0608 -0.0621,0.1159 -0.1087,0.1624 l -3,3 c -0.0464,0.0466 -0.1016,0.0835 -0.1623,0.1087 -0.0608,0.0252 -0.1259,0.0382 -0.1917,0.0382 -0.0657,0 -0.1309,-0.013 -0.1916,-0.0382 -0.0607,-0.0252 -0.1159,-0.0621 -0.1624,-0.1087 l -1.5,-1.5 C 11.1001,35.3084 11.0633,35.2532 11.0381,35.1925 11.0129,35.1317 11,35.0666 11,35.0009 c 0,-0.0658 0.0129,-0.1309 0.0381,-0.1916 0.0252,-0.0607 0.062,-0.1159 0.1085,-0.1624 0.0465,-0.0465 0.1017,-0.0834 0.1624,-0.1085 0.0608,-0.0252 0.1259,-0.0381 0.1916,-0.0381 0.0658,0 0.1309,0.0129 0.1916,0.0381 0.0608,0.0251 0.1159,0.062 0.1624,0.1085 l 1.146,1.147 2.646,-2.647 C 15.6931,33.1003 15.7483,33.0634 15.809,33.0382 15.8697,33.013 15.9349,33 16.0006,33 c 0.0658,0 0.1309,0.013 0.1917,0.0382 0.0607,0.0252 0.1159,0.0621 0.1623,0.1087 z" fill="#8cc2c2" id="path10"/>
                        <rect x="20" y="26" width="14.4" height="2.1428599" rx="1.07143" fill="#8cc2c2" id="rect12"/>
                        <rect x="20" y="34" width="12.6" height="2.1428599" rx="1.07143" fill="#8cc2c2" id="rect14"/>
                    </svg>
                </figure>
            </a>
            <h6 class="m-0 py-1 service-step">Review</h6>
            <p></p>
        </div>
    </div>
</div>
