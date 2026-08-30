<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SlideController extends Controller
{
    public function index()
    {
        $slides = Slide::orderBy('sort_order')->orderBy('id')->get();

        return view('admin.slides.index', compact('slides'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:5120',
            'button_text' => 'nullable|string|max:100',
            'button_url' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
        ]);

        $validated['image'] = $request->file('image')
            ->store('slides', 'public');

        $validated['is_active'] = $request->has('is_active');
        $validated['sort_order'] = $request->sort_order ?? 0;

        Slide::create($validated);

        return back()->with('success', 'Slide added successfully.');
    }

    public function toggle(Slide $slide)
    {
        $slide->update([
            'is_active' => !$slide->is_active
        ]);

        return back()->with('success', 'Slide status updated.');
    }

    public function destroy(Slide $slide)
    {
        if ($slide->image) {
            Storage::disk('public')->delete($slide->image);
        }

        $slide->delete();

        return back()->with('success', 'Slide deleted successfully.');
    }
}