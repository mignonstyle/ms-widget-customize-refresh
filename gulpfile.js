// $ npm install --save-dev gulp
// $ npm run build

var gulp         = require( 'gulp' );
var watch        = require( 'gulp-watch' );
var sass         = require( 'gulp-sass' );
var csso         = require( 'gulp-csso' );
var rename       = require( 'gulp-rename' );
//var path         = require( 'path' );
//var changed      = require( 'gulp-changed' );
var concat       = require( 'gulp-concat' );
//var plumber      = require( 'gulp-plumber' );
var uglify       = require( 'gulp-uglify' );
var autoprefixer = require( 'gulp-autoprefixer' );
//var requireDir   = require( 'require-dir' );
var browserSync  = require( 'browser-sync' );

// ------------------------------------------------
// Paths setting
// ------------------------------------------------
var paths = {
    // base paths
    "phpSrc": "./**/*.php",

    "scssSrc": "./src/scss/**/*.scss",
    "scssDir": "./css/",

    "jsSrc": "./src/js/**/*.js",
    "jsDir": "./js/",

    // admin widget paths
    "admin_scssSrc": "./src/admin/admin-widget/*.scss",

    "widget_scssSrc": "./src/admin/admin-widget/widget-scss/**/*.scss",
    "widget_scssDir": "./admin/widget/widget-css/",

    "widget_jsSrc": "./src/admin/admin-widget/widget-js/**/*.js",
    "widget_jsDir": "./admin/widget/widget-js/",
}

// ------------------------------------------------
// BrowserSync
// ------------------------------------------------
gulp.task( 'browser-sync', function() {
    browserSync.init( {
        proxy : "http://vccw.dev/",
        notify: true,
        xip   : false
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
        .pipe( autoprefixer( {
            browsers: ['last 2 version', 'iOS >= 8.1', 'Android >= 4.4'],
            cascade: false
        } ) )
    .pipe( gulp.dest( paths.scssDir ) )
    .pipe( rename( {
        suffix: '.min'
    } ) )
    .pipe( csso() )
    .pipe( gulp.dest( paths.scssDir ) );
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
    .pipe( gulp.dest( paths.widget_scssDir ) );
} );

// ------------------------------------------------
// JS Tasks
// ------------------------------------------------
gulp.task( 'js', function() {
    return gulp.src( paths.jsSrc )
        .pipe( concat( 'main.js' ) )
        .pipe( gulp.dest( paths.jsDir ) );
} );

gulp.task( 'js-min', ['js'], function() {
    return gulp.src( paths.jsSrc )
        .pipe( uglify( {preserveComments: 'license'} ) )
        .pipe( concat( 'main.min.js' ) )
        .pipe( gulp.dest( paths.jsDir ) );
} );

gulp.task( 'widget-js', function() {
    return gulp.src( paths.widget_jsSrc )
        .pipe( gulp.dest( paths.widget_jsDir ) );
} );

gulp.task( 'widget-js-min', ['widget-js'], function() {
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
gulp.task( 'watch', [
    'scss',
    'widget-scss',
    'js',
    'js-min',
    'widget-js',
    'widget-js-min',
    'browser-sync',
    'bs-reload'
], function() {
    gulp.watch( [paths.scssSrc, paths.admin_scssSrc ], ['scss'] );
    gulp.watch( [paths.widget_scssSrc], ['widget-scss'] );
    gulp.watch( [paths.jsSrc], ['js', 'js-min'] );
    gulp.watch( [paths.widget_jsSrc], ['widget-js', 'widget-js-min'] );

    gulp.watch( [
        paths.phpSrc,
        paths.scssSrc,
        paths.admin_scssSrc,
        paths.widget_scssSrc,
        paths.jsSrc,
        paths.widget_jsSrc
     ], function() {
        browserSync.reload();
    } );
} );

gulp.task( 'default', [
    'scss',
    'widget-scss',
    'js',
    'js-min',
    'widget-js',
    'widget-js-min',
    //'watch'
    ], function() {
} );
