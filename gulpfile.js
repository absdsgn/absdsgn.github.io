'use strict';

var gulp            = require('gulp');
var sass            = require('gulp-sass');
var autoprefixer    = require('gulp-autoprefixer');
var cleanCSS        = require('gulp-clean-css');
var concat          = require('gulp-concat');


gulp.task('sass', function () {
    return gulp.src('styles/*.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(autoprefixer())
    .pipe(cleanCSS())
    .pipe(concat('./style.css'))
    .pipe(gulp.dest('.'));
});

gulp.task('watch', function () {
    gulp.watch('./styles/*.scss',gulp.series('sass'));
});
