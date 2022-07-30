<?php

namespace App\Traits;

trait DeleteEntity
{
     /**
     * @param $model - Refers to the model
     * @param $imagePath - image path to delete image
     * @param $id - id to find the entity 
     */

    public function deleteEntity($model, $imagePath, $id)
    {
        $model = $model::find($id);

        if(!empty($model->image))
        {
            if(file_exists(imagePath()[$imagePath]['path']. '/' . $model->image))
            {
                unlink(imagePath()[$imagePath]['path']. '/' . $model->image);
            }
        }

        else
        {
            $model->delete();
        }
        
        $model->delete();
    }

}