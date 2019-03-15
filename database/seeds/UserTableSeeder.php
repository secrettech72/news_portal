<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert([
            'usernames'=>'root@admin.com',
            'first_name'=>'root@admin.com',
            'last_name'=>'root@admin.com',
            'email'=>'root@admin.com',
            'password'=>bcrypt('root'),
            'status'=>1,
        ]);
    }
}
