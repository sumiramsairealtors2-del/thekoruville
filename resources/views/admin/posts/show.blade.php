<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View Post: {{ $post->title }} - Admin Panel</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Custom CSS for Typography & Responsiveness -->
    <style>
        .btn-transition {
            transition: all 0.2s ease-in-out;
        }

        /* Styling for Rich Text Content output */
        .prose-content img {
            max-width: 100%;
            height: auto;
            border-radius: 0.5rem;
            margin: 1rem 0;
        }
        .prose-content ul { list-style-type: disc; padding-left: 1.5rem; margin: 0.5rem 0; }
        .prose-content ol { list-style-type: decimal; padding-left: 1.5rem; margin: 0.5rem 0; }
        .prose-content h1, .prose-content h2, .prose-content h3 { font-weight: 700; margin-top: 1rem; margin-bottom: 0.5rem; }
        .prose-content p { margin-bottom: 0.75rem; line-height: 1.625; }
    </style>
</head>
<body class="bg-gray-100 font-sans text-gray-900 antialiased min-h-screen">

    <!-- Top Navigation Header -->
    <header class="bg-white border-b border-gray-200 sticky top-0 z-30 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                
                <!-- Page Title / Slug -->
                <div class="truncate">
                    <div class="flex items-center gap-2">
                        <span class="text-xs font-semibold px-2 py-0.5 bg-gray-100 text-gray-600 rounded">ID: #{{ $post->id }}</span>
                        <h1 class="text-lg sm:text-xl font-bold text-gray-900 truncate">
                            {{ $post->title }}
                        </h1>
                    </div>
                    <p class="text-xs text-gray-500 mt-1 truncate">
                        <span class="font-medium">URL:</span> 
                        <a href="{{ url('/blog/' . $post->slug) }}" target="_blank" class="text-indigo-600 hover:underline">
                            /blog/{{ $post->slug }} &nearr;
                        </a>
                    </p>
                </div>

                <!-- Action Buttons -->
                <div class="flex items-center gap-2 shrink-0">
                    <a href="{{ route('admin.posts.index') }}" class="px-3.5 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 text-xs sm:text-sm font-medium rounded-lg btn-transition">
                        &larr; Back to Posts
                    </a>
                    <a href="{{ route('admin.posts.edit', $post) }}" class="inline-flex items-center gap-1.5 px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-xs sm:text-sm font-semibold rounded-lg shadow-sm btn-transition">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                        <span>Edit Post</span>
                    </a>
                </div>

            </div>
        </div>
    </header>

    <!-- Main Content Area -->
    <main class="py-6 sm:py-10 max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

        <!-- Status & Meta Bar -->
        <div class="bg-white p-4 sm:p-5 rounded-xl shadow-sm border border-gray-200 flex flex-wrap items-center justify-between gap-4">
            <div class="flex items-center gap-3">
                <span class="text-xs text-gray-500">Status:</span>
                <span class="inline-flex items-center gap-1.5 px-3 py-1 text-xs font-semibold rounded-full border {{ $post->is_published ? 'bg-emerald-50 text-emerald-700 border-emerald-200' : 'bg-amber-50 text-amber-700 border-amber-200' }}">
                    <span class="w-2 h-2 rounded-full {{ $post->is_published ? 'bg-emerald-500' : 'bg-amber-500' }}"></span>
                    {{ $post->is_published ? 'Published' : 'Draft' }}
                </span>
            </div>

            <div class="flex items-center gap-4 text-xs text-gray-500">
                <div>Category: <strong class="text-gray-800">{{ $post->category_id ?? 'General' }}</strong></div>
                <span>&bull;</span>
                <div>Created: <strong class="text-gray-800">{{ $post->created_at?->format('M d, Y') ?? 'N/A' }}</strong></div>
            </div>
        </div>

        <!-- Main Details Card -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="p-5 sm:p-8 space-y-6">
                
                <!-- Title Header -->
                <h1 class="text-2xl sm:text-3xl font-extrabold text-gray-900 leading-tight">
                    {{ $post->title }}
                </h1>

                <!-- Featured Image -->
                @if($post->image)
                    <div class="space-y-2">
                        <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Featured Image</p>
                        <div class="overflow-hidden rounded-lg border border-gray-200 max-h-96 bg-gray-50 flex items-center justify-center">
                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
                        </div>
                    </div>
                @endif

                <!-- Formatted HTML Article Content (from CKEditor) -->
                <div class="pt-4 border-t border-gray-100">
                    <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-3">Post Content</p>
                    <div class="prose-content bg-gray-50/50 p-4 sm:p-6 rounded-xl border border-gray-200 text-gray-800 text-sm sm:text-base">
                        {!! $post->content !!}
                    </div>
                </div>

            </div>
        </div>

        <!-- SEO Details Card -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-5 sm:p-8 space-y-4">
            <h3 class="font-bold text-base sm:text-lg text-gray-900 border-b border-gray-100 pb-3 flex items-center gap-2">
                <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
                <span>SEO & Metadata Settings</span>
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-xs sm:text-sm">
                <div class="p-3 bg-gray-50 rounded-lg border border-gray-100 space-y-1">
                    <p class="text-gray-400 font-semibold uppercase text-[10px]">Meta Title</p>
                    <p class="text-gray-800 font-medium">{{ $post->meta_title ?: 'N/A (Defaults to Title)' }}</p>
                </div>

                <div class="p-3 bg-gray-50 rounded-lg border border-gray-100 space-y-1">
                    <p class="text-gray-400 font-semibold uppercase text-[10px]">Canonical URL</p>
                    <p class="text-indigo-600 font-mono break-all">{{ $post->canonical_url ?: url('/blog/' . $post->slug) }}</p>
                </div>

                <div class="p-3 bg-gray-50 rounded-lg border border-gray-100 space-y-1 md:col-span-2">
                    <p class="text-gray-400 font-semibold uppercase text-[10px]">Meta Description</p>
                    <p class="text-gray-700 leading-relaxed">{{ $post->meta_description ?: 'N/A' }}</p>
                </div>

                <div class="p-3 bg-gray-50 rounded-lg border border-gray-100 space-y-1 md:col-span-2">
                    <p class="text-gray-400 font-semibold uppercase text-[10px]">Tags</p>
                    <div class="flex flex-wrap gap-1 mt-1">
                        @if($post->tags)
                            @foreach(explode(',', $post->tags) as $tag)
                                <span class="px-2 py-0.5 bg-indigo-50 text-indigo-700 border border-indigo-100 text-xs rounded-md">
                                    {{ trim($tag) }}
                                </span>
                            @endforeach
                        @else
                            <span class="text-gray-400">None</span>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Schema Markup -->
            <div class="space-y-1 pt-2">
                <p class="text-gray-400 font-semibold uppercase text-[10px]">Structured Data (Schema JSON-LD)</p>
                <pre class="bg-gray-900 text-gray-100 p-4 rounded-lg text-xs font-mono overflow-x-auto leading-relaxed">{{ $post->schema ?: 'No custom schema provided.' }}</pre>
            </div>
        </div>

    </main>

</body>
</html>