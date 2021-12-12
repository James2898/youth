<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'  => 'James Martinez',
            'gender' => '1',
            'email' => 'amajamesmartinez@gmail.com',
            'code_name' => 'badongbordado',
            'wishlist'  => 'panyo',
            'password'  => Hash::make('password'),
        ]);
    }
}
