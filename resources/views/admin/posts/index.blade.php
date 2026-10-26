<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manage Blog Posts - Admin Panel</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Custom CSS for Responsive Enhancements -->
    <style>
        /* Smooth transitions for interactive elements */
        .btn-transition {
            transition: all 0.2s ease-in-out;
        }

        /* Responsive table wrapping */
        @media (max-width: 640px) {
            .hide-on-mobile {
                display: none;
            }
        }

        /* Custom scrollbar for table container */
        .custom-scrollbar::-webkit-scrollbar {
            height: 6px;
        }
        .custom-scrollbar::-webkit-scrollbar-track {
            background: #f1f5f9;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 4px;
        }
    </style>
</head>
<body class="bg-gray-100 font-sans text-gray-900 antialiased min-h-screen">

    <!-- Top Navigation Header -->
    <header class="bg-white border-b border-gray-200 sticky top-0 z-30 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                
                <!-- Page Title -->
                <div>
                    <div class="flex items-center gap-2">
                        <span class="p-1.5 bg-indigo-50 text-indigo-600 rounded-lg sm:hidden">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                            </svg>
                        </span>
                        <h1 class="text-xl sm:text-2xl font-bold text-gray-900">Manage Blog Posts</h1>
                    </div>
                    <p class="text-xs sm:text-sm text-gray-500 mt-0.5">Create, update, search, and manage your articles.</p>
                </div>

                <!-- Header Actions -->
                <div class="flex items-center gap-3">
                    <a href="{{ route('dashboard') }}" class="px-3.5 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 text-xs sm:text-sm font-medium rounded-lg btn-transition">
                        &larr; Dashboard
                    </a>
                    
                    <!-- Primary Create Button -->
                    <a href="{{ route('admin.posts.create') }}" class="inline-flex items-center justify-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-xs sm:text-sm font-semibold rounded-lg shadow-sm hover:shadow transition gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                        <span>Create Post</span>
                    </a>
                </div>

            </div>
        </div>
    </header>

    <!-- Main Content Area -->
    <main class="py-6 sm:py-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

        <!-- Flash Success Message -->
        @if(session('success'))
            <div id="flash-message" class="p-4 bg-emerald-50 border-l-4 border-emerald-500 rounded-r-lg shadow-sm flex items-center justify-between transition-opacity duration-300">
                <div class="flex items-center gap-3">
                    <svg class="w-5 h-5 text-emerald-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <p class="text-xs sm:text-sm font-medium text-emerald-800">{{ session('success') }}</p>
                </div>
                <button type="button" onclick="closeAlert('flash-message')" class="text-emerald-500 hover:text-emerald-700 text-lg font-bold leading-none p-1">&times;</button>
            </div>
        @endif

        <!-- Card Container -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            
            <!-- Filter & Search Toolbar -->
            <div class="p-4 sm:p-5 border-b border-gray-100 bg-gray-50/50 flex flex-col sm:flex-row items-center justify-between gap-4">
                
                <!-- Live Client Search Input -->
                <div class="relative w-full sm:w-80">
                    <input type="text" id="post-search" placeholder="Filter titles or slugs..." class="w-full pl-10 pr-4 py-2 text-sm border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none">
                    <svg class="w-4 h-4 text-gray-400 absolute left-3 top-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </div>

                <!-- Secondary Create Button for quick access -->
                <div class="w-full sm:w-auto flex justify-end">
                    <a href="{{ route('admin.posts.create') }}" class="w-full sm:w-auto text-center px-4 py-2 bg-white border border-gray-300 text-gray-700 hover:bg-gray-50 text-xs font-semibold rounded-lg shadow-sm btn-transition">
                        + Add Article
                    </a>
                </div>
            </div>

            <!-- DESKTOP TABLE VIEW (Visible on tablet/desktop) -->
            <div class="hidden sm:block overflow-x-auto custom-scrollbar">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50 border-b border-gray-200 text-xs font-semibold text-gray-500 uppercase tracking-wider">
                            <th class="px-6 py-3.5">Post</th>
                            <th class="px-6 py-3.5">Slug</th>
                            <th class="px-6 py-3.5">Status</th>
                            <th class="px-6 py-3.5 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="posts-table-body" class="divide-y divide-gray-100 text-sm">
                        @forelse($posts as $post)
                            <tr class="post-row hover:bg-gray-50/70 transition-colors">
                                <!-- Title & Image -->
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        @if($post->image)
                                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-10 h-10 rounded-lg object-cover border border-gray-200 shrink-0">
                                        @else
                                            <div class="w-10 h-10 rounded-lg bg-indigo-50 border border-indigo-100 flex items-center justify-center shrink-0">
                                                <svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                                                </svg>
                                            </div>
                                        @endif
                                        <div>
                                            <a href="{{ route('admin.posts.show', $post) }}" class="post-title font-semibold text-gray-900 hover:text-indigo-600 transition line-clamp-1">
                                                {{ $post->title }}
                                            </a>
                                            <p class="text-xs text-gray-400 mt-0.5">Category: {{ $post->category_id ?? 'General' }}</p>
                                        </div>
                                    </div>
                                </td>

                                <!-- Slug -->
                                <td class="px-6 py-4 text-gray-500 font-mono text-xs post-slug">
                                    /{{ $post->slug }}
                                </td>

                                <!-- Status Badge -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 text-xs font-semibold rounded-full border {{ $post->is_published ? 'bg-emerald-50 text-emerald-700 border-emerald-200' : 'bg-amber-50 text-amber-700 border-amber-200' }}">
                                        <span class="w-1.5 h-1.5 rounded-full {{ $post->is_published ? 'bg-emerald-500' : 'bg-amber-500' }}"></span>
                                        {{ $post->is_published ? 'Published' : 'Draft' }}
                                    </span>
                                </td>

                                <!-- Actions -->
                                <td class="px-6 py-4 text-right whitespace-nowrap">
                                    <div class="flex items-center justify-end gap-2">
                                        <a href="{{ route('admin.posts.show', $post) }}" class="px-2.5 py-1.5 bg-blue-50 text-blue-600 hover:bg-blue-100 rounded-md text-xs font-medium btn-transition">
                                            View
                                        </a>
                                        <a href="{{ route('admin.posts.edit', $post) }}" class="px-2.5 py-1.5 bg-indigo-50 text-indigo-600 hover:bg-indigo-100 rounded-md text-xs font-medium btn-transition">
                                            Edit
                                        </a>
                                        <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" class="inline" onsubmit="return confirmDelete(event)">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-2.5 py-1.5 bg-rose-50 text-rose-600 hover:bg-rose-100 rounded-md text-xs font-medium btn-transition">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr id="empty-desktop-row">
                                <td colspan="4" class="px-6 py-12 text-center text-gray-500">
                                    No posts found. <a href="{{ route('admin.posts.create') }}" class="text-indigo-600 underline font-medium">Create one now</a>.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- MOBILE CARD VIEW (Optimized for small screens) -->
            <div id="posts-mobile-container" class="block sm:hidden divide-y divide-gray-100">
                @forelse($posts as $post)
                    <div class="p-4 space-y-3 post-card">
                        <div class="flex items-start justify-between gap-3">
                            <a href="{{ route('admin.posts.show', $post) }}" class="post-title font-semibold text-gray-900 text-sm hover:text-indigo-600">
                                {{ $post->title }}
                            </a>
                            <span class="inline-flex items-center px-2 py-0.5 text-xs font-semibold rounded-full shrink-0 {{ $post->is_published ? 'bg-emerald-100 text-emerald-800' : 'bg-amber-100 text-amber-800' }}">
                                {{ $post->is_published ? 'Published' : 'Draft' }}
                            </span>
                        </div>

                        <p class="text-xs text-gray-400 font-mono post-slug">/{{ $post->slug }}</p>

                        <div class="flex items-center justify-between border-t border-gray-50 pt-3">
                            <span class="text-xs text-gray-500">Category: {{ $post->category_id ?? 'General' }}</span>

                            <div class="flex items-center gap-2">
                                <a href="{{ route('admin.posts.show', $post) }}" class="text-xs text-blue-600 font-medium px-2 py-1 bg-blue-50 rounded">View</a>
                                <a href="{{ route('admin.posts.edit', $post) }}" class="text-xs text-indigo-600 font-medium px-2 py-1 bg-indigo-50 rounded">Edit</a>
                                <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" class="inline" onsubmit="return confirmDelete(event)">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-xs text-rose-600 font-medium px-2 py-1 bg-rose-50 rounded">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <div id="empty-mobile-card" class="p-8 text-center text-gray-500 text-xs">
                        No posts found. <a href="{{ route('admin.posts.create') }}" class="text-indigo-600 underline font-medium">Create one now</a>.
                    </div>
                @endforelse
            </div>

        </div>
    </main>

    <!-- JavaScript Interactions -->
    <script>
        // Smoothly close alert notifications
        function closeAlert(alertId) {
            const el = document.getElementById(alertId);
            if (el) {
                el.style.opacity = '0';
                setTimeout(() => el.remove(), 300);
            }
        }

        // Permanent deletion warning modal replacement
        function confirmDelete(event) {
            if (!confirm('Are you sure you want to permanently delete this post?')) {
                event.preventDefault();
                return false;
            }
            return true;
        }

        // Client-side search filtering (filters both Desktop Table & Mobile Cards in real-time)
        document.getElementById('post-search').addEventListener('keyup', function() {
            const filter = this.value.toLowerCase().trim();

            // Filter Desktop Rows
            const desktopRows = document.querySelectorAll('.post-row');
            desktopRows.forEach(row => {
                const title = row.querySelector('.post-title')?.textContent.toLowerCase() || '';
                const slug = row.querySelector('.post-slug')?.textContent.toLowerCase() || '';
                
                if (title.includes(filter) || slug.includes(filter)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });

            // Filter Mobile Cards
            const mobileCards = document.querySelectorAll('.post-card');
            mobileCards.forEach(card => {
                const title = card.querySelector('.post-title')?.textContent.toLowerCase() || '';
                const slug = card.querySelector('.post-slug')?.textContent.toLowerCase() || '';

                if (title.includes(filter) || slug.includes(filter)) {
                    card.style.display = '';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    </script>
</body>
</html>