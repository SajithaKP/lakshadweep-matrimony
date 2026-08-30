<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserPhoto extends Model
{
    protected $fillable = ['user_id', 'image', 'is_primary', 'approved'];
    protected $casts = ['is_primary' => 'boolean', 'approved' => 'boolean'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
