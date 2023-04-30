@extends($activeTemplate.'layouts.master')
@section('content')
<section class="all-sections zero_top_padding">
    <div class="container-fluid">

        <div class="section-wrapper ">

            <div class="row justify-content-center mb-30-none">
                
                @include('templates.basic.user.seller.work_diary.side_bar')


                <div class="col-xl-9 col-lg-12 mb-30 ">
                    
                    <div class="col-md-12  col-lg-12 col-sm-12 col-xs-12">
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-12 col-lg-12">
                                <div class="card shadow-0 border" style="background-color: #f0f2f5;">
                                    <div class="card-header">
                                        <h3>{{$day_planning_task->description}}</h3>
                                    </div>
                                    <div class="card-body p-4">
                                        
                                        <form action="{{route('work-diary.day.planning.store.task.comment')}}" method="post">
                                            @csrf
                                            <input type="hidden" value="{{$day_planning_task->id}}" name="day_planning_task_id">
                                            <div class="form-outline mb-4">
                                                    <textarea type="text" id="add_comment_id" class="form-control" name="comment" placeholder="Type comment..." style="min-height:150px">{{old('comment')}}</textarea>
                                            </div>
                                            <div class="form-outline mb-4 text-right">
                                                <button type="submit" class="pl-4 btn-sm submit-btn   cretae-job-btn">comment</button>
                                            </div>

                                        </form>
                                        @foreach ($comments as $comment)
                                        <div class="card mb-4">
                                            <div class="card-body">
                                            <p>{{$comment->comment}}
                                            </p>
                                
                                            <div class="d-flex justify-content-between">
                                                <div class="d-flex flex-row align-items-center">
                                                <img src="{{$comment->user->basicProfile->profile_picture}}" alt="avatar" width="25"
                                                    height="25" />
                                                <p class="small mb-0 ms-2">{{$comment->user->fullname}}</p>
                                                </div>
                                                <div class="d-flex flex-row align-items-center">
                                                {{-- <p class="small text-muted mb-0">Upvote?</p>
                                                <i class="far fa-thumbs-up mx-2 fa-xs text-black" style="margin-top: -0.16rem;"></i>
                                                <p class="small text-muted mb-0">3</p> --}}
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        
                            
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection