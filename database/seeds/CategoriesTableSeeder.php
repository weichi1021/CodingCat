<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('categories')->insert([ 
            'name'        => 'HTML',
            'updated_user'=> 2,
            'created_at'  => date('Y-m-d H:i:s'),
            'updated_at'  => date('Y-m-d H:i:s')
        ]);

        DB::table('categories')->insert([
            'name'        => 'PHP',
            'updated_user'=> 1,
            'created_at'  => date('Y-m-d H:i:s'),
            'updated_at'  => date('Y-m-d H:i:s')
        ]);

        DB::table('categories')->insert([
            'name'        => 'Adobe XD',
            'updated_user'=> 2,
            'created_at'  => date('Y-m-d H:i:s'),
            'updated_at'  => date('Y-m-d H:i:s')
        ]);

        DB::table('categories')->insert([
            'name'        => 'CSS',
            'updated_user'=> 2,
            'created_at'  => date('Y-m-d H:i:s'),
            'updated_at'  => date('Y-m-d H:i:s')
        ]);

        DB::table('categories')->insert([
            'name'        => 'JS',
            'updated_user'=> 2,
            'created_at'  => date('Y-m-d H:i:s'),
            'updated_at'  => date('Y-m-d H:i:s')
        ]);

        DB::table('categories')->insert([
            'name'        => 'Datebase',
            'updated_user'=> 1,
            'created_at'  => date('Y-m-d H:i:s'),
            'updated_at'  => date('Y-m-d H:i:s')
        ]);
    }
}
