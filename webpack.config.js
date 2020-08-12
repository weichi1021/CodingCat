const path = require('path');
const VueLoaderPlugin = require('vue-loader/lib/plugin');

const config = {
  resolve: {
    extensions: ['.vue', '.js'],
  },
  entry: {
    'app': './resources/js/app.js',
    'login': './resources/pages/login/index.js',
  },
  output: {
    path: path.resolve(__dirname, 'public'),
    filename: './js/[name].js'
  },
  module: {
    rules: [
      {
        test: /\.vue$/,
        loader: 'vue-loader',
      },
      {
        enforce: 'pre',
        test: /\.(js)|(vue)$/,
        exclude: /node_modules/,
        loader: 'eslint-loader',
        options: {
          fix: true,
        },
      },
    ]
  },
  plugins: [
    new VueLoaderPlugin(),
  ]
};

module.exports = config;