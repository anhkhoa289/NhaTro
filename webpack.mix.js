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

mix

//.sass('resources/assets/sass/app.scss', 'public/css')

.sass('resources/assets/sass/style.scss', 'public/css')

/*
.copy('node_modules/bootstrap-datepicker/dist/css/bootstrap-datepicker3.standalone.css', 'public/css/bootstrap-datepicker3.standalone.css')
//.copy('node_modules/moment/min/moment-with-locales.js', 'public/js')

.copy('vendor/kartik-v/bootstrap-fileinput/css/fileinput.css', 'public/css/bootstrap-fileinput')
.copy('vendor/kartik-v/bootstrap-fileinput/js/plugins/piexif.js', 'public/js/bootstrap-fileinput/plugins')
.copy('vendor/kartik-v/bootstrap-fileinput/js/plugins/sortable.js', 'public/js/bootstrap-fileinput/plugins')
.copy('vendor/kartik-v/bootstrap-fileinput/js/plugins/purify.js', 'public/js/bootstrap-fileinput/plugins')
.copy('vendor/kartik-v/bootstrap-fileinput/js/fileinput.js', 'public/js/bootstrap-fileinput')
.copy('vendor/kartik-v/bootstrap-fileinput/js/locales/vi.js', 'public/js/bootstrap-fileinput/locales')

//.copy('node_modules/bootstrap-datepicker/dist/locales/bootstrap-datepicker.vi.min.js', 'resources/assets/js/copied/bootstrap-datepicker.vi.min.js')
.js('resources/assets/js/app.js', 'public/js')



// Front End
.react('resources/assets/front/PhongCuaToi.js','public/js/app')
.react('resources/assets/front/XemPhong.jsx','public/js/app')
*/
.react('resources/assets/front/TrangChu.jsx','public/js/app')

