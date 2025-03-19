import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/style-inscription.css', 'resources/js/script-inscription.js'],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
