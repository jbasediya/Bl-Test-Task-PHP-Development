<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BlogPostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blog_posts')->insert([
            [
                'title' => 'First Blog Post',
                'content' => 'This is the content of the first blog post.',
                'image' => 'image1.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Second Blog Post',
                'content' => 'This is the content of the second blog post.',
                'image' => 'image2.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Third Blog Post',
                'content' => 'This is the content of the third blog post.',
                'image' => 'image3.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
}
}
