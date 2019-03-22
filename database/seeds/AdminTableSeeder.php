<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name' =>Str::random(10),
            'email' =>'some@email.com',
            'password' => bcrypt('12345678'),
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);
    }
}
