@extends($activeTemplate.'layouts.frontend')
@section('content')
<div class="container-fluid">
<h2 class="all_p_heading">All Proposals</h2>

<div class="all_propsal_container">
    {{-- <ul class="allp_nav">
        
        <li><a href="#">All (7)</a></li>
        <li><a href="#">Draft Proposals (5)</a></li>
        <li><a href="#">Submitted Proposals (6)</a></li>
    </ul> --}}




    
    <ul class="nav nav-tabs card-header-tabs jbs_nav_s allp_nav" data-bs-tabs="tabs">
        <li class="nav-item">
            <a class="nav-link active" aria-current="true" data-bs-toggle="tab" href="#all">All</a>
            
        </li>
        <li class="nav-item">
            <a class="nav-link"  data-bs-toggle="tab" href="#draft_proposals">Draft Proposals (5)</a>
      
        </li>
        <li class="nav-item">
            
            <a class="nav-link " data-bs-toggle="tab" href="#submitted_proposals">Submitted Proposals (6)</a>
        </li>
        
    </ul>
   

            
 <div class="tab-content">
        <div class="listing_table_con card-body tab-pane active" id="all"> 
            <table>
                <thead>
                <th>Title</th>
                <th>Job Type</th>
                <th>Proposed Price</th>
                <th>Proposal Status</th>
                <th>Action</th>
                </thead>
                @for($j=0; $j<5; $j++)
                
                <tr>
                <td>
                    <h2 class="per_heading">Build multiply Jira cloud service demo</h2>
                    <p class="per_jobs_d">Job posted by Martin Collins on 30 Sep 2022</p>
                </td>
                <td>
                    <span class="jobtype-per">Service</span>
                </td>
                <td>
                    <p class="job_price">$350.00</p>
                </td>
                <td><span class="job_status_p">Draft</span></td>
                <td><a href="#" class="view_propasal_per">View Proposal</a></td>
                </tr>
                @endfor
            </table>
        </div>
           
           <div class="tab-pane" id="draft_proposals">
            <p class="card-text text-center">
            <div class="d-flex align-items-center justify-content-center ">
                <h6 class="display-6 fw-bold">Coming Soon!</h6>
            </div>
            </p>
        </div>
        <div class="tab-pane" id="submitted_proposals">
            <p class="card-text text-center">
            <div class="d-flex align-items-center justify-content-center ">
                <h6 class="display-6 fw-bold">Coming Soon!</h6>
            </div>
            </p>
        </div>
          
         
    </div>
    

</div>


@endsection


<style>
ul.allp_nav {
    padding: 0px 0px 15px 24px;
    border-bottom: 1px solid #CBDFDF;
}
ul.allp_nav li {
    float: left;
    display: inline-block;
}
ul.allp_nav li a {
    margin-right: 60px;
    font-weight: 600;
    font-size: 14px;
    line-height: 18px;
    text-align: center;
    color: #808285;
}    
.listing_table_con table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #CBDFDF;
}

.listing_table_con th,  .listing_table_con td {
  text-align: left;
  padding: 30px 30px;
}

h2.all_p_heading {
    font-weight: 600;
    font-size: 20px;
    line-height: 25px;
    color: #000000;
    margin-top: 29px;
    margin-bottom: 30px;
}
.all_propsal_container {
    width: 100%;
    display: inline-block;
    background: #FFFFFF;
    border: 1px solid #CBDFDF;
    }
ul.allp_nav {
    padding: 21px 31px 35px 31px;
    border-bottom: 1px solid #CBDFDF;
    }
.listing_table_con {
    width: 100%;
    padding: 31px 31px;
    border-radius: 4px;
    
} 
.listing_table_con thead {
    /* background: red; */
    background: #F1F8F8;
    border: 1px solid #CBDFDF;
    border-radius: 12px 12px 0px 0px   
}
h2.per_heading {
    font-weight: 600;
    font-size: 18px;
    line-height: 23px;
    color: #007F7F;
}
p.per_jobs_d {
    font-weight: 400;
    font-size: 16px;
    line-height: 20px;
    color: #000000;
    margin-top: 20px;
}
span.jobtype-per {
    background: #58A7A7;
    border-radius: 20px;
    display: inline-block;
    padding: 7px 17px;
    font-size: 14px;
    color: #fff;
}
p.job_price {
    font-weight: 600;
    font-size: 16px;
    line-height: 20px;
    color: #000000;
}
span.job_status_p {
    background: #5BACF6;
    border-radius: 20px;
    display: inline-block;
    padding: 7px 31px;
    color: #fff;
    font-size: 14px;
}
a.view_propasal_per {
    color: #7F007F;
    font-size: 14px;
    padding: 10px 30px;
    border: 2px solid #7F007F;
    border-radius: 5px;
}
.listing_table_con {
    width: 100%;
    padding: 31px 31px;
    border-radius: 4px;

}
.listing_table_con tr{
    border-bottom: 1px solid #CBDFDF;
}
.listing_table_con tr:last-child td{
    padding-bottom: 70px !important;
}
.listing_table_con thead th {
    font-weight: 600;
    font-size: 16px;
    /* line-height: 10px; */
    color: #000000;
    padding: 17px 30px;
    border-top-right-radius: 5px !important;
    border-top-left-radius: 5px !important;
}
/**********Responsive********/
@media only screen and (max-width:1187px){
    a.view_propasal_per{
        padding: 10px 20px;
    }
    .listing_table_con th, .listing_table_con td {
    text-align: left;
    padding: 30px 25px;
}
a.view_propasal_per {
    padding: 7px 9px;
}
}
@media only screen and (max-width:1124px){
    .listing_table_con{
        overflow-x: scroll;

    }
    .listing_table_con table{
        width:1180px;
        
    }

}
@media only screen and (max-width:767px){
    ul.allp_nav li a {
    margin-right: 12px;
    font-weight: 600;
    font-size: 12px;
    }
    ul.allp_nav {
    padding: 16px 15px 36px 15px;
    border-bottom: 1px solid #CBDFDF;
}
.listing_table_con {
    width: 100%;
    padding: 15px 15px;
    border-radius: 4px;
}
h2.per_heading {
    font-weight: 600;
    font-size: 16px;
    line-height: 21px;
    color: #007F7F;
}
p.per_jobs_d {
    font-weight: 400;
    font-size: 14px;
    line-height: 20px;
    color: #000000;
    margin-top: 18px;
}
}
</style>

@push('script')

<script>
   'use strict';
//    function HideTab() {
//     $('.listing_table_con').hide();
//    }
   $('#defaultSearch').on('change', function() {
       this.form.submit();
   });
</script>


@endpush
