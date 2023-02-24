@extends($activeTemplate.'layouts.frontend')
@section('content')
<!---Inner NavBar Section Start--->
<div class="categories_type_container">  
    <ul class="text-center ul-margin">
        <li class="nav-item active">
            <a href="http://127.0.0.1:8000/service/?category_id=1&amp;category_name=Microservices">Microservices</a>
        </li>
        <li class="nav-item active">

            <a href="http://127.0.0.1:8000/service/?category_id=2&amp;category_name=Security">Security</a>
        </li>
        <li class="nav-item active">

            <a href="http://127.0.0.1:8000/service/?category_id=3&amp;category_name=Api Gateway">Api Gateway</a>
        </li>
    </ul>
</div>
<div class="container">
    <div class="secondsb-con"> 
        <p class="sbheading-c">All Support Tickets >  <strong>Create New Ticket</strong></p>
        
    </div>
    
     <div class="card-body" >
        <div class="row">
        
        <div class="form-group col-md-6">
            <label for="exampleInputEmail1">Fiull Name </label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">
           
          </div>

          <div class="form-group col-md-6">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            
          </div>
          <div class="form-group col-md-6">
            <label for="exampleInputEmail1">Subject </label>
            <input type="email" class="form-control back" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Subject">
           
          </div>

          <div class="form-group col-md-6">
            <label for="exampleInputEmail1">Priority</label>
            <select class="form-select form-select-sm form-control back" aria-label=".form-select-sm example">
                <option>Priority</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
            
          </div>
          
     </div>

        {{-- Required documents --}}
        <div class="row">
            <div class="col-xl-12 col-lg-12 form-group">
                <label>Required Documents</label>
            
                    <div id="dropzone">
                        <div class="dropzone needsclick dz-clickable" id="demo-upload" action="#">
                            
                            <div>
                                <div class="upload_icon_">
                                    <img src="http://127.0.0.1:8000/assets/images/frontend/job/upload.svg" alt="">
                                    <img src="http://127.0.0.1:8000/assets/images/frontend/job/arrow_up.svg" alt="" class="upload_inner_arrow_">
                                </div>
                            </div>
                            
                            <div class="dz-message "> 
                                Drag or Drop to Upload   
                                <span class="" style="color:#007F7F">
                                    Browse  
                                    
                                </span>
                            </div>

                        </div>
                    </div>
        
            </div>
        </div>
        
        <small class="allow-text">Allowed File Extensions: .jpg, .jpeg, .png, .doc, .docx</small>
         {{-- Cover Letter --}}
         <div class="form-group">
            <label for="cover_letter">Message</label>
            <textarea class="form-control cover-letter back" id="cover_letter" rows="20" cols="8" name="cover_letter" ></textarea>
         </div>
         <div class="comment-box">
           <input type="submit" value="Submit" class="btn-postcoment">
        </div>
        
     </div>


</div>

</section>


@endsection

@push('script-lib')

   <script src="{{asset('/assets/resources/templates/basic/frontend/js/dropzone.js')}}"></script>
   <script src="{{asset('/assets/resources/templates/basic/frontend/js/job-proposal.js')}}"></script>


@endpush
@push('style')

<link rel="stylesheet" href="{{asset('assets/resources/templates/basic/frontend/css/custom/job_proposal.css')}}">
<style>
    .back{
        background: #ffffff;
    }
  .categories_type_container {
    background: #F9F9F9;
    border-bottom: 1px solid #e1e7ec;
    padding: 6px 0px 10px 0px;
}
.allow-text{
    Weight:500
     Size:14px
Line:height:17.57px
}
.ul-margin li {
    font-weight: 600;
    font-size: 13px;
    line-height: 16px;
    color: #636060;
    display: inline-flex;
    margin: 0 2%;
}
.header-short-menu {
    padding: 10px 40px;
}
.sub-nav {
    width: 100.5%;
}
.sub-nav li {
    display: inline-table;
    margin: -21px 15px;
    font-size: 13px;
    font-weight: 600;
}
/***/
.secondsb-con{
    width:100%;
    display:inline-block;
    padding: 32px 0px;
}

p.sbheading-c {
    font-weight: 500;
    font-size: 20px;
    line-height: 25px;
    color: #007F7F;
    float: left;
    font-family: 'Mulish';
}
p.sbheading-c strong{
    color:#000000;
}
a.closeticket {
    width: 113px;
    height: 41px;
    /* left: 1130px; */
    /* top: 147px; */
    background: #007F7F;
    border: 1px solid #007F7F;
    border-radius: 6px;
    text-align: center;
    font-weight: 400;
    font-size: 14px;
    line-height: 18px;
    color: #FFFFFF;
    padding-top: 10px;
    float: right;
}
a.openbtn-s {
    width: 89px;
    height: 27px;
    /* left: 595px; */
    /* top: 154px; */
    background: #219A21;
    border-radius: 7px;
    text-align: center;
    font-family: 'Mulish';
    font-style: normal;
    font-weight: 700;
    font-size: 14px;
    line-height: 18px;
    padding-top: 4px;
    padding-left: 15px;
    position: relative;
    margin-left: 25px;
    color: #fff;
}
a.openbtn-s:before{
    width: 10px;
    height: 10px;
    border-radius: 50%;
    background: #ADE7AD;
    left: 16px;
    top: 8px;
    content: '';
    position: absolute;

}
.highbtn-s{
    background: #FF5C00 !important;
    width: 89px;
    height: 27px;
    border-radius: 7px;
    text-align: center;
    font-family: 'Mulish';
    font-weight: 700;
    font-size: 14px;
    line-height: 18px;
    padding-top: 4px;
    padding-left: 0px;
    position: relative;
    margin-left: 10px;
    color: #fff;
}
p.datec-s {
    float: right;
    font-family: 'Mulish';
    font-style: normal;
    font-weight: 500;
    font-size: 14px;
    line-height: 18px;
    color: #000000;
    padding-top: 12px;
    margin-right: 1%;
}
.userlist {
    width: 100%;
    display: inline-block;
    background: #F9FCFC;
    border-radius: 4px 4px 0px 0px;
    padding: 36px 44px 26px 90px;
    border-bottom: 1px solid #CBDFDF;

}
.userprofile {
    float: left;
    width: 55px;
    height: 55px;
    border-radius: 50%;
    position: relative;
}
p.username {
    font-family: 'Mulish';
    font-style: normal;
    font-weight: 600;
    font-size: 16px;
    line-height: 20px;
    color: #000000;
    float: left;
    margin-top: 15px;
    margin-left: 17px;
}
.userv{
    width: 100%;
    display: inline-block;
}
.userdetail {
    background: #1c6464;
    border-radius: 6px;
    width: 100%;
    display: block;
    font-family: 'Mulish';
    font-style: normal;
    font-weight: 400;
    font-size: 14px;
    line-height: 18px;

color: #000000;
}
.userdetail {
    background: #fff;
    border-radius: 6px;
    width: 100%;
    display: block;
    padding: 26px 24px;
    margin-left: 0%;
    margin-top: 21px;
}
p.time-d {
    font-weight: 600;
    font-size: 14px;
    line-height: 18px;
    color: #898989;
    float: right;
    font-family: 'Mulish';
    margin-top: 18px;
}

p.font-attach {
    float: left;
    font-family: 'Mulish';
    font-style: normal;
    font-weight: 600;
    font-size: 14px;
    line-height: 24px;
    color: #000000;
    margin-top: 15px;
}
input.attachment-file {
    width: 36%;
    border: none;
    float: left;
    display: inline-block;
}
span.attachment-file {
    float: left;
    margin-left: 25px;
    margin-top: 15px;
    font-family: 'Mulish';
    font-style: normal;
    font-weight: 400;
    font-size: 14px;
    line-height: 24px;
}
span.attachment-file img{
    margin-right: 10px;
}
p.comment-f {
    font-family: 'Mulish';
    font-style: normal;
    font-weight: 500;
    font-size: 14px;
    line-height: 18px;
    color: #000000;
    margin-top: 32px;
}
textarea.comment-box {
    border: 1px solid #CBDFDF;
    border-radius: 4px;
    height: 115px;
    font-family: 'Mulish';
    font-style: normal;
    font-weight: 400;
    font-size: 14px;
    line-height: 18px;
    color: #808285;
}
input.btn-postcoment {
    width: 120px;
    height: 40px;
    /* left: 1123px; */
    /* top: 1142px; */
    background: #7F007F;
    border-radius: 5px;
    text-align: center;
    color: #fff;
    font-size: 14px;
    font-family: 'Mulish';
    font-style: normal;
    font-weight: 600;
    font-size: 14px;
    line-height: 18px;
    padding: 0px;
    float: right;
    margin-top: 20px;
}
.comment-box{
    width: 100%;
    display: inline-block;
    padding-bottom: 30px;

}
a.btn-atach-m {
    border: 2px solid #007F7F;
    border-radius: 5px;
    width: 108px;
    height: 41px;
    text-align: center;
    font-family: 'Mulish';
    font-style: normal;
    font-weight: 600;
    font-size: 14px;
    line-height: 24px;
    text-align: center;
    color: #007F7F;
    padding-top: 6px;
    padding-left: 25px;
    background: url(/assets/images/job/attached.svg) no-repeat;
    background-position: 20px 12px;
    margin-top:20px;
}
.userlist:nth-child(2) .userprofile {
    margin-left: -65px;
}
.userprofile:after {
    position: absolute;
    width: 10px;
    height: 10px;
    background: green;
    content: '';
    border-radius: 50%;
    top: 40px;
    right: 0px;
}

@media only screen and (max-width:767px){
    .dz-message {
   
    position: relative;
    top: 22%;
    left: 0% !important;
}
.upload_inner_arrow_ {
    position: absolute;
    text-align: center !important;
    left: 48.2%;
}
    .userlist {
    padding: 36px 24px 26px 24px;
}
p.sbheading-c{
    font-size: 13px;
}
a.openbtn-s {
    width: 76px;
    font-size: 13px;
    float:right;
    margin-left: 14px;
}
.highbtn-s{
    float:right;
}
a.closeticket {
    width: 100px;
    height: 27px;
    padding-top: 3px;
    margin-top: 0px;
    float: right;
}
.userlist:nth-child(2) .userprofile {
    margin-left: -21px;
}

}
.upload_icon_ {
    position: absolute;
    left: 0%;
    right: 12%;
    top: 55%;
    bottom: 22%;
    text-align: center;
}
.upload_inner_arrow_ {
    position: absolute;
    top: 53%;
    bottom: 9.5%;
    right: 49.3%;
    text-align: center;
}


</style>


@endpush
@push('script')
   
@endpush
