<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LifestyleDetail extends Model
{
    protected $fillable = [
    'user_id',
    'smoking',
    'drinking',
    'food_preference',
    'exercise',
    'hobbies',
    'interests',
    'lifestyle_description',
];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
