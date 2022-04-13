const mix = require('laravel-mix');
require('laravel-mix-purgecss');

mix.ts('resources/js/app.ts', 'public/js')
    .vue({version : 3}).postCss("resources/css/app.css", "public/css", [
        require("tailwindcss"),
      ]).purgeCss();
