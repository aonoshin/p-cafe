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
        DB::table('users')->insert(
            [
                [
                    'id' => 1,
                    'name' => 'aono',
                    'age' => 28,
                    'gender' => 1,
                    'email' => 'aono@gmail.com',
                    'password' => bcrypt('oranda0226'),
                    'created_at' => new DateTime(),
                    'updated_at' => new DateTime(),
                ],
                [
                    'id' => 2,
                    'name' => 'omasa',
                    'age' => 29,
                    'gender' => 0,
                    'email' => 'omasa@gmail.com',
                    'password' => bcrypt('omasa12345678'),
                    'created_at' => new DateTime(),
                    'updated_at' => new DateTime(),
                ],
            ]
        );
    }
}
