const mix = require('laravel-mix');
mix.browserSync('127.0.0.1:8000');

mix.ts("resources/js/app.js", "public/js")
.sass('resources/scss/app.scss', 'dist', {}, [
  require("tailwindcss"),
])
.setPublicPath('web');