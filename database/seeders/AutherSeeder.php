<?php

namespace Database\Seeders;

use App\Models\auther;
use Illuminate\Database\Seeder;

class AutherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
            auther::factory(20)->create();
        
    }
}
