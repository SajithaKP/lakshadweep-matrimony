<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = ['name', 'email', 'phone', 'password', 'gender', 'profile_photo', 'role', 'status', 'is_active'];
    protected $hidden = ['password', 'remember_token'];
    protected function casts(): array
    {
        return ['email_verified_at' => 'datetime', 'password' => 'hashed', 'is_active' => 'boolean'];
    }
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }
    public function familyDetail()
    {
        return $this->hasOne(FamilyDetail::class);
    }
    public function educationDetail()
    {
        return $this->hasOne(EducationDetail::class);
    }
    public function professionalDetail()
    {
        return $this->hasOne(ProfessionalDetail::class);
    }
    public function religiousDetail()
    {
        return $this->hasOne(ReligiousDetail::class);
    }
    public function lifestyleDetail()
    {
        return $this->hasOne(LifestyleDetail::class);
    }
    public function partnerPreference()
    {
        return $this->hasOne(PartnerPreference::class);
    }
    public function photos()
    {
        return $this->hasMany(UserPhoto::class);
    }
    
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
    public function testimonials()
    {
        return $this->hasMany(Testimonial::class);
    }
}
