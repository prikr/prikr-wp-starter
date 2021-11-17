import fs from 'fs'
import urlList from '../critical.pages.json'
import gulp from 'gulp'
import debug from 'gulp-debug'

const es = require('event-stream');
const mergeStream = require('merge-stream');
const penthouser = require('gulp-penthouse');

const cleancss = require('gulp-clean-css');
const rename = require('gulp-rename')
const concat = require('gulp-concat')
const purgecss = require('gulp-purgecss')
const purge = require('gulp-css-purge')
const purgeRules = require('./../.purgecss.safelist')
const wait = require('gulp-wait')
const replace = require('gulp-replace');
const gutil = require('gulp-util');

function generateCriticalCss(cb) {

  urlList.urls.forEach((file) => {
    fs.writeFileSync('./dist/critical/critical-' + file.name + '.css', '');
  })

  return mergeStream(
    urlList.urls.map((obj) => {
      return gulp.src(['./style.css'], {
          allowEmpty: true
        })
        .pipe(debug({
          title: '[ Penthouse doing his work.. for ' + obj.name + ']: '
        }))
        .pipe(penthouser({
          out: '/critical-' + obj.name + '.css',
          url: obj.link,
          width: 1920, // viewport width for 13" Retina Macbook.  Adjust for your needs
          height: 1080, // viewport height for 13" Retina Macbook.  Adjust for your needs
          keepLargerMediaQueries: true, // when true, will not filter out larger media queries
          propertiesToRemove: [
            '@font-face',
            /url\(/,
            '(.*)root(.*)',
            '(.*)body(.*)'
          ],
          forceExclude: [
            '@font-face',
            /url\(/,
            '(.*)root(.*)',
            '(.*)body(.*)'
          ],
          userAgent: 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)',
          puppeteer: {
            getBrowser: undefined,
          },
          timeout: 60000,
        }))
        .pipe(debug({
          title: '[ Penthouse done..  for' + obj.name + '!]'
        }))
        .pipe(replace(new RegExp('(:root{)([^}]*)(})'), (match, p1, offset, string) => {
          console.log('Found ' + match + ' with param ' + p1 + ' at ' + offset + ' inside of ' + string);
          return ':root{}'
        })).on('error', gutil.log)
        .pipe(replace('dist/fonts', 'wp-content/themes/ekh/dist/fonts'))
        .pipe(replace('dist/img', 'wp-content/themes/ekh/dist/img'))
        .pipe(purge({
          trim : true,
          shorten : true,
          verbose : true
        }))
        .pipe(gulp.dest('./dist/critical/'))
    }),
    urlList.urls.map((obj) => {
      return gulp.src(['./style.css', './dist/critical/critical-' + obj.name + '.css'])
        .pipe(debug({
          title: '[ Penthouse done..  for' + obj.name + '!]'
        }))  
        .pipe(wait(3000))
        .pipe(concat('style.css'))
        .pipe(rename({
          suffix: '.' + obj.name
        }))
        .pipe(cleancss({level:{1:{specialComments:0},2:{removeDuplicateRules:true}}}))
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
        // .pipe(purge({
        //   trim: true,
        //   shorten: true,
        //   verbose: true
        // }))
        .pipe(gulp.dest('./dist/critical/'))
    })
  );




  // let quant = urlList.urls.length; 

  // urlList.urls.forEach(function (item, i) {
  //   penthouse({
  //       url: item.link, // can also use file:/// protocol for local files
  //       css: path.join(__dirname, '../style.css'), // path to original css file on disk
  //       width: 1920, // viewport width for 13" Retina Macbook.  Adjust for your needs
  //       height: 1080, // viewport height for 13" Retina Macbook.  Adjust for your needs
  //       keepLargerMediaQueries: true, // when true, will not filter out larger media queries
  //       propertiesToRemove: [
  //         '@font-face',
  //         /url\(/,
  //         ':root',
  //         'body'
  //       ],
  //       userAgent: 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)',
  //       puppeteer: {
  //         getBrowser: undefined,
  //       },
  //       blockJSRequests: false,
  //       timeout: 60000,
  //       // screenshots: {
  //       //   basePath: 'homepage', // absolute or relative; excluding file extension
  //       //   type: 'jpeg', // jpeg or png, png default
  //       //   quality: 20 // only applies for jpeg type
  //       // }
  //     })
  //     .then( async (criticalCss) => {
  //       // use the critical css
  //       fs.writeFileSync('./dist/critical/critical-' + item.name + '.css', criticalCss);

  //       await deleteCriticalFromStyleSheet('./dist/critical/critical-' + item.name + '.css', item.name);


  //     })
  //     .catch((err) => {
  //       // handle the error
  //       console.log(err);
  //     })


  // })
}


async function deleteCriticalFromStyleSheet(file, name) {


  return gulp
    .src([
      './style.css',
      file
    ])
    .pipe(concat('style.css'))
    .pipe(rename({
      suffix: '.' + name
    }))

    .pipe(cleancss({
      level: {
        1: {
          cleanupCharsets: true, // controls `@charset` moving to the front of a stylesheet; defaults to `true`
          normalizeUrls: true, // controls URL normalization; defaults to `true`
          optimizeBackground: true, // controls `background` property optimizations; defaults to `true`
          optimizeBorderRadius: true, // controls `border-radius` property optimizations; defaults to `true`
          optimizeFilter: true, // controls `filter` property optimizations; defaults to `true`
          optimizeFont: true, // controls `font` property optimizations; defaults to `true`
          optimizeFontWeight: true, // controls `font-weight` property optimizations; defaults to `true`
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
          tidyAtRules: true, // controls at-rules (e.g. `@charset`, `@import`) optimizing; defaults to `true`
          tidyBlockScopes: true, // controls block scopes (e.g. `@media`) optimizing; defaults to `true`
          tidySelectors: true, // controls selectors optimizing; defaults to `true`
        },
        2: {
          all: true, // sets all values to `false`
          removeDuplicateRules: true // turns on removing duplicate rules
        }
      }
    }))
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
    .pipe(gulp.dest('./dist/critical/'))


}

module.exports = {
  generateCriticalCss
}