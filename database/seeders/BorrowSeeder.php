<?php

namespace Database\Seeders;

use App\Models\borrow;
use Illuminate\Database\Seeder;

class BorrowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        borrow::factory(10)->create();
    }
}
