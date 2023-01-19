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
     
        <a href="{{ route('admin.world.city.create') }} " class="btn btn-primary btn-sm float-right">Create City</a>
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
                            
                            <th>@lang('County')</th>
                            <th>@lang('Division')</th>
                            <th>@lang('Name')</th>
                            <th>@lang('Full name')</th>
                            <th>@lang('Code')</th>
                            <th>@lang('Timezone')</th>
                            <th class="tlst">@lang('Action')</th>
                            
                        </tr>
                        </thead>
                        <tbody>
                            
                            
                        @foreach($worldCities as $worldCitie)
                        <tr>
                            
                            <td data-label="@lang('County')">
                                <div class="user">
                                    <span class="name">{{$worldCitie->country_id}}</span>
                                </div>
                            </td>
                            <td data-label="@lang('Division')">
                                <div class="user">
                                    <span class="name">{{$worldCitie->division_id}}</span>
                                </div>
                            </td>
                            <td data-label="@lang('Name')">
                                <div class="user">
                                    <span class="name">{{$worldCitie->name}}</span>
                                </div>
                            </td>
                            <td data-label="@lang('Full name')">
                                <div class="user">
                                    <span class="name">{{$worldCitie->full_name}}</span>
                                </div>
                            </td> 
                            <td data-label="@lang('Code')">
                                <div class="user">
                                    <span class="name">{{$worldCitie->code}}</span>
                                </div>
                            </td> 
                            <td data-label="@lang('Timezone')">
                                <div class="user">
                                    <span class="name">{{$worldCitie->iana_timezone}}</span>
                                </div>
                            </td>  
                            <td data-label="@lang('Action')">
                               
                               <a  href="{{route('admin.world.city.edit', $worldCitie->id)}}" class="icon-btn btn--success ml-1  editbtn-c" id="" data-toggle="tooltip1" title="" data-original-title="@lang('InActive')" data-id="">
                                   <i class="las la-edit"></i>
                               </a>
                                <a type="submit"  href="{{route('admin.world.city.delete', $worldCitie->id)}}" class="icon-btn btn--danger ml-1 editbtn-c delete" id="" data-toggle="tooltip1" title="" data-original-title="@lang('active')" data-id="" data-confirm="Are you sure to delete this item?"> 
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
                {{ paginateLinks($worldCities) }}
            </div>
        </div>
    </div>
</div>

<!-- The Modal -->
@endsection