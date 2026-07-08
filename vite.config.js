import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js'
            ],
            refresh: true,
        }),
    ],
    server: {
        // Optional: customize the dev server (if needed)
        // host: '0.0.0.0',
        // port: 5173,
    },
});
