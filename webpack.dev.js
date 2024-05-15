const colors = require("colors");

const webpack = require("webpack");
const path = require("path");

// Webpack Merge
const common = require("./webpack.common");
const { merge } = require("webpack-merge");

// setup env
const config = require("./config/index.js");

console.log(colors.bgBlack.white("Starting Virtual Server - Thunderfoot"));

module.exports = merge(common, {
  mode: "development",
  output: {
    path: path.resolve(__dirname, "dist"),
    filename: "dev.[name].js",
    chunkFilename: "dev.chunk.[name].js",
  },
  devServer: {
    port: 9000,
    hot: true,
    inline: true,
    headers: {
      "Access-Control-Allow-Origin": "*",
    },
    proxy: {
      "*": {
        target: config.url,
        changeOrigin: true,
      },
      "/": {
        target: config.url,
        changeOrigin: true,
      },
    },
  },
  module: {
    rules: [
      // Sass Loader
      {
        test: /\.s[ac]ss$/i,
        use: [
          "style-loader",
          "css-loader",
          "postcss-loader",
          "sass-loader",
          {
            loader: "sass-resources-loader",
            options: {
              resources: [
                path.resolve(__dirname, "./src/scss/framework/_var/vars.scss"),
                path.resolve(
                  __dirname,
                  "./src/scss/framework/_mixins/mixins.scss"
                )
              ],
            },
          },
        ],
      },
      // Css Loader
      {
        test: /\.css$/i,
        use: ["style-loader", "css-loader", "postcss-loader"],
      },
      // Fonts
      {
        test: /\.(woff(2)?|ttf|eot|svg)(\?v=\d+\.\d+\.\d+)?$/,
        exclude: [path.resolve(__dirname, "./src/img/")],
        use: [
          {
            loader: "file-loader",
            options: {
              name: "[name].[ext]",
              limit: 4096,
              mimetype: "application/font-woff",
            },
          },
        ],
      },
      // Assets
      {
        test: /\.(png|svg|jpg|webp|gif)$/,
        exclude: [path.resolve(__dirname, "./src/scss/fonts")],
        use: ["file-loader", "webp-loader"],
      },
    ],
  },
});
