var gulp = require('gulp'),
	less = require('gulp-less'),
	errorNotifier = require('gulp-error-notifier'),
	// spritesmith = require('gulp.spritesmith'),
	rename = require('gulp-rename'),
	concat = require('gulp-concat'),
	// sourcemaps = require('gulp-sourcemaps'),
	minify = require('gulp-minify-css'),
	uglify = require('gulp-uglify-es').default;

var jsList = [
		"./assets/js/mystars.js",
		"./assets/js/custom.js",
	];

gulp.task('less', function() {
	gulp.src('./assets/css/*.less')
	.pipe(errorNotifier())
	.pipe(less())
	.pipe(concat('app.min.css'))
	.pipe(minify())
	.pipe(gulp.dest('./assets/dist'))
});

gulp.task('scripts', function() {
	gulp.src(jsList)
		.pipe(errorNotifier())
		.pipe(concat('app.min.js'))
		.pipe(uglify())
		.pipe(gulp.dest('./assets/dist'));
});

gulp.task('watch', function() {
	gulp.watch('./assets/css/*.less', ['less']);
	gulp.watch('./assets/js/*', ['scripts']);
});

gulp.task('default', ['less', 'watch']);
