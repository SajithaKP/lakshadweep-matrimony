<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $fillable = ['key', 'value'];
    public static function getValue(string $key, $default = null)
    {
        $s = static::where('key', $key)->first();
        return $s?->value ?? $default;
    }
    public static function setValue(string $key, $value): self
    {
        return static::updateOrCreate(['key' => $key], ['value' => $value]);
    }
}
