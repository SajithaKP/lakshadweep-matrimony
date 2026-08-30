<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $r)
    {
        $gender = auth()->user()->gender === 'male' ? 'female' : 'male';
        $q = User::with(['profile', 'educationDetail', 'professionalDetail', 'religiousDetail'])->where('role', 'customer')->where('status', 'approved')->where('is_active', true)->where('gender', $gender);
        if ($r->filled('state')) $q->whereHas('profile', fn($x) => $x->where('state', $r->state));
        if ($r->filled('education')) $q->whereHas('educationDetail', fn($x) => $x->where('education_level', $r->education));
        if ($r->filled('occupation')) $q->whereHas('professionalDetail', fn($x) => $x->where('occupation', $r->occupation));
        $users = $q->latest()->paginate(12)->withQueryString();
        return view('search.index', compact('users'));
    }
    public function show(User $user)
    {
        abort_unless($user->status === 'approved' && $user->is_active && $user->role === 'customer', 404);
        if (auth()->user()->gender === $user->gender) abort(403);
        $user->load(['profile', 'familyDetail', 'educationDetail', 'professionalDetail', 'religiousDetail', 'lifestyleDetail', 'partnerPreference', 'photos']);
        return view('search.show', compact('user'));
    }
  

    public function matches()
    {
        return view('search.matches');
    }

    public function shortlist()
    {
        return view('search.shortlist');
    }
}
