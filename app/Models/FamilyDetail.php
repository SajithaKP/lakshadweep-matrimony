<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FamilyDetail extends Model
{
    protected $fillable = ['user_id','house_name', 'father_name', 'father_occupation', 'mother_name', 'mother_occupation', 'brothers', 'sisters', 'family_type', 'family_status', 'family_location'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
