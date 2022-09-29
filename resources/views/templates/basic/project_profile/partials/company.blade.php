<style>
    .img-box {
        margin-top: 4px;
        width: 100px;
        height: 100px;
    }

</style>

<div class="setProfile" id="">
    <h1>Company Details</h1>
    <div class="card-body">
        
        <div class="card-form-wrapper">
            
            <div class="justify-content-center">
               

                <div class="row p-4 border-top border-bottom" >

                    
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 form-group">
                        <label>Name</label>
                        {{$user->company->name}}
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 form-group">
                        <label>Phone</label>
                        {{$user->company->number}}
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 form-group">
                        <label>Email</label>
                        {{$user->company->email}}
                    </div>
                </div>

                <div class="row p-4 border-top border-bottom" >

                    
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 form-group">
                        <label>Location</label>
                        {{$user->company->name}}
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 form-group">
                        <label>VAT ID</label>
                        {{$user->company->number}}
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 form-group">
                        <label>Website</label>
                        {{$user->company->email}}
                    </div>
                </div>

                <div class="row p-4 border-top border-bottom" >

                    
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 form-group">
                        <label>LinkedIn Profile</label>
                        {{$user->company->name}}
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 form-group">
                        <label>Facebook Profile</label>
                        {{$user->company->number}}
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 form-group">
                        <label>Twitter Profile</label>
                        {{$user->company->email}}
                    </div>
                </div>
            
            </div>

        </div>
    </div>
   
    @include("templates.basic.project_profile.models.company_")
    <div style="float:right">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#companyModal">
            Edit
        </button>

    </div>
</div>
