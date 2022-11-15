@extends($activeTemplate.'layouts.master')
@section('content')
<!---Inner NavBar Section Start--->
<section>
<div class="container">
    <div class="secondsb-con"> 
        <p class="sbheading-c">All Support Tickets >  <strong> Create New Ticket</strong></p>
        
    </div>
    <hr>
    
     <div class="card-body" >
         <form  action="{{route('ticket.store')}}" method="POST"  id="support_ticket_form" enctype="multipart/form-data">
             @csrf
        <div class="row">

        <div class="form-group col-md-6">
            <label for="exampleInputEmail1">Full Name </label>
            <input type="text" class="form-control"  disabled aria-describedby="emailHelp" placeholder="{{$user->first_name}} {{$user->last_name}}">
           
          </div>

          <div class="form-group col-md-6">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control"  disabled aria-describedby="emailHelp" placeholder="{{$user->email}}">
            
          </div>
          <div class="form-group col-md-6">
            <label for="exampleInputEmail1">Subject*</label>
            <input type="text" class="form-control back" name="subject"  aria-describedby="emailHelp" placeholder="Subject">
           
          </div>

          <div class="form-group col-md-6">
            <label for="exampleInputEmail1">Priority*</label>
            <select class="form-select form-select-sm form-control back" name="priority_id" aria-label=".form-select-sm example">
                <option>Priority</option>
                @foreach($priorities as $priority)
                <option value="{{$priority->id}}">{{$priority->name}}</option>
                @endforeach
              </select>
            
          </div>
          
     </div>

        {{-- Required documents --}}
        <div class="form-group">
            <label>@lang('Required Documents')</label>
         
               <div id="dropzone">
                  <div class="dropzone needsclick" id="demo-upload" action="#" >
                     <div class="fallback">
                           <input name="file" type="file" multiple />
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
                    Attachments Guideline: You may attach up to 10 files under the size of 25MB each. Include work samples or other documents to support your application. 
                    Do not attach your résumé — your Dureforce profile is automatically forwarded to the client with your job.
                </small>
      
         </div>
        
        <small class="allow-text">Allowed File Extensions: .jpg, .jpeg, .png, .doc, .docx</small>
         {{-- Cover Letter --}}
         <div class="form-group">
            <label for="cover_letter">Message*</label>
            <textarea class="form-control cover-letter back" id="cover_letter" rows="20" cols="8" name="message" ></textarea>
         </div>
         <div class="comment-box">
           <input type="submit" value="Submit" class="btn-postcoment" id="create-ticket-btn">
        </div>
         </form>
     </div>


</div>

</section>


@endsection

@push('script-lib')

   <script src="{{asset('/assets/resources/templates/basic/frontend/js/dropzone.js')}}"></script>
   <script src="{{asset('/assets/resources/templates/basic/frontend/js/support-ticket.js')}}"></script>

@endpush

@push('style')

<style>
    .back{
        background: #ffffff;
    }
    .dz-message {

text-align: center !important;
position: relative;
left:5%
}

.upload_icon{
position: absolute;
left: 8%;
right: 0%;
top: 77%;
bottom: 22%;
text-align: center;

}
.upload_inner_arrow{

position: absolute;
top: 40.12%;
bottom: 4.5%;
right: 49.38%;
text-align: center;
}
    .dropzone {
    
    background: white;
    border-radius: 5px;
    height: 121px;
    border: 2px dashed #CBDFDF;
    border-image: none;
    min-height: 126px;
    margin-left: auto;
    margin-right: auto;

}
    .dropzone .dz-preview .dz-details {
    z-index: 20;
    position: absolute;
    top: 0;
    left: 0;
    opacity: 0;
    font-size: 11px !important;
    min-width: 100%;
    max-width: 100%;
    padding: 2em 1em;
    text-align: center;
    color: rgba(0,0,0,.9);
    line-height: 150%;
}

.dropzone .dz-preview .dz-image {
    border-radius: -51px;
    overflow: hidden;
    width: 64px;
    height: 63px;
    position: relative;
    display: list-item;
    z-index: 10;
    margin-left: 5px;
    margin-top: -19px;
    margin-bottom: 19px;
}

.dropzone .dz-preview .dz-details {
    z-index: 20;
    top:-7px !important;
    left: 0;
    opacity: 1 !important;
    font-size: 11px !important;
    min-width: 100%;
    max-width: 100%;
    padding: 1em 1em;
    text-align: center;
    color: rgba(0,0,0,.9);
    line-height: 135%;
}

.dropzone .dz-preview .dz-remove {
    font-size: 14px;
    text-align: center;
    display: block;
    cursor: pointer;
    border: none;
}
.dropzone .dz-preview .dz-details .dz-size {
    margin-bottom: 1em;
    font-size: 14px;
}
.dropzone .dz-preview {
    position: relative;
    display: inline-block;
    vertical-align: top;
    margin: 5px;
    min-height: 100px;
}
.dropzone .dz-preview .dz-success-mark, .dropzone .dz-preview .dz-error-mark {
    pointer-events: none;
    opacity: 0;
    z-index: 391;
    position: absolute;
    display: block;
    top: 50%;
    left: 50%;
    margin-left: -27px;
    margin-top: -41px;

}

.dropzone .dz-preview .dz-progress {
    opacity: 0;
}

.dropzone .dz-preview.dz-file-preview .dz-image {
    border-radius: 10px;
    top: 20px;
    background: #999;
    background: linear-gradient(to bottom, #eee, #ddd);
}
.dropzone .dz-preview .dz-details .dz-filename:not(:hover) {
    overflow: hidden;
    text-overflow: ellipsis;
}
.dropzone .dz-preview .dz-details .dz-filename {
    white-space: nowrap;
}

.dropzone.dz-clickable * {
    cursor: default;
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
.sub-nav li {
    display: inline-table;
    margin: -21px 30px;
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
