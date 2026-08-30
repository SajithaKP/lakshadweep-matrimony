<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfessionalDetail extends Model
{
    protected $fillable = ['user_id', 'occupation', 'job_title', 'company', 'work_location', 'income', 'experience'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
