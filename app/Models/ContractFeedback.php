<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContractFeedback extends Model
{
    protected $table='contract_feedback';
    protected $fillable = [

        "role_id",
        "reason_end_contract_id",
        "not_recomended_reason_id",
        "language_level_id",
        "user_id",
        "recomended_score",
        "skills_score",
        "contract_id",
        "quality_of_work_score",
        "adherence_of_schedule_score",
        "communication_score",
        "availability_score",
        "cooperation_score",
        "total_score",
        "about",
        "feedback",
        "deleted_at"
    ];


    public function contract()
    {
        return $this->belongsTo(Contract::class, 'contract_id');
    }
    public function langLevel()
    {
        return $this->belongsTo(LanguageLevel::class, 'language_level_id');
    }
    public function reasonend()
    {
        return $this->belongsTo(ReasonEndContract::class, 'reason_end_contracts');
    }
    public function notrecomentreason()
    {
        return $this->belongsTo(NotRecomenededReason::class, 'not_recomended_reasons');
    }
    public function role(){
        return $this->belongsTo(Role::class,'role_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'feedback_for_id');
    }

}
