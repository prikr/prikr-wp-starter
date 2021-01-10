const browsersync = require('browser-sync').create();
const csso = require('gulp-csso');
const gulp = require('gulp');
const imagemin = require('gulp-imagemin');
const postcss = require('gulp-postcss');
const sass = require('gulp-sass');
const terser = require('gulp-terser');
const concat = require('gulp-concat');
const newer = require('gulp-newer');
const purgecss = require('gulp-purgecss');
const rename = require('gulp-rename');
const babel = require('gulp-babel');
const minify = require('gulp-babel-minify');
const clean = require('gulp-clean-css');
const cache = require('gulp-cache');

// BrowserSync
function browserSync(done) {
    browsersync.init({
        browser: 'Chrome',
        proxy: "localhost",
        notify: false
    });
    done();
  }
  
  // BrowserSync Reload
  function browserSyncReload(done) {
    cache.clearAll();
    browsersync.reload();
    done();
  }

// Optimize Images
function images() {
  return gulp
    .src("./src/img/*")
    .pipe(newer("./dist/img"))
    .pipe(
      imagemin([
        imagemin.gifsicle({ interlaced: true }),
        imagemin.mozjpeg({ progressive: true }),
        imagemin.optipng({ optimizationLevel: 5 }),
        imagemin.svgo({
          plugins: [
            {
              removeViewBox: false,
              collapseGroups: true
            }
          ]
        })
      ])
    )
    .pipe(gulp.dest("./dist/img"));
}

// Compile SASS files
function compileSass() {
  return gulp.src('src/scss/style.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(gulp.dest('src/css/'))
    .pipe(browsersync.stream());
}

// Purge CSS
function purgeCSS() {
  return gulp.src('./dist/css/bootstrap.min.css')
    .pipe(purgecss({
        content: ['./*.php']
    }))
}

// Compile Bootstrap + Minifying the output
function css() {
  // Compile Bootstrap
  return gulp.src('./src/css/style.css')
    .pipe(postcss([
      require('autoprefixer')
    ]))
    // Storing the complete css for fallback purposes
    .pipe(gulp.dest('./dist/css'))
    // // Purge CSS
    // .pipe(purgecss({ content: [
    //     './header.php', './footer.php', './index.php', './404.php', './single.php', './archive.php', './page-templates/*.php', './page-templates/**/*.php'
    // ] }))
    .pipe(clean())
    // Minify CSS
    .pipe(csso())
    // Renaming css
    .pipe(rename("style.css"))
    .pipe(gulp.dest('./'))
}

 
// Compress JS
function js(done) {
  var files = [
    'node_modules/jquery/dist/jquery.min.js',
    'node_modules/jquery-ui-dist/jquery-ui.min.js',
    'node_modules/bootstrap/dist/js/bootstrap.bundle.min.js',
    'node_modules/@fortawesome/fontawesome-free/js/fontawesome.min.js',
    'node_modules/@fortawesome/fontawesome-free/js/brands.min.js',
    'node_modules/@fortawesome/fontawesome-free/js/solid.min.js',
    './src/js/**/*.js'
  ],
  destination = './dist/js'
  
  return gulp.src(files)
    .pipe(concat('scripts.js'))
    .pipe(gulp.dest(destination))
    .pipe(rename('scripts.min.js'))
    .pipe(terser())
    .pipe(babel({compact: false}))
    .pipe(gulp.dest(destination))
}

// Watch files
function watchFiles() {
  gulp.watch("./src/scss/**/*", compileSass).on('change');
  gulp.watch("./src/css/*", css).on('change', browsersync.reload);
  gulp.watch("./src/js/*", js).on('change', browsersync.reload);
  gulp.watch(      
      [
      "./*.php",
      "./../*.php",
      "./page-templates/*.php",
      "./page-templates/components/*.php",
      "./content/*/*.php",
      "./content/*.php",
      "./partials/*.php",
      "./modules/*.php",
      "./modules/*/*.php",
      "./modules/*/*/*.php",
    ],
    browserSyncReload
  );
  // Or, just call this for everything
  gulp.watch("./src/img/*", images);
}

// Define complex tasks
const compile = gulp.series(compileSass, css, js, images);
const watch = gulp.parallel(watchFiles, browserSync);

// Export tasks
exports.purgecss = purgeCSS;
exports.css     = css;
exports.images  = images;
exports.js      = js;
exports.watch   = watch;
exports.default = compile;