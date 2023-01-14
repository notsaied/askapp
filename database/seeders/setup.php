<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class setup extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            'name' => 'Ahemd Saied',
            'email' => 'ahmed@gmail.com',
            'phone' => '01000000000',
            'password' => bcrypt('123456'),
            'gender' => 0
        ]);

        \App\Models\Question::create([
            'user_id' => 1,
            'description' => 'yah this is first question from me bruh'
        ]);

        \App\Models\Question::create([
            'user_id' => 1,
            'description' => 'Hi Dude, seconds question'
        ]);

        \App\Models\Comment::create([
            'user_id' => 1,
            'question_id' => 1,
            'comment' => 'this is first at app from me'
        ]);

        \App\Models\Ad::create([
            'user_id' => 1,
            'title' => 'This title bru',
            'description' => 'this is first ads frome me bruh'
        ]);

        \App\Models\Admin::create([
            'username' => 'admin',
            'password' => bcrypt('123456')
        ]);

    }
}
