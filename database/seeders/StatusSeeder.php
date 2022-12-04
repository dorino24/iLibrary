<?php

namespace Database\Seeders;

use App\Models\status;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuses')->insert([
            'status' => 'Available',
        ]);
        DB::table('statuses')->insert([
            'status' => 'Borrowed',
        ]);
        DB::table('statuses')->insert([
            'status' => 'Go To Library To Pick The Book',
        ]);

        // status::factory(2)->create();
    }
}
