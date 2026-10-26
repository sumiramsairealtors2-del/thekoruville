<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Post: {{ $post->title }} - Admin Panel</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- TinyMCE 6 Free CDN (No API Key Required) -->
    <script src="https://cdn.tiny.cloud/1/uqbuchm4fo6piesoajbw9f7if6plhwc9dpq2is26r85stxzq/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <!-- Custom Styling -->
    <style>
        .tox-tinymce {
            border-radius: 0.5rem !important;
            border-color: #d1d5db !important;
        }
        .btn-transition {
            transition: all 0.2s ease-in-out;
        }
    </style>
</head>
<body class="bg-gray-100 font-sans text-gray-900 antialiased min-h-screen">

    <!-- Top Navigation Header -->
    <header class="bg-white border-b border-gray-200 sticky top-0 z-30 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                
                <div class="truncate">
                    <div class="flex items-center gap-2">
                        <span class="text-xs font-semibold px-2 py-0.5 bg-gray-100 text-gray-600 rounded">ID: #{{ $post->id }}</span>
                        <h1 class="text-lg sm:text-xl font-bold text-gray-900 truncate">
                            Edit Post: {{ $post->title }}
                        </h1>
                    </div>
                    <p class="text-xs text-gray-500 mt-1 truncate">
                        <span class="font-medium">URL:</span> 
                        <a href="{{ url('/blog/' . $post->slug) }}" target="_blank" class="text-indigo-600 hover:underline">
                            /blog/{{ $post->slug }} &nearr;
                        </a>
                    </p>
                </div>

                <!-- Action Buttons Header -->
                <div class="flex items-center gap-2 shrink-0">
                    <a href="{{ route('admin.posts.show', $post) }}" class="px-3.5 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 text-xs sm:text-sm font-medium rounded-lg btn-transition">
                        View Post
                    </a>
                    <a href="{{ route('admin.posts.index') }}" class="inline-flex items-center gap-1.5 px-3.5 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 text-xs sm:text-sm font-medium rounded-lg btn-transition">
                        &larr; Back to Posts
                    </a>
                </div>

            </div>
        </div>
    </header>

    <!-- Main Form Area -->
    <main class="py-6 sm:py-10 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Global Validation Error Alert -->
        @if ($errors->any())
            <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 rounded-lg shadow-sm">
                <div class="flex items-start gap-3">
                    <svg class="w-5 h-5 text-red-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <div>
                        <h3 class="text-sm font-semibold text-red-800">Please correct the following errors:</h3>
                        <ul class="mt-2 text-xs sm:text-sm text-red-700 list-disc list-inside space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif

        <form id="edit-post-form" action="{{ route('admin.posts.update', $post) }}" method="POST" enctype="multipart/form-data" class="bg-white p-5 sm:p-8 rounded-xl shadow-sm border border-gray-200 space-y-6">
            @csrf
            @method('PUT')

            <!-- Post Title -->
            <div>
                <label for="title" class="block font-semibold text-xs sm:text-sm text-gray-700 uppercase tracking-wider mb-1">Title <span class="text-red-500">*</span></label>
                <input type="text" id="title" name="title" value="{{ old('title', $post->title) }}" required class="w-full px-3.5 py-2.5 text-sm border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">
                @error('title')
                    <p class="text-xs text-red-600 mt-1.5 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <!-- Slug and Category ID -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="slug" class="block font-semibold text-xs sm:text-sm text-gray-700 uppercase tracking-wider mb-1">Slug</label>
                    <input type="text" id="slug" name="slug" value="{{ old('slug', $post->slug) }}" class="w-full px-3.5 py-2.5 text-sm border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">
                    @error('slug')
                        <p class="text-xs text-red-600 mt-1.5 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="category_id" class="block font-semibold text-xs sm:text-sm text-gray-700 uppercase tracking-wider mb-1">Category ID / Name</label>
                    <input type="text" id="category_id" name="category_id" value="{{ old('category_id', $post->category_id) }}" class="w-full px-3.5 py-2.5 text-sm border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">
                    @error('category_id')
                        <p class="text-xs text-red-600 mt-1.5 font-medium">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Featured Image Preview and Input -->
            <div>
                <label for="image" class="block font-semibold text-xs sm:text-sm text-gray-700 uppercase tracking-wider mb-1">Featured Image</label>
                
                @if($post->image)
                    <div class="mb-3 flex items-center gap-4 p-3 bg-gray-50 border border-gray-200 rounded-lg">
                        <img id="current-image-preview" src="{{ asset('storage/' . $post->image) }}" alt="Current Featured Image" class="w-20 h-20 object-cover rounded-md border border-gray-300 shadow-sm">
                        <div class="text-xs text-gray-500">
                            <p class="font-semibold text-gray-700">Current Image</p>
                            <p class="truncate max-w-xs mt-0.5">{{ $post->image }}</p>
                            <p class="text-gray-400 mt-1">Upload a new image below to replace it.</p>
                        </div>
                    </div>
                @endif

                <input type="file" id="image" name="image" accept="image/*" onchange="previewImage(event)" class="block w-full text-xs sm:text-sm text-gray-500 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none file:mr-4 file:py-2.5 file:px-4 file:border-0 file:text-xs file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                @error('image')
                    <p class="text-xs text-red-600 mt-1.5 font-medium">{{ $message }}</p>
                @enderror

                <!-- Dynamic Preview for new uploaded image -->
                <div class="mt-3">
                    <img id="new-image-preview" src="#" alt="New Image Preview" class="hidden max-h-48 w-auto object-cover rounded-lg border border-gray-200 shadow-sm">
                </div>
            </div>

            <!-- Content Field with Rich Text Editor -->
            <div>
                <label for="editor" class="block font-semibold text-xs sm:text-sm text-gray-700 uppercase tracking-wider mb-2">Content <span class="text-red-500">*</span></label>
                <textarea id="editor" name="content" class="w-full border-gray-300 rounded-lg shadow-sm mt-1">{{ old('content', $post->content) }}</textarea>
                @error('content')
                    <p class="text-xs text-red-600 mt-1.5 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <!-- SEO Settings Section -->
            <div class="border-t border-gray-200 pt-6 space-y-4">
                <h3 class="font-bold text-base text-gray-900 flex items-center gap-2">
                    <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    <span>SEO Settings</span>
                </h3>
                
                <div class="space-y-4">
                    <div>
                        <label for="meta_title" class="block font-medium text-xs sm:text-sm text-gray-700 mb-1">Meta Title</label>
                        <input type="text" id="meta_title" name="meta_title" value="{{ old('meta_title', $post->meta_title) }}" class="w-full px-3.5 py-2.5 text-sm border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">
                    </div>

                    <div>
                        <label for="meta_description" class="block font-medium text-xs sm:text-sm text-gray-700 mb-1">Meta Description</label>
                        <textarea id="meta_description" name="meta_description" rows="2" class="w-full px-3.5 py-2.5 text-sm border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">{{ old('meta_description', $post->meta_description) }}</textarea>
                    </div>

                    <div>
                        <label for="canonical_url" class="block font-medium text-xs sm:text-sm text-gray-700 mb-1">Canonical URL</label>
                        <input type="url" id="canonical_url" name="canonical_url" value="{{ old('canonical_url', $post->canonical_url) }}" class="w-full px-3.5 py-2.5 text-sm border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">
                    </div>
                </div>
            </div> 

            <!-- Extra Meta & Schema -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 border-t border-gray-200 pt-6">
                <div>
                    <label for="tags" class="block font-medium text-xs sm:text-sm text-gray-700 mb-1">Tags <span class="text-xs text-gray-400 font-normal">(comma-separated)</span></label>
                    <input type="text" id="tags" name="tags" value="{{ old('tags', $post->tags) }}" class="w-full px-3.5 py-2.5 text-sm border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">
                </div>

                <div>
                    <label for="schema" class="block font-medium text-xs sm:text-sm text-gray-700 mb-1">Schema (JSON-LD)</label>
                    <textarea id="schema" name="schema" rows="2" class="w-full px-3.5 py-2.5 text-xs font-mono border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">{{ old('schema', $post->schema) }}</textarea>
                </div>
            </div>

            <!-- Publish Checkbox & Action Buttons -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-t border-gray-200 pt-6">
                <div class="flex items-center gap-2">
                    <input type="checkbox" name="is_published" value="1" id="publish" {{ old('is_published', $post->is_published) ? 'checked' : '' }} class="w-4 h-4 rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                    <label for="publish" class="font-medium text-sm text-gray-700 cursor-pointer select-none">Is Published</label>
                </div>

                <div class="flex items-center gap-2 self-end sm:self-auto">
                    <a href="{{ route('admin.posts.index') }}" class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg text-xs sm:text-sm font-medium btn-transition">
                        Cancel
                    </a>
                    <button type="submit" class="inline-flex items-center gap-1.5 px-5 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-xs sm:text-sm font-semibold rounded-lg shadow-sm btn-transition">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                        </svg>
                        <span>Update Post</span>
                    </button>
                </div>
            </div>
        </form>
    </main>

    <!-- Editor & Helper Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            tinymce.init({
                selector: '#editor',
                height: 520,
                menubar: 'file edit view insert format tools table',
                plugins: [
                    'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
                    'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
                    'insertdatetime', 'media', 'table', 'wordcount', 'directionality', 'nonbreaking'
                ],
                toolbar: [
                    'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough forecolor backcolor',
                    'alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media table blockquote | code fullscreen preview'
                ],
                branding: false,
                promotion: false,
                content_style: `
                    body {
                        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
                        font-size: 15px;
                        line-height: 1.6;
                        color: #374151;
                        padding: 12px;
                    }
                `,
                setup: function (editor) {
                    // Sync editor content to underlying <textarea> prior to form post
                    editor.on('change keyup blur', function () {
                        editor.save();
                    });
                }
            });
        });

        // Live preview for replacing featured image
        function previewImage(event) {
            const input = event.target;
            const preview = document.getElementById('new-image-preview');

            if (input.files && input.files[0]) {
                preview.src = URL.createObjectURL(input.files[0]);
                preview.classList.remove('hidden');
            } else {
                preview.src = '#';
                preview.classList.add('hidden');
            }
        }
    </script>
</body>
</html>