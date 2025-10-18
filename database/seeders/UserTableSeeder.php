<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        User::truncate();
        User::create([
           'name'=>'Syed Ali Shah',
           'email'=>'syedalishah@gmail.com',
           'password'=>Hash::make('alicfc$'),
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    }
}
