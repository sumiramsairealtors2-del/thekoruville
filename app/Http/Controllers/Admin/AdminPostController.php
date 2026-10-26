<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AdminPostController extends Controller
{
    // List all posts
    public function index()
    {
        $posts = Post::latest()->get();
        return view('admin.posts.index', compact('posts'));
    }

    // Form to create a post
    public function create()
    {
        return view('admin.posts.create');
    }

    // Save new post to database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'            => 'required|string|max:255',
            'slug'             => 'nullable|string|unique:posts,slug',
            'meta_title'       => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'content'          => 'required',
            'image'            => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'category_id'      => 'nullable|string|max:255', // Changed from integer to text string
            'tags'             => 'nullable|string',
            'schema'           => 'nullable|string',
            'is_published'     => 'nullable|boolean',
        ]);

        // Generate Slug
        $slug = $request->filled('slug') 
            ? Str::slug($request->slug) 
            : Str::slug($request->title);
        
        $validated['slug'] = $slug;

        // Auto-generate canonical_url based on the post URL
        $validated['canonical_url'] = url('/blog/' . $slug);

        // Handle Image Upload
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('blog_images', 'public');
        }

        $validated['is_published'] = $request->has('is_published');

        Post::create($validated);

        return redirect()->route('admin.posts.index')->with('success', 'Blog post created successfully!');
    }

    // View single post in admin panel
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    // Form to edit existing post
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    // Update existing post in database
    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title'            => 'required|string|max:255',
            'slug'             => 'nullable|string|unique:posts,slug,' . $post->id,
            'meta_title'       => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'content'          => 'required',
            'image'            => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'category_id'      => 'nullable|string|max:255', // Changed from integer to text string
            'tags'             => 'nullable|string',
            'schema'           => 'nullable|string',
            'is_published'     => 'nullable|boolean',
        ]);

        // Generate Slug
        $slug = $request->filled('slug') 
            ? Str::slug($request->slug) 
            : Str::slug($request->title);

        $validated['slug'] = $slug;

        // Keep or auto-generate canonical_url
        $validated['canonical_url'] = url('/blog/' . $slug);

        // Handle new image upload & delete old image
        if ($request->hasFile('image')) {
            if ($post->image && Storage::disk('public')->exists($post->image)) {
                Storage::disk('public')->delete($post->image);
            }
            $validated['image'] = $request->file('image')->store('blog_images', 'public');
        }

        $validated['is_published'] = $request->has('is_published');

        $post->update($validated);

        return redirect()->route('admin.posts.index')->with('success', 'Blog post updated successfully!');
    }

    // Delete post
    public function destroy(Post $post)
    {
        if ($post->image && Storage::disk('public')->exists($post->image)) {
            Storage::disk('public')->delete($post->image);
        }

        $post->delete();

        return redirect()->route('admin.posts.index')->with('success', 'Blog post deleted successfully!');
    }
}