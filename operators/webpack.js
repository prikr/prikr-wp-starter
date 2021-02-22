import path from 'path'
import webpack from 'webpack'

const TerserPlugin = require("terser-webpack-plugin");
const { CleanWebpackPlugin } = require('clean-webpack-plugin');
const HtmlWebpackPlugin = require('html-webpack-plugin');
const WorkboxPlugin = require('workbox-webpack-plugin');

const removeContent = require('rimraf');

const HOME_DIR = path.resolve(__dirname, './../');
const JS_DIR = path.resolve(__dirname, './../src/js/');
const BUILD_DIR = path.resolve(__dirname, './../dist/js/');

const mode = process.env.NODE_ENV;

let config = {
	context: HOME_DIR,
	mode: 'development',
	cache: mode === 'production' ? true : false,
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
		rules: [{
				test: /\.js$/,
				use: 'babel-loader',
				exclude: /node_modules/,
			},
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
		new webpack.optimize.ModuleConcatenationPlugin(),
		new CleanWebpackPlugin(),
		new HtmlWebpackPlugin({
			title: 'Output Management',
			title: 'Progressive Web Application',
		}),
		new WorkboxPlugin.InjectManifest({
			swSrc: JS_DIR + "/service-worker.js",
			swDest: BUILD_DIR + "/sw.js"
		}),
	],
}

function compile() {
	removeContent(BUILD_DIR, () => { console.log('content deleted and obtaining new content now.') })
	return new Promise(resolve => webpack(config, (err, stats) => {
		if (err) console.log('Webpack', err)
		console.log(stats.toString({
		/* stats options */ }))
		resolve()
	}))
}

module.exports = {
	config,
	compile
}