<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModuleChatUser extends Model
{
    use HasFactory;
    protected const ModelColor = [
        'JOB'     => 'badge--primary',
        'SERVICE'  =>'badge--success',
        'SOFTWARE' =>'badge--danger',
    ];
    protected $fillable = ['sender_id','send_to_id','module_type','module_id','proposal_uuid'];
    
    protected $appends = ["model","model_color"];

    public function user()
    {
        return $this->belongsTo(User::class, 'send_to_id')->with('basicProfile');
    }
    public function getModelAttribute() {

        return  class_basename($this->attributes['module_type']);
        
    }
    public function getModelColorAttribute() {

        $model_color='';
        $model=class_basename($this->attributes['module_type']);
        if($model=='Software')
            $model_color=self::ModelColor['SOFTWARE'];
        elseif($model=='Service')
            $model_color=self::ModelColor['SERVICE'];
        else
            $model_color=self::ModelColor['JOB'];
        
        return 'badge '.$model_color;

    }
    public function send_to_user()
    {
        return $this->belongsTo(User::class, 'sender_id')->with('basicProfile');
    }
    public function module()
    {
        return $this->morphTo('module');

    }
}
