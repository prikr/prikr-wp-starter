import path from 'path'
import webpack from 'webpack'

const TerserPlugin = require("terser-webpack-plugin");
const { CleanWebpackPlugin } = require('clean-webpack-plugin');
const HtmlWebpackPlugin = require('html-webpack-plugin');
const WorkboxPlugin = require('workbox-webpack-plugin');
const dotenv = require('dotenv')

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
		extensions: ['.js', '.json'],
		alias: {
			process: 'process/browser',
		},
		fallback: {
			"fs": false,
			"tls": false,
			"net": false,
			"path": false,
			"zlib": false,
			"http": require.resolve('stream-http'),
			"https": require.resolve('https-browserify'),
			"stream": false,
			"crypto": false,
			"assert": require.resolve('assert'),
			"url": require.resolve('url'),
			"process": false,
			"util": require.resolve('util'),
			"crypto-browserify": require.resolve('crypto-browserify'), //if you want to use this module also don't forget npm i crypto-browserify,
		} 
	},

	module: {
		rules: [{
				test: /\.js$/,
				use:  'babel-loader?cacheDirectory',
				exclude: /node_modules/,
			},
			{
				test: /\.(scss|css)$/,
				use: ['style-loader', 'css-loader', 'sass-loader'],
			}
		]
	},

	optimization: {
		minimize: mode === 'production' ? true : false,
		minimizer: mode === 'production' ? [new TerserPlugin()] : [],
	},

	plugins: [
		new webpack.ProvidePlugin({
			$: 'jquery',
			jQuery: 'jquery',
			jquery: 'jquery'
		}),
		new webpack.optimize.ModuleConcatenationPlugin(),
		new CleanWebpackPlugin(),
		new webpack.DefinePlugin({
			'process.env': JSON.stringify(dotenv.config().parsed) // it will automatically pick up key values from .env file
	 }),
	 new webpack.HotModuleReplacementPlugin(),
	],
}

function compile() {
	if (mode === 'production') removeContent(BUILD_DIR, () => { console.log('content deleted and obtaining new content now.') });
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