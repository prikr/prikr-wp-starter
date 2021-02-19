import gulp from 'gulp'
const googleWebFonts = require('gulp-google-webfonts');

function fonts() {
  return gulp
    .src('./../.googlefonts.list')
    .pipe(googleWebFonts({
      fontsDir: './../dist/fonts',
      cssDir: './../src/scss/abstracts/',
      cssFilename: '_fonts.scss'
    }))
    .pipe(gulp.dest('./'));
}

module.exports = {
  fonts
}