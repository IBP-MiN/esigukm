<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('auth.profile');
    }

    public function updateProfile(Request $request)
    {
        // Form validation
        $request->validate([
            'name' =>  'required',
            'phone_no' => 'required',
            
        ]);

        // Get current user
        $user = User::findOrFail(auth()->user()->id);
        // Set user name
        $user->name = $request->input('name');
        $user->phone_no = $request->input('phone_no');

        // Persist user record to database
        $user->save();

        // Return user back and show a flash message
        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}
