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

elixir(function (mix) {
    //         input  , output : default output will be in public/css or public/js
    mix.sass('app.scss', 'resources/assets/css')
        .coffee('module.coffee', 'resources/assets/js');

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

    //mix.styles([
    //    'vendor/normalize.css',
    //    'app.css'
    //],null, 'public/css');
    //
    //mix.version('public/css/all.css');

    mix.styles([
        'libs/bootstrap.min.css',
        'app.css',
        'libs/select2.min.css'
    ]);

    mix.scripts([
        'module.js',
        'libs/jquery.js',
        'libs/bootstrap.min.js',
        'libs/select2.min.js'
    ]);

    mix.version([
        'public/css/all.css',
        'public/js/all.js'
    ]);


});
