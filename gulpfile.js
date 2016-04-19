var gulp          = require('gulp'),
    sass          = require('gulp-sass'),
    jshint        = require('gulp-jshint'),
    concat        = require('gulp-concat'),
    uglify        = require('gulp-uglify'),
    imagemin      = require('gulp-imagemin'),
    plumber       = require('gulp-plumber'),
    notify        = require('gulp-notify'),
    autoprefixer  = require('gulp-autoprefixer'),
    browserSync   = require('browser-sync').create();

var autoprefixerOptions = {
  browsers: ['last 2 versions', '> 5%', 'Firefox ESR']
};

gulp.task('sass', function(){
  gulp.src('scss/style.scss')
    .pipe(plumber(plumberErrorHandler))
    .pipe(sass({outputStyle: 'expanded'}))
    .pipe(autoprefixer(autoprefixerOptions))
    .pipe(gulp.dest('./'))
    .pipe(browserSync.stream());
});

gulp.task('js', function () {
  gulp.src([
      'bower_components/jquery/dist/jquery.js', 
      'js/vendor/fastclick.js',
      'js/vendor/modals.js',
      'js/vendor/owl.carousel.js',
      'bower_components/waypoints/lib/jquery.waypoints.js',
      'bower_components/waypoints/lib/shortcuts/inview.js',
      'bower_components/waypoints/lib/shortcuts/sticky.js',
      'js/app.js'
    ])
    .pipe(plumber(plumberErrorHandler))
    .pipe(jshint())
    .pipe(concat('app.js'))
    .pipe(uglify())
    .pipe(gulp.dest('js/dist'))
    .pipe(browserSync.stream());
});

gulp.task('img', function() {
  gulp.src('img/src/*.{png,jpg,gif}')
    .pipe(plumber(plumberErrorHandler))
    .pipe(imagemin({
      optimizationLevel: 7,
      progressive: true
    }))
    .pipe(gulp.dest('img'));
});

gulp.task('watch', function() {
  gulp.watch('scss/**/*.scss', ['sass']);
  gulp.watch('js/app.js' ['js']);
  gulp.watch('img/*.{png,jpg,gif,svg}', ['img']);
  gulp.watch('*.php').on('change', browserSync.reload);
});

gulp.task('browser-sync', function() {
    browserSync.init({
        proxy: "localhost:8888"
    });
});

var plumberErrorHandler = { errorHandler: notify.onError({
    title: 'Gulp',
    message: 'Error: <%= error.message %>'
  })
};

gulp.task('default', ['sass', 'js', 'watch', 'browser-sync']);
