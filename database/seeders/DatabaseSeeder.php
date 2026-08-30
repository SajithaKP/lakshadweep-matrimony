<?php

namespace Database\Seeders;

use App\Models\Slide;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Testimonial;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@lakshadweepmatrimony.com',
            'phone' => '9999999999',
            'password' => 'password',
            'gender' => 'male',
            'role' => 'admin',
            'status' => 'approved',
            'is_active' => true
        ]);


        // Happy Customer 1
        Testimonial::create([
            'name' => 'Aslam & Rihana',
            'message' => 'We found a meaningful connection through Lakshadweep Matrimony.',
            'is_active' => true
        ]);


        // Happy Customer 2
        Testimonial::create([
            'name' => 'Najeeb & Fathima',
            'message' => 'Simple, trusted and very helpful for our family. We are grateful to have found each other here.',
            'is_active' => true
        ]);


        // Happy Customer 3
        Testimonial::create([
            'name' => 'Shuhaib & Aisha',
            'message' => 'The best matrimonial service for Lakshadweep people. Highly recommended!',
            'is_active' => true
        ]);

               // SLIDE 1
        Slide::create([
            'title' => 'Find Your Life Partner',
            'subtitle' => 'Lakshadweep • Kerala • Beyond',
            'description' => 'Trusted matrimonial profiles for people from Lakshadweep and families everywhere.',
            'image' => 'slides/slide1.jpg',
            'button_text' => 'Register Now',
            'button_url' => '/register',
            'is_active' => true,
            'sort_order' => 1,
        ]);


        // SLIDE 2
        Slide::create([
            'title' => 'Your Journey to Marriage Starts Here',
            'subtitle' => 'Simple • Private • Trusted',
            'description' => 'Create your profile, complete your details and discover approved matches.',
            'image' => 'slides/slide2.jpg',
            'button_text' => 'Create Your Profile',
            'button_url' => '/register',
            'is_active' => true,
            'sort_order' => 2,
        ]);


        // SLIDE 3
        Slide::create([
            'title' => 'Made for Our Community',
            'subtitle' => 'Made for Our Community',
            'description' => 'Everyone deserves a chance to find a meaningful life partner.',
            'image' => 'slides/slide3.jpg',
            'button_text' => 'Join Lakshadweep Matrimony',
            'button_url' => '/register',
            'is_active' => true,
            'sort_order' => 3,
        ]);
    }
}