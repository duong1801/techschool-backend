const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .vue()
    .sass('resources/sass/app.scss', 'public/css');


mix.js('resources/js/student/add-course.js', 'public/js/student')
mix.js('resources/js/general/modal.js', 'public/js/general')
mix.js('resources/js/general/validate.js', 'public/js/general')
mix.js('resources/js/general/markdown.js', 'public/js/general')
mix.js('resources/js/general/confirmDel.js', 'public/js/general')
mix.js('resources/js/lesson/lesson.js', 'public/js/lesson')
mix.js('resources/js/article/article.js', 'public/js/article')
mix.js('resources/js/notification/notification.js', 'public/js/notification')









mix.postCss('resources/css/style.css', 'public/css');