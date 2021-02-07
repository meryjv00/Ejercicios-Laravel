<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Article;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder {

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        // \App\Models\User::factory(10)->create();
//        $this->call(ArticlesTableSeeder::class);
//        $this->call(UsersTableSeeder::class);
        $faker = \Faker\Factory::create();

        // Let's make sure everyone has the same password and
        // let's hash it before the loop, or else our seeder
        // will be too slow.
        $password = Hash::make('netireki');

        User::create([
            'name' => 'Admin',
            'email' => 'admin@test.com',
            'password' => $password,
        ]);

        // And now let's generate a few dozen users for our app:
        for ($i = 0; $i < 10; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => $password,
            ]);
        }

        // And now, let's create a few articles in our database:
        for ($i = 0; $i < 50; $i++) {
            Article::create([
                'title' => $faker->sentence,
                'body' => $faker->paragraph,
            ]);
        }
    }

}
