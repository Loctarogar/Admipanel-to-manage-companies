<?php

use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert([
            'name' => 'first company',
            'email' => Str::random(10).'@gmail.com',
            'logo' => Str::random(10),
            'website' => Str::random(8).'.com',
            'user_id' => '1',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);
        DB::table('companies')->insert([
            'name' => 'second company',
            'email' => Str::random(10).'@gmail.com',
            'logo' => Str::random(10),
            'website' => Str::random(8).'.com',
            'user_id' => '1',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);
        DB::table('companies')->insert([
            'name' => 'third company',
            'email' => Str::random(10).'@gmail.com',
            'logo' => Str::random(10),
            'website' => Str::random(8).'.com',
            'user_id' => '1',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);
    }
}
