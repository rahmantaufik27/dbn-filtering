<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->insert([
            'id'   => 1,
            'user_id'   => 1,
            'nis'       => '1415000999',
            'name'      => 'Mail Supriyadi',
            'role'      => 'student',
            'class'     => 'A',
            'id_knowledge_level'  => 1,
            'id_rule_of_bug'      => 1,
        ]);

       

        DB::table('students')->insert([
            'id'        => 2,
            'user_id'   => 2,
            'nis'       => '1415000000',
            'name'      => 'Jajang Sukma',
            'role'      => 'student',
            'class'     => 'A',
            'id_knowledge_level'  => 1,
            'id_rule_of_bug'      => 1,
        ]);

        DB::table('teachers')->insert([
            'id'        => 3,
            'user_id'   => 3,
            'subject'    => 'Math',
            'name'      => 'Tatang Rahmat'
        ]);

        DB::table('admins')->insert([
            'id'        => 4,
            'user_id'   => 4,
            'name'      => 'Superuser',
        ]);
    }
}
