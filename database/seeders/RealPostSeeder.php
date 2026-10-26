<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use RuntimeException;

/**
 * Loads the real (production) blog posts into the posts table.
 *
 * The dataset lives in database/data/real-posts.json and was captured from
 * https://thekoruville.com/blog so local/dev installs show the same articles
 * instead of factory-generated placeholder posts.
 *
 * Note: this seeder resets the posts table before importing.
 */
class RealPostSeeder extends Seeder
{
    public function run(): void
    {
        $path = database_path('data/real-posts.json');

        if (! is_file($path)) {
            throw new RuntimeException("Real posts dataset not found at {$path}");
        }

        $posts = json_decode(file_get_contents($path), true);

        if (! is_array($posts) || $posts === []) {
            throw new RuntimeException('Real posts dataset is empty or invalid.');
        }

        DB::transaction(function () use ($posts) {
            DB::table('posts')->delete();

            foreach ($posts as $post) {
                $published = $post['published_at'] ?? now();

                DB::table('posts')->insert([
                    'title'            => $post['title'],
                    'slug'             => $post['slug'],
                    'meta_title'       => $post['meta_title'] ?? $post['title'],
                    'meta_description' => $post['meta_description'] ?? null,
                    'canonical_url'    => $post['canonical_url'] ?? null,
                    'content'          => $post['content'],
                    'image'            => $post['image'] ?? null,
                    'category_id'      => null,
                    'tags'             => null,
                    'schema'           => null,
                    'is_published'     => true,
                    'created_at'       => $published,
                    'updated_at'       => $published,
                ]);
            }
        });

        $this->command?->info('Imported '.count($posts).' real blog posts.');
    }
}
