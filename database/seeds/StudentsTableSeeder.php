<?php

use Illuminate\Database\Seeder;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'phone' =>  mt_rand(), 
            'image' => Str::random(10),
            'department' => Str::random(10),
            'address' => Str::random(10),
        ]);
        DB::table('students')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'phone' =>  mt_rand(), 
            'image' => Str::random(10),
            'department' => Str::random(10),
            'address' => Str::random(10),
        ]);
        DB::table('students')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'phone' =>  mt_rand(), 
            'image' => Str::random(10),
            'department' => Str::random(10),
            'address' => Str::random(10),
        ]);
        DB::table('students')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'phone' =>  mt_rand(), 
            'image' => Str::random(10),
            'department' => Str::random(10),
            'address' => Str::random(10),
        ]);
        DB::table('students')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'phone' =>  mt_rand(), 
            'image' => Str::random(10),
            'department' => Str::random(10),
            'address' => Str::random(10),
        ]);
    }
}
