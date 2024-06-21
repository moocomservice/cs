<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AppUser; // Import the AppUser model
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginSubmit(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        // Perform login authentication logic here
        $user = AppUser::where('username', $username)->first();

        if ($user && Hash::check($password, $user->password)) {
            // Authentication successful, store user in session
            Auth::login($user);
            return redirect('/profile');
        } else {
            // Authentication failed
            return back()->withErrors(['message' => 'Invalid username or password']);
        }
    }

    public function register(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'username' => 'required|unique:app_users,username',
            'email' => 'required|email|unique:app_users,email',
            'password' => 'required|min:6',
        ]);

        // Create a new user record in the "app_users" table
        $user = new AppUser();
        $user->username = $validatedData['username'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);
        $user->role = 'user'; // Set the default role

        try {
            $user->save();
            // Automatically log in the newly registered user
            Auth::login($user);
            return redirect('/profile');
        } catch (\Exception $e) {
            error_log($e->getMessage());
            return back()->withErrors(['message' => 'Error registering user.']);
        }
    }
}
