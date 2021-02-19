import gulp from 'gulp'
import webpack from 'webpack'
import Browser from 'browser-sync'

import { compileSass, css, devCss } from './operators/styles'
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
}

export function watcher() {
  gulp.watch("./src/scss/**/*", compileSass);
  gulp.watch("./src/css/*", devCss).on('ready', reload);
  gulp.watch("./src/js/**/*", compile).on('change', reload);
  gulp.watch("./src/img/*", images).on('change', reload);
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
export const build = gulp.series(compile, compileSass, css, images);
export const style = gulp.series(compileSass, devCss);

export default dev