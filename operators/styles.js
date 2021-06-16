import gulp from 'gulp'
import path from 'path'
import debug from 'gulp-debug'
import Browser from 'browser-sync'

const csso = require('gulp-csso')
const rename = require('gulp-rename')
const postcss = require('gulp-postcss')
const autoprefixer = require('autoprefixer')
const sass = require('gulp-sass')
const sourcemaps = require('gulp-sourcemaps')
const purgecss = require('gulp-purgecss')
const purgeRules = require('./../.purgecss.safelist')
const headerComment = require('gulp-header-comment')
const clean = require('gulp-clean-css')

function processSass() {
  const browser = Browser.get('Server') ?? Browser.get('Server');

  let stream = gulp.src('./src/scss/style.scss')
    .pipe(sourcemaps.init())
    .pipe(sass().on('error', sass.logError))
    .pipe(debug({
      title: 'in pipe!'
    }))

  stream = stream
    .pipe(postcss([autoprefixer()]))
    .pipe(debug({
      title: 'Autoprefixer done'
    }))
    .pipe(debug({
      title: 'CSSO done!'
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
            './*.vue',
            './**/*.vue',
            './**/**/*.vue',
            './**/**/**/*.vue',
          ],
          safelist: {
            standard: purgeRules.standard,
            greedy: purgeRules.greedy,
          }
        })
      )
      .pipe(clean({
        level: {
          1: {
            cleanupCharsets: true, // controls `@charset` moving to the front of a stylesheet; defaults to `true`
            normalizeUrls: true, // controls URL normalization; defaults to `true`
            optimizeBackground: false, // controls `background` property optimizations; defaults to `true`
            optimizeBorderRadius: false, // controls `border-radius` property optimizations; defaults to `true`
            optimizeFilter: false, // controls `filter` property optimizations; defaults to `true`
            optimizeFont: true, // controls `font` property optimizations; defaults to `true`
            optimizeFontWeight: false, // controls `font-weight` property optimizations; defaults to `true`
            optimizeOutline: true, // controls `outline` property optimizations; defaults to `true`
            removeEmpty: true, // controls removing empty rules and nested blocks; defaults to `true`
            removeNegativePaddings: true, // controls removing negative paddings; defaults to `true`
            removeQuotes: false, // controls removing quotes when unnecessary; defaults to `true`
            removeWhitespace: false, // controls removing unused whitespace; defaults to `true`
            replaceMultipleZeros: true, // contols removing redundant zeros; defaults to `true`
            replaceTimeUnits: true, // controls replacing time units with shorter values; defaults to `true`
            replaceZeroUnits: true, // controls replacing zero values with units; defaults to `true`
            roundingPrecision: false, // rounds pixel values to `N` decimal places; `false` disables rounding; defaults to `false`
            selectorsSortingMethod: 'standard', // denotes selector sorting method; can be `'natural'` or `'standard'`, `'none'`, or false (the last two since 4.1.0); defaults to `'standard'`
            specialComments: 'all', // denotes a number of /*! ... */ comments preserved; defaults to `all`
            tidyAtRules: false, // controls at-rules (e.g. `@charset`, `@import`) optimizing; defaults to `true`
            tidyBlockScopes: false, // controls block scopes (e.g. `@media`) optimizing; defaults to `true`
            tidySelectors: false, // controls selectors optimizing; defaults to `true`
          },
          2: {
            mergeAdjacentRules: true, // controls adjacent rules merging; defaults to true
            mergeIntoShorthands: true, // controls merging properties into shorthands; defaults to true
            mergeMedia: true, // controls `@media` merging; defaults to true
            mergeNonAdjacentRules: false, // controls non-adjacent rule merging; defaults to true
            mergeSemantically: false, // controls semantic merging; defaults to false
            overrideProperties: false, // controls property overriding based on understandability; defaults to true
            removeEmpty: true, // controls removing empty rules and nested blocks; defaults to `true`
            reduceNonAdjacentRules: true, // controls non-adjacent rule reducing; defaults to true
            removeDuplicateFontRules: true, // controls duplicate `@font-face` removing; defaults to true
            removeDuplicateMediaBlocks: true, // controls duplicate `@media` removing; defaults to true
            removeDuplicateRules: true, // controls duplicate rules removing; defaults to true
            removeUnusedAtRules: false, // controls unused at rule removing; defaults to false (available since 4.1.0)
            restructureRules: false, // controls rule restructuring; defaults to false
            skipProperties: [] // controls which properties won't be optimized, defaults to `[]` which means all will be optimized (since 4.1.0)
          }
        }
      }))
      .pipe(debug({
        title: 'Purge CSS completed'
      }))
  }

  stream = stream
    .pipe(headerComment({
      file: path.join(__dirname, '../createdby.prikr.scss')
    }))
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest('./'))
    .pipe(browser.stream({
      match: '**/*.css'
    }))

  return stream;
}

// Compile SASS files
function compileSass() {
  return gulp.src('./src/scss/style.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(gulp.dest('./src/css/'))
}


function rejectCss() {
  return gulp.src('./src/css/style.css')
    .pipe(debug({
      title: 'in pipe!'
    }))
    .pipe(rename({
      suffix: '.rejected'
    }))
    .pipe(purgecss({
      content: [
        './*.php',
        './**/*.php',
        './**/**/*.php',
        './**/**/**/*.php',
      ],
      safelist: {
        standard: purgeRules.standard,
        greedy: purgeRules.greedy,
      },
      rejected: true,
    }))
    .pipe(debug({
      title: 'Purge CSS completed'
    }))
    .pipe(gulp.dest('./'))
}

module.exports = {
  processSass,
  compileSass,
  rejectCss
}