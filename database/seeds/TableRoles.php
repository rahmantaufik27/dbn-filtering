<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TableRoles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('roles')->insert([
            'id'       => 2,
            'name' => 'student'
        ]);

        DB::table('roles')->insert([
            'id'       => 1,
            'name' => 'admin'
        ]);

        DB::table('roles')->insert([
            'id'       => 3,
            'name' => 'teacher'
        ]);
    }
}
