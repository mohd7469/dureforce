<?php
require_once 'vendor/autoload.php';

use Illuminate\Support\Facades\Redis;

function storeRedisData($model,$key){
    $model_data = $model::all();
    if ($model_data){
        Redis::set($key, json_encode($model_data));
        return true;
    }
    else{
        return false;
    }
}

function getRedisData($model,$key){
    $redis_data =  json_decode(Redis::get($key));
    if ($redis_data){
        return $redis_data;
    }
    else{
        if ($model=="App\Models\Rank" || $model=="App\Models\ProjectLength" ){
            $model_data = $model::all();
        }
        elseif ( $model=="App\Models\JobType" || $model=="App\Models\BudgetType" || $model=="App\Models\ProjectStage" || $model=="App\Models\DOD"){
            $model_data = $model::orderBy('title', 'ASC')->get();
        }
        elseif ( $model=="App\Models\Category" || $model=="App\Models\Country" || $model=="App\Models\Deliverable"){
            $model_data = $model::orderBy('name', 'ASC')->get();
        }
        Redis::set($key, json_encode($model_data));
        return $model_data;
    }
}
