<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
    'user_id',
    'date_of_birth',
    'height',
    'weight',
    'marital_status',
    'children',
    'mother_tongue',
    'languages_spoken',
    'state',
    'district',
    'location',
    'about',
];
    protected $casts = ['date_of_birth' => 'date'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
