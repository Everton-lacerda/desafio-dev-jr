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
        for($i=0; $i<2; $i++ ){
            DB::table('user')->insert([
                'name' => Str_random(10),
                'email' => Str_random(10).'@gmail.com',
                'password' => bcrypt('password'),
            ]);
        }
    }
}
