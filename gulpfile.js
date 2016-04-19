var gulp = require('gulp');
var sass = require('gulp-sass');
var csscomb = require('gulp-csscomb');
var cssbeautify = require('gulp-cssbeautify');
var autoprefixer = require('gulp-autoprefixer');
var rename = require('gulp-rename');
var csso = require('gulp-csso');
var cssimport = require("gulp-cssimport");
var watch = require("gulp-watch");
var livereload = require("gulp-livereload");

// création fichier production normal
gulp.task('build', function() {
    gulp.src('./sass/**/style.scss')
        .pipe(sass().on('error', sass.logError))
    	.pipe(cssimport())
        .pipe(csscomb())
        .pipe(cssbeautify({indent: '  '}))
        .pipe(autoprefixer())    
        .pipe(gulp.dest('./css/'));
});

// création fichier production minifé
gulp.task('prod', function() {
    gulp.src('./sass/**/style.scss')
        .pipe(sass().on('error', sass.logError))
    	.pipe(cssimport())
        .pipe(autoprefixer())  
        .pipe(csso())    
        .pipe(rename({
          suffix: '.min'
        }))
        .pipe(gulp.dest('./css/'))
		.pipe(livereload());
});


//Watch task
gulp.task('default',function() {
	livereload.listen();   
    gulp.watch('./sass/**/*.scss',['build', 'prod']); //watch change one scss and create two css file
});
