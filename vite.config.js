import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/assets/front/js/custom.js',
                'resources/js/app.js',

                'resources/sass/app.scss',

                'resources/assets/front/css/ie7/ie7.css',
                'resources/assets/front/css/icons.css',
                'resources/assets/front/css/style.css',
            ],
            refresh: true,
        }),
    ],
});
