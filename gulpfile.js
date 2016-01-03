var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass('app.scss')
        .coffee('module.coffee');

    //mix.styles([
    //    'vendor/normalize.css',
    //    'app.css'
    //],'public/output/final.css', 'public/css');

    //mix.scripts([
    //    'abc.js',
    //    'def.js'
    //
    //],'public/output/final.js','public/js')

    //mix.phpUnit();

    mix.styles([
        'vendor/normalize.css',
        'app.css'
    ],null, 'public/css');

    mix.version('public/css/all.css');

});
