import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/css/kv.css',
                'resources/js/kv.js',
            ],
            refresh: true,
        }),
    ],
});
