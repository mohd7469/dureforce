
        <div class="right-container-c">
          
                <div class="row">
          
                    <div class="col-md-6">
                        <p class="title-c">Add portfolio project</p>
                        <label for="exampleInputEmail1">Project Title</label>
                        <input type="text" class="form-control" id="project_name" aria-describedby="emailHelp" placeholder="Enter a brief title of portfolio" name="name">
                    </div>
                
                </div>
    
                <div class="row">
                
                    <div class="col-md-6">
                        <p class="rl-d">Related DF Job (optional) <br />
                            Once you've completed contracts on DF, you'll be able to link your work.</p>
                    </div>
                    
                </div>
    
                <div class="row">
                
                    <div class="col-md-6">
                    
                        <label for="exampleInputEmail1">Completion Date (optional)</label>
                        <input type="date" class="form-control" id="completion_date" aria-describedby="emailHelp" placeholder="mm/dd/yy" name="completion_date"  >
                    </div>

                    <div class="col-md-6">
                        <div class="btns-addp">
                            <a href="{{route('seller.profile.view')}}"><button type="button" class="float-left cncl-btn" data-bs-dismiss="modal">Cancle</button></a>
                            <button type="button" class="submit-btn w-80 float-right" id="go_to_detail_btn">Go to Add Details</button>
                        </div>
    
                    </div>
                    
                    
                </div>
           
        </div> 




   


@push('style')
<style>

    /*********/
    .form-control {
    border: 1px solid #e1e7ec;
    font-size: 14px;
    font-weight: 500;
    height: 45px;
    appearance: auto;
    background-color: #f9f9f9;
    width: 351px;
    height: 37px;
    left: 219px;
    top: 219px;
    background: #FFFFFF;
    border: 1px solid #CBDFDF;
    border-radius: 4px;
}
p.rl-d {
    font-weight: 400;
    font-size: 14px;
    line-height: 18px;
    color: #000000;
    padding: 21px 0px 40px 0px;
}
.right-container-c {
        background: #F8FAFA;
        padding: 27px 21px;

    }
    .btns-addp {
        width: 276px;
        float: right;
        margin-top: 150px;
        bottom: -15px;
        right:15px;
    }
    button.float-left.cncl-btn {
    font-weight: 600;
    font-size: 14px;
    line-height: 18px;
    color: #7F007F;
    background: transparent;
    margin-top: 10px;
    margin-right: 21px;
}
.title-c {
    font-weight: 600;
    font-size: 20px;
    line-height: 25px;
    color: #000000;
    margin-bottom: 40px;
}



    /********/
    .container{
        max-width:1390px;
        margin:0px auto;
        display: block;
    }
    .client_profile_con{
        width: 100%;
        display: inline-block;
    }
    
 /*******Sidebar start********/

    
</style>
@endpush



