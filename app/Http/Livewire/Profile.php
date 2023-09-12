<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Illuminate\Http\Request;

class Profile extends Component
{
    public $first_name, $last_name, $birthday, $gender,
    $street_address, $city, $state, $postal_code, $country,
    $job_name, $description, $account_type, $image;

    public function update(Request $request)
    {


        $user = Auth::user()->user();
        $old_image = $user->profile->image;
        $data = $request->except('image');

        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'birthday' => ['nullable', 'date', 'before:today'],
            'gender' => ['in:male,female'],

        ]);

/*
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('Profiles', ['disk' => 'public']);
            $data['image'] = $path;
        }

        if ($old_image && isset($data['image'])) {
            Storage::disk('public')->delete($old_image);
        }

*/
        $user->profile->fill($data)->save();

        return redirect()->route('profile.edit')
            ->with('success', 'Profile updated!');

    }

    public function render()
    {
        $user = Auth::user();
        return view('livewire.profile', compact('user'));
    }
}
