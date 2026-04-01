<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SuperadminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user= User::create([
    'name' => 'Christopher',
    'ap_user' => 'Vizuet',
    'am_user' => 'Lazo',
    'email' => 'Christopher@medical.com',
    'password' => Hash::make('contraseña'),
    
]);
        $user->assignRole('superadmin');
    
    }
}
