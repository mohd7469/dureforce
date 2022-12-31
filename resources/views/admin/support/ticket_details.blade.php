@extends('admin.layouts.app')
@section('panel')
    <!---Inner NavBar Section Start--->
    <section>

        <div class="container">
            <div class="secondsb-con">
                <div class="row">
                    <div class="col-md-7">
                        <p class="sbheading-c">All Tickets > {{$support_ticket->ticket_no}} > <strong>{{$support_ticket->subject}}</strong></p>
                        <a href="#" class="btn btn-sm openbtn-s">{{$support_ticket->status->name}}</a>
                        <a href="#" class="btn btn-sm highbtn-s">{{$support_ticket->priority->name}}</a>
                    </div>
                    <div class="col-md-2 posted-date">
                        <p class="datec-s"><strong>Posted Date :</strong> {{$support_ticket->created_at->format("d M Y")}}</p>
                    </div>
                    <div class="col-md-1">
                        <div class="dropdown">
                            <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownStatusButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Status
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownStatusButton">
                            @foreach ($statuses as $status)
                                @if( $support_ticket->status->id != $status->id)
                                <form action="{{route('admin.ticket.status.change',$support_ticket->ticket_no)}}"
                                    method="post" role="form">
                                    @csrf
                                    <input type="hidden" name="status_id" value="{{ $status->id }}">
                                    <input type="hidden" name="priority_id" value="{{ $support_ticket->id }}">
                                    <button class="dropdown-item" type="submit">{{ $status->name }}</button>
                                </form>
                                @endif
                            @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="dropdown">
                            <button class="btn btn-outline-secondary dropdown-toggle float-right" type="button" id="dropdownPriorityButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Priority
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownPriorityButton">
                            @foreach ($priorties as $priority)
                                @if( $support_ticket->priority->id != $priority->id)
                                <form action="{{route('admin.ticket.priority.change',$support_ticket->ticket_no)}}"
                                    method="post" role="form">
                                    @csrf
                                    <input type="hidden" name="status_id" value="{{ $priority->id }}">
                                    <input type="hidden" name="priority_id" value="{{ $support_ticket->id }}">
                                    <button class="dropdown-item" type="submit">{{ $priority->name }}</button>
                                </form>
                                @endif
                            @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <!---Users Online Section Start-->

            <div class="userlist">
                <div class="userv">

                    <div class="userprofile"><img src="{{$support_ticket->user->basicProfile ? $support_ticket->user->basicProfile->profile_picture : '/assets/images/job/profile-img.png'}}" ></div>
                    <p class="username">{{$support_ticket->user->full_name}}</p>
                    <p class="time-d"> {{systemDateTimeFormat($support_ticket->created_at)}} </p>
                </div>
                <div class="userdetail">
                    {{$support_ticket->message}}
                </div>
                @if (count($support_ticket->attachments)>0)
                    <p class="font-attach">Attachments</p>
                    @foreach($support_ticket->attachments as $decumentUrl)
                        <a href="{{$decumentUrl->url}}" class="btn btn-large pull-right atta attachment-file" download style="margin-top: 7px">
                            <i class="fa fa-paperclip font-style" aria-hidden="true"></i>{{$decumentUrl->uploaded_name}} </a>
                    @endforeach
                    {{-- <span class="attachment-file"><img src="/assets/images/job/attached.svg"> Screenshot.jpg</span> --}}
                @endif




                @isset($support_ticket->supportMessage)
                    @foreach($support_ticket->supportMessage as $support_message)

                        @if($support_message->admin_id != null)
                            <div class="userv" style="margin-top: 12px;">

                                <div class="userprofile" style="margin-left: 2px;"><img src="{{ asset('assets/images/logoIcon/favicon.png') }}"></div>
                                <p class="username">Dureforce Support</p>
                                <p class="time-d"> {{systemDateTimeFormat($support_message->created_at)}} </p>
                            </div>
                            <div class="userdetail">
                                {{$support_message->message}}
                            </div>
                            @if (count($support_message->attachments)>0)
                                <p class="font-attach">Attachments</p>
                                @foreach($support_message->attachments as $decumentUrl)
                                    <a href="{{$decumentUrl->url}}" class="btn btn-large pull-right atta attachment-file" download style="margin-top: 7px">
                                        <i class="fa fa-paperclip font-style" aria-hidden="true"></i>{{$decumentUrl->uploaded_name}} </a>
                                @endforeach
                            @endif

                        @else
                            <div class="userv" style="margin-top: 12px;">

                                <div class="userprofile" style="margin-left: 2px;"><img src="{{$support_message->user->basicProfile ? $support_message->user->basicProfile->profile_picture : '/assets/images/job/profile-img.png'}}" ></div>
                                <p class="username">{{$support_message->user->full_name}}</p>
                                <p class="time-d"> {{systemDateTimeFormat($support_message->created_at)}} </p>
                            </div>
                            <div class="userdetail">
                                {{$support_message->message}}
                            </div>
                            @if (count($support_message->attachments)>0)
                                <p class="font-attach">Attachments</p>
                                @foreach($support_message->attachments as $decumentUrl)
                                    <a href="{{$decumentUrl->url}}" class="btn btn-large pull-right atta attachment-file" download style="margin-top: 7px">
                                        <i class="fa fa-paperclip font-style" aria-hidden="true"></i>{{$decumentUrl->uploaded_name}} </a>
                                @endforeach
                            @endif
                        @endif
                    @endforeach
                @endisset

            </div>

            <!---Users Online Section End-->






        @if($support_ticket->status_id != \App\Models\SupportTicket::$Closed)
            <!---Comments Box-->
            <div class="comment-box">
                <p class="comment-f">Comment</p>
                <form action="{{route('admin.ticket.comment.store',$support_ticket->ticket_no)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <textarea  placeholder="Add Comment" name="message" class="comment-box"></textarea>
                    <label for="comment_file" class="btn-atach-m">Attach</label>
                    <input type="file" name="comment_attachment" id="comment_file" style="display: none;visibility:none" onchange="writeFileName()">
                    <div >
                        <ul class="list-group" id="file_name_div">
                        </ul>
                    </div>
                    <input type="submit"  class="btn-postcoment">

                </form>
            </div>
            @else
                <div class="comment-box">

                        <label for="comment_file" class="btn-atach-m-2">Ticket is closed</label>

                </div>
            @endif

        </div>

    </section>


@endsection
@push('script')

    <script>
        $(document).ready(function() {
            
            $(document).on('click', '.delete-btn', function(e) {
                filename=jQuery(this).attr("id");
                $('#file_detail_'+filename).remove();
                var original_file_name=$(this).attr("data-id");
                const dt = new DataTransfer();
                var number_of_files=$('#comment_file').get(0).files.length;
                for (let index = 0; index < number_of_files; index++) {
                    file=$('#comment_file').get(0).files[index];
                    if(file.name!=original_file_name)
                    {
                        dt.items.add(file);
                    }
                }
                $('#comment_file').get(0).files=dt.files;
            });
          
        });
        
        function writeFileName()
        {
            $('#file_name_div').empty();
            var number_of_files=$('#comment_file').get(0).files.length;
            var form= new FormData();
            for (let index = 0; index < number_of_files; index++) {
                file=$('#comment_file').get(0).files[index];
                $('#file_name_div').append('<li class="list-group-item d-flex justify-content-between align-items-center" id="file_detail_'+file.name.replace(/\./g,'_')+'">'+file.name+'<span class="badge badge-primary badge-pill delete-btn"  id="'+file.name.replace(/\./g,'_')+'"  data-id="'+file.name+'"><i class="fa fa-trash" style="color:red" ></i></span></li>');
            }
            
        }
        
    </script>

@endpush

@push('style')
    <style>
        
        .posted-date{
            padding-left: 0px !important;
        }
        .categories_type_container {
            background: #F9F9F9;
            border-bottom: 1px solid #e1e7ec;
            padding: 6px 0px 10px 0px;
        }
        img {
            max-width: 100%;
            height: auto;
            border-radius: 50%;
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
            font-size: 17px;
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
            left: 8px;
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
            /* float: right; */
            font-family: 'Mulish';
            font-style: normal;
            font-weight: 500;
            font-size: 14px;
            line-height: 18px;
            color: #000000;
            padding-top: 6px;
            /* margin-right: 1%; */
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
        .btn-atach-m {
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
        .btn-atach-m-2 {
            border: 2px solid #007F7F;
            border-radius: 5px;
            width: 140px;
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
            /*padding-left: 25px;*/
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

         .userprofile img {
            height: 55px;
            width: 55px;
        }
        @media only screen and (max-width:767px){
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

    </style>

@endpush


