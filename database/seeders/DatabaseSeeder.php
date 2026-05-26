<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Journal;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        DB::table('notifications')->delete();
        DB::table('password_reset_tokens')->delete();
        DB::table('sessions')->delete();

        Journal::query()->delete();
        Task::query()->delete();
        User::query()->delete();
        Company::query()->delete();

        Schema::enableForeignKeyConstraints();

        $company = Company::firstOrCreate(
            ['name' => 'PT Syntra Demo'],
            [
                'industry' => 'Teknologi',
                'quota' => 10,
                'rating' => 4.8,
                'location' => 'Jakarta',
            ],
        );

        User::firstOrCreate(
            ['email' => 'admin@syntra.test'],
            [
                'name' => 'Admin Syntra',
                'password' => 'password',
                'role' => 'admin',
            ],
        );

        $teacher = User::firstOrCreate(
            ['email' => 'teacher@syntra.test'],
            [
                'name' => 'Guru Pembimbing',
                'password' => 'password',
                'role' => 'teacher',
            ],
        );

        $student = User::firstOrCreate(
            ['email' => 'student@syntra.test'],
            [
                'name' => 'Siswa Demo',
                'password' => 'password',
                'role' => 'student',
                'teacher_id' => $teacher->id,
                'company_id' => $company->id,
            ],
        );

        Journal::firstOrCreate(
            [
                'user_id' => $student->id,
                'date' => now()->toDateString(),
                'activity' => 'Mengerjakan dokumentasi aplikasi',
            ],
            [
                'description' => 'Menyiapkan materi presentasi dan alur demo aplikasi.',
                'status' => 'pending',
                'teacher_notes' => null,
            ],
        );

        Journal::firstOrCreate(
            [
                'user_id' => $student->id,
                'date' => now()->subDay()->toDateString(),
                'activity' => 'Menyusun halaman dashboard',
            ],
            [
                'description' => 'Membuat komponen dashboard untuk tampilan siswa.',
                'status' => 'approved',
                'teacher_notes' => 'Sudah rapi dan siap dipresentasikan.',
            ],
        );

        Task::firstOrCreate(
            [
                'user_id' => $student->id,
                'title' => 'Finalisasi presentasi demo',
            ],
            [
                'description' => 'Cek kembali login, dashboard, dan laporan sebelum presentasi.',
                'priority' => 'high',
                'due_date' => now()->addDay()->toDateString(),
                'status' => 'pending',
            ],
        );
    }
}
