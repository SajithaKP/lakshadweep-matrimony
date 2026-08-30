<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\UserPhoto;

class ProfileController extends Controller
{
    public function dashboard()
    {
        $u = auth()->user()->load([
            'profile',
            'familyDetail',
            'educationDetail',
            'professionalDetail',
            'religiousDetail',
            'lifestyleDetail',
            'partnerPreference',
             'photos'
        ]);

        return view('profile.dashboard', compact('u'));
    }
    public function show()
    {
        $u = auth()->user()->load([
            'profile',
            'familyDetail',
            'educationDetail',
            'professionalDetail',
            'religiousDetail',
            'lifestyleDetail',
            'partnerPreference',
             'photos'
        ]);

        return view('profile.show', compact('u'));
    }

    public function edit()
    {
        $u = auth()->user()->load([
            'profile',
            'familyDetail',
            'educationDetail',
            'professionalDetail',
            'religiousDetail',
            'lifestyleDetail',
            'partnerPreference',
                'photos'
        ]);

        return view('profile.edit', compact('u'));
    }

    public function update(Request $r)
    {
        $u = auth()->user();

        $r->validate([
            'name' => 'required|string|max:100',

            'phone' => 'required|string|max:30|unique:users,phone,' . $u->id,

            'date_of_birth' => 'nullable|date',

           'profile_photo' =>
                'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'photos' => 'nullable|array|max:10',

            'photos.*' =>
                'image|mimes:jpg,jpeg,png,webp|max:2048',
                
        ]);

        /*
        |--------------------------------------------------------------------------
        | USER
        |--------------------------------------------------------------------------
        */

        $u->update([
            'name' => $r->name,
            'phone' => $r->phone,
        ]);


        /*
        |--------------------------------------------------------------------------
        | BASIC PROFILE
        |--------------------------------------------------------------------------
        */

        $u->profile()->updateOrCreate(
            ['user_id' => $u->id],
         
            [
                'date_of_birth' => $r->date_of_birth,
                'height' => $r->height,
                'weight' => $r->weight,
                'children' => $r->children,
                'languages_spoken' => $r->languages_spoken,
                'marital_status' => $r->marital_status,
                'mother_tongue' => $r->mother_tongue,
                'state' => $r->state,
                'district' => $r->district,
                'location' => $r->location,
                'about' => $r->about,
            ]
            
        );

        /*
        |--------------------------------------------------------------------------
        | ADDITIONAL PROFILE PHOTOS
        |--------------------------------------------------------------------------
        */

        if ($r->hasFile('photos')) {

            foreach ($r->file('photos') as $photo) {

                $path = $photo->store('user-photos', 'public');

                $u->photos()->create([
                    'image' => $path,
                    'is_primary' => false,
                    'approved' => true,
                ]);
            }
        }


        /*
        |--------------------------------------------------------------------------
        | FAMILY DETAILS
        |--------------------------------------------------------------------------
        */

        $u->familyDetail()->updateOrCreate(
            ['user_id' => $u->id],
            [

                'house_name' => $r->house_name,
                'father_name' => $r->father_name,
                'father_occupation' => $r->father_occupation,
                'mother_name' => $r->mother_name,
                'mother_occupation' => $r->mother_occupation,
                'brothers' => $r->brothers,
                'sisters' => $r->sisters,
                'family_type' => $r->family_type,
                'family_status' => $r->family_status,
                'family_location' => $r->family_location,
            ]
        );


        /*
        |--------------------------------------------------------------------------
        | EDUCATION DETAILS
        |--------------------------------------------------------------------------
        */

        $u->educationDetail()->updateOrCreate(
            ['user_id' => $u->id],
            // [
            //     'education_level' => $r->education_level,
            //     'course' => $r->course,
            //     'institution' => $r->institution,
            //     'education_details' => $r->education_details,
            // ]
            [
                'education_level' => $r->education_level,
                'course' => $r->course,
                'institution' => $r->institution,
                'education_details' => $r->education_details,

                'tenth_school' => $r->tenth_school,
                'tenth_percentage' => $r->tenth_percentage,

                'plus_two_stream' => $r->plus_two_stream,
                'plus_two_school' => $r->plus_two_school,
                'plus_two_percentage' => $r->plus_two_percentage,

                'additional_education' => $r->additional_education
                    ? json_encode($r->additional_education)
                    : null,
            ]
        );


        /*
        |--------------------------------------------------------------------------
        | PROFESSIONAL DETAILS
        |--------------------------------------------------------------------------
        */

        $u->professionalDetail()->updateOrCreate(
            ['user_id' => $u->id],
            [
                'occupation' => $r->occupation,
                'job_title' => $r->job_title,
                'company' => $r->company,
                'work_location' => $r->work_location,
                'income' => $r->income,
                'experience' => $r->experience,
            ]
        );


        /*
        |--------------------------------------------------------------------------
        | RELIGIOUS DETAILS
        |--------------------------------------------------------------------------
        */

        $u->religiousDetail()->updateOrCreate(
            ['user_id' => $u->id],
            [
                'religion' => $r->religion,

                'religious_background' =>
                    $r->religious_background,

                'religious_division' =>
                    $r->religious_division,

                'quran_reading' =>
                    $r->quran_reading,

                'hijab' =>
                    $r->hijab,

                'prayer' =>
                    $r->prayer,

                'religious_values' =>
                    $r->religious_values,
            ]
        );


        /*
        |--------------------------------------------------------------------------
        | LIFESTYLE DETAILS
        |--------------------------------------------------------------------------
        */

        $u->lifestyleDetail()->updateOrCreate(
            ['user_id' => $u->id],
            [
                'smoking' => $r->smoking,
                'drinking' => $r->drinking,
                'food_preference' => $r->food_preference,
                'exercise' => $r->exercise,

                'hobbies' => $r->hobbies,
                'interests' => $r->interests,

                'lifestyle_description' =>
                    $r->lifestyle_description,
            ]
        );


        /*
        |--------------------------------------------------------------------------
        | PARTNER PREFERENCES
        |--------------------------------------------------------------------------
        */

        $u->partnerPreference()->updateOrCreate(
            ['user_id' => $u->id],
            [
                'age_from' => $r->age_from,
                'age_to' => $r->age_to,

                'height_from' => $r->height_from,
                'height_to' => $r->height_to,

                'marital_status' =>
                    $r->partner_marital_status,

                'education' =>
                    $r->partner_education,

                'occupation' =>
                    $r->partner_occupation,

                'state' =>
                    $r->partner_state,

                'district' =>
                    $r->partner_district,

                'language' =>
                    $r->partner_language,

                'religious_background' =>
                    $r->partner_religious_background,

                'expectations' =>
                    $r->expectations,
            ]
        );


        /*
        |--------------------------------------------------------------------------
        | PROFILE PHOTO
        |--------------------------------------------------------------------------
        */

        if ($r->hasFile('profile_photo')) {

            $old = $u->profile_photo;

            $p = $r->file('profile_photo')
                   ->store('profiles', 'public');

            $u->update([
                'profile_photo' => $p
            ]);

            if ($old) {
                Storage::disk('public')->delete($old);
            }
        }


        return back()->with(
            'success',
            'Profile updated successfully.'
        );
    }

    public function toggleStatus()
    {
        $u = auth()->user();

        $u->update([
            'is_active' => !$u->is_active
        ]);

        return back()->with(
            'success',
            $u->is_active
                ? 'Profile activated.'
                : 'Profile deactivated.'
        );
    }

    public function deleteAccount()
    {
        $u = auth()->user();

        $u->delete();

        Auth()->logout();

        return redirect()
            ->route('home')
            ->with(
                'success',
                'Your account was deleted.'
            );
    }
}