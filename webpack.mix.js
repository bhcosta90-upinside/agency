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
    .sass('resources/sass/app.scss', 'public/css')

    .scripts([
        'resources/frontend/js/jquery/jquery-2.2.4.min.js',
        'resources/frontend/js/popper.min.js',
        'resources/frontend/js/bootstrap.min.js',
        'resources/frontend/js/plugins.js',
    ], 'public/frontend/js/vendor.js')
    .scripts('resources/frontend/js/active.js', 'public/frontend/js/main.js')
    .sass('resources/frontend/scss/style.scss', 'public/frontend/css')
    .copyDirectory('resources/frontend/img', 'public/frontend/img')
    .copyDirectory('resources/frontend/fonts', 'public/frontend/fonts')

    .options({
        processCssUrls: false
    });
