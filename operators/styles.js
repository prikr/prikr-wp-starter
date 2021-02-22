import gulp from 'gulp'
import path    from 'path'
import debug from 'gulp-debug'
import Browser from 'browser-sync'

const browser = Browser.create();

const csso = require('gulp-csso')
const postcss = require('gulp-postcss')
const autoprefixer = require('autoprefixer')
const sass = require('gulp-sass')
const sourcemaps = require('gulp-sourcemaps')
const purgecss = require('gulp-purgecss')
const purgeRules = require('./../.purgecss.safelist')
const headerComment = require('gulp-header-comment')

function processSass(browser) {
  let stream = gulp.src('./src/scss/style.scss')
  .pipe(sourcemaps.init())
    .pipe(sass().on('error', sass.logError))
    .pipe(debug({
      title: 'in pipe!'
    }))

  if (process.env.NODE_ENV === 'production') {
    stream = stream
      .pipe(
        purgecss({
          content: [
            './*.php',
            './**/*.php',
            './**/**/*.php',
            './**/**/**/*.php',
          ],
          safelist: {
            standard: purgeRules.standard,
            greedy: purgeRules.greedy,
          }
        })
      )
      .pipe(debug({
        title: 'Purge CSS completed'
      }))
  }

  stream = stream
    .pipe(postcss([autoprefixer()]))
    .pipe(debug({
      title: 'Autoprefixer done'
    }))
    .pipe(csso())
    .pipe(debug({
      title: 'CSSO done!'
    }))
    .pipe(headerComment({
      file: path.join(__dirname, '../createdby.prikr.scss')
    }))
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest('./'))
    .pipe(browser.stream({match: '**/*.css'}))

  return stream;
}

module.exports = { processSass }