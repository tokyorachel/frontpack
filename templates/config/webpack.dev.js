const webpack = require('webpack');
const path = require('path');
const merge = require('webpack-merge');

const StyleLintPlugin = require('stylelint-webpack-plugin');

const common = require('./webpack.common.js');

module.exports = merge(common, {
  mode: 'development',
  devtool: 'inline-source-map',
  plugins: [
    new StyleLintPlugin(),
  ],
  watchOptions: {
    aggregateTimeout: 500,
    poll: 800,
    ignored: /node_modules/
  }
})