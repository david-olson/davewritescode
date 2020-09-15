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
    .sass('resources/sass/admin.scss', 'public/css');;

mix.js('resources/js/admin.js', 'public/js');

mix.combine([
	'node_modules/foundation-sites/dist/js/foundation.min.js',
	'node_modules/select2/dist/js/select2.full.min.js',
	'node_modules/dropzone/dist/dropzone.js',
	'node_modules/tablednd/dist/jquery.tablednd.js',
	'node_modules/@fancyapps/fancybox/dist/jquery.fancybox.min.js',
	// Lazysizes Image Loading
	'node_modules/lazysizes/plugins/respimg/ls.respimg.js',
	'node_modules/lazysizes/plugins/object-fit/ls.object-fit.js',
	'node_modules/lazysizes/plugins/parent-fit/ls.parent-fit.js',
	'node_modules/lazysizes/plugins/blur-up/ls.blur-up.js',
	'node_modules/lazysizes/lazysizes.js',

	], 'public/js/admin.vendors.js');

mix.combine([
	// Lazysizes Image Loading
	'node_modules/lazysizes/plugins/respimg/ls.respimg.js',
	'node_modules/lazysizes/plugins/object-fit/ls.object-fit.js',
	'node_modules/lazysizes/plugins/parent-fit/ls.parent-fit.js',
	'node_modules/lazysizes/plugins/blur-up/ls.blur-up.js',
	'node_modules/lazysizes/lazysizes.js',
	'node_modules/gsap/dist/gsap.js',
	'node_modules/sticky-js/dist/sticky.min.js',
	], 'public/js/vendors.js');
