let mix = require('laravel-mix');
let bower_dir = "vendor/bower_components/";

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
//
// mix.js('resources/assets/js/app.js', 'public/js')
//    .sass('resources/assets/sass/app.scss', 'public/css');

// css principal
mix.styles([
    bower_dir + "bootstrap/dist/css/bootstrap.css",
    bower_dir + "font-awesome/css/font-awesome.css",
    bower_dir + "admin-lte/dist/css/AdminLTE.css",
    bower_dir + "admin-lte/dist/css/skins/skin-blue.css",
    bower_dir + "bootstrap-datepicker/dist/css/bootstrap-datepicker3.css",
    bower_dir + "toastr/toastr.css",
    bower_dir + "metisMenu/dist/metisMenu.css",

], "public/master/app.css");

// js principal
//ok
mix.js([
    bower_dir + "jquery/src/jquery.js",
    bower_dir + "bootstrap/dist/js/bootstrap.js",

],'public/master/js/app.js');

//dataTabes css
mix.styles([
    bower_dir + "datatables.net-bs/css/dataTables.bootstrap.css",
    bower_dir + "datatables.net-buttons-bs/css/buttons.bootstrap.css",

], 'public/master/dataTables.css');

//dataTabes js
mix.js([
    bower_dir + "datatables.net/js/jquery.dataTables.js",
    // bower_dir + "datatables.net-bs/js/dataTables.bootstrap.js",
    // bower_dir + "datatables.net-responsive-bs/js/responsive.bootstrap.js",
    // bower_dir + "datatables.net-buttons/js/dataTables.buttons.js",
    // bower_dir + "datatables.net-buttons/js/buttons.flash.js",
    // bower_dir + "datatables.net-buttons/js/buttons.print.js",
    // bower_dir + "datatables.net-buttons/js/buttons.html5.js",
    // bower_dir + "jszip/dist/jszip.js",
    // bower_dir + "pdfmake/build/pdfmake.js",
    // bower_dir + "pdfmake/build/vfs_fonts.js",
    // bower_dir + "metisMenu/dist/metisMenu.js",

],'public/master/js/datables.js');


mix.copyDirectory([
    bower_dir + 'font-awesome/fonts',
    bower_dir + 'bootstrap/fonts'
], 'public/fonts');

mix.copy('resources/lang/pt-br/datatables/Portuguese-Brasil.json', 'public/assets/datatables/Portuguese-Brasil.json');
