<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Show profile page.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update profile information (name, email, etc).
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();

        $user->fill($request->validated());

        // If email changed → force re-verification
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Update only the profile photo.
     */
    public function updatePhoto(Request $request): RedirectResponse
    {
        $request->validate([
            'foto' => ['required', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ]);

        $user = $request->user();

        // Delete old photo if exists
        if ($user->foto && file_exists(public_path('uploads/' . $user->foto))) {
            unlink(public_path('uploads/' . $user->foto));
        }

        // Upload new photo
        $fileName = time() . '.' . $request->foto->extension();
        $request->foto->move(public_path('uploads'), $fileName);

        $user->foto = $fileName;
        $user->save();

        return Redirect::back()->with('status', 'photo-updated');
    }

    /**
     * Delete profile photo.
     */
    public function deletePhoto(Request $request): RedirectResponse
    {
        $user = $request->user();

        if ($user->foto && file_exists(public_path('uploads/' . $user->foto))) {
            unlink(public_path('uploads/' . $user->foto));
        }

        $user->foto = null;
        $user->save();

        return Redirect::back()->with('status', 'photo-deleted');
    }

    /**
     * Delete account permanently.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        // Delete user photo before deleting account
        if ($user->foto && file_exists(public_path('uploads/' . $user->foto))) {
            unlink(public_path('uploads/' . $user->foto));
        }

        Auth::logout();
        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
