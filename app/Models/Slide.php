<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
   protected $fillable = [
        'title',
        'subtitle',
        'description',
        'image',
        'button_text',
        'button_url',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
