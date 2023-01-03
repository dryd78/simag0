<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'Deni Ruhyadi',
            'username' => 'dryd',
            'email' => 'dryd78@gmail.com',
            'password' => bcrypt('231102')
        ]);

        // User::create([
        //     'name' => 'Anggita Jumena',
        //     'email' => 'anggita78@gmail.com',
        //     'password' => bcrypt('112302')
        // ]);

        User::factory(3)->create();

        Category:: create([
            'name' => 'Web Programing',
            'slug' => 'web-programing'
        ]);
        
        Category:: create([
            'name' => 'Web Design',
            'slug' => 'web-design'
        ]);

        Category:: create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        Post::factory(20)->create();

        // Post::create([
        //     'title' => 'Judul Pertama',
        //     'slug' => 'judul-pertama',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta, obcaecati! Aspernatur quaerat harum dolorum, eaque nesciunt quo minus qui est eveniet vitae temporibus sed porro, nostrum inventore laudantium perspiciatis possimus iure voluptate maiores, quod architecto vel quia! Sint rem a quisquam voluptatum aut, atque facere assumenda! Praesentium, debitis suscipit! Maxime eaque, fugit atque deserunt cumque dolorum, hic, reiciendis est quas quos earum fugiat dolor iste doloribus assumenda suscipit officia quidem a quaerat laboriosam ut culpa laudantium perspiciatis voluptates? Molestias modi quis quibusdam, necessitatibus quos labore dolor debitis nisi tenetur? Nemo laborum minus dolore corporis dignissimos perspiciatis maiores iste est aliquid.',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);

        // Post::create([
        //     'title' => 'Judul Kedua',
        //     'slug' => 'judul-kedua',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta, obcaecati! Aspernatur quaerat harum dolorum, eaque nesciunt quo minus qui est eveniet vitae temporibus sed porro, nostrum inventore laudantium perspiciatis possimus iure voluptate maiores, quod architecto vel quia! Sint rem a quisquam voluptatum aut, atque facere assumenda! Praesentium, debitis suscipit! Maxime eaque, fugit atque deserunt cumque dolorum, hic, reiciendis est quas quos earum fugiat dolor iste doloribus assumenda suscipit officia quidem a quaerat laboriosam ut culpa laudantium perspiciatis voluptates? Molestias modi quis quibusdam, necessitatibus quos labore dolor debitis nisi tenetur? Nemo laborum minus dolore corporis dignissimos perspiciatis maiores iste est aliquid.',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);

        // Post::create([
        //     'title' => 'Judul Ketiga',
        //     'slug' => 'judul-ketiga',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta, obcaecati! Aspernatur quaerat harum dolorum, eaque nesciunt quo minus qui est eveniet vitae temporibus sed porro, nostrum inventore laudantium perspiciatis possimus iure voluptate maiores, quod architecto vel quia! Sint rem a quisquam voluptatum aut, atque facere assumenda! Praesentium, debitis suscipit! Maxime eaque, fugit atque deserunt cumque dolorum, hic, reiciendis est quas quos earum fugiat dolor iste doloribus assumenda suscipit officia quidem a quaerat laboriosam ut culpa laudantium perspiciatis voluptates? Molestias modi quis quibusdam, necessitatibus quos labore dolor debitis nisi tenetur? Nemo laborum minus dolore corporis dignissimos perspiciatis maiores iste est aliquid.',
        //     'category_id' => 2,
        //     'user_id' => 1
        // ]);

        // Post::create([
        //     'title' => 'Judul Keempat',
        //     'slug' => 'judul-keempat',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta, obcaecati! Aspernatur quaerat harum dolorum, eaque nesciunt quo minus qui est eveniet vitae temporibus sed porro, nostrum inventore laudantium perspiciatis possimus iure voluptate maiores, quod architecto vel quia! Sint rem a quisquam voluptatum aut, atque facere assumenda! Praesentium, debitis suscipit! Maxime eaque, fugit atque deserunt cumque dolorum, hic, reiciendis est quas quos earum fugiat dolor iste doloribus assumenda suscipit officia quidem a quaerat laboriosam ut culpa laudantium perspiciatis voluptates? Molestias modi quis quibusdam, necessitatibus quos labore dolor debitis nisi tenetur? Nemo laborum minus dolore corporis dignissimos perspiciatis maiores iste est aliquid.',
        //     'category_id' => 2,
        //     'user_id' => 2
        // ]);


    }
}
