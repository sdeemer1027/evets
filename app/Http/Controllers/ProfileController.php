<?php

namespace App\Http\Controllers;

use App\Models\User;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Mail\UserWaitingNotification;
use Illuminate\Support\Facades\Mail;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }



    public function show($id)
    {
        // Fetch the user by ID
        $user = User::findOrFail($id);

 /* This Will Send mail
        if ($user->isOnline()) {
            Mail::send([], [], function ($message) use ($user) {
                $message->to($user->email)
                    ->subject('I am waiting for you online')
                    ->html('Hello ' . $user->name . ', I am waiting for you online. Visit your dashboard to find me http://127.0.0.1:8000/dashboard');
            });
        }
*/


        // Pass the user data to the view
        return view('profile.show', compact('user'));
    }







    public function showsteve(Request $request): View
    {
        return view('profile.showsteve', [
            'user' => $request->user(),
        ]);
    }


    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
