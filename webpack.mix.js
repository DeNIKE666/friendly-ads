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

mix.sass('resources/sass/atlantis.scss', 'public/assets/cabinet/css').options({
    processCssUrls: false
}).version()
    .copy('resources/sass/atlantis/fonts' , 'public/assets/cabinet/fonts')
    .copy('resources/js/atlantis/atlantis2.js' , 'public/assets/cabinet/js');

mix.scripts([
    'resources/js/atlantis/core/jquery.3.2.1.min.js',
    'resources/js/atlantis/core/popper.min.js',
    'resources/js/atlantis/core/bootstrap.min.js',
    'resources/js/atlantis/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js',
    'resources/js/atlantis/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js',
    'resources/js/atlantis/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js',
    'resources/js/atlantis/plugin/jquery-scrollbar/jquery.scrollbar.min.js',
    'resources/js/atlantis/plugin/moment/moment.min.js',
    'resources/js/atlantis/plugin/jquery.sparkline/jquery.sparkline.min.js',
    'resources/js/atlantis/plugin/chart-circle/circles.min.js',
    'resources/js/atlantis/plugin/datatables/datatables.min.js',
    'resources/js/atlantis/plugin/bootstrap-notify/bootstrap-notify.min.js',
    'resources/js/atlantis/plugin/bootstrap-toggle/bootstrap-toggle.min.js',
    'resources/js/atlantis/plugin/jqvmap/jquery.vmap.min.js',
    'resources/js/atlantis/plugin/jqvmap/maps/jquery.vmap.world.js',
    'resources/js/atlantis/plugin/dropzone/dropzone.min.js',
    'resources/js/atlantis/plugin/fullcalendar/fullcalendar.min.js',
    'resources/js/atlantis/plugin/datepicker/bootstrap-datetimepicker.min.js',
    'resources/js/atlantis/plugin/bootstrap-tagsinput/bootstrap-tagsinput.min.js',
    'resources/js/atlantis/plugin/bootstrap-wizard/bootstrapwizard.js',
    'resources/js/atlantis/plugin/jquery.validate/jquery.validate.min.js',
    'resources/js/atlantis/plugin/summernote/summernote-bs4.min.js',
    'resources/js/atlantis/plugin/select2/select2.full.min.js',
    'resources/js/atlantis/plugin/sweetalert/sweetalert.min.js',
    'resources/js/atlantis/plugin/owl-carousel/owl.carousel.min.js',
    'resources/js/atlantis/plugin/jquery.magnific-popup/jquery.magnific-popup.min.js',
    'resources/js/atlantis/plugin/chart-js/chart.min.js',
    'resources/js/atlantis/lk.js'
], 'public/assets/cabinet/js/vendor_atlantis.js').version();


mix.styles([
    'resources/assets/frontend/css/plugins.css',
    'resources/assets/frontend/css/styles.css',
    'resources/assets/frontend/css/default.css',
], 'public/assets/frontend/css/main.css').version();

mix.scripts([
    'resources/assets/frontend/js/jquery.min.js',
    'resources/assets/frontend/js/popper.min.js',
    'resources/assets/frontend/js/bootstrap.min.js',
    'resources/assets/frontend/js/select2.min.js',
    'resources/assets/frontend/js/aos.js',
    'resources/assets/frontend/js/perfect-scrollbar.jquery.min.js',
    'resources/assets/frontend/js/owl.carousel.min.js',
    'resources/assets/frontend/js/jquery.counterup.min.js',
    'resources/assets/frontend/js/slick.js',
    'resources/assets/frontend/js/bootstrap-datepicker.js',
    'resources/assets/frontend/js/isotope.min.js',
    'resources/assets/frontend/js/summernote.js',
    'resources/assets/frontend/js/jQuery.style.switcher.js',
    'resources/assets/frontend/js/counterup.min.js',
    'resources/assets/frontend/js/custom.js',
], 'public/assets/frontend/js/vendor.js').version();

mix.js('resources/js/app.js', 'public/assets/cabinet/js')
    .version();

