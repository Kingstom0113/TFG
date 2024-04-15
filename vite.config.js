// vite.config.js
import { defineConfig } from "vite";
import react from "@vitejs/plugin-react";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        react(), // Asegúrate de que este plugin esté antes de cualquier otro que afecte JS
        laravel({
            input: ["resources/css/app.css", "resources/js/app.js"],
            refresh: true,
        }),
    ],
});
