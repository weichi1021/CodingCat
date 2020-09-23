const path = require('path');
const VueLoaderPlugin = require('vue-loader/lib/plugin');

const config = {
  resolve: {
    extensions: ['.vue', '.js'],
    alias: {
      '@api': path.resolve(__dirname, './resources/js/api'),
      '@components': path.resolve(__dirname, './resources/pages/components'),
      '@pages': path.resolve(__dirname, './resources/pages'),
      '@utils': path.resolve(__dirname, './resources/js/utils'),
    },
  },
  entry: {
    'app': './resources/js/app.js',
    'admin': './resources/pages/admin/index.js',
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