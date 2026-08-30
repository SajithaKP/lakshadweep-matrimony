<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReligiousDetail extends Model
{
  protected $fillable = [
    'user_id',
    'religion',
    'religious_background',
    'religious_division',
    'quran_reading',
    'hijab',
    'prayer',
    'religious_values',
];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
