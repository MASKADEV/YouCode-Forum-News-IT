const mix = require('laravel-mix');
mix.browserSync('127.0.0.1:8000');
// mix.ts('resources/js/app.js', 'public/js')
//     .sass('resources/sass/app.scss', 'public/css',);


mix.ts("resources/js/app.js", "public/js")
  .postCss("resources/css/app.css", "public/css", [
    require("tailwindcss"),
]);