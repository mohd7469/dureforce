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
    <a  class="breadcrumb__step {{Route::is('buyer.job.single.view') ? 'breadcrumb__step--active':''}} ancortag-class" href="{{route('buyer.job.single.view',$job->uuid)}}">View Job Post</a>
    @if($job->status->id == \App\Models\Job::$Pending || $job->status->id == \App\Models\Job::$Approved)
        @if (!$job->model)
            <a class="breadcrumb__step  {{Route::is('buyer.job.invite.freelancer') ? 'breadcrumb__step--active':''}} ancortag-class" href="{{route('buyer.job.invite.freelancer',$job->uuid)}} ">Invite Freelancers</a>
            
        @endif
        <a class="breadcrumb__step  {{Route::is('buyer.job.all.proposals') ? 'breadcrumb__step--active':''}} ancortag-class" href="{{route('buyer.job.all.proposals',$job->uuid)}}">Review Proposals ({{getNumberOfPropsals($job->uuid)}})</a>
        <a class="breadcrumb__step {{Route::is('buyer.job.all.offers') ? 'breadcrumb__step--active':''}} ancortag-class" style="padding-left:-15px !important;" href="{{route('buyer.job.all.offers',$job->uuid)}}">Hire (0)</a>

    @endif

</div>