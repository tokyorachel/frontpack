const webpack = require('webpack');
const path = require('path');

const MiniCssExtractPlugin = require('mini-css-extract-plugin');

module.exports = {
  entry: {
    main: ['./src/js/theme.js', './src/scss/styles.scss']
  },
  output: {
    filename: '[name].bundle.js',
    path: path.join(__dirname, '../','build/'),
    publicPath: '/build'
  },
  module: {
    rules:[
      {
        test: /\.(js)$/,
        exclude: /node_modules/,
        use: ['babel-loader', 'eslint-loader']
      },
      {
        test: /\.(sa|sc|c)ss$/,
        use: [
          MiniCssExtractPlugin.loader,
          'css-loader',
          {
            loader: 'postcss-loader',
            options: {
              config: {
                path: __dirname + '/postcss.config.js'
              }
            },
          },
          'sass-loader',
        ],
      }
    ]
  },
  externals: {
    Drupal: 'Drupal',
    drupalSettings: 'drupalSettings',
  },
  plugins: [
    new MiniCssExtractPlugin()
  ]
}