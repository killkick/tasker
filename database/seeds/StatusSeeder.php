<?php

use Illuminate\Database\Seeder;

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
            'status' => 'New'
        ]);
        DB::table('statuses')->insert([
            'status' => 'In Active'
        ]);
        DB::table('statuses')->insert([
            'status' => 'Done'
        ]);
    }
}
