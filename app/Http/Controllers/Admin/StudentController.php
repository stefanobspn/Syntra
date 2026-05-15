<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $query = User::where('role', 'student')->with('teacher');

        if ($request->filled('search')) {
            $query->where('name', 'like', '%'.$request->search.'%')
                ->orWhere('email', 'like', '%'.$request->search.'%')
                ->where('role', 'student');
        }

        $students = $query->paginate(10);
        $teachers = User::where('role', 'teacher')->get();
        $companies = \App\Models\Company::all();

        return view('admin.students', compact('students', 'teachers', 'companies'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', Rules\Password::defaults()],
            'teacher_id' => ['nullable', 'exists:users,id'],
            'company_id' => ['nullable', 'exists:companies,id'],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'student',
            'teacher_id' => $request->teacher_id,
            'company_id' => $request->company_id,
        ]);

        return back()->with('success', 'Siswa berhasil ditambahkan.');
    }

    public function update(Request $request, User $user)
    {
        if ($user->role !== 'student') {
            abort(404);
        }

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class.',email,'.$user->id],
            'teacher_id' => ['nullable', 'exists:users,id'],
            'company_id' => ['nullable', 'exists:companies,id'],
            'password' => ['nullable', Rules\Password::defaults()],
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->teacher_id = $request->teacher_id;
        $user->company_id = $request->company_id;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return back()->with('success', 'Data siswa berhasil diperbarui.');
    }

    public function destroy(User $user)
    {
        if ($user->role !== 'student') {
            abort(404);
        }

        $user->delete();

        return back()->with('success', 'Siswa berhasil dihapus.');
    }
}
