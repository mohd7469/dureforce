{{-- <div class="main">
    <div class="row" style="margin-left: -39px;">
        <div class="col-md-10">
            <ol>

                <li >
                    <div >View Job Post</div>
                </li>
                <li>
                    <div>Invite Freelancers</div>
                </li>
                <li>
                    <div>Review Proposals (23)</div>
                </li>
                <li>
                    <div>Hire (0)</div>
                </li>
               
            </ol>
        </div>
      
        
    </div>
    
</div> --}}
<div class="breadcrumb" >
    <a  class="breadcrumb__step {{Route::is('buyer.job.single.view') ? 'breadcrumb__step--active':''}} ancortag-class" href="{{route('buyer.job.single.view',$job_uuid)}}">View Job Post</a>
    <a class="breadcrumb__step  {{Route::is('buyer.job.invite.freelancer') ? 'breadcrumb__step--active':''}} ancortag-class" href="{{route('buyer.job.invite.freelancer',$job_uuid)}} ">Invite Freelancers</a>
    <a class="breadcrumb__step  {{Route::is('buyer.job.all.proposals') ? 'breadcrumb__step--active':''}} ancortag-class" href="{{route('buyer.job.all.proposals',$job_uuid)}}">Review Proposals (23)</a>
    <a class="breadcrumb__step ancortag-class" style="padding-left:-15px !important;" href="#">Hire (0)</a>
</div>