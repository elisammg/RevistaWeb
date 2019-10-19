const HtmlWebpackPlugin = require('html-webpack-plugin');


module.exports =
{
  entry: './js/app.js',
  output:
  {
    path: __dirname + '/build',
    filename: 'bundle.js'
  },

  devServer:{
    port: 1480
  },

  module:{
    rules: [
      {
        test:/\.scss$/,
        use: [
          {loader: 'style-loader'},
          {loader: 'css-loader'},
          {loader: 'sass-loader'}
        ]
      }
    ]
  },
  plugins:[
    new HtmlWebpackPlugin({
      template: 'index.html',
    })
  ]
}
