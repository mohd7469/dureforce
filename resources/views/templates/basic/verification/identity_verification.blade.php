@extends($activeTemplate.'layouts.frontend')
@section('content')
<div class="identity-container-m">
    <ul class="process-tabs">
        <li>
            <span class="tb-number">1</span>
            <p class="tb-description">Identity Verification</p>
        </li>
        <li>
            <span class="tb-number">2</span>
            <p class="tb-description">Code Verification</p>
        </li>
        <li>
            <span class="tb-number">3</span>
            <p class="tb-description">Address Verification</p>
        </li>
    </ul>
</div>
<div class="btm-maincontainer">
<div class="btm-container-tabs">
<form>

<p class="tabs-heading">Identity Verification</p>

<ul class="tabs-form">
    <li>
        <p class="lable-c">First Name</p>
        <input type="text" placeholder="Amna">
    </li>
    <li>
        <p class="lable-c">Last Name </p>
        <input type="text" placeholder="Amna">
    </li>
    <li>
        <p class="lable-c">Date of Brith</p>
        <input type="text" placeholder="Amna">
    </li>
    <li>
        <p class="lable-c">Country</p>
        <select name="country" id="country">>
            <option>Pakistan</option>
            <option>India</option>
            <option>China</option>
            <option>Tokyo</option>
            <option>Paris</option>
        </select>
    </li>
    <li>
        <p class="lable-c">State</p>
        <select name="State" id="State">>
            <option>New York</option>
            <option>New York</option>
            <option>New York</option>
            <option>New York</option>
            <option>New York</option>
        </select>
    </li>
    <li>
        <p class="lable-c">City</p>
        <select name="City" id="City">>
            <option>Lahore</option>
            <option>Karachi</option>
            <option>Multan</option>
        </select>
    </li>
    <li>
        <p class="lable-c">Address line  1</p>
        <input type="text">
    </li>
    <li>
        <p class="lable-c">Address line  2</p>
        <input type="text">
    </li>
</ul>

<p class="tabs-heading">ID Information</p>

<ul class="tabs-form">
    <li>
        <p class="lable-c">ID Type</p>
        <select name="ID Type" id="ID Type">>
            <option>Dummy</option>
            <option>Dummy</option>
            <option>Dummy</option>
            <option>Dummy</option>
            <option>Dummy</option>
        </select>
    </li>
    <li>
        <p class="lable-c">Issuing Country </p>
        <select name="Issuing Country " id="Issuing Country ">>
            <option>China</option>
            <option>New York</option>
            <option>India</option>
            <option>Iran</option>
            <option>Iraq</option>
        </select>
    </li>
    <li>
        <p class="lable-c">ID Number</p>
        <input type="text">
    </li>
    <li>
        <p class="lable-c">ID Expiry Date  </p>
        <input type="text">
    </li>
</ul>
<div class="form-group cstm-c">
    <input type="checkbox" id="css">
    <label for="css">Yes, I understand and agree to the <a href="#">DF Terms of Service & Privacy Policy.</a></label>
  </div>
  <input type="submit" value="Continue" id="continue-btn">
</div>

</form>
</div>
@endsection


<style>
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
    width: 150.58px;
    height: 40px;
    /* left: 917px; */
    /* top: 1630px; */
    background: #7F007F;
    border-radius: 5px;
    color: #fff;
    float: right;
    padding-top: 7px;
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
