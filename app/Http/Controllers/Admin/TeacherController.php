<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class TeacherController extends Controller
{
    public function index(Request $request)
    {
        $query = User::where('role', 'teacher')->withCount('students');

        if ($request->filled('search')) {
            $query->where('name', 'like', '%'.$request->search.'%')
                ->orWhere('email', 'like', '%'.$request->search.'%')
                ->where('role', 'teacher');
        }

        $teachers = $query->paginate(10);

        return view('admin.teachers', compact('teachers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', Rules\Password::defaults()],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'teacher',
        ]);

        return back()->with('success', 'Guru berhasil ditambahkan.');
    }

    public function update(Request $request, User $user)
    {
        if ($user->role !== 'teacher') {
            abort(404);
        }

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class.',email,'.$user->id],
            'password' => ['nullable', Rules\Password::defaults()],
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return back()->with('success', 'Data guru berhasil diperbarui.');
    }

    public function destroy(User $user)
    {
        if ($user->role !== 'teacher') {
            abort(404);
        }

        // Remove relationships before delete
        User::where('teacher_id', $user->id)->update(['teacher_id' => null]);

        $user->delete();

        return back()->with('success', 'Guru berhasil dihapus.');
    }
}
