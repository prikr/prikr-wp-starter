import gulp from 'gulp'
import webpack from 'webpack'
import Browser from 'browser-sync'

import { processSass } from './operators/styles'
import { images } from './operators/images'

import { compile, config as webpackConfig} from './operators/webpack'
import webpackDevMiddleware from 'webpack-dev-middleware'

const bundler = webpack(webpackConfig)
const browser = Browser.create()

export function serve(done) {
    let config = {
        browser: 'Chrome',
        proxy: 'localhost',
        open: 'local',
        notify: false,
        injectChanges: false,
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

export function reload(done) {
    browser.reload();
    done()
}

export function watcher() {
  gulp.watch(
    [
      './src/scss/*.scss',
      './src/scss/*/*.scss'
    ],
    { ignoreInitial: false },
    gulp.series(processSass, reload)
  );
  gulp.watch("./src/js/**/*", gulp.series(compile, reload));
  gulp.watch("./src/img/*", gulp.series(images, reload));
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
  ]
  ).on('change', reload);
}

// Define complex tasks
export const dev   = gulp.series(serve, watcher);
// export const build = gulp.series(compile, compileSass, css, images);
// export const style = gulp.series(compileSass, devCss);

export default dev