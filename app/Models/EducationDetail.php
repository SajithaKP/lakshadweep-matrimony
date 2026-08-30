<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EducationDetail extends Model
{
    protected $fillable = [
        'user_id',
        'education_level',
        'course',
        'institution',
        'education_details',

        'tenth_school',
        'tenth_percentage',

        'plus_two_stream',
        'plus_two_school',
        'plus_two_percentage',

        'additional_education',
    ];

    protected $casts = [
        'additional_education' => 'array',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
