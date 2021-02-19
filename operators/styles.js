import gulp from gulp
import debug from 'gulp-debug'

const csso = require('gulp-csso');
const postcss = require('gulp-postcss');
const autoprefixer = require('autoprefixer')
const sass = require('gulp-sass');
const sourcemaps = require('gulp-sourcemaps')
const purgecss = require('gulp-purgecss');
const purgeRules = require('./.purgecss.safelist');
const headerComment = require('gulp-header-comment');

// Compile SASS files
function compileSass() {
  return gulp.src('./../src/scss/style.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(gulp.dest('./src/css/'))
    .pipe(browser.stream({
      match: '**/*.css'
    }))
}

function css() {
  return gulp.src('./src/css/style.css')
    .pipe(sourcemaps.init())
    .pipe(debug({
      title: 'in pipe!'
    }))
    .pipe(purgecss({
      content: [
        './*.php',
        './**/*.php',
        './**/**/*.php',
        './**/**/**/*.php',
      ],
      safelist: purgeRules.safelist
    }))
    .pipe(debug({
      title: 'Purge CSS completed'
    }))
    .pipe(postcss([autoprefixer()]))
    .pipe(debug({
      title: 'Autoprefixer done'
    }))
    .pipe(csso())
    .pipe(debug({
      title: 'CSSO done!'
    }))
    .pipe(headerComment({
      file: path.join(__dirname, 'createdby.prikr.scss')
    }))
    .pipe(sourcemaps.write('.'))
    .pipe(debug({
      title: 'WordPress header comment added!'
    }))
    .pipe(gulp.dest('./'))
}

function devCss() {
  return gulp.src('./src/css/style.css')
    .pipe(debug({
      title: 'in pipe!'
    }))
    .pipe(sourcemaps.init())
    .pipe(postcss([autoprefixer()]))
    .pipe(headerComment({
      file: path.join(__dirname, 'createdby.prikr.scss')
    }))
    .pipe(debug({
      title: 'WordPress header comment added!'
    }))
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest('./'))
    .pipe(browser.stream({
      match: '**/*.css'
    }))
}
exports.devCss = devCss;