// $ npm install gulp
// $ npm install
// $ npm run build

var gulp        = require( 'gulp' );
//var path        = require('path');
//var $           = require( 'gulp-load-plugins' )();
var browserSync = require( 'browser-sync' );

var paths = {
	// base paths
	//"phpSrc" : "./**/*.php",

	//"scssSrc" : "./src/scss/**/*.scss",
	//"scssDir" : "./css/",

	//"jsSrc" : "./src/js/**/*.js",
	//"jsDir" : "./js/",

	//"imgSrc" : "./src/images/**",
	//"imgDir" : "./images/",

	// admin widget paths
	//"admin_scssSrc" : "./src/admin/admin-widget/*.scss",

	//"widget_scssSrc" : "./src/admin/admin-widget/widget-scss/**/*.scss",
	//"widget_scssDir" : "./admin/widget/widget-css/",

	//"widget_jsSrc" : "./src/admin/admin-widget/widget-js/**/*.js",
	//"widget_jsDir" : "./admin/widget/widget-js/",

	//"widget_imgSrc" : "./src/admin/admin-widget/widget-images/**/**",
	//"widget_imgDir" : "./admin/widget/widget-images/",
}
/*
gulp.task( 'browser-sync', function() {
	browserSync.init( {
		proxy  : "http://vccw.dev/",
		notify : true,
		xip    : false
	} );
} );
*/
/*
gulp.task( 'scss', function() {
	return gulp.src( paths.scssSrc )
		.pipe( $.sass() ).on( 'error', $.sass.logError )
		.pipe( $.autoprefixer( {
			browsers: ['last 2 versions']
		} ) )
	.pipe( gulp.dest( paths.scssDir ) )
	.pipe( $.rename( {
		suffix: '.min'
	} ) )
	.pipe( $.csso() )
	.pipe( gulp.dest( paths.scssDir ) )
	.pipe( browserSync.reload( {
		stream : true,
		once   : true
	} ) );
} );
*/
/*
gulp.task( 'widget-scss', function() {
	return gulp.src( paths.widget_scssSrc )
		.pipe( $.sass() ).on( 'error', $.sass.logError )
		.pipe( $.autoprefixer( {
			browsers: ['last 2 versions']
		} ) )
	.pipe( gulp.dest( paths.widget_scssDir ) )
	.pipe( $.rename( {
		suffix: '.min'
	} ) )
	.pipe( $.csso() )
	.pipe( gulp.dest( paths.widget_scssDir ) )
	.pipe( browserSync.reload( {
		stream : true,
		once   : true
	} ) );
} );
*/
/*
gulp.task( 'bs-reload', function() {
	browserSync.reload();
} );
*/
/*
gulp.task( 'image', function() {
	return gulp.src( paths.imgSrc )
		.pipe( $.changed( paths.imgDir ) )
		.pipe( $.imagemin( {
			optimizationLevel: 3
		} ) )
		.pipe( gulp.dest( paths.imgDir ) );
} );
*/
/*
gulp.task( 'widget-image', function() {
	return gulp.src( paths.widget_imgSrc )
		.pipe( $.changed( paths.widget_imgDir ) )
		.pipe( $.imagemin( {
			optimizationLevel: 3
		} ) )
		.pipe( gulp.dest( paths.widget_imgDir ) );
} );
*/
/*
gulp.task( 'js', function() {
	return gulp.src( paths.jsSrc )
		.pipe( $.concat( 'main.js', {newLine: '\n'} )
	)
	.pipe( gulp.dest( paths.jsDir ) );
} );
*/
/*
gulp.task( 'js-min', function() {
	return gulp.src( paths.jsSrc )
		.pipe( $.uglify( {preserveComments: 'license'} ) )
		.pipe( $.concat( 'main.min.js', {newLine: '\n'} )
	)
	.pipe( gulp.dest( paths.jsDir ) );
} );
*/
/*
gulp.task( 'widget-js', function() {
	return gulp.src( paths.widget_jsSrc )
		.pipe( gulp.dest( paths.widget_jsDir ) );
} );
*/
/*
gulp.task( 'widget-js-min', function() {
	return gulp.src( paths.widget_jsSrc )
		.pipe( $.uglify( {preserveComments: 'license'} ) )
		.pipe( $.rename( {
			suffix: '.min'
		} ) )
		.pipe( gulp.dest( paths.widget_jsDir ) );
} );
*/

/*
gulp.task( 'default', ['image', 'widget-image', 'browser-sync', 'scss', 'widget-scss', 'widget-js', 'widget-js-min', 'bs-reload'], function() {

	$.watch( [paths.phpSrc], function( e ) {
		gulp.start( 'bs-reload' )
	} );

	$.watch( [paths.scssSrc, paths.admin_scssSrc ], function( e ) {
		gulp.start( 'scss' )
	} );
	$.watch( [paths.widget_scssSrc], function( e ) {
		gulp.start( 'widget-scss' )
	} );

	$.watch( [paths.imgSrc], function( e ) {
		gulp.start( 'image' )
	} );
	$.watch( [paths.widget_imgSrc], function( e ) {
		gulp.start( 'widget-image' )
	} );
*/
	/*
	$.watch( [paths.jsSrc], function( e ) {
		gulp.start( 'js' )
	} );
	$.watch( [paths.jsSrc], function( e ) {
		gulp.start( 'js-min' )
	} );
*/
/*
	$.watch( [paths.widget_jsSrc], function( e ) {
		gulp.start( 'widget-js' )
	} );
	$.watch( [paths.widget_jsSrc], function( e ) {
		gulp.start( 'widget-js-min' )
	} );
} );
*/
