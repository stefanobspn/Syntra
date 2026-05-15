<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::withCount('students')->get();

        return view('admin.companies', compact('companies'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'industry' => ['nullable', 'string', 'max:255'],
            'quota' => ['required', 'integer', 'min:0'],
            'rating' => ['required', 'numeric', 'min:0', 'max:5'],
            'location' => ['nullable', 'string'],
        ]);

        Company::create($validated);

        return back()->with('success', 'Perusahaan berhasil ditambahkan.');
    }

    public function update(Request $request, Company $company)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'industry' => ['nullable', 'string', 'max:255'],
            'quota' => ['required', 'integer', 'min:0'],
            'rating' => ['required', 'numeric', 'min:0', 'max:5'],
            'location' => ['nullable', 'string'],
        ]);

        $company->update($validated);

        return back()->with('success', 'Data perusahaan berhasil diperbarui.');
    }

    public function destroy(Company $company)
    {
        $company->delete();

        return back()->with('success', 'Perusahaan berhasil dihapus.');
    }
}
