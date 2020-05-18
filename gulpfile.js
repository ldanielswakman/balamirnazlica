var gulp = require('gulp');
var rename = require("gulp-rename");
var sass = require('gulp-sass');
var cleanCSS = require('gulp-clean-css');

function style() {
  return gulp.src('assets/scss/style.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(gulp.dest('assets/css/'))
    .pipe(cleanCSS({compatibility: 'ie9', debug: true}))
    .pipe(rename({ suffix: '.min' }))
    .pipe(gulp.dest('assets/css'));
}

function watch() {
  gulp.watch('assets/scss/**/*.scss', style);
}

exports.style = style;
exports.default = watch;
