import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    publicDir: 'public', // Asegura que Vite use el directorio público correcto
    build: {
        outDir: 'public/build',
        manifest: true,
    },
});
