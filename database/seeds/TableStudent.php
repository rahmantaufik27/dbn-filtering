<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TableStudent extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id'       => 1,
            'role_id'  => 2,
            'username' => 'student1',
            'email'    => 'student1@mail.com',
            'password' => bcrypt('student1'),
        ]);

        DB::table('users')->insert([
            'id'       => 2,
            'role_id'  => 2,
            'username' => 'student2',
            'email'    => 'student2@mail.com',
            'password' => bcrypt('student2'),
        ]);

        DB::table('users')->insert([
            'id'       => 3,
            'role_id'  => 3,
            'username' => 'teacher1',
            'email'    => 'teacher1@mail.com',
            'password' => bcrypt('teacher1'),
        ]);

        DB::table('users')->insert([
            'id'       => 4,
            'role_id'  => 1,
            'username' => 'admin',
            'email'    => 'admin@mail.com',
            'password' => bcrypt('admin'),
        ]);
    }
}
