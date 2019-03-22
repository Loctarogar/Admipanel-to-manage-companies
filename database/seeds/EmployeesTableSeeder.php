<?php

use Illuminate\Database\Seeder;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->insert([
            'firstname' => 'first employee',
            'lastname' => 'first emploee',
            'email' => Str::random(10).'@mail.com',
            'phone' => Str::random(8),
            'created_at' => NOW(),
            'updated_at' => NOW(),
            'company_id' => 1
        ]);
        DB::table('employees')->insert([
            'firstname' => 'second employee',
            'lastname' => 'second emploee',
            'email' => Str::random(10).'@mail.com',
            'phone' => Str::random(8),
            'created_at' => NOW(),
            'updated_at' => NOW(),
            'company_id' => 2
        ]);
        DB::table('employees')->insert([
            'firstname' => 'third employee',
            'lastname' => 'third emplyoee',
            'email' => Str::random(10).'@mail.com',
            'phone' => Str::random(8),
            'created_at' => NOW(),
            'updated_at' => NOW(),
            'company_id' => 3
        ]);
    }
}
