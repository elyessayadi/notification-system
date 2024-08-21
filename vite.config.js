import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    server: {
        host: '0.0.0.0',  // Bind to all available IP addresses
        port: 5173,       // Ensure this matches the port exposed in Docker
        strictPort: true, // Fail if the port is already in use
        hmr: {
            host: 'localhost',  // Ensure HMR works correctly
        },
    },
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});
