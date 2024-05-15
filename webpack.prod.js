const colors = require("colors");
const webpack = require("webpack");
const path = require("path");
const config = require("./config/index.js");

// Webpack Merge
const common = require("./webpack.common");
const { merge } = require("webpack-merge");
const RenameWebpackPlugin = require('rename-webpack-plugin')
// plugins
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const { CleanWebpackPlugin } = require("clean-webpack-plugin");
const BundleAnalyzerPlugin =
  require("webpack-bundle-analyzer").BundleAnalyzerPlugin;

// Task
const currentTask = process.env.npm_lifecycle_event;
console.log(colors.bgBlack.white("Start Building Process"));
console.log(colors.bgBlack.white(`Task executed: ${currentTask}`));

module.exports = merge(common, {
  mode: "production",
  output: {
    path: path.resolve(__dirname, "dist/js/"),
    filename: "[name].[fullhash:3].js",
    chunkFilename: "[name].[fullhash:3].js",
    publicPath: "auto",
  },
  optimization: {
    splitChunks: {
      cacheGroups: {
        // * this looks for node packages declared in the JS, in this case axios and gsap, and outputs a file names vendors.*.s
        // * change number as more packages are included
        // vendors: {
        //   test: /[\\/]node_modules[\\/](gsap)[\\/]/,
        //   filename: "vendors.1.js",
        //   chunks: "all",
        // },
      },
    },
  },
  module: {
    rules: [
      // Sass Loader
      {
        test: /\.s[ac]ss$/i,
        use: [
          MiniCssExtractPlugin.loader,
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
        use: [
          MiniCssExtractPlugin.loader,
          "css-loader",
          "postcss-loader",
          "sass-loader",
        ],
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
              outputPath: "./../css/fonts/",
              publicPath: "./fonts/",
            },
          },
        ],
      },
      // Assets
      {
        test: /\.(png|svg|jpg|gif)$/,
        exclude: [path.resolve(__dirname, "./src/scss/fonts")],
        use: [
          {
            loader: "file-loader",
            options: {
              name: "[name].[ext]",
              outputPath: "./../css/img/",
              publicPath: "./img/",
            },
          },
        ],
      },
    ],
  },
  plugins: [
    new MiniCssExtractPlugin({
      filename: "../css/[name].[fullhash:3].css",
      ignoreOrder: true,
    }),
    new CleanWebpackPlugin({
      cleanOnceBeforeBuildPatterns: [
        path.resolve(__dirname, "./dist/css/"),
        path.resolve(__dirname, "./dist/js/"),
      ],
      cleanAfterEveryBuildPatterns: [
        path.resolve(__dirname, "./dist/js/common.*.js"),
      ],
    }),
    new RenameWebpackPlugin({
      originNameReg: /(.*)form\..*\.css/,
      targetName: '$1form.css'
    }),
    new BundleAnalyzerPlugin({
      analyzerMode: "static", //will only generate on build
      openAnalyzer: false,
    }),
  ],
});
