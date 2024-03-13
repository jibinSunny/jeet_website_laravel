<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name' => 'Lithin km',
            'dob' => '1992-12-20',
            'sex' => 'm',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('Jeet@123'),
            'phone' => '9747282318',
            'active' => '1',
            'usertype' => '1',
            'jod' => Carbon::now()->format('Y-m-d H:i:s'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
       ]);
    }
}
