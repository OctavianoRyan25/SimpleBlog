<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\category;
use App\Models\post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::factory(5)->create();

        category::create([
            'name' => 'Laravel',
            'slug' => 'laravel',
            'color' => 'danger'
        ]);

        category::create([
            'name' => 'Golang',
            'slug' => 'golang',
            'color' => 'info'
        ]);

        category::create([
            'name' => 'Java',
            'slug' => 'java',
            'color' => 'success'
        ]);

        category::create([
            'name' => 'Java Script',
            'slug' => 'javascript',
            'color' => 'warning'
        ]);

        category::create([
            'name' => 'C++',
            'slug' => 'cplus',
            'color' => 'primary'
        ]);

        post::factory(25)->create();
        post::create([
            'category_id' => 5,
            'user_id' => 2,
            'title' => 'Latihan laravel 1',
            'slug' => 'latihan-laravel1',
            'excerpt' => 'Lorem ipsuahdufenw3ij',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident debitis cumque dolore incidunt sint cum veritatis nihil velit dicta, explicabo id molestias dignissimos animi?'
        ]);

        post::create([
            'category_id' => 5,
            'user_id' => 2,
            'title' => 'Latihan laravel 2',
            'slug' => 'latihan-laravel2',
            'excerpt' => 'Lorem ipsuahdufenw3ij',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident debitis cumque dolore incidunt sint cum veritatis nihil velit dicta, explicabo id molestias dignissimos animi? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident debitis cumque dolore incidunt sint cum veritatis nihil velit dicta, explicabo id molestias dignissimos animi?'
        ]);

        User::create([
            'name' => 'Octaviano Ryan Eka',
            'username' => 'ryan175',
            'is_admin' => true,
            'email' => 'octavianoryan666@gmail.com',
            'password' => Hash::make('admin'),
        ]);
    }
}
