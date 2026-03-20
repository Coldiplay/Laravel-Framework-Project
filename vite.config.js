import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                //'resources/assets/front/ie7/ie7.css',
                'resources/assets/front/css/icons.css',
                'resources/assets/front/css/style.css',
            ],
            refresh: true,
        }),
    ],
});
