var gulp = require('gulp');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
var concat = require('gulp-concat');
var rename = require('gulp-rename');
var uglify = require('gulp-uglify');
var browserSync = require('browser-sync').create();


// SCSS --> CSS(minified)/autoprefixer --> browserSync:
var scssSrc = './scss/style.scss',
    scssDest = '.';

gulp.task('styles', function() {
  gulp.src(scssSrc)
    // .pipe(sass({ style: 'compressed' }))
    .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
    .pipe(autoprefixer())
    .pipe(gulp.dest(scssDest))
    .pipe(browserSync.reload({stream: true}));
});


// JS --> concat --> minify
var jsSrc = './js/mahan files/**/*.js',
    jsDest = '.';

gulp.task('scripts', function() {
    gulp.src(jsSrc)
        .pipe(concat('/js/main.js'))
        .pipe(gulp.dest(jsDest))
        .pipe(rename('/js/main.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest(jsDest))
        .pipe(browserSync.reload({stream: true}));

});

//Localhost
gulp.task('serve', function(){

  browserSync.init({

    proxy: 'http://localhost:8888'

    // server: {
    //   baseDir: './'
    // }
  });


//Watch for changes
  gulp.watch(scssSrc, ['styles']);
  gulp.watch(jsSrc, ['scripts']);
  gulp.watch('./**/*.php').on('change', browserSync.reload);
});

gulp.task('default', ['styles', 'scripts', 'serve']);
