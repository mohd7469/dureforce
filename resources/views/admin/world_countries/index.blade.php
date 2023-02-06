@extends('admin.layouts.app')
@section('panel')

<style>
.icon-btn i {
    font-size: 22px;
}
.editbtn-c {
    width: 35px;
    height: 35px;
    /* background: red; */
    display: inline-block;
}
.tickbtn {
    padding: 5.5px 7px;
    /* position: relative;
    right: 180px; */
    float: left;
}
a.icon-btn{
    float: left;
    
}
th.tlst {
    text-align: left !important;
}
.table td{
    white-space: revert !important;
}
</style>
<div class="row">
    <div class="col-lg-12">
     
        <a href="{{ route('admin.world.country.create') }} " class="btn btn-primary btn-sm float-right">Create Country</a>
    </div>
</div>
<br>
<div class="row">
    <div class="col-lg-12">
        <div class="card b-radius--10 ">
            <div class="card-body p-0">
                <div class="table-responsive--md  table-responsive">
                    <table class="table table--light style--two">
                        <thead>
                        <tr>
                            
                            <th>@lang('Continent')</th>
                            <th>@lang('Name')</th>
                            <th>@lang('Full name')</th>
                            <th>@lang('Capital')</th>
                            <th>@lang('Code')</th>
                            <th>@lang('Code alpha3')</th>
                            <th>@lang('Code numeric')</th>
                            <th>@lang('Emoji')</th>
                            <th>@lang('Currency code')</th>
                            <th>@lang('Currency name')</th>
                            <th>@lang('TLD')</th>
                            <th>@lang('Calling code')</th>
                            <th class="tlst">@lang('Action')</th>
                            
                        </tr>
                        </thead>
                        <tbody>
                            
                            
                        @foreach($worldCountries as $worldCountry)
                        <tr>
                            <td data-label="@lang('County')">
                                <div class="user">
                                    <span class="">{{$worldCountry->continent->name ?? ''}}</span>
                                </div>
                            </td>
                            <td data-label="@lang('Name')">
                                <div class="user">
                                    <span class="">{{$worldCountry->name}}</span>
                                </div>
                            </td>
                            <td data-label="@lang('Full name')">
                                <div class="user">
                                    <span class="full_name">{{$worldCountry->full_name}}</span>
                                </div>
                            </td> 
                            <td data-label="@lang('Capital')">
                                <div class="user">
                                    <span class="capital">{{$worldCountry->capital}}</span>
                                </div>
                            </td>  
                            <td data-label="@lang('Code')">
                                <div class="user">
                                    <span class="code">{{$worldCountry->code}}</span>
                                </div>
                            </td> 
                            <td data-label="@lang('Code Alpha3')">
                                <div class="user">
                                    <span class="code_alpha3">{{$worldCountry->code_alpha3}}</span>
                                </div>
                            </td>  
                            <td data-label="@lang('Code Numeric')">
                                <div class="user">
                                    <span class="code_numeric">{{$worldCountry->code_numeric}}</span>
                                </div>
                            </td>  
                            <td data-label="@lang('Emoji')">
                                <div class="user">
                                    <span class="emoji">{{$worldCountry->emoji}}</span>
                                </div>
                            </td>  
                            <td data-label="@lang('Currency Code')">
                                <div class="user">
                                    <span class="currency_code">{{$worldCountry->currency_code}}</span>
                                </div>
                            </td>  
                            <td data-label="@lang('Currency Name')">
                                <div class="user">
                                    <span class="currency_name">{{$worldCountry->currency_name}}</span>
                                </div>
                            </td>  
                            <td data-label="@lang('TLD')">
                                <div class="user">
                                    <span class="tld">{{$worldCountry->tld}}</span>
                                </div>
                            </td>  
                            <td data-label="@lang('Calling code')">
                                <div class="user">
                                    <span class="callingcode">{{$worldCountry->callingcode}}</span>
                                </div>
                            </td>  
                            
                            <td data-label="@lang('Action')">
                               
                               <a  href="{{route('admin.world.country.edit', $worldCountry->id)}}" class="icon-btn btn--success ml-1  editbtn-c" id="" data-toggle="tooltip1" title="" data-original-title="@lang('InActive')" data-id="">
                                   <i class="las la-edit"></i>
                               </a>
                                <a type="submit" disabled="disabled"  href="{{route('admin.world.country.delete', $worldCountry->id)}}" class="icon-btn btn--danger ml-1 editbtn-c delete" id="" data-toggle="tooltip1" title="" data-original-title="@lang('active')" data-id="" data-confirm="Are you sure to delete this item?">
                                   <i class="las la-trash"></i>
                               </a> 
                          
                            </td>                       
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer py-4">
                {{ paginateLinks($worldCountries) }}
            </div>
        </div>
    </div>
</div>

<!-- The Modal -->
@endsection