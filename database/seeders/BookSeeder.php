<?php

namespace Database\Seeders;

use App\Models\book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
            book::factory(50)->create();
       
    }
}
