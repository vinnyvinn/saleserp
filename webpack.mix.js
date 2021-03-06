let mix = require('laravel-mix');

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

mix.scripts([
    'public/assets/js/jquery-3.3.1.min.js',
    'public/assets/js/popper.min.js',
    'public/assets/js/bootstrap.min.js',
    'public/assets/js/moment.min.js',
    'public/assets/js/sweetalert.min.js',
    'public/assets/js/delete.handler.js',
    'public/assets/plugins/js-cookie/js.cookie.js',
    'public/vendor/jsvalidation/js/jsvalidation.js',
    'public/vendor/DataTables/datatables.min.js',
    'public/vendor/datepicker/js/gijgo.min.js',
    'public/vendor/bootstrap-select/js/bootstrap-select.min.js',
    'public/assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js',
    'public/assets/plugins/croppie/croppie.js',
    'public/assets/plugins/chatjs/Chart.bundle.min.js',
], 'public/assets/js/vendor.js');

mix.styles([
    'public/assets/css/fontawesome-all.min.css',
    'public/assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css',
    'public/assets/plugins/croppie/croppie.css',
    'public/assets/plugins/DataTables/datatables.min.css',
    'public/assets/plugins/datepicker/css/gijgo.min.css',
    'public/assets/plugins/chatjs/Chart.min.css',
    'public/assets/vendor/calender/css/calendar.css',
    'public/vendor/bootstrap-select/css/bootstrap-select.min.css',
    'public/assets/vendor/calender/css/calendar.print.css'
], 'public/assets/css/vendor.css');

mix.sass('resources/assets/sass/app.scss', 'public/assets/css');

if (mix.inProduction()) {
    mix.version();
}