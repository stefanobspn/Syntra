<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
     * Show the registration view.
     */
    public function showRegister()
    {
        return view('auth.register');
    }

    /**
     * Handle a registration request.
     */
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'string', 'in:student,teacher,admin'],
        ], [
            'name.required' => 'Nama lengkap wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email ini sudah terdaftar. Silakan gunakan email lain.',
            'password.required' => 'Kata sandi wajib diisi.',
            'password.min' => 'Kata sandi harus terdiri dari minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi kata sandi tidak cocok.',
            'role.required' => 'Peran wajib dipilih.',
            'role.in' => 'Peran yang dipilih tidak valid.',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => $validated['role'],
        ]);

        Auth::login($user);

        return $this->redirectBasedOnRole($user->role);
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
