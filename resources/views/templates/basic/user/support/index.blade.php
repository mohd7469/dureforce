@extends($activeTemplate.'layouts.master')
@section('content')
    <section class="all-sections">
        <div class="container-fluid">
                <div class="container">
                    <!----Second Section Start---->
                    <div class="second-section-con">
                        <div class="all-s"> All Support Tickets</div>
                        <a href="{{route('ticket.create')}}"  class="cnt-btn">Create New Ticket</a>
                        <div class="f-container">
                            <div name="Filters" id="Filters"></div>

                            <ul class="filter-drop-dw">
                                <li>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="check1" name="option2"
                                               value="something">
                                        <label class="form-check-label" for="check1">All</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="check2" name="option2"
                                               value="something">
                                        <label class="form-check-label" for="check2">Open (22)</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="check3" name="option2"
                                               value="something">
                                        <label class="form-check-label" for="check3">Closed (3)</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="check4" name="option2"
                                               value="something">
                                        <label class="form-check-label" for="check4">Onhold (0)</label>
                                    </div>
                                </li>
                            </ul>


                        </div>

                    </div>
                    <!---Second Section End----->
                    <!----Table Section Start--->
                    <div class="table_container_s table-responsive-md">

                        <table class="table custm-b">
                            <thead>
                            <tr>
                                <th>Date</th>
                                <th>Ticket No</th>
                                <th>Subject</th>
                                <th>No. Comments</th>
                                <th>Status</th>
                                <th>Priority</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tickets as $ticket)
                                <tr>
                                    <td>{{getFormattedDate($ticket->created_at,'d M Y')}}</td>
                                    <td><a href="{{route('seller.proposal.create',1)}}" style="color: #0060B6; text-decoration: none;"> #{{$ticket->ticket_no}}</a></td>
                                    <td>{{$ticket->subject}}</td>
                                    <td>12</td>


                                    <?php if ($ticket->status->id == \App\Models\SupportTicket::$OnHold){  ?>
                                    <td><span class=" btn-sta status-on-hold">{{isset($ticket->status)? $ticket->status->name:''}}</span></td>

                                    <?php }
                                    elseif ($ticket->status->id == \App\Models\SupportTicket::$Closed){  ?>
                                    <td><span class="btn-sta status-closed">{{isset($ticket->status)? $ticket->status->name:''}}</span></td>

                                    <?php }
                                    else{ ?>
                                    <td><span class="btn-sta status-open">{{isset($ticket->status)? $ticket->status->name:''}}</span></td>

                                    <?php } ?>



                                    <?php if ($ticket->priority->id == \App\Models\Status::$High){  ?>
                                    <td><span class="btn-sta priority-high-color">{{isset($ticket->priority)? $ticket->priority->name:''}}</span></td>

                                <?php }
                                    elseif ($ticket->priority->id == \App\Models\Status::$Low){ ?>
                                    <td><span class="btn-sta priority-low-color">{{isset($ticket->priority)? $ticket->priority->name:''}}</span></td>

                                <?php }
                                    else{ ?>
                                    <td><span class="btn-sta priority-medium-color">{{isset($ticket->priority)? $ticket->priority->name:''}}</span></td>

                                <?php } ?>



                                </tr>

                            @endforeach


                            </tbody>
                        </table>
                    </div>
                    <!--Table Section End-->

                </div>
        </div>
    </section>
@endsection


@push('style')
    <style>
        .categories_type_container {
            background: #F9F9F9;
            border-bottom: 1px solid #e1e7ec;
            padding: 6px 0px 10px 0px;
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

        #Filters {
            float: right;
            border-radius: 5px;
            padding: 8px 13px 8px 38px;
            color: #007F7F;
            font-size: 14px;
            width: 100%;
            appearance: none;
            background: #EFF8F8 url(/assets/images/job/lines.png) no-repeat !important;
            background-position: 15% center !important;
            max-width: 98px;
            height: 42px;
            border: 1px solid #CBDFDF;
            /* position: relative; */
            cursor: pointer;
        }

        .f-container {
            position: relative;
            float: right;
        }

        /******Second Section*******/
        .second-section-con {
            width: 100%;
            display: inline-block;
            padding: 32px 0px;
        }

        .all-s {
            font-weight: 500;
            font-size: 20px;
            line-height: 25px;
            color: #007F7F;
            width: 26%;
            float: left;
        }

        a.cnt-btn {
            width: 147px;
            height: 41px;
            /* left: 1091px; */
            /* top: 146px; */
            background: #007F7F;
            border: 1px solid #007F7F;
            border-radius: 6px;
            font-weight: 400;
            font-size: 14px;
            line-height: 18px;
            color: #FFFFFF;
            text-align: center;
            padding-top: 10px;
            float: right;
            margin-left: 17px;
        }

        /****Table***/

        .table_container_s table thead {
            padding: 0px 10px;
            background: #EFF4F4;
            border: 1px solid #CBDFDF;
            font-weight: 600;
            font-size: 16px !important;
            line-height: 44px;
            color: #000000 !important;
            font-family: 'Mulish';
            /* height: 40px; */
            height: 61px;
        }

        .table_container_s table tr td {
            /* font-weight: 500; */
            font-size: 14px !important;
            line-height: 18px;
            color: #000000 !important;
        }

        span.btn-sta {
            width: 89px;
            height: 27px;
            left: 896px;
            top: 295px;
            background: #ADE7AD;
            border-radius: 7px;
            text-align: center;
            color: #fff;
            font-weight: 700;
            font-size: 14px;
            line-height: 18px;
            padding-top: 4px;
            padding-left: 20px;
            position: sticky;

        }


        span.btn-sta:before {
            width: 10px;
            height: 10px;
            background: #ADE7AD;
            position: absolute;
            content: '';
            border-radius: 50%;
            left: 12px;
            top: 9px;
        }

        table.table.custm-b {
            border: 1px solid #CBDFDF !important;

        }

        .table_container_s table tbody tr td {
            /* font-weight: 500; */
            font-size: 14px !important;
            line-height: 18px;
            color: #000000 !important;
            padding: 20px 15px 20px 15px;
        }

        .table_container_s table thead th {
            padding-left: 15px !important;

        }

        .custm-b > tbody > tr:nth-of-type(odd) {
            background: #fff !important;
        }

        .custm-b > tbody > tr:nth-of-type(even) {
            background: #F7F9F9 !important;
        }

        span.priority-high-color {
            background: #FF5C00;
        }
        span.priority-medium-color {
            background: #F09959;
        }
        span.priority-low-color {
            background: #F1CC47;
        }
        span.status-on-hold {
            background: #CDB999;
        }
        span.status-closed {
            background: #333333;
        }
        span.status-open {
            background: #219A21;
        }

        span.orange:before {
            background: #fff !important;
        }

        /********/

        ul.filter-drop-dw {
            width: 178px;
            height: 154px;
            left: 976px;
            top: 190px;
            background: #FFFFFF;
            box-shadow: 0px 4px 5px rgb(0 0 0 / 5%);
            position: absolute;
            left: 0px;
            z-index: 91;
            top: 42px;
            padding: 18px 11px;
            display: none;

            border-radius: 7px;
        }

        div#Filters:before {
            content: 'Filter';
        }

        .filter-drop-dw li {
            width: 100%;
            display: inline-block;
        }


        .filter-drop-dw .form-check label {
            padding-left: 10px;
            font-weight: 600;
            font-size: 14px;
            line-height: 22px;
            color: #000000;
            position: relative;
            top: 1px;
        }

        /* div#Filters:hover .filter-drop-dw {
            display: block;
        } */


        .checkbox-menu li label {
            display: block;
            padding: 3px 10px;
            clear: both;
            font-weight: normal;
            line-height: 1.42857143;
            color: #333;
            white-space: nowrap;
            margin: 0;
            transition: background-color .4s ease;
        }

        .checkbox-menu li input {
            margin: 0px 5px;
            top: 2px;
            position: relative;
        }

        .checkbox-menu li.active label {
            background-color: #cbcbff;
            font-weight: bold;
        }

        .checkbox-menu li label:hover,
        .checkbox-menu li label:focus {
            background-color: #f5f5f5;
        }

        .checkbox-menu li.active label:hover,
        .checkbox-menu li.active label:focus {
            background-color: #b8b8ff;
        }


        @media only screen and (max-width: 920px) {
            table.table.custm-b {
                width: 900px;
            }
        }

        @media only screen and (max-width: 767px) {
            .all-s {
                font-size: 13px;
            }
        }
    </style>

@endpush

@push('script')
    <script>
        jQuery('#Filters').click(function () {
            jQuery('.filter-drop-dw').slideToggle('filter-drop-dw');

        });

        $("#check1").click(function () {
            $('input:checkbox').not(this).prop('checked', this.checked);
        });


    </script>
@endpush