<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PartnerPreference extends Model
{
    protected $fillable = [
        'user_id',
        'age_from',
        'age_to',
        'height_from',
        'height_to',
        'marital_status',
        'education',
        'occupation',
        'state',
        'district',
        'language',
        'religious_background',
        'expectations',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
