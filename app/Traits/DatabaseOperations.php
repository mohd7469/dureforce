<?php

namespace App\Traits;

trait DatabaseOperations
{
    public static function bootDatabaseOperations()
    {
        // It will update created_by when model record is created
        static::creating(function ($model) {
            if (!$model->isDirty('created_by')) {

                if(auth()->check()) { 
                    $model->created_by = auth()->user()->id;
                }
                
            }
        });

        // It will update updated_by when model record is updated
        static::updating(function ($model) {
            if (!$model->isDirty('updated_by')) {
                if(auth()->check()) // checking auth 
                    $model->updated_by = auth()->user()->id;
            }
        });
        
        // It will update deleted_by when model record is deleted
        static::deleting(function ($model) {
            if (!$model->isDirty('deleted_by')) {
                    $model->deleted_by = auth()->user()->id;
            }
        });
    }
        
    // This function will automatically create common columns in Database tables like: 
    // 'created_by', 'updated_by', 'deleted_by', 'created_at', 'updated_at' and 'deleted_at'
    public function addCommonDBFields($table) {
        $table->unsignedBigInteger('created_by')->index('created_by')->nullable();
        $table->unsignedBigInteger('updated_by')->index('updated_by')->nullable();
        $table->unsignedBigInteger('deleted_by')->index('deleted_by')->nullable();
        $table->timestamps();
        $table->softDeletes();
    }
}
