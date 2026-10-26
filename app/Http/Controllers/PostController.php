<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::where('is_published', true)->latest()->paginate(9);

        return view('posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
        if (! $post->is_published) {
            abort(404);
        }

        [$content, $toc] = $this->prepareContent($post->content ?? '');

        $readMinutes = max(1, (int) ceil(str_word_count(strip_tags($content)) / 200));

        $prevPost = Post::where('is_published', true)
            ->where(function ($query) use ($post) {
                $query->where('created_at', '<', $post->created_at)
                    ->orWhere(function ($query) use ($post) {
                        $query->where('created_at', $post->created_at)
                            ->where('id', '<', $post->id);
                    });
            })
            ->orderByDesc('created_at')
            ->orderByDesc('id')
            ->first();

        $nextPost = Post::where('is_published', true)
            ->where(function ($query) use ($post) {
                $query->where('created_at', '>', $post->created_at)
                    ->orWhere(function ($query) use ($post) {
                        $query->where('created_at', $post->created_at)
                            ->where('id', '>', $post->id);
                    });
            })
            ->orderBy('created_at')
            ->orderBy('id')
            ->first();

        $related = Post::where('is_published', true)
            ->where('id', '!=', $post->id)
            ->orderByDesc('created_at')
            ->take(3)
            ->get();

        return view('posts.show', compact(
            'post',
            'content',
            'toc',
            'readMinutes',
            'prevPost',
            'nextPost',
            'related',
        ));
    }

    /**
     * Add stable ids to the article's H2s, build the table of contents and
     * make wide tables scrollable on small screens.
     *
     * @return array{0: string, 1: array<int, array{id: string, text: string}>}
     */
    private function prepareContent(string $html): array
    {
        $toc = [];
        $used = [];

        $html = preg_replace_callback(
            '/<h2(\s[^>]*)?>(.*?)<\/h2>/is',
            function (array $match) use (&$toc, &$used): string {
                $text = trim(preg_replace('/\s+/u', ' ', strip_tags($match[2])));
                $text = html_entity_decode($text, ENT_QUOTES | ENT_HTML5, 'UTF-8');

                if ($text === '') {
                    return $match[0];
                }

                $attrs = $match[1] ?? '';

                if (preg_match('/\bid="([^"]+)"/i', $attrs, $existing)) {
                    $id = $existing[1];
                } else {
                    $base = Str::slug($text) ?: 'section';
                    $id = $base;
                    $suffix = 2;

                    while (in_array($id, $used, true)) {
                        $id = $base.'-'.$suffix++;
                    }

                    $attrs .= ' id="'.$id.'"';
                }

                $used[] = $id;
                $toc[] = ['id' => $id, 'text' => $text];

                return '<h2'.$attrs.'>'.$match[2].'</h2>';
            },
            $html,
        );

        $html = preg_replace(
            '/<table\b.*?<\/table>/is',
            '<div class="kv-table-wrap">$0</div>',
            $html,
        );

        return [$html, $toc];
    }
}
