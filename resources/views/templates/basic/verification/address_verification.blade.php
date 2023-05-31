@extends($activeTemplate.'layouts.frontend')
@section('content')
<div class="identity-container-m">
    <ul class="process-tabs">
        <li>
            <a href="{{url('/verification')}}">
                <span class="tb-number">1</span>
                <p class="tb-description">Identity Verification</p>
                </a>
        </li>
        <li>
            <a href="{{url('/code-verification')}}">
                <span class="tb-number">2</span>
                <p class="tb-description">Code Verification</p>
                </a>
        </li>
        <li  class="active-c">
            <a href="{{url('/address-verification')}}">
                <span class="tb-number">3</span>
                <p class="tb-description">Address Verification</p>
                </a>
        </li>
    </ul>
</div>
<div class="btm-maincontainer">
<div class="btm-container-tabs">
<form>

<p class="tabs-heading">Address Verification</p>
<span class="hresis">Here is a list of some proof of address examples that are acceptable</span>
<ul class="cars-listing">
   <li> 1-  Valid Driver's License</li>
    <li>2-  Property Tax Receipt</li>
   <li> 3-  Posted Mail with name of applicant</li>
   <li> 4-  Utility Bill</li>
   <li> 5-  Insurance Card</li>
   <li> 6-  College Enrollment Papers</li>
   <li> 7-  Insurance policy or bill</li>
</ul>
<div class="documentype">
    <p class="lable-c">Document Type</p>
    <select name="country" id="country">>
        <option>Pakistan</option>
        <option>India</option>
        <option>China</option>
        <option>Tokyo</option>
        <option>Paris</option>
    </select>
</div>
{{-- <div class="form-group cstm-c">
    <input type="checkbox" id="css">
    <label for="css">File size must be between 10KB and 5000 KB in PDF, DOC</a></label>
  </div> --}}
  <input type="submit" value="Review & Submit" id="continue-btn">
</div>

</form>
</div>
@endsection


<style>
span.hresis {
    font-family: 'Mulish';
    font-style: normal;
    font-weight: 600;
    font-size: 16px;
    line-height: 20px;
    color: #808285;
    margin-bottom: 50px;
}
ul.cars-listing li {
    font-family: 'Mulish';
    font-style: normal;
    font-weight: 600;
    font-size: 16px;
    line-height: 20px;
    color: #808285;
    margin-bottom: 10px;
}
select#country {
    background: #FFFFFF;
    border: 1px solid #CBDFDF;
    border-radius: 4px;
    width: 100%;
    height: 37px;
    padding-left: 15px;
}
.documentype {
    margin-top: 56px;
}
.documentype select {
    margin-bottom: 40px;
}


 /*********/   
.btm-maincontainer {
    width: 100%;
    background: #F8FAFA;
    padding: 70px 0px 200px 0px;
    display: inline-block;
}
   ul.process-tabs {
    text-align: center;
    display: inline-block;
    width: 100%;
}
ul.process-tabs li {
    display: inline-block;
    font-family: 'Mulish';
    font-style: normal;
    font-weight: 600;
    font-size: 16px;
    line-height: 20px;
    color: #58A7A7;
    margin: 0px 3%;
    position: relative;
}
span.tb-number {
    width: 52px;
    height: 52px;
    /* left: 613px; */
    /* top: 149px; */
    background: #ECFCFC;
    border: 3px solid #8CC2C2;
    border-radius: 50%;
    padding-top: 13px;
    font-family: 'Mulish';
    font-style: normal;
    font-weight: 600;
    font-size: 16px;
    line-height: 20px;
    text-align: center;
    color: #8CC2C2;
    margin-bottom: 16px;
}
ul.process-tabs li:before {
    width: 82px;
    background: #8CC2C2;
    content: '';
    position: absolute;
    height: 2px;
    right: -79px;
    top: 24px;
}
ul.process-tabs li:last-child:before{
    display: none;
}
.identity-container-m {
    background: #F3F7F7;
    padding: 30px 0px 25px 0px;
}
ul.short-menu {
    display: none;
}
.btm-container-tabs {
    width: 890px;
    margin: 0px auto 0px;
    display: block;
}
p.tabs-heading {
    font-family: 'Mulish';
    font-style: normal;
    font-weight: 600;
    font-size: 20px;
    line-height: 25px;
    color: #000000;
    border-bottom: 1px solid #CBDFDF;
    padding-bottom: 18px;
    margin-bottom: 48px;
}

p.lable-c {
    font-family: 'Mulish';
    font-style: normal;
    font-weight: 500;
    font-size: 14px;
    line-height: 18px;
    color: #000000;
    margin-bottom: 12px;
    width: 100%;
    display: inline-block;
}
ul.tabs-form {
    width: 100%;
    display: inline-block;
}
ul.tabs-form li {
    width: 47%;
    float: left;
    margin: 0px 0%;
    display: inline-block;
    margin-bottom: 40px;
    margin-left: 6%;
}
ul.tabs-form li:nth-child(2n+1){
    margin-left: 0px;
}
ul.tabs-form li input {
    background: #FFFFFF;
    border: 1px solid #CBDFDF;
    border-radius: 4px;
    height: 37px;
}
ul.tabs-form li select {
    background: #FFFFFF;
    border: 1px solid #CBDFDF;
    border-radius: 4px;
    height: 37px;
    width: 100%;
}

ul.tabs-form li:nth-child(7), ul.tabs-form li:nth-child(8){
    width: 100%;
    margin-left: 0px !important;
}

.form-group {
  display: block;
  margin-bottom: 15px;
}

.form-group input {
  padding: 0;
  height: initial;
  width: initial;
  margin-bottom: 0;
  display: none;
  cursor: pointer;
}

.form-group label {
  position: relative;
  cursor: pointer;
  font-family: 'Mulish';
font-style: normal;
font-weight: 500;
font-size: 14px;
line-height: 18px;

/* identical to box height */

color: #000000;
}
.header-short-menu {
    color: #636060;
    border-bottom: 1px solid #e1e7ec;
    background: #f3f7f7;
}


.form-group label:before {
    content: '';
    -webkit-appearance: none;
    background-color: transparent;
    border: 2px solid #007F7F;
    /* box-shadow: 0 1px 2px rgb(0 0 0 / 5%), inset 0px -15px 10px -12px rgb(0 0 0 / 5%); */
    padding: 7px;
    display: inline-block;
    position: relative;
    vertical-align: middle;
    cursor: pointer;
    margin-right: 15px;
}

.form-group input:checked + label:after {
  content: '';
  display: block;
  position: absolute;
  top: 2px;
  left: 9px;
  width: 6px;
  height: 14px;
  border: solid #007F7F;
  border-width: 0 2px 2px 0;
  transform: rotate(45deg);
}
.cstm-c label a{
   color: #007F7F; 
}
input#continue-btn {
    width: 158.58px;
    height: 40px;
    /* left: 917px; */
    /* top: 1630px; */
    background: #7F007F;
    border-radius: 5px;
    color: #fff;
    float: right;
    padding-top: 7px;
}
.active-c span.tb-number {
    background: #007F7F;
    color: #fff;
}
.active-c p.tb-description {
    color: #007F7F;
}

/********Responsive********/
@media only screen and (max-width:1024px){
.btm-container-tabs{width: 100%;
padding:0px 3%;}
}
@media only screen and (max-width:767px){
    ul.tabs-form li{
        width: 100%;
        margin-left: 0px;
    }
    }
</style>

@push('script')

<script>
   'use strict';
   $('#defaultSearch').on('change', function() {
       this.form.submit();
   });
</script>


@endpush
