import { defineConfig } from 'vite';
import path from 'path';

export default defineConfig({
    plugins: [],
    resolve: {
        alias: {
            '@': path.resolve(__dirname, 'resources/js'),
        },
    },
    build: {
        manifest: true,
    },
    css: {
        input: 'resources/css/app.css', 
    }
});
