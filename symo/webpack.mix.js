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
    .sass('resources/sass/app.scss', 'public/css');

mix.styles(['public/assets/css/main-style.css' ,'public/assets/css/style.css'],'public/css/main.css');
   mix.css('public/assets/font-awesome/css/font/awesome.css','public/fonts/font.css');
   mix.font('public/assets/font-awesome/fonts/font/awesome.css','public/fonts/font.css');



   mix.js('public/assets/scripts/dashboard-demo.js','public/scripts/dashboard-demo.js');
   mix.js('public/assets/scripts/designers.js','public/scripts/designers.js');
   mix.js('public/assets/scripts/symo.js','public/scripts/symo.js');
   mix.js('public/assets/scripts/operator.js','public/scripts/operator.js');
   mix.js('public/assets/scripts/operators.js','public/scripts/operators.js');
   mix.js('public/assets/scripts/loaddata.js','public/scripts/loaddata.js');
   mix.js('public/assets/scripts/flot-demo.js','public/scripts/flot-demo.js');
