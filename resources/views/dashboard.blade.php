<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - Admin & Member Panel</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Custom Utility Classes -->
    <style>
        .btn-transition {
            transition: all 0.2s ease-in-out;
        }
    </style>
</head>
<body class="bg-gray-100 font-sans text-gray-900 antialiased min-h-screen">

    <!-- Top Navigation Header -->
    <header class="bg-white border-b border-gray-200 sticky top-0 z-30 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3.5">
            <div class="flex items-center justify-between gap-4">
                
                <!-- Title & Context -->
                <div class="flex items-center gap-3">
                    <h1 class="text-lg sm:text-xl font-bold text-gray-900">
                        {{ __('Dashboard') }}
                    </h1>
                </div>

                <!-- User Info & Logout Button -->
                <div class="flex items-center gap-3 sm:gap-4">
                    <div class="text-right hidden sm:block">
                        <div class="text-sm font-bold text-gray-800 leading-tight">{{ Auth::user()->name }}</div>
                        <div class="text-xs text-gray-500">{{ Auth::user()->email }}</div>
                    </div>

                    <!-- Logout Form -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="px-3 py-1.5 bg-red-50 hover:bg-red-100 text-red-600 hover:text-red-700 font-semibold text-xs rounded-lg border border-red-200 btn-transition">
                            Logout
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </header>

    <!-- Main Content Area -->
    <main class="py-6 sm:py-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
        
        <!-- Welcome Banner & Quick Actions -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 border-l-4 border-l-indigo-600 p-5 sm:p-6">
            <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4">
                <div>
                    <h2 class="text-xl sm:text-2xl font-bold text-gray-900">
                        Hello, {{ Auth::user()->name }}! 👋
                    </h2>
                    <p class="text-gray-500 text-xs sm:text-sm mt-1 flex items-center gap-2">
                        <span>Logged in as:</span> 
                        @if(Auth::user()->is_admin)
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-indigo-50 text-indigo-700 border border-indigo-100">Administrator</span>
                        @else
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-gray-100 text-gray-700 border border-gray-200">Standard Member</span>
                        @endif
                    </p>
                </div>
                
                <div class="flex flex-wrap items-center gap-2">
                    <a href="{{ route('posts.index') }}" target="_blank" class="inline-flex items-center gap-1.5 px-4 py-2 bg-gray-800 hover:bg-gray-700 text-white text-xs sm:text-sm font-semibold rounded-lg shadow-sm btn-transition">
                        <span>View Public Blog</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </a>
                    @if(Auth::user()->is_admin)
                        <a href="{{ route('admin.posts.create') }}" class="inline-flex items-center gap-1.5 px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-xs sm:text-sm font-semibold rounded-lg shadow-sm btn-transition">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                            </svg>
                            <span>Write New Post</span>
                        </a>
                    @endif
                </div>
            </div>
        </div>

        @if(Auth::user()->is_admin)
            <!-- Admin Section: Direct Blog Details & Management -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="p-4 sm:p-6 border-b border-gray-200 flex justify-between items-center bg-gray-50/50">
                    <div>
                        <h3 class="text-base sm:text-lg font-bold text-gray-900">Recent Blog Posts Overview</h3>
                        <p class="text-xs text-gray-500">Live list of articles stored in the system</p>
                    </div>
                    <a href="{{ route('admin.posts.index') }}" class="text-xs sm:text-sm font-semibold text-indigo-600 hover:text-indigo-800 btn-transition">
                        View All in Admin &rarr;
                    </a>
                </div>

                <div class="p-4 sm:p-6 overflow-x-auto">
                    @php
                        // Pulls latest 5 posts directly for dashboard preview
                        $dashboardPosts = \App\Models\Post::latest()->take(5)->get();
                    @endphp

                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr class="text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">
                                <th class="pb-3 px-2">Title</th>
                                <th class="pb-3 px-2">Slug / URL</th>
                                <th class="pb-3 px-2">Status</th>
                                <th class="pb-3 px-2">Date Created</th>
                                <th class="pb-3 px-2 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 text-xs sm:text-sm">
                            @forelse($dashboardPosts as $post)
                                <tr class="hover:bg-gray-50/60 transition">
                                    <td class="py-3 px-2 font-semibold text-gray-900">
                                        {{ Str::limit($post->title, 40) }}
                                    </td>
                                    <td class="py-3 px-2 text-gray-500 font-mono text-xs">
                                        /blog/{{ $post->slug }}
                                    </td>
                                    <td class="py-3 px-2">
                                        @if($post->is_published)
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200">Published</span>
                                        @else
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-amber-50 text-amber-700 border border-amber-200">Draft</span>
                                        @endif
                                    </td>
                                    <td class="py-3 px-2 text-gray-500 text-xs">
                                        {{ $post->created_at->format('M d, Y') }}
                                    </td>
                                    <td class="py-3 px-2 text-right space-x-2 text-xs">
                                        <a href="{{ route('admin.posts.show', $post) }}" class="text-indigo-600 hover:text-indigo-900 font-semibold btn-transition">View</a>
                                        <a href="{{ route('admin.posts.edit', $post) }}" class="text-gray-600 hover:text-gray-900 font-semibold btn-transition">Edit</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="py-6 text-center text-gray-500 text-sm">
                                        No blog posts created yet. <a href="{{ route('admin.posts.create') }}" class="text-indigo-600 hover:underline font-medium">Create one now</a>.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        @else
            <!-- Regular Member Section: Public Posts Preview -->
            <div class="bg-white p-5 sm:p-6 rounded-xl shadow-sm border border-gray-200 space-y-4">
                <h3 class="text-lg font-bold text-gray-900">Latest Published Articles</h3>
                
                @php
                    $publicPosts = \App\Models\Post::where('is_published', true)->latest()->take(3)->get();
                @endphp

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    @forelse($publicPosts as $post)
                        <div class="border border-gray-200 rounded-xl p-4 bg-gray-50/50 hover:border-gray-300 flex flex-col justify-between transition">
                            <div>
                                <h4 class="font-bold text-gray-900 mb-1 text-sm sm:text-base line-clamp-1">{{ $post->title }}</h4>
                                <p class="text-[11px] text-gray-400 mb-2">{{ $post->created_at->format('M d, Y') }}</p>
                                <p class="text-xs sm:text-sm text-gray-600 line-clamp-3 mb-4 leading-relaxed">
                                    {{ $post->meta_description ?? Str::limit(strip_tags($post->content), 80) }}
                                </p>
                            </div>
                            <a href="{{ route('posts.show', $post) }}" target="_blank" class="text-xs font-bold text-indigo-600 hover:text-indigo-800 flex items-center gap-1 btn-transition">
                                <span>Read Full Post</span>
                                <span>&rarr;</span>
                            </a>
                        </div>
                    @empty
                        <p class="text-gray-500 text-sm col-span-3 py-4 text-center">No posts published yet.</p>
                    @endforelse
                </div>
            </div>
        @endif

    </main>

</body>
</html>