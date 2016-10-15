// $ npm install --save-dev gulp
// $ npm run build

var gulp         = require( 'gulp' );
var path         = require( 'path' );
var changed      = require( 'gulp-changed' );
var concat       = require( 'gulp-concat' );
var csso         = require( 'gulp-csso' );
var plumber      = require( 'gulp-plumber' );
var sass         = require( 'gulp-sass' );
var uglify       = require( 'gulp-uglify' );
var rename       = require( 'gulp-rename' );
var watch        = require( 'gulp-watch' );
//var autoprefixer = require( 'gulp-autoprefixer' );
var requireDir   = require( 'require-dir' );
var browserSync  = require( 'browser-sync' );

// ------------------------------------------------
// Paths setting
// ------------------------------------------------
var paths = {
    // base paths
    "phpSrc" : "./**/*.php",

    "scssSrc" : "./src/scss/**/*.scss",
    "scssDir" : "./css/",

    "jsSrc" : "./src/js/**/*.js",
    "jsDir" : "./js/",

    // admin widget paths
    "admin_scssSrc" : "./src/admin/admin-widget/*.scss",

    "widget_scssSrc" : "./src/admin/admin-widget/widget-scss/**/*.scss",
    "widget_scssDir" : "./admin/widget/widget-css/",

    "widget_jsSrc" : "./src/admin/admin-widget/widget-js/**/*.js",
    "widget_jsDir" : "./admin/widget/widget-js/",
}

// ------------------------------------------------
// BrowserSync
// ------------------------------------------------
gulp.task( 'browser-sync', function() {
    browserSync.init( {
        proxy  : "http://vccw.dev/",
        notify : true,
        xip    : false
    } );
} );

gulp.task( 'bs-reload', function() {
    browserSync.reload();
} );

// ------------------------------------------------
// Sass Tasks
// ------------------------------------------------
gulp.task( 'scss', function() {
    return gulp.src( paths.scssSrc )
        .pipe( sass() )
        /*
        .pipe( autoprefixer( {
            browsers: ['last 2 versions']
        } ) )
        */
    .pipe( gulp.dest( paths.scssDir ) )
    .pipe( rename( {
        suffix: '.min'
    } ) )
    .pipe( csso() )
    .pipe( gulp.dest( paths.scssDir ) )
    /*
    .pipe( browserSync.reload( {
        stream : true,
        once   : true
    } ) );
    */
} );

gulp.task( 'widget-scss', function() {
    return gulp.src( paths.widget_scssSrc )
        .pipe( sass() )
        /*
        .pipe( autoprefixer( {
            browsers: ['last 2 versions']
        } ) )
        */
    .pipe( gulp.dest( paths.widget_scssDir ) )
    .pipe( rename( {
        suffix: '.min'
    } ) )
    .pipe( csso() )
    .pipe( gulp.dest( paths.widget_scssDir ) )
    /*
    .pipe( browserSync.reload( {
        stream : true,
        once   : true
    } ) );
    */
} );

// ------------------------------------------------
// JS Tasks
// ------------------------------------------------
gulp.task( 'js', function() {
    return gulp.src( paths.jsSrc )
        .pipe( concat( 'main.js', {newLine: '\n'} )
    )
    .pipe( gulp.dest( paths.jsDir ) );
} );

gulp.task( 'js-min', function() {
    return gulp.src( paths.jsSrc )
        .pipe( uglify( {preserveComments: 'license'} ) )
        .pipe( concat( 'main.min.js', {newLine: '\n'} )
    )
    .pipe( gulp.dest( paths.jsDir ) );
} );

gulp.task( 'widget-js', function() {
    return gulp.src( paths.widget_jsSrc )
        .pipe( gulp.dest( paths.widget_jsDir ) );
} );

gulp.task( 'widget-js-min', function() {
    return gulp.src( paths.widget_jsSrc )
        .pipe( uglify( {preserveComments: 'license'} ) )
        .pipe( rename( {
            suffix: '.min'
        } ) )
        .pipe( gulp.dest( paths.widget_jsDir ) );
} );

// ------------------------------------------------
// Gulp Tasks
// ------------------------------------------------
gulp.task( 'watch', function() {
    watch( [paths.phpSrc], function( e ) {
        gulp.start( 'bs-reload' )
    } );


} );

gulp.task( 'default', [
    'browser-sync',
    'bs-reload',
    'scss',
    'widget-scss',
    'js',
    'js-min',
    'widget-js',
    'widget-js-min',
    'watch'
    ], function() {
    /*
    */
    /*
    watch( [paths.scssSrc, paths.admin_scssSrc ], function( e ) {
		gulp.start( 'scss' )
	} );
	watch( [paths.widget_scssSrc], function( e ) {
		gulp.start( 'widget-scss' )
	} );
    */
    /*
    watch( [paths.jsSrc], function( e ) {
		gulp.start( 'js' )
	} );
	watch( [paths.jsSrc], function( e ) {
		gulp.start( 'js-min' )
	} );
    watch( [paths.widget_jsSrc], function( e ) {
		gulp.start( 'widget-js' )
	} );
	watch( [paths.widget_jsSrc], function( e ) {
		gulp.start( 'widget-js-min' )
	} );
    */
} );
/*
gulp.task( 'default', ['browser-sync', 'scss', 'widget-scss', 'widget-js', 'widget-js-min', 'bs-reload'], function() {
    watch( [paths.phpSrc], function( e ) {
		gulp.start( 'bs-reload' )
	} );
    watch( [paths.scssSrc, paths.admin_scssSrc ], function( e ) {
		gulp.start( 'scss' )
	} );
	watch( [paths.widget_scssSrc], function( e ) {
		gulp.start( 'widget-scss' )
	} );
    watch( [paths.jsSrc], function( e ) {
		gulp.start( 'js' )
	} );
	watch( [paths.jsSrc], function( e ) {
		gulp.start( 'js-min' )
	} );
    watch( [paths.widget_jsSrc], function( e ) {
		gulp.start( 'widget-js' )
	} );
	watch( [paths.widget_jsSrc], function( e ) {
		gulp.start( 'widget-js-min' )
	} );
} );
*/
