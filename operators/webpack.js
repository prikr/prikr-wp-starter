import path    from 'path'
import webpack from 'webpack'

const TerserPlugin = require("terser-webpack-plugin");

const JS_DIR = path.resolve( __dirname, './../src/js/' );
const BUILD_DIR = path.resolve( __dirname, './../dist/js/' );

let config = {
    mode: 'development',
    cache: false,
    entry: [
        JS_DIR + '/scripts.js'
    ],

    devtool: "inline-source-map",
    output: {
        path: BUILD_DIR,
        filename: "scripts.min.js"
    },
    devtool: 'source-map',

    resolve: {
        extensions: ['.js', '.vue', '.json'],
        alias: {
            'vue$': 'vue/dist/vue.esm.js',
        }
    },

    module: {
        rules: [
            {
                test: /\.vue$/,
                loader: 'vue-loader'
            },
            {
                test: /\.(scss|css)$/,
                use: ['style-loader', 'css-loader', 'sass-loader'],
            }
        ]
    },

    optimization: {
      minimize: true,
      minimizer: [new TerserPlugin()],
    },

    plugins: [
        new webpack.ProvidePlugin({
            $: 'jquery',
            jQuery: 'jquery',
            jquery: 'jquery'
        }),
    ],
}


function compile() {

    return new Promise(resolve => webpack(config, (err, stats) => {

        if(err) console.log('Webpack', err)

        console.log(stats.toString({ /* stats options */ }))

        resolve()
    }))
}

module.exports = { config, compile }