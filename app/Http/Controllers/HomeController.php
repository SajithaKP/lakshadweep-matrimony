<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use App\Models\User;
use App\Models\Testimonial;

class HomeController extends Controller
{
    public function index()
    {
        $featured = User::with(['profile', 'educationDetail', 'professionalDetail'])->where('role', 'customer')->where('status', 'approved')->where('is_active', true)->latest()->take(8)->get();
        $testimonials = Testimonial::where('is_active', true)->latest()->take(3)->get();
        $slides = Slide::where('is_active', true)
    ->orderBy('sort_order')
    ->orderBy('id')
    ->get();
        return view('home.index', compact('featured', 'testimonials', 'slides'));
    }
}
