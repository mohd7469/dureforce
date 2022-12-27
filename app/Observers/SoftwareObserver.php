<?php

namespace App\Observers;

use App\Models\GeneralSetting;
use App\Models\Software\Software;
use Carbon\Carbon;
use Illuminate\Support\Str;

class SoftwareObserver
{
    //
    public function creating($software)
    {   
        //$general = GeneralSetting::first();

        $software->user_id = auth()->id();    
        $software->status_id = Software::STATUSES['DRAFT'];
        $software->uuid= Str::uuid()->toString();
        $software->updated_at = Carbon::now();   
    }

    public function updating($software)
    {
        $software->updated_at = Carbon::now();  
        if($software->status_id == Software::STATUSES['APPROVED']){
            $software->status_id=Software::STATUSES['PENDING'];
        }         
        
    }
    public function deleting($software)
    {
        $software->deliverable()->detach();
        $software->tags()->detach();
        $software->softwareSteps()->delete();
        $software->features()->delete();
        $software->banner()->delete();
        $software->modules()->delete();
    }
}
