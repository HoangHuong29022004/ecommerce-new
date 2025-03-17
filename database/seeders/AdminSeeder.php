<?php

namespace Database\Seeders;

use App\Models\NguoiDung;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        NguoiDung::create([
            'ten' => 'Admin',
            'email' => 'admin@example.com',
            'mat_khau' => Hash::make('password'),
            'vai_tro' => 'admin',
        ]);
    }
}
