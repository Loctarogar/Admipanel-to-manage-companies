<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'first user',
            'email' => 'Some@email.com',
            'password' => bcrypt('12345678'),
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ]);
    }
}
