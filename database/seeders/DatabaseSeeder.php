<?php

namespace Database\Seeders;

use App\Models\status;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            AutherSeeder::class,
            PublisherSeeder::class,
            StatusSeeder::class,
            SettingsSeeder::class,
            BookSeeder::class,
            BorrowSeeder::class
        ]);
    }
}
