<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use mysql_xdevapi\Table;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role'=> 'admin',
            'name'=>"Admin",
            'email'=>"admin@gmail.com",
            'email_verified_at'=> now(),
            'password' => Hash::make('adminadmin'),

        ]);


    }
}
