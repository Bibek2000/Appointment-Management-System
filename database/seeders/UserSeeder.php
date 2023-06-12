<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('users')->insert([
            'id'=>1,
            'name'=>'Bibek',
            'email'=>'bibek@gmail.com',
            'password'=>Hash::make('admin123'),
            'role_id'=>1
        ]);
        DB::table('users')->insert([
            'id'=>2,
            'name'=>'Oshan',
            'email' => 'oshan@gmail.com',
            'password' =>Hash::make('admin123'),
            'role_id'=>2
        ]);
        DB::table('doctors')->insert([
            'id'=>1,
            'department'=>'Gyno',
            'license_no' => 234,
            'user_id'=>2
        ]);
        DB::table('users')->insert([
            'id'=>3,
            'name'=>'Sulav',
            'email' => 'sulav@gmail.com',
            'password' =>Hash::make('admin123'),
            'role_id'=>3
        ]);
    }
}
