import gulp from 'gulp'
import webpack from 'webpack'
import Browser from 'browser-sync'

import { processSass, compileSass, rejectCss } from './operators/styles'
import { images } from './operators/images'
import { fonts } from './operators/fonts'
import { generateCriticalCss } from './operators/critical'

import { compile, config as webpackConfig} from './operators/webpack'
import webpackDevMiddleware from 'webpack-dev-middleware'

const bundler = webpack(webpackConfig)
const browser = Browser.create('Server')

export function serve(done) {
  let config = {
    browser: 'Chrome',
    proxy: 'localhost',
    open: 'local',
    notify: false,
    ghostMode: {
        clicks: true,
        forms: true,
        scroll: false
    },
    middleware: [
        webpackDevMiddleware(bundler, { 
            publicPath: 'http://localhost:3000'
          })
    ],
  }
  browser.init(config);
  done();
}

export function watcher() {
  gulp.watch(
    [
      './src/scss/*.scss',
      './src/scss/**/*.scss'
    ],
    { ignoreInitial: false },
    processSass,
  );
  gulp.watch("./src/js/**/*", gulp.series(compile, function (done) {
    browser.reload();
    done();
  }));
  gulp.watch("./src/img/*", gulp.series(images, function (done) {
    browser.reload();
    done();
  }));
  gulp.watch([
    "*.php",
    "./**/*.php",
    "./*/*.php",
    "./**/**/*.php",
    "./templates/*.php",
    "./content/*.php",
    "./content/**/*.php",
    "./modules/*.php",
    "./modules/*/*.php",
    "./modules/*/*/*.php",
    "./templates/*.php",
    "./templates/**/*.php",
    "./templates/**/**/*.php",
    "./woocommerce/*.php",
    "./woocommerce/**/*.php"
  ], function (done) {
    browser.reload();
    done();
  });
}

// Define complex tasks
export const dev   = gulp.series(serve, processSass, compile, watcher);
export const build = gulp.series(compile, processSass, generateCriticalCss, images);
export const reject = gulp.series(compileSass, rejectCss);
export const critical = gulp.series(generateCriticalCss);
export const generateFonts = gulp.series(fonts);

export default dev