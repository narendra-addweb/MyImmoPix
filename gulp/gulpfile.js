var gulp       = require('gulp');
/* Minify & Optimize Image */
var imagemin   = require('gulp-imagemin');
var pngquant   = require('imagemin-pngquant');
var imageop    = require('gulp-image-optimization');
/* Scss Ordering */
var scsslint   = require('gulp-scss-lint');
/* Generate css & Minify it */
var minifyCss  = require('gulp-minify-css');
var sass       = require('gulp-sass');
/* Minify js */
var uglify     = require('gulp-uglify')
/* concat into one file */
var concat     = require('gulp-concat');

/* Define path variables */
var imgSrc     = './../wp-content/themes/adrenalin/src/images/*',
    imgDst     = './../wp-content/themes/adrenalin/images';

var jsSrc      = './../wp-content/themes/adrenalin/src/js/**/*.js',
    jsDst      = './../wp-content/themes/adrenalin/js';

var scssSrc    = './../wp-content/themes/adrenalin/src/sass/**/*',
    cssDst     = './../wp-content/themes/adrenalin/css';


/* Minify & Optimize Image */
gulp.task('image', function() {
  return gulp.src(imgSrc)
    /* Optimize image */
    .pipe(imageop({
      optimizationLevel: 5,
      progressive: true,
      interlaced: true
    }))
    /* Minify image */
    .pipe(imagemin({
      progressive: true,
      svgoPlugins: [{removeViewBox: false}],
      use: [pngquant({quality: '65-80', speed: 4})]
    }))
    .pipe(gulp.dest(imgDst));
});

/* Minify js */
gulp.task('js', function() {
  return gulp.src(jsSrc)
    .pipe(uglify())
    .pipe(gulp.dest(jsDst));
});

/* Lint SCSS (For Ordering CSS property) */
gulp.task('scss-lint', function() {
  return gulp.src(scssSrc)
    .pipe(scsslint({
      'config': 'scss-lint.yml'
    }));
});

/* Generate css & minify it */
gulp.task('sass', function () {
  return gulp.src([scssSrc])
    /* Generate css from sass */
    .pipe(sass().on('error', sass.logError))
    /* Minify css */
    .pipe(minifyCss({compatibility: 'ie8'}))
    .pipe(concat('custom.css'))
    .pipe(gulp.dest(cssDst));
});

/* Autodetect changes in sass & generate css accordingly */
gulp.task('watch', function () {
  gulp.watch(scssSrc, ['sass']);
  gulp.watch(jsSrc, ['js']);
  gulp.watch(scssSrc, ['scss-lint']);
});


// Default gulp task (Task listed here will run on gulp)
gulp.task('default', ['js', 'sass', 'watch', 'scss-lint', 'image'], function() {}); // 'scss-lint', 'image'
