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
     
        <a href="{{ route('admin.world.language.create') }} " class="btn btn-primary btn-sm float-right">Create World Language</a>
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
                            
                            <th>@lang('Language Name')</th>
                            <th>@lang('Native Name')</th>
                            <th>@lang('Language Name Code2')</th>
                            <th>@lang('Language Name Code3')</th>
                            <th class="tlst">@lang('Action')</th>
                            
                        </tr>
                        </thead>
                        <tbody>
                            
                            
                        @foreach($worldLanguages as $worldLanguage)
                        <tr>
                            
                            <td data-label="@lang('Language Name')">
                                <div class="user">
                                    <span class="name">{{$worldLanguage->iso_language_name}}</span>
                                </div>
                            </td>
                            <td data-label="@lang('Native Name')">
                                <div class="user">
                                    <span class="name">{{$worldLanguage->native_name}}</span>
                                </div>
                            </td>
                            <td data-label="@lang('Language Name Code2')">
                                <div class="user">
                                    <span class="name">{{$worldLanguage->iso2}}</span>
                                </div>
                            </td>
                            <td data-label="@lang('Language Name Code3')">
                                <div class="user">
                                    <span class="name">{{$worldLanguage->iso3}}</span>
                                </div>
                            </td>
                            <td data-label="@lang('Action')">
                               
                               <a  href="{{route('admin.world.language.edit', $worldLanguage->id)}}" class="icon-btn btn--success ml-1  editbtn-c" id="" data-toggle="tooltip1" title="" data-original-title="@lang('InActive')" data-id="">
                                   <i class="las la-edit"></i>
                               </a>
                                <a type="submit"  href="{{route('admin.world.language.delete', $worldLanguage->id)}}" class="icon-btn btn--danger ml-1 editbtn-c delete" id="" data-toggle="tooltip1" title="" data-original-title="@lang('active')" data-id="" data-confirm="Are you sure to delete this item?"> 
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
                {{ paginateLinks($worldLanguages) }}
            </div>
        </div>
    </div>
</div>

<!-- The Modal -->
@endsection