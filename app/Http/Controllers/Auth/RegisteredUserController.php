<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws ValidationException
     */
public function store(Request $request): RedirectResponse
{
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
        'role' => ['nullable', 'in:admin,student,teacher'],
    ]);

    // Default role
    $role = $request->role ?? 'student';

    // 🚨 ONLY ONE ADMIN RULE
    if ($role === 'admin') {
        $adminExists = User::where('role', 'admin')->exists();

        if ($adminExists) {
            $role = 'student'; // fallback
        }
    }

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'role' => $role,
        'password' => Hash::make($request->password),
    ]);

    event(new Registered($user));

    Auth::login($user);

    // 🎯 ROLE BASED REDIRECT (IMPORTANT)
    if ($user->role === 'admin') {
        return redirect('/admin/dashboard')
            ->with('success', 'Welcome Admin!');
    }

    return redirect('/')
        ->with('success', 'Registration Successful! Welcome to Johar College');
}}