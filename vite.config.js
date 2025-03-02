import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    build: {
        outDir: 'public/build', // Genera los archivos en public/build
        manifest: true,         // Asegura que el manifest.json se cree
        emptyOutDir: true,      // Limpia el directorio build antes de compilar
    },
});
