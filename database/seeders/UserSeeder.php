<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'email'=>'oladayoahmod112@gmail.com',
            'name'=> 'oladayo ahmod',
            'password'=> Hash::make('olami')
        ]);
    }
}
