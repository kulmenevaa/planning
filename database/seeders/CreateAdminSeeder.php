<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class CreateAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'admin',
        ]);
        
        $user = User::create([
            'name' => 'kulmenevaa',
            'email' => 'andrey.kulmenev@yandex.ru',
            'password' => Hash::make('12345678')
        ]);
        $user->assignRole('admin');
    }
}
