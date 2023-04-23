<?php

namespace App\Observers;

use App\Models\DayPlanning;

class DayPlanningObserver
{
    /**
     * Handle the DayPlanning "created" event.
     *
     * @param  \App\Models\DayPlanning  $dayPlanning
     * @return void
     */
    public function created(DayPlanning $dayPlanning)
    {
        
        $this->syncHours($dayPlanning,true);
        
    }

    /**
     * Handle the DayPlanning "updated" event.
     *
     * @param  \App\Models\DayPlanning  $dayPlanning
     * @return void
     */
    public function updated(DayPlanning $dayPlanning)
    {
        $this->syncHours($dayPlanning,true);
        
    }

    /**
     * Handle the DayPlanning "deleted" event.
     *
     * @param  \App\Models\DayPlanning  $dayPlanning
     * @return void
     */
    public function deleted(DayPlanning $dayPlanning)
    {
        $this->syncHours($dayPlanning,false);
        
    }

    /**
     * Handle the DayPlanning "restored" event.
     *
     * @param  \App\Models\DayPlanning  $dayPlanning
     * @return void
     */
    public function restored(DayPlanning $dayPlanning)
    {
        
    }

    /**
     * Handle the DayPlanning "force deleted" event.
     *
     * @param  \App\Models\DayPlanning  $dayPlanning
     * @return void
     */
    public function forceDeleted(DayPlanning $dayPlanning)
    {
        $this->syncHours($dayPlanning,false);
    }

    private function syncHours(DayPlanning $dayPlanning,$is_create){
        $total_day_hours=0;
        $total_day_hours=$dayPlanning->total_day_hours;
        $contract=$dayPlanning->contract;

        
        if($is_create){
            $previous_values=$dayPlanning->getOriginal('total_day_hours');
            if( ! is_null($previous_values) ){
                $contract->total_worked_hours = $contract->total_worked_hours - $previous_values;
                $contract->save();
            }

            $contract->total_worked_hours=$contract->total_worked_hours+$total_day_hours;
        }
        else{
            $contract->total_worked_hours=$contract->total_worked_hours-$total_day_hours;
        }

        $contract->save();


    }
}
