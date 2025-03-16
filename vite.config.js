import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/js/app.js",
                "resources/js/package/table-package/main/main-table-package.js",
                "resources/sass/app.scss",
            ],
            refresh: true,
        }),
    ],
});
