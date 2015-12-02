var gulp = require('gulp');

var rev = require('gulp-rev');
var collector = require('gulp-rev-collector');

var css = require('gulp-minify-css');
var js = require('gulp-uglify');
var html = require('gulp-minify-html');

var clean = require('gulp-clean');

gulp.task('default', function() {
  console.log('hello gulp');
});

gulp.task('clean', function() {
  gulp.src(['static', 'wing/app/template'], {read:false})
    .pipe(clean());
});

gulp.task('rev', function() {
  gulp.src('wing/front/static/stylesheet/*')
    .pipe(rev())
    .pipe(rev.manifest())
    .pipe(gulp.dest('static/rev/stylesheet'));
  gulp.src('wing/front/static/javascript/*')
    .pipe(rev())
    .pipe(rev.manifest())
    .pipe(gulp.dest('static/rev/javascript'));
  gulp.src('wing/front/static/image/*')
    .pipe(rev())
    .pipe(rev.manifest())
    .pipe(gulp.dest('static/rev/image'));
});

gulp.task('front', function() {
  gulp.src(['static/rev/**/*', 'wing/front/template/**/*'])
    .pipe(collector())
    .pipe(html())
    .pipe(gulp.dest('wing/app/template'));
  gulp.src(['static/rev/**/*', 'wing/front/static/stylesheet/**/*'])
    .pipe(collector())
    .pipe(css())
    .pipe(gulp.dest('static/stylesheet'));
  gulp.src(['static/rev/**/*', 'wing/front/static/javascript/**/*'])
    .pipe(collector())
    .pipe(js())
    .pipe(gulp.dest('static/javascript'));
  gulp.src('wing/front/static/image/**/*')
    .pipe(gulp.dest('static/image'));
});

gulp.task('watch', function() {
  gulp.watch('wing/front/**/*', ['rev', 'front']);
});