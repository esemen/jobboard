<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Country;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    protected function edit()
    {
        $countries = Country::select(['id', 'name'])->get();

        return view('jobseeker.profile.edit', [
                'countries' => $countries
            ]
        );
    }

    protected function update(ProfileUpdateRequest $request)
    {
        auth()->user()
            ->fill($request->validated())
            ->country()->associate($request->country_id)
            ->save();

        session()->flash('success', 'Profile updated successfully');

        return redirect(route('dashboard'));
    }

    protected function modeSelect(Request $request)
    {
        return view('jobseeker.profile.mode-select');
    }

    protected function modeStore(Request $request)
    {
        $request->validate([
            'mode' => [
                'required',
                Rule::in(['RECRUITER', 'JOBSEEKER']),
            ],
        ]);

        $user = Auth::user();
        $user->update([
            'user_mode' => $request->get('mode')
        ]);

        return redirect(route('home'));
    }
}
