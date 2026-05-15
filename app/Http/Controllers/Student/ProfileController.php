<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('student.profile', compact('user'));
    }
}
