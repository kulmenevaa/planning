<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Seeder;
use Database\Seeders\CreateAdminSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CreateAdminSeeder::class);
        News::factory(20)->create();
        // \App\Models\User::factory(10)->create();
    }
}
