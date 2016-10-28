var gulp = require('gulp');
var sass = require('gulp-sass');
var concat = require('gulp-concat');
var rename = require('gulp-rename');
var uglify = require('gulp-uglify');
var browserSync = require('browser-sync').create();


gulp.task('styles', function() {
  gulp.src('./scss/style.scss')
    // .pipe(sass({ style: 'compressed' }))
    .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
    .pipe(gulp.dest('.'))
    .pipe(browserSync.reload({stream: true}));
});

var jsFiles = './js/mahan files/**/*.js',
    jsDest = '.';

gulp.task('scripts', function() {
    return gulp.src(jsFiles)
        .pipe(concat('/js/main.js'))
        .pipe(gulp.dest(jsDest))
        .pipe(rename('/js/main.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest(jsDest));
});

gulp.task('serve', function(){

  browserSync.init({

    proxy: 'http://localhost:8888'

    // server: {
    //   baseDir: './'
    // }
  });

  gulp.watch('./scss/*.scss', ['styles']);
  gulp.watch('./**/*.php').on('change', browserSync.reload);
});

gulp.task('default', ['styles', 'serve']);
