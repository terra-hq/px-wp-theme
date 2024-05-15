const webpack = require("webpack");
const path = require("path");

// Task
const currentTask = process.env.npm_lifecycle_event;

// Plugins
const { VueLoaderPlugin } = require("vue-loader");

module.exports = {
    entry: {
        project: {
            import: "./src/js/entries/Project.js",
            filename: currentTask == "virtual" ? "virtual.[name].js" : "[name].[fullhash:3].js",
        },
        backend: {
            import: "./src/js/app-backend.js",
            filename: currentTask == "virtual" ? "virtual.[name].js" : "[name].[fullhash:3].js",
        },
    },
    module: {
        rules: [
            // Sass Loader
            // {
            //     use: [
            //         {
            //             options: {
            //                 resources: [path.resolve(__dirname, "@terra-hq/gc/library")],
            //             },
            //         },
            //     ],
            // },
            // JS loader
            {
                test: /\.js$/,
                exclude: /(node_modules)/,
                use: "babel-loader",
            },
            // Vue loader
            {
                test: /\.vue$/,
                exclude: /(node_modules)/,
                loader: "vue-loader",
                options: {
                    loaders: {
                        scss: "vue-style-loader!css-loader!sass-loader",
                        css: "vue-style-loader!css-loader",
                    },
                },
            },
            // GLSL Shaders
            {
                test: /\.(frag|vert|glsl)$/,
                use: [
                    {
                        loader: "glsl-shader-loader",
                        options: {},
                    },
                ],
            },
        ],
    },
    target: ["web", "es5"],
    performance: {
        hints: false,
    },
    
    plugins: [new webpack.DefinePlugin({ "process.env": {} }) , new VueLoaderPlugin()],
    resolve: {
        alias: {
            "@scss": path.resolve(__dirname, "src/scss"),
            "@js": path.resolve(__dirname, "src/js"),
            "@vue": path.resolve(__dirname, "src/js/vue"),
            "@terrahq/vue-form": path.resolve(__dirname, "node_modules/@terrahq/vue-form"),
            // "@components": path.resolve(__dirname, "src/js/vue/components"),
            "@modules": path.resolve(__dirname, "src/js/modules"),
            "@services": path.resolve(__dirname, "src/js/services"),
            "@utilities": path.resolve(__dirname, "src/js/utilities"),
            "@dynamicImport": path.resolve(__dirname, "src/js/modules/dynamic"), // for dynamic imports
            "@img": path.resolve(__dirname, "src/img"),
        },
        //".vue"
        extensions: [".js", ".svelte", ".scss"],
    },
};
