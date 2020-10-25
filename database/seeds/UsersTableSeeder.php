<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $defaultPassword = '1234';

        DB::table('users')->insert([
            'name'      => 'Ray',
            'account'   => 'ray',
            'pic'       => null,
            'info'      => null,
            'api_token' => Str::random(40),
            'password'  => Hash::make($defaultPassword),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'name'      => 'Vicky',
            'account'   => 'vicky',
            'email'     => 'fu3810299@gmail.com',
            'github'     => 'https://github.com/weichi1021',
            'pic'       => null,
            'info'      => null,
            'api_token' => Str::random(40),
            'password'  => Hash::make($defaultPassword),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
