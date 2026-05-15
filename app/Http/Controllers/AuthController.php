<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * Show the login view.
     */
    public function showLogin()
    {
        return view('auth.login');
    }

    /**
     * Handle an authentication attempt.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], [
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'password.required' => 'Kata sandi wajib diisi.',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return $this->redirectBasedOnRole(Auth::user()->role);
        }

        throw ValidationException::withMessages([
            'email' => 'Email atau kata sandi salah. Silakan coba lagi.',
        ]);
    }

    /**
     * Log the user out of the application.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    /**
     * Redirect the user based on their role.
     */
    protected function redirectBasedOnRole(string $role)
    {
        return match ($role) {
            'student' => redirect()->route('student.dashboard'),
            'teacher' => redirect()->route('teacher.dashboard'),
            'admin' => redirect()->route('admin.dashboard'),
            default => redirect('/'),
        };
    }
}
