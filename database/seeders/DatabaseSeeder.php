<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create(
            ['name' => 'youness',
            'email' => 'maska@maska.com',
            'profile_url' => null,
            'password' => \bcrypt('password'),
            ]
        );

        \App\Models\Comment::factory(10)->create(
            ['body' => ' asjhdb asbdj habsjdh bajhsbd asd',
             'useer_id' => '1',
             'post_id' => 21
            ]
        );
    }
}
