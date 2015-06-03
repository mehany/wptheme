var gulp = require('gulp');
var sass = require('gulp-ruby-sass');
var min = require('gulp-usemin');
//var changed = require('gulp-changed');
//var ngmin = require('gulp-ngmin');
//var jshint = require('gulp-jshint');
//var livereload = require('gulp-livereload');
//var open = require('gulp-open');
var rename = require('gulp-rename');
var minifycss = require('gulp-minify-css');
var autoprefixer = require('gulp-autoprefixer');
var sourcemaps = require('gulp-sourcemaps');
//var csso = require('gulp-csso');
//var imagemin = require('gulp-imagemin');
//var spritesmith = require('gulp-spritesmith');

//var runSequence = require('run-sequence');
//var compass = require('gulp-compass');

module.exports = gulp;

var tinylr;
gulp.task('livereload', function() {
    tinylr = require('tiny-lr')();
    tinylr.listen(35729);
});

var srcoo = 'assets/sass/*.scss';
var destoo = 'assets/css';

gulp.task('styles', function() {
    return gulp.src('assets/sass/styles.scss')
        .pipe(sourcemaps.init())
        .pipe(sass({compass: true, style: 'expanded', "sourcemap=none": true }))
        .pipe(sourcemaps.write())
        .pipe(gulp.dest('assets/css'))
        .pipe(sourcemaps.init({loadMaps: true}))
        .pipe(autoprefixer('last 2 version', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1'))
        .pipe(sourcemaps.write('./'))
        .pipe(gulp.dest('assets/css'))
        .pipe(rename({suffix: '.min'}))
        .pipe(minifycss())
        .pipe(gulp.dest('assets/css'));
});



function notifyLiveReload(event) {
    var fileName = require('path').relative(__dirname, event.path);

    tinylr.changed({
        body: {
            files: [fileName]
        }
    });
}



gulp.task('watch', function() {
    gulp.watch('assets/sass/*.scss', ['styles']);
    //gulp.watch('sass/*.scss', notifyLiveReload);
    gulp.watch('*.php', notifyLiveReload);
    gulp.watch('**/*.php', notifyLiveReload);
    gulp.watch('assets/css/styles.css', notifyLiveReload);
    gulp.watch('assets/js/*.js', notifyLiveReload);
    gulp.watch('assets/img/**/*.jpg', notifyLiveReload);
    gulp.watch('assets/img/**/*.png', notifyLiveReload);
    //gulp.watch('assets/fonts/*.js', notifyLiveReload);
});





gulp.task('default', ['livereload', 'styles', 'watch'], function() {

});