<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    public function definition(): array
    {
        $title = rtrim(fake()->sentence(6), '.');
        $slug = Str::slug($title);
        $content = collect(fake()->paragraphs(6, true))->map(fn ($p) => "<p>{$p}</p>")->implode("\n");

        return [
            'title'            => $title,
            'slug'             => $slug,
            'meta_title'       => Str::limit($title, 60),
            'meta_description' => Str::limit(strip_tags($content), 155),
            'canonical_url'    => url('/blog/'.$slug),
            'content'          => $content,
            'image'            => null,
            'category_id'      => null,
            'tags'             => implode(', ', fake()->words(3)),
            'schema'           => null,
            'is_published'     => true,
        ];
    }
}
