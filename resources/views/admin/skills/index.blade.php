@extends('admin.layouts.app')
@section('panel')

<style>
    a.disabled{
        pointer-events: none;
        cursor: default;
    }
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
    float: right;
}
a.icon-btn{
    float: right;
    
}
.table td{
    white-space: revert !important;
}
table .user .name {
    width: calc(100% - 40px);
    padding-left: 10px;
}
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
    float: right;
}
.table td{
    white-space: revert !important;
}
.icon-btn{
    float: right;
}
table{
    table-layout: fixed;
}
th.tlst {
    text-align: right !important;
    position: relative;
    padding-right: 6% !important;
}

</style>
<div class="row">
    <div class="col-lg-12">
     
        <a href="{{ route('admin.skill.create') }} " class="btn btn-primary btn-sm float-right">Create Skills</a>
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
                            <th>@lang('Name')</th>
                            <th>@lang('Skill Type')</th>
                            <th>@lang('Skill Category')</th>
                            <th>@lang('Module')</th>
                            <th class="tlst">@lang('Action')</th>
                        </tr>
                        </thead>
                        <tbody>
                            
                            
                        @foreach($Skills as $Skill)
                        <tr>
                            
                             <td data-label="@lang('Name')">
                                <div class="user">
                                    <span class="name">{{$Skill->name ?? ''}}</span>
                                </div>
                            </td>
                            <td data-label="@lang('Skill Type')">
                                <div class="user">
                                    <span class="name">{{$Skill->skill_type ?? ''}}</span>
                                </div>
                            </td>
                            <td data-label="@lang('Slug')">
                                <div class="user">
                                    <span class="name">{{$Skill->skill_categories->name  ?? ''}}</span>
                                </div>
                            </td>
                            <td data-label="@lang('Slug')">
                                <div class="user">
                                    <span class="name">{{$Skill->module->name ?? ''}}</span>
                                </div>
                            </td>

                            
                            <td data-label="@lang('Action')">
                               
                                    <a  href="{{route('admin.skill.edit', $Skill->id)}}" class="icon-btn btn--success ml-1  editbtn-c" id="" data-toggle="tooltip1" title="" data-original-title="@lang('InActive')" data-id="">
                                        <i class="las la-edit"></i>
                                    </a>
                               
                                     <a type="submit"  href="{{route('admin.skill.delete', $Skill->id)}}" class="icon-btn btn--danger ml-1 editbtn-c delete disabled" id="" data-toggle="tooltip1" title="" data-original-title="@lang('active')" data-id="" data-confirm="Are you sure to delete this item?"> 
                                        <i class="las la-trash"></i>
                                    </a> 
                               
                            </td>
                        </tr>
                        {{-- @empty --}}
                            {{-- <tr>
                                <td class="text-muted text-center" colspan="100%">{{ __($emptyMessage) }}</td>
                            </tr> --}}
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer py-4">
                {{ paginateLinks($Skills) }}
            </div>
        </div>
    </div>
</div>
@endsection



