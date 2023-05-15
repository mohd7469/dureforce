<nav class="navbar navbar-expand-lg navbar-light bg-light bb">
    
    <div class="row col-md-12 col-lg-12 ">
        
        <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12 bor" >
            <a class="navbar-brand " href="#">All Contracts > Cloud AWS Development</a>
            <button class="status float-right">Active</button>
        </div>

        <div class="col-md-7 col-lg-7 col-sm-12 col-xs-12">

            <ul class="navbar-nav mr-auto mt-2 mt-lg-0 ">
                <li class="nav-item ">
                <a class="nav-link" href="#">Job Summary <span class="sr-only"></span></a>
                </li>
                <li class="nav-item">
                <a class="nav-link " href="#">Tasks</a>
                </li>
                <li class="nav-item">
                <a class="nav-link ">Payments</a>
                </li>
            </ul>
            
                
        </div>

    </div>
     
</nav>

@push('style')
    <style>
        .bor{
            
            border-right: 3px solid #C7DEDE;
            padding-left: 30px !important;

        }
    .container, .container-fluid, .container-lg, .container-md, .container-sm, .container-xl, .container-xxl {
        width: 100%;
        padding-right: 0px !important;
        padding-left: 0px !important;
        margin-right: auto;
        margin-left: auto;
        }
        .navbar{
            min-height: 75px !important
        }
        .status {
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            padding: 0px 16px;
            gap: 6px;
            position: absolute;
            width: 73px;
            height: 30px;
            top: 5px;
            background: #219A21;
            border-radius: 20px;
            position: relative;
        }
        .nav-item{
            height: 20px;
            font-style: normal;
            font-weight: 500;
            font-size: 16px;
            line-height: 20px;
            color: #515151;
        }
        .sr-only{
            height: 0px;
            left: 0px;
            border: 1px solid #C7DEDE;
        }
        .bb{
            border-bottom: 2px solid #DCEDED
        }
    </style>
@endpush